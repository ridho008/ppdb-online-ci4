<?= $this->extend('layouts/app-front'); ?>
<?= $this->section('layouts/navbarFront'); ?>

<?= $this->section('content'); ?>
<?php 
$db = \Config\Database::connect();
$ta = $db->table('tahun_ajaran')
              ->where('status', 1)
              ->get()->getRowArray();

$session = session();
$errorsIdentitas = $session->getFlashdata('errors');

?>
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <p class="text-muted float-right">Tahun Ajaran Tahun <?= $ta['ta']; ?></p>
      </div>
      <div class="col-md-12">
         <div class="card">
             <div class="card-body">
                <table class="table text-center">
                  <tr>
                    <th>NISN</th>
                    <th>No.Pendaftaran</th>
                    <th>Tanggal Pendaftaran</th>
                    <th>Jalur Pendaftaran</th>
                    <th>
                    <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#formModalPendaftaran">
                      <i class="fa fa-pencil"></i>
                    </button></th>
                  </tr>
                  <tr>
                    <td><?= $siswa->nisn; ?></td>
                    <td><?= $siswa->no_pendaftaran; ?></td>
                    <td><?= $siswa->tgl_pendaftaran; ?></td>
                    <td><?= ($siswa->jalur_masuk) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->jalur_masuk; ?></td>
                  </tr>
                </table>
                <div class="row">
                  <div class="col-md-4">
                     <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title text-center">Foto</h4>
                        </div>
                       <div class="card-body">
                          <?php if($siswa->foto == null) : ?>
                          <img src="<?= base_url('img/siswa/default.jpg'); ?>" alt="" class="img-fluid">
                          <?php else: ?>
                          <img src="<?= base_url('img/siswa/'. $siswa->foto); ?>" alt="" class="img-fluid">
                          <small class="muted text-danger"><?= \Config\Services::validation()->getError('foto'); ?></small>
                          <?php endif; ?>
                          <button type="button" class="btn btn-default btn-xs btn-block" data-toggle="modal" data-target="#formModalFoto">
                            <i class="fa fa-pencil"></i>
                          </button>
                       </div>
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title text-center" style="display: inline-block;">Identitas Peserta Didik</h4>
                            <button type="button" class="btn btn-default btn-xs float-right" data-toggle="modal" data-target="#formModalIdentitas">
                              <i class="fa fa-pencil"></i>
                            </button>
                        </div>
                       <div class="card-body">
                        <?php if($errorsIdentitas != null) : ?>
                          <?php foreach ($errorsIdentitas as $error) : ?>
                            <ul>
                                <li>
                                <div class="alert alert-danger" role="alert">
                                    <?= $error ?>
                                  </div>
                                </li>
                              </ul>
                           <?php endforeach ?>
                        <?php endif; ?>
                          <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group row">
                                    <label class="col col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                      <p><?= ($siswa->nama) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->nama; ?></p>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-10">
                                      <p><?= ($siswa->tmp_lahir) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->tmp_lahir; ?></p>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col col-form-label">Nik</label>
                                    <div class="col-sm-10">
                                      <p><?= ($siswa->nik) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->nik; ?></p>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col col-form-label">Agama</label>
                                    <div class="col-sm-10">
                                      <p><?= ($siswa->agama) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->agama; ?></p>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                   <label class="col col-form-label">Jumlah Saudara</label>
                                   <div class="col-sm-10">
                                     <p><?= ($siswa->jml_saudara) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->jml_saudara; ?></p>
                                   </div>
                                </div>
                                <div class="form-group row">
                                   <label class="col col-form-label">Anak Ke-</label>
                                   <div class="col-sm-10">
                                     <p><?= ($siswa->anak_ke) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->anak_ke; ?></p>
                                   </div>
                                </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-group row">
                                   <label class="col col-form-label">Tanggal Lahir</label>
                                   <div class="col-sm-10">
                                     <p><?= ($siswa->tgl_lahir) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->tgl_lahir; ?></p>
                                   </div>
                                </div>
                                <div class="form-group row">
                                   <label class="col col-form-label">Jenis Kelamin</label>
                                   <div class="col-sm-10">
                                     <p>
                                      <?php if($siswa->jk == null) : ?>
                                      <p class="muted text-danger">Wajib Disi.</p>
                                        <?php else: ?>
                                          <?php if($siswa->jk == 'P') : ?>
                                            Perempuan
                                            <?php else: ?>
                                              Laki-Laki
                                          <?php endif; ?>
                                      <?php endif;?>
                                   </div>
                                </div>
                                <div class="form-group row">
                                   <label class="col col-form-label">No.Telepon</label>
                                   <div class="col-sm-10">
                                     <p><?= ($siswa->no_telp) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->no_telp; ?></p>
                                   </div>
                                </div>
                                <div class="form-group row">
                                   <label class="col col-form-label">Tinggi Badan</label>
                                   <div class="col-sm-10">
                                     <p><?= ($siswa->tinggi) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->tinggi; ?></p>
                                   </div>
                                </div>
                                <div class="form-group row">
                                   <label class="col col-form-label">Berat Badan</label>
                                   <div class="col-sm-10">
                                     <p><?= ($siswa->berat) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->berat; ?></p>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                     </div>
                  </div>
                </div>

                <!-- Data Ayah -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                       <div class="card-header card-header-primary">
                           <h4 class="card-title text-center">Data Ayah Kandung</h4>
                       </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group row">
                               <label class="col col-form-label">NIK Ayah</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">Nama Ayah</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group row">
                               <label class="col col-form-label">Pekerjaan</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">Pendidikan</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group row">
                               <label class="col col-form-label">Penghasilan/Bulan</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">No.Telepon</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Data Ibu -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                       <div class="card-header card-header-primary">
                           <h4 class="card-title text-center">Data Ibu Kandung</h4>
                       </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group row">
                               <label class="col col-form-label">NIK Ibu</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">Nama Ibu</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group row">
                               <label class="col col-form-label">Pekerjaan</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">Pendidikan</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group row">
                               <label class="col col-form-label">Penghasilan/Bulan</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">No.Telepon</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Sekolah Asal -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                       <div class="card-header card-header-primary">
                           <h4 class="card-title text-center">Sekolah Asal</h4>
                       </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group row">
                               <label class="col col-form-label">Tahun Lulus</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">Nama Sekolah</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group row">
                               <label class="col col-form-label">Provinsi</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">Kabupaten</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">Kecamatan</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group row">
                               <label class="col col-form-label">No.Izajah</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">No.SKHU</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Alamat Lengkap -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                       <div class="card-header card-header-primary">
                           <h4 class="card-title text-center">Alamat Lengkap</h4>
                       </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                               <label class="col col-form-label">Provinsi</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">Kabupaten</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                               <label class="col col-form-label">Kecamatan</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">Alamat</label>
                               <div class="col-sm-10">
                                 <p>name...</p>
                               </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- File Pendukung -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                       <div class="card-header card-header-primary">
                           <h4 class="card-title text-center">File Pendukung</h4>
                       </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Jenis File</th>
                                <th>File</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /File Pendukung -->

                <!-- Button Apply -->
                <div class="row">
                  <div class="col-md-12">
                    <a href="" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</a>
                  </div>
                </div>
                <!-- /Button Apply -->
             </div>
         </div>
      </div>
   </div>
