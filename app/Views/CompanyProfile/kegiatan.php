<?= $this->extend('CompanyProfile/index_profile'); ?>

<?= $this-> section('main'); ?>

<!-- <h1>Halaman Ini Dalam Tahap Pengembangan</h1>  -->
    <!-- ======= Hero Section ======= -->

    <section id="hero2" class="d-flex align-items-center">
    <div class="container">
      <h1>Kegiatan</h1>
      <h2>Museum Negeri Nusa Tenggara Barat</h2>
      <!-- <a href="#about" class="btn-get-started scrollto">Get Started</a> -->
    </div>
  </section><!-- End Hero -->


  <main id="main">
    <!-- <div class="container  mt-4">
      <h1>Berita</h1>
      <h2>Museum Negeri Nusa Tenggara Barat</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div> -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="kegiatan">
      <div class="container">
      
        <div class="content">
          
          <div class="col-lg-12 d-flex align-items-stretch mb-WWW2">
          
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
              <?php 
                foreach($kegiatan as $k):
                if ($k['tampilkan'] == 'Kegiatan'): ?>
                <div class="col-xl-2 d-flex align-items-stretch mb-2">
                  <div class="berita-box mt-4 mt-xl-0">
                    <!-- <i class="bx bx-receipt"></i> -->
                    <div class="berita3 mb-2 " class="text-center"><img src="<?= base_url("img/kegiatan/". $k['foto']); ?>" alt="" ></div>
                    <!-- <h5>Taruna TNI Angkatan Laut Belajar Multikultural di Museum NTB</h5> -->
                    <a href="<?= base_url("/lihatKegiatan/{$k['id_kegiatan']}"); ?>"><p><?= $k['judul']; ?></p></a>
                  </div>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>   

              </div>
            </div><!-- End .content-->
            
          </div>
        </div>
               
      </div>
    </section><!-- End Why Us Section -->


  </main><!-- End #main -->
<?= $this->endSection(); ?>  