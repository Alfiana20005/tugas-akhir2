<?= $this->extend('landingPage/template baru'); ?>

<?= $this->section('content'); ?>
<!-- start banner Area -->
<section class="about-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Koleksi
        </h1>
        <p class="text-white link-nav"><a href="/home">Home </a> <span class="fa fa-chevron-right"></span> <a href="/koleksi_page2"> Koleksi</a></p>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio pt-30">
  <div class="container">


    <!-- <div class="row my-4">
      <a href="/koleksi_kategori/Geologika" class="genric-btn primary-border small my-2 mx-2"> Geologika</a>
      <a href="/koleksi_kategori/Biologika" class="genric-btn primary-border small my-2 mx-2"> Biologika</a>
      <a href="/koleksi_kategori/Etnografika" class="genric-btn primary-border small my-2 mx-2"> Etnografika</a>
      <a href="/koleksi_kategori/Arkeologika" class="genric-btn primary-border small my-2 mx-2"> Arkeologika</a>
      <a href="/koleksi_kategori/Historika" class="genric-btn primary-border small my-2 mx-2"> Historika</a>
      <a href="/koleksi_kategori/Numismatika" class="genric-btn primary-border small my-2 mx-2"> Numismatika</a>
      <a href="/koleksi_kategori/Filologika" class="genric-btn primary-border small my-2 mx-2"> Filologika</a>
      <a href="/koleksi_kategori/Kramologika" class="genric-btn primary-border small my-2 mx-2"> Kramologika</a>
      <a href="/koleksi_kategori/Seni Rupa" class="genric-btn primary-border small my-2 mx-2"> Seni Rupa</a>
      <a href="/koleksi_kategori/Teknologika" class="genric-btn primary-border small my-2 mx-2"> Teknologika</a> -->
    <!-- /<a href="/kegiatanKategori2/Museum Talk" class="genric-btn primary-border small my-2 mx-2"> Lain-lain</a> -->

    <!-- <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">

      </div>
    </div> -->

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
      <?php foreach ($koleksi as $k): ?>
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="<?= base_url("img/koleksiAdmin/" . $k['foto']); ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?= $k['nama']; ?></h4>
              <p><?= $k['kategori']; ?></p>
            </div>

            <div class="portfolio-links">
              <a href="<?= base_url("img/koleksiAdmin/" . $k['foto']); ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?= $k['nama']; ?>"><i class="fa-solid fa-eye"></i></a>
              <a href="<?= base_url("/koleksi/detail/{$k['id_koleksi']}"); ?>" title="More Details"><i class="fa-solid fa-circle-info"></i></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section><!-- End Portfolio Section -->

<?= $this->endSection(); ?>