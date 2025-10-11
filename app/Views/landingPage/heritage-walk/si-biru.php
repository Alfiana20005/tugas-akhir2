<?= $this->extend('landingPage/template baru'); ?>

<?= $this->section('content'); ?>


<!-- start banner Area -->
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Si Biru
				</h1>
				<p class="text-white link-nav"><a href="/home">Home </a> <span class="fa fa-chevron-right"></span> <a href="/heritage-walk/si-biru"> Si Biru</a></p>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->


<!-- Start post-content Area -->
<section class="post-content-area single-post-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 posts-list">
				<div class="single-post row">
					<div class="col-lg-12">
						<button class="genric-btn primary small">
							<div>Heritage Walk</div>
							<div></div>
						</button>
						<div class="feature-img">
							<img class="img-fluid mt-4" style="max-height: 400px; object-fit:scale-down;" src="<?= base_url('img/si-biru.jpg'); ?>" alt="">
						</div>
						<div class="ket" id="ket"><i class="fa-solid fa-camera mt-4" style="padding-right: 4pt;"> </i>Si Biru yang dikenal sebagai Ikon Ampenan Tempo Dulu</div>
					</div>

					<div class="col-lg-12 col-md-12">
						<h3 class="mt-20 mb-20" style="text-align:left">Si Biru: Ikon Ampenan Tempo Dulu</h3>

						<p class="excert" style="color: black;">
						<p>Kalau kamu jalan ke arah Pantai Ampenan, coba tengok bangunan kecil di pinggir jalan yang kini dikenal sebagai Gardu Listrik Tempo Dulu. Diperkirakan berdiri sekitar tahun 1930, gardu ini dibangun oleh perusahaan listrik kolonial EBALOM (Electriciteits Maatschappij Bali en Lombok), anak perusahaan ANIEM. Dulu, dari sinilah listrik pertama kali mengalir ke kawasan pelabuhan dan kota Ampenan.</p>
						<p>Tak jauh dari gardu itu berdiri satu tempat yang tak kalah ikonik: Kios Biru.
							Awalnya cuma kios kecil bercat biru di tepi jalan utama yang menjual kebutuhan sehari-hari, seperti rokok, minuman, dan camilan. Tapi karena warnanya mencolok dan letaknya strategis, kios ini jadi patokan transportasi umum menurunkan penumpangnya..
							Bagi warga Ampenan, Mataram, dan sekitarnya, ucapan “turun di Kios Biru” sudah cukup jadi penanda arah, tanpa perlu peta, semua langsung tahu di mana itu.
						</p>

						<p>Coba deh tanya orang tuamu, siapa tahu dulu mereka langganan turun di Kios Biru, atau malah kamu sendiri yang pernah naik bemo dan nongkrong di sana sambil nunggu berangkat. Hehehe… siapa sangka, tempat sederhana itu ternyata punya cerita panjang yang tak kalah terang dari lampu gardu di sebelahnya.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End post-content Area -->


<?= $this->endSection(); ?>