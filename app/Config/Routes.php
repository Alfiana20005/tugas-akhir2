<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Landing PAge
$routes->get('/', 'C_LandingPage::home');
$routes->get('/sejarah', 'C_LandingPage::sejarah');
$routes->get('/visimisi', 'C_LandingPage::visiMisi');
$routes->get('/struktur', 'C_LandingPage::struktur');
$routes->get('/ruangPamer', 'C_LandingPage::ruangPamer');
$routes->get('/tatatertib', 'C_LandingPage::tatatertib');
$routes->get('/berita', 'C_LandingPage::berita');
$routes->get('/lihatberita', 'C_LandingPage::lihatberita');
$routes->get('/lihatberita/(:segment)', 'C_LandingPage::lihatberita/$1');

$routes->get('/kegiatan', 'C_LandingPage::kegiatan');
$routes->get('/lihatKegiatan', 'C_LandingPage::lihatKegiatan');
$routes->get('/lihatKegiatan/(:segment)', 'C_LandingPage::lihatKegiatan/$1');
$routes->get('/kegiatan', 'C_LandingPage::kegiatan');
$routes->get('/kajian', 'C_LandingPage::kajian');
$routes->get('/kajianKategori/(:segment)', 'C_LandingPage::kajianKategori/$1');
$routes->get('/tulisan', 'C_LandingPage::tulisan');
$routes->get('/tulisan/(:segment)', 'C_LandingPage::tulisan/$1');


$routes->get('/koleksi_page', 'C_LandingPage::koleksi_page');
$routes->get('/lihatKegiatan/(:segment)', 'C_LandingPage::lihatKegiatan/$1');
$routes->get('/koleksi_detail', 'C_LandingPage::koleksi_detail');
$routes->get('/koleksi_detail/(:segment)', 'C_LandingPage::koleksi_detail/$1');
$routes->get('/publikasi', 'C_LandingPage::publikasi');
$routes->get('/perpustakaan', 'C_LandingPage::perpustakaan');
$routes->get('/penelitian', 'C_LandingPage::penelitian');


//Admin
$routes->get('/strukturOrganisasi', 'C_Admin::strukturOrganisasi');
$routes->post('/petugasMuseum', 'C_Admin::petugasMuseum');
$routes->post('/updateKaryawan/(:segment)', 'C_Admin::updateKaryawan/$1');
$routes->delete('hapusOrganisasi/(:segment)', 'C_Admin::hapusOrganisasi/$1');
$routes->get('/beritaAdmin', 'C_Admin::berita');


$routes->get('/tambahBerita', 'C_Admin::tambahBerita');
$routes->post('/saveBerita', 'C_Admin::save');
$routes->delete('hapusberita/(:segment)', 'C_Admin::deleteBerita/$1');
$routes->post('updateBerita/(:segment)', 'C_Admin::updateBerita/$1');

$routes->get('/tambahKegiatan', 'C_Admin::tambahKegiatan');
$routes->post('/saveKegiatan', 'C_Admin::saveKegiatan');
$routes->delete('hapusKegiatan/(:segment)', 'C_Admin::deleteKegiatan/$1');
$routes->post('updateKegiatan/(:segment)', 'C_Admin::updateKegiatan/$1');

$routes->get('/tambahPublikasi', 'C_Admin::tambahPublikasi');
$routes->post('/savePublikasi', 'C_Admin::savePublikasi');
$routes->delete('hapusPublikasi/(:segment)', 'C_Admin::deletePublikasi/$1');
$routes->post('updatePublikasi/(:segment)', 'C_Admin::updatePublikasi/$1');

$routes->get('/dataManuskripKol', 'C_Admin::dataManuskripKol');
$routes->post('/saveManuskripKol', 'C_Admin::saveManuskripKol');
$routes->delete('hapusManuskripKol/(:segment)', 'C_Admin::deleteManuskripKol/$1');
$routes->post('updateManuskripKol/(:segment)', 'C_Admin::updateManuskripKol/$1');

