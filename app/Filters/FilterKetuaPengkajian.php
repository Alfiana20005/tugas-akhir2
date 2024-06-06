<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterKetuaPengkajian implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // $id_berita = $arguments[0] ?? null;
        // Do something here
        if (session()->level=='') {
            # code...
            return redirect()->to (base_url('/halamanLogin'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if (session()->level=='Ketua Pengkajian') {
            # code...
            return redirect()->to (base_url('/dashboard'));
        }
    }
}