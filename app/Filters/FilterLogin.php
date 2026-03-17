<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterLogin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek login dulu
        if (empty(session()->level) || session()->level == '') {
            return redirect()->to(base_url('/halamanLogin'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Kosong
    }
}
