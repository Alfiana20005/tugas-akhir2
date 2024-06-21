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
			<section class="post-content-area single-post-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 posts-list">
							<div class="single-post row">
								<div class="col-lg-12">
									<div class="feature-img">
										<img class="img-fluid" src="<?= base_url('img/berita/' . $berita['foto']); ?>" alt="">
									</div>
									<!-- <button class="genric-btn primary small d-flex" style="background-color: gray;">  -->
									 <div class="ket" id="ket" ><i class="fa-solid fa-camera" style="padding-right: 4pt;"> </i><?= $berita['ketgambar']; ?></div>
									
								<!-- </button>									 -->
								</div>
								
								<div class="col-lg-12 col-md-12">
									<h3 class="mt-20 mb-20"><?= $berita['judul']; ?></h3>
									<p ><i class="fa-solid fa-calendar-days" style="padding-right: 4pt;"></i> <?= $berita['tanggal']; ?></p>

									<?php
									function nl2p($text) {
										$text = trim($text);
										$paragraphs = explode("\n", $text);
										$text = '';
										foreach ($paragraphs as $paragraph) {
											$paragraph = trim($paragraph);
											if (!empty($paragraph)) {
												$text .= '<p>' . esc($paragraph) . '</p>';
											}
										}
										return $text;
									}

									?>
									<p class="excert " ><?= nl2p($berita['isi']); ?></p>
									
								</div>
								
							</div>
							
						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
								
								
								<div class="single-sidebar-widget popular-post-widget">
									<h4 class="popular-title">Berita Terkait</h4>
									<div class="popular-post-list">
										
                                        <?php 
										foreach($dataBerita as $b):
										if ($b['type'] == 'Link'): ?>
										<div class="single-post-list d-flex flex-row align-items-center">
											<div class="thumb">
												<img class="img-fluid" src="img/blog/pp1.jpg" alt="">
											</div>
											<div class="details">
												<a href="<?= $b['isi'] ?>"><h6><?= $b['judul']; ?></h6></a>
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