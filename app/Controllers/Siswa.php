<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\SiswaModel;
class Siswa extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->validation = \Config\Services::validation();
      $this->siswaModel = new \App\Models\SiswaModel();
   }

	public function index()
	{
      return view('siswa/dashboard', [
         'title' => 'PPDB Online',
         'subtitle' => 'Dashboard',
      ]);
	}

   
}
