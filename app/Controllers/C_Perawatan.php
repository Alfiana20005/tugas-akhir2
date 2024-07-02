<?php

namespace App\Controllers;

use App\Models\M_Petugas;
use App\Models\M_Koleksi;
use App\Models\M_Perawatan;
use App\Models\M_Perawatan2;
use App\Models\M_JadwalPrw;
class C_Perawatan extends BaseController
{
    protected $helpers = ['form'];
    protected $M_Petugas;
    protected $M_Koleksi;
    protected $M_Perawatan;
    protected $M_Perawatan2;
    protected $M_JadwalPrw;


    public function __construct() {
        helper('form');
        $this -> M_Petugas = new M_Petugas();
        $this -> M_Koleksi = new M_Koleksi();
        $this -> M_Perawatan = new M_Perawatan();
        $this -> M_JadwalPrw = new M_JadwalPrw();
        $this -> M_Perawatan2 = new M_Perawatan2();
       
    }
    
    public function lihatPerawatan($no_registrasi) 
    {   
        $data_perawatan = $this->M_Perawatan2->getPerawatanKoleksi($no_registrasi);
        $data_perawatan2 = $this->M_Perawatan2->getKoleksiByNoRegistrasi($no_registrasi);


       
        $data_koleksi = $this->M_Koleksi->getKoleksi2($no_registrasi);
        // var_dump($data_koleksi);
        // exit;
        if (!is_null($data_perawatan)) {
            foreach ($data_perawatan as &$perawatanItem) {
                $petugasName = $this->M_Perawatan2->getPetugasName($perawatanItem['id_petugas']);
                $perawatanItem['petugas_name'] = isset($petugasName['nama']) ? $petugasName['nama'] : 'Nama Petugas Tidak Tersedia';
                
                $jenisprwData = $this->M_Perawatan2->getJenisPrwName($perawatanItem['kode_jenisprw']);
                $perawatanItem['jenisprw'] = isset($jenisprwData['jenis_prw']) ? $jenisprwData['jenis_prw'] : 'Nama Kategori Tidak Tersedia';
                
            }
            
        } else {
            $pesanKosong = 'Data Perawatan tidak tersedia untuk koleksi ini.';
            return view('pengkajian/v_dataPerawatan', ['perawatan' => [], 'koleksi' => [], 'pesan_kosong' => $pesanKosong]);
        }
        

        // var_dump($data_perawatan);
        
        $data = [
            'title' => 'Data Perawatan',
            'perawatan' => $data_perawatan,
            'perawatan2' => $data_perawatan2,
            'koleksi' => $data_koleksi, // Tambahkan ini untuk mengirim data koleksi ke view
        ];

        // var_dump($no_registrasi);
        // exit;

        return view('pengkajian/v_dataPerawatan', $data);
    }
    // public function lihatPerawatan($id) 
    // {   
    //     $data_perawatan = $this->M_Perawatan->getPerawatan($id);
    //     $data_koleksi = $this->M_Koleksi->getKoleksi($id);
        
    //     if (!is_null($data_perawatan)) {
    //         foreach ($data_perawatan as &$perawatanItem) {
    //             $petugasName = $this->M_Perawatan->getPetugasName($perawatanItem['id_petugas']);
    //             $perawatanItem['petugas_name'] = isset($petugasName['nama']) ? $petugasName['nama'] : 'Nama Petugas Tidak Tersedia';
                
    //             $jenisprwData = $this->M_Perawatan->getJenisPrwName($perawatanItem['kode_jenisprw']);
    //             $perawatanItem['jenisprw'] = isset($jenisprwData['jenis_prw']) ? $jenisprwData['jenis_prw'] : 'Nama Kategori Tidak Tersedia';
                
    //         }
            
    //     } else {
    //         $pesanKosong = 'Data Perawatan tidak tersedia untuk koleksi ini.';
    //         return view('pengkajian/v_dataPerawatan', ['perawatan' => [], 'koleksi' => [], 'pesan_kosong' => $pesanKosong]);
    //     }

    //     // var_dump($data_perawatan);
        
    //     $data = [
    //         'title' => 'Data Perawatan',
    //         'perawatan' => $data_perawatan,
    //         'koleksi' => $data_koleksi, // Tambahkan ini untuk mengirim data koleksi ke view
    //     ];

    //     return view('pengkajian/v_dataPerawatan', $data);
    // }

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
            
            // Hitung progress
            $progress = ($jadwalItem['perawatan'] / $jadwalItem['target']) * 100;
            if ($progress >= 100) {
                $status = 'Selesai';
            } 
            else {
                if ($progress>0) {
                    if (strtotime($jadwalItem['berakhir']) > time()) {
                        $status = 'Sedang Berlangsung';
                    }else{
                        $status = 'Tidak Selesai';
                    }
                }else{
                    if (strtotime($jadwalItem['berakhir']) > time()) {
                        $status = 'Belum Mulai';
                    }else{
                        $status = 'Tidak Selesai';
                    }
                }
            }
            // Simpan status ke database menggunakan model
            $this->M_JadwalPrw->updateStatus(['id' => $jadwalItem['id'], 'status' => $status]);
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
         


