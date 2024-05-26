<?= $this->extend('CompanyProfile/index_profile'); ?>

<?= $this-> section('main'); ?>

<!-- <h1>Halaman Ini Dalam Tahap Pengembangan</h1>  -->
      <!-- ======= Hero Section ======= -->
      <section id="hero2" class="d-flex align-items-center">
    <div class="container">
      <h1>Berita</h1>
      <h2>Museum Negeri Nusa Tenggara Barat</h2>
      <!-- <a href="#about" class="btn-get-started scrollto">Get Started</a> -->
    </div>
  </section><!-- End Hero -->


  <main id="main">
<!-- 
  <div class="container  mt-4">
      <h1>Berita</h1>
      <h2>Museum Negeri Nusa Tenggara Barat</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div> -->
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h4>Berita Terkait</h4>
              
                
                <ul>
                <?php 
                foreach($dataBerita as $b):
                if ($b['type'] == 'Link'): ?>
                    <li><a href=" <?= $b['isi'] ?>" style="font-size:12px; color:white;"><?= $b['judul']; ?></a></li>                               
                <?php endif; ?>
                <?php endforeach; ?>
               
                
                </ul>
          
              
              
            </div>
          </div>
          
          <div class="col-lg-8 d-flex align-items-stretch mb-2">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
              <?php 
                                       
                foreach($dataBerita as $b):
                if ($b['type'] == 'Narasi'): ?>   
                <div class="col-xl-4 d-flex align-items-stretch mb-2">
                  <div class="berita-box mt-4 mt-xl-0">
                    <!-- <i class="bx bx-receipt"></i> -->
                    <div class="berita2 mb-2 " class="text-center"><img src="<?= base_url("img/berita/". $b['foto']); ?>" alt="" ></div>
                    <!-- <h5>Taruna TNI Angkatan Laut Belajar Multikultural di Museum NTB</h5> -->
                    <a href="<?= base_url("/lihatberita/{$b['id_berita']}"); ?>"><p><?= $b['judul']; ?></p></a>
                  </div>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
                <!-- <div class="col-xl-4 d-flex align-items-stretch mb-2">
                  <div class="berita-box mt-4 mt-xl-0">
                    
                    <div class="berita2 mb-2 " class="text-center"><img src="img/berita/berita1.png" alt="" ></div>
                    
                    <a href="https://www.instagram.com/p/C3C8dWvvNDR/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA=="><p>Taruna TNI Angkatan Laut Belajar Multikultural di Museum NTB</p></a>
                  </div>
                </div>

                <div class="col-xl-4 d-flex align-items-stretch mb-2">
                  <div class="berita-box mt-4 mt-xl-0">
                    
                    <div class="berita2 mb-2 " class="text-center"><img src="img/berita/berita1.png" alt="" ></div>
                    
                    <a href="https://www.instagram.com/p/C3C8dWvvNDR/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA=="><p>Taruna TNI Angkatan Laut Belajar Multikultural di Museum NTB</p></a>
                  </div>
                </div> -->
                
                
                

              </div>
            </div><!-- End .content-->
          </div>
          
        </div>

      </div>
    </section><!-- End Why Us Section -->


  </main><!-- End #main -->
<?= $this->endSection(); ?>  