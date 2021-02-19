<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->get('username') == '') {
         return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if(session()->get('username') != null) {
            return redirect()->to('/admin');
        }

        if(session()->get('username') != null) {
            if(uri_string() == 'auth') {
                return redirect()->to('/admin');
            }
        } 

        if(session()->get('username') != null) {
            if(uri_string() == 'siswa') {
                return redirect()->to('/admin');
            }
        }
    }
}