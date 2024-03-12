<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        
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
            <span>Master Petugas</span></a>
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
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tambah Data Koleksi</span></a>
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
                <a class="collapse-item" href="<?= base_url("/koleksi/01"); ?>">Arkeologika</a>
                <a class="collapse-item" href="<?= base_url("/koleksi/02"); ?>">Biologika</a>
                <a class="collapse-item" href="<?= base_url("/koleksi/03"); ?>">Etnografika</a>
                <a class="collapse-item" href="<?= base_url("/koleksi/04"); ?>">Filologika</a>
                <a class="collapse-item" href="<?= base_url("/koleksi/05"); ?>">Geologika</a>
                <a class="collapse-item" href="<?= base_url("/koleksi/06"); ?>">Historika</a>
                <a class="collapse-item" href="<?= base_url("/koleksi/07"); ?>">Kramologika</a>
                <a class="collapse-item" href="<?= base_url("/koleksi/08"); ?>">Numismatika</a>
                <a class="collapse-item" href="<?= base_url("/koleksi/09"); ?>">Seni Rupa</a>
                <a class="collapse-item" href="<?= base_url("/koleksi/10"); ?>">Teknologika</a>
            
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/petugas">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Perawatan</span></a>
    </li>
    <?php endif; ?>


    <!-- KETUA PENGKAJIAN -->
    <?php if (session()->get('level') == 'Ketua Pengkajian'): ?>
    <div class="sidebar-heading mt-3">
        Inventaris Koleksi
    </div>

    <li class="nav-item">
        <a class="nav-link" href="/petugas">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tambah Data Koleksi</span></a>
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
                <a class="collapse-item" href="<?= base_url("/koleksi/01"); ?>">Arkeologika</a>
                <a class="collapse-item" href="<?= base_url("/koleksi/02"); ?>">Biologika</a>
                <a class="collapse-item" href="<?= base_url("/koleksi/03"); ?>">Etnografika</a>
                <a class="collapse-item" href="<?= base_url("/koleksi/04"); ?>">Filologika</a>
                <a class="collapse-item" href="<?= base_url("/koleksi/05"); ?>">Geologika</a>
                <a class="collapse-item" href="<?= base_url("/koleksi/06"); ?>">Historika</a>
                <a class="collapse-item" href="<?= base_url("/koleksi/07"); ?>">Kramologika</a>
                <a class="collapse-item" href="<?= base_url("/koleksi/08"); ?>">Numismatika</a>
                <a class="collapse-item" href="<?= base_url("/koleksi/09"); ?>">Seni Rupa</a>
                <a class="collapse-item" href="<?= base_url("/koleksi/10"); ?>">Teknologika</a>
            
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/petugas">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Perawatan</span></a>
    </li>
    <?php endif; ?>

    <?php if (session()->get('level') == 'Kepala Museum'): ?>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="/petugas">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Petugas</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/statistik">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Statistik</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/grafikKoleksi">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Grafik Koleksi</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/petugas">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Perawatan</span></a>
    </li>
    <!-- <hr class="sidebar-divider"> -->
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