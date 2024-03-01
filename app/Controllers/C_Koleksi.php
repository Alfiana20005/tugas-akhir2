<?php

namespace App\Controllers;

use App\Models\M_Koleksi;

class C_Koleksi extends BaseController
{
    public function tambahData() 
    {
        
        return view('pengkajian/v_tambahKoleksi');
    }
    public function tampilKoleksi() 
    {
        
        return view('pengkajian/v_dataKoleksi');
    }
    public function detailKoleksi() 
    {
        
        return view('pengkajian/v_detailKoleksi');
    }

}