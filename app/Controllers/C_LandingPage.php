<?php

namespace App\Controllers;

use App\Models\M_Sega;
use App\Models\M_User;
use App\Models\M_Pesan;
use App\Models\M_Berita;
use App\Models\M_Kajian;
use App\Models\M_Gallery;
use App\Models\M_Petugas;
use App\Models\M_Kegiatan;
use App\Models\M_IsiKajian;
use App\Models\M_Manuskrip;
use App\Models\M_Publikasi;
use App\Models\M_Penelitian;
use App\Models\M_Pengunjung;
use App\Models\M_ManuskripKol;
use App\Models\M_Perpustakaan;
use App\Models\M_SemuaPetugas;
use App\Models\M_KoleksiLandingPage;

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
        // Mengambil data koleksi menggunakan model M_KoleksiLandingPage
        try {
            $koleksi = $this->M_KoleksiLandingPage->orderBy('id_koleksi', 'DESC')->findAll(4);
        } catch (Exception $e) {
            $koleksi = []; // Jika terjadi error, buat array kosong
        }

        $user = [
            'id_user' => session()->get('id_user'),
            'nama' => session()->get('nama')
        ];

        foreach ($beritaTerbaru as &$berita) {
            $berita['isi_pendek'] = $this->getExcerpt($berita['isi'], 20);
        }

        // Tambahkan excerpt untuk deskripsi koleksi jika terlalu panjang
        foreach ($koleksi as &$k) {
            if (strlen($k['deskripsi']) > 200) {
                $k['deskripsi'] = $this->getExcerpt($k['deskripsi'], 30);
            }
        }

        $data = [
            'beritaterbaru' => $beritaTerbaru,
            'kegiatan' => $kegiatan,
            'gallery' => $galery,
            'koleksi' => $koleksi,
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

    public function sejarah(): string
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
    public function visiMisi(): string
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
    public function struktur(): string
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
    public function ruangPamer(): string
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
    public function tataTertib(): string
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
    public function berita(): string
    {
        $kategoriBerita = $this->request->getPost('kategoriBerita') ?? 'Regional';
        $lihatSemua = $this->request->getGet('lihatSemua') ?? false;
        $limit = $lihatSemua ? null : 4;

        if ($lihatSemua) {
            $data['berita'] = $this->M_Berita->getBeritaByKategoriAll($kategoriBerita);
        } else {
            $data['berita'] = $this->M_Berita->getBeritaByKategori($kategoriBerita, $limit);
        }

        $data['kategoriBerita'] = $kategoriBerita;
        $data_berita = $this->M_Berita->getBeritaBaru();

        foreach ($data_berita as &$berita) {
            $berita['isi_pendek'] = $this->getExcerpt($berita['isi'], 20);
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
        ];

        return view('landingPage/berita2', $data);
    }

    // Method baru untuk handle slug
    public function lihatberita($slug): string
    {
        $kategoriBerita = $this->request->getPost('kategoriBerita') ?? 'Regional';
        $lihatSemua = $this->request->getGet('lihatSemua') ?? false;
        $limit = $lihatSemua ? null : 4;

        if ($lihatSemua) {
            $data['berita2'] = $this->M_Berita->getBeritaByKategoriAll($kategoriBerita);
        } else {
            $data['berita2'] = $this->M_Berita->getBeritaByKategori($kategoriBerita, $limit);
        }

        $data_berita = $this->M_Berita->findAll();

        // Ganti getBerita dengan getBeritaBySlug
        $berita = $this->M_Berita->getBeritaBySlug($slug);

        // Handle jika berita tidak ditemukan
        if (!$berita) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Berita tidak ditemukan');
        }

        $beritaTerbaru = $this->M_Berita->getBeritaTerbaru(10);
        $data['kategoriBerita'] = $kategoriBerita;

        // Siapkan informasi sumber berita
        $source_info = !empty($berita['sumber']) ? $berita['sumber'] : 'Museum Negeri NTB';

        // Buat deskripsi untuk meta dan OG tags
        $description = 'Berita dari ' . $source_info .  '. Dipublikasikan pada ' . date('d F Y', strtotime($berita['tanggal'])) . ' - Museum Negeri NTB.';

        // Pastikan deskripsi tidak lebih dari 160 karakter untuk optimal SEO
        if (strlen($description) > 160) {
            $description = substr($description, 0, 157) . '...';
        }

        // Pastikan URL gambar absolut dan dapat diakses
        $image_url = base_url('img/berita/' . $berita['foto']);

        // URL canonical
        $canonical_url = base_url('lihatberita/' . $slug);

        $data = [
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

            // SEO Meta Tags
            'title' => $berita['judul'] . ' - Museum Negeri NTB',
            'page_title' => $berita['judul'] . ' - Museum Negeri NTB',
            'meta_description' => $description,
            'meta_keywords' => 'museum NTB, berita, ' . strtolower($berita['judul']) . ', ' . strtolower($source_info) . ', budaya, sejarah',
            'canonical_url' => $canonical_url,

            // Open Graph tags untuk social media preview
            'og_title' => $berita['judul'],
            'og_description' => $description,
            'og_image' => $image_url,
            'og_url' => $canonical_url,
            'og_type' => 'article',
            'og_site_name' => 'Museum Negeri NTB',

            // Twitter Card
            'twitter_card' => 'summary_large_image',
            'twitter_title' => $berita['judul'],
            'twitter_description' => $description,
            'twitter_image' => $image_url,

            // Article specific meta (untuk Facebook dan platform lain)
            'article_author' => $source_info,
            'article_published_time' => date('c', strtotime($berita['tanggal'])), // ISO 8601 format
            'article_section' => 'Berita',
        ];

        return view('landingPage/lihatBerita2', $data);
    }

    // Method untuk generate slug untuk data existing (jalankan sekali saja)
    // Method untuk generate slug untuk data existing (one-time execution)
    public function generateSlugsForExisting()
    {
        $allBerita = $this->M_Berita->findAll();
        $updated = 0;

        foreach ($allBerita as $berita) {
            if (empty($berita['slug'])) {
                // Panggil method dari Model, bukan SlugHelper
                $slug = $this->M_Berita->generateSlugFromTitle($berita['judul'], $berita['id_berita']);

                $this->M_Berita->update($berita['id_berita'], ['slug' => $slug]);
                $updated++;
            }
        }

        return "Berhasil generate slug untuk {$updated} berita!";
    }

    // Method untuk handle backward compatibility (redirect dari ID lama ke slug)
    public function redirectToSlug($id_berita)
    {
        $berita = $this->M_Berita->getBerita($id_berita);

        if (!$berita || empty($berita['slug'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Berita tidak ditemukan');
        }
    }

    public function beritaKategori($jenisBerita): string
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
            'title' => 'Daftar Berita',
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

    public function kegiatan(): string
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

    public function kegiatanKategori($kategori_kegiatan): string
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
    public function lihatKegiatan($id_kegiatan)
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

    public function kajian(): string
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
    public function kajianKategori($kategori): string
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

    public function tulisan($id_kajian): string
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

    public function koleksi_page(): string
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

    public function koleksi_detail($id_koleksi)
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

    // Add this new method to your Controller
    public function publikasi(): string
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
        ];

        return view('landingPage/publikasi2', $data);
    }

    // Add this new method for publication detail
    public function publikasi2_detail($id_publikasi): string
    {
        $publikasi = $this->M_Publikasi->getPublikasi($id_publikasi);

        if (!$publikasi) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Publikasi tidak ditemukan');
        }

        $session = session();
        $id_user = $session->get('id_user');
        $user = $this->M_User->getUser($id_user);

        // Siapkan informasi penulis
        $author_info = !empty($publikasi['penulis']) ? $publikasi['penulis'] : 'Museum Negeri NTB';

        // Bersihkan dan potong deskripsi jika terlalu panjang
        $description = 'Publikasi oleh ' . $author_info . ': ' . $publikasi['judul'] . '. Dipublikasikan pada ' . date('d F Y', strtotime($publikasi['tanggal'])) . ' - Museum Negeri NTB.';

        // Pastikan deskripsi tidak lebih dari 160 karakter untuk optimal SEO
        if (strlen($description) > 160) {
            $description = substr($description, 0, 157) . '...';
        }

        // Pastikan URL gambar absolut dan dapat diakses
        $image_url = base_url('img/publikasi/' . $publikasi['foto']);

        // URL canonical
        $canonical_url = base_url('publikasi2_detail/' . $id_publikasi);

        $data = [
            'title' => $publikasi['judul'] . ' - Museum Negeri NTB',
            'publikasi' => $publikasi,
            'page_title' => $publikasi['judul'] . ' - Museum Negeri NTB',
            'meta_description' => $description,
            'meta_keywords' => 'museum NTB, publikasi, ' . strtolower($publikasi['judul']) . ', ' . strtolower($author_info) . ', budaya, sejarah',
            'canonical_url' => $canonical_url,

            // Open Graph tags untuk social media preview
            'og_title' => $publikasi['judul'],
            'og_description' => $description,
            'og_image' => $image_url,
            'og_url' => $canonical_url,
            'og_type' => 'article',
            'og_site_name' => 'Museum Negeri NTB',

            // Twitter Card
            'twitter_card' => 'summary_large_image',
            'twitter_title' => $publikasi['judul'],
            'twitter_description' => $description,
            'twitter_image' => $image_url,

            // Article specific meta (untuk Facebook dan platform lain)
            'article_author' => $author_info,
            'article_published_time' => date('c', strtotime($publikasi['tanggal'])), // ISO 8601 format
            'article_section' => 'Publikasi',

            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            'user' => $user
        ];

        return view('landingPage/detailPublikasi', $data);
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



    public function perpustakaan(): string
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
        $jenis = $this->request->getGet('jenis');
        $search = $this->request->getGet('q');

        // Store original query before pagination for general research (excluding museum)
        $baseQuery = clone $penelitianModel;
        $baseQuery->where('jenis !=', 'museum');

        // Apply filters to the main model for general research
        $penelitianModel->where('jenis !=', 'museum'); // Exclude museum research from general list

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

        if (!empty($jenis) && $jenis != 'museum') {
            $penelitianModel->where('jenis', $jenis);
            $baseQuery->where('jenis', $jenis);
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

        // Sort by date from oldest to newest for general research
        $penelitianModel->orderBy('tanggal_mulai', 'ASC');

        // Get museum research separately (always show at top)
        $museumModel = new \App\Models\M_Penelitian();
        $penelitian_museum = $museumModel->where('jenis', 'museum')
            ->orderBy('tanggal_mulai', 'DESC')
            ->findAll();

        // Get database connection
        $db = \Config\Database::connect();

        // Get list of all categories with count (excluding museum research for filters)
        $kategori_list = $db->query("
        SELECT kategori_objek, COUNT(*) as jumlah 
        FROM penelitian 
        WHERE jenis != 'museum'
        GROUP BY kategori_objek 
        ORDER BY jumlah DESC, kategori_objek ASC
    ")->getResultArray();

        // Get list of all institutions with count (excluding museum research for filters)
        $instansi_list = $db->query("
        SELECT instansi, COUNT(*) as jumlah 
        FROM penelitian 
        WHERE jenis != 'museum'
        GROUP BY instansi 
        ORDER BY jumlah DESC, instansi ASC
    ")->getResultArray();

        // Get list of all years with count (excluding museum research for filters)
        $tahun_list = $db->query("
        SELECT EXTRACT(YEAR FROM tanggal_mulai) as tahun, COUNT(*) as jumlah 
        FROM penelitian 
        WHERE jenis != 'museum'
        GROUP BY EXTRACT(YEAR FROM tanggal_mulai) 
        ORDER BY tahun DESC
    ")->getResultArray();

        // Get count by jenis
        $jenis_count = [
            'museum' => $db->query("SELECT COUNT(*) as count FROM penelitian WHERE jenis = 'museum'")->getRow()->count,
            'umum' => $db->query("SELECT COUNT(*) as count FROM penelitian WHERE jenis = 'umum'")->getRow()->count
        ];

        // Get the latest research without filters - keep this as DESC to show the latest
        $latestModel = new \App\Models\M_Penelitian();
        $latest_penelitian = $latestModel->orderBy('tanggal_mulai', 'DESC')
            ->limit(3)
            ->find();

        // Prepare data for view
        $data = [
            'title' => 'Penelitian',
            'penelitian' => $penelitianModel->paginate(10, 'default'),
            'penelitian_museum' => $penelitian_museum,
            'pager' => $penelitianModel->pager,

            // Add filter data
            'kategori_list' => $kategori_list,
            'instansi_list' => $instansi_list,
            'tahun_list' => $tahun_list,
            'jenis_count' => $jenis_count,
            'latest_penelitian' => $latest_penelitian,

            // Add current filters to help with UI highlighting
            'current_filters' => [
                'kategori_objek' => $kategori_objek,
                'instansi' => $instansi,
                'tahun' => $tahun,
                'jenis' => $jenis,
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

    public function detailPenelitian($id)
    {
        $penelitianModel = new \App\Models\M_Penelitian();

        // Get the specific research by ID
        $penelitian = $penelitianModel->find($id);

        // If research not found, redirect to 404
        if (!$penelitian) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Penelitian tidak ditemukan');
        }

        // Get related research (same category, excluding current research)
        $related_penelitian = $penelitianModel
            ->where('kategori_objek', $penelitian['kategori_objek'])
            ->where('id_penelitian !=', $id)
            ->orderBy('tanggal_mulai', 'DESC')
            ->limit(3)
            ->find();

        $data = [
            'title' => $penelitian['judul_penelitian'] . ' - Detail Penelitian',
            'penelitian' => $penelitian,
            'related_penelitian' => $related_penelitian,

            // Keep your visitor counter data
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
        ];

        return view('landingPage/penelitian_detail', $data);
    }


    public function siBiru(): string
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
        return view('landingPage/heritage-walk/si-biru', $data);
    }

    public function gereja(): string
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
        return view('landingPage/heritage-walk/gereja', $data);
    }

    public function langko(): string
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
        return view('landingPage/heritage-walk/jalan-langko', $data);
    }

    public function katalogSumbawa(): string
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
        return view('landingPage/katalog-pameran-sumbawa', $data);
    }

    public function pelatihanFestival(): string
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
        return view('landingPage/informasi_pelatihan_festival_museum_desa', $data);
    }

    public function kajianPendirianMuseum(): string
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
        return view('landingPage/kajian-pendirian-museum', $data);
    }

    public function katalogTemporer(): string
    {
        // $session = session();
        // $id_user = $session->get('id_user');
        // $user = $this->M_User->getUser($id_user);
        $db = \Config\Database::connect();

        // Ambil data pameran dengan jenis "Temporer" (case insensitive)
        $pameran = $db->table('pameran')
            ->like('jenis', 'temporer', 'both', null, true) // case insensitive
            ->get()
            ->getResultArray();

        $data = [
            'title' => 'Katalog Pameran Temporer',
            'pameran' => $pameran,
            'totalkeseluruhan' => $this->M_Pengunjung->countPengunjung(),
            'totalHariIni' => $this->M_Pengunjung->countPengunjungToday(),
            'totalBulan' => $this->M_Pengunjung->countPengunjungThisMonth(),
            'totalTahun' => $this->M_Pengunjung->countPengunjungThisYear(),
            // 'user' => $user
        ];
        return view('landingPage/katalog-temporer', $data);
    }
}
