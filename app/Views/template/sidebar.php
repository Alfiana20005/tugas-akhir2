<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">

        <div class="sidebar-brand-text mx-3">
            <?= session()->get('level'); ?>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>

    </li>
    <hr class="sidebar-divider my-0">


    <!-- ADMIN -->
    <?php if (session()->get('level') == 'Admin'): ?>
        <!-- <hr class="sidebar-divider my-0"> -->
        <li class="nav-item">
            <a class="nav-link" href="/petugas">
                <i class="fas fa-fw fa-users"></i>
                <span>Daftar Hak Akses Petugas</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/strukturOrganisasi">
                <i class="fas fa-fw fa-sitemap"></i>
                <span>Struktur Organisasi</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/koleksiAdmin">
                <i class="fas fa-fw fa-archive"></i>
                <span>Koleksi</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/kajianAdmin">
                <i class="fas fa-fw fa-book-reader"></i>
                <span>Kajian</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/tambahPublikasi">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Publikasi</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/dataManuskripKol">
                <i class="fas fa-fw fa-scroll"></i>
                <span>Koleksi Manuskrip</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/dataManuskrip">
                <i class="fas fa-fw fa-file-contract"></i>
                <span>Manuskrip</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/aksesManuskrip">
                <i class="fas fa-fw fa-user-lock"></i>
                <span>Hak Akses Manuskrip</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/beritaAdmin">
                <i class="fas fa-fw fa-rss"></i>
                <span>Berita</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/tambahKegiatan">
                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Kegiatan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/pesanAdmin">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Pesan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/galleryAdmin">
                <i class="fas fa-fw fa-images"></i>
                <span>Galeri</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/sega">
                <i class="fas fa-fw fa-cube"></i>
                <span>Sega</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/dataPenelitian">
                <i class="fas fa-fw fa-search-plus"></i>
                <span>Penelitian</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/dataPameran">
                <i class="fas fa-fw fa-palette"></i>
                <span>Pameran</span></a>
        </li>

        <!-- <hr class="sidebar-divider"> -->
    <?php endif; ?>
    <!-- Divider -->


    <!-- PETUGAS PELAYANAN -->
    <?php if (session()->get('level') == 'Petugas Pelayanan'): ?>

        <!-- Heading -->
        <div class="sidebar-heading mt-3">
            Data Pengunjung
        </div>
        <li class="nav-item">
            <a class="nav-link" href="/pengunjung">
                <i class="fas fa-fw fa-database"></i>
                <span>Tambah Data Pengunjung</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/rekapitulasi">
                <i class="fas fa-fw fa-table"></i>
                <span>Rekapitulasi</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/statistik">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Statistik</span></a>
        </li>

    <?php endif; ?>




    <!-- PETUGAS PENGKAJIAN -->
    <?php if (session()->get('level') == 'Petugas Pengkajian'): ?>

        <div class="sidebar-heading mt-3">
            Inventaris Koleksi
        </div>

        <li class="nav-item">
            <a class="nav-link" href="/tambahdata">
                <i class="fas fa-fw fa-plus-circle"></i>
                <span>Tambah Data Koleksi</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/seluruhKoleksi">
                <i class="fas fa-fw fa-boxes"></i>
                <span>Seluruh Koleksi</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Inventaris Koleksi</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pilih Kategori:</h6>
                    <a class="collapse-item" href="<?= base_url("/koleksi/01"); ?>">Geologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/02"); ?>">Biologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/03"); ?>">Etnografika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/04"); ?>">Arkeologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/05"); ?>">Historika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/06"); ?>">Numismatika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/07"); ?>">Filologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/08"); ?>">Keramologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/09"); ?>">Seni Rupa</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/10"); ?>">Teknologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/11"); ?>">Lain-lain</a>

                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/perawatan">
                <i class="fas fa-fw fa-tools"></i>
                <span>Perawatan</span></a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="/laporan">
                <i class="fas fa-print fa-sm mr-2 text-gray-400"></i>
                <span>Laporan Perawatan</span></a>
        </li> -->
    <?php endif; ?>


    <!-- KETUA PENGKAJIAN -->

    <?php if (session()->get('level') == 'Ketua Pengkajian'): ?>

        <div class="sidebar-heading mt-3">
            Inventaris Koleksi
        </div>

        <li class="nav-item">
            <a class="nav-link" href="/tambahdata">
                <i class="fas fa-fw fa-plus-circle"></i>
                <span>Tambah Data Koleksi</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/seluruhKoleksi">
                <i class="fas fa-fw fa-boxes"></i>
                <span>Seluruh Koleksi</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Inventaris Koleksi</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pilih Kategori:</h6>
                    <a class="collapse-item" href="<?= base_url("/koleksi/01"); ?>">Geologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/02"); ?>">Biologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/03"); ?>">Etnografika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/04"); ?>">Arkeologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/05"); ?>">Historika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/06"); ?>">Numismatika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/07"); ?>">Filologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/08"); ?>">Keramologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/09"); ?>">Seni Rupa</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/10"); ?>">Teknologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/11"); ?>">Lain-lain</a>

                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/perawatan">
                <i class="fas fa-fw fa-tools"></i>
                <span>Perawatan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/laporan">
                <i class="fas fa-print fa-sm mr-2 text-gray-400"></i>
                <span>Laporan Perawatan</span></a>
        </li>
    <?php endif; ?>

    <?php if (session()->get('level') == 'Kepala Museum'): ?>
        <!-- <hr class="sidebar-divider my-0"> -->

        <li class="nav-item">
            <a class="nav-link" href="/petugas">
                <i class="fas fa-fw fa-users"></i>
                <span>Daftar Hak Akses Petugas</span></a>
        </li>

        <div class="sidebar-heading mt-3">
            Landing Page
        </div>
        <li class="nav-item">
            <a class="nav-link" href="/strukturOrganisasi">
                <i class="fas fa-fw fa-sitemap"></i>
                <span>Struktur Organisasi</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/koleksiAdmin">
                <i class="fas fa-fw fa-archive"></i>
                <span>Koleksi</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/kajianAdmin">
                <i class="fas fa-fw fa-book-reader"></i>
                <span>Kajian</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/tambahPublikasi">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Publikasi</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/beritaAdmin">
                <i class="fas fa-fw fa-rss"></i>
                <span>Berita</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/tambahKegiatan">
                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Kegiatan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/pesanAdmin">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Pesan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/galleryAdmin">
                <i class="fas fa-fw fa-images"></i>
                <span>Galeri</span></a>
        </li>
        <!-- <li class="nav-item">
        <a class="nav-link" href="/petugas">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Petugas</span></a>
    </li> -->
        <div class="sidebar-heading mt-3">
            Pengunjung
        </div>
        <li class="nav-item">
            <a class="nav-link" href="/statistik">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Statistik Pengunjung</span></a>
        </li>
        <div class="sidebar-heading mt-3">
            Koleksi
        </div>
        <li class="nav-item">
            <a class="nav-link" href="/seluruhKoleksi">
                <i class="fas fa-fw fa-boxes"></i>
                <span>Seluruh Koleksi</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Inventaris Koleksi</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pilih Kategori:</h6>
                    <a class="collapse-item" href="<?= base_url("/koleksi/01"); ?>">Geologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/02"); ?>">Biologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/03"); ?>">Etnografika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/04"); ?>">Arkeologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/05"); ?>">Historika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/06"); ?>">Numismatika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/07"); ?>">Filologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/08"); ?>">Keramologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/09"); ?>">Seni Rupa</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/10"); ?>">Teknologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/11"); ?>">Lain-lain</a>

                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/perawatan">
                <i class="fas fa-fw fa-tools"></i>
                <span>Perawatan</span></a>
        </li>

        <div class="sidebar-heading mt-3">
            Perpustakaan
        </div>

        <li class="nav-item">
            <a class="nav-link" href="/inputData">
                <i class="fas fa-fw fa-book"></i>
                <span>Data Buku</span></a>
        </li>
        <!-- <hr class="sidebar-divider"> -->
    <?php endif; ?>


    <!-- ADMIN/Pengkajian -->
    <?php if (session()->get('level') == 'Admin/Pengkajian'): ?>
        <!-- <hr class="sidebar-divider my-0"> -->
        <li class="nav-item">
            <a class="nav-link" href="/petugas">
                <i class="fas fa-fw fa-users"></i>
                <span>Daftar Hak Akses Petugas</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/strukturOrganisasi">
                <i class="fas fa-fw fa-sitemap"></i>
                <span>Struktur Organisasi</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/koleksiAdmin">
                <i class="fas fa-fw fa-archive"></i>
                <span>Koleksi</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/kajianAdmin">
                <i class="fas fa-fw fa-book-reader"></i>
                <span>Kajian</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/tambahPublikasi">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Publikasi</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/beritaAdmin">
                <i class="fas fa-fw fa-rss"></i>
                <span>Berita</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/tambahKegiatan">
                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Kegiatan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/pesanAdmin">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Pesan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/galleryAdmin">
                <i class="fas fa-fw fa-images"></i>
                <span>Galeri</span></a>
        </li>
        <hr class="sidebar-divider">

        <div class="sidebar-heading mt-3">
            Inventaris Koleksi
        </div>

        <li class="nav-item">
            <a class="nav-link" href="/tambahdata">
                <i class="fas fa-fw fa-plus-circle"></i>
                <span>Tambah Data Koleksi</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/seluruhKoleksi">
                <i class="fas fa-fw fa-boxes"></i>
                <span>Seluruh Koleksi</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Kategori Koleksi</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pilih Kategori:</h6>
                    <a class="collapse-item" href="<?= base_url("/koleksi/01"); ?>">Geologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/02"); ?>">Biologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/03"); ?>">Etnografika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/04"); ?>">Arkeologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/05"); ?>">Historika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/06"); ?>">Numismatika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/07"); ?>">Filologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/08"); ?>">Keramologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/09"); ?>">Seni Rupa</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/10"); ?>">Teknologika</a>
                    <a class="collapse-item" href="<?= base_url("/koleksi/11"); ?>">Lain-lain</a>

                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/perawatan">
                <i class="fas fa-fw fa-tools"></i>
                <span>Perawatan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/laporan">
                <i class="fas fa-print fa-sm mr-2 text-gray-400"></i>
                <span>Laporan Perawatan</span></a>
        </li>
    <?php endif; ?>
    <!-- Divider -->


    <!-- ADMIN/Pelayanan -->
    <?php if (session()->get('level') == 'Admin/Pelayanan'): ?>
        <!-- <hr class="sidebar-divider my-0"> -->
        <li class="nav-item">
            <a class="nav-link" href="/petugas">
                <i class="fas fa-fw fa-users"></i>
                <span>Daftar Hak Akses Petugas</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/strukturOrganisasi">
                <i class="fas fa-fw fa-sitemap"></i>
                <span>Struktur Organisasi</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/koleksiAdmin">
                <i class="fas fa-fw fa-archive"></i>
                <span>Koleksi</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/kajianAdmin">
                <i class="fas fa-fw fa-book-reader"></i>
                <span>Kajian</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/tambahPublikasi">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Publikasi</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/beritaAdmin">
                <i class="fas fa-fw fa-rss"></i>
                <span>Berita</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/tambahKegiatan">
                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Kegiatan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/pesanAdmin">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Pesan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/galleryAdmin">
                <i class="fas fa-fw fa-images"></i>
                <span>Galeri</span></a>
        </li>
        <hr class="sidebar-divider">

        <div class="sidebar-heading mt-3">
            Data Pengunjung
        </div>
        <li class="nav-item">
            <a class="nav-link" href="/pengunjung">
                <i class="fas fa-fw fa-database"></i>
                <span>Tambah Data Pengunjung</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/rekapitulasi">
                <i class="fas fa-fw fa-table"></i>
                <span>Rekapitulasi</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/statistik">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Statistik</span></a>
        </li>




    <?php endif; ?>
    <!-- Divider -->


    <?php if (session()->get('level') == 'Perpustakaan'): ?>

        <li class="nav-item">
            <a class="nav-link" href="/dataBuku">
                <i class="fas fa-fw fa-book"></i>
                <span>Data Buku</span></a>
        </li>


    <?php endif; ?>



    <hr class="sidebar-divider">



    <!-- Divider -->


    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Logout
    </div> -->

    <!-- Nav Item - Charts -->


    <!-- Nav Item - Tables -->


    <!-- Divider -->
    <!-- <hr class="sidebar-divider d-none d-md-block"> -->

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>