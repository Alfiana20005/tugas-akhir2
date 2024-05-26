<?= $this->extend('CompanyProfile/index_profile'); ?>

<?= $this-> section('main'); ?>



    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">
        
          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="<?= base_url("img/koleksiAdmin/". $koleksi['foto']); ?>" alt="">
                </div>


              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          
          
          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Informasi Koleksi </h3>
              <ul>
                <li><strong>Nama Koleksi</strong>: <?= $koleksi['nama']; ?></li>
                <li><strong>No. Koleksi</strong>: <?= $koleksi['no']; ?></li>
                <li><strong>Ukuran</strong>: <?= $koleksi['ukuran']; ?></li>
                <!-- <li><strong>informasi</strong>: <a href="#">www.example.com</a></li> -->
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Deskripsi </h2>
              <p><?= $koleksi['deskripsi']; ?></p>
            </div>
          </div>
         
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->


<?= $this->endSection(); ?>  