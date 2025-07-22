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

				<!-- <div class="search mt-4 d-flex  align-items-center justify-content-center" >

						<button class="btn btn-md ">Judul Buku</button>
						<input class="form-control mx-2 col-md-6" type="text">
						<button class="btn btn-md ">Cari</button>
						
					</div> -->
			</div>

		</div>
	</div>
</section>

<!-- End banner Area -->


<!-- Start post-content Area -->
<section class="post-content-area pt-30">
	<div class="container">

		<div class="row">

			<div class="col-lg-8 posts-list">
				<div class="section-top-border">
					<h3 class="mb-30"><?= $data_buku['judul']; ?></h3>
					<div class="row">
						<div class="col-md-3">
							<img src="<?= base_url('img/perpustakaan/' . $data_buku['foto']); ?>" alt="" class="img-fluid">
						</div>
						<div class="col-md-9 mt-sm-20 left-align-p">
							<table>
								<td></td>
							</table>
						</div>
					</div>
				</div>



				<!-- Start blog Area -->
				<!-- <section class="recent-blog-area ">
                                <div class="container">
									                      
                                    <div class="row">
										
										<h4 style="color:#850000;"><?= $data_buku['judul']; ?></h4>
                                        
                                    </div>
                                    
                                </div>	
                            </section> -->
				<!-- End recent-blog Area -->








			</div>
			<div class="col-lg-4 sidebar-widgets">
				<div class="widget-wrap">

					<div class="single-sidebar-widget post-category-widget">
						<h4 class="category-title">Jadwal Operasional</h4>
						<ul class="cat-list">
							<li>
								Senin: 10.00 - 16.00 WITA
							</li>
							<li>
								Selasa: 08.00 - 16.00 WITA
							</li>
							<li>
								Rabu: 08.00 - 16.00 WITA
							</li>
							<li>
								Kamis: 08.00 - 16.00 WITA
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

		</div>
	</div>
</section>
<!-- End post-content Area -->



<?= $this->endSection(); ?>