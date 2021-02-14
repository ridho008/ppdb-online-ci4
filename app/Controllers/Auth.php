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
}
