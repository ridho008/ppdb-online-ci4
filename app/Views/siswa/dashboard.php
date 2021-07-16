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
      <div class="col-md-6">
          <h4 class="display-4">Formulir Pendaftaran Peserta Didik</h4>
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
          <?php if($siswa->status_ppdb == 0) : ?>
             <?php if($siswa->status_pendaftaran == 0) : ?>
             <div class="bg-warning p-3 rounded text-light" role="alert"><h5><i class="fa fa-info-circle"></i> Pemberitahuan!</h5>
               <p>Lengkapi data diri anda dengan benar, sebelum mengirim pendaftaran.</p>
             </div>
            <?php elseif($siswa->status_pendaftaran == 1) : ?>
            <div class="bg-primary p-3 rounded text-light" role="alert"><h5><i class="fa fa-info-circle"></i> Pendaftaran Sudah Dikirim!</h5>
               <p>Silahkan menunggu hingga pengumuman diumumkan.</p>
             </div>
            <?php endif; ?>
         <?php endif; ?>

         <?php if($siswa->status_ppdb == 1 && $siswa->status_pendaftaran == 1) : ?>
            <div class="bg-success p-3 rounded text-light" role="alert"><h5><i class="fa fa-check-circle"></i> Selamat Anda Lulus!</h5>
               <p>Cetak Bukti Kelulusan <a href="<?= base_url('siswa/buktiKelulusan') ?>">Disini</a>.</p>
             </div>
            <?php elseif($siswa->status_ppdb == 2) : ?>
               <div class="bg-dark p-3 rounded text-light" role="alert"><h5><i class="fa fa-info-circle"></i> Maaf, Anda Belum Lolos!</h5>
               <p>Tetap Semangat, Silahkan Coba Tahun Depan.</p>
             </div>
         <?php endif; ?>
      </div>
      <div class="col-md-6">
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
                    <th>Jurusan</th>
                    <?php if($siswa->status_pendaftaran == 0) : ?>
                    <th>
                    <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#formModalPendaftaran">
                      <i class="fa fa-pencil"></i>
                    </button></th>
                     <?php endif; ?>
                  </tr>
                  <tr>
                    <td><?= $siswa->nisn; ?></td>
                    <td><?= $siswa->no_pendaftaran; ?></td>
                    <td><?= $siswa->tgl_pendaftaran; ?></td>
                    <td><?= ($siswa->jalur_masuk) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->jalur_masuk; ?></td>
                    <td><?= ($siswa->jurusan) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->jurusan; ?></td>
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
                          <?php if($siswa->status_pendaftaran == 0) : ?>
                          <button type="button" class="btn btn-default btn-xs btn-block" data-toggle="modal" data-target="#formModalFoto">
                            <i class="fa fa-pencil"></i>
                          </button>
                          <?php endif; ?>
                       </div>
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title text-center" style="display: inline-block;">Identitas Peserta Didik</h4>
                            <?php if($siswa->status_pendaftaran == 0) : ?>
                            <button type="button" class="btn btn-warning btn-xs float-right" data-toggle="modal" data-target="#formModalIdentitas">
                              <i class="fa fa-pencil"></i>
                            </button>
                           <?php endif; ?>
                        </div>
                       <div class="card-body">
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
                                     <p><?= ($siswa->tinggi) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->tinggi; ?> Cm</p>
                                   </div>
                                </div>
                                <div class="form-group row">
                                   <label class="col col-form-label">Berat Badan</label>
                                   <div class="col-sm-10">
                                     <p><?= ($siswa->berat) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->berat; ?> Kg</p>
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
                           <h4 class="card-title text-center" style="display: inline-block;">Data Ayah Kandung</h4>
                           <?php if($siswa->status_pendaftaran == 0) : ?>
                           <button type="button" class="btn btn-warning btn-xs float-right" data-toggle="modal" data-target="#formModalAyah">
                              <i class="fa fa-pencil"></i>
                            </button>
                            <?php endif; ?>
                       </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group row">
                               <label class="col col-form-label">NIK Ayah</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->nik_ayah) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->nik_ayah; ?></p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">Nama Ayah</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->nama_ayah) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->nama_ayah; ?></p>
                               </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group row">
                               <label class="col col-form-label">Pekerjaan</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->pekerjaan_ayah) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->pekerjaan_ayah; ?></p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">Pendidikan</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->pendidikan_ayah) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->pendidikan_ayah; ?></p>
                               </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group row">
                               <label class="col col-form-label">Penghasilan/Bulan</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->penghasilan_ayah) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : number_format($siswa->penghasilan_ayah,0,',','.'); ?></p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">No.Telepon</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->telp_ayah) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->telp_ayah; ?></p>
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
                           <h4 class="card-title text-center" style="display: inline-block;">Data Ibu Kandung</h4>
                           <?php if($siswa->status_pendaftaran == 0) : ?>
                           <button type="button" class="btn btn-warning btn-xs float-right" data-toggle="modal" data-target="#formModalIbu">
                              <i class="fa fa-pencil"></i>
                            </button>
                         <?php endif; ?>
                       </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group row">
                               <label class="col col-form-label">NIK</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->nik_ibu) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->nik_ibu; ?></p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">Nama Ibu</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->nama_ibu) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->nama_ibu; ?></p>
                               </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group row">
                               <label class="col col-form-label">Pekerjaan</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->pekerjaan_ibu) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->pekerjaan_ibu; ?></p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">Pendidikan</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->pendidikan_ibu) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->pendidikan_ibu; ?></p>
                               </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group row">
                               <label class="col col-form-label">Penghasilan/Bulan</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->penghasilan_ibu) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : number_format($siswa->penghasilan_ibu,0,',','.'); ?></p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">No.Telepon</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->telp_ibu) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->telp_ibu; ?></p>
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
                           <h4 class="card-title text-center" style="display: inline-block;">Sekolah Asal</h4>
                           <?php if($siswa->status_pendaftaran == 0) : ?>
                           <button type="button" class="btn btn-warning btn-xs float-right" data-toggle="modal" data-target="#formModalSekolah">
                              <i class="fa fa-pencil"></i>
                            </button>
                           <?php endif; ?>
                       </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group row">
                               <label class="col col-form-label">Tahun Lulus</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->tahun_lulus) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->tahun_lulus; ?></p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">Nama Sekolah</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->nama_sekolah) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->nama_sekolah; ?></p>
                               </div>
                            </div>
                          </div>
                          
                          <div class="col-md-4">
                            <div class="form-group row">
                               <label class="col col-form-label">No.Izajah</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->no_izajah) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->no_izajah; ?></p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">No.SKHU</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->no_skhun) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->no_skhun; ?></p>
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
                           <h4 class="card-title text-center" style="display: inline-block;">Alamat Lengkap</h4>
                           <?php if($siswa->status_pendaftaran == 0) : ?>
                           <button type="button" class="btn btn-warning btn-xs float-right" data-toggle="modal" data-target="#formModalAlamat">
                              <i class="fa fa-pencil"></i>
                            </button>
                           <?php endif; ?>
                       </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group row">
                               <label class="col col-form-label">Provinsi</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->provinsi) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->provinsi; ?></p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">Kabupaten</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->nama_kabupaten) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->nama_kabupaten; ?></p>
                               </div>
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group row">
                               <label class="col col-form-label">Kecamatan</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->kecamatan) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->kecamatan; ?></p>
                               </div>
                            </div>
                            <div class="form-group row">
                               <label class="col col-form-label">Alamat</label>
                               <div class="col-sm-10">
                                 <p><?= ($siswa->alamat) == null ? '<p class="muted text-danger">Wajib Disi.</p>' : $siswa->alamat; ?></p>
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
                           <h4 class="card-title text-center" style="display: inline-block;">Berkas Lampiran</h4>
                           <?php if($siswa->status_pendaftaran == 0) : ?>
                           <button type="button" class="btn btn-warning btn-xs float-right" data-toggle="modal" data-target="#formModalBerkas">
                              <i class="fa fa-plus"></i>
                           </button>
                           <?php endif; ?>
                       </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Jenis</th>
                                <th>Keterangan</th>
                                <th>File</th>
                                <?php if($siswa->status_pendaftaran == 0) : ?>
                                <th>Action</th>
                                 <?php endif; ?>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; foreach($berkas as $b) : ?>
                                 <tr>
                                    <td><?=  $no++;?></td>
                                    <td><?=  $b['lampiran'];?></td>
                                    <td><?=  $b['ket_berkas'];?></td>
                                    <td><a href="<?= base_url('img/berkas/' . $b['berkas']); ?>"><?=  $b['berkas'];?></a></td>
                                    <?php if($siswa->status_pendaftaran == 0) : ?>
                                    <td>
                                       <a href="<?= base_url('siswa/deleteBerkas/' . $b['id_berkas']) ?>" onclick="return confirm('Yakin')" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <?php endif; ?>
                                 </tr>
                              <?php endforeach; ?>
                              <?php if(empty($berkas)) : ?>
                                 <tr>
                                    <td colspan="5"><div class="text-danger font-weight-bold text-center">Data Berkas Masih Kosong!.</div></td>
                                 </tr>
                              <?php endif; ?>
                            </tbody>
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
                     <?php if($siswa->status_pendaftaran == 0) : ?>
                    <button  data-toggle="modal" data-target="#formModalSimpan" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>
                     <?php endif; ?>
                  </div>
                </div>
                <!-- /Button Apply -->
             </div>
         </div>
      </div>
   </div>
