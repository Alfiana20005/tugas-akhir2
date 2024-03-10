<?php

namespace App\Controllers;

use App\Models\M_Petugas;
use App\Models\M_Koleksi;
use App\Models\M_Perawatan;
class C_Perawatan extends BaseController
{
    protected $helpers = ['form'];
    protected $M_Petugas;
    protected $M_Koleksi;
    protected $M_Perawatan;

    public function __construct() {
        helper('form');
        $this -> M_Petugas = new M_Petugas();
        $this -> M_Koleksi = new M_Koleksi();
        $this -> M_Perawatan = new M_Perawatan();
       
    }
    
    public function lihatPerawatan($id) 
    {   
        $data_perawatan = $this->M_Perawatan->getPerawatan($id);
        $data_koleksi = $this->M_Koleksi->getKoleksi($id);

        // Cek apakah ada data perawatan
        if (!is_null($data_perawatan)) {
            // Ambil nama petugas untuk setiap item dalam $data_perawatan
            foreach ($data_perawatan as &$perawatanItem) {
                $petugasName = $this->M_Perawatan->getPetugasName($perawatanItem['id_petugas']);
                $perawatanItem['petugas_name'] = isset($petugasName['nama']) ? $petugasName['nama'] : 'Nama Petugas Tidak Tersedia';
            }
        } else {
            // Jika tidak ada data perawatan, berikan informasi atau tindakan sesuai kebutuhan
            $pesanKosong = 'Data Perawatan tidak tersedia untuk koleksi ini.';
            return view('pengkajian/v_dataPerawatan', ['perawatan' => [], 'koleksi' => [], 'pesan_kosong' => $pesanKosong]);
        }

        // Pastikan $data_perawatan adalah array
        // var_dump($data_perawatan);

        $data = [
            'title' => 'Data Perawatan',
            'perawatan' => $data_perawatan,
            'koleksi' => $data_koleksi, // Tambahkan ini untuk mengirim data koleksi ke view
        ];

        return view('pengkajian/v_dataPerawatan', $data);
    }
    public function tambahPerawatan($id) 
    {  
        $data_perawatan = $this->M_Perawatan->getPerawatan($id);
        $data_koleksi = $this->M_Koleksi->getKoleksi($id);
        $data = [
            'title' => 'Tambah Data Perawatan',
            'perawatan' => $data_perawatan,
            'koleksi' => $data_koleksi,
        ];

        // var_dump($data_koleksi);
        return view('pengkajian/v_tambahPerawatan', $data);
    }
    
    public function savePerawatan()
    {
        // $data_koleksi = $this->M_Koleksi->getKoleksi();
        $idPetugas = session()->get('id_petugas');
        if (empty($idPetugas)) {
            die('Error: id_petugas tidak valid');
        }
    
        
        $fotoSebelum = $this->request->getFile('foto_sebelum');
        $fotoSesudah = $this->request->getFile('foto_sesudah');
    
        if ($fotoSebelum->isValid() && !$fotoSebelum->hasMoved()) {
            $fotoNameSebelum = $fotoSebelum->getRandomName();
            $fotoSebelum->move('img/sebelum', $fotoNameSebelum);
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/tambahPerawatan/{$id}'))
                ->withInput()
                ->with('errors', $fotoSebelum->getErrorString());
        }

        if ($fotoSesudah->isValid() && !$fotoSesudah->hasMoved()) {
            $fotoNameSesudah = $fotoSesudah->getRandomName();
            $fotoSesudah->move('img/sesudah', $fotoNameSesudah);
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/tambahPerawatan/{$id}'))
                ->withInput()
                ->with('errors', $fotoSesudah->getErrorString());
        }
    
        // Simpan data perawatan
        $data = [
            'kode_jenisprw' => $this->request->getVar('kode_jenisprw'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tanggal' => $this->request->getVar('tanggal'),
            'foto_sebelum' => $fotoNameSebelum,
            'foto_sesudah' => $fotoNameSesudah,
            'id_koleksi' => $this->request->getVar('id_koleksi'),
            'id_petugas' => session()->get('id_petugas'),
        ];

        $id = $this->request->getVar('id_koleksi');
    
        $insertResult = $this->M_Perawatan->savePerawatan($data);

        if ($insertResult) {
            // Alert
            session()->setFlashdata('pesan', 'Data Perawatan Berhasil Ditambahkan.');
            return redirect()->to(base_url('/dataPerawatan/' . $id));
            // return redirect()->back(); 
        } else {
            // Handle error, redirect back, or display an error message
            return redirect()->to(base_url('/dataPerawatan/' . $id))
                ->withInput()
                ->with('errors', 'Gagal menyimpan data.');
        }
    }

    
}
