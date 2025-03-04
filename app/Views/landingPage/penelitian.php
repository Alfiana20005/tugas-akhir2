<?= $this->extend('landingPage/template baru'); ?>

<?= $this->section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Publikasi Penelitian
                </h1>
                <p class="text-white link-nav"><a href="/home">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="/penelitian"> Publikasi Penelitian</a></p>
            </div>
        </div>
    </div>
</section>

<!-- Start penelitian list Area -->
<section class="post-content-area single-post-area">
    <div class="container">
        <div class="row">
            <!-- Main Content (Research List) -->
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="blog-info">
                        <h2 class="mb-4 fs-1">Daftar Penelitian</h2>
                    </div>

                    <!-- Active Filters Display -->
                    <?php if (!empty($_GET['instansi']) || !empty($_GET['kategori_objek']) || !empty($_GET['tahun'])): ?>
                        <div class="active-filters mb-4">
                            <h5>Filter Aktif:</h5>
                            <div class="d-flex flex-wrap">
                                <?php if (!empty($_GET['kategori_objek'])): ?>
                                    <a href="<?= remove_url_param(current_url(), 'kategori_objek'); ?>" class="badge badge-primary p-2 text-white mr-2 mb-2 text-decoration-none">
                                        Kategori: <?= $_GET['kategori_objek']; ?> <i class="fas fa-times-circle"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if (!empty($_GET['instansi'])): ?>
                                    <a href="<?= remove_url_param(current_url(), 'instansi'); ?>" class="badge badge-primary p-2 text-white mr-2 mb-2 text-decoration-none">
                                        Instansi: <?= $_GET['instansi']; ?> <i class="fas fa-times-circle"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if (!empty($_GET['tahun'])): ?>
                                    <a href="<?= remove_url_param(current_url(), 'tahun'); ?>" class="badge badge-primary p-2 text-white mr-2 mb-2 text-decoration-none">
                                        Tahun: <?= $_GET['tahun']; ?> <i class="fas fa-times-circle"></i>
                                    </a>
                                <?php endif; ?>

                                <a href="<?= base_url('penelitian'); ?>" class="badge badge-secondary p-2 text-white mr-2 mb-2 text-decoration-none">
                                    Reset Semua Filter <i class="fas fa-undo"></i>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (empty($penelitian)) : ?>
                        <div class="alert alert-info rounded shadow-sm">
                            <i class="fas fa-info-circle me-2"></i> Belum ada data penelitian yang tersedia.
                        </div>
                    <?php else : ?>
                        <div class="card-list">
                            <?php foreach ($penelitian as $p) : ?>
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-body">
                                        <h4 class="card-title fw-bold mb-2">
                                            <a href="<?= base_url('penelitian/detail/' . $p['id_penelitian']); ?>" class="text-decoration-none"><?= $p['judul_penelitian']; ?></a>
                                        </h4>
                                        <div class="card-meta d-flex align-items-center mb-3">
                                            <span class="text-muted"><i class="far fa-calendar-alt me-1"></i>
                                                <?php
                                                $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];

                                                $tgl_mulai = date('d F Y', strtotime($p['tanggal_mulai']));
                                                echo preg_replace_callback('/\b(\w+)\b/', function ($matches) use ($bulan) {
                                                    return isset($bulan[$matches[0]]) ? $bulan[$matches[0]] : $matches[0];
                                                }, $tgl_mulai);
                                                ?> -
                                                <?php
                                                if ($p['tanggal_akhir']) {
                                                    $tgl_akhir = date('d F Y', strtotime($p['tanggal_akhir']));
                                                    echo preg_replace_callback('/\b(\w+)\b/', function ($matches) use ($bulan) {
                                                        return isset($bulan[$matches[0]]) ? $bulan[$matches[0]] : $matches[0];
                                                    }, $tgl_akhir);
                                                } else {
                                                    echo 'Selesai';
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="researcher-info p-3 bg-light rounded">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="mb-1"><i class="fas fa-user-graduate me-2"></i> <strong>Peneliti:</strong> <?= $p['nama']; ?></p>
                                                    <p class="mb-1"><strong>No. Identitas:</strong> <?= $p['no_identitas']; ?></p>
                                                    <p class="mb-1"><i class="fas fa-layer-group me-2"></i> <strong>Kategori:</strong>
                                                        <a href="<?= base_url('penelitian?kategori_objek=' . urlencode($p['kategori_objek'])); ?>" class="text-decoration-none">
                                                            <?= $p['kategori_objek']; ?>
                                                        </a>
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-1"><i class="fas fa-book me-2"></i> <strong>Program Studi:</strong> <?= $p['program_studi']; ?></p>
                                                    <p class="mb-1"><i class="fas fa-university me-2"></i> <strong>Instansi:</strong>
                                                        <a href="<?= base_url('penelitian?instansi=' . urlencode($p['instansi'])); ?>" class="text-decoration-none">
                                                            <?= $p['instansi']; ?>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if (!empty($p['deskripsi_singkat'])) : ?>
                                            <div class="mt-3">
                                                <p class="card-text"><?= substr($p['deskripsi_singkat'], 0, 150); ?>...</p>
                                                <a href="<?= base_url('penelitian/detail/' . $p['id_penelitian']); ?>" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Pagination -->
                        <?php if (isset($pager)) : ?>
                            <div class="pagination justify-content-center" style="margin-top: 40px;">
                                <?= $pager->links() ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Sidebar with Filters -->
            <div class="col-lg-4">
                <div class="sidebar-widgets">
                    <!-- Search Box -->
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget search-widget">
                            <form class="search-form" action="<?= base_url('penelitian'); ?>" method="get">
                                <input placeholder="Cari penelitian..." name="q" type="text"
                                    value="<?= isset($_GET['q']) ? $_GET['q'] : ''; ?>">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>

                    <!-- Filter by Category -->
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget">
                            <h4 class="widget-title mb-3">Filter Berdasarkan Kategori</h4>
                            <ul class="list-group">
                                <?php foreach ($kategori_list as $kategori): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="<?= base_url('penelitian?kategori_objek=' . urlencode($kategori['kategori_objek'])); ?>"
                                            class="text-decoration-none <?= (isset($_GET['kategori_objek']) && $_GET['kategori_objek'] == $kategori['kategori_objek']) ? 'fw-bold' : ''; ?>">
                                            <?= $kategori['kategori_objek']; ?>
                                        </a>
                                        <span class="badge bg-secondary text-white rounded-pill"><?= $kategori['jumlah']; ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <!-- Filter by Institution -->
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget">
                            <h4 class="widget-title mb-3">Filter Berdasarkan Instansi</h4>
                            <ul class="list-group">
                                <?php foreach ($instansi_list as $instansi): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="<?= base_url('penelitian?instansi=' . urlencode($instansi['instansi'])); ?>"
                                            class="text-decoration-none <?= (isset($_GET['instansi']) && $_GET['instansi'] == $instansi['instansi']) ? 'fw-bold' : ''; ?>">
                                            <?= $instansi['instansi']; ?>
                                        </a>
                                        <span class="badge bg-secondary text-white rounded-pill"><?= $instansi['jumlah']; ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <!-- Filter by Year -->
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget">
                            <h4 class="widget-title mb-3">Filter Berdasarkan Tahun</h4>
                            <ul class="list-group">
                                <?php foreach ($tahun_list as $tahun): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="<?= base_url('penelitian?tahun=' . $tahun['tahun']); ?>"
                                            class="text-decoration-none <?= (isset($_GET['tahun']) && $_GET['tahun'] == $tahun['tahun']) ? 'fw-bold' : ''; ?>">
                                            <?= $tahun['tahun']; ?>
                                        </a>
                                        <span class="badge bg-secondary text-white rounded-pill"><?= $tahun['jumlah']; ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <!-- Latest Research -->
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget">
                            <h4 class="widget-title mb-3">Penelitian Terbaru</h4>
                            <ul class="list-unstyled">
                                <?php foreach ($latest_penelitian as $p): ?>
                                    <li class="media mb-3 pb-3 border-bottom">
                                        <div class="media-body">
                                            <a href="<?= base_url('penelitian/detail/' . $p['id_penelitian']); ?>" class="text-decoration-none">
                                                <h6 class="mt-0 mb-1"><?= $p['judul_penelitian']; ?></h6>
                                            </a>
                                            <small class="text-muted">
                                                <i class="far fa-calendar-alt me-1"></i> <?= date('d F Y', strtotime($p['tanggal_mulai'])); ?>
                                            </small>
                                            <br>
                                            <small class="text-muted">
                                                <i class="fas fa-user-graduate me-1"></i> <?= $p['nama']; ?>
                                            </small>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End penelitian list Area -->

<?= $this->endSection(); ?>