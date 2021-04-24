<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\SiswaModel;
use \App\Models\JalurMasukModel;

class Siswa extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->validation = \Config\Services::validation();
      $this->siswaModel = new \App\Models\SiswaModel();
      $this->jalurModel = new \App\Models\JalurMasukModel();
   }

	public function index()
	{
      $siswa = $this->siswaModel->getBiodataSiswa(session()->get('id'));
      $jalurMasuk = $this->jalurModel->findAll();
      return view('siswa/dashboard', [
         'title' => 'PPDB Online',
         'subtitle' => 'Dashboard',
         'siswa' => $siswa,
         'jalurMasuk' => $jalurMasuk,
      ]);
	}

   public function updatePendaftaran()
   {
      $id_siswa = $this->request->getPost('id_siswa');
      $data = [
         'id_jalur_masuk' => $this->request->getPost('id_jalur_masuk')
      ];

      $this->siswaModel->updateSiswa($id_siswa, $data);

      session()->setFlashdata('success', 'Berhasil Perbarui Jalur Masuk.');
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
}
