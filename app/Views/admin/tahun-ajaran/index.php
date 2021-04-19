<?= $this->extend('layouts/app-back'); ?>

<?= $this->section('content'); ?>
<div class="row">
   <div class="col-md-3">
      <button type="button" class="btn btn-primary" id="formTahunTambah" data-toggle="modal" data-target="#formModalTambahTahun">
        Tambah Tahun Ajaran
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
            <h4 class="card-title ">Data Tahun Ajaran</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                   <tr>
                      <th>No</th>
                      <th>Tahun</th>
                      <th>Tahun Ajaran</th>
                      <th>Status</th>
                      <th>Aktif/Non</th>
                      <th><i class="material-icons">settings</i></th>
                   </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach($tahun as $key => $p) : ?>
                  <tr>
                     <td><?= $offset + $key + 1; ?></td>
                     <td><?= $p->tahun; ?></td>
                     <td><?= $p->ta; ?></td>
                     <td>
                       <?php if($p->status == 1) : ?>
                        <small class="badge badge-primary">Aktif</small>
                        <?php else: ?>
                        <small class="badge badge-warning">Non Aktif</small>
                       <?php endif; ?>
                     </td>
                     <td>
                       <?php if($p->status == 1) : ?>
                        <a href="/tahunAjaran/statusNonaktif/<?= $p->id ?>" class="btn btn-danger btn-sm">NonAktifkan</a>
                        <?php else: ?>
                          <a href="/tahunAjaran/statusAktif/<?= $p->id ?>" class="btn btn-info btn-sm">Aktifkan</a>
                        <?php endif; ?>
                     </td>
                     <td>
                        <button type="button" class="btn btn-success btn-sm formTahunEdit" data-toggle="modal" data-target="#formModalTambahTahun" data-tahun="<?= $p->tahun ?>">
                          <i class="material-icons">mode_edit</i>
                        </button>
                         <?= form_open('/tahunAjaran/delete/'.$p->id); ?>
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
$ta = [
   'name' => 'ta',
   'class' => 'form-control',
   'id' => 'ta'
];
?>
<div class="modal fade" id="formModalTambahTahun" tabindex="-1" aria-labelledby="formModalLabelTahun" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelTahun">Tambah Data Tahun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('/tahunAjaran/create'); ?>
        <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
        <div class="form-group">
           <input type="hidden" name="id" id="id">
           <?= form_label('Tahun', 'tahun'); ?>
           <select name="tahun" id="tahun" class="form-control">
             <option value="">-- Pilih Tahun --</option>
             <?php for($i = 2019; $i <= date('Y'); $i++) : ?>
              <option value="<?= $i; ?>" <?= (date('Y')) ? 'selected' : '' ?>><?= $i; ?></option>
             <?php endfor; ?>
           </select>
        </div>
        <div class="form-group">
           <?= form_label('Tahun Ajaran', 'ta'); ?>
           <?= form_input($ta); ?>
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