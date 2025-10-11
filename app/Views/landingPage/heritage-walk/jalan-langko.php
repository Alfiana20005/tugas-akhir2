<?= $this->extend('landingPage/template baru'); ?>

<?= $this->section('content'); ?>


<!-- start banner Area -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Jalan Langko
                </h1>
                <p class="text-white link-nav"><a href="/home">Home </a> <span class="fa fa-chevron-right"></span> <a href="/heritage-walk/si-biru"> Jl. Langko</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->


<!-- Start post-content Area -->
<section class="post-content-area single-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <button class="genric-btn primary small">
                            <div>Heritage Walk</div>
                            <div></div>
                        </button>
                        <div class="feature-img">
                            <img class="img-fluid mt-4" style="max-height: 400px; object-fit:scale-down;" src="<?= base_url('img/jalan-langko.jpg'); ?>" alt="">
                        </div>
                        <div class="ket" id="ket"><i class="fa-solid fa-camera mt-4" style="padding-right: 4pt;"> </i>Jalan Langko tahun 1984. Foto oleh Cristina Kessier.</div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <h3 class="mt-20 mb-20" style="text-align:left">Jalan Langko dan Deretan Pohon Kenari</h3>

                        <p class="excert" style="color: black;">
                        <p>Sepanjang Jalan Langko tumbuh pohon kenari tinggi besar, menyejukkan. Ketahuilah, tumbuhan itu ditanam oleh orang-orang Belanda pada tahun 1897, menggantikan pohon-pohon asam yang tumbuh sebelumnya.</p>
                        <p>Dahulu, Jalan Langko menjadi jalur utama yang menghubungkan pelabuhan Ampenan dengan pusat pemerintahan di Cakranegara. Pada masa kolonial, jalan ini berperan sebagai urat nadi perdagangan dan mobilitas masyarakat. Ahli botani Swiss, Heinrich Zollinger, dalam The Journal of Indian Archipelago and Eastern Asia (Vol. V, 1851) mencatat bahwa sebagian jalur dari Ampenan menuju Mataram merupakan jalan lurus yang dinaungi deretan pepohonan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End post-content Area -->


<?= $this->endSection(); ?>