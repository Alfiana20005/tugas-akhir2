<?php

namespace App\Controllers;

use App\Models\M_Petugas;
use App\Models\M_Berita;
use App\Models\M_Kegiatan;
use App\Models\M_Publikasi;
use App\Models\M_KoleksiLandingPage;
use App\Models\M_Gallery;
use App\Models\M_Kajian;
use App\Models\M_Isikajian;

class C_Admin extends BaseController
{
    protected $helpers = ['form'];
    protected $M_Petugas;
    protected $M_Berita;
    protected $M_Kegiatan;
    protected $M_Publikasi;
    protected $M_KoleksiLandingPage;
    protected $M_Kajian;
    protected $M_Isikajian;
    protected $M_Gallery;
    public function __construct() {
        helper('form');
        $this -> M_Petugas = new M_Petugas();
        $this -> M_Berita = new M_Berita();
        $this -> M_Kegiatan = new M_Kegiatan();
        $this -> M_Publikasi = new M_Publikasi();
        $this -> M_KoleksiLandingPage = new M_KoleksiLandingPage();
        $this -> M_Gallery = new M_Gallery();
        $this -> M_Kajian = new M_Kajian();
        $this -> M_Isikajian = new M_Isikajian();
    }
    public function berita(): string
    {
        $data_berita = $this->M_Berita->findAll();


        $data =[
            'title' => 'Daftar Berita',
            'dataBerita' => $data_berita
        ];

        
        return view('CompanyProfile/beritaAdmin', $data);
    }
    public function tambahBerita(): string
    {

        return view('CompanyProfile/tambahBerita');
    }
    public function save()
    {
        //validation
        $rules= [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required'=>'Judul harus diisi']
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required'=>'tanggal tidak boleh kosong',
                    
    
                ]
            ],
        ];

        if(!$this->validate($rules)){
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/beritaAdmin') ->withInput() -> with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');
    
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/berita', $fotoName);
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/tambahBerita'))
                ->withInput()
                ->with('errors', $foto->getErrorString());
        }

        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_Berita->save([
            // 'id_petugas' => $id_petugas,
            'judul' => $this->request->getVar('judul'),
            'tanggal' => $this->request->getVar('tanggal'),
            'type' => $this->request->getVar('type'),
            'isi' => $this->request->getVar('isi'),
            'foto' => $fotoName,
            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/beritaAdmin');

        // return view('admin/v_masterpetugas');
    }
    public function deleteBerita($id_berita) 
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id_berita = filter_var($id_berita, FILTER_SANITIZE_NUMBER_INT);
    
        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_Berita->delete($id_berita);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    
        // Redirect ke halaman yang sesuai
        return redirect()->to('/beritaAdmin');
    }
    public function tambahKegiatan(): string
    {
        $data_kegiatan = $this->M_Kegiatan->findAll();


        $data =[
            'title' => 'Daftar Kegiatan',
            'dataKegiatan' => $data_kegiatan
        ];

        return view('CompanyProfile/tambahKegiatan', $data);
    }
    public function saveKegiatan()
    {
        //validation
        $rules= [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required'=>'Judul harus diisi']
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required'=>'tanggal tidak boleh kosong',
                    
    
                ]
            ],
        ];

        if(!$this->validate($rules)){
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/tambahKegiatan') ->withInput() -> with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');
    
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/kegiatan', $fotoName);
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/tambahKegiatan'))
                ->withInput()
                ->with('errors', $foto->getErrorString());
        }

        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_Kegiatan->save([
            // 'id_petugas' => $id_petugas,
            'judul' => $this->request->getVar('judul'),
            'tanggal' => $this->request->getVar('tanggal'),
            'keterangan' => $this->request->getVar('keterangan'),
            'tampilkan' => $this->request->getVar('tampilkan'),
            'foto' => $fotoName,
            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/tambahKegiatan');

        // return view('admin/v_masterpetugas');
    }
    public function deleteKegiatan($id_kegiatan)
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id_kegiatan = filter_var($id_kegiatan, FILTER_SANITIZE_NUMBER_INT);
    
        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_Kegiatan->delete($id_kegiatan);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    
        // Redirect ke halaman yang sesuai
        return redirect()->to('/tambahKegiatan');
    }
    public function kajianAdmin(): string
    {
        $kajian = $this->M_Kajian->findAll();


        $data =[
            'title' => 'Daftar Kegiatan',
            'kajian' => $kajian
        ];

       
        return view('CompanyProfile/kajianAdmin', $data);
    }
    public function saveKajian()
    {
        //validation
        $rules= [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required'=>'Judul harus diisi']
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required'=>'tanggal tidak boleh kosong',
                    
    
                ]
            ],
        ];

        if(!$this->validate($rules)){
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/kajianAdmin') ->withInput() -> with('errors', $this->validator->listErrors());
        }
        

        $foto = $this->request->getFile('sampul');
    
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/kajian', $fotoName);
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/kajianAdmin'))
                ->withInput()
                ->with('errors', $foto->getErrorString());
        }

        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_Kajian->save([
            // 'id_petugas' => $id_petugas,
            'judul' => $this->request->getVar('judul'),
            'created_at' => $this->request->getVar('tanggal'),
            
            'penulis' => $this->request->getVar('penulis'),
            'kategori' => $this->request->getVar('kategori'),
            'sampul' => $fotoName,
            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/kajianAdmin');

        // return view('admin/v_masterpetugas');
    }
    public function tulisKajian($id_kajian): string
    {
        $data_kajian = $this->M_Isikajian->findAll();
        // $kajian = $this->M_Kajian->findAll();
        $kajian = $this->M_Kajian->getKajian($id_kajian);
        


        $data =[
            'title' => 'Daftar Kegiatan',
            'kajian' => $kajian,
            
            'data_kajian' => $data_kajian,
           

        ];

       
        return view('CompanyProfile/tulisKajian', $data);
    }
    public function saveIsiKajian()
    {
       // Ambil data dari form
    //    $narasi = $this->request->getPost('narasi');
       $id_kajian = $this->request->getPost('id_kajian');
    //    $gambar = $this->request->getFile('foto');
        // $kajian = $this->M_Kajian->getKajian($id_kajian);
        

        //validation
        $rules= [
            'narasi' => [
                'rules' => 'required',
                'errors' => ['required'=>'Judul harus diisi']
            ],
        ];

        if(!$this->validate($rules)){
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/kajianAdmin') ->withInput() -> with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');
    
        $removeFoto = $this->request->getVar('removeFoto');

        // Handle the photo removal or upload
        if ($removeFoto) {
            $fotoName = null; // Set to null if the photo is to be removed
        } else {
            if ($foto && $foto->isValid() && !$foto->hasMoved()) {
                $fotoName = $foto->getRandomName();
                $foto->move('img/kajian', $fotoName);
            } else {
                $fotoName = $this->request->getVar('existingFoto'); // Use the existing photo name if no new photo is uploaded
            }
        }

        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_Isikajian->save([
            // 'id_petugas' => $id_petugas,
            'narasi' => $this->request->getVar('narasi'),
            'id_kajian' => $this->request->getVar('id_kajian'),
            'foto' => $fotoName,
            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

       return redirect()->to('/tulisKajian/' . $id_kajian);
    }
    public function deleteKajian($id_kajian)
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id_kajian = filter_var($id_kajian, FILTER_SANITIZE_NUMBER_INT);
    
        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_Kajian->delete($id_kajian);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    
        // Redirect ke halaman yang sesuai
        return redirect()->to('/kajianAdmin');
    }

    public function tambahPublikasi(): string
    {
        $data_publikasi = $this->M_Publikasi->findAll();


        $data =[
            'title' => 'Daftar Kegiatan',
            'data_publikasi' => $data_publikasi
        ];

        return view('CompanyProfile/publikasiAdmin', $data);
    }
    public function savePublikasi()
    {
        //validation
        $rules= [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required'=>'Judul harus diisi']
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required'=>'tanggal tidak boleh kosong',
                    
    
                ]
            ],
        ];

        if(!$this->validate($rules)){
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/tambahPublikasi') ->withInput() -> with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');
    
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/publikasi', $fotoName);
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/tambahPublikasi'))
                ->withInput()
                ->with('errors', $foto->getErrorString());
        }

        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_Publikasi->save([
            // 'id_petugas' => $id_petugas,
            'judul' => $this->request->getVar('judul'),
            'tanggal' => $this->request->getVar('tanggal'),
            'link' => $this->request->getVar('link'),
            'foto' => $fotoName,
            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/tambahPublikasi');

        // return view('admin/v_masterpetugas');
    }
    public function deletePublikasi($id_publikasi)
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id_publikasi = filter_var($id_publikasi, FILTER_SANITIZE_NUMBER_INT);
    
        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_Publikasi->delete($id_publikasi);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    
        // Redirect ke halaman yang sesuai
        return redirect()->to('/tambahPublikasi');
    }
    public function koleksiAdmin(): string
    {
        $koleksi = $this->M_KoleksiLandingPage->findAll();


        $data =[
            'title' => 'Daftar Koleksi',
            'koleksi' => $koleksi
        ];

        
        return view('CompanyProfile/koleksiAdmin', $data);
    }
    public function saveKoleksi()
    {
        //validation
        $rules= [
            'nama' => [
                'rules' => 'required',
                'errors' => ['required'=>'Judul harus diisi']
            ],
            'no' => [
                'rules' => 'required',
                'errors' => [
                    'required'=>'tanggal tidak boleh kosong',
                    
    
                ]
            ],
        ];

        if(!$this->validate($rules)){
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/koleksiAdmin') ->withInput() -> with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');
    
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/koleksiAdmin', $fotoName);
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/koleksiAdmin'))
                ->withInput()
                ->with('errors', $foto->getErrorString());
        }

        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_KoleksiLandingPage->save([
            // 'id_petugas' => $id_petugas,
            'nama' => $this->request->getVar('nama'),
            'no' => $this->request->getVar('no'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ukuran' => $this->request->getVar('ukuran'),
            'kategori' => $this->request->getVar('kategori'),
            'foto' => $fotoName,
            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/koleksiAdmin');

        // return view('admin/v_masterpetugas');
    }
    public function deleteKoleksi($id_koleksi)
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id_koleksi = filter_var($id_koleksi, FILTER_SANITIZE_NUMBER_INT);
    
        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_KoleksiLandingPage->delete($id_koleksi);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    
        // Redirect ke halaman yang sesuai
        return redirect()->to('/koleksiAdmin');
    }
    public function galleryAdmin(): string
    {
        $gallery = $this->M_Gallery->findAll();


        $data =[
            'title' => 'Daftar gallery',
            'gallery' => $gallery
        ];

        
        return view('CompanyProfile/galleryAdmin', $data);
    }
    public function saveGallery()
    {
        //validation
        $rules= [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required'=>'Judul harus diisi']
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required'=>'tanggal tidak boleh kosong',
                    
    
                ]
            ],
        ];

        if(!$this->validate($rules)){
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/galleryAdmin') ->withInput() -> with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');
    
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/galery', $fotoName);
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/galleryAdmin'))
                ->withInput()
                ->with('errors', $foto->getErrorString());
        }

        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_Gallery->save([
            // 'id_petugas' => $id_petugas,
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto' => $fotoName,
            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/galleryAdmin');

        // return view('admin/v_masterpetugas');
    }
    public function deleteGallery($id_gallery)
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id_gallery = filter_var($id_gallery, FILTER_SANITIZE_NUMBER_INT);
    
        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_Gallery->delete($id_gallery);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    
        // Redirect ke halaman yang sesuai
        return redirect()->to('/galleryAdmin');
    }
   
    
    
        


    

}
