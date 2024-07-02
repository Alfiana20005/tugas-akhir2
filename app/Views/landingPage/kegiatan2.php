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
			<section class="post-content-area pt-60">
			
				<div class="container">
					
					<!-- <button class="genric-btn primary small col-lg-3"> 
						<div>Museum Talk</div>
						
					</button> -->
					
					<div class="row">
						<div class="col-lg-8 posts-list">
							<div class="single-post row d-flex">

							<?php 
							foreach($kegiatan as $k):
							if ($k['tampilkan'] == 'Kegiatan'): ?>		
									<div class="col-lg-4 col-md-12 my-2">
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
						
						
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
								<div class="single-sidebar-widget post-category-widget">
									<h4 class="category-title">Kategori</h4>
									<ul class="cat-list">
										
										<li>
											<a href="/kegiatanKategori2/Museum Talk" class="d-flex justify-content-between">
												<p>Museum Talk</p>
												<!-- <p>59</p> -->
											</a>
										</li>
										<li>
											<a href="/kegiatanKategori2/Museum Jalan-Jalan" class="d-flex justify-content-between">
												<p>Museum Jalan-Jalan</p>
												<!-- <p>29</p> -->
											</a>
										</li>
										<li>
											<a href="/kegiatanKategori2/Belajar Koleksi" class="d-flex justify-content-between">
												<p>Belajar Koleksi</p>
												<!-- <p>15</p> -->
											</a>
										</li>
										<li>
											<a href="/kegiatan2" class="d-flex justify-content-between">
												<p>Semua Kegiatan</p>
												<!-- <p>15</p> -->
											</a>
										</li>
										
										
									</ul>
								</div>	

							</div>
						</div>
						
					</div>

				</div>	

			</section>
			<!-- End popular-destination Area -->

			
			



<?= $this->endSection(); ?>  