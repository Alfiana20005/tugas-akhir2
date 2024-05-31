<?= $this->extend('landingPage/template baru'); ?>

<?= $this-> section('content'); ?>
<!-- start banner Area -->
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
		<div class="container">				
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
								Koleksi		
					</h1>	
					<p class="text-white link-nav"><a href="/home">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/koleksi_page2"> Koleksi</a></p>
				</div>	
			</div>
		</div>
</section>
<!-- End banner Area -->	

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio pt-30">
      <div class="container">


        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">

          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <?php foreach($koleksi as $k): ?>  
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                <img src="<?= base_url("img/koleksiAdmin/". $k['foto']); ?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4><?= $k['nama']; ?></h4>
                    <p><?= $k['kategori']; ?></p>
                </div>
                
                <div class="portfolio-links">
                    <a href="<?= base_url("img/koleksiAdmin/". $k['foto']); ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?= $k['nama']; ?>"><i class="fa fa-plus"></i></a>
                    <a href="<?= base_url("/koleksi_detail2/{$k['id_koleksi']}"); ?>" title="More Details"><i class="fa fa-link"></i></a>
                </div>
                </div>
            </div>
            <?php endforeach; ?> 
        </div>

      </div>
    </section><!-- End Portfolio Section -->

<?= $this->endSection(); ?>  