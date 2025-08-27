<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterPerpustakaan implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek apakah user sudah login
        if (empty(session()->level) || session()->level == '') {
            return redirect()->to(base_url('/halamanLogin'));
        }

        // Cek apakah user memiliki akses ke perpustakaan
        // Misalnya hanya level 'Admin' atau 'Perpustakaan' yang bisa akses
        $allowedLevels = ['Perpustakaan']; // Sesuaikan dengan level yang diizinkan

        if (!in_array(session()->level, $allowedLevels)) {
            // Redirect ke halaman yang sesuai berdasarkan level
            return redirect()->to(base_url('/dashboard'))->with('error', 'Akses ditolak!');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
