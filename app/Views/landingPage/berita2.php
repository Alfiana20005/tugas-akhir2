<?= $this->extend('landingPage/template baru'); ?>

<?= $this->section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Berita
				</h1>
				<p class="text-white link-nav"><a href="/home">Home </a> <span class="fa fa-chevron-right"></span> <a href="/berita2"> Berita</a></p>
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

					<?php
					foreach ($dataBerita as $b):
						if ($b['type'] == 'Narasi'): ?>
							<div class="col-lg-4 col-md-12 my-2">
								<button class="genric-btn primary small">
									<div><?= $b['jenisBerita']; ?></div>
									<div></div>
								</button>
								<div class="feature-img mb-2 embed-responsive embed-responsive-4by3">
									<img class="embed-responsive-item" style="object-fit: cover;" src="<?= base_url("img/berita/" . $b['foto']); ?>" alt="">
								</div>
								<a href="<?= base_url("/berita/{$b['slug']}"); ?>">
									<h5 style="padding-bottom: 6pt;"><?= $b['judul']; ?></h5>
								</a>
								<p><i class="fa-solid fa-calendar-days" style="padding-right: 4pt;"></i><?= $b['tanggal']; ?></p>
								<p class="excert"><?= $b['isi_pendek']; ?></p>
								<a href="<?= base_url("/berita/{$b['slug']}"); ?>" class="primary-btn">Baca Berita</a>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col-lg-4 sidebar-widgets">
				<div class="widget-wrap">
					<div class="single-sidebar-widget post-category-widget">
						<h4 class="category-title">Kategori Berita</h4>
						<ul class="cat-list">
							<li>
								<a href="<?= base_url('berita/kategori/Pendidikan') ?>" class="d-flex justify-content-between">
									<p>Pendidikan</p>
									<!-- <p>59</p> -->
								</a>
							</li>
							<li>
								<a href="<?= base_url('berita/kategori/Sosial Masyarakat') ?>" class="d-flex justify-content-between">
									<p>Sosial Masyarakat</p>
									<!-- <p>29</p> -->
								</a>
							</li>
							<li>
								<a href="<?= base_url('berita/kategori/Sejarah dan Budaya') ?>" class="d-flex justify-content-between">
									<p>Sejarah dan Budaya</p>
									<!-- <p>15</p> -->
								</a>
							</li>
							<li>
								<a href="<?= base_url('berita/kategori/Pemerintahan') ?>" class="d-flex justify-content-between">
									<p>Pemerintahan</p>
									<!-- <p>09</p> -->
								</a>
							</li>
							<li>
								<a href="<?= base_url('berita/kategori/Pariwisata') ?>" class="d-flex justify-content-between">
									<p>Pariwisata</p>
									<!-- <p>09</p> -->
								</a>
							</li>
							<li>
								<a href="/berita" class="d-flex justify-content-between">
									<p>Semua Kategori</p>
								</a>
							</li>
						</ul>
					</div>

					<div class="single-sidebar-widget popular-post-widget">
						<h4 class="popular-title">Berita Terkait</h4>
						<!-- <a href="#" class="genric-btn primary-border my-2">  Regional  </a>
									<a href="#" class="genric-btn primary-border my-2">  Nasional  </a> -->
						<form method="POST" action="">
							<div id="kategoriBerita" class="col-lg-12 d-flex">
								<button class="genric-btn primary-border small my-2 mx-2 <?= $kategoriBerita == 'Regional' ? 'active' : '' ?>" name="kategoriBerita" value="Regional">Regional</button>
								<button class="genric-btn primary-border small my-2  mx-2 <?= $kategoriBerita == 'Nasional' ? 'active' : '' ?>" name="kategoriBerita" value="Nasional">Nasional</button>
							</div>
						</form>

						<div class="popular-post-list">
							<?php
							foreach ($berita as $b):
								if ($b['type'] == 'Link'): ?>
									<div class="single-post-list d-flex flex-row align-items-center">
										<div class="thumb">
											<!-- <img class="img-fluid" src="img/blog/pp1.jpg" alt=""> -->
										</div>
										<div class="details">
											<a href="<?= $b['isi'] ?>" target="_blank">
												<h6>> <?= $b['judul']; ?></h6>
											</a>
											<p><?= $b['tanggal']; ?></p>
										</div>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>

						</div>
						<?php if (count($berita) >= 3 && !$lihatSemua): ?>
							<div>
								<a href="?kategoriBerita=<?= $kategoriBerita ?>&lihatSemua=1" style="color: #850000;">Lihat semua. . .</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- End post-content Area -->

<?= $this->endSection(); ?>