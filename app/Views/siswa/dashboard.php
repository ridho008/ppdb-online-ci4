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
                    <th><a href="" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a></th>
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

<?= $this->endSection(); ?>