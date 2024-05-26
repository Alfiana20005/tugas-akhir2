<?= $this->extend('CompanyProfile/index_profile'); ?>

<?= $this-> section('main'); ?>

<!-- <h1>Halaman Ini Dalam Tahap Pengembangan</h1>  -->

    <!-- ======= About Section ======= -->
    <!-- <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <img src="assets/img/pengunjung.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h3>Visi dan Misi</h3>
            <p class="fst-italic">
              Museum Negeri Nusa Tenggara Barat
            </p>
            <ul>
              <li>
                
                <div>
                  <h5>Visi</h5>
                  <p>Jendela Informasi Budaya dan Ilmu Pengetahuan</p>
                </div>
              </li>
              <li>
                
                <div>
                  <h5>Misi</h5>
                  <p>- Melakukan pengumpulan, penelitian, perawatan, pengawetan, dan penyajian benda yang mempunyai nilai budaya dan ilmiah;</p>
                  <p>- Melakukan urusan perpustakaan dan dokumentasi ilmiah;</p>
                  <p>- Memperkenalkan dan menyebarluaskan hasil penelitia koleksi benda yang mempunyai nilai budaya dan ilmiah;</p>
                  <p>- Melakukan bimbingan edukatif kultural dan penyajian rekreatif benda yang mempunyai nilai budaya dan ilmiah;</p>
                  <p>- Melakukan urusan tata usaha</p>
                </div>
              </li>
            </ul>
            
          </div>
        </div>

      </div>
    </section> -->
    <!-- End About Section -->
    <div class="padding-top: 50px;"></div>
    <section id="visiMisi">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(img/galery/museum.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp text-center">
              <h2>Visi <span></span></h2>
              <p>Jendela Informasi Budaya dan Ilmu Pengetahuan</p>

              
              <!-- <div class="text-center"><a href="" class="btn-get-started">Read More</a></div> -->
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(img/galery/becak.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp text-center">
              <h2>Misi <span></span></h2>
              <p class="">- Melakukan pengumpulan, penelitian, perawatan, pengawetan, dan penyajian benda yang mempunyai nilai budaya dan ilmiah;</p>
                  <p>- Melakukan urusan perpustakaan dan dokumentasi ilmiah;</p>
                  <p>- Memperkenalkan dan menyebarluaskan hasil penelitia koleksi benda yang mempunyai nilai budaya dan ilmiah;</p>
                  <p>- Melakukan bimbingan edukatif kultural dan penyajian rekreatif benda yang mempunyai nilai budaya dan ilmiah;</p>
                  <p>- Melakukan urusan tata usaha</p>
              
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <!-- <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Sequi ea ut et est quaerat</h2>
              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div> -->

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section>

<?= $this->endSection(); ?>  