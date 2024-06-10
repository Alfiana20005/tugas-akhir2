
<?= $this->extend('landingPage/template baru'); ?>

<?= $this-> section('content'); ?>      

            <!-- start banner Area -->
			<section class="banner-area relative">
				<video class="video-background" autoplay muted loop>
					<source src="landingPage/img/video.mp4" type="video/mp4">
					Your browser does not support the video tag.
				</video>
				<div class="overlay overlay-bg">
        
        		</div>		
        
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						<div class="col-lg-6 col-md-6 banner-left">
							<h3 class="text-white" id="selamatdatang" >Selamat Datang</h3>
							<h1 class="text-white" style="margin-top: 0px; margin-bottom: 0px;">MUSEUM NEGERI</h1>
							<h3 class="text-white" id="ntb"><span class="typed-words"></span></h3>
							<!-- <p class="text-white">Kota u Museum Ku Kampung Ku Museum Ku</p> -->
							<a href="#" id="kmkm" class="primary-btn text-uppercase mt-4">Kotaku Museumku Kampungku Museumku</a>
						</div>
						<div class="col-lg-4 col-md-6 banner-right">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item">
							    <!-- <a class="nav-link active" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true">Jadwal</a> -->
							    <a class="nav-link hover" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true">Jadwal</a>
							  
								</li>
							  <li class="nav-item">
							    <a class="nav-link" id="hotel-tab" data-toggle="tab" href="#hotel" role="tab" aria-controls="hotel" aria-selected="false">Tiket</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="holiday-tab" data-toggle="tab" href="#holiday" role="tab" aria-controls="holiday" aria-selected="false">Tata Tertib</a>
							  </li>
							</ul>
							<div class="tab-content" id="myTabContent">
							  <!-- <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab"> -->
							  <div class="tab-pane fade  " id="flight" role="tabpanel" aria-labelledby="flight-tab">
								<form class="form-wrap">
                                    <table style="text-align: left;">
                                        <tr>
                                        <td >Senin</td>
                                        <td >: </td>
                                        <td > 10.00-16.00 WITA</td>
                                        </tr>
                                        <tr>
                                        <td>Selasa - Kamis   </td>
                                        <td >: </td>
                                        <td> 08.00-16.00 WITA</td>
                                        </tr>
                                        <tr>
                                        <td>Jumat   </td>
                                        <td>: </td>
                                        <td> 09.00-17.00 WITA</td>
                                        </tr>
                                        <tr>
                                        <td>Sabtu - Minggu   </td>
                                        <td >: </td>
                                        <td> 09.00-14.00 WITA</td>
                                        </tr>

                                    </table>

                                    <p class="mt-4" style="color: #850000;">*Museum Tutup pada hari libur nasional</p>						
								</form>
							  </div>
							  <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
								<form class="form-wrap">
                                    <table style="text-align: left;">
                                        <tr>
                                        <td class="mx-4">Dewasa</td>
                                        <td>: </td>
                                        <td>Rp. 4000</td>
                                        </tr>
                                        <tr>
                                        <td>Anak  </td>
                                        <td>: </td>
                                        <td>Rp. 2000</td>
                                        </tr>
                                        <tr>
                                        <td>Wisman   </td>
                                        <td>: </td>
                                        <td>Rp. 7000</td>
                                        </tr>
                                        

                                    </table>
                                    <p class="mt-4" style="color: #850000;">*Bagi pengunjung rombongan mohon hubungiterlebih dahulu nara
                                    hubung atau kirim surat melalui email ke <span>museumntb@gmail.com / museumnegeri@ntbprov.go.id</span>  
                                    </p>     								
								</form>							  	
							  </div>
							  <div class="tab-pane fade" id="holiday" role="tabpanel" aria-labelledby="holiday-tab">
								<form class="form-wrap">
                                    <table style="text-align: left;">
                                        <tr>
                                            <td ><img src="img/tataTertib/dont touch.png" style="width: 40px;" alt=""></td>
                                            <td > Dilarang Menyentuh Koleksi Museum </td>
                                        </tr>
										
                                        <tr>
                                            <td ><img src="img/tataTertib/dont eat.png" style="width: 40px;" alt=""></td>
                                            <td >Dilarang Makan dan Minum di Dalam Ruang Pameran</td>
                                        </tr>
                                        <tr>
                                            <td ><img src="img/tataTertib/dont run.png" style="width: 40px;" alt=""></td>
                                            <td >Dilarang Berlari di Area Pameran</td>
                                        </tr>
                                        <tr>
                                            <td ><img src="img/tataTertib/no pet.png" style="width: 40px;" alt=""></td>
                                            <td >Dilarang Membawa Hewan Peliharaan</td>
                                        </tr>
                                        <tr>
                                            <td ><img src="img/tataTertib/gabgae.png" style="width: 40px;" alt=""></td>
                                            <td >Dilarang Membuang Sampah Sembarangan</td>
                                        </tr>
                                        <tr>
                                            <td ><img src="img/tataTertib/dont smoke.png" style="width: 40px;" alt=""></td>
                                            <td >Dilarang Merokok</td>
                                        </tr>
                                        <tr>
                                            <td ><img src="img/tataTertib/no fire.png" style="width: 40px;" alt=""></td>
                                            <td >Dilarang Menyalakan Api</td>
                                        </tr>
                                        </table>							
								</form>							  	
							  </div>
							</div>
						</div>
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

            <!-- Start other-issue Area -->
			<section class="other-issue-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-9">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Berita Terkini</h1>
		                        <!-- <p>We all live in an age that belongs to the young at heart. Life that is.</p> -->
		                    </div>
		                </div>
		            </div>					
					<div class="row">
                        <?php 
							
							foreach($beritaterbaru as $b): 
							if ($b['type'] == 'Narasi'): ?>
						<div class="col-lg-3 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="<?= base_url("img/berita/". $b['foto']); ?>" alt="">					
								</div>
                                <br>
								<a href="<?= base_url("/lihatberita2/{$b['id_berita']}"); ?>">
									<h5 ><?= $b['judul']; ?></h5>
								</a>
								<p style="text-align: justify; color:#850000;">
                                <?= $b['tanggal']; ?>
								</p>
								<p style="text-align: justify;">
                                <?= $b['isi_pendek']; ?>
								</p>
							</div>
						</div>
                        <?php endif; ?>
							<?php endforeach; ?>
																	
					</div>
				</div>	
			</section>
			<!-- End other-issue Area -->

          			<!-- Start blog Area -->

			<!-- End recent-blog Area -->	

      		<!-- Start hot-deal Area -->
			<section class="hot-deal-area ">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Kegiatan Kami</h1>
		                        <p>Pantau terus kegiatan Musuem</p>
		                    </div>
		                </div>
		            </div>						
					<div class="row justify-content-center">
						<div class="col-lg-10 active-hot-deal-carusel">
							<?php 
								foreach($kegiatan as $k):
								if ($k['tampilkan'] == 'Home'): ?> 
								<div class="single-carusel">
									<div class="thumb relative">
										<div class="overlay"></div>
										<a href="<?= base_url('img/kegiatan/' . $k['foto']); ?>" class="img-gal"><img class="img-fluid" src="<?= base_url('img/kegiatan/' . $k['foto']); ?>" alt=""></a>
									</div>
									<!-- <div class="price-detials">
										<a href="#" class="price-btn">Starting From <span>$250</span></a>
									</div>
									<div class="details">
										<h4 class="text-white">Ancient Architecture</h4>
										<p class="text-white">
											Cairo, Egypt
										</p>
									</div>								 -->
								</div>
							<?php endif; ?>
							<?php endforeach; ?>
												
						</div>
					</div>
				</div>	
                

                <div class="whole-wrap">
				<div class="container">
                    <div class="section-top-border">
                    <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Gallery</h1>
		                        <p></p>
		                    </div>
		                </div>
		            </div>	
                                
                                <div class="row gallery-item">
                                <div class="active-recent-blog-carusel">
                                <?php 
                                        foreach($gallery as $g):
                                        ?>
                                    <div class="">
                                        <a href="<?= base_url('img/galery/' . $g['foto']); ?>" class="img-gal"><div class="single-gallery-image" style="background: url(<?= base_url('img/galery/' . $g['foto']); ?>);"></div></a>
                                    </div>
                                    <?php endforeach; ?>

                                </div>
                                </div>
                    </div>
                </div>
            </div>
			</section>
			<!-- End hot-deal Area -->
			


      





			<!-- Start popular-destination Area -->
			<!-- <section class="popular-destination-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Popular Destinations</h1>
		                        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, day.</p>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="<?= base_url();?>landingPage/img/d1.jpg" alt="">
								</div>
								<div class="desc">	
									<a href="#" class="price-btn">$150</a>			
									<h4>Mountain River</h4>
									<p>Paraguay</p>			
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="<?= base_url();?>landingPage/img/d2.jpg" alt="">
								</div>
								<div class="desc">	
									<a href="#" class="price-btn">$250</a>			
									<h4>Dream City</h4>
									<p>Paris</p>			
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="<?= base_url();?>landingPage/img/d3.jpg" alt="">
								</div>
								<div class="desc">	
									<a href="#" class="price-btn">$350</a>			
									<h4>Cloud Mountain</h4>
									<p>Sri Lanka</p>			
								</div>
							</div>
						</div>												
					</div>
				</div>	

        
			</section> -->
			<!-- End popular-destination Area -->
			

			<!-- Start price Area -->
			<!-- <section class="price-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">We Provide Affordable Prices</h1>
		                        <p>Well educated, intellectual people, especially scientists at all times demonstrate considerably.</p>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
						<div class="col-lg-4">
							<div class="single-price">
								<h4>Cheap Packages</h4>
								<ul class="price-list">
									<li class="d-flex justify-content-between align-items-center">
										<span>New York</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Maldives</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Sri Lanka</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Nepal</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Thiland</span>
										<a href="#" class="price-btn">$1500</a>
									</li>	
									<li class="d-flex justify-content-between align-items-center">
										<span>Singapore</span>
										<a href="#" class="price-btn">$1500</a>
									</li>														
								</ul>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-price">
								<h4>Luxury Packages</h4>
								<ul class="price-list">
									<li class="d-flex justify-content-between align-items-center">
										<span>New York</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Maldives</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Sri Lanka</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Nepal</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Thiland</span>
										<a href="#" class="price-btn">$1500</a>
									</li>	
									<li class="d-flex justify-content-between align-items-center">
										<span>Singapore</span>
										<a href="#" class="price-btn">$1500</a>
									</li>														
								</ul>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-price">
								<h4>Camping Packages</h4>
								<ul class="price-list">
									<li class="d-flex justify-content-between align-items-center">
										<span>New York</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Maldives</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Sri Lanka</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Nepal</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Thiland</span>
										<a href="#" class="price-btn">$1500</a>
									</li>	
									<li class="d-flex justify-content-between align-items-center">
										<span>Singapore</span>
										<a href="#" class="price-btn">$1500</a>
									</li>														
								</ul>
							</div>
						</div>												
					</div>
				</div>	
			</section> -->
			<!-- End price Area -->
			

			<!-- Start other-issue Area -->
			<!-- <section class="other-issue-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-9">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Other issues we can help you with</h1>
		                        <p>We all live in an age that belongs to the young at heart. Life that is.</p>
		                    </div>
		                </div>
		            </div>					
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="<?= base_url();?>landingPage/img/o1.jpg" alt="">					
								</div>
								<a href="#">
									<h4>Rent a Car</h4>
								</a>
								<p>
									The preservation of human life is the ultimate value, a pillar of ethics and the foundation.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="<?= base_url();?>landingPage/img/o2.jpg" alt="">					
								</div>
								<a href="#">
									<h4>Cruise Booking</h4>
								</a>
								<p>
									I was always somebody who felt quite sorry for myself, what I had not got compared.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="<?= base_url();?>landingPage/img/o3.jpg" alt="">					
								</div>
								<a href="#">
									<h4>To Do List</h4>
								</a>
								<p>
									The following article covers a topic that has recently moved to center stage–at least it seems.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="<?= base_url();?>landingPage/img/o4.jpg" alt="">					
								</div>
								<a href="#">
									<h4>Food Features</h4>
								</a>
								<p>
									There are many kinds of narratives and organizing principles. Science is driven by evidence.
								</p>
							</div>
						</div>																		
					</div>
				</div>	
			</section> -->
			<!-- End other-issue Area -->
			

			<!-- Start testimonial Area -->
		    <!-- <section class="testimonial-area section-gap">
		        <div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Testimonial from our Clients</h1>
		                        <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from </p>
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="active-testimonial">
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user1.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills, the bigger the payoff you.		     
		                            </p>
		                            <h4>Harriet Maxwell</h4>
	                            	<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>				
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user2.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                A purpose is the eternal condition for success. Every former smoker can tell you just how hard it is to stop smoking cigarettes. However.
		                            </p>
		                            <h4>Carolyn Craig</h4>
	                           		<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>			
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user1.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills, the bigger the payoff you.		     
		                            </p>
		                            <h4>Harriet Maxwell</h4>
	                            	<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>				
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user2.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                A purpose is the eternal condition for success. Every former smoker can tell you just how hard it is to stop smoking cigarettes. However.
		                            </p>
		                            <h4>Carolyn Craig</h4>
	                           		<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>			
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user1.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills, the bigger the payoff you.		     
		                            </p>
		                            <h4>Harriet Maxwell</h4>
	                            	<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>				
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user2.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                A purpose is the eternal condition for success. Every former smoker can tell you just how hard it is to stop smoking cigarettes. However.
		                            </p>
		                            <h4>Carolyn Craig</h4>
	                           		<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>			
									</div>	
		                        </div>
		                    </div>		                    		                    
		                </div>
		            </div>
		        </div>
		    </section> -->
		    <!-- End testimonial Area -->

			<!-- Start home-about Area -->
			<!-- <section class="home-about-area">
				<div class="container-fluid">
					<div class="row align-items-center justify-content-end">
						<div class="col-lg-6 col-md-12 home-about-left">
							<h1>
								Did not find your Package? <br>
								Feel free to ask us. <br>
								We‘ll make it for you
							</h1>
							<p>
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed.
							</p>
							<a href="#" class="primary-btn text-uppercase">request custom price</a>
						</div>
						<div class="col-lg-6 col-md-12 home-about-right no-padding">
							<img class="img-fluid" src="img/about-img.jpg" alt="">
						</div>
					</div>
				</div>	
			</section> -->
			<!-- End home-about Area -->
			
	
			<!-- Start blog Area -->
			<!-- <section class="recent-blog-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-9">
							<div class="title text-center">
								<h1 class="mb-10">Latest from Our Blog</h1>
								<p>With the exception of Nietzsche, no other madman has contributed so much to human sanity as has.</p>
							</div>
						</div>
					</div>							
					<div class="row">
						<div class="active-recent-blog-carusel">
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="img-fluid" src="img/b1.jpg" alt="">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											<li>
												<a href="#">Travel</a>
											</li>
											<li>
												<a href="#">Life Style</a>
											</li>											
										</ul>
									</div>
									<a href="#"><h4 class="title">Low Cost Advertising</h4></a>
									<p>
										Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="img-fluid" src="img/b2.jpg" alt="">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											<li>
												<a href="#">Travel</a>
											</li>
											<li>
												<a href="#">Life Style</a>
											</li>											
										</ul>
									</div>
									<a href="#"><h4 class="title">Creative Outdoor Ads</h4></a>
									<p>
										Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="img-fluid" src="img/b3.jpg" alt="">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											<li>
												<a href="#">Travel</a>
											</li>
											<li>
												<a href="#">Life Style</a>
											</li>											
										</ul>
									</div>
									<a href="#"><h4 class="title">It's Classified How To Utilize Free</h4></a>
									<p>
										Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>	
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="img-fluid" src="img/b1.jpg" alt="">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											<li>
												<a href="#">Travel</a>
											</li>
											<li>
												<a href="#">Life Style</a>
											</li>											
										</ul>
									</div>
									<a href="#"><h4 class="title">Low Cost Advertising</h4></a>
									<p>
										Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="img-fluid" src="img/b2.jpg" alt="">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											<li>
												<a href="#">Travel</a>
											</li>
											<li>
												<a href="#">Life Style</a>
											</li>											
										</ul>
									</div>
									<a href="#"><h4 class="title">Creative Outdoor Ads</h4></a>
									<p>
										Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="img-fluid" src="img/b3.jpg" alt="">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											<li>
												<a href="#">Travel</a>
											</li>
											<li>
												<a href="#">Life Style</a>
											</li>											
										</ul>
									</div>
									<a href="#"><h4 class="title">It's Classified How To Utilize Free</h4></a>
									<p>
										Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>														

						</div>
					</div>
				</div>	
			</section> -->
			<!-- End recent-blog Area -->		

			


<?= $this->endSection(); ?>  