</div>


<?php if($siswa->status_pendaftaran == 0) : ?>
<!-- Modal Pendaftaran -->
<div class="modal fade" id="formModalPendaftaran" tabindex="-1" aria-labelledby="formModalLabelPendaftaran" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelPendaftaran">Ubah Data Diri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
        <?= form_open('/siswa/updatePendaftaran'); ?>
        <?= csrf_field() ?>
        <input type="hidden" name="id_siswa" value="<?= $siswa->idSiswa; ?>">
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
        <div class="form-group">
         <label for="id_jurusan">Jurusan <p class="text-danger font-weight-bold">(Jika Ada)</p></label>
         <select name="id_jurusan" id="id_jurusan" class="form-control">
            <option value="">-- Tidak Ada --</option>
            <?php foreach($jurusan as $jr) : ?>
               <?php if($jr->id == $siswa->id_jurusan) : ?>
                  <option value="<?= $jr->id; ?>" selected><?= $jr->jurusan; ?></option>
                  <?php else: ?>
                  <option value="<?= $jr->id; ?>"><?= $jr->jurusan; ?></option>
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
        <input type="hidden" name="id_siswa" value="<?= $siswa->idSiswa; ?>">
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
        <input type="hidden" name="id_siswa" value="<?= $siswa->idSiswa; ?>">
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
              <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?= $siswa->tgl_lahir; ?>">
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

