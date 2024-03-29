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
                'errors' => ['required'=>'No Registrasi harus diisi']
            ],
            'no_inventaris' => [
                'rules' => 'required',
                'errors' => ['required'=>'No Inventaris harus diisi']
            ],
            
            'nama_inv' => [
                'rules' => 'required',
                'errors' => ['required'=>'Nama Benda harus diisi']
            ],
            'ukuran' => [
                'rules' => 'required',
                'errors' => ['required'=>'Ukuran harus diisi']
            ],
            'tempat_buat' => [
                'rules' => 'required',
                'errors' => ['required'=>'Tempat buat harus diisi']
            ],
            'tempat_dapat' => [
                'rules' => 'required',
                'errors' => ['required'=>'Tempat dapat harus diisi']
            ],
            'cara_dapat' => [
                'rules' => 'required',
                'errors' => ['required'=>'Cara dapat harus diisi']
            ],
            'tgl_masuk' => [
                'rules' => 'required',
                'errors' => ['required'=>'Tanggal Masuk harus diisi']
            ],
            'keadaan' => [
                'rules' => 'required',
                'errors' => ['required'=>'Keadaan harus diisi']
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => ['required'=>'Lokasi harus diisi']
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => ['required'=>'Keterangan harus diisi']
            ],
            'uraian' => [
                'rules' => 'required',
                'errors' => ['required'=>'Uraian harus diisi']
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
    public function updateKeadaan()
    {
        // Pastikan metode yang digunakan adalah POST
        if ($this->request->getMethod() == 'post') {
            // Ambil data ID dan status dari permintaan POST
            $id = $this->request->getPost('id');
            $keadaan = $this->request->getPost('keadaan');

            // Lakukan pembaruan status di database menggunakan model
            $result = $this->M_Koleksi->updateKeadaan($id, $keadaan);

            // Beri respons berdasarkan hasil pembaruan
            if ($result) {
                return redirect()->back();
                // return $this->response->setJSON(['success' => false, 'message' => 'Berhasil']);
        
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui status']);
            }
        } else {
            // Jika metode bukan POST, beri respons dengan kesalahan
            return $this->response->setJSON(['success' => false, 'message' => 'Metode yang tidak valid']);
        }
    }

    // public function grafikKoleksi()
    // {
    //     // $data_koleksi = $this->M_Koleksi->();
    //     $kategori = [
    //         '01' => 'Arkeologi',
    //         '02' => 'Biologika',
    //         '03' => 'Etnografika',
    //         '04' => 'Filologika',
    //         '05' => 'Geologika',
    //         '06' => 'Historika',
    //         '07' => 'Kramologika',
    //         '08' => 'Numismatika',
    //         '09' => 'Seni Rupa',
    //         '10' => 'Teknologika',
    //     ];
    //     $randomColors = [
    //         '#78A083', '#344955', '#1B3C73', '#944E63', '#f8a5c2', '#FFCD4B', '#720455', '#2b59c3', '#f5365c', '#FB8B24'
    //     ];
    //     shuffle($randomColors);

    //     $kategori_labels = [];
    //     $data_grafik = [];

    //     // Mengelompokkan data berdasarkan kode kategori
    //     $datakoleksigrafik=$this->M_Koleksi->koleksi();

    //     foreach ($datakoleksigrafik as $row) {
    //         $kategori_labels[] = $kategori[$row['kode_kategori']];
            
    //         if (!isset($data_grafik['total'])) {
    //             // Ambil warna pertama dari array acak untuk kategori saat ini
    //             $currentColor = array_shift($randomColors);
            
    //             $data_grafik['total'] = [
    //                 'label' => 'Total Koleksi',
    //                 'backgroundColor' => $currentColor,
    //                 'hoverBackgroundColor' => $currentColor,
    //                 'borderColor' => $currentColor,
    //                 'data' => [],
    //             ];
    //         }
            
    //         $data_grafik['total']['data'][$kategori[$row['kode_kategori']]] = $row['total'];
    //     }

    //     $data['kategori_labels'] = json_encode(array_unique($kategori_labels));
    //     $data['data_grafik'] = json_encode(array_values($data_grafik));
    //     // $data['data_koleksi'] = $data_koleksi;
    //     $data['jumlah'] = $this->M_Koleksi->getDataByKategori();

    //     return view('Pengkajian/v_grafikkoleksi', $data);
    // }

}