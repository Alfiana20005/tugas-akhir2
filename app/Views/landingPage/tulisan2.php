<?= $this->extend('landingPage/template baru'); ?>

<?= $this-> section('content'); ?>

<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
		<div class="container">				
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
								Tulisan Museum		
					</h1>	
					<p class="text-white link-nav"><a href="/home">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/kajian2"> Tulisan Museum</a></p>
				</div>	
			</div>
		</div>
</section>
			
			<!-- Start post-content Area -->
			<section class="post-content-area single-post-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 posts-list">
							<div class="single-post row">
								<div class="col-lg-12">
									<div class="feature-img">
										<img class="img-fluid" src="<?= base_url('img/kajian/' . $kajian['sampul']); ?>" alt="">
									</div>									
								</div>
								
								<div class="col-lg-12 col-md-12">
									<h3 class="mt-20 mb-20"><?= $kajian['judul']; ?></h3>
									<p ><?= $kajian['created_at']; ?></p>
                                    <?php 
                                    foreach($isiKajian as $data):
                                    ?>
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
									<p class="excert " ><?= nl2p($data['narasi']); ?></p>
                                    <div class="d-flex align-items-center justify-content-center my-4"> 
                                        <img src="<?= base_url("img/kajian/". $data['foto']); ?>" class="img-fluid" alt="" style="width: 300px; ">
                                    </div>
									<?php endforeach; ?>
								</div>

							</div>

						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
                                <div class="single-sidebar-widget post-category-widget">
									<h4 class="category-title">Kategori Tulisan</h4>
									<ul class="cat-list">
										
										<li>
											<a href="/kajianKategori2/Kajian Koleksi" class="d-flex justify-content-between">
												<p>Kajian Koleksi</p>
												<!-- <p>59</p> -->
											</a>
										</li>
										<li>
											<a href="/kajianKategori2/Kajian Budaya" class="d-flex justify-content-between">
												<p>Kajian Budaya</p>
												<!-- <p>29</p> -->
											</a>
										</li>
										<li>
											<a href="/kajianKategori2/Permuseuman" class="d-flex justify-content-between">
												<p>Permuseuman</p>
												<!-- <p>15</p> -->
											</a>
										</li>
										<li>
											<a href="/kajianKategori2/Resensi Buku" class="d-flex justify-content-between">
												<p>Resensi Buku</p>
												<!-- <p>09</p> -->
											</a>
										</li>
										<li>
											<a href="/kajianKategori2/Artikel" class="d-flex justify-content-between">
												<p>Artikel</p>
												<!-- <p>09</p> -->
											</a>
										</li>
										<li>
											<a href="/kajianKategori2/Opini" class="d-flex justify-content-between">
												<p>Opini</p>
												<!-- <p>24</p> -->
											</a>
										</li>
										<li>
											<a href="/kajian2" class="d-flex justify-content-between">
												<p>Semua Kajian</p>
												<!-- <p>37</p> -->
											</a>
										</li>
										
										<!-- <li>
											<a href="#" class="d-flex justify-content-between">
												<p>Adventure</p>
												<p>44</p>
											</a>
										</li>															 -->
									</ul>
								</div>

                                <div class="single-sidebar-widget popular-post-widget">
									<h4 class="popular-title">Tulisan Terbaru</h4>
                                    <?php 
                                    foreach ($kajianTerbaru as $kajian): {
                                
                                    } ?>
									<div class="popular-post-list">
                                    
										<div class="single-post-list d-flex flex-row align-items-center">
											<div class="thumb">
												<img class="img-fluid" style="width: 80px;" src="<?= base_url("img/kajian/". $kajian['sampul']); ?>" alt="">
											</div>
											<div class="details">
												<a href="<?= base_url("/tulisan2/{$kajian['id_kajian']}"); ?>"><h6><?= $kajian['judul']; ?></h6></a>
												<p><?= $kajian['created_at']; ?></p>
											</div>
										</div>
                                    															
									</div>
                                    <?php endforeach; ?>
								</div>
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
								</div> -->
								<!-- <div class="single-sidebar-widget tag-cloud-widget">
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