<!-- Modal Update Data Ayah -->
<div class="modal fade" id="formModalAyah" tabindex="-1" aria-labelledby="formModalLabelAyah" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelAyah">Ubah Data Ayah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('/siswa/ubahAyah'); ?>
        <?= csrf_field() ?>
        <input type="hidden" name="id_siswa" value="<?= $siswa->idSiswa; ?>">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="nik_ayah">NIK Ayah</label>
              <input type="text" name="nik_ayah" id="nik_ayah" class="form-control" value="<?= $siswa->nik_ayah; ?>">
            </div>
            <div class="form-group">
              <label for="nama_ayah">Nama Ayah</label>
              <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" value="<?= $siswa->nama_ayah; ?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
              <select name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control">
               <option value="">-- Pilih Pekerjaan --</option>
               <?php foreach($pekerjaan as $p) : ?>
                <?php if($p->pekerjaan == $siswa->pekerjaan_ayah): ?>
               <option value="<?= $p->pekerjaan ?>" selected><?= $p->pekerjaan ?></option>
               <?php else: ?>
               <option value="<?= $p->pekerjaan ?>"><?= $p->pekerjaan ?></option>
               <?php endif; ?>
             <?php endforeach; ?>
             </select>
            </div>
            <div class="form-group">
              <label for="pendidikan_ayah">Pendidikan Ayah</label>
              <select name="pendidikan_ayah" id="pendidikan_ayah" class="form-control">
               <option value="">-- Pilih Pendidikan --</option>
               <?php foreach($pendidikan as $p) : ?>
                <?php if($p->pendidikan == $siswa->pendidikan_ayah): ?>
               <option value="<?= $p->pendidikan ?>" selected><?= $p->pendidikan ?></option>
               <?php else: ?>
               <option value="<?= $p->pendidikan ?>"><?= $p->pendidikan ?></option>
               <?php endif; ?>
             <?php endforeach; ?>
             </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="penghasilan_ayah">Penghasilan Ayah</label>
              <select name="penghasilan_ayah" id="penghasilan_ayah" class="form-control">
               <option value="">-- Pilih Penghasilan --</option>
               <?php foreach($penghasilan as $p) : ?>
                <?php if($p->penghasilan == $siswa->penghasilan_ayah): ?>
               <option value="<?= $p->penghasilan ?>" selected><?= number_format($p->penghasilan,0, ',', '.') ?></option>
               <?php else: ?>
               <option value="<?= $p->penghasilan ?>"><?= number_format($p->penghasilan,0, ',', '.') ?></option>
               <?php endif; ?>
             <?php endforeach; ?>
             </select>
            </div>
            <div class="form-group">
              <label for="telp_ayah">Telpon Ayah</label>
              <input type="number" name="telp_ayah" id="telp_ayah" class="form-control" value="<?= $siswa->telp_ayah; ?>">
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

