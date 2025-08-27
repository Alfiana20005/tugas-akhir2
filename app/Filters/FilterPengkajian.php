<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterPengkajian implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // 1. Cek login dulu
        if (empty(session()->level)) {
            return redirect()->to(base_url('/halamanLogin'));
        }

        // 2. Cek akses pengkajian - level yang boleh akses modul inventaris & perawatan
        $allowedLevels = ['Petugas Pengkajian']; // Admin dan Petugas Pengkajian

        if (!in_array(session()->level, $allowedLevels)) {
            return redirect()->to(base_url('/dashboard'))
                ->with('error', 'Anda tidak memiliki akses ke modul pengkajian');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Kosong - tidak perlu redirect di after()
        // Bisa digunakan untuk logging jika perlu
        // log_message('info', 'User ' . session()->username . ' accessed pengkajian module');
    }
}
