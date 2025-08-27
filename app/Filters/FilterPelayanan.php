<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterPelayanan implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // 1. Cek login dulu
        if (empty(session()->level)) {
            return redirect()->to(base_url('/halamanLogin'));
        }

        // 2. Cek akses pelayanan - level yang boleh akses modul pelayanan
        $allowedLevels = ['Petugas Pelayanan']; // Admin dan Petugas Pelayanan

        if (!in_array(session()->level, $allowedLevels)) {
            return redirect()->to(base_url('/dashboard'))
                ->with('error', 'Anda tidak memiliki akses ke modul pelayanan');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Kosong - tidak perlu redirect di after()
        // Bisa digunakan untuk logging jika perlu
        // log_message('info', 'User ' . session()->username . ' accessed pelayanan module');
    }
}
