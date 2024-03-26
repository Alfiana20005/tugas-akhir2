<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'C_Login::index');
$routes->get('/dashboard', 'C_Dashboard::index');
$routes->get('/dashboard2', 'C_Dashboard::grafikKoleksi');

//login
$routes->post('/login', 'C_Login::login');
$routes->get('/login', 'C_Login::login');
//logout
$routes->get('/logout', 'C_Login::logout');

//filter
$routes->get('/sidebar', 'C_Dashboard::akses');

//data petugas
$routes->get('/petugas', 'C_Petugas::index');
$routes->get('/tambahpetugas', 'C_Petugas::formtambah');
$routes->post('/save', 'C_Petugas::save');
$routes->delete('hapuspetugas/(:segment)', 'C_Petugas::delete/$1');
$routes->get('ubahpetugas/(:segment)', 'C_Petugas::edit/$1');
$routes->post('/updatepetugas/(:segment)', 'C_Petugas::update/$1');
$routes->post('/updateProfile/(:segment)', 'C_Petugas::updateProfile/$1');
$routes->get('/profile', 'C_Petugas::profile');
$routes->get('profile/(:segment)', 'C_Petugas::profile/$1');

//data pengunjung
$routes->post('/tambahPengunjung', 'C_Pengunjung::tambahPengunjung');
$routes->get('/pengunjung', 'C_Pengunjung::index');
$routes->get('/rekapitulasi', 'C_Pengunjung::rekapitulasi');
$routes->post('/rekapitulasi', 'C_Pengunjung::rekapitulasi');
$routes->get('/generate-report', 'C_Pengunjung::generateReport');
$routes->get('/statistik', 'C_Pengunjung::tampilstatistik');
$routes->post('/statistik', 'C_Pengunjung::tampilstatistik');
$routes->get('/print', 'C_Pengunjung::print');
$routes->post('/print', 'C_Pengunjung::print');

//Inventaris 
$routes->get('/tambahdata', 'C_Koleksi::tambahData');
$routes->post('/saveData', 'C_Koleksi::saveData');
// 
$routes->get('/detailKoleksi', 'C_Koleksi::detailKoleksi');
$routes->get('/detailKoleksi/(:segment)', 'C_Koleksi::detailKoleksi/$1');
$routes->delete('hapus/(:segment)', 'C_Koleksi::delete/$1');
$routes->get('ubahKoleksi/(:segment)', 'C_Koleksi::edit/$1');
$routes->post('/updateKoleksi/(:segment)', 'C_Koleksi::update/$1');
$routes->get('/koleksi/(:segment)', 'C_Koleksi::tampilKoleksi/$1');
$routes->post('/updateKeadaan', 'C_Koleksi::updateKeadaan');
$routes->get('/grafikKoleksi', 'C_Koleksi::grafikKoleksi');

//perawatan

$routes->get('/dataPerawatan/(:segment)', 'C_Perawatan::lihatPerawatan/$1');
// $routes->get('/tambahPerawatan', 'C_Perawatan::tambahPerawatan');
$routes->get('/tambahPerawatan/(:segment)', 'C_Perawatan::tambahPerawatan/$1');
$routes->post('/simpanPerawatan/(:segment)', 'C_Perawatan::savePerawatan/$1');
$routes->post('/simpanPerawatan', 'C_Perawatan::savePerawatan');
$routes->get('/perawatan', 'C_Perawatan::perawatan');
$routes->get('/tambahJadwal', 'C_Perawatan::tambahJadwalPerawatan');
$routes->post('/simpanJadwal', 'C_Perawatan::saveJadwalPerawatan');

// $routes->get('/detailJadwal', 'C_Perawatan::detailJadwal');
// $routes->get('detailJadwal/(:segment)', 'C_Perawatan::detailJadwal/$1');
$routes->get('detailJadwal/(:segment)', 'C_Perawatan::detailJadwal/$1');
$routes->post('/updateStatus', 'C_Perawatan::updateStatus');
$routes->delete('deleteJadwal/(:segment)', 'C_Perawatan::delete/$1');
$routes->post('/laporan', 'C_Perawatan::laporan');
$routes->get('/laporan', 'C_Perawatan::laporan');