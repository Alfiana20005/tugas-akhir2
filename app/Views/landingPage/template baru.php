<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="<?= base_url();?>img/logomuseum2.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>MuseumNegeri-NTB</title>

		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-MLF7QLNB');</script>
		<!-- End Google Tag Manager -->

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
    	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

  
<!-- Sertakan Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="<?= base_url();?>landingPage/css/linearicons.css">
			<link rel="stylesheet" href="<?= base_url();?>landingPage/css/font-awesome.min.css">
			<link rel="stylesheet" href="<?= base_url();?>landingPage/css/bootstrap.css">
			<link rel="stylesheet" href="<?= base_url();?>landingPage/css/magnific-popup.css">
			<link rel="stylesheet" href="<?= base_url();?>landingPage/css/jquery-ui.css">				
			<link rel="stylesheet" href="<?= base_url();?>landingPage/css/nice-select.css">							
			<link rel="stylesheet" href="<?= base_url();?>landingPage/css/animate.min.css">
			<link rel="stylesheet" href="<?= base_url();?>landingPage/css/owl.carousel.css">				
			<link rel="stylesheet" href="<?= base_url();?>landingPage/css/main.css">

			<!-- <link href="<?= base_url();?>landingPage/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->


			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
			 




		</head>
		<body>	
			<header id="header">
				<div class="header-top">
					<div class="container">
			  		<div class="row align-items-center">
			  			<div class="col-lg-6 col-sm-6 col-6 header-top-left">
			  				<ul>
			  					<!-- <li><a href="#">Visit Us</a></li>
			  					<li><a href="#">Buy Tickets</a></li> -->
			  				</ul>			
			  			</div>
			  			<div class="col-lg-6 col-sm-6 col-6 header-top-right">
							<div class="header-social">
								<a href="#"></a>
								<a href="#"></a>
								<a href="#"></a>
								<a href="#"></a>
							</div>
			  			</div>
			  		</div>			  					
					</div>
				</div>
				<div class="container main-menu">
					<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo" class="d-flex">
				        <a href="/home"><img id="logoMuseum" src="<?= base_url();?>img/logomuseum2.png" alt="" title="" /></a>
						<div id="text" class="text mx-2" style="color: white;">
							<div>Museum Negeri</div>
							<div id="ntb">Nusa Tenggara Barat</div>
							
						</div>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu" >
				          <li><a href="/home"><strong>Home</strong></a></li>
                  			<li class="menu-has-children"><a href=""><strong>Profil</strong></a>
				            <ul>
				              <li><a href="/sejarah2">Sejarah</a></li>
				              <li><a href="/visimisi2">Visi Misi</a></li>
				              <li><a href="/rencanaStrategis">Rencana Strategis</a></li>
				              <li><a href="/struktur2">Struktur Organisasi</a></li>
				              <li><a href="/sekardiyu">Sekardiyu</a></li>
				            </ul>
				          </li>	
                  			<li class="menu-has-children"><a href=""><strong>Layanan</strong></a>
				            <ul>
				              <li><a href="/kontak">Kontak</a></li>
				              <li><a href="/ruangPamer2">Ruang Pamer</a></li>
				            </ul>
				          </li>	
				          <li><a href="/berita2"><strong>Berita</strong></a></li>
				          <li><a href="/kegiatan2"><strong>Kegiatan</strong></a></li>
				          <li class="menu-has-children"><a href=""><strong>Tulisan Museum</strong></a>
				            <ul>
				              <li><a href="/kajian2">Tulisan</a></li>
				              <li><a href="/publikasi2">Publikasi</a></li>
				              <li><a href="/manuskripKol">Manuskrip</a></li>
				              <li><a href="/manuskrip">Terjemahan Manuskrip</a></li>
				            </ul>
				          </li>	
                  			<li><a href="/koleksi_page2"><strong>Koleksi</strong></a></li>
				          	<li><a href="/perpustakaan2"><strong>Perpustakaan</strong></a></li>		          					          		          
				          	<!-- <li><a href="/halamanLogin"><strong>LOGIN</strong></a></li> -->
				        </ul>
				      </nav><!-- #nav-menu-container -->					      		  
					</div>
				</div>
			</header><!-- #header -->

			<?= $this->renderSection('content'); ?>
			
	

			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">

					<div class="row">
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Museum Negeri NTB</h6>
								<span ></span>
								<p class="lnr lnr-map-marker">
                                    Jl. Panji Tilar Negara No.6, <br>
                                    Taman Sari,Kec. Ampenan, Kota Mataram,
                                    Nusa Tenggara Barat. 83117 <br><br>
                                    
                                    </p>
							</div>
							<div class="single-footer-widget">
								<h6>Sosial Media</h6>
								<a href="https://www.facebook.com/museumnegerintb/" target="_blank" style="font-size:20px; font-weight:bold;"><i class="fa-brands fa-facebook"></i></a>
								<a href="https://www.youtube.com/@museumntb1284" target="_blank" style="font-size:20px; font-weight:bold;"><i class="fa-brands fa-youtube mx-2"></i></a>
								<a href="https://www.instagram.com/museumntb?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" style="font-size:20px; font-weight:bold;"><i class="fa-brands fa-instagram"></i></a>
								<a href="https://twitter.com/museum_ntb" target="_blank" style="font-size:20px; font-weight:bold;"><i class="fa-brands fa-twitter mx-2"></i></a>
								<a href="https://www.tiktok.com/@museumntb?_t=8mxmb7tA12H&_r=1" target="_blank" style="font-size:20px; font-weight:bold; "><i class="fa-brands fa-tiktok"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Link Terkait</h6>
								<div class="row">
									<div class="col">
										<ul>
											<li><a href="https://dikbud.ntbprov.go.id//" target="_blank">>> Dinas Pendidikan dan Kebudayaan Provinsi NTB</a></li>
											<li><a href="https://www.museumnasional.or.id/" target="_blank">>> Museum Nasional</a></li>
											
											<li><a href="https://ntbprov.go.id/" target="_blank">>> Pemprov NTB</a></li>
											
										</ul>
									</div>

								</div>							
							</div>
						</div>							
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Total Pengunjung (1982-Juli 2024)</h6>
								<h1 class="mb-20" style="color: white;">1.878.543</h1>
								<h6>Total Pengunjung Tahun Ini</h6>
								<h1 class="mb-20" style="color: white;">25.951</h1>
								<!-- <p>
									Bulan Ini : <?= $totalBulan; ?>									
								</p>								
								<p>
									Tahun Ini :  <?= $totalTahun; ?>										
								</p>								
								<p>
									Total Keseluruhan : 	<?= $totalkeseluruhan; ?>								
								</p>								 -->
								
							</div>
						</div>
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">Total Koleksi</h6>
								<h1 class="mb-20" style="color: white;">7714</h1>

							</div>
						</div>						
					</div>


				</div>
			</footer>
			<!-- End footer Area -->


			<!-- <script src="<?= base_url();?>landingPage/assets/vendor/swiper/swiper-bundle.min.js"></script> -->



