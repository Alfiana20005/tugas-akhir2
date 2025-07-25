<?= $this->extend('landingPage/template baru'); ?>

<?= $this->section('content'); ?>

<!-- start banner Area -->
<section class="banner-area relative">
	<video class="video-background" autoplay muted loop>
		<source src="landingPage/img/BIENNALE.mp4" type="video/mp4">
		Your browser does not support the video tag.
	</video>
	<div class="overlay overlay-bg">

	</div>

	<div class="container">
		<div class="row fullscreen align-items-center justify-content-between">
			<div class="col-lg-6 col-md-6 banner-left">
				<h3 class="text-white" id="selamatdatang">Selamat Datang</h3>
				<h1 class="text-white" style="margin-top: 0px; margin-bottom: 0px;">MUSEUM NEGERI</h1>
				<h3 class="text-white" id="ntb"><span class="typed-words"></span></h3>
				<!-- <p class="text-white">Kota u Museum Ku Kampung Ku Museum Ku</p> -->
				<a href="#" id="kmkm" class="primary-btn text-uppercase mt-4">Kotaku Museumku Kampungku Museumku</a>
			</div>
			<div class="col-lg-4 col-md-6 banner-right">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<!-- <a class="nav-link active" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true">Jadwal</a> -->
						<a class="nav-link hover" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true">Jadwal</a>

					</li>
					<li class="nav-item">
						<a class="nav-link" id="hotel-tab" data-toggle="tab" href="#hotel" role="tab" aria-controls="hotel" aria-selected="false">Tiket</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="holiday-tab" data-toggle="tab" href="#holiday" role="tab" aria-controls="holiday" aria-selected="false">Tata Tertib</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<!-- <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab"> -->
					<div class="tab-pane fade  " id="flight" role="tabpanel" aria-labelledby="flight-tab">
						<form class="form-wrap">
							<table style="text-align: left;">
								<tr>
									<td>Senin</td>
									<td>: </td>
									<td> 10.00-16.00 WITA</td>
								</tr>
								<tr>
									<td>Selasa - Kamis </td>
									<td>: </td>
									<td> 08.00-16.00 WITA</td>
								</tr>
								<tr>
									<td>Jumat </td>
									<td>: </td>
									<td> 09.00-17.00 WITA</td>
								</tr>
								<tr>
									<td>Sabtu - Minggu </td>
									<td>: </td>
									<td> 09.00-14.00 WITA</td>
								</tr>

							</table>

							<p class="mt-4" style="color: #850000;">*Museum Tutup pada hari libur nasional</p>
						</form>
					</div>
					<div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
						<form class="form-wrap">
							<table style="text-align: left;">
								<tr>
									<td class="mx-4">Dewasa</td>
									<td>: </td>
									<td>Rp. 5000</td>
								</tr>
								<tr>
									<td>Anak </td>
									<td>: </td>
									<td>Rp. 2000</td>
								</tr>
								<tr>
									<td>Wisman </td>
									<td>: </td>
									<td>Rp. 20.000</td>
								</tr>


							</table>
							<p class="mt-4" style="color: #850000;">*Bagi pengunjung rombongan mohon menghubungi terlebih dahulu nara
								hubung atau kirim surat melalui email ke <span>museumntb@gmail.com / museumnegeri@ntbprov.go.id</span>
							</p>


							<!-- <a class="btn  align-items-center my-4" style="background:#850000; color: white;" href="/etiket">Pesan Tiket</a>	 -->
						</form>
					</div>
					<div class="tab-pane fade" id="holiday" role="tabpanel" aria-labelledby="holiday-tab">
						<form class="form-wrap">
							<table style="text-align: left;">
								<tr>
									<td><img src="img/tataTertib/dont touch.png" style="width: 40px;" alt=""></td>
									<td> Dilarang Menyentuh Koleksi Museum </td>
								</tr>

								<tr>
									<td><img src="img/tataTertib/dont eat.png" style="width: 40px;" alt=""></td>
									<td>Dilarang Makan dan Minum di Dalam Ruang Pameran</td>
								</tr>
								<tr>
									<td><img src="img/tataTertib/dont run.png" style="width: 40px;" alt=""></td>
									<td>Dilarang Berlari di Area Pameran</td>
								</tr>
								<tr>
									<td><img src="img/tataTertib/no pet.png" style="width: 40px;" alt=""></td>
									<td>Dilarang Membawa Hewan Peliharaan</td>
								</tr>
								<tr>
									<td><img src="img/tataTertib/gabgae.png" style="width: 40px;" alt=""></td>
									<td>Dilarang Membuang Sampah Sembarangan</td>
								</tr>
								<tr>
									<td><img src="img/tataTertib/dont smoke.png" style="width: 40px;" alt=""></td>
									<td>Dilarang Merokok</td>
								</tr>
								<tr>
									<td><img src="img/tataTertib/no fire.png" style="width: 40px;" alt=""></td>
									<td>Dilarang Menyalakan Api</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<!-- Koleksi Section -->
