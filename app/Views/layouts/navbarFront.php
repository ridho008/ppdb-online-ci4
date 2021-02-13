<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="/img/logo-ppdb.jpg" width="30" height="30" class="d-inline-block align-top" alt="PPDB Online" loading="lazy">
        PPDB Online
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
          <li class="nav-item">
            <a class="nav-link" href="#">Kontak</a>
          </li>
        </ul>
        <div class="form-inline">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/auth" tabindex="-1" aria-disabled="true">Masuk/Daftar</a>
            </li>
          </ul>
          </div>
      </div>
   </div>
 </nav>