<?= $this->extend('landingPage/template baru'); ?>

<?= $this-> section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
		<div class="container">				
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
								Publikasi		
					</h1>	
					<p class="text-white link-nav"><a href="/home">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/publikasi2"> Publikasi</a></p>
				</div>	
			</div>
		</div>
</section>
<!-- End banner Area -->	

			<!-- Start destinations Area -->
			<section class="destinations-area section-gap">
				<div class="container">
		            <!-- <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-40 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Popular Destinations</h1>
		                        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, day to.</p>
		                    </div>
		                </div>
		            </div>						 -->
					<div class="row">
                        <div class="active-recent-blog-carusel">
                        <?php foreach($publikasi as $p):?> 
                            <div class="">
                            
                                <div class="single-destinations">
                                    <div class="thumb">
                                        <img src="<?= base_url("img/publikasi/". $p['foto']); ?>" alt="">
                                    </div>
                                    <div class="details">
                                        <h4 class="d-flex justify-content-between">
                                            <a href="<?= $p['link']; ?>" target="_blank" style="color:#850000;"><span><?= $p['judul']; ?></span>  </a>                            	
                                            <!-- <div class="star">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>				
                                            </div>	 -->
                                        </h4>
                                        <p>
                                            <?= $p['tanggal']; ?>  
                                        </p>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <?php endforeach; ?>
                        </div>
																												
					</div>
				</div>	
			</section>
			<!-- End destinations Area -->

<?= $this->endSection(); ?>  