$routes->get('/dataManuskrip', 'C_Admin::dataManuskrip');
$routes->post('/saveManuskrip', 'C_Admin::saveManuskrip');
$routes->delete('hapusManuskrip/(:segment)', 'C_Admin::deleteManuskrip/$1');
$routes->post('updateManuskrip/(:segment)', 'C_Admin::updateManuskrip/$1');

$routes->get('/koleksiAdmin', 'C_Admin::koleksiAdmin');
$routes->post('/saveKoleksi', 'C_Admin::saveKoleksi');
$routes->delete('hapusKoleksiAdmin/(:segment)', 'C_Admin::deleteKoleksi/$1');
$routes->post('updateKoleksiAdmin/(:segment)', 'C_Admin::updateKoleksiAdmin/$1');


$routes->get('/galleryAdmin', 'C_Admin::galleryAdmin');
$routes->post('/saveGallery', 'C_Admin::saveGallery');
$routes->post('updateGallery/(:segment)', 'C_Admin::updateGallery/$1');
$routes->delete('hapusGallery/(:segment)', 'C_Admin::deleteGallery/$1');

$routes->post('/saveKajian', 'C_Admin::saveKajian');
$routes->get('/kajianAdmin', 'C_Admin::kajianAdmin');
$routes->get('/tulisKajian', 'C_Admin::tulisKajian');
$routes->post('/addSection', 'C_Admin::/addSection');
$routes->get('/tulisKajian/(:segment)', 'C_Admin::tulisKajian/$1');
$routes->post('/saveIsiKajian', 'C_Admin::saveIsiKajian');
$routes->get('/previewKajian/(:segment)', 'C_Admin::previewKajian/$1');
$routes->get('/tulisKajian/(:num)', 'C_Admin::tulisKajian/$1');
$routes->delete('hapusKajian/(:segment)', 'C_Admin::deleteKajian/$1');

$routes->get('/pesanAdmin', 'C_Admin::pesanAdmin');
$routes->delete('hapuspesan/(:segment)', 'C_Admin::deletePesan/$1');

$routes->get('/dataPenelitian', 'C_Admin::tambahPenelitian');
$routes->post('/savePenelitian', 'C_Admin::savePenelitian');
$routes->delete('hapusPenelitian/(:segment)', 'C_Admin::deletePenelitian/$1');
$routes->post('updatePenelitian/(:segment)', 'C_Admin::updatePenelitian/$1');


$routes->get('/sega', 'C_Admin::sega');

$routes->post('/saveSega', 'C_Admin::saveSega');
$routes->get('/previewSega/(:segment)', 'C_Admin::previewSega/$1');
$routes->delete('deleteSega/(:segment)', 'C_Admin::deleteSega/$1');


$routes->get('/aksesManuskrip', 'C_Admin::aksesManuskrip');
$routes->post('/acceptedUpdate', 'C_Admin::acceptedUpdate');





$routes->get('/halamanLogin', 'C_Login::index');
$routes->get('/dashboard', 'C_Dashboard::index');
$routes->get('/dashboard2', 'C_Dashboard::grafikKoleksi');
$routes->get('dashboard/getDataPerawatanByYear/(:num)', 'C_Dashboard::getDataPerawatanByYear/$1');

//login
$routes->post('/login', 'C_Login::login');
$routes->get('/login', 'C_Login::login');
$routes->post('/loginUser', 'C_User::loginUser');
$routes->get('/loginUser', 'C_User::loginUser');
$routes->post('/registerUser', 'C_User::registerUser');
//logout
$routes->get('/logout', 'C_Login::logout');
$routes->get('/logoutUser', 'C_User::logoutUser');
$routes->get('/formlogin', 'C_User::index');


//filter
$routes->get('/sidebar', 'C_Dashboard::akses');

//data petugass
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

$routes->post('/updatePengunjung/(:segment)', 'C_Pengunjung::updatePengunjung/$1');
$routes->delete('deleteData/(:segment)', 'C_Pengunjung::deleteData/$1');
$routes->get('/generate-report', 'C_Pengunjung::generateReport');
$routes->get('/statistik', 'C_Pengunjung::tampilstatistik');
$routes->post('/statistik', 'C_Pengunjung::tampilstatistik');
$routes->get('/print', 'C_Pengunjung::print');
$routes->post('/print', 'C_Pengunjung::print');

