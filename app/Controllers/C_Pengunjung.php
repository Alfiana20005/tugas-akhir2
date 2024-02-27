<?php

namespace App\Controllers;
use App\Models\M_Pengunjung;

class C_Pengunjung extends BaseController
{
    protected $M_Pengunjung;
    public function __construct() {
        $this->M_Pengunjung = new M_Pengunjung();
        // $this -> M_Pengunjung = new M_Pengunjung();
    }
    public function index(): string
    {
        $pengunjung = $this->M_Pengunjung->findAll();


        $data =[
            'title' => 'Daftar Pengunjung',
            'data_pengunjung' => $pengunjung,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
             
        ];

        return view('pelayanan/v_inputPengunjung', $data);
    }
    public function rekapitulasi(): string
    {
        // $pengunjung = $this->M_Pengunjung->findAll();

            // Ambil data tanggal dari input form
        $tanggalAwal = $this->request->getPost('awal');
        $tanggalAkhir = $this->request->getPost('akhir');

        // Jika tidak ada tanggal yang diinputkan, tampilkan semua data
        if (empty($tanggalAwal) || empty($tanggalAkhir)) {
            $pengunjung = $this->M_Pengunjung->findAll();
        } else {
            // Jika ada tanggal yang diinputkan, ambil data sesuai rentang tanggal
            $pengunjung = $this->M_Pengunjung->getDataByDateRange($tanggalAwal, $tanggalAkhir);
        }

        $data =[
            'title' => 'Daftar Pengunjung',
            'data_pengunjung' => $pengunjung,
            'M_Pengunjung' => $this->M_Pengunjung,
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir,
        ];
        return view('pelayanan/v_rekapitulasi', $data);
    }
    public function statistik()
    {
        $tahun = $this->request->getPost('tahun');
        $data['tahun'] = $tahun;

        if (empty($tahun)) {
            $tahun = date('Y');
        }

        $data_pengunjung = $this->M_Pengunjung->getDataByYear($tahun);

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

        $bulan_labels = [];
        $data_grafik = [];

        foreach ($data_pengunjung as $row) {
            $bulan_labels[] = $bulanMapping[$row['bulan']];

            if (!isset($data_grafik[$row['kategori']])) {
                $data_grafik[$row['kategori']] = [
                    'label' => $row['kategori'],
                    'backgroundColor' => '#4e73df',
                    'hoverBackgroundColor' => '#2e59d9',
                    'borderColor' => '#4e73df',
                ];
            }

            $data_grafik[$row['kategori']]['data'][$bulanMapping[$row['bulan']]] = $row['total'];
        }

        $data['bulan_labels'] = json_encode(array_unique($bulan_labels));
        $data['data_grafik'] = json_encode(array_values($data_grafik));
        $data['data_pengunjung'] = $data_pengunjung;
        $data['jumlah'] = $this->M_Pengunjung->getDataByMonth($tahun);

        return $data;
    }
    public function tampilstatistik(){
        $data = $this->statistik();
        return view('pelayanan/v_statistik', $data);
    }

    public function tambahPengunjung()
    {
        //validation
        $rules= [
            'nama' => [
                'rules' => 'required',
                'errors' => ['required'=>'Nama harus diisi']
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required'=>'alamat tidak boleh kosong',
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => ['required'=>'Kategori harus diisi']
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => ['required'=>'Jumlah harus diisi']
            ]       
        ];

        if(!$this->validate($rules)){
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to(base_url('/pengunjung')) ->withInput() -> with('errors', $this->validator->listErrors());
        }
        // Debugging session
        $idPetugas = session()->get('id_petugas');
        if (empty($idPetugas)) {
            // Session id_petugas tidak diatur atau kosong
            // Tambahkan tindakan atau pesan kesalahan sesuai kebutuhan
            die('Error: id_petugas tidak valid');
        }

        // Tambahkan log atau debug sesuai kebutuhan
        // echo 'ID Petugas: ' . $idPetugas;
        // log_message('info', 'ID Petugas: ' . $idPetugas);

        // Simpan data pengunjung
        $this->M_Pengunjung->save([
            
                'nama' => $this->request->getVar('nama'),
                'alamat' => $this->request->getVar('alamat'),
                'no_hp' => $this->request->getVar('no_hp'),
                'kategori' => $this->request->getVar('kategori'),
                'jumlah' => $this->request->getVar('jumlah'),
                'id_petugas' => session()->get('id_petugas'), // Ambil ID petugas dari sesi
            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/pengunjung');

        // return view('admin/v_masterpetugas');
    }
    
    
    


}
