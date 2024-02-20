<?php

namespace App\Controllers;
use App\Models\M_Petugas;
use App\Models\M_Pengunjung;

class C_Dashboard extends BaseController
{
    protected $M_Petugas;
    protected $M_Pengunjung;
    public function __construct() {
        helper('form');
        $this -> M_Petugas = new M_Petugas();
        $this->M_Pengunjung = new M_Pengunjung();
    }
    public function index()
    {
        $tahun = date('Y');
        $data_pengunjung = $this->M_Pengunjung->getTotalPengunjungPerBulan();
        foreach ($data_pengunjung as $row) {
            $bulan_labels[] = $row['bulan'];
        }
        $data['bulan_labels'] = json_encode(array_unique($bulan_labels));

        $dataset = [
            'label' => 'Jumlah Pengunjung',
            'lineTension' => 0.3,
            'backgroundColor' => 'rgba(78, 115, 223, 0.05)',
            'borderColor' => 'rgba(78, 115, 223, 1)',
            'pointRadius' => 3,
            'pointBackgroundColor' => 'rgba(78, 115, 223, 1)',
            'pointBorderColor' => 'rgba(78, 115, 223, 1)',
            'pointHoverRadius' => 3,
            'pointHoverBackgroundColor' => 'rgba(78, 115, 223, 1)',
            'pointHoverBorderColor' => 'rgba(78, 115, 223, 1)',
            'pointHitRadius' => 10,
            'pointBorderWidth' => 2,
            'data' => array_column($data_pengunjung, 'total'),
        ];

        $data['datasets'] = [$dataset];

        // Tambahkan data_pengunjung ke dalam variabel $data
        $data['data_pengunjung'] = $data_pengunjung;

        $data['totalPetugas'] = $this->M_Petugas->countPetugas();
        return view('v_dashboard', $data);
    }

}