</div>


<!-- Modal Pendaftaran -->
<div class="modal fade" id="formModalPendaftaran" tabindex="-1" aria-labelledby="formModalLabelPendaftaran" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelPendaftaran">Tambah Data Agama</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('/siswa/updatePendaftaran'); ?>
        <?= csrf_field() ?>
        <input type="hidden" name="id_siswa" value="<?= $siswa->id; ?>">
        <div class="form-group">
          <label>Nisn</label>
          <p><?= $siswa->nisn ?></p>
        </div>
        <div class="form-group">
          <label>No Pendaftaran</label>
          <p><?= $siswa->no_pendaftaran ?></p>
        </div>
        <div class="form-group">
          <label>Tanggal Pendaftaran</label>
          <p><?= $siswa->tgl_pendaftaran ?></p>
        </div>
        <div class="form-group">
           <?= form_label('Jalur Masuk', 'Jalur Masuk'); ?>
           <select name="id_jalur_masuk" id="id_jalur_masuk" class="form-control">
             <option value="">-- Pilih Jalur Masuk --</option>
             <?php foreach($jalurMasuk as $jm) : ?>
              <?php if($jm->id_jalur == $siswa->id_jalur_masuk): ?>
             <option value="<?= $jm->id_jalur ?>" selected><?= $jm->jalur_masuk ?></option>
             <?php else: ?>
             <option value="<?= $jm->id_jalur ?>"><?= $jm->jalur_masuk ?></option>
             <?php endif; ?>
           <?php endforeach; ?>
           </select>
        </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
           <button type="submit" class="btn btn-primary">Simpan</button>
         </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal Ganti Foto -->
