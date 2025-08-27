<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // 1. Cek login dulu
        if (empty(session()->level)) {
            return redirect()->to(base_url('/halamanLogin'));
        }

        // 2. Cek akses admin - hanya level 'Admin' yang boleh akses
        if (session()->level !== 'Admin') {
            return redirect()->to(base_url('/dashboard'))
                ->with('error', 'Anda tidak memiliki akses ke modul admin');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Kosong - tidak perlu redirect di after()
        // Bisa digunakan untuk logging jika perlu
        // log_message('info', 'Admin ' . session()->username . ' accessed admin module');
    }
}
