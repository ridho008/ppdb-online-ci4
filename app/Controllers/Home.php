<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
      // dd(session()->get());
		return view('home', [
         'title' => 'PPDB Online',
         'subtitle' => 'Home'
      ]);
	}
}
