<?= $this->extend('CompanyProfile/index_profile'); ?>

<?= $this-> section('main'); ?>




  <!-- ======= Hero Section ======= -->
  
  <section id="hero" class="d-flex align-items-center">
    <video autoplay muted loop id="bg-video">
        <source src="/assets/img/drone-museum.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
    
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
       
      <div class="selamatDatang">
        <img class="selamatDatang" src="img/Museum (web).png" alt="" style="">
      </div>

      <div class="d-flex mt-4">
        <!-- <button class="btn btn-sm">Jadwal Kunjungan</button> -->
        <a href="" class="btn-get-started scrollto btn-sm" data-toggle="modal" data-target="#modalJadwal">Jadwal</a>
      </div>
    </div>
  </section>
  <!-- End Hero -->

  <!-- <a href="#" class="btn-get-started scrollto" data-toggle="modal" data-target="#modalJadwal">Jadwal Kunjungan</a> -->

<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="modalJadwal" tabindex="-1" aria-labelledby="modalJadwal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalJadwal">Jadwal Kunjungan</h1>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
        
      </div>
      <div class="modal-body">
        <!-- ...Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> -->
        <!-- <h2>Jadwal Kunjungan</h2> -->
        <p style="font-family: georgia;"></p>
        <table>
          <tr>
            <td >Senin</td>
            <td >: </td>
            <td > 10.00-16.00 WITA</td>
          </tr>
          <tr>
            <td>Selasa - Kamis   </td>
            <td >: </td>
            <td> 08.00-16.00 WITA</td>
          </tr>
          <tr>
            <td>Jumat   </td>
            <td>: </td>
            <td> 09.00-17.00 WITA</td>
          </tr>
          <tr>
            <td>Sabtu - Minggu   </td>
            <td >: </td>
            <td> 09.00-17.00 WITA</td>
          </tr>

        </table>

        <p class="mt-4" style="color: #850000;">*Museum Tutup pada hari libur nasional</p>
        <h5>Harga Tiket</h5>
        <table>
          <tr>
            <td class="mx-4">Dewasa</td>
            <td>: </td>
            <td>Rp. 4000</td>
          </tr>
          <tr>
            <td>Anak  </td>
            <td>: </td>
            <td>Rp. 2000</td>
          </tr>
          <tr>
            <td>Wisman   </td>
            <td>: </td>
            <td>Rp. 7000</td>
          </tr>
          

        </table>
        <p class="mt-4" style="color: #850000;">*Bagi pengunjung rombongan mohon hubungi nara
        hubung atau kirim surat melalui email ke<span>museumntb@gmail.com</span>  terlebih dahulu.
        </p>     
      </div>
      
      <!-- <div class="modal-footer"> -->
      <!-- <h1 class="modal-title fs-5" id="modalJadwal">Jadwal Kunjungan</h1> -->
      
         
      <!-- </div> -->
    </div>
  </div>
