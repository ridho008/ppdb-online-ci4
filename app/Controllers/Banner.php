<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\BannerModel;
class Banner extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->validation = \Config\Services::validation();
      $this->bannerModel = new \App\Models\BannerModel();
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
      $total = $this->bannerModel->countBanner();
      if($this->request->getPost('keyword')) {
         $keyword = $this->request->getPost('keyword');
      }
      $banner = $this->bannerModel->getAllBanner($limit, $offset, $keyword);
      return view('admin/banner/index', [
         'title' => 'PPDB Online',
         'subtitle' => 'banner',
         'banner' => $banner,
         'keyword' => $keyword,
         'total' => $total,
         'perPage' => $perPage,
         'page' => $page,
         'offset' => $offset,
      ]);
	}

   public function getId()
   {
      echo json_encode($this->bannerModel->getBannerID($_POST['id']));
   }

   public function create()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'banner');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $bannerEntities = new \App\Entities\Banner();
            $bannerEntities->fill($data);
            $bannerEntities->banner = $this->request->getFile('banner');
            $this->bannerModel->save($bannerEntities);

            $this->session->setFlashdata('success', 'Berhasil Menambahkan Data.');
            return redirect()->to('/banner');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/banner');
      }
   }

   public function edit()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'banner');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $bannerEntities = new \App\Entities\Banner();
            $bannerEntities->fill($data);
            if($this->request->getFile('banner')->isValid()) {
               $bannerEntities->banner = $this->request->getFile('banner');
            }
            $this->bannerModel->save($bannerEntities);

            $this->session->setFlashdata('success', 'Berhasil Edit Data.');
            return redirect()->to('/banner');
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/banner');
      }
   }

   public function delete()
   {
      $id = $this->request->uri->getSegment(3);
      $this->bannerModel->delete($id);
      $this->session->setFlashdata('success', 'Berhasil Hapus Data Pekerjaan.');
      return redirect()->to('/banner');
   }
}
