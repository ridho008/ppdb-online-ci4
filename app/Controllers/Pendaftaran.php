<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\TahunAjaranModel;
use \App\Models\SiswaModel;
use \App\Models\JalurMasukModel;
use \App\Models\JurusanModel;
use \App\Models\AdminModel;

class Pendaftaran extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->validation = \Config\Services::validation();
      $this->tahunModel = new \App\Models\TahunAjaranModel();
      $this->siswaModel = new \App\Models\SiswaModel();
      $this->jalurModel = new \App\Models\JalurMasukModel();
      $this->jurusanModel = new \App\Models\JurusanModel();
   }

   public function index()
   {
      $tahunAktif = $this->tahunModel->where('status', 1)->get()->getRowArray();
      $tahunAjaranSekarang = $tahunAktif['tahun'];
      if($this->request->getPost()) {
        if(!$this->validate([
           'nisn' => [
              'rules' => 'required|is_unique[siswa.nisn]|min_length[10]|max_length[10]',
              'errors' => [
                 'required' => '{field} wajib diisi.',
                 'is_unique' => '{field} sudah terdaftar.',
                 'max_length' => '{field} Max 10 karakter',
                 'min_length' => '{field} Min 10 karakter'
              ]
           ],
           'nama' => [
              'rules' => 'required',
              'errors' => [
                 'required' => '{field} wajib diisi.',
              ]
           ],
           'tmp_lahir' => [
              'rules' => 'required',
              'errors' => [
                 'required' => '{field} wajib diisi.',
              ]
           ],
           'tgl' => [
              'rules' => 'required',
              'errors' => [
                 'required' => '{field} wajib diisi.',
              ]
           ],
           'bulan' => [
              'rules' => 'required',
              'errors' => [
                 'required' => '{field} wajib diisi.',
              ]
           ],
           'tahun' => [
              'rules' => 'required',
              'errors' => [
                 'required' => '{field} wajib diisi.',
              ]
           ],
           'jalur_masuk' => [
              'rules' => 'required',
              'errors' => [
                 'required' => '{field} wajib diisi.',
              ]
           ],
        ])) {
           return redirect()->to('/pendaftaran')->withInput();
        }
         // dd($this->request->getPost());

        $tanggal = $this->request->getPost('tgl');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $tbt = date("$tahun-$bulan-$tanggal");
        // dd($tbt);
        $kodePendaftaran = date('Ymd') . mt_rand(111,999);
        $this->siswaModel->save([
            'nisn' => $this->request->getPost('nisn'),
            'nama' => $this->request->getPost('nama'),
            'password' => $this->request->getPost('nisn'),
            'tmp_lahir' => $this->request->getPost('tmp_lahir'),
            'tgl_lahir' => $tbt,
            'no_pendaftaran' => $kodePendaftaran,
            'tgl_pendaftaran' => date('Y-m-d'),
            'id_jalur_masuk' => $this->request->getPost('jalur_masuk'),
            'id_jurusan' => $this->request->getPost('id_jurusan'),
            'tahun' => $tahunAjaranSekarang,
        ]);

        $this->session->setFlashdata('success', 'Akun Siswa Berhasil Dibuat.');
        return redirect()->to('/pendaftaran');
      }

      $jalur = $this->jalurModel->findAll();
      $jurusan = $this->jurusanModel->findAll();
      $ta = $this->tahunModel->where('status', 1)->first();
      if($ta) {
         $this->tahunModel->where('status', 1)->first();
      } else {
         $this->session->setFlashdata('error', 'Pendaftaran Telah Ditutup!');
         return redirect()->to('/');
      }
      return view('pendaftaran', [
         'title' => 'PPDB Online',
         'subtitle' => 'Pendaftaran',
         'ta' => $ta,
         'jalur' => $jalur,
         'jurusan' => $jurusan,
         'validation' => $this->validation
      ]);
   }

   

   

}
