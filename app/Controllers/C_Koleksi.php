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
    public function tampilKoleksi($kode_kategori) 
    {
        // Mendapatkan data koleksi berdasarkan kategori
        $data_koleksi = $this->M_Koleksi->getKoleksiByKategori($kode_kategori);

        // Mendapatkan nama kategori
        $kategoriName = $this->M_Koleksi->getKategoriName($kode_kategori);

        // Mengecek apakah kategori ditemukan
        if ($kategoriName !== null && isset($kategoriName['nama_kategori'])) {
            // Jika kategori ditemukan, gunakan nama kategori di judul
            $judulKategori = $kategoriName['nama_kategori'];
        } else {
            // Handle jika kategori tidak ditemukan
            $judulKategori = 'Kategori Tidak Ditemukan';
        }

        // Membuat array data untuk dikirim ke view
        $data = [
            'title' => 'Daftar Koleksi ', // Menggunakan nama kategori di judul
            'data_koleksi' => $data_koleksi,
            'kategori' => $kategoriName,
            'judul' => $judulKategori,
        ];

        // Menampilkan view dengan data yang telah disiapkan
        return view('pengkajian/v_dataKoleksi', $data);
    }
    public function detailKoleksi($id) 
    {
        // $this->M_Koleksi->enableQueryLog();


        $data_koleksi = $this->M_Koleksi->getKoleksi($id);
        $petugasName = $this->M_Koleksi->getPetugasName($data_koleksi['id_petugas']);
        $kategoriName = $this->M_Koleksi->getKategoriName($data_koleksi['kode_kategori']);
        $data_koleksi['petugas_name'] = isset($petugasName['nama']) ? $petugasName['nama'] : 'Nama Petugas Tidak Tersedia';
        $data_koleksi['kategori_name'] = isset($kategoriName['nama_kategori']) ? $kategoriName['nama_kategori'] : 'Nama Kategori Tidak Tersedia';
        
        // Akses log query setelah menjalankan query model
    // $queries = $this->M_Koleksi->getQueryLog();
    // print_r($queries);
        $data = [
            'title' => 'Detail Koleksi',
            'data_koleksi' => $data_koleksi,
        ];

        return view('pengkajian/v_detailKoleksi', $data);
        
    }
    
    public function edit($id) 
    {
        $data =[
            'title' => 'Ubah Data Koleksi',
            'validation' => \Config\Services::validation(),
            'data_koleksi' => $this->M_Koleksi->getKoleksi($id)
        ];
        
        return view('pengkajian/v_ubahKoleksi', $data);
        
    }
    public function update($id) {
        
        
        // Simpan data pengunjung
       //validation
       $data_koleksi = $this->M_Koleksi->getKoleksi($id);

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
            $fotoName = $data_koleksi['gambar'];
        }
        
        $data= [
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
            
        ];
        $this->M_Koleksi->updateKoleksi($id, $data);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        // dd($this->request->getVar());
        // Redirect ke halaman sebelumnya atau halaman yang sesuai
        return redirect()->to('/detailKoleksi/' . $id);
    } 
}