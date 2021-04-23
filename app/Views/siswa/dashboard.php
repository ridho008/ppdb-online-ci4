<?= $this->extend('layouts/app-front'); ?>
<?= $this->section('layouts/navbarFront'); ?>

<?= $this->section('content'); ?>
<?php 
$db = \Config\Database::connect();
$ta = $db->table('tahun_ajaran')
              ->where('status', 1)
              ->get()->getRowArray();

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
                          <img src="" alt="">
                       </div>
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title text-center">Identitas Peserta Didik</h4>
                        </div>
                       <div class="card-body">
                          <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group row">
                                    <label class="col col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                      <p>name...</p>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-10">
                                      <p>name...</p>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col col-form-label">Nik</label>
                                    <div class="col-sm-10">
                                      <p>name...</p>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col col-form-label">Agama</label>
                                    <div class="col-sm-10">
                                      <p>name...</p>
                                    </div>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-group row">
                                   <label class="col col-form-label">Tanggal Lahir</label>
                                   <div class="col-sm-10">
                                     <p>name...</p>
                                   </div>
                                </div>
                                <div class="form-group row">
                                   <label class="col col-form-label">Jenis Kelamin</label>
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
                                <div class="form-group row">
                                   <label class="col col-form-label">Tinggi Badan</label>
                                   <div class="col-sm-10">
                                     <p>name...</p>
                                   </div>
                                </div>
                                <div class="form-group row">
                                   <label class="col col-form-label">Berat Badan</label>
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
        <input type="text" name="id_siswa" value="<?= $siswa->id; ?>">
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

<?= $this->endSection(); ?>