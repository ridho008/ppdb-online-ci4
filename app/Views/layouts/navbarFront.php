<?php 
$db = \Config\Database::connect();
$setting = $db->table('pengaturan')
              ->where('id', 1)
              ->get()->getRow();

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="/">
        <?php if(!empty($setting)) : ?>
        <img src="/img/<?= $setting->logo ?>" width="30" height="30" class="d-inline-block align-top" alt="PPDB Online" loading="lazy">
        <?= $setting->nama_sekolah ?>
      <?php endif; ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item<?= (uri_string() == '/') ? ' active' : '' ?>">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pengumuman</a>
          </li>
          <li class="nav-item<?= (uri_string() == 'pendaftaran') ? ' active' : '' ?>">
            <a class="nav-link" href="/pendaftaran">Pendaftaran</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Kontak</a>
          </li>
        </ul>
        <div class="form-inline">
          <ul class="navbar-nav">
            <?php if(!empty(session()->get('username'))) : ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Hello, <?= session()->get('username') ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/admin">Dashboard</a>
                  <a class="dropdown-item" href="/pengaturan">Pengaturan</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/auth/logout">Log out</a>
                </div>
              </li>
            <?php else : ?>
              <?php if(!session()->get('nisn')) : ?>
              <li class="nav-item">
              <a class="nav-link" href="/auth" tabindex="-1" aria-disabled="true">Masuk/Daftar</a>
            </li>
            <?php endif; ?>
            <?php endif; ?>

            <?php if(session()->get('nisn')) : ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Hello, <?= session()->get('nisn') ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/Siswa">Halaman Utama</a>
                  <a class="dropdown-item" href="/pengaturan">Biodata</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/auth/logoutSiswa">Log out</a>
                </div>
              </li>
            <?php endif; ?>
          </ul>
          </div>
      </div>
   </div>
 </nav>