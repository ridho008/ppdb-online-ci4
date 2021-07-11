<?= $this->extend('layouts/app-back'); ?>

<?= $this->section('content'); ?>
<div class="container">
   <div class="row">
      <div class="col-md-6">
          <h4 class="display-4">Formulir Pendaftaran Peserta Didik <strong><?= $siswa->nama ?></strong></h4>
      </div>
      <div class="col-md-3 offset-3">
        <a href="<?= base_url('admin/masuk') ?>" class="btn btn-primary btn-xs">
          <i class="fa fa-backward"></i> Kembali
        </a>
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
                       </div>
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title text-center" style="display: inline-block;">Identitas Peserta Didik</h4>
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
             </div>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection(); ?>