<!-- Modal Update Data Ibu -->
<div class="modal fade" id="formModalIbu" tabindex="-1" aria-labelledby="formModalLabelIbu" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelIbu">Ubah Data Ibu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('/siswa/ubahIbu'); ?>
        <?= csrf_field() ?>
        <input type="hidden" name="id_siswa" value="<?= $siswa->idSiswa; ?>">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="nik_ibu">NIK Ibu</label>
              <input type="text" name="nik_ibu" id="nik_ibu" class="form-control" value="<?= $siswa->nik_ibu; ?>">
            </div>
            <div class="form-group">
              <label for="nama_ibu">Nama Ibu</label>
              <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" value="<?= $siswa->nama_ibu; ?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
              <select name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control">
               <option value="">-- Pilih Pekerjaan --</option>
               <?php foreach($pekerjaan as $p) : ?>
                <?php if($p->pekerjaan == $siswa->pekerjaan_ibu): ?>
               <option value="<?= $p->pekerjaan ?>" selected><?= $p->pekerjaan ?></option>
               <?php else: ?>
               <option value="<?= $p->pekerjaan ?>"><?= $p->pekerjaan ?></option>
               <?php endif; ?>
             <?php endforeach; ?>
             </select>
            </div>
            <div class="form-group">
              <label for="pendidikan_ibu">Pendidikan Ibu</label>
              <select name="pendidikan_ibu" id="pendidikan_ibu" class="form-control">
               <option value="">-- Pilih Pendidikan --</option>
               <?php foreach($pendidikan as $p) : ?>
                <?php if($p->pendidikan == $siswa->pendidikan_ibu): ?>
               <option value="<?= $p->pendidikan ?>" selected><?= $p->pendidikan ?></option>
               <?php else: ?>
               <option value="<?= $p->pendidikan ?>"><?= $p->pendidikan ?></option>
               <?php endif; ?>
             <?php endforeach; ?>
             </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="penghasilan_ibu">Penghasilan Ibu</label>
              <select name="penghasilan_ibu" id="penghasilan_ibu" class="form-control">
               <option value="">-- Pilih Penghasilan --</option>
               <?php foreach($penghasilan as $p) : ?>
                <?php if($p->penghasilan == $siswa->penghasilan_ibu): ?>
               <option value="<?= $p->penghasilan ?>" selected><?= number_format($p->penghasilan,0, ',', '.') ?></option>
               <?php else: ?>
               <option value="<?= $p->penghasilan ?>"><?= number_format($p->penghasilan,0, ',', '.') ?></option>
               <?php endif; ?>
             <?php endforeach; ?>
             </select>
            </div>
            <div class="form-group">
              <label for="telp_ibu">Telpon Ibu</label>
              <input type="number" name="telp_ibu" id="telp_ibu" class="form-control" value="<?= $siswa->telp_ibu; ?>">
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

