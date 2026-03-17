<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Landing PAge
$routes->get('/', 'C_LandingPage::home');
$routes->get('/tatatertib', 'C_LandingPage::tatatertib');
$routes->get('/berita', 'C_LandingPage::berita');
$routes->get('/lihatberita', 'C_LandingPage::lihatberita');
$routes->get('/berita/(:segment)', 'C_LandingPage::lihatberita/$1');
// Route untuk generate slug (jalankan sekali saja, lalu hapus)
$routes->get('/generate-slugs', 'C_LandingPage::generateSlugsForExisting');

// Route untuk backward compatibility (redirect ID lama ke slug)
$routes->get('/berita-id/(:num)', 'C_LandingPage::redirectToSlug/$1');

// Home & Profil
$routes->get('/home', 'C_LandingPage::home');
$routes->get('/sejarah', 'C_LandingPage::sejarah');
$routes->get('/visimisi', 'C_LandingPage::visiMisi');
$routes->get('/struktur', 'C_LandingPage::struktur');
$routes->get('/ruang-pamer', 'C_LandingPage::ruangPamer');
$routes->get('/tatatertib', 'C_LandingPage::tatatertib');

// Berita
$routes->get('/berita/kategori/(:segment)', 'C_LandingPage::beritaKategori/$1');

// Kegiatan
$routes->get('/kegiatan', 'C_LandingPage::kegiatan');
$routes->get('/kegiatanKategori/(:segment)', 'C_LandingPage::kegiatanKategori/$1');
$routes->get('/lihatKegiatan', 'C_LandingPage::lihatKegiatan');
$routes->get('/lihatKegiatan/(:segment)', 'C_LandingPage::lihatKegiatan/$1');

// Kajian
$routes->get('/kajian', 'C_LandingPage::kajian');
$routes->get('/kajianKategori/(:segment)', 'C_LandingPage::kajianKategori/$1');
$routes->get('/tulisan', 'C_LandingPage::tulisan');
$routes->get('/tulisan/(:segment)', 'C_LandingPage::tulisan/$1');

// Manuskrip
$routes->get('/manuskripKol', 'C_LandingPage::manuskripKol');
$routes->get('/manuskrip', 'C_LandingPage::manuskrip');
$routes->get('/manuskripLogin', 'C_LandingPage::manuskripLogin');

// Koleksi
$routes->get('/koleksi_page', 'C_LandingPage::koleksi_page');
$routes->get('/koleksi_kategori/(:segment)', 'C_LandingPage::koleksi_kategori/$1');
$routes->get('/koleksi', 'C_LandingPage::koleksi_page');
$routes->get('/koleksi_detail', 'C_LandingPage::koleksi_detail');
$routes->get('/koleksi_detail/(:segment)', 'C_LandingPage::koleksi_detail/$1');
$routes->get('/koleksi/detail/(:segment)', 'C_LandingPage::koleksi_detail/$1');

// Publikasi
$routes->get('/publikasi', 'C_LandingPage::publikasi');
$routes->get('/publikasi/detail/(:num)', 'C_LandingPage::publikasi2_detail/$1');

// Perpustakaan
$routes->get('/perpustakaan', 'C_LandingPage::perpustakaan');
$routes->get('/detailBuku/(:segment)', 'C_LandingPage::detailBuku/$1');

// Penelitian
$routes->get('/penelitian', 'C_LandingPage::penelitian');
$routes->get('/penelitian/detail/(:num)', 'C_LandingPage::detailPenelitian/$1');

// Kontak, Pesan & Petugas
$routes->get('/kontak', 'C_LandingPage::kontak');
$routes->get('/pesanUser', 'C_LandingPage::pesanUser');
$routes->post('/pesanUser', 'C_LandingPage::pesanUser');
$routes->get('/semuaPetugas', 'C_LandingPage::semuaPetugas');
$routes->get('/sekardiyu', 'C_LandingPage::sekardiyu');
$routes->get('/rencana-strategis', 'C_LandingPage::rencanaStrategis');

