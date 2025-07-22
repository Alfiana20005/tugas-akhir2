<?= $this->extend('landingPage/template baru'); ?>

<?= $this->section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Struktur Organisasi
        </h1>
        <p class="text-white link-nav"><a href="/home">Home </a> <span class="fa fa-chevron-right"></span> <a href="/struktur2"> Struktur Orgnisasi</a></p>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -======= Our Team Section ======= -->
<section id="team" class="team section-bg">
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center pt-30">

      <img src=" <?= base_url('img/strukturOrgan/struktur2.png'); ?> " id="struktur2" alt="" class="img-responsive " style="  text-align: center; ">

    </div>

    <hr>

    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-60 col-lg-9">
        <div class="title text-center">
          <h1 class="mb-10">Tim Kami</h1>
          <!-- <a href="/semuaPetugas" style="color: #850000;"><p>Lihat Semua Tim</p></a> -->
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member" data-aos="fade-up">
          <div class="member-img">
            <img src="img/strukturOrgan/kamus.png" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Ahmad Nuralam, S.H, M.H</h4>
            <span>Kepala Museum</span>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member" data-aos="fade-up" data-aos-delay="100">
          <div class="member-img">
            <img src="img/strukturOrgan/ktu.png" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Siti Kusumawati, S.Sos</h4>
            <span>Tata Usaha</span>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member" data-aos="fade-up" data-aos-delay="200">
          <div class="member-img">
            <img src="img/strukturOrgan/edukasi.png" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Raden Heru Indriawan, S.S</h4>
            <span>Plt. Penyajian dan Layanan Edukasi</span>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member" data-aos="fade-up" data-aos-delay="300">
          <div class="member-img">
            <img src="img/strukturOrgan/pengkajian.png" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Aulia Rahman Adiputra, S.STP,M.A.P</h4>
            <span>Pengkajian dan Perawatan</span>
          </div>
        </div>
      </div>



    </div>
    <a href="/semuaPetugas" class="btn d-flex justify-content-center align-items-center my-4" style="background:#850000; color: white;"> Lihat Semua Tim</a>

  </div>
</section><!-- End Our Team Section -->
<?= $this->endSection(); ?>