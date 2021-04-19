<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\LampiranModel;
class Lampiran extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->validation = \Config\Services::validation();
      $this->lampiranModel = new \App\Models\LampiranModel();
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
      $total = $this->lampiranModel->countLampiran();
      if($this->request->getPost('keyword')) {
         $keyword = $this->request->getPost('keyword');
      }
      $lampiran = $this->lampiranModel->getAllLampiran($limit, $offset, $keyword);
      return view('admin/lampiran/index', [
         'title' => 'PPDB Online',
         'subtitle' => 'Lampiran',
         'lampiran' => $lampiran,
         'keyword' => $keyword,
         'total' => $total,
         'perPage' => $perPage,
         'page' => $page,
         'offset' => $offset,
      ]);
	}

   public function getRowLampiran()
   {

      $request = service('request');
      $postData = $request->getPost();

      $data = array();

      // Read new token and assign in $data['token']
      $data['token'] = csrf_hash();

      ## Validation
      $validation = \Config\Services::validation();

      $input = $validation->setRules([
        'lampiran' => 'required'
      ]);

      if ($validation->withRequest($this->request)->run() == FALSE){

         $data['success'] = 0;
         $data['error'] = $validation->getError('lampiran');// Error response

      }else{

         $data['success'] = 1;
         
         // Fetch record
         $lampirans = new LampiranModel();
         $lampiran = $lampirans->select('*')
                ->where('lampiran', $_POST['lampiran'])
                ->get()->getRowArray();

         $data['lampiran'] = $lampiran;

      }

      return $this->response->setJSON($data);
   }

   public function getId()
   {
      echo json_encode($this->lampiranModel->getLampiranID($_POST['id']));
   }

   public function create()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'lampiran');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $lampiranEntities = new \App\Entities\Lampiran();
            $lampiranEntities->fill($data);
            $this->lampiranModel->save($lampiranEntities);

            $this->session->setFlashdata('success', 'Berhasil Menambahkan Data.');
            return redirect()->to('/lampiran');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/lampiran');
      }
   }

   public function edit()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'lampiran');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $lampiranEntities = new \App\Entities\Lampiran();
            $lampiranEntities->fill($data);
            $this->lampiranModel->save($lampiranEntities);

            $this->session->setFlashdata('success', 'Berhasil Edit Data.');
            return redirect()->to('/lampiran');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/lampiran');
      }
   }

   public function delete()
   {
      $id = $this->request->uri->getSegment(3);
      $this->lampiranModel->delete($id);
      $this->session->setFlashdata('success', 'Berhasil Hapus Data Lampiran.');
      return redirect()->to('/lampiran');
   }
}