// Heritage Walk
$routes->get('/heritage-walk/si-biru', 'C_LandingPage::siBiru');
$routes->get('/heritage-walk/gereja-st-antonius', 'C_LandingPage::gereja');
$routes->get('/heritage-walk/jalan-langko', 'C_LandingPage::langko');

// Katalog & Sega
$routes->get('/katalog-pameran-sumbawa', 'C_LandingPage::katalogSumbawa');
$routes->get('/informasi-pelatihan-festival-museum-desa', 'C_LandingPage::pelatihanFestival');
$routes->get('/kajian-pendirian-museum', 'C_LandingPage::kajianPendirianMuseum');
$routes->get('/katalog-pameran-temporer', 'C_LandingPage::katalogTemporer');
$routes->get('/sega/(:segment)', 'App\Controllers\Admin\AdminSegaController::previewSega/$1');

// Routes Admin (namespace Admin) - dilindungi filterAdmin
$routes->group('', ['filter' => 'filterAdmin', 'namespace' => 'App\Controllers\Admin'], function ($routes) {
    // Struktur Organisasi & Petugas Museum
    $routes->get('/strukturOrganisasi', 'AdminProfileController::strukturOrganisasi');
    $routes->post('/petugasMuseum', 'AdminProfileController::petugasMuseum');
    $routes->post('/updateKaryawan/(:segment)', 'AdminProfileController::updateKaryawan/$1');
    $routes->delete('hapusOrganisasi/(:segment)', 'AdminProfileController::hapusOrganisasi/$1');

    // Berita Admin
    $routes->get('/beritaAdmin', 'AdminBeritaController::berita');
    $routes->get('/tambahBerita', 'AdminBeritaController::tambahBerita');
    $routes->post('/saveBerita', 'AdminBeritaController::save');
    $routes->delete('hapusberita/(:segment)', 'AdminBeritaController::deleteBerita/$1');
    $routes->post('updateBerita/(:segment)', 'AdminBeritaController::updateBerita/$1');

    $routes->get('/dataPameran', 'AdminPameranController::pameran');
    $routes->get('/tambahPameran', 'AdminPameranController::tambahPameran');
    $routes->post('/savePameran', 'AdminPameranController::savePameran');
    $routes->delete('hapusPameran/(:segment)', 'AdminPameranController::deletePameran/$1');
    $routes->post('updatePameran/(:segment)', 'AdminPameranController::updatePameran/$1');

    // Kegiatan
    $routes->get('/tambahKegiatan', 'AdminKegiatanController::tambahKegiatan');
    $routes->post('/saveKegiatan', 'AdminKegiatanController::saveKegiatan');
    $routes->delete('hapusKegiatan/(:segment)', 'AdminKegiatanController::deleteKegiatan/$1');
    $routes->post('updateKegiatan/(:segment)', 'AdminKegiatanController::updateKegiatan/$1');

    // Publikasi
    $routes->get('/tambahPublikasi', 'AdminPublikasiController::tambahPublikasi');
    $routes->post('/savePublikasi', 'AdminPublikasiController::savePublikasi');
    $routes->delete('hapusPublikasi/(:segment)', 'AdminPublikasiController::deletePublikasi/$1');
    $routes->post('updatePublikasi/(:segment)', 'AdminPublikasiController::updatePublikasi/$1');

    // Manuskrip Koleksi
    $routes->get('/dataManuskripKol', 'AdminManuskripController::dataManuskripKol');
    $routes->post('/saveManuskripKol', 'AdminManuskripController::saveManuskripKol');
    $routes->delete('hapusManuskripKol/(:segment)', 'AdminManuskripController::deleteManuskripKol/$1');
    $routes->post('updateManuskripKol/(:segment)', 'AdminManuskripController::updateManuskripKol/$1');

    // Manuskrip
    $routes->get('/dataManuskrip', 'AdminManuskripController::dataManuskrip');
    $routes->post('/saveManuskrip', 'AdminManuskripController::saveManuskrip');
    $routes->delete('hapusManuskrip/(:segment)', 'AdminManuskripController::deleteManuskrip/$1');
    $routes->post('updateManuskrip/(:segment)', 'AdminManuskripController::updateManuskrip/$1');

    // Koleksi Admin
    $routes->get('/koleksiAdmin', 'AdminKoleksiController::koleksiAdmin');
    $routes->post('/saveKoleksi', 'AdminKoleksiController::saveKoleksi');
    $routes->delete('hapusKoleksiAdmin/(:segment)', 'AdminKoleksiController::deleteKoleksi/$1');
    $routes->post('updateKoleksiAdmin/(:segment)', 'AdminKoleksiController::updateKoleksiAdmin/$1');
    $routes->post('hapusGambarDeskripsiByName', 'AdminKoleksiController::hapusGambarDeskripsiByName');

    // Gallery Admin
    $routes->get('/galleryAdmin', 'AdminGalleryController::galleryAdmin');
    $routes->post('/saveGallery', 'AdminGalleryController::saveGallery');
    $routes->post('updateGallery/(:segment)', 'AdminGalleryController::updateGallery/$1');
    $routes->delete('hapusGallery/(:segment)', 'AdminGalleryController::deleteGallery/$1');

    // Kajian Admin
    $routes->get('/tambahKajian', 'AdminKajianController::tambahKajian');
    $routes->post('/saveKajian', 'AdminKajianController::saveKajian');
    $routes->get('/kajianAdmin', 'AdminKajianController::kajianAdmin');
    $routes->get('/tulisKajian', 'AdminKajianController::tulisKajian');
    $routes->post('/addSection', 'AdminKajianController::addSection');
    $routes->get('/tulisKajian/(:segment)', 'AdminKajianController::tulisKajian/$1');
    $routes->post('/saveIsiKajian', 'AdminKajianController::saveIsiKajian');
    $routes->post('/updateIsiKajian/(:segment)', 'AdminKajianController::updateIsiKajian/$1');
    $routes->delete('/deleteIsiKajian/(:segment)', 'AdminKajianController::deleteIsiKajian/$1');
    $routes->get('/previewKajian/(:segment)', 'AdminKajianController::previewKajian/$1');
    $routes->get('/tulisKajian/(:num)', 'AdminKajianController::tulisKajian/$1');
    $routes->delete('hapusKajian/(:segment)', 'AdminKajianController::deleteKajian/$1');

    // Pesan Admin
    $routes->get('/pesanAdmin', 'AdminPesanController::pesanAdmin');
    $routes->delete('hapuspesan/(:segment)', 'AdminPesanController::deletePesan/$1');

    // Penelitian
    $routes->get('/dataPenelitian', 'AdminPenelitianController::tambahPenelitian');
    $routes->post('/savePenelitian', 'AdminPenelitianController::savePenelitian');
    $routes->delete('hapusPenelitian/(:segment)', 'AdminPenelitianController::deletePenelitian/$1');
    $routes->post('updatePenelitian/(:segment)', 'AdminPenelitianController::updatePenelitian/$1');

    // Sega
    $routes->get('/sega', 'AdminSegaController::sega');
    $routes->post('/saveSega', 'AdminSegaController::saveSega');
    $routes->post('updateSega/(:segment)', 'AdminSegaController::updateSega/$1');
    $routes->delete('deleteSega/(:segment)', 'AdminSegaController::deleteSega/$1');
    $routes->get('/sega/(:segment)', 'AdminSegaController::previewSega/$1');

    // Akses Manuskrip
    $routes->get('/aksesManuskrip', 'AdminManuskripController::aksesManuskrip');
    $routes->post('/acceptedUpdate', 'AdminManuskripController::acceptedUpdate');
});

