<?= $this->extend('layouts/app-back'); ?>

<?= $this->section('content'); ?>
<div class="row">
   <div class="col-md-12">
      <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Pendaftaran Siswa Masuk</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                   <tr>
                      <th>No</th>
                      <th>Foto</th>
                      <th>No.Pendaftaran</th>
                      <th>NISN</th>
                      <th>Nama</th>
                      <th>Jalur Masuk</th>
                      <th>Tahun</th>
                      <th><i class="material-icons">settings</i></th>
                   </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach($statusMasuk as $sm) : ?>
                  <tr>
                     <td><?= $no++; ?></td>
                     <td>
                     <img src="<?= base_url('img/siswa/' . $sm['foto']) ?>" alt="<?= $sm['nama'] ?>" class="img-fluid" style="width: 100px;height: 100px;border-radius: 50%;object-fit: cover;object-position: top;">
                     </td>
                     <td><?= $sm['no_pendaftaran']; ?></td>
                     <td><?= $sm['nisn']; ?></td>
                     <td><?= $sm['nama']; ?></td>
                     <td><?= $sm['jalur_masuk']; ?></td>
                     <td><?= $sm['tahun']; ?></td>
                     <td>
                       <a href="<?= base_url('admin/detailSiswa/' . $sm['idSiswa']) ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                       <a href="<?= base_url('admin/diterima/' . $sm['idSiswa']) ?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Terima</a>
                       <a href="<?= base_url('admin/ditolak/' . $sm['idSiswa']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Tolak</a>
                     </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
   </div>
</div>
<?= $this->endSection(); ?>