<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Landing Page
$routes->get('/', 'C_LandingPage::home', ['as' => 'home']);
$routes->get('/sejarah', 'C_LandingPage::sejarah', ['as' => 'sejarah']);
$routes->get('/visimisi', 'C_LandingPage::visiMisi', ['as' => 'visi.misi']);
$routes->get('/struktur', 'C_LandingPage::struktur', ['as' => 'struktur']);
$routes->get('/ruangPamer', 'C_LandingPage::ruangPamer', ['as' => 'ruang.pamer']);
$routes->get('/tatatertib', 'C_LandingPage::tatatertib', ['as' => 'tata.tertib']);
$routes->get('/berita', 'C_LandingPage::berita', ['as' => 'berita']);
$routes->get('/lihatberita', 'C_LandingPage::lihatberita', ['as' => 'berita.list']);
$routes->get('/berita/(:segment)', 'C_LandingPage::lihatberita/$1', ['as' => 'berita.show']);

// Route untuk generate slug (jalankan sekali saja, lalu hapus)
$routes->get('/generate-slugs', 'C_LandingPage::generateSlugsForExisting', ['as' => 'generate.slugs']);

// Route untuk backward compatibility (redirect ID lama ke slug)
$routes->get('/berita-id/(:num)', 'C_LandingPage::redirectToSlug/$1', ['as' => 'berita.redirect']);

$routes->get('/kegiatan', 'C_LandingPage::kegiatan', ['as' => 'kegiatan']);
$routes->get('/lihatKegiatan', 'C_LandingPage::lihatKegiatan', ['as' => 'kegiatan.list']);
$routes->get('/lihatKegiatan/(:segment)', 'C_LandingPage::lihatKegiatan/$1', ['as' => 'kegiatan.show']);
$routes->get('/kajian', 'C_LandingPage::kajian', ['as' => 'kajian']);
$routes->get('/kajianKategori/(:segment)', 'C_LandingPage::kajianKategori/$1', ['as' => 'kajian.category']);
$routes->get('/tulisan', 'C_LandingPage::tulisan', ['as' => 'tulisan']);
$routes->get('/tulisan/(:segment)', 'C_LandingPage::tulisan/$1', ['as' => 'tulisan.show']);

$routes->get('/koleksi_page', 'C_LandingPage::koleksi_page', ['as' => 'koleksi.page']);
$routes->get('/koleksi_detail', 'C_LandingPage::koleksi_detail', ['as' => 'koleksi.detail']);
$routes->get('/koleksi_detail/(:segment)', 'C_LandingPage::koleksi_detail/$1', ['as' => 'koleksi.detail.show']);
$routes->get('/publikasi', 'C_LandingPage::publikasi', ['as' => 'publikasi']);
$routes->get('/perpustakaan', 'C_LandingPage::perpustakaan', ['as' => 'perpustakaan']);
$routes->get('/penelitian', 'C_LandingPage::penelitian', ['as' => 'penelitian']);

//Home Alternative Routes
$routes->get('/home', 'C_LandingPage::home', ['as' => 'home.alt']);
$routes->get('/sejarah2', 'C_LandingPage::sejarah2', ['as' => 'sejarah.v2']);
$routes->get('/visimisi2', 'C_LandingPage::visiMisi2', ['as' => 'visi.misi.v2']);
$routes->get('/struktur2', 'C_LandingPage::struktur2', ['as' => 'struktur.v2']);
$routes->get('/ruangPamer2', 'C_LandingPage::ruangPamer2', ['as' => 'ruang.pamer.v2']);
$routes->get('/tatatertib2', 'C_LandingPage::tatatertib2', ['as' => 'tata.tertib.v2']);

$routes->get('/berita/kategori/(:segment)', 'C_LandingPage::beritaKategori2/$1', ['as' => 'berita.category.v2']);

