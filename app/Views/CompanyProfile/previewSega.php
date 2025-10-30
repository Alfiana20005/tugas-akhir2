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
	<title>Sega</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="<?= base_url(); ?>landingPage/css/linearicons.css">
	<link rel="stylesheet" href="<?= base_url(); ?>landingPage/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>landingPage/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url(); ?>landingPage/css/magnific-popup.css">
	<link rel="stylesheet" href="<?= base_url(); ?>landingPage/css/jquery-ui.css">
	<link rel="stylesheet" href="<?= base_url(); ?>landingPage/css/nice-select.css">
	<link rel="stylesheet" href="<?= base_url(); ?>landingPage/css/animate.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>landingPage/css/owl.carousel.css">
	<link rel="stylesheet" href="<?= base_url(); ?>landingPage/css/main.css">
</head>

<body>

	<!-- start banner Area -->
	<section class="relative about-banner">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
						Sekardiyu Audio Guide (Sega)
					</h1>
					<p class="text-white link-nav"><a href="blog-home.html">Museum Negeri Nusa Tenggara Barat </a></p>
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
							<div class="quotes d-flex">
								<img class="img-fluid " style="max-width: 70px;" src="<?= base_url('img/sega/' . $sega['foto']); ?>" alt="">
								<h3 class="mt-20 mb-20 mx-4"><?= $sega['judul']; ?></h3>
							</div>
						</div>


						<div class="col-lg-12">


							<div class="row mt-20 mb-30">

								<div class="col-6">
									<h4 class="category-title mb-4">Versi Indonesia</h4>
									<?php if (!empty($sega)): ?>
										<audio controls>
											<source src="<?= base_url('audio/' . $sega['audio_id']); ?>" type="audio/mpeg">
											Your browser does not support the audio element.
										</audio>

									<?php else: ?>
										<p>Tidak ada audio yang tersedia.</p>
									<?php endif; ?>
								</div>



							</div>

							<div class="quotes">
								<!-- <h3 class="mt-20 mb-20"><?= $sega['judul']; ?></h3> -->

								<?php
								function nl2p($text)
								{
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
								<p class="excert "><?= nl2p($sega['deskripsi_indo']); ?></p>
							</div>

							<div class="row mt-20 mb-30">
								<div class="col-6">
									<h4 class="category-title mb-4">English Version</h4>
									<?php if (!empty($sega)): ?>
										<audio controls>
											<source src="<?= base_url('audio/' . $sega['audio_eng']); ?>" type="audio/mpeg">
											Your browser does not support the audio element.
										</audio>

									<?php else: ?>
										<p>Tidak ada audio yang tersedia.</p>
									<?php endif; ?>
								</div>
							</div>

							<div class="quotes">
								<!-- <h3 class="mt-20 mb-20"><?= $sega['judul']; ?></h3> -->

								<p class="excert "><?= nl2p($sega['deskripsi_eng']); ?></p>
							</div>

						</div>
					</div>

				</div>
				<div class="col-lg-4 sidebar-widgets">
					<div class="widget-wrap">

						<div class="single-sidebar-widget user-info-widget">
							<img src="<?= base_url(); ?>/img/logomuseum2.png" alt="" style="width: 150px;">
							<a href="#">
								<h4>Museum Negeri NTB</h4>
							</a>
							<p>
								Ikuti Sosial Media Kami
							</p>
							<ul class="social-links">
								<li><a href="https://www.facebook.com/museumnegerintb/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/museum_ntb"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/museumntb?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://www.youtube.com/@museumntb1284"><i class="fa fa-youtube"></i></a></li>
							</ul>
							<p>
								Klik Untuk Mengunjungi Website
							</p>
							<button class="btn btn-warning btn-sm" type="submit"><a href="<?= base_url(); ?>/home">Website</a></button>


						</div>
					</div>

				</div>
			</div>
		</div>
		</div>
	</section>
	<!-- End post-content Area -->


	<script src="<?= base_url(); ?>landingPage/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="<?= base_url(); ?>landingPage/js/popper.min.js"></script>
	<script src="<?= base_url(); ?>landingPage/js/vendor/bootstrap.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="<?= base_url(); ?>landingPage/js/jquery-ui.js"></script>
	<script src="<?= base_url(); ?>landingPage/js/easing.min.js"></script>
	<script src="<?= base_url(); ?>landingPage/js/hoverIntent.js"></script>
	<script src="<?= base_url(); ?>landingPage/js/superfish.min.js"></script>
	<script src="<?= base_url(); ?>landingPage/js/jquery.ajaxchimp.min.js"></script>
	<script src="<?= base_url(); ?>landingPage/js/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url(); ?>landingPage/js/jquery.nice-select.min.js"></script>
	<script src="<?= base_url(); ?>landingPage/js/owl.carousel.min.js"></script>
	<script src="<?= base_url(); ?>landingPage/js/mail-script.js"></script>
	<script src="<?= base_url(); ?>landingPage/js/main.js"></script>
</body>

</html>