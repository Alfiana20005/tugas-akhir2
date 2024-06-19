<?php

namespace App\Controllers;

use App\Models\M_Perpustakaan;

class C_Perpustakaan extends BaseController
{
    protected $M_Perpustakaan;

    public function __construct()
    {
        $this->M_Perpustakaan = new M_Perpustakaan();
    }

    
    public function index(): string
    {
        $data_buku = $this->M_Perpustakaan->findAll();


        $data =[
            'title' => 'Daftar Buku',
            'data_buku' => $data_buku
        ];

        return view('perpustakaan/inputData', $data);
    }

    public function saveDataBuku()
    {
        //validation
        $rules= [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required'=>'Judul harus diisi']
            ],
        ];

        if(!$this->validate($rules)){
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/inputData') ->withInput() -> with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');
    
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/perpustakaan', $fotoName);
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/inputData'))
                ->withInput()
                ->with('errors', $foto->getErrorString());
        }

        // $idPetugas = session()->get('id_petugas');
        // if (empty($idPetugas)) {
        //     die('Error: id_petugas tidak valid');
        // }

        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_Perpustakaan->save([
            // 'id_petugas' => $id_petugas,
            'kode' => $this->request->getVar('kode'),
            'judul' => $this->request->getVar('judul'),
            'pengarang' => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tempatTerbit' => $this->request->getVar('tempatTerbit'),
            'tahunTerbit' => $this->request->getVar('tahunTerbit'),
            'rak' => $this->request->getVar('rak'),
            'eksemplar' => $this->request->getVar('eksemplar'),
            'status' => $this->request->getVar('status'),
            'keterangan' => $this->request->getVar('keterangan'),
            'kategoriBuku' => $this->request->getVar('kategoriBuku'),            
            'foto' => $fotoName,
            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/inputData');

        // return view('admin/v_masterpetugas');
    }

    public function deleteBuku($id_buku)
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id_buku = filter_var($id_buku, FILTER_SANITIZE_NUMBER_INT);
    
        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_Perpustakaan->delete($id_buku);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    
        // Redirect ke halaman yang sesuai
        return redirect()->to('/inputData');
    }

    public function updateKegiatan($id_kegiatan) {
        // Mengambil data yang akan diupdate dari request
        $dataToUpdate = [
            'judul' => $this->request->getVar('judul'),
            'tanggal' => $this->request->getVar('tanggal'),
            'tampilkan' => $this->request->getVar('tampilkan'),
            'keterangan' => $this->request->getVar('keterangan'),
            'foto' => $this->request->getVar('foto'),
            
        ];
    
        $foto = $this->request->getFile('foto');

        // Cek apakah file foto diunggah
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Generate nama unik untuk file foto
            $fotoName = $foto->getRandomName();

            // Pindahkan file foto ke folder yang diinginkan
            $foto->move('img/kegiatan', $fotoName); // Perbarui path sesuai dengan folder yang diinginkan

            // Tambahkan nama file foto ke data yang akan diupdate
            $dataToUpdate['foto'] = $fotoName;
        }
    
        // Membersihkan data yang mungkin ada dari inputan form
        $dataToUpdate = array_filter($dataToUpdate);
    
        // Memastikan ada data yang akan diupdate
        if (!empty($dataToUpdate)) {
            // Mengeksekusi perintah update
            $this->M_Perpustakaan->update($id_kegiatan, $dataToUpdate);
    
            // Ambil data petugas setelah diubah dari database
            $newDataKegiatan = $this->M_Perpustakaan->getKegiatan($id_kegiatan);
    
            // Perbarui sesi pengguna dengan data baru
            if (session()->get('level') != 'Admin') {
                session()->set([
                    'judul' => $newDataKegiatan['judul'],
                    'tanggal' => $newDataKegiatan['tanggal'],
                    'tampilkan' => $newDataKegiatan['tampilkan'],
                    'keterangan' => $newDataKegiatan['keterangan'],
                    'foto' => $newDataKegiatan['foto'],
                ]);
            }
            //alert
            session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        } else {
            // Jika tidak ada data yang diupdate, munculkan pesan kesalahan
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }
        // dd('berhasil');
    
        // Redirect ke halaman sebelumnya atau halaman yang sesuai
        return redirect()->to('/tambahKegiatan');
    }

    public function tambahData()
    {
        return view('perpustakaan/inputData');
    }
    public function delete($id) 
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    
        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_Perpustakaan->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    
        // Redirect ke halaman yang sesuai
        return redirect()->back();
    }  

    public function saveData()
    {
        
        //validation
        $rules= [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required'=>'Judul harus diisi']
            ]
                  
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('/inputData'))
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
            $foto->move('img/perpustakaan', $fotoName);
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/inputData'))
                ->withInput()
                ->with('errors', $foto->getErrorString());
        }
        // Simpan data pengunjung
        $this->M_Perpustakaan->save([
            
                'kode' => $this->request->getVar('kode'),
                'judul' => $this->request->getVar('judul'),
                'pengarang' => $this->request->getVar('pengarang'),
                'penerbit' => $this->request->getVar('penerbit'),
                'tempatTerbit' => $this->request->getVar('tempatTerbit'),
                'tahunTerbit' => $this->request->getVar('tahunTerbit'),
                'rak' => $this->request->getVar('rak'),
                'eksemplar' => $this->request->getVar('eksemplar'),
                'status' => $this->request->getVar('status'),
                'keterangan' => $this->request->getVar('keterangan'),
                'kategoriBuku' => $this->request->getVar('kategoriBuku'),
                'id_petugas' => $idPetugas,
                'foto' => $fotoName,
                

            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/inputData');

    }
    public function tampilBuku($kategoriBuku) 
    {
        // Mendapatkan data koleksi berdasarkan kategori
        $data_buku= $this->M_Perpustakaan->getKoleksiByKategori($kategoriBuku);

        // Mendapatkan nama kategori
        $kategoriName = $this->M_Perpustakaan->getKategoriName($kategoriBuku);

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
            'data_koleksi' => $data_buku,
            'kategori' => $kategoriName,
            'judul' => $judulKategori,
        ];

        // Menampilkan view dengan data yang telah disiapkan
        return view('perpustakaan/inputData', $data);
    }
    public function detailKoleksi($id) 
    {
        // $this->M_Koleksi->enableQueryLog();


        $data_koleksi = $this->M_Perpustakaan->getKoleksi($id);
        $petugasName = $this->M_Perpustakaan->getPetugasName($data_koleksi['id_petugas']);
        $kategoriName = $this->M_Perpustakaan->getKategoriName($data_koleksi['kode_kategori']);
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
            'data_koleksi' => $this->M_Perpustakaan->getKoleksi($id)
        ];
        
        return view('pengkajian/v_ubahKoleksi', $data);
        
    }
    public function update($id) {
        
        
        // Simpan data pengunjung
       //validation
       $data_koleksi = $this->M_Perpustakaan->getKoleksi($id);

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
        $this->M_Perpustakaan->updateKoleksi($id, $data);

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
            $result = $this->M_Perpustakaan->updateKeadaan($id, $keadaan);

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