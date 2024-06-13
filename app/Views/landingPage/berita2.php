<?= $this->extend('landingPage/template baru'); ?>

<?= $this-> section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
		<div class="container">				
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
								Berita		
					</h1>	
					<p class="text-white link-nav"><a href="/home">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/berita2"> Berita</a></p>
				</div>	
			</div>
		</div>
</section>
<!-- End banner Area -->	


			<!-- Start post-content Area -->
			<section class="post-content-area pt-60">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 posts-list">
							 
							<div class="single-post row d-flex">

								<?php 
								foreach($dataBerita as $b):
								if ($b['type'] == 'Narasi'): ?>  
								<div class="col-lg-4 col-md-12 my-2">
									<div class="feature-img mb-2">
										<img class="img-fluid"  src="<?= base_url("img/berita/". $b['foto']); ?>" alt="">
									</div>
									<a class="posts-title" href="<?= base_url("/lihatberita2/{$b['id_berita']}"); ?>"><h5><?= $b['judul']; ?></h5></a>
									<p><?= $b['tanggal']; ?></p>
									<p class="excert"><?= $b['isi_pendek']; ?></p>
									<a href="<?= base_url("/lihatberita2/{$b['id_berita']}"); ?>" class="primary-btn">View More</a>
								</div>
								<?php endif; ?>
                			<?php endforeach; ?>
							</div>
							
							


						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
								
								<div class="single-sidebar-widget popular-post-widget">
									<h4 class="popular-title">Berita Terkait</h4>
									<!-- <a href="#" class="genric-btn primary-border my-2">  Regional  </a>
									<a href="#" class="genric-btn primary-border my-2">  Nasional  </a> -->
									<form method="POST" action="">
									<div id="kategoriBerita" class="col-lg-12 d-flex">
										<button   class="genric-btn primary-border small my-2 mx-2 <?= $kategoriBerita == 'Regional' ? 'active' : '' ?>" name="kategoriBerita" value="Regional" >Regional</button>
										<button  class="genric-btn primary-border small my-2  mx-2 <?= $kategoriBerita == 'Nasional' ? 'active' : '' ?>" name="kategoriBerita" value="Nasional">Nasional</button>
									</div>
									</form>

									<div class="popular-post-list">
										<?php 
										foreach($berita as $b):
										if ($b['type'] == 'Link'): ?>
										<div class="single-post-list d-flex flex-row align-items-center">
											<div class="thumb">
												<img class="img-fluid" src="img/blog/pp1.jpg" alt="">
											</div>
											<div class="details">
												<a href="<?= $b['isi'] ?>" target="_blank"><h6>> <?= $b['judul']; ?></h6></a>
												<p><?= $b['tanggal']; ?></p>
											</div>
										</div>
										<?php endif; ?>
               							<?php endforeach; ?>
														
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->

<?= $this->endSection(); ?>  