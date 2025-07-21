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
                <p class="text-white link-nav"><a href="/home">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="/publikasi2"> Publikasi</a> <span class="lnr lnr-arrow-right"></span> Detail</p>
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
                    <!-- Publication Image -->
                    <div class="mb-4 text-center">
                        <img src="<?= base_url("img/publikasi/" . $publikasi['foto']); ?>"
                            alt="<?= $publikasi['judul']; ?>"
                            class="img-fluid rounded shadow">
                    </div>

                    <!-- Publication Title -->
                    <div class="mb-4">
                        <h2 class="text-center" style="color:#850000;">
                            <?= $publikasi['judul']; ?>
                        </h2>
                    </div>

                    <!-- Publication Date -->
                    <div class="mb-4 text-center">
                        <p class="text-muted">
                            <i class="fa fa-calendar"></i> <?= $publikasi['tanggal']; ?>
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="text-center">
                        <a href="<?= $publikasi['link']; ?>"
                            target="_blank"
                            class="btn btn-primary btn-lg mb-3"
                            style="background-color:#850000; border-color:#850000;">
                            <i class="fa fa-external-link"></i> Baca Publikasi Lengkap
                        </a>
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