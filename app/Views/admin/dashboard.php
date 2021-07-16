<?= $this->extend('layouts/app-back'); ?>

<?= $this->section('content'); ?>
<div class="row">
   <div class="col-lg-3 col-md-6 col-sm-6">
     <div class="card card-stats">
       <div class="card-header card-header-warning card-header-icon">
         <div class="card-icon">
           <i class="material-icons">manage_accounts</i>
         </div>
         <p class="card-category">Pengguna</p>
         <h3 class="card-title"><?= $user ?></h3>
       </div>
       <div class="card-footer">
         <div class="stats">
           <i class="material-icons text-primary">remove_red_eye</i>
           <a href="<?= base_url('user') ?>">Lihat Semua</a>
         </div>
       </div>
     </div>
   </div>
   <div class="col-lg-3 col-md-6 col-sm-6">
     <div class="card card-stats">
       <div class="card-header card-header-success card-header-icon">
         <div class="card-icon">
           <i class="material-icons">archive</i>
         </div>
         <p class="card-category">Masuk</p>
         <h3 class="card-title"><?= $masuk ?></h3>
       </div>
       <div class="card-footer">
         <div class="stats">
           <i class="material-icons text-primary">remove_red_eye</i>
           <a href="<?= base_url('admin/masuk') ?>">Lihat Semua</a>
         </div>
       </div>
     </div>
   </div>
   <div class="col-lg-3 col-md-6 col-sm-6">
     <div class="card card-stats">
       <div class="card-header card-header-danger card-header-icon">
         <div class="card-icon">
           <i class="material-icons">dangerous</i>
         </div>
         <p class="card-category">Tolak</p>
         <h3 class="card-title"><?= $tolak ?></h3>
       </div>
       <div class="card-footer">
         <div class="stats">
           <i class="material-icons text-primary">remove_red_eye</i>
           <a href="<?= base_url('admin/tolak') ?>">Lihat Semua</a>
         </div>
       </div>
     </div>
   </div>
   <div class="col-lg-3 col-md-6 col-sm-6">
     <div class="card card-stats">
       <div class="card-header card-header-info card-header-icon">
         <div class="card-icon">
           <i class="material-icons">check_circle</i>
         </div>
         <p class="card-category">Terima</p>
         <h3 class="card-title"><?= $terima ?></h3>
       </div>
       <div class="card-footer">
         <div class="stats">
           <i class="material-icons text-primary">remove_red_eye</i>
           <a href="<?= base_url('admin/terima') ?>">Lihat Semua</a>
         </div>
       </div>
     </div>
   </div>
 </div>
<?= $this->endSection(); ?>