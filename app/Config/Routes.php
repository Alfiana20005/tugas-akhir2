<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'C_Login::index');
$routes->get('/dashboard', 'C_Dashboard::index');

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

//data pengunjung

$routes->post('/tambahPengunjung', 'C_Pengunjung::tambahPengunjung');
$routes->get('/pengunjung', 'C_Pengunjung::index');
$routes->get('/rekapitulasi', 'C_Pengunjung::rekapitulasi');
$routes->post('/rekapitulasi', 'C_Pengunjung::rekapitulasi');
$routes->get('/generate-report', 'C_Pengunjung::generateReport');
$routes->get('/statistik', 'C_Pengunjung::statistik');
$routes->post('/statistik', 'C_Pengunjung::statistik');
$routes->get('/laporan', 'C_Pengunjung::laporan');
$routes->post('/laporan', 'C_Pengunjung::laporan');
