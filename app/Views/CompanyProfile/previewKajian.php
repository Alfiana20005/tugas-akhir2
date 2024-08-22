<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/logomuseum2.png">
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

			<!-- <link href="<?= base_url();?>landingPage/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->


			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
			 




		</head>
		<body>	

        			<!-- Start post-content Area -->
			<section class="post-content-area single-post-area">
				<div class="container">
				<a class="btn btn-warning btn-sm mb-2 " href="<?= base_url("/tulisKajian/{$kajian['id_kajian']}"); ?>"  role="button">Keluar dari preview</a>
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
									

									if (!function_exists('nl2p')) {
										function nl2p($text) {
											$text = trim($text);
											$paragraphs = preg_split('/\n\s*\n/', $text);
											$text = '';
											foreach ($paragraphs as $paragraph) {
												$paragraph = trim($paragraph);
												if (!empty($paragraph)) {
													$text .= '<p>' . esc($paragraph) . '</p>';
												}
											}
											return $text;
										}
									}

									?>
									<!-- <p class="excert " ><?= nl2p($data['narasi']); ?></p> -->
									<?= $content=$data['narasi']; ?>
                                    <div class="d-flex align-items-center justify-content-center my-4"> 
                                        <img src="<?= base_url("img/kajian/". $data['foto']); ?>" class="img-fluid" alt="" style="width: auto; ">
                                    </div>
									<?php endforeach; ?>
								</div>

							</div>

						</div>
						
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->




        


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

			  <script>
				tinymce.init({
  selector: '#narasi',  // ganti dengan selektor elemen yang sesuai
  plugins: 'lists',
  toolbar: 'bold italic underline | bullist numlist outdent indent',
  menubar: false,
  statusbar: false,
  content_style: 'body { font-family: Calibri, sans-serif; font-size: 12pt; }'
});

			</script>
		</body>
	</html>