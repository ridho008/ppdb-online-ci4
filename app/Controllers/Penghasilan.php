<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\PenghasilanModel;
class Penghasilan extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->validation = \Config\Services::validation();
      $this->penghasilanModel = new \App\Models\PenghasilanModel();
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
      $total = $this->penghasilanModel->countPenghasilan();
      if($this->request->getPost('keyword')) {
         $keyword = $this->request->getPost('keyword');
      }
      $penghasilan = $this->penghasilanModel->getAllPenghasilan($limit, $offset, $keyword);
      return view('admin/penghasilan/index', [
         'title' => 'PPDB Online',
         'subtitle' => 'Penghasilan',
         'penghasilan' => $penghasilan,
         'keyword' => $keyword,
         'total' => $total,
         'perPage' => $perPage,
         'page' => $page,
         'offset' => $offset,
      ]);
	}

   public function getRowPenghasilan()
   { 
      $data = array();

      // Read new token and assign in $data['token']
      $data['token'] = csrf_hash();

      ## Validation
      $validation = \Config\Services::validation();

      $input = $validation->setRules([
        'penghasilan' => 'required',
      ]);

      if ($validation->withRequest($this->request)->run() == FALSE){

         $data['success'] = 0;
         $data['error'] = $validation->getError('penghasilan');// Error response

      }else{

         $data['success'] = 1;
         
         // Fetch record
         $penghasilans = new PenghasilanModel();
         $penghasilan = $penghasilans->select('*')
                ->where('penghasilan', $_POST['penghasilan'])
                ->get()->getRowArray();

         $data['penghasilan'] = $penghasilan;

      }

      return $this->response->setJSON($data);
   }

   public function getId()
   {
      echo json_encode($this->penghasilanModel->getPenghasilanID($_POST['id']));
   }

   public function create()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'penghasilan');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $penghasilanEntities = new \App\Entities\Penghasilan();
            $penghasilanEntities->fill($data);
            $this->penghasilanModel->save($penghasilanEntities);

            $this->session->setFlashdata('success', 'Berhasil Menambahkan Data.');
            return redirect()->to('/penghasilan');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/penghasilan');
      }
   }

   public function edit()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'penghasilan');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $penghasilanEntities = new \App\Entities\Penghasilan();
            $penghasilanEntities->fill($data);
            $this->penghasilanModel->save($penghasilanEntities);

            $this->session->setFlashdata('success', 'Berhasil Edit Data.');
            return redirect()->to('/penghasilan');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/penghasilan');
      }
   }

   public function delete()
   {
      $id = $this->request->uri->getSegment(3);
      $this->penghasilanModel->delete($id);
      $this->session->setFlashdata('success', 'Berhasil Hapus Data Pekerjaan.');
      return redirect()->to('/penghasilan');
   }
}
