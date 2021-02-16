<?= $this->extend('layouts/app-front'); ?>
<?= $this->section('layouts/navbarFront'); ?>

<?= $this->section('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img src="/img/slide1.png" class="d-block w-100" alt="..." height="450px">
			    </div>
			    <div class="carousel-item">
			      <img src="/img/slide2.jpg" class="d-block w-100" alt="..." height="450px">
			    </div>
			    <div class="carousel-item">
			      <img src="/img/slide3.jpg" class="d-block w-100" alt="..." height="450px">
			    </div>
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
			<div class="card">
			    <div class="card-header card-header-primary">
			      <h4 class="card-title ">Daftar Pendaftaran</h4>
			    </div>
			    <div class="card-body">
			    	<ul class="list-group list-group-flush">
			    	  <li class="list-group-item">
			    	  	<div class="media">
			    	  	  <i class="material-icons">delete_forever</i>
			    	  	  <div class="media-body">
			    	  	    <h5 class="mt-0">0 Jumlah Pendaftaran</h5>
			    	  	  </div>
			    	  	</div>
			    	  </li>
			    	  <li class="list-group-item">
			    	  	<div class="media">
			    	  	  <i class="material-icons">delete_forever</i>
			    	  	  <div class="media-body">
			    	  	    <h5 class="mt-0">0 Jumlah Pria</h5>
			    	  	  </div>
			    	  	</div>
			    	  </li>
			    	  <li class="list-group-item">
			    	  	<div class="media">
			    	  	  <i class="material-icons">delete_forever</i>
			    	  	  <div class="media-body">
			    	  	    <h5 class="mt-0">0 Jumlah Perempuan</h5>
			    	  	  </div>
			    	  	</div>
			    	  </li>
			    	</ul>
			      
			      
			      
			      <a href="" class="btn btn-primary btn-block">Daftar Sekarang</a>
			    </div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>