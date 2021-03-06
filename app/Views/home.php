<?php 
$db = \Config\Database::connect();
$ta = $db->table('tahun_ajaran')
              ->where('status', 1)
              ->get()->getRowArray();

// $tahunNon = $db->table('tahun_ajaran')
//               ->where('status', 0)
//               ->get()->getResult();

?>
<?= $this->extend('layouts/app-front'); ?>
<?= $this->section('layouts/navbarFront'); ?>

<?= $this->section('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			  	<?php 
			  	$arrActice = [1,2,3];
			  	// var_dump($arrActice[0]);
			  	?>
			  	<?php foreach($banner as $key => $ban) : ?>
			  		<?= var_dump($key); ?>
			    <div class="carousel-item <?= ($key == 0) ? 'active' : '' ?>">
			      <img src="/img/<?= $ban->banner; ?>" class="d-block w-100" alt="..." height="450px">
			    </div>
			 <?php endforeach; ?>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
		<div class="col-md-4">
		   <?php if($ta['status'] <> 1) { ?>
		   <h5 class="card-title"><strong>Pendaftaran Ditutup</strong></h5>
		   <?php } else { ?>
		   <h5 class="card-title">Tahun Ajaran <?= $ta['ta'] ?></h5>
			<?php } ?>
			<div class="card">
			    <div class="card-header card-header-primary">
			      <h5 class="card-title">Estimasi Pendaftaran Tahun <?= date('Y') ?></h5>
			    </div>
			    <div class="card-body">
			    	<ul class="list-group list-group-flush">
			    	  <li class="list-group-item">
			    	  	<div class="media">
			    	  	  <i class="material-icons">delete_forever</i>
			    	  	  <div class="media-body">
			    	  	    <h5 class="mt-0"><?= $jmlPendaftaran ?> Jumlah Pendaftaran</h5>
			    	  	  </div>
			    	  	</div>
			    	  </li>
			    	  <li class="list-group-item">
			    	  	<div class="media">
			    	  	  <i class="material-icons">delete_forever</i>
			    	  	  <div class="media-body">
			    	  	    <h5 class="mt-0"><?= $jkPria ?> Jumlah Pria</h5>
			    	  	  </div>
			    	  	</div>
			    	  </li>
			    	  <li class="list-group-item">
			    	  	<div class="media">
			    	  	  <i class="material-icons">delete_forever</i>
			    	  	  <div class="media-body">
			    	  	    <h5 class="mt-0"><?= $jkPerempuan ?> Jumlah Perempuan</h5>
			    	  	  </div>
			    	  	</div>
			    	  </li>
			    	</ul>
			      <a href="/pendaftaran" class="btn btn-primary btn-block">Daftar Sekarang</a>
			    </div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Beranda</div>
				<div class="card-body">
					<?php if(!empty($beranda['beranda'])) : ?>
					<?= $beranda['beranda']; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>