<?= $this->extend('landingPage/template baru'); ?>

<?= $this-> section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Ruang Pamer			
							</h1>	
							<p class="text-white link-nav"><a href="/home">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/ruangPamer2"> Ruang Pamer</a></p>
						</div>	
					</div>
				</div>
</section>
<!-- End banner Area -->	

<section id="departments" class="departments mb-4">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <!-- <h2>Ruang Pamer</h2>
          <p> Sebuah wadah aktivitas yang dilakukan pengguna dalam museum yang berfungsi sebagai elemen utama visualisasi, ruang sebagai program, ruang sebagai susunan tata letak, dalam sebuah museum.</p> -->
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                  <h4>Ruang Pameran Tetap 1</h4>
                  <p>Klik untuk melihat detail</p>
                </a>
              </li>
              <li class="nav-item mt-2">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                  <h4>Ruang Pameran Tetap 2</h4>
                  <p>Klik untuk melihat detail</p>
                </a>
              </li>
              <li class="nav-item mt-2">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                  <h4>Ruang Khazanah</h4>
                  <p>Klik untuk melihat detail</p>
                </a>
              </li>
              <li class="nav-item mt-2">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                  <h4>Ruang Geologi</h4>
                  <p>Klik untuk melihat detail</p>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-lg-8">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <h3>Ruang Pameran Tetap 1</h3>
                <!-- <p class="fst-italic">Museum Negeri
NTB juga memiliki Ruang Pameran Tetap 1 Berisi koleksi-koleksi warisan geologi dan
keanekaragaman geologi di Nusa Tenggara Barat.
</p> -->
                <img src="img/ruangPamer/ruang1.png" alt="" class="img-fluid">
                <p>Museum Negeri
NTB juga memiliki Ruang Pameran Tetap 1 Berisi koleksi-koleksi warisan geologi dan
keanekaragaman geologi di Nusa Tenggara Barat.</p>
              </div>
              <div class="tab-pane" id="tab-2">
                <h3>Ruang Pameran Tetap 2</h3>
                <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                <img src="assets/img/departments-2.jpg" alt="" class="img-fluid">
                <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
              </div>
              <div class="tab-pane" id="tab-3">
                <h3>Ruang Khazanah</h3>
                <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                <img src="assets/img/departments-3.jpg" alt="" class="img-fluid">
                <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
              </div>
              <div class="tab-pane" id="tab-4">
                <h3>Ruang Geologi</h3>
                <!-- <p class="fst-italic">Di halaman museum terdapat beberapa koleksi
unggulan antara lain Lingga Yoni, dua buah meriam
yang merupakan peninggalan masa penjajahan, dan
jangkar kapal.</p> -->
                <img src="img/ruangPamer/geologi.jpg" alt="" class="img-fluid">
                <p> Museum Negeri
NTB juga memiliki Pusat Informasi Geologi (PIG) yang
terpisah dengan gedung utama. Ruang geologi ini dibuat
untuk mempublikasikan dan menginformasikan warisan
geologi, keanekaragaman geologi, keanekaragaman
hayati dan keragaman budaya di Gunung Rinjani sebagai
Geopark Dunia yang dinyatakan oleh UNESCO pada tahun 2018</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>


<?= $this->endSection(); ?>  