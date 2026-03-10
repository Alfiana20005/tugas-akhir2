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
				<p class="text-white link-nav"><a href="/home">Home </a> <span class="fa fa-chevron-right"></span> <a href="/koleksi_page2"> koleksi</a></p>
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

					<!-- Nama Koleksi -->
					<div class="col-lg-12 mb-4">
						<h2 class="koleksi-title"><?= esc($koleksi['nama']); ?></h2>
					</div>

					<!-- Galeri Gambar Deskripsi -->
					<?php
					$gambar_deskripsi = !empty($koleksi['gambar_deskripsi']) ? json_decode($koleksi['gambar_deskripsi'], true) : [];
					if (!empty($gambar_deskripsi) && is_array($gambar_deskripsi)):
					?>
						<div class="col-lg-12">
							<h4 class="mb-3">Tampak Koleksi</h4>
							<div class="row">
								<?php foreach ($gambar_deskripsi as $index => $img): ?>
									<?php if (!empty($img)): ?>
										<div class="col-md-6 col-lg-6 mb-3">
											<div class="gallery-item">
												<img src="<?= base_url('img/koleksiDeskripsi/' . $img); ?>"
													class="img-fluid img-thumbnail"
													alt="Gambar Koleksi <?= $index + 1; ?>"
													style="width: 100%; height: 350px; object-fit: cover; cursor: pointer;"
													onclick="openImageModal('<?= base_url('img/koleksiDeskripsi/' . $img); ?>')">
											</div>
										</div>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>

					<!-- Deskripsi Koleksi -->
					<?php
					function nl2p($text)
					{
						$text = trim($text);
						$paragraphs = explode("\n", $text);
						$result = '';
						foreach ($paragraphs as $paragraph) {
							$paragraph = trim($paragraph);
							if (!empty($paragraph)) {
								$result .= '<p>' . esc($paragraph) . '</p>';
							}
						}
						return $result;
					}
					?>
					<?php if (!empty($koleksi['deskripsi'])): ?>
						<div class="col-lg-12 mt-4">
							<h4 class="mb-3">Deskripsi</h4>
							<div class="deskripsi-content">
								<?= nl2p($koleksi['deskripsi']); ?>
							</div>
						</div>
					<?php endif; ?>

				</div>
			</div>

			<div class="col-lg-4 sidebar-widgets">
				<div class="widget-wrap">

					<div class="single-sidebar-widget post-category-widget">
						<h4 class="category-title">Detail Koleksi</h4>
						<ul class="cat-list">
							<li>
								<a href="#" class="d-flex justify-content-between">
									<p><strong>Nama:</strong></p>
								</a>
								<p><?= esc($koleksi['nama']); ?></p>
							</li>
							<li>
								<a href="#" class="d-flex justify-content-between">
									<p><strong>Nomor:</strong></p>
								</a>
								<p><?= esc($koleksi['no']); ?></p>
							</li>
							<li>
								<a href="#" class="d-flex justify-content-between">
									<p><strong>Kategori:</strong></p>
								</a>
								<p><?= esc($koleksi['kategori']); ?></p>
							</li>
							<li>
								<a href="#" class="d-flex justify-content-between">
									<p><strong>Ukuran:</strong></p>
								</a>
								<p><?= esc($koleksi['ukuran']); ?></p>
							</li>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
<!-- End post-content Area -->

<!-- Modal untuk melihat gambar fullscreen -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Gambar Koleksi</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body text-center">
				<img id="modalImage" src="" class="img-fluid" alt="Gambar Koleksi">
			</div>
		</div>
	</div>
</div>

<script>
	function openImageModal(imageSrc) {
		document.getElementById('modalImage').src = imageSrc;
		var imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
		imageModal.show();
	}
</script>

<!-- CSS tambahan untuk styling galeri -->
<style>
	.gallery-item {
		position: relative;
		overflow: hidden;
		border-radius: 8px;
		transition: transform 0.3s ease;
	}

	.gallery-item:hover {
		transform: scale(1.05);
		box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
	}

	.gallery-item img {
		transition: all 0.3s ease;
	}

	.gallery-item:hover img {
		opacity: 0.9;
	}

	.cat-list li {
		border-bottom: 1px solid #eee;
		padding: 10px 0;
	}

	.cat-list li:last-child {
		border-bottom: none;
	}

	.cat-list p {
		margin-bottom: 5px;
	}

	.koleksi-title {
		font-size: 1.8rem;
		font-weight: 700;
		color: #333;
		border-left: 4px solid #850000;
		padding-left: 12px;
	}

	.deskripsi-content p {
		margin-bottom: 10px;
		line-height: 1.7;
		color: #555;
	}
</style>

<?= $this->endSection(); ?>