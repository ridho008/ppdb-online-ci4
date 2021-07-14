<?= $this->extend('layouts/app-back'); ?>

<?= $this->section('content'); ?>
<div class="row">
   <div class="col-md-12">
      <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Data Laporan Pendaftaran</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                   <tr>
                      <th>No</th>
                      <th>Tahun</th>
                      <th>Tahun Ajaran</th>
                      <th><i class="material-icons">settings</i></th>
                   </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach($ta as $tahun) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $tahun->tahun; ?></td>
                      <td><?= $tahun->ta; ?></td>
                      <td>
                        <a href="<?= base_url('admin/cetakLaporan/' . $tahun->tahun); ?>" class="btn btn-primary btn-sm" target="_blank"><i class="material-icons">print</i>Cetak</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
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