<div class="modal fade" id="formModalFoto" tabindex="-1" aria-labelledby="formModalLabelFoto" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelFoto">Ubah Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('/siswa/ubahFoto'); ?>
        <?= csrf_field() ?>
        <input type="hidden" name="id_siswa" value="<?= $siswa->id; ?>">
        <div class="form-group">
          <label for="foto">Foto</label><br>
          <?php if($siswa->foto == null) : ?>
          <img src="<?= base_url('img/siswa/default.jpg'); ?>" alt="" class="img-fluid" width="200px">
          <?php else: ?>
          <img src="<?= base_url('img/siswa/'. $siswa->foto); ?>" alt="" class="img-fluid" width="200px">
          <?php endif; ?>
          <input type="file" name="foto" id="foto" class="form-control-file">
          <input type="hidden" name="fotoLama" id="fotoLama" class="form-control" value="<?= $siswa->foto; ?>">
        </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
           <button type="submit" class="btn btn-primary">Simpan</button>
         </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal Identitas Peserta Didik -->
<div class="modal fade" id="formModalIdentitas" tabindex="-1" aria-labelledby="formModalLabelIdentitas" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelIdentitas">Ubah Identitas Peserta Didik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('/siswa/ubahIdentitas'); ?>
        <?= csrf_field() ?>
        <input type="hidden" name="id_siswa" value="<?= $siswa->id; ?>">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" name="nik" id="nik" class="form-control" value="<?= $siswa->nik; ?>">
              <small class="muted text-danger"><?= $validation->getError('nik'); ?></small>
            </div>
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" name="nama" id="nama" class="form-control" value="<?= $siswa->nama; ?>">
            </div>
            <div class="form-group">
              <label for="tmp_lahir">Tempat Lahir</label>
              <input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control" value="<?= $siswa->tmp_lahir; ?>">
            </div>
            <div class="form-group">
              <label for="berat">Berat Badan</label>
              <input type="number" name="berat" id="berat" class="form-control" value="<?= $siswa->berat; ?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="agama">Agama</label>
              <select name="agama" id="agama" class="form-control">
                <option value="">-- Pilih Agama --</option>
                <?php foreach($agama as $a) : ?>
                  <?php if($a->id == $siswa->id_agama) : ?>
                  <option value="<?= $a->id ?>" selected=""><?= $a->agama ?></option>
                  <?php else: ?>
                  <option value="<?= $a->id ?>"><?= $a->agama ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="jml_saudara">Jumlah Saudara</label>
              <input type="number" name="jml_saudara" id="jml_saudara" class="form-control" value="<?= $siswa->jml_saudara; ?>">
            </div>
            <div class="form-group">
              <label for="anak_ke">Anak Ke</label>
              <input type="number" name="anak_ke" id="anak_ke" class="form-control" value="<?= $siswa->anak_ke; ?>">
            </div>
            <div class="form-group">
              <label for="tinggi">Tinggi Badan</label>
              <input type="number" name="tinggi" id="tinggi" class="form-control" value="<?= $siswa->tinggi; ?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="tgl_lahir">tgl_lahir</label>
              <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?= $siswa->tgl_lahir; ?>">
            </div>
            <div class="form-group">
              <label for="jk">Jenis Kelamin</label>
              <select name="jk" id="jk" class="form-control">
                <option value="">-- Pilih Kelamin --</option>
                <option value="L" <?= ($siswa->jk == 'L') ? 'selected' : '' ?>>Laki-Laki</option>
                <option value="P" <?= ($siswa->jk == 'P') ? 'selected' : '' ?>>Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="no_telp">Nomor Telepon</label>
              <input type="number" name="no_telp" id="no_telp" class="form-control" value="<?= $siswa->no_telp; ?>">
            </div>
          </div>
        </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
           <button type="submit" class="btn btn-primary">Simpan</button>
         </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>