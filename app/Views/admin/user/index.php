<?= $this->extend('layouts/app-back'); ?>

<?= $this->section('content'); ?>
<div class="row">
   <div class="col-md-3">
      <button type="button" class="btn btn-primary" id="formUserTambah" data-toggle="modal" data-target="#formModalTambahUser">
        Tambah User
      </button>
   </div>
   <div class="col-md-3">
     <form class="navbar-form" method="post">
        <div class="input-group no-border">
          <input type="text" value="<?= ($keyword) ? $keyword : '' ?>" name="keyword" class="form-control" placeholder="Cari...">
          <button type="submit" class="btn btn-white btn-round btn-just-icon">
            <i class="material-icons">search</i>
            <div class="ripple-container"></div>
          </button>
        </div>
      </form>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Data User</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                   <tr>
                      <th>No</th>
                      <th>Foto</th>
                      <th>Password</th>
                      <th>Username</th>
                      <th>Nama</th>
                      <th><i class="material-icons">settings</i></th>
                   </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach($user as $key => $p) : ?>
                  <tr>
                     <td><?= $offset + $key + 1; ?></td>
                     <td>
                       <img src="img/user/<?= $p->foto ?>" width="100">
                     </td>
                     <td><?= $p->password; ?></td>
                     <td><?= $p->username; ?></td>
                     <td><?= $p->nama; ?></td>
                     <td>
                        <button type="button" class="btn btn-success btn-sm formUserEdit" data-toggle="modal" data-target="#formModalTambahUser" data-username="<?= $p->username ?>">
                          <i class="material-icons">mode_edit</i>
                        </button>
                         <?= form_open('/user/delete/'.$p->id); ?>
                         <?= csrf_field(); ?>
                         <?= form_hidden('_method', 'DELETE'); ?>
                         <button type="submit" class="btn btn-danger btn-sm"><i class="material-icons">delete_forever</i></button>
                         <?= form_close(); ?>
                     </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?= \Config\Services::pager()->makeLinks($page, $perPage, $total, 'custom_pagination') ?>
          </div>
      </div>
   </div>
</div>

<!-- Modal Tambah Pekerjaan -->
<?php 
$username = [
   'name' => 'username',
   'class' => 'form-control',
   'id' => 'username'
];
$password = [
   'name' => 'password',
   'class' => 'form-control',
   'id' => 'password'
];
$nama = [
   'name' => 'nama',
   'class' => 'form-control',
   'id' => 'nama'
];
?>
<div class="modal fade" id="formModalTambahUser" tabindex="-1" aria-labelledby="formModalLabelUser" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelUser">Tambah Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('/user/create'); ?>
        <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
        <div class="form-group">
           <input type="hidden" name="id" id="id">
           <?= form_label('Username', 'username'); ?>
           <?= form_input($username); ?>
        </div>
        <div class="form-group">
           <?= form_label('Password', 'password'); ?>
           <?= form_password($password); ?>
        </div>
        <div class="form-group">
           <?= form_label('Nama', 'nama'); ?>
           <?= form_input($nama); ?>
        </div>
        <div class="form-group">
           <?= form_label('Foto', 'foto'); ?><br>
           <img src="" alt="" id="priviewImg" width="100px">
           <input type="file" name="foto" id="foto" class="form-control">
           <input type="hidden" name="fotoLama" id="fotoLama" class="form-control">
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