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

			<!-- Start top-category-widget Area -->
			<!-- <section class="top-category-widget-area pt-90 pb-90 ">
				<div class="container">
					<div class="row">		
						<div class="col-lg-4">
							<div class="single-cat-widget">
								<div class="content relative">
									<div class="overlay overlay-bg"></div>
								    <a href="#" target="_blank">
								      <div class="thumb">
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/blog/cat-widget1.jpg" alt="">
								  	  </div>
								      <div class="content-details">
								        <h4 class="content-title mx-auto text-uppercase">Social life</h4>
								        <span></span>								        
								        <p>Enjoy your social life together</p>
								      </div>
								    </a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-cat-widget">
								<div class="content relative">
									<div class="overlay overlay-bg"></div>
								    <a href="#" target="_blank">
								      <div class="thumb">
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/blog/cat-widget2.jpg" alt="">
								  	  </div>
								      <div class="content-details">
								        <h4 class="content-title mx-auto text-uppercase">Politics</h4>
								        <span></span>								        
								        <p>Be a part of politics</p>
								      </div>
								    </a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-cat-widget">
								<div class="content relative">
									<div class="overlay overlay-bg"></div>
								    <a href="#" target="_blank">
								      <div class="thumb">
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/blog/cat-widget3.jpg" alt="">
								  	  </div>
								      <div class="content-details">
								        <h4 class="content-title mx-auto text-uppercase">Food</h4>
								        <span></span>
								        <p>Let the food be finished</p>
								      </div>
								    </a>
								</div>
							</div>
						</div>												
					</div>
				</div>	
			</section> -->
			<!-- End top-category-widget Area -->
			
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
							
							

							<!-- <div class="single-post row">
								<div class="col-lg-3  col-md-3 meta-details">
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
								</div>
								<div class="col-lg-9 col-md-9">
									<div class="feature-img">
										<img class="img-fluid" src="img/blog/feature-img3.jpg" alt="">
									</div>
									<a class="posts-title" href="blog-single.html"><h3>The Glossary Of Telescopes</h3></a>
									<p class="excert">
										MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.
									</p>
									<a href="blog-single.html" class="primary-btn">View More</a>
								</div>
							</div>
							<div class="single-post row">
								<div class="col-lg-3  col-md-3 meta-details">
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
								</div>
								<div class="col-lg-9 col-md-9">
									<div class="feature-img">
										<img class="img-fluid" src="img/blog/feature-img4.jpg" alt="">
									</div>
									<a class="posts-title" href="blog-single.html"><h3>The Night Sky</h3></a>
									<p class="excert">
										MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.
									</p>
									<a href="blog-single.html" class="primary-btn">View More</a>
								</div>
							</div>
							<div class="single-post row">
								<div class="col-lg-3 col-md-3 meta-details">
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
								</div>
								<div class="col-lg-9 col-md-9">
									<div class="feature-img">
										<img class="img-fluid" src="img/blog/feature-img5.jpg" alt="">
									</div>
									<a class="posts-title" href="blog-single.html"><h3>Telescopes 101</h3></a>
									<p class="excert">
										MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.
									</p>
									<a href="blog-single.html" class="primary-btn">View More</a>
								</div>
							</div>														 -->
		                    <!-- <nav class="blog-pagination justify-content-center d-flex">
		                        <ul class="pagination">
		                            <li class="page-item">
		                                <a href="#" class="page-link" aria-label="Previous">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-left"></span>
		                                    </span>
		                                </a>
		                            </li>
		                            <li class="page-item"><a href="#" class="page-link">01</a></li>
		                            <li class="page-item active"><a href="#" class="page-link">02</a></li>
		                            <li class="page-item"><a href="#" class="page-link">03</a></li>
		                            <li class="page-item"><a href="#" class="page-link">04</a></li>
		                            <li class="page-item"><a href="#" class="page-link">09</a></li>
		                            <li class="page-item">
		                                <a href="#" class="page-link" aria-label="Next">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-right"></span>
		                                    </span>
		                                </a>
		                            </li>
		                        </ul>
		                    </nav> -->
						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
								<!-- <div class="single-sidebar-widget search-widget">
									<form class="search-form" action="#">
			                            <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" >
			                            <button type="submit"><i class="fa fa-search"></i></button>
			                        </form>
								</div> -->
								<!-- <div class="single-sidebar-widget user-info-widget">
									<img src="img/blog/user-info.png" alt="">
									<a href="#"><h4>Charlie Barber</h4></a>
									<p>
										Senior blog writer
									</p>
									<ul class="social-links">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-github"></i></a></li>
										<li><a href="#"><i class="fa fa-behance"></i></a></li>
									</ul>
									<p>
										Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits detractors.
									</p>
								</div> -->
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
												<a href="<?= $b['isi'] ?>" target="_blank"><h6>- <?= $b['judul']; ?></h6></a>
												<p><?= $b['tanggal']; ?></p>
											</div>
										</div>
										<?php endif; ?>
               							<?php endforeach; ?>
														
									</div>
								</div>
								<!-- <div class="single-sidebar-widget ads-widget">
									<a href="#"><img class="img-fluid" src="img/blog/ads-banner.jpg" alt=""></a>
								</div>
								<div class="single-sidebar-widget post-category-widget">
									<h4 class="category-title">Post Catgories</h4>
									<ul class="cat-list">
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Technology</p>
												<p>37</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Lifestyle</p>
												<p>24</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Fashion</p>
												<p>59</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Art</p>
												<p>29</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Food</p>
												<p>15</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Architecture</p>
												<p>09</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Adventure</p>
												<p>44</p>
											</a>
										</li>															
									</ul>
								</div>	
								<div class="single-sidebar-widget newsletter-widget">
									<h4 class="newsletter-title">Newsletter</h4>
									<p>
										Here, I focus on a range of items and features that we use in life without
										giving them a second thought.
									</p>
									<div class="form-group d-flex flex-row">
									   <div class="col-autos">
									      <div class="input-group">
									        <div class="input-group-prepend">
									          <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i>
											</div>
									        </div>
									        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" >
									      </div>
									    </div>
									    <a href="#" class="bbtns">Subcribe</a>
									</div>	
									<p class="text-bottom">
										You can unsubscribe at any time
									</p>								
								</div>
								<div class="single-sidebar-widget tag-cloud-widget">
									<h4 class="tagcloud-title">Tag Clouds</h4>
									<ul>
										<li><a href="#">Technology</a></li>
										<li><a href="#">Fashion</a></li>
										<li><a href="#">Architecture</a></li>
										<li><a href="#">Fashion</a></li>
										<li><a href="#">Food</a></li>
										<li><a href="#">Technology</a></li>
										<li><a href="#">Lifestyle</a></li>
										<li><a href="#">Art</a></li>
										<li><a href="#">Adventure</a></li>
										<li><a href="#">Food</a></li>
										<li><a href="#">Lifestyle</a></li>
										<li><a href="#">Adventure</a></li>
									</ul>
								</div>								 -->
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->

<?= $this->endSection(); ?>  