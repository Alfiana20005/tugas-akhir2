<?= $this->extend('landingPage/template baru'); ?>

<?= $this->section('content'); ?>

<!-- Start banner Area -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Detail Penelitian
                </h1>
                <p class="text-white link-nav">
                    <a href="/home">Home</a>
                    <span class="fa fa-chevron-right"></span>
                    <a href="/penelitian">Publikasi Penelitian</a>
                    <span class="fa fa-chevron-right"></span>
                    <span>Detail Penelitian</span>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Start Detail Content Area -->
<section class="post-content-area single-post-area">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <!-- Back Button -->
                    <div class="mb-4">
                        <a href="<?= base_url('penelitian'); ?>" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Penelitian
                        </a>
                    </div>

                    <!-- Research Title -->
                    <div class="blog-info mb-4">
                        <h1 class="mb-3"><?= $penelitian['judul_penelitian']; ?></h1>

                        <!-- Research Meta Info -->
                        <div class="research-meta p-3 bg-light rounded mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-2"><i class="fas fa-user-graduate mr-2 text-primary"></i> <strong>Peneliti:</strong> <?= $penelitian['nama']; ?></p>
                                    <p class="mb-2"><i class="fas fa-layer-group mr-2 text-primary"></i> <strong>Kategori:</strong> <?= $penelitian['kategori_objek']; ?></p>

                                </div>
                                <div class="col-md-6">
                                    <p class="mb-2"><i class="fas fa-university mr-2 text-primary"></i> <strong>Instansi:</strong> <?= $penelitian['instansi']; ?></p>
                                    <p class="mb-2"><i class="far fa-calendar-alt mr-2 text-primary"></i> <strong>Periode:</strong>
                                        <?php
                                        $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];

                                        $tgl_mulai = date('d F Y', strtotime($penelitian['tanggal_mulai']));
                                        echo preg_replace_callback('/\b(\w+)\b/', function ($matches) use ($bulan) {
                                            return isset($bulan[$matches[0]]) ? $bulan[$matches[0]] : $matches[0];
                                        }, $tgl_mulai);
                                        ?> -
                                        <?php
                                        if ($penelitian['tanggal_akhir']) {
                                            $tgl_akhir = date('d F Y', strtotime($penelitian['tanggal_akhir']));
                                            echo preg_replace_callback('/\b(\w+)\b/', function ($matches) use ($bulan) {
                                                return isset($bulan[$matches[0]]) ? $bulan[$matches[0]] : $matches[0];
                                            }, $tgl_akhir);
                                        } else {
                                            echo 'Selesai';
                                        }
                                        ?>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Research Image -->
                    <?php if (!empty($penelitian['gambar'])): ?>
                        <div class="research-image mb-4">
                            <img src="<?= base_url('uploads/penelitian/' . $penelitian['gambar']); ?>"
                                alt="<?= $penelitian['judul_penelitian']; ?>"
                                class="img-fluid rounded shadow">
                        </div>
                    <?php endif; ?>

                    <!-- Research Summary/Content -->
                    <div class="research-content">
                        <?php if (!empty($penelitian['ringkasan'])): ?>
                            <div class="content-section">
                                <h3 class="mb-3"><i class="fas fa-file-alt mr-2 text-primary"></i>Ringkasan Penelitian</h3>
                                <div class="content-text">
                                    <?= nl2br($penelitian['ringkasan']); ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle mr-2"></i>
                                Ringkasan penelitian belum tersedia.
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Share Section -->
                    <div class="share-section mt-5 pt-4 border-top">
                        <h5 class="mb-3">Bagikan Penelitian Ini:</h5>
                        <div class="social-share">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= current_url(); ?>"
                                target="_blank" class="btn btn-primary btn-sm mr-2">
                                <i class="fab fa-facebook-f"></i> Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?= current_url(); ?>&text=<?= urlencode($penelitian['judul_penelitian']); ?>"
                                target="_blank" class="btn btn-info btn-sm mr-2">
                                <i class="fab fa-twitter"></i> Twitter
                            </a>
                            <a href="https://wa.me/?text=<?= urlencode($penelitian['judul_penelitian'] . ' - ' . current_url()); ?>"
                                target="_blank" class="btn btn-success btn-sm mr-2">
                                <i class="fab fa-whatsapp"></i> WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar-widgets">
                    <!-- Related Research -->
                    <?php if (!empty($related_penelitian)): ?>
                        <div class="widget-wrap">
                            <div class="single-sidebar-widget">
                                <h4 class="widget-title mb-3">Penelitian Terkait</h4>
                                <ul class="list-unstyled">
                                    <?php foreach ($related_penelitian as $rp): ?>
                                        <li class="media mb-3 pb-3 border-bottom">
                                            <div class="media-body">
                                                <a href="<?= base_url('penelitian/detail/' . $rp['id_penelitian']); ?>" class="text-decoration-none">
                                                    <h6 class="mt-0 mb-1"><?= substr($rp['judul_penelitian'], 0, 80); ?><?= strlen($rp['judul_penelitian']) > 80 ? '...' : ''; ?></h6>
                                                </a>
                                                <small class="text-muted">
                                                    <i class="fas fa-user-graduate me-1"></i> <?= $rp['nama']; ?>
                                                </small>
                                                <br>
                                                <small class="text-muted">
                                                    <i class="far fa-calendar-alt me-1"></i> <?= date('d F Y', strtotime($rp['tanggal_mulai'])); ?>
                                                </small>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="mt-3">
                                    <a href="<?= base_url('penelitian?kategori_objek=' . urlencode($penelitian['kategori_objek'])); ?>"
                                        class="btn btn-outline-primary btn-sm">
                                        Lihat Semua Penelitian <?= $penelitian['kategori_objek']; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Research Statistics -->
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget">
                            <h4 class="widget-title mb-3">Informasi Penelitian</h4>
                            <div class="research-stats">
                                <div class="stat-item mb-3 p-3 bg-light rounded">
                                    <div class="d-flex justify-content-between">
                                        <span><i class="fas fa-layer-group mr-2 text-primary"></i>Kategori:</span>
                                        <strong><?= $penelitian['kategori_objek']; ?></strong>
                                    </div>
                                </div>
                                <div class="stat-item mb-3 p-3 bg-light rounded">
                                    <div class="d-flex justify-content-between">
                                        <span><i class="fas fa-university mr-2 text-primary"></i>Instansi:</span>
                                        <strong><?= $penelitian['instansi']; ?></strong>
                                    </div>
                                </div>
                                <div class="stat-item mb-3 p-3 bg-light rounded">
                                    <div class="d-flex justify-content-between">
                                        <span><i class="far fa-calendar-alt mr-2 text-primary"></i>Tahun:</span>
                                        <strong><?= date('Y', strtotime($penelitian['tanggal_mulai'])); ?></strong>
                                    </div>
                                </div>
                                <?php if (!empty($penelitian['jenis'])): ?>
                                    <div class="stat-item mb-3 p-3 bg-light rounded">
                                        <div class="d-flex justify-content-between">
                                            <span><i class="fas fa-tag mr-2 text-primary"></i>Jenis:</span>
                                            <span class="badge <?= $penelitian['jenis'] == 'museum' ? 'bg-warning text-dark' : 'bg-success' ?>">
                                                <?= ucfirst($penelitian['jenis']); ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget">
                            <h4 class="widget-title mb-3">Aksi Cepat</h4>
                            <div class="d-grid gap-2">
                                <a href="<?= base_url('penelitian'); ?>" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-list mr-2"></i>Semua Penelitian
                                </a>
                                <a href="<?= base_url('penelitian?kategori_objek=' . urlencode($penelitian['kategori_objek'])); ?>" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-layer-group mr-2"></i>Kategori Sama
                                </a>
                                <a href="<?= base_url('penelitian?instansi=' . urlencode($penelitian['instansi'])); ?>" class="btn btn-outline-info btn-sm">
                                    <i class="fas fa-university mr-2"></i>Instansi Sama
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Detail Content Area -->

<!-- Custom CSS for Detail Page -->
<style>
    .research-content .content-text {
        font-size: 16px;
        line-height: 1.8;
        text-align: justify;
    }

    .research-image img {
        max-height: 400px;
        width: 100%;
        object-fit: cover;
    }

    .social-share a {
        text-decoration: none;
    }

    .research-meta {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border: 1px solid #dee2e6;
    }

    .stat-item {
        border-left: 4px solid #007bff;
    }

    .content-section {
        background: #fff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .research-image img {
            max-height: 250px;
        }

        .content-section {
            padding: 1.5rem;
        }
    }
</style>

<?= $this->endSection(); ?>