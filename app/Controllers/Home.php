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
      $jmlPendaftaran = $this->bannerModel->jumlahPendaftar();
      $jkPria = $this->bannerModel->jumlahKelamin('L');
      $jkPerempuan = $this->bannerModel->jumlahKelamin('P');
		return view('home', [
         'title' => 'PPDB Online',
         'subtitle' => 'Home',
         'banner' => $banner,
         'beranda' => $beranda,
         'jmlPendaftaran' => $jmlPendaftaran,
         'jkPerempuan' => $jkPerempuan,
         'jkPria' => $jkPria,
      ]);
	}

}
