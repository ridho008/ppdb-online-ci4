<?= $this->extend('layouts/app-front'); ?>
<?= $this->section('layouts/navbarFront'); ?>

<?= $this->section('content'); ?>
<?php
$nisn = [
	'name' => 'nisn',
	'id' => 'nisn',
	'type' => 'number',
	'class' => 'form-control',
	'autofocus' => 'on'
];
$password = [
	'name' => 'password',
	'id' => 'password',
	'class' => 'form-control'
];
$submit = [
	'name' => 'submit',
	'value' => 'Masuk',
	'type' => 'submit',
	'class' => 'btn btn-primary btn-block'
];
?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<img src="/img/thumb/undraw_welcome_cats_thqn.svg" class="img-fluid mt-5">
		</div>
		<div class="col-md-6">
			<?= form_open('/auth/loginSiswa'); ?>
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">Halaman Login Siswa</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<p class="text-danger">Gunakan Nisn sebagai password.</p>
								<div class="form-group">
									<?= form_label('Nisn', 'nisn'); ?>
									<?= form_input($nisn); ?>
									<small class="muted text-danger"><?= $validation->getError('nisn'); ?></small>
								</div>
								<div class="form-group">
									<?= form_label('Password', 'password'); ?>
									<?= form_password($password); ?>
									<small class="muted text-danger"><?= $validation->getError('password'); ?></small>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary btn-block">Masuk</button>
							</div>
							<p>Belum punya akun ? <a href="/pendaftaran">Daftar Akun</a></p>
						</div>
					</div>
				</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>