<?php

namespace App\Controllers;
use \App\Models\AdminModel;
use \App\Models\SiswaModel;
class Admin extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->validation = \Config\Services::validation();
      $this->adminModel = new \App\Models\AdminModel();
      $this->siswaModel = new \App\Models\SiswaModel();
   }

	public function index()
	{
		return view('admin/dashboard', [
         'title' => 'PPDB Online',
         'subtitle' => 'Dashboard'
      ]);
	}

   public function pengaturan()
   {
      if($this->request->getPost()) {
         if(!$this->validate([
            'nama_sekolah' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
            ],
            'email' => [
               'rules' => 'required|valid_email',
               'errors' => [
                  'email' => '{field} wajib di isi.',
                  'valid_email' => '{field} email yang anda masukan tidak benar.'
               ]
            ],
            'web' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
            ],
            'deskripsi' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
            ],
            'alamat' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
            ],
            'kecamatan' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
            ],
            'kabupaten' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
            ],
            'no_telp' => [
               'rules' => 'required|numeric',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
            ],
         ])) {
            return redirect()->to('/pengaturan')->withInput();
         }

         $data = [
            'nama_sekolah' => $this->request->getPost('nama_sekolah'),
            'alamat' => $this->request->getPost('alamat'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kabupaten' => $this->request->getPost('kabupaten'),
            'no_telp' => $this->request->getPost('no_telp'),
            'email' => $this->request->getPost('email'),
            'web' => $this->request->getPost('web'),
            'deskripsi' => $this->request->getPost('deskripsi'),
         ];

         $this->adminModel->updatePengaturan($data);
         $this->session->setFlashdata('success', 'Berhasil Diperbarui.');
         return redirect()->to('/pengaturan');
      }
      $setting = $this->adminModel->detailSetting();
      return view('admin/pengaturan/index', [
         'title' => 'PPDB Online',
         'subtitle' => 'Pengaturan',
         'validation' => $this->validation,
         'setting' => $setting
      ]);
   }

   public function uploadLogo()
   {
      $id = $this->request->uri->getSegment(3);
      $setting = $this->adminModel->detailSetting();
      if(!$this->validate([
         'logo' => 'uploaded[logo]|max_size[logo,1024]'
      ])) {
         return redirect()->to('/pengaturan')->withInput();
      }

      $fileName = $this->request->getFile('logo');
      if($fileName->getError() == 4) {
         $logo = 'ppdb-online.jpg';
      } else {
         if($setting['logo'] != 'ppdb-online.jpg') {
            unlink('img/'. $this->request->getPost('logoLama'));
         }
         $logo = $fileName->getRandomName();
         $fileName->move('img/', $logo);

      }
      $this->adminModel->savePengaturan($id, $logo);

      $this->session->setFlashdata('success', 'Foto Berhasil Diganti.');
      return redirect()->to('/pengaturan');
   }

   public function beranda()
   {
      if($this->request->getPost()) {
         if(!$this->validate([
            'beranda' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib di isi.'
               ]
            ],
         ])) {
            return redirect()->to('/beranda')->withInput();
         }

         $data = [
            'beranda' => $this->request->getPost('beranda'),
         ];
         $this->adminModel->updatePengaturan($data);
         $this->session->setFlashdata('success', 'Berhasil Diperbarui.');
         return redirect()->to('/beranda');
      }
      $beranda = $this->adminModel->detailSetting();
      return view('admin/beranda/index', [
         'title' => 'PPDB Online',
         'subtitle' => 'Beranda',
         'beranda' => $beranda,
         'validation' => $this->validation
      ]);
   }

   // ********************** Pendaftaran Admin *************************
   public function masuk()
   {
      $statusMasuk = $this->adminModel->getAllPendaftaranByStatus(0, 1);
      // d($statusMasuk);
      return view('admin/pendaftaran/masuk', [
         'title' => 'PPDB Online',
         'subtitle' => 'Pendaftaran Masuk',
         'statusMasuk' => $statusMasuk,
      ]);
   }

   public function detailSiswa($id_siswa)
   {
      $detailSiswa = $this->siswaModel->getBiodataSiswa($id_siswa);
      $berkas = $this->siswaModel->getAllBerkas($id_siswa);
      return view('admin/pendaftaran/detail_siswa', [
         'title' => 'PPDB Online',
         'subtitle' => 'Detail Biodata Siswa | Pendaftaran Masuk',
         'siswa' => $detailSiswa,
         'berkas' => $berkas,
      ]);
   }

   // routes = /admin/terima
   public function terima()
   {
      $statusMasuk = $this->adminModel->getAllPendaftaranByStatus(1, 1);
      return view('admin/pendaftaran/terima', [
         'title' => 'PPDB Online',
         'subtitle' => 'Diterima',
         'statusMasuk' => $statusMasuk,
      ]);
   }

   // routes = /admin/tolak
   public function tolak()
   {
      $statusMasuk = $this->adminModel->getAllPendaftaranByStatus(2, 1);
      return view('admin/pendaftaran/tolak', [
         'title' => 'PPDB Online',
         'subtitle' => 'Ditolak',
         'statusMasuk' => $statusMasuk,
      ]);
   }

   public function diterima($id_siswa)
   {
      $data = [
         'status_ppdb' => 1,
      ];

      $this->siswaModel->update($id_siswa, $data);
      $this->session->setFlashdata('success', 'Siswa berhasil diterima.');
      return redirect()->to('/admin/masuk');
   }

   public function ditolak($id_siswa)
   {
      $data = [
         'status_ppdb' => 2,
      ];

      $this->siswaModel->update($id_siswa, $data);
      $this->session->setFlashdata('success', 'Siswa telah ditolak.');
      return redirect()->to('/admin/masuk');
   }

   // ********** Laporan Admin ***************
   public function laporan()
   {
      $tahunAjaran = $this->adminModel->getAllTahunAjaran();
      return view('admin/laporan/laporan', [
         'title' => 'PPDB Online',
         'subtitle' => 'Laporan Kelulusan',
         'ta' => $tahunAjaran,
      ]);
   }

   public function cetakLaporan($tahun)
   {
      $laporan = $this->adminModel->getLaporanByTahun($tahun);
      $setting = $this->adminModel->setting();
      return view('admin/laporan/cetak', [
         'title' => 'Laporan Kelulusan',
         'laporan' => $laporan,
         'setting' => $setting,
         'tahun' => $tahun,
      ]);
   }



}
