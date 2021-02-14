<?php

namespace App\Controllers;
use \App\Models\PekerjaanModel;

class Pekerjaan extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->validation = \Config\Services::validation();
      $this->pekerjaanModel = new \App\Models\PekerjaanModel();
   }
	public function index()
	{
      $pekerjaan = $this->pekerjaanModel->findAll();
		return view('admin/pekerjaan/index', [
         'title' => 'PPDB Online',
         'subtitle' => 'Pekerjaan',
         'pekerjaan' => $pekerjaan
      ]);
	}

   public function getId()
   {
      echo json_encode($this->pekerjaanModel->getPekerjaanID($_POST['id']));
   }

   public function create()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'pekerjaan');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $pekerjaanEntities = new \App\Entities\Pekerjaan();
            $pekerjaanEntities->fill($data);
            $this->pekerjaanModel->save($pekerjaanEntities);

            $this->session->setFlashdata('success', 'Berhasil Menambahkan Data.');
            return redirect()->to('/pekerjaan');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/pekerjaan');
      }
   }

   public function edit()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'pekerjaan');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $pekerjaanEntities = new \App\Entities\Pekerjaan();
            $pekerjaanEntities->fill($data);
            $this->pekerjaanModel->save($pekerjaanEntities);

            $this->session->setFlashdata('success', 'Berhasil Edit Data.');
            return redirect()->to('/pekerjaan');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/pekerjaan');
      }
   }

   public function delete()
   {
      $id = $this->request->uri->getSegment(3);
      $this->pekerjaanModel->delete($id);
      $this->session->setFlashdata('success', 'Berhasil Hapus Data Pekerjaan.');
      return redirect()->to('/pekerjaan');
   }
}
