<?= $this->extend('landingPage/template baru'); ?>

<?= $this-> section('content'); ?>



<!-- start banner Area -->
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
		<div class="container">				
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
								Kegiatan		
					</h1>	
					<p class="text-white link-nav"><a href="/home">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/kegiatan2"> Kegiatan</a></p>
				</div>	
			</div>
		</div>
</section>
<!-- End banner Area -->	

			<!-- Start popular-destination Area -->
			<section class="popular-destination-area section-gap">
				<div class="container">
					
					<div class="row">
                    <?php 
                foreach($kegiatan as $k):
                if ($k['tampilkan'] == 'Kegiatan'): ?>		
						<div class="col-lg-3 my-2">
							<div class="single-destination relative">
								<div class="thumb relative">
									<!-- <div class="overlay overlay-bg"></div> -->
									<a href="<?= $k['keterangan']; ?>"  target="_blank"><img class="img-fluid" src="<?= base_url("img/kegiatan/". $k['foto']); ?>" alt=""></a>
								</div>
								<div class="desc">	
									
									<!-- <a href="<?= $k['keterangan']; ?>"><h4><?= $k['judul']; ?></h4></a> -->
									
								</div>
							</div>
						</div>
                        <?php endif; ?>
                <?php endforeach; ?>   
											
					</div>
				</div>	

        
			</section>
			<!-- End popular-destination Area -->
			



<?= $this->endSection(); ?>  