<script>
  $('.active-recent-blog-carusel').owlCarousel({
    items: 1, // Hanya menampilkan satu item per slide
    loop: true,
    margin: 30,
    nav: true,
    dots: false,
    autoplay: true,
    autoplayHoverPause: true
});
</script>

      <script src="<?= base_url();?>landingPage/js/typed.js"></script>
      <script>
          $(function() {
              var typed = new Typed('.typed-words', {
                  strings: ["Nusa Tenggara Barat"],
                  typeSpeed: 80,
                  backSpeed: 80,
                  backDelay: 4000,
                  startDelay: 1000,
                  loop: true,
                  showCursor: true
              });
          });
      </script>

			<script src="<?= base_url();?>landingPage/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="<?= base_url();?>landingPage/js/popper.min.js"></script>
			<script src="<?= base_url();?>landingPage/js/vendor/bootstrap.min.js"></script>	
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+gbg4C/N8WWtHk+N5K9K7QwoirjwQVyTC6s7721" crossorigin="anonymous"></script>
		
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>		
 			<script src="<?= base_url();?>landingPage/js/jquery-ui.js"></script>					
  			<script src="<?= base_url();?>landingPage/js/easing.min.js"></script>			
			<script src="<?= base_url();?>landingPage/js/hoverIntent.js"></script>
			<script src="<?= base_url();?>landingPage/js/superfish.min.js"></script>	
			<script src="<?= base_url();?>landingPage/js/jquery.ajaxchimp.min.js"></script>
			<script src="<?= base_url();?>landingPage/js/jquery.magnific-popup.min.js"></script>						
			<script src="<?= base_url();?>landingPage/js/jquery.nice-select.min.js"></script>					
			<script src="<?= base_url();?>landingPage/js/owl.carousel.min.js"></script>							
			<script src="<?= base_url();?>landingPage/js/mail-script.js"></script>	
			<script src="<?= base_url();?>landingPage/js/main.js"></script>	

		  	<!-- <link href="<?= base_url();?>landingPage/assets2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"> -->

			<!-- Google Tag Manager (noscript) -->
			<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MLF7QLNB"
			height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
			<!-- End Google Tag Manager (noscript) -->
		
		</body>
	</html>