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
        return view('landingPage');
    }
    

}
