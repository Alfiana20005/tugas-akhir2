<?php

namespace App\Controllers;
use App\Models\M_Petugas;

class C_Dashboard extends BaseController
{
    protected $M_Petugas;
    public function __construct() {
        helper('form');
        $this -> M_Petugas = new M_Petugas();
    }
    public function index()
    {
        $data['totalPetugas'] = $this->M_Petugas->countPetugas();
        return view('v_dashboard', $data);
    }
    // public function akses() {
        
    //     $level = session()->get('level');
    //     $data = [
    //         'level' => $level
    //     ];

    //     // Tambahkan kondisi sesuai dengan level pengguna
    //     if ($level == 'Admin') {
    //         $data[''] = $this->M_Petugas->getDataByLevel($level);
    //     } elseif ($level == 'Petugas Pengkajian') {
    //         $data['petugas_data'] = $this->M_Petugas->getDataByLevel($level);
    //     } elseif ($level == 'Petugas Pelayanan') {
    //         $data['petugas_data'] = $this->M_Petugas->getDataByLevel($level);
    //     } elseif ($level == 'Kepala Museum') {
    //         $data['petugas_data'] = $this->M_Petugas->getDataByLevel($level);
    //     } elseif ($level == 'Ketua Pengkajian') {
    //         $data['petugas_data'] = $this->M_Petugas->getDataByLevel($level);
    //     }
    //     // return view('dashboard_view', $data);
    //     return view('template/sidebar', $data);
    
        
    // }
        

}