<!-- Modal Update Data Sekolah Asal -->
<div class="modal fade" id="formModalSekolah" tabindex="-1" aria-labelledby="formModalLabelSekolah" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelSekolah">Ubah Data Sekolah Asal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('/siswa/ubahSekolah'); ?>
        <?= csrf_field() ?>
        <input type="hidden" name="id_siswa" value="<?= $siswa->idSiswa; ?>">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_sekolah">Nama Sekolah</label>
              <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control" value="<?= $siswa->nama_sekolah; ?>">
            </div>
            <div class="form-group">
              <label for="tahun_lulus">Tahun Lulus</label>
              <select name="tahun_lulus" id="tahun_lulus" class="form-control">
                <option value="">-- Pilih Tahun --</option>
                <?php for($i = 2015; $i < date('Y'); $i++) : ?>
                  <?php if($i == $siswa->tahun_lulus) : ?>
                    <option value="<?= $i; ?>" selected><?= $i ?></option>
                    <?php else: ?>
                    <option value="<?= $i; ?>"><?= $i ?></option>
                  <?php endif; ?>
                <?php endfor; ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="no_izajah">No.Ijazah</label>
              <input type="number" name="no_izajah" id="no_izajah" class="form-control" value="<?= $siswa->no_izajah; ?>">
            </div>
            <div class="form-group">
              <label for="no_skhun">No.SKHUN</label>
              <input type="number" name="no_skhun" id="no_skhun" class="form-control" value="<?= $siswa->no_skhun; ?>">
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

<!-- Modal Update Data Alamat -->
<div class="modal fade" id="formModalAlamat" tabindex="-1" aria-labelledby="formModalLabelAlamat" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelAlamat">Ubah Data Alamat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('/siswa/ubahAlamat'); ?>
        <?= csrf_field() ?>
        <input type="hidden" name="id_siswa" value="<?= $siswa->idSiswa; ?>">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="provinsi">Provinsi</label>
              <select name="provinsi" id="provinsi" class="form-control">
                <option value="">-- Pilih Provinsi --</option>
                <?php foreach($provinsi as $p) : ?>
                  <option value="<?= $p['id_provinsi']; ?>"><?= $p['provinsi']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="kabupaten">kabupaten</label>
              <select name="kabupaten" id="kabupaten" class="form-control">
                 
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="kecamatan">kecamatan</label>
              <input type="text" name="kecamatan" id="kecamatan" class="form-control" value="<?= $siswa->kecamatan; ?>">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $siswa->alamat; ?>">
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

<!-- Modal Tambah Berkas Lampiran -->
<div class="modal fade" id="formModalBerkas" tabindex="-1" aria-labelledby="formModalLabelBerkas" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelBerkas">Tambah Berkas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('/siswa/insertBerkas'); ?>
        <?= csrf_field() ?>
        <input type="hidden" name="id_siswa" value="<?= $siswa->idSiswa; ?>">
        <div class="form-group">
           <label for="lampiran">Lampiran</label>
           <select name="lampiran" id="lampiran" required class="form-control">
               <option value="">-- Pilih Lampiran --</option>
               <?php foreach($lampiran as $l) : ?>
                  <option value="<?= $l->id ?>"><?= $l->lampiran ?></option>
               <?php endforeach; ?>
           </select>
        </div>
        <div class="form-group">
           <label for="ket_berkas">Keterangan</label>
           <input type="text" name="ket_berkas" id="ket_berkas" class="form-control" required>
        </div>
        <div class="form-group">
           <label for="berkas">Upload Berkas</label>
           <input type="file" name="berkas" id="berkas" accept=".pdf" class="form-control-file" required><br>
           <span class="muted text-danger">Wajib .PDF</span>
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



<!-- Modal Simpan Data -->
<div class="modal fade" id="formModalSimpan" tabindex="-1" aria-labelledby="formModalLabelSimpan" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelSimpan">Peringatan !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="bg-info p-3 rounded text-light" role="alert"><i class="fa fa-info-circle"></i> Data pendaftaran yang sudah dikirim tidak dapat diganti lagi, pastikan data sudah benar!.</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="<?= base_url('siswa/simpanPendaftaran/' . $siswa->idSiswa); ?>" class="btn btn-primary">Kirim</a>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<script src="/assets/js/core/jquery.min.js"></script>
<script>

  $(function() {
    $('select[name=provinsi]').change(function() {
      const id_provinsi = $(this).val();
      // console.log(id_provinsi);

      if(id_provinsi) {
        $.ajax({
          url: 'http://localhost:8080/siswa/getIDProvinsi/' + id_provinsi,
          type: 'get',
          dataType: 'json',
          success: function(data) {
            console.log(JSON.stringify(data));
            $('select[name=kabupaten]').empty();
            $.each(data, function(key, value) {
              $('select[name=kabupaten]').append(`<option value="`+ value.id_kabupaten +`">`+ value.nama_kabupaten +`</option>`);
           });
          }
        })
      }
    })
  })
</script>

<?= $this->endSection(); ?>