// Routes Umum untuk semua user login
$routes->group('', ['filter' => 'filterLogin'], function ($routes) {
    // Dashboard
    $routes->get('/dashboard', 'C_Dashboard::index');
    $routes->get('/dashboard2', 'C_Dashboard::grafikKoleksi');
    $routes->get('dashboard/getDataPerawatanByYear/(:num)', 'C_Dashboard::getDataPerawatanByYear/$1');

    // Profile untuk semua user login
    $routes->post('/updateProfile/(:segment)', 'C_Petugas::updateProfile/$1');
    $routes->get('/profile', 'C_Petugas::profile');
    $routes->get('profile/(:segment)', 'C_Petugas::profile/$1');
});

// Routes Admin (namespace default) - dilindungi filterAdmin
$routes->group('', ['filter' => 'filterAdmin'], function ($routes) {
    // Petugas
    $routes->get('/petugas', 'C_Petugas::index');
    $routes->get('/tambahpetugas', 'C_Petugas::formtambah');
    $routes->post('/save', 'C_Petugas::save');
    $routes->delete('hapuspetugas/(:segment)', 'C_Petugas::delete/$1');
    $routes->get('ubahpetugas/(:segment)', 'C_Petugas::edit/$1');
    $routes->post('/updatepetugas/(:segment)', 'C_Petugas::update/$1');
});

