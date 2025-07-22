<?= $this->extend('landingPage/template baru'); ?>

<?= $this->section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white" style="font-size: 35px;">
					Perpustakaan Museum (Opac)
				</h1>
				<p class="text-white link-nav"><a href="/home">Home </a> <span class="fa fa-chevron-right"></span> <a href="/perpustakaan"> Perpustakaan</a></p>


			</div>

		</div>
	</div>
</section>

<!-- End banner Area -->


<!-- Start post-content Area -->
<section class="post-content-area pt-30">
	<div class="container">

		<section class="destinations-area section-gap">
			<div class="container">

				<h5>Halaman Ini Dalam Tahap Pengembangan</h5>
				<div class="row">
					<div class="active-recent-blog-carusel">


					</div>
				</div>
		</section>


		<!-- <h4>Halaman ini dalam tahap pengembangan</h4> -->

		<!-- <div class="row">

						<div class="col-lg-8 posts-list">

                            <section class="recent-blog-area ">
                                <div class="container">
									<div class="row">
										<div class="search mb-4 d-flex " >

											
											<button class="btn btn-md" style="background-color:#850000; color:white; font-size: 11pt;">Kata Kunci</button>
											<input class="form-control  col-lg-12 mx-2" type="text" placeholder="Masukkan kata kunci yang anda cari" style="font-size: 11pt;">
											<button class="btn btn-md" style="background-color:#850000; color:white; font-size: 11pt;">Cari</button>

										</div>
									</div>                       
                                    <div class="row">
										
										<h4 style="color:#850000;" >Rekomendasi Buku</h4>
                                        <div class="active-recent-blog-carusel my-2">
										<?php if (is_array($buku_rekomendasi) && !empty($buku_rekomendasi)): ?>
										<?php
											foreach ($buku_rekomendasi as $buku):
										?>

                                            <div class="single-recent-blog-post item">
                                                <div class="thumb">
                                                    <img class="img-fluid " src="<?= base_url("img/perpustakaan/" . $buku['foto']); ?>" alt="" style="width:90px">
                                                </div>
                                                <div class="details">
                                                   
                                                    <a href="<?= base_url("/detailBuku/{$buku['id_buku']}"); ?>"><h6 class="title"><?= $buku['judul']; ?></h6></a>
                                                    
                                                    <h6 class="date" style="font-size: 9pt;"><?= $buku['pengarang']; ?></h6>
                                                    <div class="tags">
                                                        <ul>
                                                            <li>
                                                                <a href="#" style="font-size: 8pt;"><?= $buku['kategoriBuku']; ?></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><?= $buku['tahunTerbit']; ?></a>
                                                            </li>											
                                                        </ul>
                                                    </div>
                                                </div>	
                                            </div>

                                            <?php endforeach; ?>

											<?php else: ?>
        										<p>Tidak ada buku rekomendasi tersedia.</p>
    										<?php endif; ?>
                                                                

                                        </div>
                                    </div>
                                    
                                </div>	
                            </section>
							<section class="recent-blog-area ">
                                <div class="container">

								<div class="row">
										
										<h4 style="color:#850000;" > Buku Favorit</h4>
                                        <div class="active-recent-blog-carusel  my-2">
										<?php if (is_array($buku_favorit) && !empty($buku_favorit)): ?>
										<?php
											foreach ($buku_favorit as $buku):
										?>

                                            <div class="single-recent-blog-post item">
                                                <div class="thumb">
                                                    <img class="img-fluid " src="<?= base_url("img/perpustakaan/" . $buku['foto']); ?>" alt="" style="width:90px">
                                                </div>
                                                <div class="details">
                                                   
                                                    <a href="<?= base_url("/detailBuku/{$buku['id_buku']}"); ?>"><h6 class="title"><?= $buku['judul']; ?></h6></a>
                                                    
                                                    <h6 class="date" style="font-size: 9pt;"><?= $buku['pengarang']; ?></h6>
                                                    <div class="tags">
                                                        <ul>
                                                            <li>
                                                                <a href="#" style="font-size: 8pt;"><?= $buku['kategoriBuku']; ?></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><?= $buku['tahunTerbit']; ?></a>
                                                            </li>											
                                                        </ul>
                                                    </div>
                                                </div>	
                                            </div>

                                            <?php endforeach; ?>

											<?php else: ?>
        										<p>Tidak ada buku rekomendasi tersedia.</p>
    										<?php endif; ?>
                                                                

                                        </div>
                                    </div>
                                                            

                                </div>	
                            </section>
                           
							 
							 	

                            

						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">

								<div class="single-sidebar-widget post-category-widget">
									<h4 class="category-title">Jadwal Operasional</h4>
										<ul class="cat-list">
											<li>
												Senin: 10.00 -  16.00 WITA
											</li>
											<li>
												Selasa: 08.00 - 16.00 WITA
											</li>
											<li>
												Rabu:  08.00 - 16.00 WITA
											</li>
											<li>
												Kamis:  08.00 - 16.00 WITA
											</li>
											<li>
												Jumat: 09.00 - 17.00 WITA
											</li>													
										</ul>
								</div>	
								<div class="single-sidebar-widget post-category-widget">
									<h4 class="category-title">Syarat Peminjaman Buku</h4>
										<ul class="cat-list">
											
											<li>
												 1.
											</li>
											<li>
												 2.
											</li>
											<li>
												 3.
											</li>
											<li>
												 4.
											</li>
											
																									
										</ul>
								</div>	

							</div>
						</div>

					</div> -->
	</div>
</section>
<!-- End post-content Area -->



<?= $this->endSection(); ?>