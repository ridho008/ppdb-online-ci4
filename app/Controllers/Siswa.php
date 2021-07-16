<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\SiswaModel;
use \App\Models\JalurMasukModel;
use \App\Models\AgamaModel;
use \App\Models\PekerjaanModel;
use \App\Models\PenghasilanModel;
use \App\Models\PendidikanModel;
use \App\Models\LampiranModel;
use \App\Models\JurusanModel;
use \App\Models\AdminModel;

class Siswa extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->validation = \Config\Services::validation();
      $this->siswaModel = new \App\Models\SiswaModel();
      $this->jalurModel = new \App\Models\JalurMasukModel();
      $this->agamaModel = new AgamaModel();
      $this->pendidikanModel = new PendidikanModel();
      $this->pekerjaanModel = new PekerjaanModel();
      $this->penghasilanModel = new PenghasilanModel();
      $this->lampiranModel = new LampiranModel();
      $this->jurusanModel = new JurusanModel();
      $this->adminModel = new AdminModel();
   }

	public function index()
	{
      // d(session()->get());
      $siswa = $this->siswaModel->getBiodataSiswa(session()->get('id'));
      $jalurMasuk = $this->jalurModel->findAll();
      $lampiran = $this->lampiranModel->findAll();
      $agama = $this->agamaModel->findAll();
      $pendidikan = $this->pendidikanModel->findAll();
      $pekerjaan = $this->pekerjaanModel->findAll();
      $penghasilan = $this->penghasilanModel->findAll();
      $provinsi = $this->siswaModel->getAllProvinsi();
      $berkas = $this->siswaModel->getAllBerkas(session()->get('id'));
      $jurusan = $this->jurusanModel->findAll();

      return view('siswa/dashboard', [
         'title' => 'PPDB Online',
         'subtitle' => 'Dashboard',
         'siswa' => $siswa,
         'berkas' => $berkas,
         'jurusan' => $jurusan,
         'pendidikan' => $pendidikan,
         'agama' => $agama,
         'pekerjaan' => $pekerjaan,
         'penghasilan' => $penghasilan,
         'jalurMasuk' => $jalurMasuk,
         'provinsi' => $provinsi,
         'lampiran' => $lampiran,
         'validation' => $this->validation,
      ]);
	}

   public function updatePendaftaran()
   {
      // dd($this->request->getPost());
      $id_siswa = $this->request->getPost('id_siswa');
      $data = [
         'id_jalur_masuk' => $this->request->getPost('id_jalur_masuk'),
         'id_jurusan' => $this->request->getPost('id_jurusan'),
      ];

      $this->siswaModel->updateSiswa($id_siswa, $data);

      session()->setFlashdata('success', 'Berhasil Perbarui Data Diri.');
      return redirect()->to('/siswa');
   }

   public function ubahFoto()
   {
      $id_siswa = $this->request->getPost('id_siswa');
      if(!$this->validate([
          'foto' => 'uploaded[foto]|max_size[foto,1024]'
      ])) {
         return redirect()->to('/siswa')->withInput();
      }

      $siswa = $this->siswaModel->getRowSiswa($id_siswa);
      if($siswa['foto'] != null || $siswa['foto'] != '') {
         unlink('img/siswa/'. $this->request->getPost('fotoLama'));
      }
      
      $foto = $this->request->getFile('foto');
      if($foto->getError() == 4) {
         $namaFoto = 'default.png';
      } else {
         // generate namaSampul random
         $namaFoto = time() . $foto->getRandomName();
         // pindahkan file ke folder img
         $foto->move('img/siswa', $namaFoto);

      }
      
      $data = [
         'foto' => $namaFoto,
      ];
      $this->siswaModel->updateSiswa($id_siswa, $data);

      session()->setFlashdata('success', 'Berhasil Perbarui Foto Profil.');
      return redirect()->to('/siswa');
   }

   public function ubahIdentitas()
   {
      $id_siswa = $this->request->getPost('id_siswa');
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'identitas');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $arr = [
               'nik' => $this->request->getPost('nik'),
               'nama' => $this->request->getPost('nama'),
               'tmp_lahir' => $this->request->getPost('tmp_lahir'),
               'berat' => $this->request->getPost('berat'),
               'id_agama' => $this->request->getPost('agama'),
               'jml_saudara' => $this->request->getPost('jml_saudara'),
               'anak_ke' => $this->request->getPost('anak_ke'),
               'tinggi' => $this->request->getPost('tinggi'),
               'tgl_lahir' => $this->request->getPost('tgl_lahir'),
               'jk' => $this->request->getPost('jk'),
               'no_telp' => $this->request->getPost('no_telp'),
            ];

            $this->siswaModel->updateSiswa($id_siswa, $arr);
            $this->session->setFlashdata('success', 'Berhasil Perbarui Identitas Didik.');
            return redirect()->to('/siswa');
         } else {
            $this->session->setFlashdata('errors', $errors);
            return redirect()->to('/siswa');
         }
      }
   }

   public function ubahAyah()
   {
      $id_siswa = $this->request->getPost('id_siswa');
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'ayah');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $arr = [
               'nik_ayah' => $this->request->getPost('nik_ayah'),
               'nama_ayah' => $this->request->getPost('nama_ayah'),
               'penghasilan_ayah' => $this->request->getPost('penghasilan_ayah'),
               'pendidikan_ayah' => $this->request->getPost('pendidikan_ayah'),
               'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
               'telp_ayah' => $this->request->getPost('telp_ayah'),
            ];

            $this->siswaModel->updateSiswa($id_siswa, $arr);
            $this->session->setFlashdata('success', 'Berhasil Perbarui Data Ayah Kandung.');
            return redirect()->to('/siswa');
         } else {
            $this->session->setFlashdata('errors', $errors);
            return redirect()->to('/siswa');
         }

      }
   }

   public function ubahIbu()
   {
      $id_siswa = $this->request->getPost('id_siswa');
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'ibu');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $arr = [
               'nik_ibu' => $this->request->getPost('nik_ibu'),
               'nama_ibu' => $this->request->getPost('nama_ibu'),
               'penghasilan_ibu' => $this->request->getPost('penghasilan_ibu'),
               'pendidikan_ibu' => $this->request->getPost('pendidikan_ibu'),
               'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
               'telp_ibu' => $this->request->getPost('telp_ibu'),
            ];

            $this->siswaModel->updateSiswa($id_siswa, $arr);
            $this->session->setFlashdata('success', 'Berhasil Perbarui Data Ibu Kandung.');
            return redirect()->to('/siswa');
         } else {
            $this->session->setFlashdata('errors', $errors);
            return redirect()->to('/siswa');
         }

      }
   }

   public function ubahAlamat()
   {
      $id_siswa = $this->request->getPost('id_siswa');
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'alamat');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $arr = [
               'id_provinsi' => $this->request->getPost('provinsi'),
               'id_kabupaten' => $this->request->getPost('kabupaten'),
               'kecamatan' => $this->request->getPost('kecamatan'),
               'alamat' => $this->request->getPost('alamat'),
            ];

            $this->siswaModel->updateSiswa($id_siswa, $arr);
            $this->session->setFlashdata('success', 'Berhasil Perbarui Data Alamat.');
            return redirect()->to('/siswa');
         } else {
            $this->session->setFlashdata('errors', $errors);
            return redirect()->to('/siswa');
         }

      }
   }

   public function ubahSekolah()
   {
      $id_siswa = $this->request->getPost('id_siswa');
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'sekolah');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $arr = [
               'nama_sekolah' => $this->request->getPost('nama_sekolah'),
               'tahun_lulus' => $this->request->getPost('tahun_lulus'),
               'no_izajah' => $this->request->getPost('no_izajah'),
               'no_skhun' => $this->request->getPost('no_skhun'),
            ];

            $this->siswaModel->updateSiswa($id_siswa, $arr);
            $this->session->setFlashdata('success', 'Berhasil Perbarui Data Sekolah Asal.');
            return redirect()->to('/siswa');
         } else {
            $this->session->setFlashdata('errors', $errors);
            return redirect()->to('/siswa');
         }

      }
   }

   public function cobaApi()
   {
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key: 9000c3eb2c5a219fded1eb17cce0144f"
        ),
      ));

      // $response = curl_exec($curl);
      // $err = curl_error($curl);
      // $city = json_decode($response,true);
      // $coba = $city['rajaongkir']['results'];
      // foreach ($coba as $value) {
      //    echo "<option value='". $value['city_id'] ."'>". $value['province'] ."</option>";
      // }
      // var_dump($coba);
      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        echo $response;
      }
   }

   public function getIDProvinsi($id_provinsi)
   {
      $provinsi = $this->siswaModel->getByIdProvinsi($id_provinsi);
      return json_encode($provinsi);
   }

   public function insertBerkas()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'berkas');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $berkas = $this->request->getFile('berkas');
            if($berkas->getError() == 4) {
               $namaberkas = 'default.png';
            } else {
               // generate namaSampul random
               $namaberkas = time() . $berkas->getRandomName();
               // pindahkan file ke folder img
               $berkas->move('img/berkas', $namaberkas);

            }
            $arr = [
               'id_siswa' => $this->request->getPost('id_siswa'),
               'id_lampiran' => $this->request->getPost('lampiran'),
               'ket_berkas' => $this->request->getPost('ket_berkas'),
               'berkas' => $namaberkas,
            ];

            $this->siswaModel->insertBerkas($arr);
            $this->session->setFlashdata('success', 'Berkas berhasil disimpan.');
            return redirect()->to('/siswa');
         } else {
            $this->session->setFlashdata('errors', $errors);
            return redirect()->to('/siswa');
         }

      }
   }

   public function deleteBerkas($id_berkas)
   {
      $berkas = $this->siswaModel->getBerkasById($id_berkas);
      if($berkas['berkas']) {
         unlink('img/berkas/' . $berkas['berkas']);
      }
      $this->siswaModel->deleteBerkas($id_berkas);
      $this->session->setFlashdata('success', 'Berkas Berhasil diHapus.');
      return redirect()->to('/siswa');
   }

   public function simpanPendaftaran($id_siswa)
   {
      $data = [
         'status_pendaftaran' => 1,
      ];
      $this->siswaModel->updateStatusPendaftaran($data, $id_siswa);
      $this->session->setFlashdata('success', 'Data Diri Anda Berhasil Dikirim.');
      return redirect()->to('/siswa');
   }

   public function buktiKelulusan()
   {
      $siswa = $this->siswaModel->getBiodataSiswa(session()->get('id'));
      $setting = $this->adminModel->setting();
      return view('siswa/cetak-bukti-kelulusan', [
         'title' => 'Cetak Kelulusan',
         'siswa' => $siswa,
         'setting' => $setting,
      ]);
   }
}