$routes->get('/kegiatan2', 'C_LandingPage::kegiatan2', ['as' => 'kegiatan.v2']);
$routes->get('/lihatKegiatan2', 'C_LandingPage::lihatKegiatan2', ['as' => 'kegiatan.list.v2']);
$routes->get('/lihatKegiatan2/(:segment)', 'C_LandingPage::lihatKegiatan2/$1', ['as' => 'kegiatan.show.v2']);
$routes->get('/kegiatanKategori2/(:segment)', 'C_LandingPage::kegiatanKategori2/$1', ['as' => 'kegiatan.category.v2']);

$routes->get('/kajian2', 'C_LandingPage::kajian2', ['as' => 'kajian.v2']);
$routes->get('/kajianKategori2/(:segment)', 'C_LandingPage::kajianKategori2/$1', ['as' => 'kajian.category.v2']);
$routes->get('/tulisan2', 'C_LandingPage::tulisan', ['as' => 'tulisan.v2']);
$routes->get('/tulisan2/(:segment)', 'C_LandingPage::tulisan2/$1', ['as' => 'tulisan.show.v2']);

// Manuskrip
$routes->get('/manuskripKol', 'C_LandingPage::manuskripKol', ['as' => 'manuskrip.koleksi']);
$routes->get('/manuskrip', 'C_LandingPage::manuskrip', ['as' => 'manuskrip']);
$routes->get('/manuskripLogin', 'C_LandingPage::manuskripLogin', ['as' => 'manuskrip.login']);

// Koleksi
$routes->get('/koleksi', 'C_LandingPage::koleksi_page2', ['as' => 'koleksi']);
$routes->get('/koleksi_kategori/(:segment)', 'C_LandingPage::koleksi_kategori/$1', ['as' => 'koleksi.category']);
$routes->get('/koleksi_detail2', 'C_LandingPage::koleksi_detail2', ['as' => 'koleksi.detail.v2']);
$routes->get('/koleksi_detail2/(:segment)', 'C_LandingPage::koleksi_detail2/$1', ['as' => 'koleksi.detail.show.v2']);

// Publikasi dan Perpustakaan
$routes->get('/publikasi2', 'C_LandingPage::publikasi2', ['as' => 'publikasi.v2']);
$routes->get('/publikasi2_detail/(:num)', 'C_LandingPage::publikasi2_detail/$1', ['as' => 'publikasi.detail.v2']);
$routes->get('/perpustakaan2', 'C_LandingPage::perpustakaan2', ['as' => 'perpustakaan.v2']);
$routes->get('/detailBuku/(:segment)', 'C_LandingPage::detailBuku/$1', ['as' => 'buku.detail']);

// Kontak dan Pesan
$routes->get('/kontak', 'C_LandingPage::kontak', ['as' => 'kontak']);
$routes->post('/pesanUser', 'C_LandingPage::pesanUser', ['as' => 'pesan.user.store']);
$routes->get('/pesanUser', 'C_LandingPage::pesanUser', ['as' => 'pesan.user']);

// Info Pages
$routes->get('/semuaPetugas', 'C_LandingPage::semuaPetugas', ['as' => 'petugas.all']);
$routes->get('/sekardiyu', 'C_LandingPage::sekardiyu', ['as' => 'sekardiyu']);
$routes->get('/rencanaStrategis', 'C_LandingPage::rencanaStrategis', ['as' => 'rencana.strategis']);