//Inventaris 
$routes->get('/tambahdata', 'C_Koleksi::tambahData');
$routes->post('/saveData', 'C_Koleksi::saveData');
// 
$routes->get('/seluruhKoleksi', 'C_Koleksi::seluruhKoleksi');
$routes->get('/exportExcel', 'C_Koleksi::exportExcel');
$routes->get('/detailKoleksi', 'C_Koleksi::detailKoleksi');
$routes->get('/detailKoleksi/(:segment)', 'C_Koleksi::detailKoleksi/$1');
$routes->get('/terakhirDiubah/(:segment)', 'C_Koleksi::terakhirDiubah/$1');
$routes->delete('hapus/(:segment)', 'C_Koleksi::delete/$1');
$routes->get('ubahKoleksi/(:segment)', 'C_Koleksi::edit/$1');
$routes->post('/updateKoleksi/(:segment)', 'C_Koleksi::update/$1');

$routes->get('/koleksi/(:segment)', 'C_Koleksi::tampilKoleksi/$1');
$routes->post('/updateKeadaan', 'C_Koleksi::updateKeadaan');
$routes->get('/grafikKoleksi', 'C_Koleksi::grafikKoleksi');

//perawatan

$routes->get('/dataPerawatan/(:any)', 'C_Perawatan::lihatPerawatan/$1');
// $routes->get('/tambahPerawatan', 'C_Perawatan::tambahPerawatan');
$routes->get('/tambahPerawatan/(:segment)', 'C_Perawatan::tambahPerawatan/$1');
$routes->post('/simpanPerawatan/(:segment)', 'C_Perawatan::savePerawatan/$1');
$routes->post('/simpanPerawatan', 'C_Perawatan::savePerawatan');
$routes->get('/perawatan', 'C_Perawatan::perawatan');
$routes->get('/tambahJadwal', 'C_Perawatan::tambahJadwalPerawatan');
$routes->post('/simpanJadwal', 'C_Perawatan::saveJadwalPerawatan');

// perawatan2
$routes->post('/savePerawatanPreventif', 'C_Perawatan2::savePerawatanPreventif');
$routes->post('/savePerawatanKuratif', 'C_Perawatan2::savePerawatanKuratif');
$routes->post('/savePerawatanRestorasi', 'C_Perawatan2::savePerawatanRestorasi');
$routes->get('/perawatanPreventif', 'C_Perawatan2::perawatanPreventif');
$routes->get('/perawatanKuratif', 'C_Perawatan2::perawatanKuratif');
$routes->get('/perawatanRestorasi', 'C_Perawatan2::perawatanRestorasi');
$routes->delete('deletePerawatan2/(:segment)', 'C_Perawatan2::delete/$1');
$routes->post('/updatePerawatan/(:segment)', 'C_Perawatan2::updatePerawatan/$1');

// $routes->get('/detailJadwal', 'C_Perawatan::detailJadwal');
// $routes->get('detailJadwal/(:segment)', 'C_Perawatan::detailJadwal/$1');
$routes->get('detailJadwal/(:segment)', 'C_Perawatan::detailJadwal/$1');
$routes->post('detailJadwal/(:segment)', 'C_Perawatan::detailJadwal/$1');
$routes->post('/updateStatus', 'C_Perawatan::updateStatus');
$routes->delete('deleteJadwal/(:segment)', 'C_Perawatan::delete/$1');
$routes->post('/laporan', 'C_Perawatan::laporan');
$routes->get('/laporan', 'C_Perawatan::laporan');



