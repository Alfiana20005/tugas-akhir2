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
use App\Models\M_Pesan;
use App\Models\M_SemuaPetugas;

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
    protected $M_Pesan;
    protected $M_SemuaPetugas;

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
        $this -> M_Pesan = new M_Pesan();
        $this -> M_SemuaPetugas = new M_SemuaPetugas();
    }
    public function strukturOrganisasi(){

        $dataPetugas = $this->M_SemuaPetugas->findAll();

        $data =[
            'title' => 'Struktur Organisasi',
            'dataPetugas' => $dataPetugas,
            
        ];

        
        return view('CompanyProfile/strukturAdmin', $data);
    }

    public function petugasMuseum()
    {
        //validation
        $rules= [
            'nama' => [
                'rules' => 'required',
                'errors' => ['required'=>'Judul harus diisi']
            ],
            
        ];

        if(!$this->validate($rules)){
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/strukturOrganisasi') ->withInput() -> with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');
    
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/semuaPetugas', $fotoName);
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/strukturOrganisasi'))
                -> withInput()
                ->with('errors', $foto->getErrorString());
        }

        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_SemuaPetugas->save([
            // 'id_petugas' => $id_petugas,
            'nama' => $this->request->getVar('nama'),
            'nip' => $this->request->getVar('nip'),
            'jabatan' => $this->request->getVar('jabatan'),
            'foto' => $fotoName,
            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/strukturOrganisasi');

        // return view('admin/v_masterpetugas');
    }
    public function updateKaryawan($id_karyawan) {
        // Mengambil data yang akan diupdate dari request
        $dataToUpdate = [
            'nama' => $this->request->getVar('nama'),
            'nip' => $this->request->getVar('nip'),
            'jabatan' => $this->request->getVar('jabatan'),
            'foto' => $this->request->getVar('foto'),
            
        ];
    
        $foto = $this->request->getFile('foto');

        // Cek apakah file foto diunggah
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Generate nama unik untuk file foto
            $fotoName = $foto->getRandomName();

            // Pindahkan file foto ke folder yang diinginkan
            $foto->move('img/semuaPetugas', $fotoName); // Perbarui path sesuai dengan folder yang diinginkan

            // Tambahkan nama file foto ke data yang akan diupdate
            $dataToUpdate['foto'] = $fotoName;
        }
    
        // Membersihkan data yang mungkin ada dari inputan form
        $dataToUpdate = array_filter($dataToUpdate);
    
        // Memastikan ada data yang akan diupdate
        if (!empty($dataToUpdate)) {
            // Mengeksekusi perintah update
            $this->M_SemuaPetugas->update($id_karyawan, $dataToUpdate);
    
            // Ambil data petugas setelah diubah dari database
            $newDataKaryawan = $this->M_SemuaPetugas->getKaryawan($id_karyawan);
    
            // Perbarui sesi pengguna dengan data baru
            if (session()->get('level') != 'Admin') {
                session()->set([
                    'nama' => $newDataKaryawan['nama'],
                    'nip' => $newDataKaryawan['nip'],
                    'jabatan' => $newDataKaryawan['jabatan'],
                    'foto' => $newDataKaryawan['foto'],
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
        return redirect()->to('/strukturOrganisasi');
    }

    public function hapusOrganisasi($id_karyawan) 
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id_karyawan = filter_var($id_karyawan, FILTER_SANITIZE_NUMBER_INT);
    
        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_SemuaPetugas->delete($id_karyawan);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    
        // Redirect ke halaman yang sesuai
        return redirect()->to('/strukturOrganisasi');
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
    
        $removeFoto = $this->request->getVar('removeFoto');

        // Handle the photo removal or upload
        if ($removeFoto) {
            $fotoName = null; // Set to null if the photo is to be removed
        } else {
            if ($foto && $foto->isValid() && !$foto->hasMoved()) {
                $fotoName = $foto->getRandomName();
                $foto->move('img/berita', $fotoName);
            } else {
                $fotoName = $this->request->getVar('existingFoto'); // Use the existing photo name if no new photo is uploaded
            }
        }

        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_Berita->save([
            // 'id_petugas' => $id_petugas,
            'judul' => $this->request->getVar('judul'),
            'tanggal' => $this->request->getVar('tanggal'),
            'type' => $this->request->getVar('type'),
            'kategoriBerita' => $this->request->getVar('kategoriBerita'),
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

    public function updateBerita($id_berita) {
        // Mengambil data yang akan diupdate dari request
        $dataToUpdate = [
            'judul' => $this->request->getVar('judul'),
            'tanggal' => $this->request->getVar('tanggal'),
            'type' => $this->request->getVar('type'),
            'kategoriBerita' => $this->request->getVar('kategoriBerita'),
            'isi' => $this->request->getVar('isi'),
            'foto' => $this->request->getVar('foto'),
            
        ];
    
        $foto = $this->request->getFile('foto');

        // Cek apakah file foto diunggah
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Generate nama unik untuk file foto
            $fotoName = $foto->getRandomName();

            // Pindahkan file foto ke folder yang diinginkan
            $foto->move('img/berita', $fotoName); // Perbarui path sesuai dengan folder yang diinginkan

            // Tambahkan nama file foto ke data yang akan diupdate
            $dataToUpdate['foto'] = $fotoName;
        }
    
        // Membersihkan data yang mungkin ada dari inputan form
        $dataToUpdate = array_filter($dataToUpdate);
    
        // Memastikan ada data yang akan diupdate
        if (!empty($dataToUpdate)) {
            // Mengeksekusi perintah update
            $this->M_Berita->update($id_berita, $dataToUpdate);
    
            // Ambil data petugas setelah diubah dari database
            $newDataBerita = $this->M_Berita->getBerita($id_berita);
    
            // Perbarui sesi pengguna dengan data baru
            if (session()->get('level') != 'Admin') {
                session()->set([
                    'judul' => $newDataBerita['judul'],
                    'tanggal' => $newDataBerita['tanggal'],
                    'type' => $newDataBerita['type'],
                    'kategoriBerita' => $newDataBerita['kategoriBerita'],
                    'isi' => $newDataBerita['isi'],
                    'foto' => $newDataBerita['foto'],
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
            $this->M_Kegiatan->update($id_kegiatan, $dataToUpdate);
    
            // Ambil data petugas setelah diubah dari database
            $newDataKegiatan = $this->M_Kegiatan->getKegiatan($id_kegiatan);
    
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
    public function kajianAdmin(): string
    {
        $kajian = $this->M_Kajian->findAll();


        $data =[
            'title' => 'Daftar Kajian',
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

    public function updatePublikasi($id_publikasi) {
        // Mengambil data yang akan diupdate dari request
        $dataToUpdate = [
            'judul' => $this->request->getVar('judul'),
            'tanggal' => $this->request->getVar('tanggal'),
            'link' => $this->request->getVar('link'),
            'foto' => $this->request->getVar('foto'),
            
        ];
    
        $foto = $this->request->getFile('foto');

        // Cek apakah file foto diunggah
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Generate nama unik untuk file foto
            $fotoName = $foto->getRandomName();

            // Pindahkan file foto ke folder yang diinginkan
            $foto->move('img/publikasi', $fotoName); // Perbarui path sesuai dengan folder yang diinginkan

            // Tambahkan nama file foto ke data yang akan diupdate
            $dataToUpdate['foto'] = $fotoName;
        }
    
        // Membersihkan data yang mungkin ada dari inputan form
        $dataToUpdate = array_filter($dataToUpdate);
    
        // Memastikan ada data yang akan diupdate
        if (!empty($dataToUpdate)) {
            // Mengeksekusi perintah update
            $this->M_Publikasi->update($id_publikasi, $dataToUpdate);
    
            // Ambil data petugas setelah diubah dari database
            $newDataPublikasi = $this->M_Publikasi->getPublikasi($id_publikasi);
    
            // Perbarui sesi pengguna dengan data baru
            if (session()->get('level') != 'Admin') {
                session()->set([
                    'judul' => $newDataPublikasi['judul'],
                    'tanggal' => $newDataPublikasi['tanggal'],
                    'link' => $newDataPublikasi['link'],
                    'foto' => $newDataPublikasi['foto'],
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

    public function updateKoleksiAdmin($id_koleksi)
    {
        // Mengambil data yang akan diupdate dari request
        $dataToUpdate = [
            'nama' => $this->request->getVar('nama'),
            'no' => $this->request->getVar('no'),
            'kategori' => $this->request->getVar('kategori'),
            'ukuran' => $this->request->getVar('ukuran'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto' => $this->request->getVar('foto'),
            
        ];
    
        $foto = $this->request->getFile('foto');

        // Cek apakah file foto diunggah
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Generate nama unik untuk file foto
            $fotoName = $foto->getRandomName();

            // Pindahkan file foto ke folder yang diinginkan
            $foto->move('img/koleksiAdmin', $fotoName); // Perbarui path sesuai dengan folder yang diinginkan

            // Tambahkan nama file foto ke data yang akan diupdate
            $dataToUpdate['foto'] = $fotoName;
        }
    
        // Membersihkan data yang mungkin ada dari inputan form
        $dataToUpdate = array_filter($dataToUpdate);
    
        // Memastikan ada data yang akan diupdate
        if (!empty($dataToUpdate)) {
            // Mengeksekusi perintah update
            $this->M_KoleksiLandingPage->update($id_koleksi, $dataToUpdate);
    
            // Ambil data petugas setelah diubah dari database
            $newDataKoleksi = $this->M_KoleksiLandingPage->getKOleksiById($id_koleksi);
    
            // Perbarui sesi pengguna dengan data baru
            if (session()->get('level') != 'Admin') {
                session()->set([
                    'nama' => $newDataKoleksi['nama'],
                    'no' => $newDataKoleksi['no'],
                    'ukuran' => $newDataKoleksi['ukuran'],
                    'kategori' => $newDataKoleksi['kategori'],
                    'deskripsi' => $newDataKoleksi['deskripsi'],
                    'foto' => $newDataKoleksi['foto'],
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

    
    public function updateGallery($id_gallery)
    {
        // Mengambil data yang akan diupdate dari request
        $dataToUpdate = [
            'judul' => $this->request->getVar('judul'),
            'no' => $this->request->getVar('no'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto' => $this->request->getVar('foto'),
            
        ];
    
        $foto = $this->request->getFile('foto');

        // Cek apakah file foto diunggah
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Generate nama unik untuk file foto
            $fotoName = $foto->getRandomName();

            // Pindahkan file foto ke folder yang diinginkan
            $foto->move('img/galery', $fotoName); // Perbarui path sesuai dengan folder yang diinginkan

            // Tambahkan nama file foto ke data yang akan diupdate
            $dataToUpdate['foto'] = $fotoName;
        }
    
        // Membersihkan data yang mungkin ada dari inputan form
        $dataToUpdate = array_filter($dataToUpdate);
    
        // Memastikan ada data yang akan diupdate
        if (!empty($dataToUpdate)) {
            // Mengeksekusi perintah update
            $this->M_Gallery->update($id_gallery, $dataToUpdate);
    
            // Ambil data petugas setelah diubah dari database
            $newDataGallery = $this->M_Gallery->getGallery($id_gallery);
    
            // Perbarui sesi pengguna dengan data baru
            if (session()->get('level') != 'Admin') {
                session()->set([
                    'judul' => $newDataGallery['judul'],
                    'no' => $newDataGallery['no'],
                    'deskripsi' => $newDataGallery['deskripsi'],
                    'foto' => $newDataGallery['foto'],
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
        return redirect()->to('/galleryAdmin');
    }


    public function pesanAdmin(): string
    {
        $data_pesan = $this->M_Pesan->findAll();


        $data =[
            'title' => 'Daftar Pesan',
            'pesan' => $data_pesan
        ];

        
        return view('CompanyProfile/pesanAdmin', $data);
    }

    public function deletePesan($id_pesan)
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id_pesan = filter_var($id_pesan, FILTER_SANITIZE_NUMBER_INT);
    
        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_Pesan->delete($id_pesan);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    
        // Redirect ke halaman yang sesuai
        return redirect()->to('/pesanAdmin');
    }
   
    
    
        


    

}