$routes->get('/halamanLogin', 'C_Login::index');

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


/// Routes Pelayanan/Pengunjung dengan filter group
$routes->group('', ['filter' => 'filterPelayanan'], function ($routes) {

    // Data Pengunjung - Core functionality
    $routes->post('/tambahPengunjung', 'C_Pengunjung::tambahPengunjung');
    $routes->get('/pengunjung', 'C_Pengunjung::index');
    $routes->post('/updatePengunjung/(:segment)', 'C_Pengunjung::updatePengunjung/$1');
    $routes->delete('deleteData/(:segment)', 'C_Pengunjung::deleteData/$1');

    // Rekapitulasi dan Statistik
    $routes->get('/rekapitulasi', 'C_Pengunjung::rekapitulasi');
    $routes->post('/rekapitulasi', 'C_Pengunjung::rekapitulasi');
    $routes->get('/statistik', 'C_Pengunjung::tampilstatistik');
    $routes->post('/statistik', 'C_Pengunjung::tampilstatistik');

    // Laporan dan Print
    $routes->get('/generate-report', 'C_Pengunjung::generateReport');
    $routes->get('/print', 'C_Pengunjung::print');
    $routes->post('/print', 'C_Pengunjung::print');
});

$routes->group('', ['filter' => 'filterPengkajian'], function ($routes) {

    // ========== INVENTARIS/KOLEKSI ==========
    // Tambah dan Edit Koleksi
    $routes->get('/tambahdata', 'C_Koleksi::tambahData');
    $routes->post('/saveData', 'C_Koleksi::saveData');
    $routes->get('ubahKoleksi/(:segment)', 'C_Koleksi::edit/$1');
    $routes->post('/updateKoleksi/(:segment)', 'C_Koleksi::update/$1');
    $routes->delete('hapus/(:segment)', 'C_Koleksi::delete/$1');

    // View dan Management Koleksi
    $routes->get('/seluruhKoleksi', 'C_Koleksi::seluruhKoleksi');
    $routes->get('/detailKoleksi', 'C_Koleksi::detailKoleksi');
    $routes->get('/detailKoleksi/(:segment)', 'C_Koleksi::detailKoleksi/$1');
    $routes->get('/terakhirDiubah/(:segment)', 'C_Koleksi::terakhirDiubah/$1');
    $routes->get('/koleksi/(:segment)', 'C_Koleksi::tampilKoleksi/$1');

    // Update dan Grafik
    $routes->post('/updateKeadaan', 'C_Koleksi::updateKeadaan');
    $routes->get('/grafikKoleksi', 'C_Koleksi::grafikKoleksi');
    $routes->get('/exportExcel', 'C_Koleksi::exportExcel');

    // ========== PERAWATAN ==========
    // Data Perawatan
    $routes->get('/dataPerawatan/(:any)', 'C_Perawatan::lihatPerawatan/$1');
    $routes->get('/tambahPerawatan/(:segment)', 'C_Perawatan::tambahPerawatan/$1');
    $routes->post('/simpanPerawatan/(:segment)', 'C_Perawatan::savePerawatan/$1');
    $routes->post('/simpanPerawatan', 'C_Perawatan::savePerawatan');
    $routes->get('/perawatan', 'C_Perawatan::perawatan');

    // Jadwal Perawatan
    $routes->get('/tambahJadwal', 'C_Perawatan::tambahJadwalPerawatan');
    $routes->post('/simpanJadwal', 'C_Perawatan::saveJadwalPerawatan');
    $routes->get('detailJadwal/(:segment)', 'C_Perawatan::detailJadwal/$1');
    $routes->post('detailJadwal/(:segment)', 'C_Perawatan::detailJadwal/$1');
    $routes->post('/updateStatus', 'C_Perawatan::updateStatus');
    $routes->delete('deleteJadwal/(:segment)', 'C_Perawatan::delete/$1');

    // Perawatan2 (Preventif, Kuratif, Restorasi)
    $routes->get('/perawatanPreventif', 'C_Perawatan2::perawatanPreventif');
    $routes->get('/perawatanKuratif', 'C_Perawatan2::perawatanKuratif');
    $routes->get('/perawatanRestorasi', 'C_Perawatan2::perawatanRestorasi');
    $routes->post('/savePerawatanPreventif', 'C_Perawatan2::savePerawatanPreventif');
    $routes->post('/savePerawatanKuratif', 'C_Perawatan2::savePerawatanKuratif');
    $routes->post('/savePerawatanRestorasi', 'C_Perawatan2::savePerawatanRestorasi');
    $routes->delete('deletePerawatan2/(:segment)', 'C_Perawatan2::delete/$1');
    $routes->post('/updatePerawatan/(:segment)', 'C_Perawatan2::updatePerawatan/$1');

    // Laporan Perawatan
    $routes->get('/laporan', 'C_Perawatan::laporan');
    $routes->post('/laporan', 'C_Perawatan::laporan');
});