        $perawatanData = $modelJadwal->getPerawatanFromJadwal($jadwalData['mulai'], $jadwalData['berakhir'], $jadwalData['kode_jenisprw']);
        $data_ditemukan = !empty($perawatanData);

        $data_koleksi = $this->M_Koleksi->findAll();
        $modelPerawatan = new M_Perawatan2();

        $tanggalAwal = $this->request->getPost('mulaiDari');
        $tanggalAkhir = $this->request->getPost('hingga');
        $kode_kategori = $this->request->getPost('kode_kategori')?? '';
        $kode_jenisprw = $jadwalData['kode_jenisprw'];

        if (empty($tanggalAwal) || empty($tanggalAkhir)) {
            $perawatanData = $modelJadwal->getPerawatanFromJadwal($jadwalData['mulai'], $jadwalData['berakhir'], $jadwalData['kode_jenisprw']);
        } else {
            // Jika ada tanggal yang diinputkan, ambil data sesuai rentang tanggal
            $perawatanData = $modelPerawatan->getPerawatanInRange2($tanggalAwal, $tanggalAkhir, $kode_kategori, $kode_jenisprw);
        }
        
        $jadwalData['jenisprwNames'] = isset($jenisprwNames[0]['jenis_prw']) ? $jenisprwNames[0]['jenis_prw'] : 'Nama Kategori Tidak Tersedia';

        if (!$jadwalData) {
            // Handle if jadwal data not found
            return redirect()->to(base_url('/'))->with('error', 'Jadwal not found');
        }

        
        // $koleksiNames = $this->M_Perawatan->getKoleksiName($data_koleksi['id']);
        foreach ($perawatanData as &$perawatanItem) {
            // $data_koleksi = $this->M_Koleksi->find($perawatanItem['id_koleksi']);
            $data_petugas = $this->M_Petugas->find($perawatanItem['id_petugas']);
            $perawatanItem['koleksiNames'] = isset($data_koleksi['nama_inv']) ? $data_koleksi['nama_inv'] : 'Nama Kategori Tidak Tersedia';
            $perawatanItem['petugasNames'] = isset($data_petugas['nama']) ? $data_petugas['nama'] : 'Nama Kategori Tidak Tersedia';
            $perawatanItem['nip'] = isset($data_petugas['nip']) ? $data_petugas['nip'] : '-';
        }
        if (!$perawatanData) {
            // Handle if perawatan data not found
            return view('pengkajian/v_detailJadwal', ['perawatan' => [], 'jadwal' => $jadwalData]);
        }

        $data =[
            'title' => 'Daftar Perawatan',
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir,
            'kode_kategori' => $kode_kategori,
            'perawatan' => $perawatanData, 
            'jadwal' => $jadwalData,
            // 'data_perawatan' => $dataPerawatan
            'data_ditemukan' => $data_ditemukan
            
        ];

