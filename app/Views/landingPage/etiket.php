<?= $this->extend('landingPage/template baru'); ?>

<?= $this-> section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
		<div class="container">				
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
								Pesan Tiket		
					</h1>	
					<p class="text-white link-nav"><a href="/home">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/etiket"> E-Tiket	</a></p>
				</div>	
			</div>
		</div>
</section>
<!-- End banner Area -->	

<section class="about-info-area section-gap">

				<div class="container">
				
					<div class="row align-items-center">
						<div class="col-lg-6 info-left">
							
						</div>
						<div class="col-lg-6 info-right">
							
						</div>
					</div>

					<div class="row ">
					
					<div class="col-lg-6">

						<div class="row">
						<!-- <div class="col-md-12">
							<div class="info-box">
							<i class="bx bx-map"></i>
							<h3>Our Address</h3>
							<p>A108 Adam Street, New York, NY 535022</p>
							</div>
						</div> -->
						<div class="col-md-6">
							<div class="info-box mt-2">
							<i class="bx bx-envelope"></i>
							<h3>QRIS</h3>
							<img src="img/QR.png" alt="" style="width: 300px;">
							<!-- <p>info@example.com<br>contact@example.com</p> -->

							<h3>Rekening Bank</h3>
							<p>+1 5589 55488 55<br>+1 6678 254445 41</p>
							</div>
						</div>

						<div class="col-md-6">
							<div class="info-box mt-4">
							<i class="bx bx-phone-call"></i>
							
							</div>
						</div>
						</div>

					</div>

					<div class="col-lg-6">
						<form action="forms/contact.php" method="post" role="form" class="php-email-form">
						<div class="row">
							<div class="col-md-6 form-group">
								<div class="sent-message" style="color:#850000;">Nama/Instansi</div>
								<input type="text" name="name" class="form-control" id="name" placeholder="" required="">
							</div>
							<div class="col-md-6 form-group mt-3 mt-md-0">
								<div class="sent-message" style="color:#850000;">Email</div>
								<input type="email" class="form-control" name="email" id="email" placeholder="Email" required="">
							</div>
						</div>
						<div class="form-group mt-3">
							<input type="text" class="form-control" name="kategori" id="subject" placeholder="" required="">
						</div>
						<div class="sent-message" style="color:#850000;">Masukkan jumlah pengunjung</div>

						
						<div class="row">
							
							<div class="col-md-6 form-group">
							<div class="sent-message" style="color:#850000;">Anak-anak</div>
							<input type="text" name="anak" class="form-control" id="name" placeholder="" required="">
							</div>
							<div class="col-md-6 form-group mt-3 mt-md-0">
							<div class="sent-message" style="color:#850000;">Dewasa</div>
							<input type="email" class="form-control" name="dewasa" id="email" placeholder="" required="">
							</div>
						</div>
						<div class="sent-message"><h4  style="color:#850000;">Total pembayaran = </h4></div>
						<!-- <div class="form-group mt-3">
							<textarea class="form-control" name="message" rows="7" placeholder="Message" required=""></textarea>
						</div> -->
						<!-- <div class="my-3">
							<div class="loading">Loading</div>
							<div class="error-message"></div>
							<div class="sent-message">Your message has been sent. Thank you!</div>
						</div> -->
						<div class="form-group mt-4">
							<!-- <input type="text" class="form-control" name="kategori" id="subject" placeholder="p" required=""> -->
							<div class="custom-file">
										
										<input type="file" class="custom-file-input form-control"name="foto" onchange="previewImg('gambar')">
										<label class="custom-file-label" for="customFile">Upload bukti pembayaran</label>
										
									</div>
									<?php if (!empty($p['foto'])): ?>
											<div class="my-4">
												<p>Foto Saat Ini:</p>
												<img src="<?= base_url('img/manuskrip/' . $p['foto']); ?>" alt="Foto Petugas" width="100">
											</div>
										<?php endif; ?>
						</div>
						
						<div class="text-center " ><button class="btn" type="submit" style="background:#850000; color: white;">Daftar</button></div>
						</form>
					</div>
					</div>
				</div>	
			</section>
			<!-- End about-info Area -->



<?= $this->endSection(); ?>  