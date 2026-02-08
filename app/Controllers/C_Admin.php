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
use App\Models\M_Manuskrip;
use App\Models\M_ManuskripKol;
use App\Models\M_Sega;
use App\Models\M_User;
use App\Models\M_Penelitian;
use App\Models\M_Pameran;

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
    protected $M_Manuskrip;
    protected $M_ManuskripKol;
    protected $M_Sega;
    protected $M_User;
    protected $M_Penelitian;
    protected $M_Pameran;

    public function __construct()
    {
        helper('form');
        $this->M_Petugas = new M_Petugas();
        $this->M_Berita = new M_Berita();
        $this->M_Kegiatan = new M_Kegiatan();
        $this->M_Publikasi = new M_Publikasi();
        $this->M_KoleksiLandingPage = new M_KoleksiLandingPage();
        $this->M_Gallery = new M_Gallery();
        $this->M_Kajian = new M_Kajian();
        $this->M_Isikajian = new M_Isikajian();
        $this->M_Pesan = new M_Pesan();
        $this->M_SemuaPetugas = new M_SemuaPetugas();
        $this->M_Manuskrip = new M_Manuskrip();
        $this->M_ManuskripKol = new M_ManuskripKol();
        $this->M_Sega = new M_Sega();
        $this->M_User = new M_User();
        $this->M_Penelitian = new M_Penelitian();
        $this->M_Pameran = new M_Pameran();
    }

    public function strukturOrganisasi()
    {

        $dataPetugas = $this->M_SemuaPetugas->findAll();

        $data = [
            'title' => 'Struktur Organisasi',
            'dataPetugas' => $dataPetugas,

        ];


        return view('CompanyProfile/strukturAdmin', $data);
    }

    public function petugasMuseum()
    {
        //validation
        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi']
            ],

        ];

        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/strukturOrganisasi')->withInput()->with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');

        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/semuaPetugas', $fotoName);
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/strukturOrganisasi'))
                ->withInput()
                ->with('errors', $foto->getErrorString());
        }

        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_SemuaPetugas->save([
            // 'id_petugas' => $id_petugas,
            'nama' => $this->request->getVar('nama'),
            'nip' => $this->request->getVar('nip'),
            'jabatan' => $this->request->getVar('jabatan'),
            'urutan' => $this->request->getVar('urutan'),
            'foto' => $fotoName,

        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/strukturOrganisasi');

        // return view('admin/v_masterpetugas');
    }
    public function updateKaryawan($id_karyawan)
    {
        // Mengambil data yang akan diupdate dari request
        $dataToUpdate = [
            'nama' => $this->request->getVar('nama'),
            'nip' => $this->request->getVar('nip'),
            'jabatan' => $this->request->getVar('jabatan'),
            'urutan' => $this->request->getVar('urutan'),
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
                    'urutan' => $newDataKaryawan['urutan'],
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
        // Ambil data berita diurutkan berdasarkan tanggal terbaru
        $dataBerita = $this->M_Berita->orderBy('tanggal', 'DESC')->findAll();

        // Atau jika ingin berdasarkan ID (biasanya auto increment)
        // $dataBerita = $this->M_Berita->orderBy('id_berita', 'DESC')->findAll();

        // foreach ($dataBerita as &$dataBerita) {
        //     $dataBerita['isi'] = $this->getExcerpt($dataBerita['isi'], 10);
        // }

        $data = [
            'title' => 'Daftar Berita',
            'dataBerita' => $dataBerita
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
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi']
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal tidak boleh kosong',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/beritaAdmin')->withInput()->with('errors', $this->validator->listErrors());
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
            'ketgambar' => $this->request->getVar('ketgambar'),
            'jenisBerita' => $this->request->getVar('jenisBerita'),
            'foto' => $fotoName,
            'sumber' => $this->request->getVar('sumber'),
            'link' => $this->request->getVar('link'),
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/beritaAdmin');

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

    public function updateBerita($id_berita)
    {
        // Mengambil data yang akan diupdate dari request
        $dataToUpdate = [
            'judul' => $this->request->getVar('judul'),
            'tanggal' => $this->request->getVar('tanggal'),
            'type' => $this->request->getVar('type'),
            'kategoriBerita' => $this->request->getVar('kategoriBerita'),
            'isi' => $this->request->getVar('isi'),
            'foto' => $this->request->getVar('foto'),
            'ketgambar' => $this->request->getVar('ketgambar'),
            'jenisBerita' => $this->request->getVar('jenisBerita'),
            'sumber' => $this->request->getVar('sumber'),
            'link' => $this->request->getVar('link'),
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
                    'ketgambar' => $newDataBerita['ketgambar'],
                    'jenisBerita' => $newDataBerita['jenisBerita'],
                    'sumber' => $newDataBerita['sumber'],
                    'link' => $newDataBerita['link'],
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


        $data = [
            'title' => 'Daftar Kegiatan',
            'dataKegiatan' => $data_kegiatan
        ];

        return view('CompanyProfile/tambahKegiatan', $data);
    }

    public function saveKegiatan()
    {
        //validation
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi']
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal tidak boleh kosong',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/tambahKegiatan')->withInput()->with('errors', $this->validator->listErrors());
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
            'kategori_kegiatan' => $this->request->getVar('kategori_kegiatan'),
            'foto' => $fotoName,

        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/tambahKegiatan');

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

    public function updateKegiatan($id_kegiatan)
    {
        // Mengambil data yang akan diupdate dari request
        $dataToUpdate = [
            'judul' => $this->request->getVar('judul'),
            'tanggal' => $this->request->getVar('tanggal'),
            'tampilkan' => $this->request->getVar('tampilkan'),
            'keterangan' => $this->request->getVar('keterangan'),
            'kategori_kegiatan' => $this->request->getVar('kategori_kegiatan'),
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
                    'kategori_kegiatan' => $newDataKegiatan['kategori_kegiatan'],
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


        $data = [
            'title' => 'Daftar Kajian',
            'kajian' => $kajian
        ];


        return view('CompanyProfile/kajianAdmin', $data);
    }
    public function saveKajian()
    {
        //validation
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi']
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal tidak boleh kosong',


                ]
            ],
        ];

        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/kajianAdmin')->withInput()->with('errors', $this->validator->listErrors());
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

        return redirect()->to('/kajianAdmin');

        // return view('admin/v_masterpetugas');
    }
    public function tulisKajian($id_kajian): string
    {
        $data_kajian = $this->M_Isikajian->findAll();
        // $kajian = $this->M_Kajian->findAll();
        $kajian = $this->M_Kajian->getKajian($id_kajian);



        $data = [
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

    public function previewKajian($id_kajian): string
    {
        $kajian = $this->M_Kajian->getKajian($id_kajian);
        $kajianTerbaru = $this->M_Kajian->getKajianTerbaru(5);
        $IsiKajian = $this->M_Isikajian->getDataByIdKajian($id_kajian);

        // var_dump($berita);
        $data = [

            'kajian' => $kajian,
            'kajianTerbaru' => $kajianTerbaru,
            'isiKajian' => $IsiKajian,
        ];


        return view('CompanyProfile/previewKajian', $data);
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


        $data = [
            'title' => 'Daftar Kegiatan',
            'data_publikasi' => $data_publikasi
        ];

        return view('CompanyProfile/publikasiAdmin', $data);
    }

    public function savePublikasi()
    {
        //validation
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi']
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal tidak boleh kosong',
                ]
            ],
            'sinopsis' => [
                'rules' => 'max_length[1000]',
                'errors' => [
                    'max_length' => 'Sinopsis tidak boleh lebih dari 1000 karakter',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/tambahPublikasi')->withInput()->with('errors', $this->validator->listErrors());
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

        //tambah data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_Publikasi->save([
            // 'id_petugas' => $id_petugas,
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'sinopsis' => $this->request->getVar('sinopsis'),
            'tanggal' => $this->request->getVar('tanggal'),
            'link' => $this->request->getVar('link'),
            'foto' => $fotoName,
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/tambahPublikasi');
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

    public function updatePublikasi($id_publikasi)
    {
        $dataToUpdate = [
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'sinopsis' => $this->request->getVar('sinopsis'),
            'tanggal' => $this->request->getVar('tanggal'),
            'link' => $this->request->getVar('link'),
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

        // Membersihkan data yang mungkin ada dari inputan form (menghapus nilai kosong)
        $dataToUpdate = array_filter($dataToUpdate, function ($value) {
            return $value !== null && $value !== '';
        });

        // Memastikan ada data yang akan diupdate
        if (!empty($dataToUpdate)) {
            // Mengeksekusi perintah update
            $this->M_Publikasi->update($id_publikasi, $dataToUpdate);

            // Ambil data publikasi setelah diubah dari database
            $newDataPublikasi = $this->M_Publikasi->getPublikasi($id_publikasi);

            // Perbarui sesi pengguna dengan data baru (jika diperlukan)
            if (session()->get('level') != 'Admin') {
                session()->set([
                    'judul' => $newDataPublikasi['judul'],
                    'penulis' => $newDataPublikasi['penulis'],
                    'sinopsis' => $newDataPublikasi['sinopsis'],
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

    public function dataManuskrip(): string
    {
        $data_manuskrip = $this->M_Manuskrip->findAll();


        $data = [
            'title' => 'Daftar Kegiatan',
            'data_manuskrip' => $data_manuskrip
        ];

        return view('CompanyProfile/data_manuskrip', $data);
    }
    public function dataManuskripKol(): string
    {
        $data_manuskripKol = $this->M_ManuskripKol->findAll();


        $data = [
            'title' => 'Daftar Manuskrip',
            'data_manuskripKol' => $data_manuskripKol
        ];

        return view('CompanyProfile/data_manuskripKol', $data);
    }
    public function saveManuskrip()
    {
        //validation
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi']
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal tidak boleh kosong',


                ]
            ],
        ];

        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/dataManuskrip')->withInput()->with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');

        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/manuskrip', $fotoName);
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/dataManuskrip'))
                ->withInput()
                ->with('errors', $foto->getErrorString());
        }

        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_Manuskrip->save([
            // 'id_petugas' => $id_petugas,
            'judul' => $this->request->getVar('judul'),
            'tanggal' => $this->request->getVar('tanggal'),
            'link' => $this->request->getVar('link'),
            'foto' => $fotoName,

        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/dataManuskrip');

        // return view('admin/v_masterpetugas');
    }
    public function saveManuskripKol()
    {
        //validation
        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'nama harus diisi']
            ],
            'link' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'link tidak boleh kosong',


                ]
            ],
        ];

        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/dataManuskripKol')->withInput()->with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');

        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/manuskrip', $fotoName);
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/dataManuskripKol'))
                ->withInput()
                ->with('errors', $foto->getErrorString());
        }


        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_ManuskripKol->save([
            // 'id_petugas' => $id_petugas,
            'nama' => $this->request->getVar('nama'),
            'link' => $this->request->getVar('link'),
            'foto' => $fotoName,

        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/dataManuskripKol');

        // return view('admin/v_masterpetugas');
    }

    public function deleteManuskrip($id_manuskrip)
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id_manuskrip = filter_var($id_manuskrip, FILTER_SANITIZE_NUMBER_INT);

        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_Manuskrip->delete($id_manuskrip);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        // Redirect ke halaman yang sesuai
        return redirect()->to('/dataManuskrip');
    }
    public function deleteManuskripKol($id)
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_ManuskripKol->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        // Redirect ke halaman yang sesuai
        return redirect()->to('/dataManuskripKol');
    }

    public function updateManuskrip($id_manuskrip)
    {
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
            $foto->move('img/manuskrip', $fotoName); // Perbarui path sesuai dengan folder yang diinginkan

            // Tambahkan nama file foto ke data yang akan diupdate
            $dataToUpdate['foto'] = $fotoName;
        }

        // Membersihkan data yang mungkin ada dari inputan form
        $dataToUpdate = array_filter($dataToUpdate);

        // Memastikan ada data yang akan diupdate
        if (!empty($dataToUpdate)) {
            // Mengeksekusi perintah update
            $this->M_Manuskrip->update($id_manuskrip, $dataToUpdate);

            // Ambil data petugas setelah diubah dari database
            $newDataPublikasi = $this->M_Manuskrip->getManuskrip($id_manuskrip);

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
        return redirect()->to('/dataManuskrip');
    }

    public function updateManuskripKol($id)
    {
        // Mengambil data yang akan diupdate dari request
        $dataToUpdate = [
            'nama' => $this->request->getVar('nama'),
            'link' => $this->request->getVar('link'),
            'foto' => $this->request->getVar('foto'),

        ];

        $foto = $this->request->getFile('foto');

        // Cek apakah file foto diunggah
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Generate nama unik untuk file foto
            $fotoName = $foto->getRandomName();

            // Pindahkan file foto ke folder yang diinginkan
            $foto->move('img/manuskrip', $fotoName); // Perbarui path sesuai dengan folder yang diinginkan

            // Tambahkan nama file foto ke data yang akan diupdate
            $dataToUpdate['foto'] = $fotoName;
        }

        // Membersihkan data yang mungkin ada dari inputan form
        $dataToUpdate = array_filter($dataToUpdate);

        // Memastikan ada data yang akan diupdate
        if (!empty($dataToUpdate)) {
            // Mengeksekusi perintah update
            $this->M_ManuskripKol->update($id, $dataToUpdate);

            // Ambil data petugas setelah diubah dari database
            $newDataPublikasi = $this->M_ManuskripKol->getManuskrip($id);

            // Perbarui sesi pengguna dengan data baru

            session()->set([
                'nama' => $newDataPublikasi['nama'],
                'link' => $newDataPublikasi['link'],
                'foto' => $newDataPublikasi['foto'],
            ]);

            //alert
            session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        } else {
            // Jika tidak ada data yang diupdate, munculkan pesan kesalahan
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }
        // dd('berhasil');

        // Redirect ke halaman sebelumnya atau halaman yang sesuai
        return redirect()->to('/dataManuskripKol');
    }

    public function koleksiAdmin(): string
    {
        $koleksi = $this->M_KoleksiLandingPage->findAll();


        $data = [
            'title' => 'Daftar Koleksi',
            'koleksi' => $koleksi
        ];


        return view('CompanyProfile/koleksiAdmin', $data);
    }

    public function saveKoleksi()
    {
        //validation
        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nama harus diisi']
            ],
            'no' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nomor koleksi tidak boleh kosong']
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto utama harus diupload',
                    'max_size' => 'Ukuran foto maksimal 2MB',
                    'is_image' => 'File harus berupa gambar',
                    'mime_in' => 'Format file harus JPG, JPEG, atau PNG'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/koleksiAdmin')->withInput()->with('errors', $this->validator->listErrors());
        }

        // Upload foto utama
        $foto = $this->request->getFile('foto');

        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/koleksiAdmin', $fotoName);
        } else {
            return redirect()->to(base_url('/koleksiAdmin'))
                ->withInput()
                ->with('errors', $foto->getErrorString());
        }

        // Upload multiple gambar deskripsi
        $gambarDeskripsi = $this->request->getFileMultiple('gambar_deskripsi');
        $namaGambarArray = [];

        if ($gambarDeskripsi && count($gambarDeskripsi) > 0) {
            foreach ($gambarDeskripsi as $gambar) {
                // Cek apakah file valid dan bukan file kosong
                if ($gambar->isValid() && !$gambar->hasMoved()) {
                    // Validasi ukuran dan tipe file
                    if ($gambar->getSize() <= 2048000 && in_array($gambar->getMimeType(), ['image/jpg', 'image/jpeg', 'image/png'])) {
                        $namaGambar = $gambar->getRandomName();
                        $gambar->move('img/koleksiDeskripsi', $namaGambar);
                        $namaGambarArray[] = $namaGambar;
                    }
                }
            }
        }

        // Simpan data koleksi
        $this->M_KoleksiLandingPage->save([
            'nama' => $this->request->getVar('nama'),
            'no' => $this->request->getVar('no'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ukuran' => $this->request->getVar('ukuran'),
            'kategori' => $this->request->getVar('kategori'),
            'foto' => $fotoName,
            'gambar_deskripsi' => json_encode($namaGambarArray), // Simpan sebagai JSON
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/koleksiAdmin');
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


        $data = [
            'title' => 'Daftar gallery',
            'gallery' => $gallery
        ];


        return view('CompanyProfile/galleryAdmin', $data);
    }

    public function saveGallery()
    {
        //validation
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi']
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal tidak boleh kosong',


                ]
            ],
        ];

        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/galleryAdmin')->withInput()->with('errors', $this->validator->listErrors());
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

        return redirect()->to('/galleryAdmin');

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


        $data = [
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

    private function getExcerpt($text, $wordLimit)
    {
        $words = explode(' ', strip_tags($text));
        if (count($words) > $wordLimit) {
            $excerpt = implode(' ', array_slice($words, 0, $wordLimit)) . '...';
        } else {
            $excerpt = implode(' ', $words);
        }
        return $excerpt;
    }

    public function sega(): string
    {
        $data_sega = $this->M_Sega->findAll();
        foreach ($data_sega as &$sega) {
            $sega['deskripsi_pendek1'] = $this->getExcerpt($sega['deskripsi_indo'], 10);
            $sega['deskripsi_pendek2'] = $this->getExcerpt($sega['deskripsi_eng'], 10); // 30 adalah jumlah kata yang ingin ditampilkan
        }

        $data = [
            'title' => 'Daftar Sega',
            'sega' => $data_sega
        ];

        return view('CompanyProfile/segaAdmin', $data);
    }

    public function saveSega()
    {
        helper('slug'); // Load helper

        // Validation
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi']
            ],
            'deskripsi_indo' => [
                'rules' => 'required',
                'errors' => ['required' => 'Deskripsi Indonesia harus diisi']
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto harus diupload',
                    'max_size' => 'Ukuran foto maksimal 2MB',
                    'is_image' => 'File yang diupload harus berupa gambar',
                    'mime_in' => 'Format foto harus JPG, JPEG, atau PNG'
                ]
            ],
            'audio_id' => [
                'rules' => 'uploaded[audio_id]|max_size[audio_id,2048]|mime_in[audio_id,audio/mpeg,audio/mp3]',
                'errors' => [
                    'uploaded' => 'Audio Indonesia harus diupload',
                    'max_size' => 'Ukuran audio maksimal 2MB',
                    'mime_in' => 'Format audio harus MP3'
                ]
            ],
            'audio_eng' => [
                'rules' => 'permit_empty|max_size[audio_eng,2048]|mime_in[audio_eng,audio/mpeg,audio/mp3]',
                'errors' => [
                    'max_size' => 'Ukuran audio maksimal 2MB',
                    'mime_in' => 'Format audio harus MP3'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/sega')->withInput()->with('errors', $this->validator->listErrors());
        }

        // Handle foto
        $foto = $this->request->getFile('foto');
        $fotoName = $foto->getRandomName();
        $foto->move('img/sega', $fotoName);

        // Handle audio_id
        $file1 = $this->request->getFile('audio_id');
        $filename1 = $file1->getRandomName();
        $file1->move('audio', $filename1);

        // Handle audio_eng
        $file2 = $this->request->getFile('audio_eng');
        $filename2 = 'null';

        if ($file2 && $file2->isValid() && !$file2->hasMoved()) {
            $filename2 = $file2->getRandomName();
            $file2->move('audio', $filename2);
        }

        // ✅ Generate slug dari 3 kata pertama judul
        $judul = $this->request->getVar('judul');
        $slug = generateSlugFromTitle($judul, 3);
        $slug = ensureUniqueSlug($slug, $this->M_Sega);

        // Simpan data
        $this->M_Sega->save([
            'judul' => $judul,
            'slug' => $slug,
            'deskripsi_indo' => $this->request->getVar('deskripsi_indo'),
            'deskripsi_eng' => $this->request->getVar('deskripsi_eng'),
            'foto' => $fotoName,
            'audio_id' => $filename1,
            'audio_eng' => $filename2,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
        return redirect()->to('/sega');
    }

    public function previewSega($slug): string
    {
        $sega = $this->M_Sega->getSega($slug);

        if (!$sega) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'sega' => $sega,
        ];

        return view('CompanyProfile/previewSega', $data);
    }

    public function deleteSega($id_Sega)
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id_Sega = filter_var($id_Sega, FILTER_SANITIZE_NUMBER_INT);

        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_Sega->delete($id_Sega);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        // Redirect ke halaman yang sesuai
        return redirect()->to('/sega');
    }

    public function updateSega($id_sega)
    {
        helper('slug');

        $judul = $this->request->getVar('judul');
        $slug = $this->request->getVar('slug');

        // ✅ Validasi slug
        $rules = [
            'slug' => [
                'rules' => 'required|alpha_dash|max_length[255]',
                'errors' => [
                    'required' => 'Slug harus diisi',
                    'alpha_dash' => 'Slug hanya boleh berisi huruf, angka, dash (-) dan underscore (_)',
                    'max_length' => 'Slug maksimal 255 karakter'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/sega')->withInput()->with('errors', $this->validator->listErrors());
        }

        // Mengambil data yang akan diupdate
        $dataToUpdate = [
            'judul' => $judul,
            'deskripsi_indo' => $this->request->getVar('deskripsi_indo'),
            'deskripsi_eng' => $this->request->getVar('deskripsi_eng'),
        ];

        // ✅ Cek apakah slug berubah dan pastikan unik
        $currentData = $this->M_Sega->getSegaById($id_sega);

        if ($currentData['slug'] !== $slug) {
            // Format slug: lowercase, replace spaces with dash
            $slug = strtolower(trim($slug));
            $slug = preg_replace('/[^a-z0-9-_]/', '-', $slug);
            $slug = preg_replace('/-+/', '-', $slug); // Remove multiple dashes
            $slug = trim($slug, '-');

            // Cek apakah slug sudah digunakan data lain
            $existingSlug = $this->M_Sega->where('slug', $slug)
                ->where('id_sega !=', $id_sega)
                ->first();

            if ($existingSlug) {
                session()->setFlashdata('error', "Slug '{$slug}' sudah digunakan. Silakan gunakan slug lain.");
                return redirect()->to('/sega')->withInput();
            }

            $dataToUpdate['slug'] = $slug;
        }

        // Handle foto
        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/sega', $fotoName);
            $dataToUpdate['foto'] = $fotoName;

            // ✅ Hapus foto lama
            if (!empty($currentData['foto']) && file_exists('img/sega/' . $currentData['foto'])) {
                unlink('img/sega/' . $currentData['foto']);
            }
        }

        // Handle audio_id
        $file1 = $this->request->getFile('audio_id');
        if ($file1 && $file1->isValid() && !$file1->hasMoved()) {
            $filename1 = $file1->getRandomName();
            $file1->move('audio', $filename1);
            $dataToUpdate['audio_id'] = $filename1;

            // ✅ Hapus audio lama
            if (!empty($currentData['audio_id']) && $currentData['audio_id'] !== 'null' && file_exists('audio/' . $currentData['audio_id'])) {
                unlink('audio/' . $currentData['audio_id']);
            }
        }

        // Handle audio_eng
        $file2 = $this->request->getFile('audio_eng');
        if ($file2 && $file2->isValid() && !$file2->hasMoved()) {
            $filename2 = $file2->getRandomName();
            $file2->move('audio', $filename2);
            $dataToUpdate['audio_eng'] = $filename2;

            // ✅ Hapus audio lama
            if (!empty($currentData['audio_eng']) && $currentData['audio_eng'] !== 'null' && file_exists('audio/' . $currentData['audio_eng'])) {
                unlink('audio/' . $currentData['audio_eng']);
            }
        }

        $dataToUpdate = array_filter($dataToUpdate);

        if (!empty($dataToUpdate)) {
            $this->M_Sega->update($id_sega, $dataToUpdate);

            $newDataSega = $this->M_Sega->getSegaById($id_sega);

            if (session()->get('level') == 'Admin') {
                session()->set([
                    'judul' => $newDataSega['judul'],
                    'slug' => $newDataSega['slug'],
                    'deskripsi_indo' => $newDataSega['deskripsi_indo'],
                    'deskripsi_eng' => $newDataSega['deskripsi_eng'],
                    'foto' => $newDataSega['foto'],
                    'audio_id' => $newDataSega['audio_id'],
                    'audio_eng' => $newDataSega['audio_eng'],
                ]);
            }

            session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        } else {
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }

        return redirect()->to('/sega');
    }

    public function generateSlugsForExistingData()
    {
        // ✅ Hanya bisa diakses oleh admin
        if (session()->get('level') !== 'Admin') {
            return redirect()->to('/')->with('error', 'Unauthorized access');
        }

        helper('slug');

        // Ambil semua data yang belum punya slug atau slug masih NULL
        $allSega = $this->M_Sega->findAll();
        $updated = 0;
        $skipped = 0;

        foreach ($allSega as $sega) {
            // Skip jika sudah punya slug

            // Generate slug dari judul
            $slug = generateSlugFromTitle($sega['judul'], 3);
            $slug = ensureUniqueSlug($slug, $this->M_Sega, $sega['id_sega']);

            // Update ke database
            $this->M_Sega->update($sega['id_sega'], ['slug' => $slug]);
            $updated++;
        }

        session()->setFlashdata('pesan', "Slug berhasil digenerate! Updated: {$updated}, Skipped: {$skipped}");
        return redirect()->to('/sega');
    }

    public function aksesManuskrip(): string
    {
        $user = $this->M_User->findAll();


        $data = [
            'title' => 'Daftar User',
            'user' => $user
        ];

        return view('CompanyProfile/aksesManuskrip', $data);
    }
    public function acceptedUpdate()
    {
        // Pastikan metode yang digunakan adalah POST
        if ($this->request->getMethod() == 'post') {
            // Ambil data ID dan status dari permintaan POST
            $id_user = $this->request->getPost('id_user');
            $accepted = $this->request->getPost('accepted');

            // Lakukan pembaruan status di database menggunakan model
            $result = $this->M_User->UpdateHakAkses($id_user, $accepted);

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

    public function tambahPenelitian()
    {
        $data = [
            'title' => 'Daftar Penelitian',
            'penelitian' => $this->M_Penelitian->findAll()
        ];

        return view('CompanyProfile/penelitian', $data);
    }

    public function savePenelitian()
    {
        // validation
        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nama peneliti harus diisi']
            ],
            'no_identitas' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nomor identitas tidak boleh kosong']
            ],
            'judul_penelitian' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul penelitian harus diisi']
            ],
            'kategori_objek' => [
                'rules' => 'required',
                'errors' => ['required' => 'Kategori objek tidak boleh kosong']
            ],
            'jenjang_pendidikan' => [
                'rules' => 'required',
                'errors' => ['required' => 'Jenjang pendidikan harus diisi']
            ],
            'instansi' => [
                'rules' => 'required',
                'errors' => ['required' => 'Instansi tidak boleh kosong']
            ],
            'tanggal_mulai' => [
                'rules' => 'required',
                'errors' => ['required' => 'Tanggal mulai penelitian tidak boleh kosong']
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Gambar penelitian harus diupload',
                    'max_size' => 'Ukuran gambar maksimal 2MB',
                    'is_image' => 'File yang diupload harus berupa gambar',
                    'mime_in' => 'Format gambar harus JPG, JPEG, atau PNG'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/dataPenelitian')->withInput()->with('errors', $this->validator->listErrors());
        }

        // Handle file upload
        $gambar = $this->request->getFile('gambar');
        $namaGambar = null;

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $namaGambar = $gambar->getRandomName();
            // Path yang konsisten: uploads/penelitian/
            $gambar->move('uploads/penelitian/', $namaGambar);
        }

        $data = [
            'nama' => $this->request->getVar('nama'),
            'no_identitas' => $this->request->getVar('no_identitas'),
            'jenis' => $this->request->getVar('jenis'),
            'judul_penelitian' => $this->request->getVar('judul_penelitian'),
            'kategori_objek' => $this->request->getVar('kategori_objek'),
            'jenjang_pendidikan' => $this->request->getVar('jenjang_pendidikan'),
            'program_studi' => $this->request->getVar('program_studi') ?: null,
            'instansi' => $this->request->getVar('instansi'),
            'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
            'sumber' => $this->request->getVar('sumber'),
            'link' => $this->request->getVar('link') ?: null,
            'gambar' => $namaGambar
        ];

        if ($this->request->getVar('tanggal_akhir')) {
            $data['tanggal_akhir'] = $this->request->getVar('tanggal_akhir');
        }

        $this->M_Penelitian->save($data);

        session()->setFlashdata('pesan', 'Data Penelitian Berhasil Ditambahkan.');

        return redirect()->to('/dataPenelitian');
    }

    public function updatePenelitian($id_penelitian)
    {
        $penelitianLama = $this->M_Penelitian->find($id_penelitian);

        // Validation rules untuk update
        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nama peneliti harus diisi']
            ],
            'no_identitas' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nomor identitas tidak boleh kosong']
            ],
            'judul_penelitian' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul penelitian harus diisi']
            ],
            'link' => [
                'rules' => 'permit_empty|valid_url',
                'errors' => ['valid_url' => 'Format link tidak valid']
            ]
        ];

        // Validate jika ada file gambar yang diupload
        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $rules['gambar'] = [
                'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 2MB',
                    'is_image' => 'File yang diupload harus berupa gambar',
                    'mime_in' => 'Format gambar harus JPG, JPEG, atau PNG'
                ]
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->to('/dataPenelitian')->withInput()->with('errors', $this->validator->listErrors());
        }

        $dataToUpdate = [
            'nama' => $this->request->getVar('nama'),
            'no_identitas' => $this->request->getVar('no_identitas'),
            'jenis' => $this->request->getVar('jenis'),
            'judul_penelitian' => $this->request->getVar('judul_penelitian'),
            'kategori_objek' => $this->request->getVar('kategori_objek'),
            'jenjang_pendidikan' => $this->request->getVar('jenjang_pendidikan'),
            'program_studi' => $this->request->getVar('program_studi') ?: null,
            'instansi' => $this->request->getVar('instansi'),
            'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
            'sumber' => $this->request->getVar('sumber'),
            'link' => $this->request->getVar('link') ?: null
        ];

        if ($this->request->getVar('tanggal_akhir')) {
            $dataToUpdate['tanggal_akhir'] = $this->request->getVar('tanggal_akhir');
        }

        // Handle file upload jika ada file baru
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            // Hapus gambar lama jika ada (path yang konsisten)
            if ($penelitianLama['gambar'] && file_exists('uploads/penelitian/' . $penelitianLama['gambar'])) {
                unlink('uploads/penelitian/' . $penelitianLama['gambar']);
            }

            // Upload gambar baru
            $namaGambar = $gambar->getRandomName();
            $gambar->move('uploads/penelitian/', $namaGambar);
            $dataToUpdate['gambar'] = $namaGambar;
        }

        $dataToUpdate = array_filter($dataToUpdate, function ($var) {
            return $var !== null && $var !== '';
        });

        if (!empty($dataToUpdate)) {
            $this->M_Penelitian->update($id_penelitian, $dataToUpdate);
            session()->setFlashdata('pesan', 'Data Penelitian Berhasil diubah.');
        } else {
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }

        return redirect()->to('/dataPenelitian');
    }

    public function deletePenelitian($id_penelitian)
    {
        $id_penelitian = filter_var($id_penelitian, FILTER_SANITIZE_NUMBER_INT);

        // Get data penelitian untuk hapus gambar
        $penelitian = $this->M_Penelitian->find($id_penelitian);

        // Hapus gambar jika ada
        if ($penelitian && $penelitian['gambar'] && file_exists('img/penelitian/' . $penelitian['gambar'])) {
            unlink('img/penelitian/' . $penelitian['gambar']);
        }

        $this->M_Penelitian->where('id_penelitian', $id_penelitian)->delete();

        session()->setFlashdata('pesan', 'Data Penelitian Berhasil Dihapus.');

        return redirect()->to('/dataPenelitian');
    }

    public function pameran()
    {
        // Ambil data jenis yang sudah ada
        $existingJenis = $this->M_Pameran->distinct()
            ->select('jenis')
            ->where('jenis !=', '')
            ->where('jenis IS NOT NULL')
            ->findAll();

        // Convert array of objects ke array of values
        $jenisArray = array_column($existingJenis, 'jenis');

        $data = [
            'title' => 'Daftar Pameran',
            'pameran' => $this->M_Pameran->findAll(),
            'existingJenis' => $jenisArray  // TAMBAHKAN INI!
        ];

        return view('CompanyProfile/data_pameran', $data);
    }

    public function tambahPameran()
    {
        // Ambil data jenis yang sudah ada
        $existingJenis = $this->M_Pameran->distinct()
            ->select('jenis')
            ->where('jenis !=', '')
            ->where('jenis IS NOT NULL')
            ->findAll();

        // Convert array of objects ke array of values
        $jenisArray = array_column($existingJenis, 'jenis');

        $data = [
            'title' => 'Tambah Data Pameran',
            'existingJenis' => $jenisArray
        ];

        return view('CompanyProfile/tambahPameran', $data);
    }

    public function savePameran()
    {
        // Validasi dengan pesan error yang jelas
        $rules = [
            'judul' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Judul harus diisi',
                    'min_length' => 'Judul minimal 3 karakter',
                    'max_length' => 'Judul maksimal 255 karakter'
                ]
            ],
            'image' => [
                'rules' => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/gif]',
                'errors' => [
                    'uploaded' => 'Gambar pameran harus diupload',
                    'max_size' => 'Ukuran gambar maksimal 2MB',
                    'is_image' => 'File yang diupload harus berupa gambar',
                    'mime_in' => 'Format gambar harus JPG, JPEG, PNG, atau GIF'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/tambahPameran')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file upload
        $image = $this->request->getFile('image');
        $namaGambar = null;

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $namaGambar = $image->getRandomName();
            $image->move('img/pameran/', $namaGambar);
        }

        // Ambil data dengan getPost()
        $data = [
            'judul' => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan'),
            'kode_koleksi' => $this->request->getPost('kode_koleksi'),
            'asal_dibuat' => $this->request->getPost('asal_dibuat'),
            'asal_perolehan' => $this->request->getPost('asal_perolehan'),
            'periode' => $this->request->getPost('periode'),
            'pengadaan' => $this->request->getPost('pengadaan'),
            'description' => $this->request->getPost('description'),
            'highlight' => $this->request->getPost('highlight'),
            'image' => $namaGambar,
            'jenis' => $this->request->getPost('jenis')
        ];

        // Gunakan Query Builder langsung
        $db = \Config\Database::connect();
        $builder = $db->table('pameran');

        if ($builder->insert($data)) {
            session()->setFlashdata('pesan', 'Data Pameran Berhasil Ditambahkan.');
            return redirect()->to('/dataPameran');
        } else {
            session()->setFlashdata('error', 'Gagal menyimpan data.');
            return redirect()->to('/tambahPameran')->withInput();
        }
    }

    public function updatePameran($id_pameran)
    {
        $pameranLama = $this->M_Pameran->find($id_pameran);

        if (!$pameranLama) {
            session()->setFlashdata('error', 'Data pameran tidak ditemukan.');
            return redirect()->to('/dataPameran');
        }

        $dataToUpdate = [
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'kode_koleksi' => $this->request->getVar('kode_koleksi'),
            'asal_dibuat' => $this->request->getVar('asal_dibuat'),
            'asal_perolehan' => $this->request->getVar('asal_perolehan'),
            'periode' => $this->request->getVar('periode'),
            'pengadaan' => $this->request->getVar('pengadaan'),
            'description' => $this->request->getVar('description'),
            'highlight' => $this->request->getPost('highlight'),
        ];

        // Tambahkan jenis jika ada
        $jenis = $this->request->getVar('jenis');
        if ($jenis && $jenis !== '') {
            $dataToUpdate['jenis'] = trim($jenis);
        }

        // Handle file upload jika ada file baru
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            // Validate file
            $validation = \Config\Services::validation();
            $validation->setRules([
                'image' => 'max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/gif]'
            ]);

            if ($validation->withRequest($this->request)->run()) {
                // Hapus gambar lama jika ada
                if ($pameranLama['image'] && file_exists('img/pameran/' . $pameranLama['image'])) {
                    unlink('img/pameran/' . $pameranLama['image']);
                }

                // Upload gambar baru
                $namaGambar = $image->getRandomName();
                $image->move('img/pameran/', $namaGambar);
                $dataToUpdate['image'] = $namaGambar;
            } else {
                session()->setFlashdata('error', 'Error upload gambar: ' . $validation->listErrors());
                return redirect()->to('/dataPameran');
            }
        }

        // Filter data yang tidak kosong
        $dataToUpdate = array_filter($dataToUpdate, function ($var) {
            return $var !== null && $var !== '';
        });

        if (!empty($dataToUpdate)) {
            if ($this->M_Pameran->update($id_pameran, $dataToUpdate)) {
                session()->setFlashdata('pesan', 'Data Pameran Berhasil diubah.');
            } else {
                session()->setFlashdata('error', 'Gagal mengubah data pameran.');
            }
        } else {
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }

        return redirect()->to('/dataPameran');
    }

    public function deletePameran($id_pameran)
    {
        $id_pameran = filter_var($id_pameran, FILTER_SANITIZE_NUMBER_INT);

        // Get data pameran untuk hapus gambar
        $pameran = $this->M_Pameran->find($id_pameran);

        if (!$pameran) {
            session()->setFlashdata('error', 'Data pameran tidak ditemukan.');
            return redirect()->to('/dataPameran');
        }

        // Hapus gambar jika ada
        if ($pameran['image'] && file_exists('img/pameran/' . $pameran['image'])) {
            unlink('img/pameran/' . $pameran['image']);
        }

        if ($this->M_Pameran->delete($id_pameran)) {
            session()->setFlashdata('pesan', 'Data Pameran Berhasil Dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data pameran.');
        }

        return redirect()->to('/dataPameran');
    }
}