<section class="koleksi-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-40 col-lg-9">
				<div class="title text-center">
					<h1 class="mb-10">Koleksi</h1>
					<p>Temukan berbagai koleksi berharga yang tersimpan di Museum Negeri NTB</p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php if (!empty($koleksi)): ?>
				<?php foreach ($koleksi as $index => $k): ?>
					<?php if ($index % 2 == 0): ?>
						<!-- Layout: Foto Kiri, Deskripsi Kanan -->
						<div class="col-lg-12 mb-5">
							<div class="row align-items-center">
								<div class="col-lg-6 col-md-6 order-1 order-lg-1">
									<div class="koleksi-thumb">
										<img class="img-fluid rounded shadow"
											src="<?= base_url("img/koleksiAdmin/" . $k['foto']); ?>"
											alt="<?= $k['nama']; ?>"
											style="width: 120%; height: 320px; object-fit: contain;">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 order-2 order-lg-2">
									<div class="koleksi-content pl-4 mt-3 mt-lg-0">
										<h3 class="mb-3" style="color: #850000;"><?= $k['nama']; ?></h3>
										<?php
										// Parse deskripsi untuk format khusus
										$deskripsi = $k['deskripsi'];
										$isStructuredDesc = (strpos($deskripsi, 'Age:') !== false ||
											strpos($deskripsi, 'Origin:') !== false ||
											strpos($deskripsi, 'Materials:') !== false ||
											strpos($deskripsi, 'Procurement Method:') !== false);
										if ($isStructuredDesc):
											// Parse structured description
											$lines = explode("\n", $deskripsi);
										?>
											<div class="koleksi-details">
												<?php foreach ($lines as $line):
													$line = trim($line);
													if (!empty($line)):
														if (strpos($line, ':') !== false):
															$parts = explode(':', $line, 2);
															$label = trim($parts[0]);
															$value = trim($parts[1]);
												?>
															<div class="detail-item mb-2">
																<strong style="color: #850000;"><?= $label ?>:</strong>
																<span><?= $value ?></span>
															</div>
														<?php
														else:
														?>
															<div class="detail-item mb-2">
																<span><?= $line ?></span>
															</div>
												<?php
														endif;
													endif;
												endforeach; ?>
											</div>
										<?php else: ?>
											<p style="text-align: justify; line-height: 1.6;">
												<?= nl2br($deskripsi); ?>
											</p>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					<?php else: ?>
						<!-- Layout: Deskripsi Kiri, Foto Kanan -->
						<div class="col-lg-12 mb-5">
							<div class="row align-items-center">
								<div class="col-lg-6 col-md-6 order-2 order-lg-1">
									<div class="koleksi-content pl-4 mt-3 mt-lg-0">
										<h3 class="mb-3" style="color: #850000;"><?= $k['nama']; ?></h3>
										<?php
										// Parse deskripsi untuk format khusus
										$deskripsi = $k['deskripsi'];
										$isStructuredDesc = (strpos($deskripsi, 'Age:') !== false ||
											strpos($deskripsi, 'Origin:') !== false ||
											strpos($deskripsi, 'Materials:') !== false ||
											strpos($deskripsi, 'Procurement Method:') !== false);
										if ($isStructuredDesc):
											// Parse structured description
											$lines = explode("\n", $deskripsi);
										?>
											<div class="koleksi-details">
												<?php foreach ($lines as $line):
													$line = trim($line);
													if (!empty($line)):
														if (strpos($line, ':') !== false):
															$parts = explode(':', $line, 2);
															$label = trim($parts[0]);
															$value = trim($parts[1]);
												?>
															<div class="detail-item mb-2">
																<strong style="color: #850000;"><?= $label ?>:</strong>
																<span><?= $value ?></span>
															</div>
														<?php
														else:
														?>
															<div class="detail-item mb-2">
																<span><?= $line ?></span>
															</div>
												<?php
														endif;
													endif;
												endforeach; ?>
											</div>
										<?php else: ?>
											<p style="text-align: justify; line-height: 1.6;">
												<?= nl2br($deskripsi); ?>
											</p>
										<?php endif; ?>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 order-1 order-lg-2">
									<div class="koleksi-thumb">
										<img class="img-fluid rounded shadow"
											src="<?= base_url("img/koleksiAdmin/" . $k['foto']); ?>"
											alt="<?= $k['nama']; ?>"
											style="width: 100%; height: 320px; object-fit: contain;">
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="col-lg-12">
					<div class="text-center">
						<p>Belum ada koleksi yang tersedia.</p>
					</div>
				</div>
			<?php endif; ?>
		</div>

		<!-- Tombol Lihat Semua Koleksi -->
		<div class="row mt-4">
			<div class="col-lg-12">
				<div class="text-center">
					<a href="<?= base_url('/koleksi'); ?>" class="btn btn-primary px-4 py-2"
						style="background-color: #850000; border-color: #850000; font-weight: 500; border-radius: 5px;">
						Lihat Semua Koleksi
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Start other-issue Area -->
<section class="other-issue-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-9">
				<div class="title text-center">
					<h1 class="mb-10">Berita Terkini</h1>
					<!-- <p>We all live in an age that belongs to the young at heart. Life that is.</p> -->
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($beritaterbaru as $b):
				if ($b['type'] == 'Narasi'): ?>
					<div class="col-lg-3 col-md-6">
						<div class="single-other-issue">
							<div class="thumb">
								<img class="img-fluid" src="<?= base_url("img/berita/" . $b['foto']); ?>" alt="">
							</div>
							<br>
							<a href="<?= base_url("/lihatberita2/{$b['id_berita']}"); ?>">
								<h5><?= $b['judul']; ?></h5>
							</a>
							<p style="text-align: justify; color:#850000;">
								<?= $b['tanggal']; ?>
							</p>
							<p style="text-align: justify;">
								<?= $b['isi_pendek']; ?>
							</p>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>

		</div>
	</div>
