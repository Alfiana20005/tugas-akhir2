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
    protected $M_IsiKajian;
    protected $M_Pesan;

    public function __construct() {
        helper('form');
        $this -> M_Petugas = new M_Petugas();
        $this -> M_Berita = new M_Berita();
        $this -> M_Kegiatan = new M_Kegiatan();
        $this -> M_Publikasi = new M_Publikasi();
        $this -> M_KoleksiLandingPage = new M_KoleksiLandingPage();
        $this -> M_Gallery = new M_Gallery();
        $this -> M_Kajian = new M_Kajian();
        $this -> M_IsiKajian = new M_IsiKajian();
        $this -> M_Pesan = new M_Pesan();

    }
    public function index(): string
    {
        $kegiatan = $this->M_Kegiatan->findAll();
        $beritaTerbaru = $this->M_Berita->getBeritaTerbaru(4);
        $galery = $this->M_Gallery->findAll();

        // var_dump($berita);
        $data =[
            // 'title' => 'Daftar Berita',
            
            'beritaterbaru' => $beritaTerbaru,
            'kegiatan' => $kegiatan,
            'gallery' => $galery,
        ];
        return view('CompanyProfile/company', $data);
    }
    public function sejarah(): string
    {
        return view('CompanyProfile/v_sejarah');
    }
    public function visiMisi(): string
    {
        return view('CompanyProfile/visiMisi');
    }
    public function struktur(): string
    {
        return view('CompanyProfile/struktur');
    }
    public function ruangPamer(): string
    {
        return view('CompanyProfile/ruangPamer');
    }
    public function tataTertib(): string
    {
        return view('CompanyProfile/tatatertib');
    }
    public function berita(): string
    {
        $data_berita = $this->M_Berita->findAll();
        // $berita = $this->M_Berita->getBerita($id_berita);



        $data =[
            'title' => 'Daftar Berita',
            'dataBerita' => $data_berita,
            // 'berita' => $berita
        ];
        return view('CompanyProfile/berita', $data);
    }
    public function lihatberita($id_berita): string
    {
        
        $data_berita = $this->M_Berita->findAll();
        $berita = $this->M_Berita->getBerita($id_berita);
        $beritaTerbaru = $this->M_Berita->getBeritaTerbaru(10);

        // var_dump($berita);
        $data =[
            // 'title' => 'Daftar Berita',
            'dataBerita' => $data_berita,
            'berita' => $berita,
            'beritaterbaru' => $beritaTerbaru,
        ];
        return view('CompanyProfile/lihatBerita', $data);
    }
    public function kegiatan(): string
    { 
        $kegiatan = $this->M_Kegiatan->findAll();
        // $berita = $this->M_Berita->getBerita($id_berita);



        $data =[
            'title' => 'Daftar Kegiatan',
            'kegiatan' => $kegiatan,
            // 'berita' => $berita
        ];


        return view('CompanyProfile/kegiatan', $data);
    }
    public function lihatKegiatan($id_kegiatan){
        // $data_berita = $this->M_Berita->findAll();
        $kegiatan = $this->M_Kegiatan->getKegiatan($id_kegiatan);
        $kegiatanTerbaru = $this->M_Kegiatan->getKegiatanTeratas(10);

        // var_dump($berita);
        $data =[
            // 'title' => 'Daftar Berita',
            // 'dataBerita' => $data_berita,
            'kegiatan' => $kegiatan,
            'kegiatanTerbaru' => $kegiatanTerbaru,
        ];

        return view('CompanyProfile/lihatKegiatan', $data);
    }

    public function kajian(): string
    {
        $kajian = $this->M_Kajian->findAll();
        $kajianTerbaru = $this->M_Kajian->getKajianTerbaru(5);



        $data =[
            'title' => 'Daftar Kegiatan',
            'kajian' => $kajian,
            'kajianTerbaru' => $kajianTerbaru
        ];

        return view('CompanyProfile/kajian', $data);
    }
    public function kajianKategori($kategori): string
    {
        // $kajian = $this->M_Kajian->findAll();
        $kajianTerbaru = $this->M_Kajian->getKajianTerbaru(5);
        $kajianKategori = $this->M_Kajian->getDataByKategori($kategori);



        $data =[
            'title' => 'Daftar Kegiatan',
            // 'kajian' => $kajian,
            'kajianTerbaru' => $kajianTerbaru,
            'kajian' => $kajianKategori
        ];

        return view('CompanyProfile/kajian', $data);
    }
   
    public function tulisan($id_kajian): string
    {
        $kajian = $this->M_Kajian->getKajian($id_kajian);
        $kajianTerbaru = $this->M_Kajian->getKajianTerbaru(5);
        $IsiKajian = $this->M_IsiKajian->getDataByIdKajian($id_kajian);

        // var_dump($berita);
        $data =[

            'kajian' => $kajian,
            'kajianTerbaru' => $kajianTerbaru,
            'isiKajian' => $IsiKajian
        ];
        return view('CompanyProfile/tulisan', $data);
    }

    public function tambahBerita(): string
    {

        return view('CompanyProfile/tambahBerita');
    }

    public function koleksi_page(): string
    {
        $koleksi = $this->M_KoleksiLandingPage->findAll();
        // $berita = $this->M_Berita->getBerita($id_berita);



        $data =[
            'title' => 'Daftar Berita',
            'koleksi' => $koleksi,
            // 'berita' => $berita
        ];
        
        // dd($koleksi);
        return view('CompanyProfile/koleksi_page', $data);
    }

    public function koleksi_detail($id_koleksi)
    {
        // $data_berita = $this->M_Berita->findAll();
        $koleksi = $this->M_KoleksiLandingPage->getKOleksiById($id_koleksi);
        // $kegiatanTerbaru = $this->M_Kegiatan->getKegiatanTeratas(10);

        
        $data =[
            // 'title' => 'Daftar Berita',
            // 'dataBerita' => $data_berita,
            'koleksi' => $koleksi,
            // 'kegiatanTerbaru' => $kegiatanTerbaru,
        ];
            
        return view('CompanyProfile/koleksi_detail', $data);
    }

    public function publikasi(): string
    {
        $publikasi = $this->M_Publikasi->findAll();
        
        // $berita = $this->M_Berita->getBerita($id_berita);



        $data =[
            'title' => 'Daftar Publikasi',
            'publikasi' => $publikasi,
            // 'berita' => $berita
        ];


        return view('CompanyProfile/publikasi', $data);
    }
    public function perpustakaan(): string
    {

        return view('CompanyProfile/perpustakaan_page');
    }


    // Start Landing Page Baru
    public function home(){
        $kegiatan = $this->M_Kegiatan->findAll();
        $beritaTerbaru = $this->M_Berita->getBeritaTerbaru(4);
        $galery = $this->M_Gallery->findAll();

        foreach ($beritaTerbaru as &$berita) {
            $berita['isi_pendek'] = $this->getExcerpt($berita['isi'], 20); // 30 adalah jumlah kata yang ingin ditampilkan
        }

        $data = [
            'beritaterbaru' => $beritaTerbaru,
            'kegiatan' => $kegiatan,
            'gallery' => $galery,
        ];

        // var_dump($berita);
        $data =[
            // 'title' => 'Daftar Berita',
            
            'beritaterbaru' => $beritaTerbaru,
            'kegiatan' => $kegiatan,
            'gallery' => $galery,
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
        return view('landingPage/sejarah2');
    }
    public function visiMisi2(): string
    {
        return view('landingPage/visiMisi2');
    }
    public function struktur2(): string
    {
        return view('landingPage/struktur2');
    }
    public function ruangPamer2(): string
    {
        return view('landingPage/ruangPamer2');
    }
    public function tataTertib2(): string
    {
        return view('landingPage/tatatertib2');
    }
    public function berita2(): string
    {
        $data_berita = $this->M_Berita->getBeritaBaru();
        // $berita = $this->M_Berita->getBerita($id_berita);
        foreach ($data_berita as &$berita) {
            $berita['isi_pendek'] = $this->getExcerpt($berita['isi'], 20); // 30 adalah jumlah kata yang ingin ditampilkan
        }



        $data =[
            'title' => 'Daftar Berita',
            'dataBerita' => $data_berita,
            // 'berita' => $berita
        ];
        return view('landingPage/berita2', $data);
    }
    public function lihatberita2($id_berita): string
    {
        
        $data_berita = $this->M_Berita->findAll();
        $berita = $this->M_Berita->getBerita($id_berita);
        $beritaTerbaru = $this->M_Berita->getBeritaTerbaru(10);

        // var_dump($berita);
        $data =[
            // 'title' => 'Daftar Berita',
            'dataBerita' => $data_berita,
            'berita' => $berita,
            'beritaterbaru' => $beritaTerbaru,
        ];
        return view('landingPage/lihatBerita2', $data);
    }
    public function kegiatan2(): string
    { 
        $kegiatan = $this->M_Kegiatan->get();
        // $berita = $this->M_Berita->getBerita($id_berita);



        $data =[
            'title' => 'Daftar Kegiatan',
            'kegiatan' => $kegiatan,
            // 'berita' => $berita
        ];


        return view('landingPage/kegiatan2', $data);
    }
    public function lihatKegiatan2($id_kegiatan){
        // $data_berita = $this->M_Berita->findAll();
        $kegiatan = $this->M_Kegiatan->getKegiatan($id_kegiatan);
        $kegiatanTerbaru = $this->M_Kegiatan->getKegiatanTeratas(10);

        // var_dump($berita);
        $data =[
            // 'title' => 'Daftar Berita',
            // 'dataBerita' => $data_berita,
            'kegiatan' => $kegiatan,
            'kegiatanTerbaru' => $kegiatanTerbaru,
        ];

        return view('landingPage/lihatKegiatan2', $data);
    }

    public function kajian2(): string
    {
        $kajian = $this->M_Kajian->findAll();
        $kajianTerbaru = $this->M_Kajian->getKajianTerbaru(5);





        $data =[
            'title' => 'Daftar Kegiatan',
            'kajian' => $kajian,
            'kajianTerbaru' => $kajianTerbaru
        ];

        return view('landingPage/kajian2', $data);
    }
    public function kajianKategori2($kategori): string
    {
        // $kajian = $this->M_Kajian->findAll();
        $kajianTerbaru = $this->M_Kajian->getKajianTerbaru(5);
        $kajianKategori = $this->M_Kajian->getDataByKategori($kategori);



        $data =[
            'title' => 'Daftar Kegiatan',
            // 'kajian' => $kajian,
            'kajianTerbaru' => $kajianTerbaru,
            'kajian' => $kajianKategori
        ];

        return view('landingPage/kajian2', $data);
    }
    public function tulisan2($id_kajian): string
    {
        $kajian = $this->M_Kajian->getKajian($id_kajian);
        $kajianTerbaru = $this->M_Kajian->getKajianTerbaru(5);
        $IsiKajian = $this->M_IsiKajian->getDataByIdKajian($id_kajian);

        // var_dump($berita);
        $data =[

            'kajian' => $kajian,
            'kajianTerbaru' => $kajianTerbaru,
            'isiKajian' => $IsiKajian
        ];
        return view('landingPage/tulisan2', $data);
    }

    public function tambahBerita2(): string
    {

        return view('landingPage/tambahBerita2');
    }

    public function koleksi_page2(): string
    {
        $koleksi = $this->M_KoleksiLandingPage->findAll();
        // $berita = $this->M_Berita->getBerita($id_berita);



        $data =[
            'title' => 'Daftar Berita',
            'koleksi' => $koleksi,
            // 'berita' => $berita
        ];
        
        // dd($koleksi);
        return view('landingPage/koleksi_page2', $data);
    }

    public function koleksi_detail2($id_koleksi)
    {
        // $data_berita = $this->M_Berita->findAll();
        $koleksi = $this->M_KoleksiLandingPage->getKOleksiById($id_koleksi);
        // $kegiatanTerbaru = $this->M_Kegiatan->getKegiatanTeratas(10);

        
        $data =[
            // 'title' => 'Daftar Berita',
            // 'dataBerita' => $data_berita,
            'koleksi' => $koleksi,
            // 'kegiatanTerbaru' => $kegiatanTerbaru,
        ];
            
        return view('landingPage/koleksi_detail2', $data);
    }

    public function publikasi2(): string
    {
        $publikasi = $this->M_Publikasi->findAll();
        
        // $berita = $this->M_Berita->getBerita($id_berita);



        $data =[
            'title' => 'Daftar Publikasi',
            'publikasi' => $publikasi,
            // 'berita' => $berita
        ];


        return view('landingPage/publikasi2', $data);
    }
    public function perpustakaan2(): string
    {

        return view('landingPage/perpustakaan_page2');
    }
    public function kontak(): string
    {
        

        return view('landingPage/kontak');
    }
    public function pesanUser()
    {
        $rules= [
            'nama' => [
                'rules' => 'required',
                'errors' => ['required'=>'Judul harus diisi']
            ],
            'pesan' => [
                'rules' => 'required',
                'errors' => [
                    'required'=>'tanggal tidak boleh kosong',
                    
    
                ]
            ],
        ];

        if(!$this->validate($rules)){
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/kontak') ->withInput() -> with('errors', $this->validator->listErrors());
        }

        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_Pesan->save([
            // 'id_petugas' => $id_petugas,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'pesan' => $this->request->getVar('pesan'),

            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Pesan Anda Berhasil Dikirim.');

        return redirect()-> to('/kontak');

        // return view('landingPage/kontak');
    }




    

}
