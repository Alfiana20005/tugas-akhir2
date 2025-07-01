<?= $this->extend('landingPage/template baru'); ?>

<?= $this->section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Detail Koleksi
				</h1>
				<p class="text-white link-nav"><a href="/home">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="/koleksi_page2"> koleksi</a></p>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<!-- Start post-content Area -->
<section class="post-content-area pt-60">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 posts-list">

				<div class="single-post row d-flex">

					<div class="col-lg-12 col-md-12 ">
						<div class="feature-img mb-2">
							<img class="img-fluid" src="<?= base_url("img/koleksiAdmin/" . $koleksi['foto']); ?>" alt="" style="width: 120%; height: 320px; object-fit: contain;">>
						</div>
						<!-- -->
					</div>

				</div>
			</div>
			<div class="col-lg-4 sidebar-widgets">
				<div class="widget-wrap">

					<div class="single-sidebar-widget post-category-widget">
						<h4 class="category-title">Detail Koleksi</h4>
						<ul class="cat-list">
							<li>
								<a href="/kajian2" class="d-flex justify-content-between">
									<p></p>
									<!-- <p>37</p> -->
								</a>
							</li>
							<li>
								<a href="#" class="d-flex justify-content-between">
									<p>Nama : <?= $koleksi['nama']; ?></p>
									<!-- <p>24</p> -->
								</a>
							</li>
							<li>
								<a href="#" class="d-flex justify-content-between">
									<p>Nomor : <?= $koleksi['no']; ?></p>
									<!-- <p>59</p> -->
								</a>
							</li>
							<li>
								<a href="#" class="d-flex justify-content-between">
									<p>Ukuran : </p>

								</a>
								<p><?= $koleksi['ukuran']; ?> </p>
							</li>

							<li>
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
								<a href="#" class="d-flex justify-content-between">
									<p> </p>

								</a>
								<p><?= nl2p($koleksi['deskripsi']); ?> </p>
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