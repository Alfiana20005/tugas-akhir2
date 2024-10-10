<?php

namespace App\Controllers;
use App\Models\M_Petugas;
use App\Models\M_Pengunjung;
use App\Models\M_Koleksi;
use App\Models\M_JadwalPrw;
use App\Models\M_Perawatan2;
use App\Models\M_Perpustakaan;

class C_Dashboard extends BaseController
{
    protected $M_Petugas;
    protected $M_Pengunjung;
    protected $M_Koleksi;
    protected $M_JadwalPrw;
    protected $M_Perawatan2;
    protected $M_Perpustakaan;
    public function __construct() {
        helper('form');
        $this -> M_Petugas = new M_Petugas();
        $this->M_Pengunjung = new M_Pengunjung();
        $this->M_Koleksi = new M_Koleksi();
        $this->M_JadwalPrw = new M_JadwalPrw();
        $this->M_Perawatan2 = new M_Perawatan2();
        $this->M_Perpustakaan = new M_Perpustakaan();
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
            '01' => 'Geologika',
            '02' => 'Biologika',
            '03' => 'Etnografika',
            '04' => 'Arkeologika',
            '05' => 'Historika',
            '06' => 'Numismatika',
            '07' => 'Filologika',
            '08' => 'Kramologika',
            '09' => 'Seni Rupa',
            '10' => 'Teknologika',
            '11' => 'Lain-Lain',
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

            if (isset($row['kode_kategori']) && isset($kategori[$row['kode_kategori']])) {
                $kategori_labels[] = $kategori[$row['kode_kategori']];
            } else {
                $kategori_labels[] = 'Kategori Tidak Diketahui'; // Jika tidak ditemukan
            }
            
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
            
            if (isset($row['kode_kategori']) && isset($kategori[$row['kode_kategori']])) {
                $data_grafik['total']['data'][$kategori[$row['kode_kategori']]] = $row['total'];
            } else {
                // Jika kode_kategori tidak ada atau tidak dikenali, tangani kasus ini
                $data_grafik['total']['data']['Kategori Tidak Diketahui'] = $row['total'];
            }
        }

        // end grafik koleksi


        // gerafik perawatan 

        $data_perawatan = $this->M_Perawatan2->getDataByYear($tahun);

        $bulanMapping = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember',
        ];
        $jenisPerawatanMapping = [
            '1' => 'Preventif',
            '2' => 'Kuratif',
            '3' => 'Restorasi'
        ];

        $bulan_labels2 = [];
        $data_grafik2 = [];

        $randomColors = [
            '#78A083', '#344955', '#1B3C73', '#944E63', '#f8a5c2', '#FFCD4B', '#720455', '#2b59c3', '#f5365c', '#FB8B24'
        ];
        
        // Shuffle the $randomColors array to make sure colors are unique for each category
        shuffle($randomColors);
        
        foreach ($data_perawatan as $row) {
            $bulan_labels2[] = $bulanMapping[$row['bulan']];
        
            if (!isset($data_grafik2[$row['kode_jenisprw']])) {
                // Take the first color from the shuffled array for the current category
                $currentColor = array_shift($randomColors);

                // Cek apakah kode_jenisprw ada di dalam jenisPerawatanMapping
                if (isset($jenisPerawatanMapping[$row['kode_jenisprw']])) {
                    $jenisPerawatan = $jenisPerawatanMapping[$row['kode_jenisprw']];
                } else {
                    // Tangani error atau berikan nama default jika tidak ditemukan
                    $jenisPerawatan = 'Jenis Perawatan Tidak Diketahui';
                }
        
                $data_grafik2[$row['kode_jenisprw']] = [
                    'label' =>  $jenisPerawatan,
                    'backgroundColor' => $currentColor,
                    'hoverBackgroundColor' => $currentColor,
                    'borderColor' => $currentColor,
                    'data' => [],
                ];
            }
        
            $data_grafik2[$row['kode_jenisprw']]['data'][$bulanMapping[$row['bulan']]] = $row['total'];
        }

       



        // end grafik perawatan

        $data['bulan_labels'] = json_encode(array_unique($bulan_labels));
       
        $data['datasets'] = [$dataset];
        // Tambahkan data_pengunjung ke dalam variabel $data
        $data['data_pengunjung'] = $data_pengunjung;

        $data['totalPetugas'] = $this->M_Petugas->countPetugas();
        $data['totalKoleksi'] = $this->M_Koleksi->countKoleksi();
        $data['totalBuku'] = $this->M_Perpustakaan->countBuku();
        $data['totalPerawatan'] = $this->M_Perawatan2->totalPerawatan();
        $data['jadwal'] = [$jadwalPrw];
        $data['tahun'] = [$tahun];
        $data['jadwalPrw'] = $this->M_JadwalPrw->getJadwalPrw();
        // var_dump($jadwalPrw);
        $data['kategori_labels'] = json_encode(array_unique($kategori_labels));
        $data['data_grafik'] = json_encode(array_values($data_grafik));
        
        $data['jumlah'] = $this->M_Koleksi->getDataByKategori();
        // grafik perawatan
        $data['bulan_labels2'] = json_encode(array_unique($bulan_labels2));
        $data['data_grafik2'] = json_encode(array_values($data_grafik2));
        $data['data_perawatan'] = $data_perawatan;
        // $data['jumlah'] = $this->M_Perawatan2->getDataByMonth($tahun);




        return view('v_dashboard', $data);
    }

    


}
