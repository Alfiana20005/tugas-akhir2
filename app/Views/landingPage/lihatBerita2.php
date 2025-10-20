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
<section class="post-content-area single-post-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 posts-list">
				<div class="single-post row">
					<div class="col-lg-12">
						<button class="genric-btn primary small">
							<div><?= $berita['jenisBerita']; ?></div>
							<div></div>
						</button>
						<div class="feature-img">
							<img class="img-fluid" src="<?= base_url('img/berita/' . $berita['foto']); ?>" alt="">
						</div>
						<!-- <button class="genric-btn primary small d-flex" style="background-color: gray;">  -->
						<div class="ket" id="ket"><i class="fa-solid fa-camera" style="padding-right: 4pt;"> </i><?= $berita['ketgambar']; ?></div>

						<!-- </button>									 -->
					</div>

					<div class="col-lg-12 col-md-12">
						<h3 class="mt-20 mb-20"><?= $berita['judul']; ?></h3>

						<!-- Sumber dan Link Berita -->
						<?php if (!empty($berita['sumber']) || !empty($berita['link']) || !empty($berita['tanggal'])): ?>
							<div class="mb-3" style="border-bottom: 1px solid #e0e0e0; padding-bottom: 10px;">
								<?php if (!empty($berita['sumber'])): ?>
									<span style="color: #666; font-size: 14px;">
										<i class="fa-solid fa-newspaper" style="padding-right: 4pt;"></i>
										<strong>Dikutip dari:</strong> <?= esc($berita['sumber']); ?>
									</span>
								<?php endif; ?>

								<?php if (!empty($berita['sumber']) && !empty($berita['tanggal'])): ?>
									<span style="color: #ccc; margin: 0 10px;">|</span>
								<?php endif; ?>

								<?php if (!empty($berita['tanggal'])): ?>
									<span style="color: #666; font-size: 14px;">
										<i class="fa-solid fa-calendar-days" style="padding-right: 4pt;"></i>
										<?= $berita['tanggal']; ?>
									</span>
								<?php endif; ?>

								<?php if ((!empty($berita['sumber']) || !empty($berita['tanggal'])) && !empty($berita['link'])): ?>
									<span style="color: #ccc; margin: 0 10px;">|</span>
								<?php endif; ?>

								<?php if (!empty($berita['link'])): ?>
									<span style="color: #666; font-size: 14px;">
										<i class="fa-solid fa-link" style="padding-right: 4pt;"></i>
										<a href="<?= esc($berita['link']); ?>" target="_blank" rel="noopener noreferrer" style="color: #007bff; text-decoration: none;">
											Link Berita
										</a>
									</span>
								<?php endif; ?>
							</div>
						<?php endif; ?>

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
						<p class="excert" style="color: black;"><?= nl2p($berita['isi']); ?></p>

					</div>

				</div>

			</div>
			<div class="col-lg-4 sidebar-widgets">
				<div class="widget-wrap">
					<div class="single-sidebar-widget post-category-widget">
						<h4 class="category-title">Kategori Berita</h4>
						<ul class="cat-list">

							<li>
								<a href="/beritaKategori2/Pendidikan" class="d-flex justify-content-between">
									<p>Pendidikan</p>
									<!-- <p>59</p> -->
								</a>
							</li>
							<li>
								<a href="/beritaKategori2/Sosial Masyarakat" class="d-flex justify-content-between">
									<p>Sosial Masyarakat</p>
									<!-- <p>29</p> -->
								</a>
							</li>
							<li>
								<a href="/beritaKategori2/Sejarah dan Budaya" class="d-flex justify-content-between">
									<p>Sejarah dan Budaya</p>
									<!-- <p>15</p> -->
								</a>
							</li>
							<li>
								<a href="/beritaKategori2/Pemerintahan" class="d-flex justify-content-between">
									<p>Pemerintahan</p>
									<!-- <p>09</p> -->
								</a>
							</li>
							<li>
								<a href="/beritaKategori2/Pariwisata" class="d-flex justify-content-between">
									<p>Pariwisata</p>
									<!-- <p>09</p> -->
								</a>
							</li>
							<li>
								<a href="/berita2" class="d-flex justify-content-between">
									<p>Semua Kategori</p>

								</a>
							</li>

						</ul>
					</div>

					<div class="single-sidebar-widget popular-post-widget">
						<h4 class="popular-title">Berita Terkait</h4>

						<form method="POST" action="">
							<div id="kategoriBerita" class="col-lg-12 d-flex">
								<button class="genric-btn primary-border small my-2 mx-2 <?= $kategoriBerita == 'Regional' ? 'active' : '' ?>" name="kategoriBerita" value="Regional">Regional</button>
								<button class="genric-btn primary-border small my-2  mx-2 <?= $kategoriBerita == 'Nasional' ? 'active' : '' ?>" name="kategoriBerita" value="Nasional">Nasional</button>
							</div>
						</form>

						<div class="popular-post-list">
							<?php
							foreach ($berita2 as $b):
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