        // Load the view with perawatanData and jadwalData
        return view('pengkajian/v_detailJadwal',$data);
    }


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
    public function laporan() {
        $data_koleksi = $this->M_Koleksi->findAll();
        $modelPerawatan = new M_Perawatan();
        
        $tanggalAwal = $this->request->getPost('mulaiDari');
        $tanggalAkhir = $this->request->getPost('hingga');
        $kode_jenisprw = $this->request->getPost('kode_jenisprw');


        if (empty($tanggalAwal) || empty($tanggalAkhir)) {
            $dataPerawatan = $this->M_Perawatan->findAll();
        } else {
            // Jika ada tanggal yang diinputkan, ambil data sesuai rentang tanggal
            $dataPerawatan = $modelPerawatan->getPerawatanInRange($tanggalAwal, $tanggalAkhir, $kode_jenisprw);
        }

        $jenisprwData = $this->M_Perawatan->getJenisPrwName($kode_jenisprw);
        $nama['jenisprw'] = isset($jenisprwData['jenis_prw']) ? $jenisprwData['jenis_prw'] : 'Nama Kategori Tidak Tersedia';

        // $dataPerawatan = $modelJadwal->getPerawatanFromJadwal($tanggalAwal['mulaiDari'], $tanggalAkhir['hingga'], $kode_jenisprw['jenisprw']);
        foreach ($dataPerawatan as &$perawatanItem) {
            $data_koleksi = $this->M_Koleksi->find($perawatanItem['id_koleksi']);
            $data_petugas = $this->M_Petugas->find($perawatanItem['id_petugas']);
            $jenisprwData = $this->M_Perawatan->getJenisPrwName($perawatanItem['kode_jenisprw']);
            $perawatanItem['jenisprw'] = isset($jenisprwData['jenis_prw']) ? $jenisprwData['jenis_prw'] : 'Nama Kategori Tidak Tersedia';
            $perawatanItem['koleksiNames'] = isset($data_koleksi['nama_inv']) ? $data_koleksi['nama_inv'] : 'Nama Kategori Tidak Tersedia';
            $perawatanItem['no_registrasi'] = isset($data_koleksi['no_registrasi']) ? $data_koleksi['no_registrasi'] : 'Nama Kategori Tidak Tersedia';
            $perawatanItem['petugasNames'] = isset($data_petugas['nama']) ? $data_petugas['nama'] : 'Nama Kategori Tidak Tersedia';
            $perawatanItem['nip'] = isset($data_petugas['nip']) ? $data_petugas['nip'] : '-';
        }
        
        $data =[
            'title' => 'Daftar Perawatan',
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir,
            'kode_jenisprw' => $kode_jenisprw,
            'perawatan'=> $dataPerawatan,
            'nama'=>$nama
        ];


        return view('pengkajian/v_cetak', $data);
    }

    
    public function perawatanPreventif() 
    {
        $dataPerawatan = $this->M_Perawatan2->getPreventif();


        $data =[
            'title' => 'Daftar gallery',
            'dataPerawatan' => $dataPerawatan
        ];
    
        return view('pengkajian/v_perawatanPreventif', $data);
    }
    
    public function savePerawatanPreventif() {
        $foto = $this->request->getFile('foto_sebelum');
    
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/sebelum', $fotoName);
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/perawatanPreventif'))
                ->withInput()
                ->with('errors', $foto->getErrorString());
        }

        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_Perawatan2->save([
            'no_registrasi' => $this->request->getVar('no_registrasi'),
            'nama_inv' => $this->request->getVar('nama_inv'),
            'kode_jenisprw' => '02',
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tanggal_sebelum' => $this->request->getVar('tanggal_sebelum'),
            'foto_sebelum' => $fotoName,
            'status'=> 'Selesai',
            'id_petugas' => session()->get('id_petugas'),
            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/perawatanPreventif');

        
    }
    
    public function perawatanRestorasi() 
    {
    
        return view('pengkajian/v_perawatanRestorasi');
    }  
    public function perawatanKuratif() 
    {
        $data_koleksi = $this->M_Koleksi->findAll();
        $modelPerawatan = new M_Perawatan();
        
        $tanggalAwal = $this->request->getPost('mulaiDari');
        $tanggalAkhir = $this->request->getPost('hingga');
        // $kode_jenisprw = $this->request->getPost('kode_jenisprw');


        if (empty($tanggalAwal) || empty($tanggalAkhir)) {
            $dataPerawatan = $this->M_Perawatan->findAll();
        } else {
           
        }

        // $jenisprwData = $this->M_Perawatan->getJenisPrwName($kode_jenisprw);
        $nama['jenisprw'] = isset($jenisprwData['jenis_prw']) ? $jenisprwData['jenis_prw'] : 'Nama Kategori Tidak Tersedia';

        // $dataPerawatan = $modelJadwal->getPerawatanFromJadwal($tanggalAwal['mulaiDari'], $tanggalAkhir['hingga'], $kode_jenisprw['jenisprw']);
        foreach ($dataPerawatan as &$perawatanItem) {
            $data_koleksi = $this->M_Koleksi->find($perawatanItem['id_koleksi']);
            $data_petugas = $this->M_Petugas->find($perawatanItem['id_petugas']);
            $jenisprwData = $this->M_Perawatan->getJenisPrwName($perawatanItem['kode_jenisprw']);
            $perawatanItem['jenisprw'] = isset($jenisprwData['jenis_prw']) ? $jenisprwData['jenis_prw'] : 'Nama Kategori Tidak Tersedia';
            $perawatanItem['koleksiNames'] = isset($data_koleksi['nama_inv']) ? $data_koleksi['nama_inv'] : 'Nama Kategori Tidak Tersedia';
            $perawatanItem['no_registrasi'] = isset($data_koleksi['no_registrasi']) ? $data_koleksi['no_registrasi'] : 'Nama Kategori Tidak Tersedia';
            $perawatanItem['petugasNames'] = isset($data_petugas['nama']) ? $data_petugas['nama'] : 'Nama Kategori Tidak Tersedia';
            $perawatanItem['nip'] = isset($data_petugas['nip']) ? $data_petugas['nip'] : '-';
        }
        $data =[
            'title' => 'Daftar Perawatan',
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir,
            
            'perawatan'=> $dataPerawatan,
            'nama'=>$nama
        ];
    
        return view('pengkajian/v_perawatanKuratif', $data);
    }  
    




    
}
