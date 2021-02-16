<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\AgamaModel;
class Agama extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->validation = \Config\Services::validation();
      $this->agamaModel = new \App\Models\AgamaModel();
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
      $total = $this->agamaModel->countAgama();
      if($this->request->getPost('keyword')) {
         $keyword = $this->request->getPost('keyword');
      }
      $agama = $this->agamaModel->getAllAgama($limit, $offset, $keyword);
      return view('admin/agama/index', [
         'title' => 'PPDB Online',
         'subtitle' => 'Agama',
         'agama' => $agama,
         'keyword' => $keyword,
         'total' => $total,
         'perPage' => $perPage,
         'page' => $page,
         'offset' => $offset,
      ]);
	}

   public function getId()
   {
      echo json_encode($this->agamaModel->getAgamaID($_POST['id']));
   }

   public function create()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'agama');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $agamaEntities = new \App\Entities\Agama();
            $agamaEntities->fill($data);
            $this->agamaModel->save($agamaEntities);

            $this->session->setFlashdata('success', 'Berhasil Menambahkan Data.');
            return redirect()->to('/agama');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/agama');
      }
   }

   public function edit()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'agama');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $agamaEntities = new \App\Entities\Agama();
            $agamaEntities->fill($data);
            $this->agamaModel->save($agamaEntities);

            $this->session->setFlashdata('success', 'Berhasil Edit Data.');
            return redirect()->to('/agama');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/agama');
      }
   }

   public function delete()
   {
      $id = $this->request->uri->getSegment(3);
      $this->agamaModel->delete($id);
      $this->session->setFlashdata('success', 'Berhasil Hapus Data Pekerjaan.');
      return redirect()->to('/agama');
   }
}
