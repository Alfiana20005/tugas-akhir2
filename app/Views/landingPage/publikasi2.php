<?= $this->extend('landingPage/template baru'); ?>

<?= $this->section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Publikasi
                </h1>
                <p class="text-white link-nav"><a href="/home">Home </a> <span class="fa fa-chevron-right"></span> <a href="/publikasi2"> Publikasi</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start destinations Area -->
<section class="destinations-area section-gap">
    <div class="container">
        <div class="row">
            <div class="active-recent-blog-carusel">
                <?php foreach ($publikasi as $p): ?>
                    <div class="">

                        <div class="single-destinations">
                            <div class="thumb">
                                <img src="<?= base_url("img/publikasi/" . $p['foto']); ?>" alt="">
                            </div>
                            <div class="details">
                                <h4 class="d-flex justify-content-between">
                                    <a href="<?= base_url('publikasi2_detail/' . $p['id_publikasi']); ?>" style="color:#850000;"><span><?= $p['judul']; ?></span> </a>

                                </h4>
                                <p>
                                    <?= $p['tanggal']; ?>
                                </p>

                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>
<!-- End destinations Area -->

<?= $this->endSection(); ?>