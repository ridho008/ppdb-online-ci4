<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\TahunAjaranModel;
use \App\Models\SiswaModel;

class Pendaftaran extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->validation = \Config\Services::validation();
      $this->tahunModel = new \App\Models\TahunAjaranModel();
      $this->siswaModel = new \App\Models\SiswaModel();
   }

   public function index()
   {
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
        ])) {
           return redirect()->to('/pendaftaran')->withInput();
        }
        $tanggal = $this->request->getPost('tgl');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $tbt = date("$tahun-$bulan-$tanggal");
        // dd($tbt);
        $this->siswaModel->save([
            'nisn' => $this->request->getPost('nisn'),
            'nama' => $this->request->getPost('nama'),
            'password' => $this->request->getPost('nisn'),
            'tmp_lahir' => $this->request->getPost('tmp_lahir'),
            'tgl_lahir' => $tbt
        ]);

        $this->session->setFlashdata('success', 'Akun Siswa Berhasil Dibuat.');
        return redirect()->to('/pendaftaran');
      }

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
         'validation' => $this->validation
      ]);
   }

}
