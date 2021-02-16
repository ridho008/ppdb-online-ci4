<?= $this->extend('layouts/app-back'); ?>

<?= $this->section('content'); ?>
<?php
$logo = [
   'name' => 'logo',
   'id' => 'logo',
];
?>
<div class="row">
   <div class="col-md-4">
      <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Logo</h4>
          </div>
          <div class="card-body">
             <img src="/img/<?= $setting['logo']; ?>" class="img-fluid" id="gambar_load">
             <?= form_open_multipart('/admin/uploadLogo/' . $setting['id']); ?>
             <div class="form-group">
                <?= form_label('Ganti Logo', 'logo'); ?>
                <input type="hidden" name="logoLama" value="<?= $setting['logo']; ?>">
                <?= form_upload($logo); ?>
                <small class="muted text-danger"><?= $validation->getError('logo'); ?></small>
             </div>
             <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Ganti</button>
             </div>
             <?= form_close(); ?>
          </div>
      </div>
   </div>
   <div class="col-md-8">
      <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Data Sekolah</h4>
          </div>
          <div class="card-body">
             <?= form_open('/admin/pengaturan/' . $setting['id']); ?>
             <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                      <label for="nama_sekolah">Nama Sekolah</label>
                      <input type="text" name="nama_sekolah" id="nama_sekolah" value="<?= $setting['nama_sekolah'] ?>" class="form-control">
                      <small class="muted text-danger"><?= $validation->getError('nama_sekolah'); ?></small>
                   </div>
                   <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email" value="<?= $setting['email'] ?>" class="form-control">
                      <small class="muted text-danger"><?= $validation->getError('email'); ?></small>
                   </div>
                   <div class="form-group">
                      <label for="web">Web</label>
                      <input type="text" name="web" id="web" value="<?= $setting['web'] ?>" class="form-control">
                      <small class="muted text-danger"><?= $validation->getError('web'); ?></small>
                   </div>
                   <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                      <textarea name="deskripsi" id="deskripsi" class="form-control"><?= $setting['deskripsi']; ?></textarea>
                      <small class="muted text-danger"><?= $validation->getError('deskripsi'); ?></small>
                   </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input type="text" name="alamat" id="alamat" value="<?= $setting['alamat'] ?>" class="form-control">
                      <small class="muted text-danger"><?= $validation->getError('alamat'); ?></small>
                   </div>
                   <div class="form-group">
                      <label for="kecamatan">Kecamatan</label>
                      <input type="text" name="kecamatan" value="<?= $setting['kecamatan'] ?>" id="kecamatan" class="form-control">
                      <small class="muted text-danger"><?= $validation->getError('kecamatan'); ?></small>
                   </div>
                   <div class="form-group">
                      <label for="kabupaten">Kabupaten</label>
                      <input type="text" name="kabupaten" id="kabupaten" value="<?= $setting['kabupaten'] ?>" class="form-control">
                      <small class="muted text-danger"><?= $validation->getError('kabupaten'); ?></small>
                   </div>
                   <div class="form-group">
                      <label for="no_telp">Telepon</label>
                      <input type="text" name="no_telp" value="<?= $setting['no_telp'] ?>" id="no_telp" class="form-control">
                      <small class="muted text-danger"><?= $validation->getError('no_telp'); ?></small>
                   </div>
                </div>
             </div>
             <div class="row">
                <div class="col-md">
                   <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Ganti</button>
                   </div>
                </div>
             </div>
             <?= form_close(); ?>
          </div>
      </div>
   </div>
</div>
<?= $this->endSection(); ?>