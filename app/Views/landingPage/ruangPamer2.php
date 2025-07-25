<?= $this->extend('landingPage/template baru'); ?>

<?= $this->section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Ruang Pamer
        </h1>
        <p class="text-white link-nav"><a href="/home">Home </a> <span class="fa fa-chevron-right"></span> <a href="/ruangPamer2"> Ruang Pamer</a></p>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->

<section id="departments" class="departments mb-4">
  <div class="container" data-aos="fade-up">

    <div class="section-title">

    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-4 mb-5 mb-lg-0">
        <ul class="nav nav-tabs flex-column">
          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
              <h4>Ruang Pameran Tetap 1</h4>
              <p>Klik untuk melihat detail</p>
            </a>
          </li>
          <li class="nav-item mt-2">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
              <h4>Ruang Pameran Tetap 2</h4>
              <p>Klik untuk melihat detail</p>
            </a>
          </li>
          <li class="nav-item mt-2">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
              <h4>Ruang Khazanah</h4>
              <p>Klik untuk melihat detail</p>
            </a>
          </li>
          <li class="nav-item mt-2">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
              <h4>Ruang Geologi</h4>
              <p>Klik untuk melihat detail</p>
            </a>
          </li>
        </ul>
      </div>
      <div class="col-lg-8">
        <div class="tab-content">
          <div class="tab-pane active show" id="tab-1">
            <h3>Ruang Pameran Tetap 1</h3>

            <img src="img/ruangPamer/ruang1.png" alt="" class="img-fluid">
            <p>Museum Negeri
              NTB juga memiliki Ruang Pameran Tetap 1 Berisi koleksi-koleksi warisan geologi dan
              keanekaragaman geologi di Nusa Tenggara Barat.</p>
          </div>
          <div class="tab-pane" id="tab-2">
            <h3>Ruang Pameran Tetap 2</h3>
            <img src="img/ruangPamer/ruang2.jpeg" alt="" class="img-fluid">
            <p>Ruang Pameran Tetap 2 Museum Negeri Nusa tenggara Barat berisi koleksi-koleksi tentang warisan budaya
              sebagai sumber sejarah dan ilmu pengetahuan.</p>
          </div>
          <div class="tab-pane" id="tab-3">
            <h3>Ruang Khazanah</h3>
            <img src="img/ruangPamer/khazanah2.jpeg" alt="" class="img-fluid">
            <p>Ruang Khazanah Museum Negeri Nusa Tenggara Barat berisi koleksi-koleksi berharga yang menunjukkan keunggulan dari segi bahan,
              bentuk, fungsi dan karakteristik.</p>
          </div>
          <div class="tab-pane" id="tab-4">
            <h3>Ruang Geologi</h3>

            <img src="img/ruangPamer/geologi.jpg" alt="" class="img-fluid">
            <p> Museum Negeri
              NTB juga memiliki Pusat Informasi Geologi (PIG) yang
              terpisah dengan gedung utama. Ruang geologi ini dibuat
              untuk mempublikasikan dan menginformasikan warisan
              geologi, keanekaragaman geologi, keanekaragaman
              hayati dan keragaman budaya di Gunung Rinjani sebagai
              Geopark Dunia yang dinyatakan oleh UNESCO pada tahun 2018</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>


<?= $this->endSection(); ?>