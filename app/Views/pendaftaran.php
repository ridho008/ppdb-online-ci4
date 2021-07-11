<?php 
$db = \Config\Database::connect();
$ta = $db->table('tahun_ajaran')
              ->where('status', 1)
              ->get()->getRowArray();
?>
<?= $this->extend('layouts/app-front'); ?>
<?= $this->section('layouts/navbarFront'); ?>

<?= $this->section('content'); ?>

<?php if($ta['status'] == 1) : ?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php if($ta['status'] <> 1) { ?>
	      <h4 class="card-title"><strong>Pendaftaran Ditutup</strong></h4>
	      <?php } else { ?>
	      <h4 class="card-title">Tahun Ajaran <?= $ta['ta'] ?></h4>
	   	<?php } ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<img src="img/thumb/undraw_welcome_cats_thqn.svg" class="img-fluid mt-5">
		</div>
		<div class="col-md-6">
			<?= form_open('/pendaftaran'); ?>
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">Pendaftaran</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nisn">NISN</label>
									<input type="number" class="form-control" name="nisn" id="nisn" value="<?= (old('nisn')) ? old('nisn') : '' ?>">
									<small class="muted text-danger"><?= $validation->getError('nisn'); ?></small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="nama">Nama Lengkap</label>
									<input type="text" class="form-control" name="nama" id="nama" value="<?= (old('nama')) ? old('nama') : '' ?>">
									<small class="muted text-danger"><?= $validation->getError('nama'); ?></small>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="tmp_lahir">Tempat Lahir</label>
									<input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" value="<?= (old('tmp_lahir')) ? old('tmp_lahir') : '' ?>">
									<small class="muted text-danger"><?= $validation->getError('tmp_lahir'); ?></small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="jalur_masuk">Jalur Masuk</label>
									<select name="jalur_masuk" id="jalur_masuk" class="form-control">
										<option value="">-- Jalur Masuk --</option>
										<?php foreach($jalur as $j) : ?>
											<option value="<?= $j->id_jalur; ?>"><?= $j->jalur_masuk; ?></option>
										<?php endforeach; ?>
									</select>
									<small class="muted text-danger"><?= $validation->getError('jalur_masuk'); ?></small>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="tgl">Tanggal</label>
									<select name="tgl" id="tgl" class="form-control">
										<option value="">-- Pilih Tanggal --</option>
										<?php for($i = 1; $i <= 31; $i++) : ?>
										 <option value="<?= $i; ?>"><?= $i; ?></option>
										<?php endfor; ?>
									</select>
									<small class="muted text-danger"><?= $validation->getError('tgl'); ?></small>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="bulan">Bulan</label>
									<select name="bulan" id="bulan" class="form-control">
										<option value="">-- Pilih Bulan --</option>
										<?php for($i = 1; $i <= 12; $i++) : ?>
										 <option value="<?= $i; ?>"><?= $i; ?></option>
										<?php endfor; ?>
									</select>
									<small class="muted text-danger"><?= $validation->getError('bulan'); ?></small>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
					           <?= form_label('Tahun', 'tahun'); ?>
					           <select name="tahun" id="tahun" class="form-control">
					             <option value="">-- Pilih Tahun --</option>
					             <?php for($i = 1998; $i <= date('Y'); $i++) : ?>
					              <option value="<?= $i; ?>"><?= $i; ?></option>
					             <?php endfor; ?>
					           </select>
					           <small class="muted text-danger"><?= $validation->getError('tahun'); ?></small>
					        </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="id_jurusan">Jurusan <p class="text-danger font-weight-bold">(Jika Ada)</p></label>
									<select name="id_jurusan" id="id_jurusan" class="form-control">
										<option value="">-- Tidak Ada --</option>
										<?php foreach($jurusan as $jr) : ?>
											<option value="<?= $jr->id; ?>"><?= $jr->jurusan; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary btn-block">Daftar Sekarang</button>
							</div>
							<p>Sudah punya akun ? <a href="/auth/loginSiswa">Login Sekarang</a></p>
						</div>
					</div>
				</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<?php endif; ?>
<?= $this->endSection(); ?>