<?= $this->extend('landingPage/template baru'); ?>

<?= $this-> section('content'); ?>


<!-- start banner Area -->
<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Kontak Kami				
							</h1>	
							<p class="text-white link-nav"><a href="/home">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/kontak"> Kontak</a></p>
						</div>	
					</div>
				</div>
</section>
<!-- End banner Area -->	


			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<!-- <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div> -->
						<a href="https://maps.app.goo.gl/SWsce1nC6HhRKZ5v8" target="_blank"><img src="/img/map.png" alt="" class="img-map align-items-center justify-content-center pb-30" style="width:100%; height: 445px;"></a>
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>Museum MuseumNTB</h5>
									<p>
                                    Jl. Panji Tilar Negara No.6, <br>
                                    Taman Sari,Kec. Ampenan, Kota Mataram,
                                    Nusa Tenggara Barat. 83117 <br><br>
                                    
                                    </p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
								<h5>+62 897-3862-445</h5>
									<p>Humas</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
								<h5>museumnegeri@ntbprov.go.id</h5>
									<h5>museumntb@gmail.com</h5>
								</div>
							</div>														
							<div class="single-contact-address d-flex flex-row my-4">
								
								<div class="contact-details">

								<h5 class="mb-4">SOSIAL MEDIA</h5>
								<a href="" target="_blank" style="color:#850000; font-size:30px; font-weight:bold;"><i class="fa fa-facebook"></i></a>
								<a href="https://www.youtube.com/@museumntb1284" target="_blank" style="color:#850000; font-size:30px; font-weight:bold;"><i class="fa fa-youtube mx-4"></i></a>
								<a href="https://www.instagram.com/museumntb?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" style="color:#850000; font-size:30px; font-weight:bold;"><i class="fa fa-instagram"></i></a>
									
								</div>
							</div>														
						</div>
						<div class="col-lg-8">
							<form class="form-area contact-form text-right" id="myForm" action="mail.php" method="post">
								<div class="row">	
									<div class="col-lg-6 form-group">
										<input name="name" placeholder="Nama" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama'" class="common-input mb-20 form-control" required="" type="text">
									
										<input name="email" placeholder="Email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="common-input mb-20 form-control" required="" type="email">

										
									</div>
									<div class="col-lg-6 form-group">
										<textarea class="common-textarea form-control" name="message" placeholder="Sebagai Sahabat Musuem, Tuliskan pesan dan Kesan Anda" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Sebagai Sahabat Musuem, Tuliskan pesan dan Kesan Anda'" required=""></textarea>				
									</div>
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<button class="genric-btn primary" style="float: right;">Kirim Pesan</button>											
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>	
			</section>
			<!-- End contact-page Area -->
<?= $this->endSection(); ?>  