</div>

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <?php foreach($beritaterbaru as $b): ?>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon2 mb-4"><img src="<?= base_url("img/berita/". $b['foto']); ?>" alt="" ></div>
              <h3 class="title" ><a href="<?= base_url("/lihatberita/{$b['id_berita']}"); ?>" style="font-family: 'cambria';"><?= $b['judul']; ?></a></h3>
              <!-- <p class="description" style="font-family: georgia;"></p> -->
            </div>
          </div>
          <!-- s -->
          <?php endforeach; ?>
          

          

        </div>

      </div>
    </section>
    <!-- End Featured Services Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Event</h2>
          <h3>Pantau Terus <span>Event Kami</span></h3>
          <!-- <p>Museum Dihatiku</p> -->
        </div>

          <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000" loop="loop">
            
            <div class="carousel-inner">
                

                <?php 
                                       
                foreach($kegiatan as $k):
                if ($k['tampilkan'] == 'Home'): ?> 
                <div class="carousel-item active">
                <img src="<?= base_url('img/kegiatan/' . $k['foto']); ?>" class="d-block w-100" alt="...">
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
                
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
          </div>

        <!-- <div class="row">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li>
                <i class="bx bx-store-alt"></i>
                <div>
                  <h5>Ullamco laboris nisi ut aliquip consequat</h5>
                  <p>Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade</p>
                </div>
              </li>
              <li>
                <i class="bx bx-images"></i>
                <div>
                  <h5>Magnam soluta odio exercitationem reprehenderi</h5>
                  <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata redi</p>
                </div>
              </li>
            </ul>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p>
          </div>
        </div> -->

      </div>
    </section><!-- End About Section -->

    

    <!-- ======= Skills Section ======= -->
    <!-- <section id="skills" class="skills">
      <div class="container" data-aos="fade-up">

        <div class="row skills-content">

          <div class="col-lg-6">

            <div class="progress">
              <span class="skill">HTML <i class="val">100%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">CSS <i class="val">90%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">JavaScript <i class="val">75%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">

            <div class="progress">
              <span class="skill">PHP <i class="val">80%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">WordPress/CMS <i class="val">90%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">Photoshop <i class="val">55%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section> -->
    <!-- End Skills Section -->

  <!-- <div id="portfolio" class="my-4">
    <div class="section-title">
          <h2>Galery</h2>

        </div>
    <div class="container-fluid p-0 ">
        <div class="row g-0">
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/taman.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/taman.png" alt="..." />
                    
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/pameran.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/pameran.png" alt="..." />
                    
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/perpus.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/perpus.png" alt="..." />
                    
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/pameran.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/pameran.png" alt="..." />
                    
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/perpus.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/perpus.png" alt="..." />
                    
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/perpus.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/perpus.png" alt="..." />
                    
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0 ">
        <div class="row g-0">
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/taman.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/taman.png" alt="..." />
                    
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/pameran.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/pameran.png" alt="..." />
                    
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/perpus.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/perpus.png" alt="..." />
                    
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/pameran.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/pameran.png" alt="..." />
                    
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/perpus.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/perpus.png" alt="..." />
                    
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/perpus.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/perpus.png" alt="..." />
                    
                </a>
            </div>
        </div>
    </div>
  </div> -->

      <!-- ======= Gallery Section ======= -->
      <section id="gallery" class="gallery">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Gallery</h2>
          </div>

          <div class="gallery-slider swiper">
            <div class="swiper-wrapper align-items-center">
            <?php 
                foreach($gallery as $g): ?>
              <div class="swiper-slide"><a class="gallery-lightbox" href="img/landingPage/taman.png"><img src="<?= base_url("img/galery/". $g['foto']); ?>" class="img-fluid" alt=""></a></div>
              
             <?php endforeach; ?>
            </div>
            
            <div class="swiper-pagination"></div> 
          </div>

        </div>
      </section>
      <!-- End Gallery Section -->








    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <!-- <h3><span>Kontak Kami</span></h3> -->
          <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4" style="font-family: georgia;">
              <i class="bx bx-map"></i>
              <h3 >Alamat Kami</h3>
              <p>Jl. Panji Tilar Negara No.6, Taman Sari, <br>
                Kec. Ampenan, Kota Mataram, Nusa Tenggara Bar. 83117</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p style="font-family: georgia;">contact@example.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Kontak</h3>
              <p>+1 5589 55488 55</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-6 ">
            <!-- <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe> -->
          <!-- </div> -->
            <!-- <iframe class="mb-4 mb-lg-0"  frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen><img src="" alt=""></iframe> -->
                <a href="https://maps.app.goo.gl/TNpYD6rsCVoRjdAi6"><img src="img/landingPage/map.png" alt="" style="border:0; width: 100%; height: 384px;"></a>
        </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anda" required>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Judul" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Sebagai Sahabat Museum, tuliskan pesan dan kesan anda" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Kirim Pesan</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
    <script>
    const myModal = new bootstrap.Modal(document.getElementById('modalJadwal'), options)
    // or
    const myModalAlternative = new bootstrap.Modal('#modalJadwal', options)
   </script>
   
  <?= $this->endSection(); ?>  