// ========== ADMIN ROUTES ==========
$routes->group('admin', ['filter' => 'filterAdmin', 'namespace' => 'App\Controllers'], function ($routes) {

    // Struktur Organisasi & Petugas Museum
    $routes->get('struktur-organisasi', 'C_Admin::strukturOrganisasi', ['as' => 'admin.struktur']);
    $routes->post('petugas-museum', 'C_Admin::petugasMuseum', ['as' => 'admin.petugas.store']);
    $routes->post('update-karyawan/(:segment)', 'C_Admin::updateKaryawan/$1', ['as' => 'admin.karyawan.update']);
    $routes->delete('hapus-organisasi/(:segment)', 'C_Admin::hapusOrganisasi/$1', ['as' => 'admin.organisasi.delete']);

    // Berita Admin
    $routes->get('berita', 'C_Admin::berita', ['as' => 'admin.berita']);
    $routes->get('berita/tambah', 'C_Admin::tambahBerita', ['as' => 'admin.berita.create']);
    $routes->post('berita/simpan', 'C_Admin::save', ['as' => 'admin.berita.store']);
    $routes->delete('berita/hapus/(:segment)', 'C_Admin::deleteBerita/$1', ['as' => 'admin.berita.delete']);
    $routes->post('berita/update/(:segment)', 'C_Admin::updateBerita/$1', ['as' => 'admin.berita.update']);

    // Kegiatan
    $routes->get('kegiatan/tambah', 'C_Admin::tambahKegiatan', ['as' => 'admin.kegiatan.create']);
    $routes->post('kegiatan/simpan', 'C_Admin::saveKegiatan', ['as' => 'admin.kegiatan.store']);
    $routes->delete('kegiatan/hapus/(:segment)', 'C_Admin::deleteKegiatan/$1', ['as' => 'admin.kegiatan.delete']);
    $routes->post('kegiatan/update/(:segment)', 'C_Admin::updateKegiatan/$1', ['as' => 'admin.kegiatan.update']);

    // Publikasi
    $routes->get('publikasi/tambah', 'C_Admin::tambahPublikasi', ['as' => 'admin.publikasi.create']);
    $routes->post('publikasi/simpan', 'C_Admin::savePublikasi', ['as' => 'admin.publikasi.store']);
    $routes->delete('publikasi/hapus/(:segment)', 'C_Admin::deletePublikasi/$1', ['as' => 'admin.publikasi.delete']);
    $routes->post('publikasi/update/(:segment)', 'C_Admin::updatePublikasi/$1', ['as' => 'admin.publikasi.update']);

    // Manuskrip Koleksi
    $routes->get('manuskrip-koleksi', 'C_Admin::dataManuskripKol', ['as' => 'admin.manuskrip.koleksi']);
    $routes->post('manuskrip-koleksi/simpan', 'C_Admin::saveManuskripKol', ['as' => 'admin.manuskrip.koleksi.store']);
    $routes->delete('manuskrip-koleksi/hapus/(:segment)', 'C_Admin::deleteManuskripKol/$1', ['as' => 'admin.manuskrip.koleksi.delete']);
    $routes->post('manuskrip-koleksi/update/(:segment)', 'C_Admin::updateManuskripKol/$1', ['as' => 'admin.manuskrip.koleksi.update']);

    // Manuskrip
    $routes->get('manuskrip', 'C_Admin::dataManuskrip', ['as' => 'admin.manuskrip']);
    $routes->post('manuskrip/simpan', 'C_Admin::saveManuskrip', ['as' => 'admin.manuskrip.store']);
    $routes->delete('manuskrip/hapus/(:segment)', 'C_Admin::deleteManuskrip/$1', ['as' => 'admin.manuskrip.delete']);
    $routes->post('manuskrip/update/(:segment)', 'C_Admin::updateManuskrip/$1', ['as' => 'admin.manuskrip.update']);

    // Koleksi Admin
    $routes->get('koleksi', 'C_Admin::koleksiAdmin', ['as' => 'admin.koleksi']);
    $routes->post('koleksi/simpan', 'C_Admin::saveKoleksi', ['as' => 'admin.koleksi.store']);
    $routes->delete('koleksi/hapus/(:segment)', 'C_Admin::deleteKoleksi/$1', ['as' => 'admin.koleksi.delete']);
    $routes->post('koleksi/update/(:segment)', 'C_Admin::updateKoleksiAdmin/$1', ['as' => 'admin.koleksi.update']);

    // Gallery Admin
    $routes->get('gallery', 'C_Admin::galleryAdmin', ['as' => 'admin.gallery']);
    $routes->post('gallery/simpan', 'C_Admin::saveGallery', ['as' => 'admin.gallery.store']);
    $routes->post('gallery/update/(:segment)', 'C_Admin::updateGallery/$1', ['as' => 'admin.gallery.update']);
    $routes->delete('gallery/hapus/(:segment)', 'C_Admin::deleteGallery/$1', ['as' => 'admin.gallery.delete']);

    // Kajian Admin
    $routes->get('kajian', 'C_Admin::kajianAdmin', ['as' => 'admin.kajian']);
    $routes->get('kajian/tulis', 'C_Admin::tulisKajian', ['as' => 'admin.kajian.create']);
    $routes->get('kajian/tulis/(:segment)', 'C_Admin::tulisKajian/$1', ['as' => 'admin.kajian.edit']);
    $routes->post('kajian/simpan', 'C_Admin::saveKajian', ['as' => 'admin.kajian.store']);
    $routes->post('kajian/add-section', 'C_Admin::addSection', ['as' => 'admin.kajian.add.section']);
    $routes->post('kajian/simpan-isi', 'C_Admin::saveIsiKajian', ['as' => 'admin.kajian.content.store']);
    $routes->get('kajian/preview/(:segment)', 'C_Admin::previewKajian/$1', ['as' => 'admin.kajian.preview']);
    $routes->delete('kajian/hapus/(:segment)', 'C_Admin::deleteKajian/$1', ['as' => 'admin.kajian.delete']);

    // Pesan Admin
    $routes->get('pesan', 'C_Admin::pesanAdmin', ['as' => 'admin.pesan']);
    $routes->delete('pesan/hapus/(:segment)', 'C_Admin::deletePesan/$1', ['as' => 'admin.pesan.delete']);

    // Penelitian
    $routes->get('penelitian', 'C_Admin::tambahPenelitian', ['as' => 'admin.penelitian']);
    $routes->post('penelitian/simpan', 'C_Admin::savePenelitian', ['as' => 'admin.penelitian.store']);
    $routes->delete('penelitian/hapus/(:segment)', 'C_Admin::deletePenelitian/$1', ['as' => 'admin.penelitian.delete']);
    $routes->post('penelitian/update/(:segment)', 'C_Admin::updatePenelitian/$1', ['as' => 'admin.penelitian.update']);

    // Sega
    $routes->get('sega', 'C_Admin::sega', ['as' => 'admin.sega']);
    $routes->post('sega/simpan', 'C_Admin::saveSega', ['as' => 'admin.sega.store']);
    $routes->get('sega/preview/(:segment)', 'C_Admin::previewSega/$1', ['as' => 'admin.sega.preview']);
    $routes->delete('sega/hapus/(:segment)', 'C_Admin::deleteSega/$1', ['as' => 'admin.sega.delete']);

    // Akses Manuskrip
    $routes->get('akses-manuskrip', 'C_Admin::aksesManuskrip', ['as' => 'admin.akses.manuskrip']);
    $routes->post('accepted-update', 'C_Admin::acceptedUpdate', ['as' => 'admin.accepted.update']);

    // Petugas Management
    $routes->get('petugas', 'C_Petugas::index', ['as' => 'admin.petugas']);
    $routes->get('petugas/tambah', 'C_Petugas::formtambah', ['as' => 'admin.petugas.create']);
    $routes->post('petugas/simpan', 'C_Petugas::save', ['as' => 'admin.petugas.store']);
    $routes->delete('petugas/hapus/(:segment)', 'C_Petugas::delete/$1', ['as' => 'admin.petugas.delete']);
    $routes->get('petugas/ubah/(:segment)', 'C_Petugas::edit/$1', ['as' => 'admin.petugas.edit']);
    $routes->post('petugas/update/(:segment)', 'C_Petugas::update/$1', ['as' => 'admin.petugas.update']);
    $routes->post('petugas/update-profile/(:segment)', 'C_Petugas::updateProfile/$1', ['as' => 'admin.petugas.profile.update']);
    $routes->get('profile', 'C_Petugas::profile', ['as' => 'admin.profile']);
    $routes->get('profile/(:segment)', 'C_Petugas::profile/$1', ['as' => 'admin.profile.show']);
});

