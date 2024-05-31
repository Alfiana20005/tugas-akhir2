<?= $this->extend('landingPage/template baru'); ?>

<?= $this-> section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
		<div class="container">				
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
								Detail Koleksi		
					</h1>	
					<p class="text-white link-nav"><a href="/home">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/koleksi_page2"> koleksi</a></p>
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
								<!-- <div class="col-lg-3  col-md-3 meta-details">
									<ul class="tags">
										<li><a href="#">Food,</a></li>
										<li><a href="#">Technology,</a></li>
										<li><a href="#">Politics,</a></li>
										<li><a href="#">Lifestyle</a></li>
									</ul>
									<div class="user-details row">
										<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Mark wiens</a> <span class="lnr lnr-user"></span></p>
										<p class="date col-lg-12 col-md-12 col-6"><a href="#">12 Dec, 2017</a> <span class="lnr lnr-calendar-full"></span></p>
										<p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span class="lnr lnr-eye"></span></p>
										<p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span class="lnr lnr-bubble"></span></p>						
									</div>
								</div> -->
								 
								<div class="col-lg-12 col-md-12 ">
									<div class="feature-img mb-2">
										<img class="img-fluid"  src="<?= base_url("img/koleksiAdmin/". $koleksi['foto']); ?>" alt="">
									</div>
									<!-- -->
								</div>
					
							</div>
							
							


						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">

                            <div class="single-sidebar-widget post-category-widget">
									<h4 class="category-title">Detail Koleksi</h4>
									<ul class="cat-list">
										<li>
											<a href="/kajian2" class="d-flex justify-content-between">
												<p></p>
												<!-- <p>37</p> -->
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Nama : <?= $koleksi['nama']; ?></p>
												<!-- <p>24</p> -->
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Nomor : <?= $koleksi['no']; ?></p>
												<!-- <p>59</p> -->
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Ukuran : </p>
												
											</a>
                                            <p><?= $koleksi['ukuran']; ?> </p>
										</li>
										
										<li>
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
									
											<a href="#" class="d-flex justify-content-between">
												<p>Deskripsi : </p>
												
											</a>
                                            <p><?= nl2p($koleksi['deskripsi']); ?> </p>
										</li>															
									</ul>
								</div>	

							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->

<?= $this->endSection(); ?>  