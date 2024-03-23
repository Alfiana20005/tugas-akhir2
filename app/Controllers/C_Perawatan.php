<?php

namespace App\Controllers;

use App\Models\M_Petugas;
use App\Models\M_Koleksi;
use App\Models\M_Perawatan;
use App\Models\M_JadwalPrw;
class C_Perawatan extends BaseController
{
    protected $helpers = ['form'];
    protected $M_Petugas;
    protected $M_Koleksi;
    protected $M_Perawatan;
    protected $M_JadwalPrw;


    public function __construct() {
        helper('form');
        $this -> M_Petugas = new M_Petugas();
        $this -> M_Koleksi = new M_Koleksi();
        $this -> M_Perawatan = new M_Perawatan();
        $this -> M_JadwalPrw = new M_JadwalPrw();
       
    }
    
    public function lihatPerawatan($id) 
    {   
        $data_perawatan = $this->M_Perawatan->getPerawatan($id);
        $data_koleksi = $this->M_Koleksi->getKoleksi($id);
        
        if (!is_null($data_perawatan)) {
            foreach ($data_perawatan as &$perawatanItem) {
                $petugasName = $this->M_Perawatan->getPetugasName($perawatanItem['id_petugas']);
                $perawatanItem['petugas_name'] = isset($petugasName['nama']) ? $petugasName['nama'] : 'Nama Petugas Tidak Tersedia';
                
                $jenisprwData = $this->M_Perawatan->getJenisPrwName($perawatanItem['kode_jenisprw']);
                $perawatanItem['jenisprw'] = isset($jenisprwData['jenis_prw']) ? $jenisprwData['jenis_prw'] : 'Nama Kategori Tidak Tersedia';
                
            }
            
        } else {
            $pesanKosong = 'Data Perawatan tidak tersedia untuk koleksi ini.';
            return view('pengkajian/v_dataPerawatan', ['perawatan' => [], 'koleksi' => [], 'pesan_kosong' => $pesanKosong]);
        }

        // var_dump($data_perawatan);
        // Pastikan $data_perawatan adalah array
        

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
        $rules= [
            'kode_jenisprw' => [
                'rules' => 'required',
                'errors' => [
                    'required'=>'Jenis Perawatan harus diisi',
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => ['required'=>'Tanggal harus diisi']
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => ['required'=>'Deskripsi harus diisi']
            ],
        
              
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->listErrors());
        }
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

    public function perawatan()
    {
        $jadwalPrw = $this->M_JadwalPrw->getJadwalPrw();
        
        //menghhitung jumlah perawatan yang dilakukan
        foreach ($jadwalPrw as &$jadwalItem) {
            $jenisprwNames = $this->M_JadwalPrw->getJenisPrwName($jadwalItem['kode_jenisprw']);
            $jadwalItem['jenisprwNames'] = isset($jenisprwNames[0]['jenis_prw']) ? $jenisprwNames[0]['jenis_prw'] : 'Nama Kategori Tidak Tersedia';
            $jadwalItem['perawatan']= $this->M_JadwalPrw->countPerawatanInRange($jadwalItem['mulai'], $jadwalItem['berakhir'], $jadwalItem['kode_jenisprw']);
            
        }
    
        // Looping untuk setiap jadwal dan memperbarui status serta menyimpannya ke database
        foreach ($jadwalPrw as $j) {
            // Hitung progress
            $progress = ($j['perawatan'] / $j['target']) * 100;
    
            // Tentukan status berdasarkan progress
            if ($progress >= 100) {
                $status = 'Selesai';
            } elseif ($progress > 0) {
                $status = 'Sedang Berlangsung';
            } else {
                $status = 'Belum Mulai';
            }
    
            // Simpan status ke database menggunakan model
            $this->M_JadwalPrw->updateStatus(['id' => $j['id'], 'status' => $status]);
        }
        $data = [
            'title' => 'Jadwal Perawatan',
            'jadwal' => $jadwalPrw,

        ];
        
        return view('pengkajian/v_perawatan', $data);
    }

    public function tambahJadwalPerawatan(){

        return view('pengkajian/v_tambahJadwal');
    }

    public function saveJadwalPerawatan()
    {
        $rules= [
            'kode_jenisprw' => [
                'rules' => 'required',
                'errors' => [
                    'required'=>'Jenis Perawatan harus diisi',
                ]
            ],
            'target' => [
                'rules' => 'required',
                'errors' => ['required'=>'Target Perawatan harus diisi']
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => ['required'=>'Deskripsi harus diisi']
            ],
            'mulai' => [
                'rules' => 'required',
                'errors' => ['required'=>'Tanggal Mulai harus diisi']
            ],
            'berakhir' => [
                'rules' => 'required',
                'errors' => ['required'=>'Tanggal Berakhir harus diisi']
            ],
            'status' => [
                'rules' => 'required',
                'errors' => ['required'=>'Status harus diisi']
            ],
        
              
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->listErrors());
        }
        $data = [
            'kode_jenisprw' => $this->request->getVar('kode_jenisprw'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'mulai' => $this->request->getVar('mulai'),
            'berakhir' => $this->request->getVar('berakhir'),
            'target' => $this->request->getVar('target'),
            'status' => $this->request->getVar('status'),
            'id_petugas' => session()->get('id_petugas'),
        ];
    
        $insertResult = $this->M_JadwalPrw->saveJadwal($data);

        if ($insertResult) {
            session()->setFlashdata('pesan', 'Jadwal Perawatan Berhasil Ditambahkan.');
            return redirect()->to(base_url('/perawatan'));
             
        } else {  
            return redirect()->to(base_url('/perawatan'))
                ->withInput()
                ->with('errors', 'Gagal menyimpan data.');
        }

    }
    public function detailJadwal($id)
    {
        // $data_koleksi = $this->M_Koleksi->findAll();
        $modelJadwal = new M_JadwalPrw();
        // $jadwalPrw = $this->M_JadwalPrw->getJadwalPrw();
        
        // Fetch the jadwal data
        $jadwalData = $modelJadwal->find($id);
        $jenisprwNames = $this->M_JadwalPrw->getJenisPrwName($jadwalData['kode_jenisprw']);
        
        $jadwalData['jenisprwNames'] = isset($jenisprwNames[0]['jenis_prw']) ? $jenisprwNames[0]['jenis_prw'] : 'Nama Kategori Tidak Tersedia';

        if (!$jadwalData) {
            // Handle if jadwal data not found
            return redirect()->to(base_url('/'))->with('error', 'Jadwal not found');
        }

        // Fetch the perawatan data within the specified range and jenis perawatan
        $perawatanData = $modelJadwal->getPerawatanFromJadwal($jadwalData['mulai'], $jadwalData['berakhir'], $jadwalData['kode_jenisprw']);
        // $koleksiNames = $this->M_Perawatan->getKoleksiName($data_koleksi['id']);
        foreach ($perawatanData as &$perawatanItem) {
            $data_koleksi = $this->M_Koleksi->find($perawatanItem['id_koleksi']);
            $data_petugas = $this->M_Petugas->find($perawatanItem['id_petugas']);
            $perawatanItem['koleksiNames'] = isset($data_koleksi['nama_inv']) ? $data_koleksi['nama_inv'] : 'Nama Kategori Tidak Tersedia';
            $perawatanItem['petugasNames'] = isset($data_petugas['nama']) ? $data_petugas['nama'] : 'Nama Kategori Tidak Tersedia';
            $perawatanItem['nip'] = isset($data_petugas['nip']) ? $data_petugas['nip'] : '-';
        }
        if (!$perawatanData) {
            // Handle if perawatan data not found
            return view('pengkajian/v_detailJadwal', ['perawatan' => [], 'jadwal' => $jadwalData]);
        }

        // Load the view with perawatanData and jadwalData
        return view('pengkajian/v_detailJadwal', ['perawatan' => $perawatanData, 'jadwal' => $jadwalData]);
    }
    // public function updateStatus()
    // {
    //     // Pastikan metode yang digunakan adalah POST
    //     if ($this->request->getMethod() == 'post') {
    //         // Ambil data ID dan status dari permintaan POST
    //         $id = $this->request->getPost('id');
    //         $status = $this->request->getPost('status');

    //         // Lakukan pembaruan status di database menggunakan model
    //         $result = $this->M_JadwalPrw->updateStatus($id, $status);

    //         // Beri respons berdasarkan hasil pembaruan
    //         if ($result) {
    //             return redirect()->to("/perawatan");
        
    //         } else {
    //             return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui status']);
    //         }
    //     } else {
    //         // Jika metode bukan POST, beri respons dengan kesalahan
    //         return $this->response->setJSON(['success' => false, 'message' => 'Metode yang tidak valid']);
    //     }
    // }

    // 

    
    // public function updateStatus($id)
    // {
    //     // Mengambil data dari database atau sumber data lainnya
    //     $data = $this->M_JadwalPrw->getDataById($id);

    //     // Menghitung kemajuan berdasarkan data yang ada
    //     $progress = ($data['perawatan'] / $data['target']) * 100;

    //     // Menentukan status berdasarkan kemajuan
    //     if ($progress >= 100) {
    //         $status = 'Selesai';
    //     } elseif ($progress > 0) {
    //         $status = 'Sedang Berlangsung';
    //     } else {
    //         $status = 'Belum Mulai';
    //     }

    //     // Memperbarui status di database
    //     $this->M_JadwalPrw->updateStatus($id, $status);
    // }


    // public function updateStatus(){
    //     // Ambil data jadwal dari model
    //     $data['jadwal'] = $this->M_JadwalPrw->getAll();
    
    //     // Looping untuk setiap jadwal dan memperbarui status serta menyimpannya ke database
    //     foreach ($data['jadwal'] as $j) {
    //         // Hitung progress
    //         $progress = ($j['perawatan'] / $j['target']) * 100;
    
    //         // Tentukan status berdasarkan progress
    //         if ($progress >= 100) {
    //             $status = 'Selesai';
    //         } elseif ($progress > 0) {
    //             $status = 'Sedang Berlangsung';
    //         } else {
    //             $status = 'Belum Mulai';
    //         }
    
    //         // Simpan status ke database menggunakan model
    //         $this->M_JadwalPrw->updateStatus(['id' => $j['id'], 'status' => $status]);
    //     }
    
    //     // Load view dengan data yang telah diperbarui
    //     return view('pengkajian/v_perawatan', $data);
    // }
    public function delete($id) 
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    
        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_JadwalPrw->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    
        // Redirect ke halaman yang sesuai
        return redirect()->to('/perawatan');
    }  
    public function printLapPerwatan() {

        
        
    }




    
}
