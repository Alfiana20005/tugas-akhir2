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
            <div class="col-lg-12 posts-list">
                <div class="single-post">
                    <div class="blog-info">
                        <h2 class="mb-4 fs-1">Daftar Penelitian</h2>
                    </div>

                    <?php if (empty($penelitian)) : ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info" style="font-size: 1.25rem;">
                                    Belum ada data penelitian yang tersedia.
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="comments-area">
                            <ul class="comment-list" style="padding-left: 0; list-style-type: none;">
                                <?php foreach ($penelitian as $p) : ?>
                                    <li class="single-comment" style="margin-bottom: 30px; padding-bottom: 30px;">
                                        <div class=" comment">
                                            <div class="row">
                                                <div class="col-md-3 text-center">
                                                    <div class="thumb">
                                                        <img src="<?= base_url('img/penelitian/' . $p['foto']); ?>" alt="<?= $p['nama']; ?>" class="img-fluid" style="max-height: 200px; border-radius: 8px;">
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="desc">
                                                        <h5 style="font-size: 1.5rem; font-weight: 600;"><a href="#"><?= $p['judul_penelitian']; ?></a></h5>
                                                        <div class="comment-metadata" style="margin-bottom: 10px;">
                                                            <span class="date" style="font-size: 1rem; color: #777;"><?= date('d F Y', strtotime($p['tanggal_penelitian'])); ?></span>
                                                        </div>
                                                        <div class="researcher-info">
                                                            <p style="font-size: 1rem; margin-bottom: 0px;"><strong>Peneliti:</strong> <?= $p['nama']; ?> (<?= $p['nim']; ?>)</p>
                                                            <p style="font-size: 1rem;"><strong>Instansi:</strong> <?= $p['instansi']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($pager)) : ?>
                        <div class="pagination justify-content-center" style="margin-top: 40px;">
                            <?= $pager->links() ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End penelitian list Area -->

<?= $this->endSection(); ?>