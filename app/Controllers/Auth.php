<?php

namespace App\Controllers;

class Auth extends BaseController
{
   public function __construct()
   {
      helper('form');
   }
	public function index()
	{
		return view('login', [
         'title' => 'PPDB Online',
         'subtitle' => 'Halaman Login'
      ]);
	}
}
