<?= $this->extend('landingPage/template baru'); ?>

<?= $this-> section('content'); ?>

<!-- start banner Area -->
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
			<section class="post-content-area pt-30">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 posts-list">

                        	<!-- Start other-issue Area -->
                            <!-- <section class="other-issue-area ">
                                <div class="container">	
                                    <div class="row">
                                        <?php 
                                        foreach($kajian as $kj):
                                        ?>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="single-other-issue">
                                                <div class="thumb">
                                                    <img class="img-fluid" src="<?= base_url("img/kajian/". $kj['sampul']); ?>" alt="">					
                                                </div>
                                                <a href="#">
                                                    <h4><?= $kj['judul']; ?></h4> 
                                                </a>
                                                <p>
                                                    <?= $kj['created_at']; ?>
                                                </p>
                                                <p>
                                                    <?= $kj['kategori']; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>

																
                                    </div>
                                </div>	
                            </section> -->
                            <!-- End other-issue Area -->
                            	
                            <!-- Start blog Area -->
                            <section class="recent-blog-area ">
                                <div class="container">
                                                            
                                    <div class="row">
                                        <div class="active-recent-blog-carusel">
                                        <?php 
                                                        foreach($kajian as $kj):
                                                        ?>
                                            <div class="single-recent-blog-post item">
                                                <div class="thumb">
                                                    <img class="img-fluid" src="<?= base_url("img/kajian/". $kj['sampul']); ?>" alt="">
                                                </div>
                                                <div class="details">
                                                   
                                                    <a href="<?= base_url("/tulisan2/{$kj['id_kajian']}"); ?>"><h4 class="title"><?= $kj['judul']; ?></h4></a>
                                                    <!-- <p>
                                                        Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
                                                    </p> -->
                                                    <h6 class="date"><?= $kj['created_at']; ?></h6>
                                                    <div class="tags">
                                                        <ul>
                                                            <li>
                                                                <a href="#"><?= $kj['penulis']; ?></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><?= $kj['kategori']; ?></a>
                                                            </li>											
                                                        </ul>
                                                    </div>
                                                </div>	
                                            </div>
                                            <?php endforeach; ?>
                                                                

                                        </div>
                                    </div>
                                </div>	
                            </section>
                            <!-- End recent-blog Area -->		

                            

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

							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->

<?= $this->endSection(); ?>  