<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\JurusanModel;
class Jurusan extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->validation = \Config\Services::validation();
      $this->jurusanModel = new \App\Models\JurusanModel();
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
      $total = $this->jurusanModel->countJurusan();
      if($this->request->getPost('keyword')) {
         $keyword = $this->request->getPost('keyword');
      }
      $jurusan = $this->jurusanModel->getAllJurusan($limit, $offset, $keyword);
      return view('admin/jurusan/index', [
         'title' => 'PPDB Online',
         'subtitle' => 'Jurusan',
         'jurusan' => $jurusan,
         'keyword' => $keyword,
         'total' => $total,
         'perPage' => $perPage,
         'page' => $page,
         'offset' => $offset,
      ]);
	}

   public function getRowJurusan()
   { 
      $data = array();

      // Read new token and assign in $data['token']
      $data['token'] = csrf_hash();

      ## Validation
      $validation = \Config\Services::validation();

      $input = $validation->setRules([
        'jurusan' => 'required',
      ]);

      if ($validation->withRequest($this->request)->run() == FALSE){

         $data['success'] = 0;
         $data['error'] = $validation->getError('jurusan');// Error response

      }else{

         $data['success'] = 1;
         
         // Fetch record
         $jurusans = new JurusanModel();
         $jurusan = $jurusans->select('*')
                ->where('jurusan', $_POST['jurusan'])
                ->get()->getRowArray();

         $data['jurusan'] = $jurusan;

      }

      return $this->response->setJSON($data);
   }

   public function getId()
   {
      echo json_encode($this->jurusanModel->getJurusanID($_POST['id']));
   }

   public function create()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'jurusan');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $jurusanEntities = new \App\Entities\Jurusan();
            $jurusanEntities->fill($data);
            $this->jurusanModel->save($jurusanEntities);

            $this->session->setFlashdata('success', 'Berhasil Menambahkan Data.');
            return redirect()->to('/jurusan');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/jurusan');
      }
   }

   public function edit()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'jurusan');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $jurusanEntities = new \App\Entities\Jurusan();
            $jurusanEntities->fill($data);
            $this->jurusanModel->save($jurusanEntities);

            $this->session->setFlashdata('success', 'Berhasil Edit Data.');
            return redirect()->to('/jurusan');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/jurusan');
      }
   }

   public function delete()
   {
      $id = $this->request->uri->getSegment(3);
      $this->jurusanModel->delete($id);
      $this->session->setFlashdata('success', 'Berhasil Hapus Data Pekerjaan.');
      return redirect()->to('/jurusan');
   }
}
