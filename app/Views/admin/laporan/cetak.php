<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <style>
    * {margin: 0;padding: 0;}
    .box-logo {
      text-align:justify;width:50%;
    }

    .box-logo img {
      float:left; margin:0 8px 4px 0;
    }

    .box-logo h2 {
      padding-top: 30px;
    }

    .info p {
      color: red;
    }

    .info {
      text-align: center;
    }
  </style>
</head>
<body>
  <center>
    <div class="box-logo">
    <img src="<?= base_url('img/'. $setting->logo) ?>" alt="$setting->logo" width="200px">
    <h2><?= $setting->nama_sekolah ?></h2>
    <p><strong><?= $setting->alamat ?></strong></p><br>
    <h4>Laporan Kelulusan</h4>
    <h5>Tahun : <?= $tahun ?></h5>
    </div>
  </center>

  <table border="1" style="width: 100%;" cellpadding="5" cellspacing="0">
    <tr>
      <th width="1%">No</th>
      <th>No.Pendaftaran</th>
      <th>NISN</th>
      <th>Nama</th>
      <th>Tempat/Tanggal Lahir</th>
      <th>Jalur Penerimaan</th>
    </tr>
    <?php $no = 1; foreach($laporan as $l) : ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $l['no_pendaftaran']; ?></td>
        <td><?= $l['nisn']; ?></td>
        <td><?= $l['nama']; ?></td>
        <td><?= $l['tmp_lahir']; ?>/<?= date('d-m-Y', strtotime($l['tgl_lahir'])); ?></td>
        <td><?= $l['jalur_masuk']; ?></td>
      </tr>
      <?php endforeach; ?>
      <?php if(empty($laporan)) : ?>
        <tr>
          <td colspan="6" class="info"><p>Laporan Kelulusan Tahun <strong><?= $tahun ?></strong>, masih kosong!</p></td>
        </tr>
      <?php endif; ?>
  </table>

<script>
  window.print();
</script>
</body>
</html>