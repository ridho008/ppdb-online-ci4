<?= $this->extend('layouts/app-front'); ?>
<?= $this->section('layouts/navbarFront'); ?>

<?= $this->section('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img src="/img/slide1.png" class="d-block w-100" alt="..." height="480px">
			    </div>
			    <div class="carousel-item">
			      <img src="/img/slide2.jpg" class="d-block w-100" alt="..." height="480px">
			    </div>
			    <div class="carousel-item">
			      <img src="/img/slide3.jpg" class="d-block w-100" alt="..." height="480px">
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
	</div>
</div>
<?= $this->endSection(); ?>