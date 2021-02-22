<?php

namespace App\Controllers;
use \App\Models\BannerModel;
use \App\Models\AdminModel;
class Home extends BaseController
{
   public function __construct()
   {
      $this->bannerModel = new \App\Models\BannerModel();
      $this->adminModel = new \App\Models\AdminModel();
   }

	public function index()
	{
      // dd(session()->get());
      $beranda = $this->adminModel->detailSetting();
      $banner = $this->bannerModel->findAll();
		return view('home', [
         'title' => 'PPDB Online',
         'subtitle' => 'Home',
         'banner' => $banner,
         'beranda' => $beranda,
      ]);
	}

}
