<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\PendidikanModel;
class Pendidikan extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->validation = \Config\Services::validation();
      $this->pendidikanModel = new \App\Models\PendidikanModel();
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
      $total = $this->pendidikanModel->countPendidikan();
      if($this->request->getPost('keyword')) {
         $keyword = $this->request->getPost('keyword');
      }
      $pendidikan = $this->pendidikanModel->getAllPendidikan($limit, $offset, $keyword);
      return view('admin/pendidikan/index', [
         'title' => 'PPDB Online',
         'subtitle' => 'Pendidikan',
         'pendidikan' => $pendidikan,
         'keyword' => $keyword,
         'total' => $total,
         'perPage' => $perPage,
         'page' => $page,
         'offset' => $offset,
      ]);
	}

   public function getId()
   {
      echo json_encode($this->pendidikanModel->getPendidikanID($_POST['id']));
   }

   public function create()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'pendidikan');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $pendidikanEntities = new \App\Entities\Pendidikan();
            $pendidikanEntities->fill($data);
            $this->pendidikanModel->save($pendidikanEntities);

            $this->session->setFlashdata('success', 'Berhasil Menambahkan Data.');
            return redirect()->to('/pendidikan');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/pendidikan');
      }
   }

   public function edit()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'pendidikan');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $pendidikanEntities = new \App\Entities\Pendidikan();
            $pendidikanEntities->fill($data);
            $this->pendidikanModel->save($pendidikanEntities);

            $this->session->setFlashdata('success', 'Berhasil Edit Data.');
            return redirect()->to('/pendidikan');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/pendidikan');
      }
   }

   public function delete()
   {
      $id = $this->request->uri->getSegment(3);
      $this->pendidikanModel->delete($id);
      $this->session->setFlashdata('success', 'Berhasil Hapus Data Pekerjaan.');
      return redirect()->to('/pendidikan');
   }
}
