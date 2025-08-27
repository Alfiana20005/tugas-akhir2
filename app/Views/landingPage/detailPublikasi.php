<?= $this->extend('landingPage/template baru'); ?>

<?= $this->section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Detail Publikasi
                </h1>
                <p class="text-white link-nav"><a href="/home">Home </a> <span class="fa fa-chevron-right"></span> <a href="/publikasi2"> Publikasi</a> <span class="fa fa-chevron-right"></span> Detail</p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start Publication Detail Area -->
<section class="sample-text-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="publication-detail">
                    <!-- Publication Preview -->
                    <div class="mb-4">
                        <?php
                        // Convert Google Drive link to embed format
                        $embedUrl = '';
                        if (strpos($publikasi['link'], 'drive.google.com') !== false) {
                            // Extract file ID from Google Drive URL
                            preg_match('/\/d\/([a-zA-Z0-9-_]+)/', $publikasi['link'], $matches);
                            if (isset($matches[1])) {
                                $fileId = $matches[1];
                                $embedUrl = "https://drive.google.com/file/d/{$fileId}/preview";
                            }
                        }
                        ?>

                        <?php if ($embedUrl): ?>
                            <!-- Google Drive Preview -->
                            <div class="embed-responsive" style="position: relative; width: 100%; height: 600px; overflow: hidden; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                <iframe src="<?= $embedUrl; ?>"
                                    style="width: 100%; height: 100%; border: none;"
                                    allow="autoplay">
                                </iframe>
                            </div>
                        <?php else: ?>
                            <!-- Fallback: Show image if not Google Drive link -->
                            <div class="text-center">
                                <img src="<?= base_url("img/publikasi/" . $publikasi['foto']); ?>"
                                    alt="<?= $publikasi['judul']; ?>"
                                    class="img-fluid rounded shadow">
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Publication Title -->
                    <div class="mb-4">
                        <h2 class="text-center" style="color:#850000;">
                            <?= $publikasi['judul']; ?>
                        </h2>
                    </div>

                    <!-- Publication Info -->
                    <div class="mb-4 text-center">
                        <?php if (!empty($publikasi['penulis'])): ?>
                            <p class="text-muted mb-2">
                                <i class="fa fa-user"></i> <strong>Penulis:</strong> <?= $publikasi['penulis']; ?>
                            </p>
                        <?php endif; ?>
                        <p class="text-muted">
                            <i class="fa fa-calendar"></i> <?= date('d F Y', strtotime($publikasi['tanggal'])); ?>
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="text-center">
                        <?php if ($embedUrl): ?>
                            <a href="<?= $publikasi['link']; ?>"
                                target="_blank"
                                class="btn btn-primary btn-md mb-3"
                                style="background-color:#850000; border-color:#850000;">
                                <i class="fa fa-download"></i> Download / Buka di Google Drive
                            </a>
                        <?php else: ?>
                            <a href="<?= $publikasi['link']; ?>"
                                target="_blank"
                                class="btn btn-primary btn-lg mb-3"
                                style="background-color:#850000; border-color:#850000;">
                                <i class="fa fa-external-link"></i> Baca Publikasi Lengkap
                            </a>
                        <?php endif; ?>
                        <br>
                        <a href="<?= base_url('publikasi2'); ?>"
                            class="btn btn-outline-secondary">
                            <i class="fa fa-arrow-left"></i> Kembali ke Daftar Publikasi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Publication Detail Area -->

<?= $this->endSection(); ?>