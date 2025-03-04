<?php

namespace App\Controllers;

use App\Models\M_Petugas;
use App\Models\M_Berita;
use App\Models\M_Kegiatan;
use App\Models\M_Publikasi;
use App\Models\M_KoleksiLandingPage;
use App\Models\M_Gallery;
use App\Models\M_Kajian;
use App\Models\M_IsiKajian;
use App\Models\M_Pesan;
use App\Models\M_Pengunjung;
use App\Models\M_SemuaPetugas;
use App\Models\M_Perpustakaan;
use App\Models\M_ManuskripKol;
use App\Models\M_Manuskrip;
use App\Models\M_Sega;
use App\Models\M_User;
use App\Models\M_Penelitian;

class C_LandingPage extends BaseController
{
    protected $helpers = ['form'];
    protected $M_Petugas;
    protected $M_Berita;
    protected $M_Kegiatan;
    protected $M_Publikasi;
    protected $M_KoleksiLandingPage;
    protected $M_Gallery;
    protected $M_Kajian;
    protected $M_Isikajian;
    protected $M_Pesan;
    protected $M_Pengunjung;
    protected $M_SemuaPetugas;
    protected $M_Perpustakaan;
    protected $M_ManuskripKol;
    protected $M_Manuskrip;
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
        $this->M_Pengunjung = new M_Pengunjung();
        $this->M_SemuaPetugas = new M_SemuaPetugas();
        $this->M_Perpustakaan = new M_Perpustakaan();
        $this->M_ManuskripKol = new M_ManuskripKol();
        $this->M_Manuskrip = new M_Manuskrip();
        $this->M_Sega = new M_Sega();
        $this->M_User = new M_User();
        $this->M_Penelitian = new M_Penelitian();
    }

    // Start Landing Page Baru
    public function home()
    {

        $kegiatan = $this->M_Kegiatan->get();
        $beritaTerbaru = $this->M_Berita->getBeritaTerbaruHome(4);
        $galery = $this->M_Gallery->findAll();
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);
        $user = [
            'id_user' => session()->get('id_user'),
            'nama' => session()->get('nama')
        ];


        foreach ($beritaTerbaru as &$berita) {
            $berita['isi_pendek'] = $this->getExcerpt($berita['isi'], 20); // 30 adalah jumlah kata yang ingin ditampilkan
        }

        // var_dump($berita);
        $data = [
            // 'title' => 'Daftar Berita',

            'beritaterbaru' => $beritaTerbaru,
            'kegiatan' => $kegiatan,
            'gallery' => $galery,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            'user' => $user
        ];

        return view('landingPage/home', $data);
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

    public function sejarah2(): string
    {
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);

        $data = [
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            // 'user' => $user
        ];
        return view('landingPage/sejarah2', $data);
    }
    public function visiMisi2(): string
    {
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);
        $data = [
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            // 'user' => $user
        ];
        return view('landingPage/visiMisi2', $data);
    }
    public function struktur2(): string
    {
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);
        $data = [
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            // 'user' => $user
        ];
        return view('landingPage/struktur2', $data);
    }
    public function ruangPamer2(): string
    {
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);
        $data = [
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            // 'user' => $user
        ];
        return view('landingPage/ruangPamer2', $data);
    }
    public function tataTertib2(): string
    {
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);
        $data = [
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            // 'user' => $user
        ];
        return view('landingPage/tatatertib2', $data);
    }
    public function berita2(): string
    {
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);
        $kategoriBerita = $this->request->getPost('kategoriBerita') ?? 'Regional'; // Default ke 'Regional'
        $lihatSemua = $this->request->getGet('lihatSemua') ?? false;
        $limit = $lihatSemua ? null : 4; // Jika 'lihatSemua' aktif, tampilkan semua berita. Jika tidak, tampilkan 2 berita.

        if ($lihatSemua) {
            $data['berita'] = $this->M_Berita->getBeritaByKategoriAll($kategoriBerita);
        } else {
            $data['berita'] = $this->M_Berita->getBeritaByKategori($kategoriBerita, $limit);
        }

        $data['kategoriBerita'] = $kategoriBerita;
        $data_berita = $this->M_Berita->getBeritaBaru();
        foreach ($data_berita as &$berita) {
            $berita['isi_pendek'] = $this->getExcerpt($berita['isi'], 20); // 30 adalah jumlah kata yang ingin ditampilkan
        }

        $data = [
            'title' => 'Daftar Berita',
            'dataBerita' => $data_berita,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            'berita' => $data['berita'],
            'kategoriBerita' => $kategoriBerita,
            'lihatSemua' => $lihatSemua,
            // 'user' => $user
            // 'berita' => $berita
        ];

        return view('landingPage/berita2', $data);
    }
    public function lihatberita2($id_berita): string
    {
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);
        $kategoriBerita = $this->request->getPost('kategoriBerita') ?? 'Regional'; // Default ke 'Regional'
        $lihatSemua = $this->request->getGet('lihatSemua') ?? false;
        $limit = $lihatSemua ? null : 4; // Jika 'lihatSemua' aktif, tampilkan semua berita. Jika tidak, tampilkan 2 berita.

        if ($lihatSemua) {
            $data['berita2'] = $this->M_Berita->getBeritaByKategoriAll($kategoriBerita);
        } else {
            $data['berita2'] = $this->M_Berita->getBeritaByKategori($kategoriBerita, $limit);
        }


        $data_berita = $this->M_Berita->findAll();
        $berita = $this->M_Berita->getBerita($id_berita);
        $beritaTerbaru = $this->M_Berita->getBeritaTerbaru(10);

        $data['kategoriBerita'] = $kategoriBerita;

        // var_dump($berita);
        $data = [
            // 'title' => 'Daftar Berita',
            'dataBerita' => $data_berita,
            'berita' => $berita,
            'berita2' => $data['berita2'],
            'beritaterbaru' => $beritaTerbaru,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            'kategoriBerita' => $kategoriBerita,
            'lihatSemua' => $lihatSemua,
            // 'user' => $user
        ];

        return view('landingPage/lihatBerita2', $data);
    }
    public function beritaKategori2($jenisBerita): string
    {
        // $kajian = $this->M_Kajian->findAll();
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);
        $beritaTerbaru = $this->M_Kajian->getKajianTerbaru(5);
        $beritaKategori = $this->M_Berita->getDataByJenis($jenisBerita);
        // $data_berita = $this->M_Berita->getBeritaBaru();

        $kategoriBerita = $this->request->getPost('kategoriBerita') ?? 'Regional'; // Default ke 'Regional'
        $lihatSemua = $this->request->getGet('lihatSemua') ?? false;
        $limit = $lihatSemua ? null : 4;

        if ($lihatSemua) {
            $data['berita'] = $this->M_Berita->getBeritaByKategoriAll($kategoriBerita);
        } else {
            $data['berita'] = $this->M_Berita->getBeritaByKategori($kategoriBerita, $limit);
        }


        $data['kategoriBerita'] = $kategoriBerita;
        foreach ($beritaKategori as &$berita) {
            $berita['isi_pendek'] = $this->getExcerpt($berita['isi'], 20); // 30 adalah jumlah kata yang ingin ditampilkan
        }



        $data = [
            'title' => 'Daftar Kegiatan',
            // 'dataBerita' => $data_berita,
            'beritaTerbaru' => $beritaTerbaru,
            'dataBerita' => $beritaKategori,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            'berita' => $data['berita'],
            'kategoriBerita' => $kategoriBerita,
            'lihatSemua' => $lihatSemua,
            // 'user' => $user
        ];


        return view('landingPage/berita2', $data);
    }

    public function kegiatan2(): string
    {
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);
        $kegiatan = $this->M_Kegiatan->get();
        // $berita = $this->M_Berita->getBerita($id_berita);



        $data = [
            'title' => 'Daftar Kegiatan',
            'kegiatan' => $kegiatan,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            // 'user' => $user
            // 'berita' => $berita
        ];



        return view('landingPage/kegiatan2', $data);
    }

    public function kegiatanKategori2($kategori_kegiatan): string
    {
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);

        $kegiatanKategori = $this->M_Kegiatan->getDataByJenis($kategori_kegiatan);

        $data = [
            'title' => 'Daftar Kegiatan',
            'kegiatan' => $kegiatanKategori,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            // 'user' => $user

        ];


        return view('landingPage/kegiatan2', $data);
    }
    public function lihatKegiatan2($id_kegiatan)
    {
        // $data_berita = $this->M_Berita->findAll();
        $kegiatan = $this->M_Kegiatan->getKegiatan($id_kegiatan);
        $kegiatanTerbaru = $this->M_Kegiatan->getKegiatanTeratas(10);
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);

        // var_dump($berita);
        $data = [

            'kegiatan' => $kegiatan,
            'kegiatanTerbaru' => $kegiatanTerbaru,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            // 'user' => $user
        ];


        return view('landingPage/lihatKegiatan2', $data);
    }

    public function kajian2(): string
    {
        // $kajian = $this->M_Kajian->findAll();
        $kajian = $this->M_Kajian->getkajianBaru();
        $kajianTerbaru = $this->M_Kajian->getKajianTerbaru(5);
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);



        $data = [
            'title' => 'Daftar Kegiatan',
            'kajian' => $kajian,
            'kajianTerbaru' => $kajianTerbaru,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            // 'user' => $user
        ];


        return view('landingPage/kajian2', $data);
    }
    public function kajianKategori2($kategori): string
    {
        // $kajian = $this->M_Kajian->findAll();
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);
        $kajianTerbaru = $this->M_Kajian->getKajianTerbaru(5);
        $kajianKategori = $this->M_Kajian->getDataByKategori($kategori);


        $data = [
            'title' => 'Daftar Kegiatan',
            // 'kajian' => $kajian,
            'kajianTerbaru' => $kajianTerbaru,
            'kajian' => $kajianKategori,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            // 'user' => $user
        ];


        return view('landingPage/kajian2', $data);
    }

    public function tulisan2($id_kajian): string
    {
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);
        $kajian = $this->M_Kajian->getKajian($id_kajian);
        $kajianTerbaru = $this->M_Kajian->getKajianTerbaru(5);
        $IsiKajian = $this->M_Isikajian->getDataByIdKajian($id_kajian);

        // var_dump($berita);
        $data = [

            'kajian' => $kajian,
            'kajianTerbaru' => $kajianTerbaru,
            'isiKajian' => $IsiKajian,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            // 'user' => $user
        ];


        return view('landingPage/tulisan2', $data);
    }

    public function tambahBerita2(): string
    {

        return view('landingPage/tambahBerita2');
    }

    public function koleksi_page2(): string
    {
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);
        $koleksi = $this->M_KoleksiLandingPage->findAll();

        $data = [
            'title' => 'Daftar Koleksi',
            'koleksi' => $koleksi,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            // 'user' => $user
            // 'berita' => $berita
        ];


        return view('landingPage/koleksi_page2', $data);
    }

    public function koleksi_kategori($kategori_koleksi): string
    {

        $koleksi = $this->M_KoleksiLandingPage->getDataByJenis($kategori_koleksi);
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);

        $data = [
            'title' => 'Daftar Kegiatan',
            'koleksi' => $koleksi,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            // 'user' => $user

        ];


        return view('landingPage/koleksi_page2', $data);
    }

    public function koleksi_detail2($id_koleksi)
    {

        $koleksi = $this->M_KoleksiLandingPage->getKOleksiById($id_koleksi);
        // $kegiatanTerbaru = $this->M_Kegiatan->getKegiatanTeratas(10);
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);


        $data = [

            'koleksi' => $koleksi,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            // 'user' => $user
        ];


        return view('landingPage/koleksi_detail2', $data);
    }

    public function publikasi2(): string
    {

        $publikasi = $this->M_Publikasi->findAll();
        $session = session();
        $id_user = $session->get('id_user');
        $user = $this->M_User->getUser($id_user);

        $data = [
            'title' => 'Daftar Publikasi',
            'publikasi' => $publikasi,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            'user' => $user
            // 'berita' => $berita
        ];


        return view('landingPage/publikasi2', $data);
    }
    public function manuskripKol(): string
    {

        $manuskrip = $this->M_ManuskripKol->findAll();

        $data = [
            'title' => 'Terjemahan Manuskrip',
            'manuskrip' => $manuskrip,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            // 'berita' => $berita

        ];


        return view('landingPage/manuskrip_koleksi', $data);
    }

    public function manuskrip(): string
    {

        $manuskrip = $this->M_Manuskrip->findAll();
        $manuskripTerbaru = $this->M_Manuskrip->getManuskripTerbaru(6);
        $manuskripKol = $this->M_ManuskripKol->findAll();
        $manuskripKolTerbaru = $this->M_ManuskripKol->getManuskripKolTerbaru(6);
        $user = [
            'id_user' => session()->get('id_user'),
            'nama' => session()->get('nama')
        ];

        $data = [
            'title' => 'Terjemahan Manuskrip',
            'manuskrip' => $manuskrip,
            'manuskripTerbaru' => $manuskripTerbaru,
            'manuskripKol' => $manuskripKol,
            'manuskripKolTerbaru' => $manuskripKolTerbaru,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            'user' => $user
            // 'berita' => $berita

        ];


        return view('landingPage/manuskrip', $data);
    }
    public function manuskripLogin(): string
    {

        $manuskrip = $this->M_Manuskrip->findAll();
        $session = session();
        $id_user = $session->get('id_user');
        $user = $this->M_User->getUser($id_user);

        // $manuskrip = $this->M_Manuskrip->getManuskrip($id_manuskrip);

        // if ($manuskrip) {
        //     $this->M_Manuskrip->update($id_manuskrip, [
        //         'views' => $manuskrip['views'] + 1
        //     ]);
        // }

        $data = [
            'title' => 'Terjemahan Manuskrip',
            'manuskrip' => $manuskrip,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            'user' => $user

        ];


        return view('landingPage/manuskripLogin', $data);
    }
    public function views($id_manuskrip)
    {

        // $manuskrip = $this->M_Manuskrip->findAll();
        $session = session();
        $id_user = $session->get('id_user');
        $user = $this->M_User->getUser($id_user);

        $manuskrip = $this->M_Manuskrip->getManuskrip($id_manuskrip);

        if ($manuskrip) {
            $this->M_Manuskrip->update($id_manuskrip, [
                'views' => $manuskrip['views'] + 1
            ]);
            return redirect()->to($manuskrip['link']);
        }
        return redirect()->back();


        // $data =[
        //     'title' => 'Terjemahan Manuskrip',
        //     'manuskrip' => $manuskrip,
        //     'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
        //     'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
        //     'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
        //     'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
        //     'user' => $user

        // ];


        // return view('landingPage/manuskripLogin', $data);
    }
    public function views2($id)
    {

        // $manuskrip = $this->M_Manuskrip->findAll();
        $session = session();
        $id_user = $session->get('id_user');
        $user = $this->M_User->getUser($id_user);

        $manuskrip = $this->M_ManuskripKol->getManuskrip($id);

        if ($manuskrip) {
            $this->M_ManuskripKol->update($id, [
                'views' => $manuskrip['views'] + 1
            ]);
            return redirect()->to($manuskrip['link']);
        } else {
            // Jika manuskrip tidak ditemukan
            return redirect()->back();
        }
        // return redirect()->back();


        // $data =[
        //     'title' => 'Terjemahan Manuskrip',
        //     'manuskrip' => $manuskrip,
        //     'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
        //     'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
        //     'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
        //     'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
        //     'user' => $user

        // ];


        // return view('landingPage/manuskripLogin', $data);
    }



    public function perpustakaan2(): string
    {
        $data_buku = $this->M_Perpustakaan->findAll();
        $buku_rekomendasi = $this->M_Perpustakaan->getBukuRekomendasi('Tampilkan Sebagai Buku Rekomendasi');
        $buku_favorit = $this->M_Perpustakaan->getBukuRekomendasi('Tampilkan Sebagai Buku Favorit');

        $data = [
            'data_buku' => $data_buku,
            'buku_rekomendasi' => $buku_rekomendasi,
            'buku_favorit' => $buku_favorit,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
        ];

        return view('landingPage/perpustakaan_page2', $data);
    }
    public function detailBuku($id_buku): string
    {
        $data_buku = $this->M_Perpustakaan->getBuku($id_buku);

        $data = [
            'data_buku' => $data_buku,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
        ];

        return view('landingPage/detailBuku', $data);
    }
    public function kontak(): string
    {
        $data = [
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
        ];


        return view('landingPage/kontak', $data);
    }
    public function pesanUser()
    {
        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi']
            ],
            'pesan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal tidak boleh kosong',


                ]
            ],
        ];

        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/kontak')->withInput()->with('errors', $this->validator->listErrors());
        }


        $this->M_Pesan->save([
            // 'id_petugas' => $id_petugas,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'pesan' => $this->request->getVar('pesan'),


        ]);

        //alert
        session()->setFlashdata('pesan', 'Pesan Anda Berhasil Dikirim.');

        return redirect()->to('/kontak');

        // return view('landingPage/kontak');
    }

    public function semuaPetugas(): string
    {
        $data = [
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            'dataPetugas' => $this->M_SemuaPetugas->get(),
        ];


        return view('landingPage/semuaPetugas', $data);
    }

    public function sekardiyu(): string
    {
        $data = [
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),

        ];


        return view('landingPage/sekardiyu', $data);
    }

    public function rencanaStrategis(): string
    {
        $data = [
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),

        ];


        return view('landingPage/rencanaStrategis', $data);
    }

    public function etiket(): string
    {
        $data = [
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),

        ];


        return view('landingPage/etiket', $data);
    }

    public function daftarSega(): string
    {
        $sega = $this->M_Sega->findAll();

        // var_dump($berita);
        $data = [

            'sega' => $sega,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
        ];


        return view('landingPage/audioGuide', $data);
    }

    public function audioGuide($id_sega): string
    {
        $sega = $this->M_Sega->getSega($id_sega);

        $data = [

            'sega' => $sega,

            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
        ];


        return view('landingPage/file', $data);
    }

    public function penelitian()
    {
        $penelitianModel = new \App\Models\M_Penelitian();

        // Get filter parameters
        $kategori_objek = $this->request->getGet('kategori_objek');
        $instansi = $this->request->getGet('instansi');
        $tahun = $this->request->getGet('tahun');
        $search = $this->request->getGet('q');

        // Store original query before pagination
        $baseQuery = clone $penelitianModel;

        // Apply filters to the model
        if (!empty($kategori_objek)) {
            $penelitianModel->where('kategori_objek', $kategori_objek);
            $baseQuery->where('kategori_objek', $kategori_objek);
        }

        if (!empty($instansi)) {
            $penelitianModel->where('instansi', $instansi);
            $baseQuery->where('instansi', $instansi);
        }

        if (!empty($tahun)) {
            $penelitianModel->where("EXTRACT(YEAR FROM tanggal_mulai) = '$tahun'");
            $baseQuery->where("EXTRACT(YEAR FROM tanggal_mulai) = '$tahun'");
        }

        if (!empty($search)) {
            $penelitianModel->groupStart()
                ->like('judul_penelitian', $search)
                ->orLike('nama', $search)
                ->orLike('instansi', $search)
                ->orLike('kategori_objek', $search)
                ->orLike('program_studi', $search)
                ->groupEnd();

            $baseQuery->groupStart()
                ->like('judul_penelitian', $search)
                ->orLike('nama', $search)
                ->orLike('instansi', $search)
                ->orLike('kategori_objek', $search)
                ->orLike('program_studi', $search)
                ->groupEnd();
        }

        // Sort by date from oldest to newest
        $penelitianModel->orderBy('tanggal_mulai', 'ASC');

        // Get database connection
        $db = \Config\Database::connect();

        // Get list of all categories with count
        $kategori_list = $db->query("
        SELECT kategori_objek, COUNT(*) as jumlah 
        FROM penelitian 
        GROUP BY kategori_objek 
        ORDER BY jumlah DESC, kategori_objek ASC
    ")->getResultArray();

        // Get list of all institutions with count
        $instansi_list = $db->query("
        SELECT instansi, COUNT(*) as jumlah 
        FROM penelitian 
        GROUP BY instansi 
        ORDER BY jumlah DESC, instansi ASC
    ")->getResultArray();

        // Get list of all years with count
        $tahun_list = $db->query("
        SELECT EXTRACT(YEAR FROM tanggal_mulai) as tahun, COUNT(*) as jumlah 
        FROM penelitian 
        GROUP BY EXTRACT(YEAR FROM tanggal_mulai) 
        ORDER BY tahun DESC
    ")->getResultArray();

        // Get the latest research without filters - keep this as DESC to show the latest
        $latestModel = new \App\Models\M_Penelitian();
        $latest_penelitian = $latestModel->orderBy('tanggal_mulai', 'DESC')
            ->limit(5)
            ->find();

        // Prepare data for view
        $data = [
            'title' => 'Penelitian',
            'penelitian' => $penelitianModel->paginate(5, 'default'),
            'pager' => $penelitianModel->pager,

            // Add filter data
            'kategori_list' => $kategori_list,
            'instansi_list' => $instansi_list,
            'tahun_list' => $tahun_list,
            'latest_penelitian' => $latest_penelitian,

            // Add current filters to help with UI highlighting
            'current_filters' => [
                'kategori_objek' => $kategori_objek,
                'instansi' => $instansi,
                'tahun' => $tahun,
                'search' => $search
            ],

            // Keep your visitor counter data
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
        ];

        return view('landingPage/penelitian', $data);
    }
}
