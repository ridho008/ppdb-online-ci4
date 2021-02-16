<?php

namespace App\Controllers;
use \App\Models\AdminModel;
class Admin extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->validation = \Config\Services::validation();
      $this->adminModel = new \App\Models\AdminModel();
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

}
