<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\UserModel;
class User extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->validation = \Config\Services::validation();
      $this->userModel = new \App\Models\UserModel();
   }

	public function index()
	{
		$page = 1;
      $keyword = '';
      if($this->request->getGet()) {
         $page = $this->request->getGet('page');
      }
      $perPage = 2;
      $limit = $perPage;
      $offset = ($page - 1) * $perPage;
      $total = $this->userModel->countUser();
      if($this->request->getPost('keyword')) {
         $keyword = $this->request->getPost('keyword');
      }
      $user = $this->userModel->getAllUser($limit, $offset, $keyword);
      return view('admin/user/index', [
         'title' => 'PPDB Online',
         'subtitle' => 'user',
         'user' => $user,
         'keyword' => $keyword,
         'total' => $total,
         'perPage' => $perPage,
         'page' => $page,
         'offset' => $offset,
      ]);
	}

   public function getRowUser()
   { 
      $data = array();

      // Read new token and assign in $data['token']
      $data['token'] = csrf_hash();

      ## Validation
      $validation = \Config\Services::validation();

      $input = $validation->setRules([
        'username' => 'required',
      ]);

      if ($validation->withRequest($this->request)->run() == FALSE){

         $data['success'] = 0;
         $data['error'] = $validation->getError('username');// Error response

      }else{

         $data['success'] = 1;
         
         // Fetch record
         $users = new UserModel();
         $user = $users->select('*')
                ->where('username', $_POST['username'])
                ->get()->getRowArray();

         $data['user'] = $user;

      }

      return $this->response->setJSON($data);
   }

   public function getId()
   {
      echo json_encode($this->userModel->getUserID($_POST['id']));
   }

   public function create()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'user');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $userEntities = new \App\Entities\User();
            $userEntities->fill($data);
            $userEntities->foto = $this->request->getFile('foto');
            $this->userModel->save($userEntities);

            $this->session->setFlashdata('success', 'Berhasil Menambahkan Data.');
            return redirect()->to('/user');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/user');
      }
   }

   public function edit()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'user');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $userEntities = new \App\Entities\User();
            $userEntities->fill($data);
            if($this->request->getFile('foto')->isValid()) {
               $user->foto = $this->request->getFile('foto');
               unlink('./img/user/'.$this->request->getPost('fotoLama'));
            }
            $this->userModel->save($userEntities);

            $this->session->setFlashdata('success', 'Berhasil Edit Data.');
            return redirect()->to('/user');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/user');
      }
   }

   public function delete()
   {
      $id = $this->request->uri->getSegment(3);
      $user = $this->userModel->find($id);
      if($user->foto) {
         unlink('./img/user/'.$user->foto);
      }
      $this->userModel->delete($id);
      $this->session->setFlashdata('success', 'Berhasil Hapus Data User.');
      return redirect()->to('/user');
   }
}
