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
        'csrf' => \CodeIgniter\Filters\CSRF::class,
        'login'      => \Myth\Auth\Filters\LoginFilter::class,
        'role'       => \Myth\Auth\Filters\RoleFilter::class,
        'permission' => \Myth\Auth\Filters\PermissionFilter::class,
        'filterAdmin' => \App\Filters\FilterAdmin::class,
        
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
            // 'filterAdmin' =>[
            //     'except' => [
            //         '/login','c_Login/*','/halamanLogin','c_Login', 
            //         'c_LandingPage/*',  'c_LandingPage/','/','/home', 
            //         '/berita2','/lihatberita2','/lihatberita2/*', 
            //         '/visimisi2','/sejarah2','/struktur2',
            //         '/ruangPamer2', '/kontak',
            //         '/kegiatan2', '/lihatKegiatan2', '/lihatKegiatan2/*',
            //         '/kajian2', '/kajianKategori2/*',
            //         '/tulisan2','/tulisan2/*',
            //         '/koleksi_page2', '/koleksi_detail2', '/koleksi_detail2/*',
            //         '/publikasi2',
            //         '/perpustakaan2',                 
            //     ]
            // ],
            
            
        ],
        'after' => [
            // 'filterAdmin' =>[
            //     'except' => [
            //         '/login', 'C_Login/*', '/logout', '/dashboard', '/halamanLogin', 'C_Login',
            //         'C_LandingPage/*', 'C_LandingPage/',
            //         '/beritaAdmin', '/tambahBerita', '/saveBerita', 'hapusberita/*', 
            //         '/tambahKegiatan', '/saveKegiatan', 'hapusKegiatan/*', 
            //         '/tambahPublikasi', '/savePublikasi', 'hapusPublikasi/*', 
            //         '/koleksiAdmin', '/saveKoleksi', 'hapusKoleksiAdmin/*', 
            //         '/galleryAdmin', '/saveGallery', 'hapusGallery/*',
            //         '/saveKajian', '/kajianAdmin', 
            //         '/tulisKajian', '/addSection', '/tulisKajian/*', '/saveIsiKajian', '/tulisKajian/*', 'hapusKajian/*', 
            //      ]
            // ],
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
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
