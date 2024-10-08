<?= $this->extend('landingPage/template baru'); ?>

<?= $this-> section('content'); ?>


<!-- start banner Area -->
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
		<div class="container">				
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
								SEGA		
					</h1>	
					<p class="text-white link-nav"><a href="/home">Home </a> </p>
				</div>	
			</div>
		</div>
</section>
<!-- End banner Area -->	



			<!-- Start Align Area -->
			<div class="whole-wrap">
				<div class="container">

					<div class="section-top-border">
						<h3 class="mb-30">Sekardiyu Audio Guide</h3>
						<div class="progress-table-wrap">
							<div class="progress-table">
                                
								<div class="table-head">
									<div class="serial">No</div>
									<div class="country">Gambar</div>
									<div class="visit">Judul</div>
									<div class="visit"></div>
									<div class="percentage">Preview</div>
								</div>

                                
								<?php 
                                        $no=1;
                                        foreach($sega as $g): ?>  
								<div class="table-row">
                               

									<div class="serial"><?= $no++; ?></div>
									<div class="country"> <img src="<?= base_url("img/sega/". $g['foto']); ?>" style="width: 60px;" alt="flag"></div>
									<div class="visit"><?= $g['judul']; ?></div>
									<div class="visit"></div>
									<div class="percentage">
										<a class="btn btn-warning" href="<?= base_url("/audioGuide/{$g['id_sega']}"); ?>">Lihat</a>
									</div>

                                    
								</div>
								<?php endforeach; ?> 

							</div>
						</div>
					</div>
					

				</div>
			</div>
			<!-- End Align Area -->



<?= $this->endSection(); ?>  