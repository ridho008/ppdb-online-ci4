<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <style>
    * {margin: 0;padding: 0;}
    .box-logo {
      /*text-align:justify;width:50%;*/
      margin-bottom: 60px;
    }

    .container {
      padding: 0 20px;
      margin: 20px auto;
    }

    .box-title {
      /*float: right;*/
      padding-top: 50px;
    }

     table {
      width: 100%;
    }

    .table-data td {
      padding: 5px;
      margin-top: 40px;
    }

    .box-logo img {
      height: 100%;
      float:left; margin:0 8px 4px 0;
    }

    .judul-lulus {
      margin-bottom: 10px;
      text-align: center;
    }

  </style>
</head>
<body>
   <div class="container">
     <div class="box-logo">
        <img src="<?= base_url('img/'. $setting->logo) ?>" alt="<?= $setting->logo ?>" width="200px">
        <div class="box-title">
           <h1><?= $setting->nama_sekolah ?></h1>
           <p><?= $setting->alamat ?></p><br>
        </div>
     </div>
     <div class="judul-lulus">
      <h4><u>Surat Keterangan Lulus</u></h4>
     </div>
     <table border="1" cellspacing="0" class="table-data">
        <tr>
           <td><strong>No.Pendaftaran</strong></td>
           <th>:</th>
           <td><?= $siswa->no_pendaftaran ?></td>
        </tr>
        <tr>
           <td><strong>NISN</strong></td>
           <th>:</th>
           <td><?= $siswa->nisn ?></td>
        </tr>
        <tr>
           <td><strong>Nama Lengkap</strong></td>
           <th>:</th>
           <td><?= $siswa->nama ?></td>
        </tr>
        <tr>
           <td><strong>Tempat/Tanggal Lahir</strong></td>
           <th>:</th>
           <td><?= $siswa->tmp_lahir ?>, <?= $siswa->tgl_lahir ?></td>
        </tr>
        <tr>
           <td><strong>Jalur Masuk</strong></td>
           <th>:</th>
           <td><?= $siswa->jalur_masuk ?></td>
        </tr>
        <tr>
           <td><strong>Jurusan</strong></td>
           <th>:</th>
           <td><?= $siswa->jurusan ?></td>
        </tr>
     </table>

     <table style="margin-top: 8px;">
        <tr style="float: right;">
           <td></td>
            <td>
               <p>Pekanbaru, <?= date('d M Y'); ?><br>Kepala Sekolah
                         <br><br>
                         <p>_______________________</p>
               </p>
            </td>
        </tr>
     </table>
   </div>
  

<script>
  window.print();
</script>
</body>
</html>