// ========== AUTHENTICATION ==========
$routes->get('/halaman-login', 'C_Login::index', ['as' => 'login.page']);
$routes->get('/dashboard', 'C_Dashboard::index', ['as' => 'dashboard']);
$routes->get('/dashboard2', 'C_Dashboard::grafikKoleksi', ['as' => 'dashboard.grafik']);
$routes->get('dashboard/get-data-perawatan/(:num)', 'C_Dashboard::getDataPerawatanByYear/$1', ['as' => 'dashboard.perawatan.data']);

// Login & Logout
$routes->post('/login', 'C_Login::login', ['as' => 'auth.login']);
$routes->get('/login', 'C_Login::login', ['as' => 'auth.login.get']);
$routes->post('/login-user', 'C_User::loginUser', ['as' => 'user.login']);
$routes->get('/login-user', 'C_User::loginUser', ['as' => 'user.login.get']);
$routes->post('/register-user', 'C_User::registerUser', ['as' => 'user.register']);
$routes->get('/logout', 'C_Login::logout', ['as' => 'auth.logout']);
$routes->get('/logout-user', 'C_User::logoutUser', ['as' => 'user.logout']);
$routes->get('/form-login', 'C_User::index', ['as' => 'user.form.login']);

// Filter
$routes->get('/sidebar', 'C_Dashboard::akses', ['as' => 'sidebar']);

