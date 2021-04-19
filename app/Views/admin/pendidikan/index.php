<?= $this->extend('layouts/app-back'); ?>

<?= $this->section('content'); ?>
<div class="row">
   <div class="col-md-3">
      <button type="button" class="btn btn-primary" id="formPendidikanTambah" data-toggle="modal" data-target="#formModalTambahPendidikan">
        Tambah Pendidikan
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
            <h4 class="card-title ">Data Pendidikan</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                   <tr>
                      <th>No</th>
                      <th>Pendidikan</th>
                      <th><i class="material-icons">settings</i></th>
                   </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach($pendidikan as $key => $p) : ?>
                  <tr>
                     <td><?= $offset + $key + 1; ?></td>
                     <td><?= $p->pendidikan; ?></td>
                     <td>
                        <button type="button" class="btn btn-success btn-sm formPendidikanEdit" data-toggle="modal" data-target="#formModalTambahPendidikan" data-pendidikan="<?= $p->pendidikan ?>">
                          <i class="material-icons">mode_edit</i>
                        </button>
                         <?= form_open('/pendidikan/delete/'.$p->id); ?>
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
$pendidikan = [
   'name' => 'pendidikan',
   'class' => 'form-control',
   'id' => 'pendidikan'
];
?>
<div class="modal fade" id="formModalTambahPendidikan" tabindex="-1" aria-labelledby="formModalLabelPendidikan" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelPendidikan">Tambah Data Pendidikan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('/pendidikan/create'); ?>
        <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
        <div class="form-group">
           <input type="hidden" name="id" id="id">
           <?= form_label('pendidikan', 'pendidikan'); ?>
           <?= form_input($pendidikan); ?>
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