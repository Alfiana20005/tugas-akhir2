<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
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

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
    	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0Yz/Zn6PjyW2hg0TKfTk0x60EgKJzU6wuFHYIBk1j7rFJzFLbmPe0zv9yzB2O82" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+gbg4C/N8WWtHk+N5K9K7QwoirjwQVyTC6s7721" crossorigin="anonymous"></script> -->
  
    <!-- <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12/lib/typed.min.js"></script> -->

    <!-- Atur link ke Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->

<!-- Isi dari halaman web Anda -->

<!-- Sertakan jQuery (diperlukan untuk Bootstrap JavaScript) -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

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

			<link href="<?= base_url();?>landingPage/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">



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
				      <div id="logo">
				        <a href="/home"><img src="<?= base_url();?>img/terbaru-removebg-preview.png" alt="" style="width: 130px;" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li><a href="/home">Home</a></li>
                  <li class="menu-has-children"><a href="">Profil</a>
				            <ul>
				              <li><a href="/sejarah2">Sejarah</a></li>
				              <li><a href="/visimisi2">Visi Misi</a></li>
				              <li><a href="/struktur2">Struktur Organisasi</a></li>
				            </ul>
				          </li>	
                  <li class="menu-has-children"><a href="">Layanan</a>
				            <ul>
				              <li><a href="/kontak">Kontak</a></li>
				              <li><a href="/ruangPamer2">Ruang Pamer</a></li>
				            </ul>
				          </li>	
				          <li><a href="/berita2">Berita</a></li>
				          <li><a href="/kegiatan2">Kegiatan</a></li>
				          <li class="menu-has-children"><a href="">Kajian Museum</a>
				            <ul>
				              <li><a href="/kajian2">Kajian</a></li>
				              <li><a href="/publikasi2">Publikasi</a></li>
				            </ul>
				          </li>	
                  <li><a href="/koleksi_page2">Koleksi</a></li>
				          <li><a href="/perpustakaan2">Perpustakaan</a></li>		          					          		          
				          <li><a href="/halamanLogin">LOGIN</a></li>
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
								<h6>About Agency</h6>
								<p>
									The world has become so fast paced that people don’t want to stand by reading a page of information, they would much rather look at a presentation and understand the message. It has come to a point 
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Navigation Links</h6>
								<div class="row">
									<div class="col">
										<ul>
											<li><a href="#">Home</a></li>
											<li><a href="#">Feature</a></li>
											<li><a href="#">Services</a></li>
											<li><a href="#">Portfolio</a></li>
										</ul>
									</div>
									<div class="col">
										<ul>
											<li><a href="#">Team</a></li>
											<li><a href="#">Pricing</a></li>
											<li><a href="#">Blog</a></li>
											<li><a href="#">Contact</a></li>
										</ul>
									</div>										
								</div>							
							</div>
						</div>							
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Newsletter</h6>
								<p>
									For business professionals caught between high OEM price and mediocre print and graphic output.									
								</p>								
								<div id="mc_embed_signup">
									<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscription relative">
										<div class="input-group d-flex flex-row">
											<input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
											<button class="btn bb-btn"><span class="lnr lnr-location"></span></button>		
										</div>									
										<div class="mt-10 info"></div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">InstaFeed</h6>
								<ul class="instafeed d-flex flex-wrap">
									<li><img src="img/i1.jpg" alt=""></li>
									<li><img src="img/i2.jpg" alt=""></li>
									<li><img src="img/i3.jpg" alt=""></li>
									<li><img src="img/i4.jpg" alt=""></li>
									<li><img src="img/i5.jpg" alt=""></li>
									<li><img src="img/i6.jpg" alt=""></li>
									<li><img src="img/i7.jpg" alt=""></li>
									<li><img src="img/i8.jpg" alt=""></li>
								</ul>
							</div>
						</div>						
					</div>


				</div>
			</footer>
			<!-- End footer Area -->	


			<script src="<?= base_url();?>landingPage/assets/vendor/swiper/swiper-bundle.min.js"></script>

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

      
		</body>
	</html>