// ========== PELAYANAN/PENGUNJUNG ROUTES ==========
$routes->group('pelayanan', ['filter' => 'filterPelayanan', 'namespace' => 'App\Controllers'], function ($routes) {

    // Data Pengunjung - Core functionality
    $routes->post('pengunjung/tambah', 'C_Pengunjung::tambahPengunjung', ['as' => 'pelayanan.pengunjung.store']);
    $routes->get('pengunjung', 'C_Pengunjung::index', ['as' => 'pelayanan.pengunjung']);
    $routes->post('pengunjung/update/(:segment)', 'C_Pengunjung::updatePengunjung/$1', ['as' => 'pelayanan.pengunjung.update']);
    $routes->delete('pengunjung/hapus/(:segment)', 'C_Pengunjung::deleteData/$1', ['as' => 'pelayanan.pengunjung.delete']);

    // Rekapitulasi dan Statistik
    $routes->get('rekapitulasi', 'C_Pengunjung::rekapitulasi', ['as' => 'pelayanan.rekapitulasi']);
    $routes->post('rekapitulasi', 'C_Pengunjung::rekapitulasi', ['as' => 'pelayanan.rekapitulasi.post']);
    $routes->get('statistik', 'C_Pengunjung::tampilstatistik', ['as' => 'pelayanan.statistik']);
    $routes->post('statistik', 'C_Pengunjung::tampilstatistik', ['as' => 'pelayanan.statistik.post']);

    // Laporan dan Print
    $routes->get('generate-report', 'C_Pengunjung::generateReport', ['as' => 'pelayanan.report.generate']);
    $routes->get('print', 'C_Pengunjung::print', ['as' => 'pelayanan.print']);
    $routes->post('print', 'C_Pengunjung::print', ['as' => 'pelayanan.print.post']);
});

