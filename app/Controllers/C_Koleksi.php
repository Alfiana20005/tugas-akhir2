<?php

namespace App\Controllers;

use App\Models\M_Koleksi;

class C_Koleksi extends BaseController
{
    protected $M_Koleksi;

    public function __construct()
    {
        $this->M_Koleksi = new M_Koleksi();
    }

    public function tambahData()
    {
        return view('pengkajian/v_tambahKoleksi');
    }
    public function delete($id) 
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    
        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_Koleksi->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    
        // Redirect ke halaman yang sesuai
        return redirect()->to('/koleksi');
    }  

    public function saveData()
    {
        
        //validation
        $rules= [
            'no_registrasi' => [
                'rules' => 'required',
                'errors' => ['required'=>'Nama harus diisi']
            ],
                  
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('/tambahdata'))
                ->withInput()
                ->with('errors', $this->validator->listErrors());
        }
    
        $idPetugas = session()->get('id_petugas');
        if (empty($idPetugas)) {
            die('Error: id_petugas tidak valid');
        }
    
        $foto = $this->request->getFile('gambar');
    
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/koleksi', $fotoName);
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/tambahdata'))
                ->withInput()
                ->with('errors', $foto->getErrorString());
        }
        // Simpan data pengunjung
        $this->M_Koleksi->save([
            
                'no_registrasi' => $this->request->getVar('no_registrasi'),
                'no_inventaris' => $this->request->getVar('no_inventaris'),
                'nama_inv' => $this->request->getVar('nama_inv'),
                'gambar' => $fotoName,
                'ukuran' => $this->request->getVar('ukuran'),
                'tempat_buat' => $this->request->getVar('tempat_buat'),
                'tempat_dapat' => $this->request->getVar('tempat_dapat'),
                'cara_dapat' => $this->request->getVar('cara_dapat'),
                'tgl_masuk' => $this->request->getVar('tgl_masuk'),
                'keadaan' => $this->request->getVar('keadaan'),
                'lokasi' => $this->request->getVar('lokasi'),
                'keterangan' => $this->request->getVar('keterangan'),
                'uraian' => $this->request->getVar('uraian'),
                'kode_kategori' => $this->request->getVar('kode_kategori'),
                'id_petugas' => session()->get('id_petugas'), // Ambil ID petugas dari sesi
            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/tambahdata');

    }
    
    public function tampilKoleksi() 
    {
        $data_koleksi = $this->M_Koleksi->findAll();


        $data =[
            'title' => 'Daftar Koleksi',
            'data_koleksi' => $data_koleksi
        ];

        return view('pengkajian/v_dataKoleksi', $data);
    }
    public function detailKoleksi($id) 
    {
        $data_koleksi = $this->M_Koleksi->getKoleksi($id);
        $petugasName = $this->M_Koleksi->getPetugasName($data_koleksi['id_petugas']);
        $data_koleksi['petugas_name'] = isset($petugasName['nama']) ? $petugasName['nama'] : 'Nama Petugas Tidak Tersedia';


        $data =[
            'title' => 'Detail Koleksi',
            'data_koleksi' => $data_koleksi
        ];

        return view('pengkajian/v_detailKoleksi', $data);
        
    }
    public function lihatPerawatan() 
    {
        
        return view('pengkajian/v_dataPerawatan');
    }
    public function tambahPerawatan() 
    {
        
        return view('pengkajian/v_tambahPerawatan');
    }

}