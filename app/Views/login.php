<?= $this->extend('layouts/app-front'); ?>
<?= $this->section('layouts/navbarFront'); ?>

<?= $this->section('content'); ?>
<?php
$username = [
	'name' => 'username',
	'id' => 'username',
	'class' => 'form-control'
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
		<div class="col-md-4 offset-md-4 mt-5">
			<?= form_open('/auth'); ?>
			<div class="card">
				<div class="card-header card-header-primary">
					<h4 class="card-title text-center">Halaman Login</h4>
				</div>
				<div class="card-body">
					<?php 
					$session = session();
					$errors = $session->getFlashdata('errors');
					$success = $session->getFlashdata('success');
					?>
					<?php if($errors != null) : ?>
						<?php foreach ($errors as $error) : ?>
							<ul>
				      		<li>
									<div class="alert alert-danger" role="alert">
				      				<?= $error ?>
			      				</div>
				      		</li>
					      </ul>
					   <?php endforeach ?>
					<?php endif; ?>
					<div class="form-group">
						<?= form_label('Username', 'username'); ?>
						<?= form_input($username); ?>
					</div>
					<div class="form-group">
						<?= form_label('Password', 'password'); ?>
						<?= form_password($password); ?>
					</div>
					<div class="form-group">
						<?= form_submit($submit); ?>
					</div>
				</div>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>