// ========== PENGKAJIAN ROUTES ==========
$routes->group('pengkajian', ['filter' => 'filterPengkajian', 'namespace' => 'App\Controllers'], function ($routes) {

    // ========== INVENTARIS/KOLEKSI ==========
    // Tambah dan Edit Koleksi
    $routes->get('koleksi/tambah', 'C_Koleksi::tambahData', ['as' => 'pengkajian.koleksi.create']);
    $routes->post('koleksi/simpan', 'C_Koleksi::saveData', ['as' => 'pengkajian.koleksi.store']);
    $routes->get('koleksi/ubah/(:segment)', 'C_Koleksi::edit/$1', ['as' => 'pengkajian.koleksi.edit']);
    $routes->post('koleksi/update/(:segment)', 'C_Koleksi::update/$1', ['as' => 'pengkajian.koleksi.update']);
    $routes->delete('koleksi/hapus/(:segment)', 'C_Koleksi::delete/$1', ['as' => 'pengkajian.koleksi.delete']);

    // View dan Management Koleksi
    $routes->get('koleksi', 'C_Koleksi::seluruhKoleksi', ['as' => 'pengkajian.koleksi']);
    $routes->get('koleksi/detail', 'C_Koleksi::detailKoleksi', ['as' => 'pengkajian.koleksi.detail']);
    $routes->get('koleksi/detail/(:segment)', 'C_Koleksi::detailKoleksi/$1', ['as' => 'pengkajian.koleksi.detail.show']);
    $routes->get('koleksi/terakhir-diubah/(:segment)', 'C_Koleksi::terakhirDiubah/$1', ['as' => 'pengkajian.koleksi.last.modified']);
    $routes->get('koleksi/tampil/(:segment)', 'C_Koleksi::tampilKoleksi/$1', ['as' => 'pengkajian.koleksi.show']);

    // Update dan Export
    $routes->post('koleksi/update-keadaan', 'C_Koleksi::updateKeadaan', ['as' => 'pengkajian.koleksi.update.kondisi']);
    $routes->get('koleksi/grafik', 'C_Koleksi::grafikKoleksi', ['as' => 'pengkajian.koleksi.grafik']);
    $routes->get('koleksi/export-excel', 'C_Koleksi::exportExcel', ['as' => 'pengkajian.koleksi.export']);

    // ========== PERAWATAN ==========
    // Data Perawatan
    $routes->get('perawatan/data/(:any)', 'C_Perawatan::lihatPerawatan/$1', ['as' => 'pengkajian.perawatan.data']);
    $routes->get('perawatan/tambah/(:segment)', 'C_Perawatan::tambahPerawatan/$1', ['as' => 'pengkajian.perawatan.create']);
    $routes->post('perawatan/simpan/(:segment)', 'C_Perawatan::savePerawatan/$1', ['as' => 'pengkajian.perawatan.store.with.param']);
    $routes->post('perawatan/simpan', 'C_Perawatan::savePerawatan', ['as' => 'pengkajian.perawatan.store']);
    $routes->get('perawatan', 'C_Perawatan::perawatan', ['as' => 'pengkajian.perawatan']);

    // Jadwal Perawatan
    $routes->get('jadwal/tambah', 'C_Perawatan::tambahJadwalPerawatan', ['as' => 'pengkajian.jadwal.create']);
    $routes->post('jadwal/simpan', 'C_Perawatan::saveJadwalPerawatan', ['as' => 'pengkajian.jadwal.store']);
    $routes->get('jadwal/detail/(:segment)', 'C_Perawatan::detailJadwal/$1', ['as' => 'pengkajian.jadwal.detail']);
    $routes->post('jadwal/detail/(:segment)', 'C_Perawatan::detailJadwal/$1', ['as' => 'pengkajian.jadwal.detail.post']);
    $routes->post('jadwal/update-status', 'C_Perawatan::updateStatus', ['as' => 'pengkajian.jadwal.update.status']);
    $routes->delete('jadwal/hapus/(:segment)', 'C_Perawatan::delete/$1', ['as' => 'pengkajian.jadwal.delete']);

    // Perawatan2 (Preventif, Kuratif, Restorasi)
    $routes->get('perawatan/preventif', 'C_Perawatan2::perawatanPreventif', ['as' => 'pengkajian.perawatan.preventif']);
    $routes->get('perawatan/kuratif', 'C_Perawatan2::perawatanKuratif', ['as' => 'pengkajian.perawatan.kuratif']);
    $routes->get('perawatan/restorasi', 'C_Perawatan2::perawatanRestorasi', ['as' => 'pengkajian.perawatan.restorasi']);
    $routes->post('perawatan/simpan-preventif', 'C_Perawatan2::savePerawatanPreventif', ['as' => 'pengkajian.perawatan.preventif.store']);
    $routes->post('perawatan/simpan-kuratif', 'C_Perawatan2::savePerawatanKuratif', ['as' => 'pengkajian.perawatan.kuratif.store']);
    $routes->post('perawatan/simpan-restorasi', 'C_Perawatan2::savePerawatanRestorasi', ['as' => 'pengkajian.perawatan.restorasi.store']);
    $routes->delete('perawatan/hapus/(:segment)', 'C_Perawatan2::delete/$1', ['as' => 'pengkajian.perawatan2.delete']);
    $routes->post('perawatan/update/(:segment)', 'C_Perawatan2::updatePerawatan/$1', ['as' => 'pengkajian.perawatan2.update']);

    // Laporan Perawatan
    $routes->get('laporan', 'C_Perawatan::laporan', ['as' => 'pengkajian.laporan']);
    $routes->post('laporan', 'C_Perawatan::laporan', ['as' => 'pengkajian.laporan.post']);
});

