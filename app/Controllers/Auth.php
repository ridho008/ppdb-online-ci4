<?php

namespace App\Controllers;

class Auth extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->validation = \Config\Services::validation();
      $this->session = session();
   }
	public function index()
	{
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $validate = $this->validation->run($data, 'auth');
         $errors = $this->validation->getErrors();

         $modelUser = new \App\Models\AuthModel();
         $username = $this->request->getPost('username');
         $password = md5($this->request->getPost('password'));
         $user = $modelUser->getUser($username, $password);
         if(!$errors) {
            if($user != null) {
               if($user['password'] == $password) {
                  $setSession = [
                     'id' => $user['id'],
                     'username' => $user['username'],
                     'foto' => $user['foto'],
                     'logged_in' => true
                  ];
                  $this->session->set($setSession);
                  return redirect()->to('/admin');
               } else {
                  $this->session->setFlashdata('errors', ['Password yang anda masukan salah!']);
                  return redirect()->to('/auth');
               }
            }
            $this->session->setFlashdata('errors', ['Anda belum punya akun.']);
            return redirect()->to('/auth');
         }

         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/auth');
      }
		return view('login', [
         'title' => 'PPDB Online',
         'subtitle' => 'Halaman Login'
      ]);
	}

   public function logout()
   {
      $this->session->destroy();
      $this->session->setFlashdata('success', 'Berhasil Logout.');
      return redirect()->to('/auth');
   }

   // Login Siswa
   public function loginSiswa()
   {
      if($this->request->getPost()) {
         if(!$this->validate([
            'nisn' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib diisi.',
               ]
            ],
            'password' => [
               'rules' => 'required',
               'errors' => [
                  'required' => '{field} wajib diisi.',
               ]
            ],
         ])) {
            return redirect()->to('/auth/loginSiswa')->withInput();
         }

         $modelUser = new \App\Models\AuthModel();
         $nisn = $this->request->getPost('nisn');
         $password = $this->request->getPost('password');
         $siswa = $modelUser->getSiswa($nisn, $password);
         if($siswa != null) {
            if($siswa['password'] == $password) {
               $setSession = [
                  'id' => $siswa['id'],
                  'nama' => $siswa['nama'],
                  'nisn' => $siswa['nisn'],
               ];
               $this->session->set($setSession);
               return redirect()->to('/siswa');
            } else {
               $this->session->setFlashdata('error', 'Password yang anda masukan salah!');
               return redirect()->to('/auth/loginSiswa');
            }
         }
         $this->session->setFlashdata('error', 'Anda belum punya akun.');
         return redirect()->to('/auth/loginSiswa');
      }
      return view('login-siswa', [
         'title' => 'PPDB Online',
         'subtitle' => 'Halaman Login',
         'validation' => $this->validation
      ]);
   }

   public function logoutSiswa()
   {
      $this->session->destroy();
      $this->session->setFlashdata('success', 'Berhasil Logout.');
      return redirect()->to('/auth/loginSiswa');
   }
}
