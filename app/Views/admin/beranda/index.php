<?= $this->extend('layouts/app-back'); ?>

<?= $this->section('head'); ?>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">Pengaturan Beranda</h4>
      </div>
      <div class="card-body">
        <form method="post" action="/admin/beranda">
          <div class="form-group">
            <textarea id="summernote" name="beranda"><?= $beranda['beranda']; ?></textarea>
            <small class="muted text-danger"><?= $validation->getError('beranda'); ?></small>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#summernote').summernote();
    });
  </script>
<?= $this->endSection(); ?>