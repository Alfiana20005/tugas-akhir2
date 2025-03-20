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
        $dataBerita = $this->M_Berita->findAll();

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

        return redirect()->to('/tambahPublikasi');

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

    public function updatePublikasi($id_publikasi)
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
                'errors' => ['required' => 'Judul harus diisi']
            ],
            'no' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal tidak boleh kosong',


                ]
            ],
        ];

        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/koleksiAdmin')->withInput()->with('errors', $this->validator->listErrors());
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

        return redirect()->to('/koleksiAdmin');

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
        //validation
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi']
            ],

        ];

        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/sega')->withInput()->with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');

        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/sega', $fotoName);
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/sega'))
                ->withInput()
                ->with('errors', $foto->getErrorString());
        }

        $file1 = $this->request->getFile('audio1');


        if ($file1->isValid() && !$file1->hasMoved()) {
            $filename1 = $file1->getRandomName();
            $file1->move('audio', $filename1);
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/sega'))
                ->withInput()
                ->with('errors', $file1->getErrorString());
        }

        $file2 = $this->request->getFile('audio2');
        // $filename2 = 'null';
        if ($file2->isValid() && !$file2->hasMoved()) {
            $filename2 = $file2->getRandomName();
            $file2->move('audio', $filename2);
        } else {
            // Handle file upload error
            $filename2 = 'null';
        }

        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_Sega->save([
            // 'id_petugas' => $id_petugas,
            'judul' => $this->request->getVar('judul'),
            'deskripsi_indo' => $this->request->getVar('deskripsi_indo'),
            'deskripsi_eng' => $this->request->getVar('deskripsi_eng'),
            'foto' => $fotoName,
            'audio1' => $filename1,
            'audio2' => $filename2,

        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/sega');

        // return view('admin/v_masterpetugas');
    }
    public function previewSega($id_sega): string
    {
        $sega = $this->M_Sega->getSega($id_sega);

        // var_dump($berita);
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
        // Mengambil data yang akan diupdate dari request
        $dataToUpdate = [
            'judul' => $this->request->getVar('judul'),
            'deskripsi_indo' => $this->request->getVar('deskripsi_indo'),
            'deskripsi_eng' => $this->request->getVar('deskripsi_eng'),
            'foto' => $this->request->getVar('foto'),
            'audio1' => $this->request->getVar('audio1'),
            'audio2' => $this->request->getVar('audio2'),

        ];

        $foto = $this->request->getFile('foto');

        // Cek apakah file foto diunggah
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Generate nama unik untuk file foto
            $fotoName = $foto->getRandomName();

            // Pindahkan file foto ke folder yang diinginkan
            $foto->move('img/sega', $fotoName); // Perbarui path sesuai dengan folder yang diinginkan

            // Tambahkan nama file foto ke data yang akan diupdate
            $dataToUpdate['foto'] = $fotoName;
        }

        $file1 = $this->request->getFile('audio1');
        if ($file1->isValid() && !$file1->hasMoved()) {
            $filename1 = $file1->getRandomName();
            $file1->move('audio', $filename1);
            $dataToUpdate['audio1'] = $fotoName;
        } else {
            // Handle file upload error
            return redirect()->to(base_url('/sega'))
                ->withInput()
                ->with('errors', $file1->getErrorString());
        }

        $file2 = $this->request->getFile('audio2');
        // $filename2 = 'null';
        if ($file2->isValid() && !$file2->hasMoved()) {
            $filename2 = $file2->getRandomName();
            $file2->move('audio', $filename2);
            $dataToUpdate['audio2'] = $fotoName;
        } else {
            // Handle file upload error
            $filename2 = 'null';
        }

        // Membersihkan data yang mungkin ada dari inputan form
        $dataToUpdate = array_filter($dataToUpdate);

        // Memastikan ada data yang akan diupdate
        if (!empty($dataToUpdate)) {
            // Mengeksekusi perintah update
            $this->M_Sega->update($id_sega, $dataToUpdate);

            // Ambil data petugas setelah diubah dari database
            $newDataGallery = $this->M_Sega->getGallery($id_sega);

            // Perbarui sesi pengguna dengan data baru
            if (session()->get('level') == 'Admin') {
                session()->set([
                    'judul' => $newDataGallery['judul'],
                    'deskripsi_indo' => $newDataGallery['deskripsi_indo'],
                    'deskripsi_eng' => $newDataGallery['deskripsi_eng'],
                    'foto' => $newDataGallery['foto'],
                    'audio1' => $newDataGallery['audio1'],
                    'audio2' => $newDataGallery['audio2'],
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
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/penelitian')->withInput()->with('errors', $this->validator->listErrors());
        }

        $data = [
            'nama' => $this->request->getVar('nama'),
            'no_identitas' => $this->request->getVar('no_identitas'),
            'judul_penelitian' => $this->request->getVar('judul_penelitian'),
            'kategori_objek' => $this->request->getVar('kategori_objek'),
            'jenjang_pendidikan' => $this->request->getVar('jenjang_pendidikan'),
            'program_studi' => $this->request->getVar('program_studi') ?: null, // Bisa null
            'instansi' => $this->request->getVar('instansi'),
            'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
        ];

        if ($this->request->getVar('tanggal_akhir')) {
            $data['tanggal_akhir'] = $this->request->getVar('tanggal_akhir');
        }

        $this->M_Penelitian->save($data);

        session()->setFlashdata('pesan', 'Data Penelitian Berhasil Ditambahkan.');

        return redirect()->to('/dataPenelitian');
    }

    public function deletePenelitian($id_penelitian)
    {
        $id_penelitian = filter_var($id_penelitian, FILTER_SANITIZE_NUMBER_INT);

        $this->M_Penelitian->where('id_penelitian', $id_penelitian)->delete();

        session()->setFlashdata('pesan', 'Data Penelitian Berhasil Dihapus.');

        return redirect()->to('/dataPenelitian');
    }

    public function updatePenelitian($id_penelitian)
    {
        $dataToUpdate = [
            'nama' => $this->request->getVar('nama'),
            'no_identitas' => $this->request->getVar('no_identitas'),
            'judul_penelitian' => $this->request->getVar('judul_penelitian'),
            'kategori_objek' => $this->request->getVar('kategori_objek'),
            'jenjang_pendidikan' => $this->request->getVar('jenjang_pendidikan'),
            'program_studi' => $this->request->getVar('program_studi') ?: null, // Bisa null
            'instansi' => $this->request->getVar('instansi'),
            'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
        ];

        if ($this->request->getVar('tanggal_akhir')) {
            $dataToUpdate['tanggal_akhir'] = $this->request->getVar('tanggal_akhir');
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
}
