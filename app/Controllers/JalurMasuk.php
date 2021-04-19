<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\JalurMasukModel;
class JalurMasuk extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->validation = \Config\Services::validation();
      $this->jalurModel = new \App\Models\JalurMasukModel();
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
      $total = $this->jalurModel->countJalur();
      if($this->request->getPost('keyword')) {
         $keyword = $this->request->getPost('keyword');
      }
      $jalur = $this->jalurModel->getAllJalur($limit, $offset, $keyword);
      return view('admin/jalur/index', [
         'title' => 'PPDB Online',
         'subtitle' => 'Jalur Masuk',
         'jalur' => $jalur,
         'keyword' => $keyword,
         'total' => $total,
         'perPage' => $perPage,
         'page' => $page,
         'offset' => $offset,
      ]);
	}

   public function getRowJalurMasuk()
   { 
      $data = array();

      // Read new token and assign in $data['token']
      $data['token'] = csrf_hash();
         
         // Fetch record
         $jalurMasuks = new JalurMasukModel();
         $jalur = $jalurMasuks->select('*')
                ->where('jalur_masuk', $_POST['jalur'])
                ->get()->getRowArray();

         $data['jalur'] = $jalur;
      return $this->response->setJSON($data);
   }

   public function getId()
   {
      echo json_encode($this->jalurModel->getJalurID($_POST['id']));
   }

   public function create()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'jalur');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $jalurEntities = new \App\Entities\JalurMasuk();
            $jalurEntities->fill($data);
            $this->jalurModel->save($jalurEntities);

            $this->session->setFlashdata('success', 'Berhasil Menambahkan Data.');
            return redirect()->to('/jalurMasuk');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/jalurMasuk');
      }
   }

   public function edit()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'jalur');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $jalurEntities = new \App\Entities\JalurMasuk();
            $jalurEntities->fill($data);
            $this->jalurModel->save($jalurEntities);

            $this->session->setFlashdata('success', 'Berhasil Edit Data.');
            return redirect()->to('/jalurMasuk');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/jalurMasuk');
      }
   }

   public function delete()
   {
      $id = $this->request->uri->getSegment(3);
      $this->jalurModel->delete($id);
      $this->session->setFlashdata('success', 'Berhasil Hapus Data Pekerjaan.');
      return redirect()->to('/jalurMasuk');
   }
}