// ========== E-TIKET & SEGA ==========
$routes->get('/e-tiket', 'C_LandingPage::etiket', ['as' => 'etiket']);
$routes->get('/daftar-sega', 'C_LandingPage::daftarSega', ['as' => 'sega.list']);
$routes->get('/audio-guide/(:segment)', 'C_LandingPage::audioGuide/$1', ['as' => 'audio.guide']);

// ========== PERPUSTAKAAN ROUTES ==========
$routes->group('perpustakaan', ['filter' => 'filterPerpustakaan', 'namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('data-buku', 'C_Perpustakaan::index', ['as' => 'perpustakaan.buku']);
    $routes->post('buku/simpan', 'C_Perpustakaan::saveDataBuku', ['as' => 'perpustakaan.buku.store']);
    $routes->delete('buku/hapus/(:segment)', 'C_Perpustakaan::deleteBuku/$1', ['as' => 'perpustakaan.buku.delete']);
    $routes->post('buku/update/(:segment)', 'C_Perpustakaan::updateBuku/$1', ['as' => 'perpustakaan.buku.update']);
    $routes->post('preview-kode-eksemplar', 'C_Perpustakaan::previewKodeEksemplar', ['as' => 'perpustakaan.preview.kode']);
    $routes->delete('buku/hapus-multiple', 'C_Perpustakaan::deleteMultipleBuku', ['as' => 'perpustakaan.buku.delete.multiple']);
    $routes->get('cek-judul-buku', 'C_Perpustakaan::cekJudulBuku', ['as' => 'perpustakaan.cek.judul']);
});

// ========== MANUSKRIP USER ROUTES ==========
// Routes yang memerlukan login user publik untuk akses manuskrip
$routes->group('user', ['filter' => 'filterManuskrip', 'namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('views/(:num)', 'C_LandingPage::views/$1', ['as' => 'user.views']);
    $routes->get('views2/(:num)', 'C_LandingPage::views2/$1', ['as' => 'user.views.v2']);

    // Tambahan routes manuskrip yang memerlukan login user:
    // $routes->get('manuskrip', 'C_LandingPage::manuskrip', ['as' => 'user.manuskrip']);
    // $routes->get('manuskrip-koleksi', 'C_LandingPage::manuskripKol', ['as' => 'user.manuskrip.koleksi']);
});
