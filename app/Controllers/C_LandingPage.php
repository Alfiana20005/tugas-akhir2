<?php

namespace App\Controllers;

use App\Models\M_Petugas;

class C_LandingPage extends BaseController
{
    protected $helpers = ['form'];
    protected $M_Petugas;
    public function __construct() {
        helper('form');
        $this -> M_Petugas = new M_Petugas();
    }
    public function index(): string
    {
        return view('CompanyProfile/company');
    }
    public function sejarah(): string
    {
        return view('CompanyProfile/v_sejarah');
    }
    public function visiMisi(): string
    {
        return view('CompanyProfile/visiMisi');
    }
    public function struktur(): string
    {
        return view('CompanyProfile/struktur');
    }
    public function ruangPamer(): string
    {
        return view('CompanyProfile/ruangPamer');
    }
    public function tataTertib(): string
    {
        return view('CompanyProfile/tatatertib');
    }
    public function berita(): string
    {
        return view('CompanyProfile/berita');
    }
    public function kegiatan(): string
    {
        return view('CompanyProfile/kegiatan');
    }
    public function kajian(): string
    {
        return view('CompanyProfile/kajian');
    }
    public function beritaAdmin(): string
    {
        return view('CompanyProfile/beritaAdmin');
    }
    public function tambahBerita(): string
    {

        return view('CompanyProfile/tambahBerita');
    }
    public function koleksi_page(): string
    {

        return view('CompanyProfile/koleksi_page');
    }
    public function koleksi_detail(): string
    {

        return view('CompanyProfile/koleksi_detail');
    }
    public function publikasi(): string
    {

        return view('CompanyProfile/publikasi');
    }
    

}
