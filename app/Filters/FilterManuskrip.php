<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterManuskrip implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek apakah user publik sudah login untuk akses manuskrip
        if (session()->get('logUser') != true) {
            return redirect()->to(base_url('/formlogin'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Kosong - tidak perlu redirect di after()
        // Logika asli tidak masuk akal (redirect user yang sudah login)
    }
}
