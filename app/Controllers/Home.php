<?php

namespace App\Controllers;
use \App\Models\BannerModel;
class Home extends BaseController
{
   public function __construct()
   {
      $this->bannerModel = new \App\Models\BannerModel();
   }
	public function index()
	{
      // dd(session()->get());
      $banner = $this->bannerModel->findAll();
		return view('home', [
         'title' => 'PPDB Online',
         'subtitle' => 'Home',
         'banner' => $banner
      ]);
	}
}
