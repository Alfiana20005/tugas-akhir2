<?= $this->extend('landingPage/template baru'); ?>

<?= $this->section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Katalog Pameran Temporer
                </h1>
                <p class="text-white link-nav"><a href="/home">Home </a> <span class="fa fa-chevron-right"></span> <a href="/katalog-pameran-temporer"> Katalog Pameran Temporer</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<style>
    .content-section {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 60px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .content-section.reverse {
        flex-direction: row-reverse;
    }

    .image-side {
        flex: 1;
        min-width: 450px;
    }

    .image-side img {
        width: 100%;
        height: 350px;
        object-fit: cover;
    }

    .text-side {
        flex: 1;
        padding: 30px;
        margin: 0;
    }

    .section-badge {
        display: inline-block;
        background: #850000;
        color: white;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .section-title {
        font-size: 20px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 10px;
        text-align: left;
    }

    .section-code {
        font-family: 'Courier New', monospace;
        font-size: 13px;
        color: #333;
        margin-bottom: 15px;
        padding: 8px 12px;
        background: #f7fafc;
        border-left: 4px solid #850000;
        display: inline-block;
    }

    .section-desc {
        font-size: 15px;
        color: #333;
        line-height: 1.8;
        margin-bottom: 10px;
    }

    .no-data {
        text-align: center;
        padding: 60px 20px;
        color: #666;
    }

    .no-data i {
        font-size: 64px;
        margin-bottom: 20px;
        color: #850000;
    }

    @media (max-width: 768px) {

        .content-section,
        .content-section.reverse {
            flex-direction: column;
            margin-bottom: 40px;
            gap: 30px;
        }

        .image-side {
            min-width: 100%;
            height: auto;
        }

        .image-side img {
            height: 100%;
            object-fit: cover;
        }

        .text-side {
            margin-top: -30px;
        }

        .about-content h1 {
            font-size: 28px;
        }
    }
</style>

<!-- Start post-content Area -->
<section class="post-content-area single-post-area">
    <div class="container">
        <?php if (!empty($pameran)): ?>
            <?php
            $index = 0;
            foreach ($pameran as $p):
                $isReverse = ($index % 2 != 0) ? 'reverse' : '';
                $index++;
            ?>
                <div class="content-section <?= $isReverse; ?>">
                    <div class="image-side">
                        <?php if (!empty($p['image'])): ?>
                            <img src="<?= base_url('img/pameran/' . $p['image']); ?>" alt="<?= esc($p['judul']); ?>">
                        <?php else: ?>
                            <img src="<?= base_url('img/default.jpg'); ?>" alt="Default Image">
                        <?php endif; ?>
                    </div>
                    <div class="text-side">
                        <span class="section-badge"><?= esc($p['judul']); ?></span>
                        <h3 class="section-title"><?= esc($p['keterangan']); ?></h3>

                        <?php if (!empty($p['kode_koleksi'])): ?>
                            <div class="section-code">
                                Koleksi Museum Negeri NTB, pengadaan koleksi tahun <?= esc($p['pengadaan']); ?>, <strong>No.<?= esc($p['kode_koleksi']); ?></strong>
                            </div>
                        <?php endif; ?>

                        <p class="section-desc">
                            <?php if (!empty($p['asal_dibuat'])): ?>
                                <strong>Asal dibuat:</strong> <?= esc($p['asal_dibuat']); ?><br>
                            <?php endif; ?>

                            <?php if (!empty($p['asal_perolehan'])): ?>
                                <strong>Asal Perolehan:</strong> <?= esc($p['asal_perolehan']); ?><br>
                            <?php endif; ?>

                            <?php if (!empty($p['periode'])): ?>
                                <strong>Periode:</strong> Diperkirakan sekitar tahun <?= esc($p['periode']); ?>
                            <?php endif; ?>
                        </p>

                        <?php if (!empty($p['description'])): ?>
                            <p class="section-desc">
                                <?= nl2br(esc($p['description'])); ?>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($p['highlight']) && trim($p['highlight']) !== ''): ?>
                            <div class="highlight" style="background-color: #850000; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                                <small style="color: white;"><?= nl2br(esc($p['highlight'])); ?></small>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-data">
                <i class="fa fa-inbox"></i>
                <h3>Belum Ada Data Pameran Temporer</h3>
                <p>Silakan tambahkan data pameran dengan jenis "Temporer" terlebih dahulu.</p>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- End post-content Area -->

<?= $this->endSection(); ?>