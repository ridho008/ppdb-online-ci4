<?= $this->extend('layouts/app-back'); ?>

<?= $this->section('content'); ?>
<div class="row">
   <div class="col-md-3">
      <button type="button" class="btn btn-primary" id="formJalurTambah" data-toggle="modal" data-target="#formModalTambahJalur">
        Tambah Jalur Masuk
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
            <h4 class="card-title ">Data Jalur Masuk</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                   <tr>
                      <th>No</th>
                      <th>Jalur Masuk</th>
                      <th>Kouta</th>
                      <th><i class="material-icons">settings</i></th>
                   </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach($jalur as $key => $p) : ?>
                  <tr>
                     <td><?= $offset + $key + 1; ?></td>
                     <td><?= $p->jalur_masuk; ?></td>
                     <td><?= $p->kouta; ?></td>
                     <td>
                        <button type="button" class="btn btn-success btn-sm formJalurEdit" data-toggle="modal" data-target="#formModalTambahJalur" data-id="<?= $p->id ?>">
                          <i class="material-icons">mode_edit</i>
                        </button>
                         <?= form_open('/jalurMasuk/delete/'.$p->id); ?>
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
$jalur_masuk = [
   'name' => 'jalur_masuk',
   'class' => 'form-control',
   'id' => 'jalur_masuk'
];

$kouta = [
   'name' => 'kouta',
   'class' => 'form-control',
   'id' => 'kouta',
   'type' => 'number'
];
?>
<div class="modal fade" id="formModalTambahJalur" tabindex="-1" aria-labelledby="formModalLabelJalur" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelJalur">Tambah Data Jalur Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('/jalurMasuk/create'); ?>
        <input type="hidden" name="id" id="id">
        <div class="form-group">
           <?= form_label('Jalur Masuk', 'jalur_masuk'); ?>
           <?= form_input($jalur_masuk); ?>
        </div>
        <div class="form-group">
           <?= form_label('Kouta', 'kouta'); ?>
           <?= form_input($kouta); ?>
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