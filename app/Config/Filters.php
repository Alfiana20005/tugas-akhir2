<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array<string, array<int, string>|string> [filter_name => classname]
     *                                               or [filter_name => [classname1, classname2, ...]]
     * @phpstan-var array<string, class-string|list<class-string>>
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'login'      => \Myth\Auth\Filters\LoginFilter::class,
        'role'       => \Myth\Auth\Filters\RoleFilter::class,
        'permission' => \Myth\Auth\Filters\PermissionFilter::class,
        'filterAdmin' => \App\Filters\FilterAdmin::class,
        'filterPelayanan' => \App\Filters\FilterPelayanan::class,
        'filterPengkajian' => \App\Filters\FilterPengkajian::class,
        'filterKepala' => \App\Filters\FilterKepala::class,
        // 'filterPelayanan' => \App\Filters\FilterPelayanan::class,
        // 'filterPengkajian' => \App\Filters\FilterPengkajian::class,
        // 'filterKepala' => \App\Filters\FilterKepala::class,
        
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array<string, array<string, array<string, string>>>|array<string, array<string>>
     * @phpstan-var array<string, list<string>>|array<string, array<string, array<string, string>>>
     */
    
    public array $globals = [
        'before' => [
            
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
            'filterAdmin' =>[
                'except' => [
                    '/login','c_Login/*','/halamanLogin','c_Login', 
                    'c_LandingPage/*',  'c_LandingPage/','/','/home', 
                    '/berita2','/lihatberita2','/lihatberita2/*', 
                    '/visimisi2','/sejarah2','/struktur2',
                    '/ruangPamer2', '/kontak', '/pesanUser',
                    '/kegiatan2', '/lihatKegiatan2', '/lihatKegiatan2/*',
                    '/kajian2', '/kajianKategori2/*',
                    '/tulisan2','/tulisan2/*',
                    '/koleksi_page2', '/koleksi_detail2', '/koleksi_detail2/*',
                    '/publikasi2',
                    '/perpustakaan2',
                    
                ]
            ],
            'filterPelayanan' =>[
                'except' => [
                    '/login','c_Login/*','/halamanLogin','c_Login', 
                    'c_LandingPage/*',  'c_LandingPage/','/','/home', 
                    '/berita2','/lihatberita2','/lihatberita2/*', 
                    '/visimisi2','/sejarah2','/struktur2',
                    '/ruangPamer2', '/kontak', '/pesanUser',
                    '/kegiatan2', '/lihatKegiatan2', '/lihatKegiatan2/*',
                    '/kajian2', '/kajianKategori2/*',
                    '/tulisan2','/tulisan2/*',
                    '/koleksi_page2', '/koleksi_detail2', '/koleksi_detail2/*',
                    '/publikasi2',
                    '/perpustakaan2',
                    
                ]
            ],
            'filterPengkajian' =>[
                'except' => [
                    '/login','c_Login/*','/halamanLogin','c_Login', 
                    'c_LandingPage/*',  'c_LandingPage/','/','/home', 
                    '/berita2','/lihatberita2','/lihatberita2/*', 
                    '/visimisi2','/sejarah2','/struktur2',
                    '/ruangPamer2', '/kontak', '/pesanUser',
                    '/kegiatan2', '/lihatKegiatan2', '/lihatKegiatan2/*',
                    '/kajian2', '/kajianKategori2/*',
                    '/tulisan2','/tulisan2/*',
                    '/koleksi_page2', '/koleksi_detail2', '/koleksi_detail2/*',
                    '/publikasi2',
                    '/perpustakaan2',
                    
                ]
            ],
            'filterKepala' =>[
                'except' => [
                    '/login','c_Login/*','/halamanLogin','c_Login', 
                    'c_LandingPage/*',  'c_LandingPage/','/','/home', 
                    '/berita2','/lihatberita2','/lihatberita2/*', 
                    '/visimisi2','/sejarah2','/struktur2',
                    '/ruangPamer2', '/kontak', '/pesanUser',
                    '/kegiatan2', '/lihatKegiatan2', '/lihatKegiatan2/*',
                    '/kajian2', '/kajianKategori2/*',
                    '/tulisan2','/tulisan2/*',
                    '/koleksi_page2', '/koleksi_detail2', '/koleksi_detail2/*',
                    '/publikasi2',
                    '/perpustakaan2',
                    
                ]
            ],
            


        ],
        'after' => [
            'filterAdmin' =>[
                'except' => [
                    '/login', 'C_Login/*', '/logout', '/dashboard', '/halamanLogin', 'C_Login', 
                    'C_Petugas/*', 'C_Petugas/',
                    '/petugas','/tambahpetugas', '/save', 'hapuspetugas/*', 'ubahpetugas/*', '/updatepetugas/*','/updateProfile/*', '/profile', 'profile/*', 
                    'C_LandingPage/*', 'C_LandingPage/', 'C_Admin/*', 'C_Admin/', 
                    '/pesanAdmin', 'hapuspesan/*',
                    '/beritaAdmin', '/tambahBerita', '/saveBerita', 'hapusberita/*',  'updateBerita/*',
                    '/tambahKegiatan', '/saveKegiatan', 'hapusKegiatan/*', 'updateKegiatan/*',
                    '/tambahPublikasi', '/savePublikasi', 'hapusPublikasi/*', 'updatePublikasi/*',
                    '/koleksiAdmin', '/saveKoleksi', 'hapusKoleksiAdmin/*', 'updateKoleksiAdmin/*',
                    '/galleryAdmin', '/saveGallery', 'hapusGallery/*',
                    '/saveKajian', '/kajianAdmin', 
                    '/tulisKajian', '/addSection', '/tulisKajian/*', '/saveIsiKajian', '/tulisKajian/*', 'hapusKajian/*', 

                 ]
            ],
            'filterPelayanan' =>[
                'except' => [
                    '/login', 'C_Login/*', '/logout', '/dashboard', '/halamanLogin', 'C_Login', 
                    'C_Pengunjung/*', 'C_Pengunjung/', 
                    '/tambahPengunjung', '/pengunjung','/rekapitulasi', 
                    '/statistik', '/print', 

                 ]
            ],
            'filterPengkajian' =>[
                'except' => [
                    '/login', 'C_Login/*', '/logout', '/dashboard', '/halamanLogin', 'C_Login', 
                    'C_Koleksi/*', 'C_Koleksi/',
                    '/tambahdata','/saveData','/detailKoleksi', '/detailKoleksi/*','hapus/*', 'ubahKoleksi/*', 
                    '/updateKoleksi/*', '/koleksi/*', '/updateKeadaan',
                    '/grafikKoleksi',
                    'C_Perawatan/*', 'C_Perawatan/',
                    '/dataPerawatan/*', '/tambahPerawatan/*', 
                    '/simpanPerawatan/*', '/simpanPerawatan','/perawatan', '/tambahJadwal','/simpanJadwal', 
                    'detailJadwal/*', '/updateStatus', 'deleteJadwal/*', '/laporan', 

                 ]
            ],
            'filterKepala' =>[
                'except' => [
                    '/login', 'C_Login/*', '/logout', '/dashboard', '/halamanLogin', 'C_Login', 
                    '/petugas', '/statistik', 
                    '/koleksi/*', '/detailKoleksi', '/detailKoleksi/*',
                    '/perawatan', '/dataPerawatan/*', 'detailJadwal/*',
                    

                 ]
            ],
            // 'filterPelayanan' => [
            //     'except' =>[
            //         '/login', 'C_Login/*', '/logout', '/dashboard', '/halamanLogin', 'C_Login',
            //         '/tambahPengunjung', '/pengunjung', '/rekapitulasi', '/generate-report',
            //         '/statistik', '/print',

            //     ]

            // ],
            // 'filterPengkajian' => [
            //     'except' =>[
            //         '/login', 'C_Login/*', '/logout', '/dashboard', '/halamanLogin', 'C_Login',
            //         '/tambahdata', '/saveData',
            //         '/detailKoleksi', '/detailKoleksi/*', 
            //         'hapus/*', 'ubahKoleksi/*', '/updateKoleksi/*',
            //         '/koleksi/*', '/updateKeadaan', '/grafikKoleksi', 
            //         '/dataPerawatan/*', '/tambahPerawatan/*', '/simpanPerawatan/*',
            //         '/simpanPerawatan', '/perawatan', '/tambahJadwal','/simpanJadwal',
            //         'detailJadwal/*', '/updateStatus', 'deleteJadwal/*',
            //         '/laporan', '/laporan',
            //     ]
            // ],
            // 'filterKepala' => [
            //     'except' => [
            //         '/login', 'C_Login/*', '/logout', '/dashboard', '/halamanLogin', 'C_Login',
            //         '/tambahPengunjung', '/pengunjung', '/rekapitulasi', '/generate-report',
            //         '/statistik', '/print', 
            //         '/detailKoleksi', '/detailKoleksi/*', 
            //         'hapus/*', 'ubahKoleksi/*', '/updateKoleksi/*',
            //         '/koleksi/*', '/updateKeadaan', '/grafikKoleksi', 
            //         '/dataPerawatan/*', '/tambahPerawatan/*', '/simpanPerawatan/*',
            //         '/simpanPerawatan', '/perawatan', '/tambahJadwal','/simpanJadwal',
            //         'detailJadwal/*', '/updateStatus', 'deleteJadwal/*',
            //         '/laporan', '/laporan',
            //     ]
            // ]
            // 'toolbar',
            // // 'honeypot',
            // // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don't expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [];
}