//Home
$routes->get('/home', 'C_LandingPage::home');
$routes->get('/sejarah2', 'C_LandingPage::sejarah2');
$routes->get('/visimisi2', 'C_LandingPage::visiMisi2');
$routes->get('/struktur2', 'C_LandingPage::struktur2');
$routes->get('/ruangPamer2', 'C_LandingPage::ruangPamer2');
$routes->get('/tatatertib2', 'C_LandingPage::tatatertib2');
$routes->get('/berita2', 'C_LandingPage::berita2');
$routes->post('/berita2', 'C_LandingPage::berita2');
$routes->get('/lihatberita2', 'C_LandingPage::lihatberita2');
$routes->get('/lihatberita2/(:segment)', 'C_LandingPage::lihatberita2/$1');
$routes->post('/lihatberita2/(:segment)', 'C_LandingPage::lihatberita2/$1');
$routes->get('/beritaKategori2/(:segment)', 'C_LandingPage::beritaKategori2/$1');

$routes->get('/kegiatan2', 'C_LandingPage::kegiatan2');
$routes->get('/lihatKegiatan2', 'C_LandingPage::lihatKegiatan2');
$routes->get('/lihatKegiatan2/(:segment)', 'C_LandingPage::lihatKegiatan2/$1');
$routes->get('/kegiatan2', 'C_LandingPage::kegiatan2');
$routes->get('/kegiatanKategori2/(:segment)', 'C_LandingPage::kegiatanKategori2/$1');

$routes->get('/kajian2', 'C_LandingPage::kajian2');
$routes->get('/kajianKategori2/(:segment)', 'C_LandingPage::kajianKategori2/$1');
$routes->get('/tulisan2', 'C_LandingPage::tulisan');
$routes->get('/tulisan2/(:segment)', 'C_LandingPage::tulisan2/$1');


$routes->get('/manuskripKol', 'C_LandingPage::manuskripKol');
$routes->get('/manuskrip', 'C_LandingPage::manuskrip');
$routes->get('/manuskripLogin', 'C_LandingPage::manuskripLogin');
$routes->get('/saveViews/(:num)', 'C_LandingPage::views/$1');
$routes->get('/saveViews2/(:num)', 'C_LandingPage::views2/$1');


$routes->get('/koleksi', 'C_LandingPage::koleksi_page2');

$routes->get('/koleksi_kategori/(:segment)', 'C_LandingPage::koleksi_kategori/$1');
$routes->get('/koleksi_detail2', 'C_LandingPage::koleksi_detail2');
$routes->get('/koleksi_detail2/(:segment)', 'C_LandingPage::koleksi_detail2/$1');
$routes->get('/publikasi2', 'C_LandingPage::publikasi2');
$routes->get('/publikasi2_detail/(:num)', 'C_LandingPage::publikasi2_detail/$1');
$routes->get('/perpustakaan2', 'C_LandingPage::perpustakaan2');
$routes->get('/detailBuku/(:segment)', 'C_LandingPage::detailBuku/$1');

$routes->get('/kontak', 'C_LandingPage::kontak');
$routes->post('/pesanUser', 'C_LandingPage::pesanUser');
$routes->get('/pesanUser', 'C_LandingPage::pesanUser');
$routes->get('/semuaPetugas', 'C_LandingPage::semuaPetugas');
$routes->get('/sekardiyu', 'C_LandingPage::sekardiyu');
$routes->get('/rencanaStrategis', 'C_LandingPage::rencanaStrategis');



//E-Tiket
$routes->get('/etiket', 'C_LandingPage::etiket');

//Sega

$routes->get('/daftarSega', 'C_LandingPage::daftarSega');

$routes->get('/audioGuide/(:segment)', 'C_LandingPage::audioGuide/$1');

// Perpustakaan 
// $routes->get('/inputData', 'C_Perpustakaan::index');
$routes->get('/dataBuku', 'C_Perpustakaan::index');
$routes->post('/saveDataBuku', 'C_Perpustakaan::saveDataBuku');
$routes->delete('deleteBuku/(:segment)', 'C_Perpustakaan::deleteBuku/$1');
$routes->post('/updateBuku/(:segment)', 'C_Perpustakaan::updateBuku/$1');
$routes->get('/daftarSega', 'C_LandingPage::daftarSega');
$routes->get('/cekJudulBuku', 'C_Perpustakaan::cekJudulBuku');
// 
