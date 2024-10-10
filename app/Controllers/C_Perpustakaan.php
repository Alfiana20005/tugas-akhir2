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
            'data_buku' => $data_buku,
        ];

        return view('dataBuku', $data);
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
            return redirect()->to('/dataBuku') ->withInput() -> with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');
        $dafaultImg = 'no_cover.jpg';
    
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/perpustakaan', $fotoName);
        } else {
            // Handle file upload error
            $fotoName = $dafaultImg;
        }

       
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
            'tampilkan' => $this->request->getVar('tampilkan'),            
            'foto' => $fotoName,
            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/dataBuku');

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
        return redirect()->to('/dataBuku');
    }

    public function updateBuku($id_buku) {
        // Mengambil data yang akan diupdate dari request
        $dataToUpdate = [
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
            'tampilkan' => $this->request->getVar('tampilkan'),            
            'foto' => $this->request->getVar('foto'), 
            
        ];
    
        $foto = $this->request->getFile('foto');
        

        // Cek apakah file foto diunggah
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Generate nama unik untuk file foto
            $fotoName = $foto->getRandomName();

            // Pindahkan file foto ke folder yang diinginkan
            $foto->move('img/perpustakaan', $fotoName); // Perbarui path sesuai dengan folder yang diinginkan

            // Tambahkan nama file foto ke data yang akan diupdate
            $dataToUpdate['foto'] = $fotoName;
        }
    
        // Membersihkan data yang mungkin ada dari inputan form
        $dataToUpdate = array_filter($dataToUpdate);
    
        // Memastikan ada data yang akan diupdate
        if (!empty($dataToUpdate)) {
            // Mengeksekusi perintah update
            $this->M_Perpustakaan->update($id_buku, $dataToUpdate);
    
            // Ambil data petugas setelah diubah dari database
            $newDataBuku = $this->M_Perpustakaan->getBuku($id_buku);
    
            // Perbarui sesi pengguna dengan data baru
            if (session()->get('level') != 'Admin') {
                session()->set([
                    

                    'kode' => $newDataBuku['kode'],
                    'judul' => $newDataBuku['judul'],
                    'pengarang' => $newDataBuku['pengarang'],
                    'penerbit' => $newDataBuku['penerbit'],
                    'tempatTerbit' => $newDataBuku['tempatTerbit'],
                    'tahunTerbit' => $newDataBuku['tahunTerbit'],
                    'rak' => $newDataBuku['rak'],
                    'eksemplar' => $newDataBuku['eksemplar'],
                    'status' => $newDataBuku['status'],
                    'keterangan' => $newDataBuku['keterangan'],
                    'kategoriBuku' => $newDataBuku['kategoriBuku'],         
                    'tampilkan' =>$newDataBuku['tampilkan'],      
                    'foto' => $newDataBuku['foto'],
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
        return redirect()->to('/dataBuku');
    }

    public function tambahData()
    {
        return view('perpustakaan2/inputData');
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
            return redirect()->to(base_url('/dataBuku'))
                ->withInput()
                ->with('errors', $this->validator->listErrors());
        }
    
        $idPetugas = session()->get('id_petugas');
        if (empty($idPetugas)) {
            die('Error: id_petugas tidak valid');
        }
    
        $foto = $this->request->getFile('gambar');
        $dafaultImg = 'no_cover.jpeg';
    
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/perpustakaan', $fotoName);
        } else {
            // Handle file upload error
            // return redirect()->to(base_url('/inputData'))
            //     ->withInput()
            //     ->with('errors', $foto->getErrorString());
            $fotoName = $dafaultImg;
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

        return redirect()-> to('/dataBuku');

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
        return view('dataBuku', $data);
    }

    

}