//E-Tiket
$routes->get('/etiket', 'C_LandingPage::etiket');

//Sega

$routes->get('/daftarSega', 'C_LandingPage::daftarSega');

$routes->get('/audioGuide/(:segment)', 'C_LandingPage::audioGuide/$1');

$routes->group('', ['filter' => 'filterPerpustakaan'], function ($routes) {
    $routes->get('/dataBuku', 'C_Perpustakaan::index');
    $routes->post('/saveDataBuku', 'C_Perpustakaan::saveDataBuku');
    $routes->delete('deleteBuku/(:segment)', 'C_Perpustakaan::deleteBuku/$1');
    $routes->post('/updateBuku/(:segment)', 'C_Perpustakaan::updateBuku/$1');
    $routes->post('/previewKodeEksemplar', 'C_Perpustakaan::previewKodeEksemplar');
    $routes->delete('/deleteMultipleBuku', 'C_Perpustakaan::deleteMultipleBuku');
    $routes->get('/cekJudulBuku', 'C_Perpustakaan::cekJudulBuku');
    $routes->get('/getAllDataBuku', 'C_Perpustakaan::getAllDataBuku');
    $routes->get('/getFilteredDataBuku', 'C_Perpustakaan::getFilteredDataBuku');
});
// 

// Routes yang memerlukan login user publik untuk akses manuskrip
$routes->group('', ['filter' => 'filterManuskrip'], function ($routes) {
    $routes->get('/saveViews/(:num)', 'C_LandingPage::views/$1');
    $routes->get('/saveViews2/(:num)', 'C_LandingPage::views2/$1');

    // Mungkin ada routes manuskrip lainnya yang perlu login user publik:
    // $routes->get('/manuskrip', 'C_LandingPage::manuskrip');  // Jika perlu login
    // $routes->get('/manuskripKol', 'C_LandingPage::manuskripKol');  // Jika perlu login
});
