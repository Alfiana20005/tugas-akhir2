
<?= $this->extend('landingPage/template baru'); ?>

<?= $this-> section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
		<div class="container">				
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
								Terjemahan Manuskrip		
					</h1>	
					<p class="text-white link-nav"><a href="/home">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/Manuskrip">Manuskrip</a></p>
				</div>	
			</div>
		</div>
</section>
<!-- End banner Area -->	

			<!-- End banner Area -======= Our Team Section ======= -->
            <section id="team" class="team section-bg">
        <div class="container">
            
          
            

            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-9">
                  <div class="title text-center">
                    <!-- <h1 class="mb-10">Tim Kami</h1> -->
                    <!-- <a href="/semuaPetugas" style="color: #850000;"><p>Lihat Semua Tim</p></a> -->
                  </div>
                </div>
            </div>	

            <div class="row">
            <?php foreach($manuskrip as $m):?> 
              <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
                <div class="member" data-aos="fade-up">
                  <div class="member-img">
                    <img src="<?= base_url("img/manuskrip/". $m['foto']); ?>" class="img-fluid"  alt="">
                    <!-- <div class="social">
                      <a href=""><i class="bi bi-twitter"></i></a>
                      <a href=""><i class="bi bi-facebook"></i></a>
                      <a href=""><i class="bi bi-instagram"></i></a>
                      <a href=""><i class="bi bi-linkedin"></i></a>
                    </div> -->
                  </div>
                  <div class="member-info">
                    <h6><a href="<?= $m['link']; ?>" target="_blank" style="color:#850000;"><?= $m['judul']; ?></a></h6>
                    <span><?= $m['tanggal']; ?></span>
                  </div>
                </div>
              </div>

              <?php endforeach; ?>

              

            </div>
            

        </div>
    </section><!-- End Our Team Section -->



<?= $this->endSection(); ?>  