<?php

namespace App\Controllers;
use App\Models\M_Petugas;
use App\Models\M_Pengunjung;
use App\Models\M_Koleksi;
use App\Models\M_JadwalPrw;

class C_Dashboard extends BaseController
{
    protected $M_Petugas;
    protected $M_Pengunjung;
    protected $M_Koleksi;
    protected $M_JadwalPrw;
    public function __construct() {
        helper('form');
        $this -> M_Petugas = new M_Petugas();
        $this->M_Pengunjung = new M_Pengunjung();
        $this->M_Koleksi = new M_Koleksi();
        $this->M_JadwalPrw = new M_JadwalPrw();
    }
    public function index()
    {
        // stastistik pengunjung 
        $tahun = date('Y');
        $jadwalPrw = $this->M_JadwalPrw->getJadwalPrw();
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

        //progress
        foreach ($jadwalPrw as &$jadwalItem) {
            $jenisprwNames = $this->M_JadwalPrw->getJenisPrwName($jadwalItem['kode_jenisprw']);
            $jadwalItem['jenisprwNames'] = isset($jenisprwNames[0]['jenis_prw']) ? $jenisprwNames[0]['jenis_prw'] : 'Nama Kategori Tidak Tersedia';
            // $perawatanData =
            // $jadwalData = $this->M_JadwalPrw->find($jadwalItem['id']);
            $jadwalItem['perawatan']= $this->M_JadwalPrw->countPerawatanInRange($jadwalItem['mulai'], $jadwalItem['berakhir'], $jadwalItem['kode_jenisprw']);
            
        }
        // end statistik pengunjung


        // grafik koleksi
        $kategori = [
            '01' => 'Arkeologi',
            '02' => 'Biologika',
            '03' => 'Etnografika',
            '04' => 'Filologika',
            '05' => 'Geologika',
            '06' => 'Historika',
            '07' => 'Kramologika',
            '08' => 'Numismatika',
            '09' => 'Seni Rupa',
            '10' => 'Teknologika',
        ];
        $randomColors = [
            '#78A083', '#344955', '#1B3C73', '#944E63', '#f8a5c2', '#FFCD4B', '#720455', '#2b59c3', '#f5365c', '#FB8B24'
        ];
        shuffle($randomColors);

        $kategori_labels = [];
        $data_grafik = [];

        // Mengelompokkan data berdasarkan kode kategori
        $datakoleksigrafik=$this->M_Koleksi->koleksi();

        foreach ($datakoleksigrafik as $row) {
            $kategori_labels[] = $kategori[$row['kode_kategori']];
            
            if (!isset($data_grafik['total'])) {
                // Ambil warna pertama dari array acak untuk kategori saat ini
                $currentColor = array_shift($randomColors);
            
                $data_grafik['total'] = [
                    'label' => 'Total Koleksi',
                    'backgroundColor' => $currentColor,
                    'hoverBackgroundColor' => $currentColor,
                    'borderColor' => $currentColor,
                    'data' => [],
                ];
            }
            
            $data_grafik['total']['data'][$kategori[$row['kode_kategori']]] = $row['total'];
        }

        // end grafik koleksi


       
        $data['datasets'] = [$dataset];
        // Tambahkan data_pengunjung ke dalam variabel $data
        $data['data_pengunjung'] = $data_pengunjung;

        $data['totalPetugas'] = $this->M_Petugas->countPetugas();
        $data['totalKoleksi'] = $this->M_Koleksi->countKoleksi();
        $data['jadwal'] = [$jadwalPrw];
        $data['tahun'] = [$tahun];
        $data['jadwalPrw'] = $this->M_JadwalPrw->getJadwalPrw();
        // var_dump($jadwalPrw);
        $data['kategori_labels'] = json_encode(array_unique($kategori_labels));
        $data['data_grafik'] = json_encode(array_values($data_grafik));
        
        $data['jumlah'] = $this->M_Koleksi->getDataByKategori();
        return view('v_dashboard', $data);
    }

    


}