</section>
<!-- End other-issue Area -->

<!-- Start blog Area -->

<!-- End recent-blog Area -->

<!-- Start hot-deal Area -->
<section class="hot-deal-area ">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">Kegiatan Kami</h1>
					<p>Pantau terus kegiatan Museum</p>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-10 active-hot-deal-carusel">
				<?php
				foreach ($kegiatan as $k):
					if ($k['tampilkan'] == 'Home'): ?>
						<div class="single-carusel">
							<div class="thumb relative">
								<div class="overlay"></div>
								<a href="<?= $k['keterangan'] ?>" target="_blank"><img class="img-fluid-small" src="<?= base_url('img/kegiatan/' . $k['foto']); ?>" alt=""></a>
							</div>

						</div>
					<?php endif; ?>
				<?php endforeach; ?>

			</div>
		</div>
	</div>


	<div class="whole-wrap">
		<div class="container">
			<div class="section-top-border">
				<div class="row d-flex justify-content-center">
					<div class="menu-content pb-70 col-lg-8">
						<div class="title text-center">
							<h1 class="mb-10">Galeri</h1>
							<p></p>
						</div>
					</div>
				</div>

				<div class="row gallery-item">
					<div class="active-recent-blog-carusel">
						<?php
						foreach ($gallery as $g):
						?>
							<div class="">
								<a href="<?= base_url('img/galery/' . $g['foto']); ?>" class="img-gal">
									<div class="single-gallery-image" style="background: url(<?= base_url('img/galery/' . $g['foto']); ?>);"></div>
								</a>
							</div>
						<?php endforeach; ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End hot-deal Area -->

<?= $this->endSection(); ?>