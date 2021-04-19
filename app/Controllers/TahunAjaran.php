<?php

namespace App\Controllers;
use \App\Models\TahunAjaranModel;

class TahunAjaran extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->validation = \Config\Services::validation();
      $this->tahunModel = new \App\Models\TahunAjaranModel();
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
      $total = $this->tahunModel->countTahun();
      if($this->request->getPost('keyword')) {
         $keyword = $this->request->getPost('keyword');
      }
      $tahun = $this->tahunModel->getAllTahun($limit, $offset, $keyword);
		return view('admin/tahun-ajaran/index', [
         'title' => 'PPDB Online',
         'subtitle' => 'Tahun Ajaran',
         'tahun' => $tahun,
         'keyword' => $keyword,
         'total' => $total,
         'perPage' => $perPage,
         'page' => $page,
         'offset' => $offset,
      ]);
	}

   public function getId()
   {
      echo json_encode($this->tahunModel->getTahunID($_POST['id']));
   }

   public function getRowTahunAjaran()
   { 
      $data = array();

      // Read new token and assign in $data['token']
      $data['token'] = csrf_hash();

      ## Validation
      $validation = \Config\Services::validation();

      $input = $validation->setRules([
        'tahun' => 'required',
      ]);

      if ($validation->withRequest($this->request)->run() == FALSE){

         $data['success'] = 0;
         $data['error'] = $validation->getError('tahun');// Error response

      }else{

         $data['success'] = 1;
         
         // Fetch record
         $tahunAjarans = new TahunAjaranModel();
         $tahun = $tahunAjarans->select('*')
                ->where('tahun', $_POST['tahun'])
                ->get()->getRowArray();

         $data['tahun'] = $tahun;

      }

      return $this->response->setJSON($data);
   }

   public function create()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'tahun');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $tahunEntities = new \App\Entities\TahunAjaran();
            $tahunEntities->fill($data);
            $this->tahunModel->save($tahunEntities);

            $this->session->setFlashdata('success', 'Berhasil Menambahkan Data.');
            return redirect()->to('/tahunAjaran');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/tahunAjaran');
      }
   }

   public function edit()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'tahun');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $tahunEntities = new \App\Entities\TahunAjaran();
            $tahunEntities->fill($data);
            $this->tahunModel->save($tahunEntities);

            $this->session->setFlashdata('success', 'Berhasil Edit Data.');
            return redirect()->to('/tahunAjaran');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/tahunAjaran');
      }
   }

   public function delete()
   {
      $id = $this->request->uri->getSegment(3);
      $this->tahunModel->delete($id);
      $this->session->setFlashdata('success', 'Berhasil Hapus Data Pekerjaan.');
      return redirect()->to('/tahunAjaran');
   }

   public function statusNonaktif()
   {
      $id = $this->request->uri->getSegment(3);
      $data = [
         'id' => $id,
         'status' => 0
      ];
      $this->tahunModel->resetStatus();
      $this->tahunModel->updateStatus($data);
      $this->session->setFlashdata('success', 'Berhasil Ganti Tahun Ajaran.');
      return redirect()->to('/tahunAjaran');
   }

   public function statusAktif()
   {
      $id = $this->request->uri->getSegment(3);
      $data = [
         'id' => $id,
         'status' => 1
      ];
      $this->tahunModel->resetStatus();
      $this->tahunModel->updateStatus($data);
      $this->session->setFlashdata('success', 'Berhasil Ganti Tahun Ajaran.');
      return redirect()->to('/tahunAjaran');
   }
}
