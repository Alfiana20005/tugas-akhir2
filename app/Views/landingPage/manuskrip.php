
<?= $this->extend('landingPage/template baru'); ?>

<?= $this-> section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
		<div class="container">				
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
								Manuskrip		
					</h1>	
					<p class="text-white link-nav"><a href="/home">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/Manuskrip">Manuskrip</a></p>
				</div>	
			</div>
		</div>
</section>
<!-- End banner Area -->	

			<!-- End banner Area -======= Our Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">
         
                                        <?php if (session()->getFlashdata('errors')): ?>
                                            <div class="alert alert-danger mt-4" role="alert">
                                                <?= session()->getFlashdata('errors'); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (session()->getFlashdata('pesanlogin')): ?>
                                            <div class="alert alert-danger mt-4" role="alert">
                                                <?= session()->getFlashdata('pesanlogin'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (session()->getFlashdata('pesanlogout')): ?>
                                            <div class="alert alert-success mt-4" role="alert">
                                                <?= session()->getFlashdata('pesanlogout'); ?>
                                            </div>
                                        <?php endif; ?>
            <div class="row d-flex justify-content-center mt-4">
                <div class="menu-content pb-60 col-lg-9">
                <style>
                    .hover-effect {
                        color: black; /* Warna teks default */
                        text-decoration: none;
                        transition: color 0.3s ease; /* Efek transisi */
                    }

                    .hover-effect:hover {
                        color: #850000; /* Warna teks saat di-hover */
                    }
                    /* Hilangkan tampilan radio button asli */
                    input[type="radio"] {
                        display: none;
                    }

                    /* Gaya untuk tombol toggle */
                    label.toggle-button {
                        cursor: pointer;
                        padding: 8px 16px;
                        background-color: #850000;
                        color: white;
                        border-radius: 4px;
                        margin-right: 10px;
                        font-size: 0.9em;
                    }

                    /* Gaya tombol aktif */
                    input[type="radio"]:checked + label.toggle-button {
                        background-color: #500000;
                    }

                    /* Sembunyikan section secara default */
                    #koleksiSection, #transliterasiSection {
                        display: none;
                        margin-top: 16px;
                    }

                    /* Tampilkan section yang dipilih */
                    #toggleKoleksi:checked ~ #koleksiSection {
                        display: block;
                    }

                    #toggleTransliterasi:checked ~ #transliterasiSection {
                        display: block;
                    }
                </style>

                    <div class="text-center">
                        <?php if (isset($user['nama'])): ?>
                            <a href="#" class="hover-effect">Hallo <?= $user['nama']; ?>!</a>
                            <a href="/logoutUser" class="hover-effect">| logout</a>
                            <br>
                            
                            <div class="mt-4">
                                <!-- <a href="" class="btn btn-primary btn-sm " style="background-color: #850000; border:#850000;">Koleksi Manuskrip</a>
                                <a href="" class="btn btn-primary mx-2 btn-sm" style="background-color: #850000; border:#850000;"  >Transliterasi Manuskrip</a> -->
                                <input type="radio" id="toggleKoleksi" name="toggle" checked>
                                <label for="toggleKoleksi" class="toggle-button">Koleksi Manuskrip</label>
                                
                                <input type="radio" id="toggleTransliterasi" name="toggle">
                                <label for="toggleTransliterasi" class="toggle-button">Transliterasi Manuskrip</label>
                            </div>
                            
                        <?php else: ?>
                            <a href="/formlogin" class="hover-effect">Login</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>	

            <!-- <div class="row"> -->
              
              

                <?php if (isset($user['nama'])): ?>

                    <div id="koleksiSection">
                        <!-- <h4 class="my-4">Koleksi Manuskrip</h4> -->
                        <div class="row">
                            <?php if (!empty($manuskripKol)) : ?>
                                <?php foreach($manuskripKol as $m): ?> 
                                    <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
                                        <div class="member" data-aos="fade-up">
                                            <div class="member-img">
                                                <img src="<?= base_url("img/manuskrip/". $m['foto']); ?>" class="img-fluid" alt="">
                                            </div>
                                            <div class="member-info">
                                                <h6><a href="<?= base_url("saveViews2/" . $m['id']); ?>" target="_blank" style="color:#850000;"><?= $m['nama']; ?></a></h6>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>Data Koleksi Manuskrip tidak ditemukan.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Bagian Transliterasi Manuskrip -->
                    <div id="transliterasiSection">
                        <!-- <h4 class="my-4">Transliterasi Manuskrip</h4> -->
                        <div class="row">
                            <?php if (!empty($manuskrip)) : ?>
                                <?php foreach($manuskrip as $m): ?> 
                                    <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
                                        <div class="member" data-aos="fade-up">
                                            <div class="member-img">
                                                <img src="<?= base_url("img/manuskrip/". $m['foto']); ?>" class="img-fluid" alt="">
                                            </div>
                                            <div class="member-info">
                                                <h6><a href="<?= base_url("saveViews/" . $m['id_manuskrip']); ?>" target="_blank" style="color:#850000;"><?= $m['judul']; ?></a></h6>
                                                <span><?= $m['tanggal']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>Data Transliterasi Manuskrip tidak ditemukan.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- <?php foreach($manuskripKol as $m):?> 
                        <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
                            <div class="member" data-aos="fade-up">
                            <div class="member-img">
                                <img src="<?= base_url("img/manuskrip/". $m['foto']); ?>" class="img-fluid"  alt="">
                                
                            </div>
                            <div class="member-info">
                                <h6><a href="<?= $m['link']; ?>" target="_blank" style="color:#850000;"  ><?= $m['nama']; ?></a></h6>
                                
                            </div>
                            </div>
                        </div>
                    <?php endforeach; ?> -->

                    <!-- <?php foreach($manuskrip as $m):?> 
                        <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
                            <div class="member" data-aos="fade-up">
                            <div class="member-img">
                                <img src="<?= base_url("img/manuskrip/". $m['foto']); ?>" class="img-fluid"  alt="">
                                
                            </div>
                            <div class="member-info">
                                <h6><a href="<?= $m['link']; ?>" target="_blank" style="color:#850000;"  ><?= $m['judul']; ?></a></h6>
                                <span><?= $m['tanggal']; ?></span>
                            </div>
                            </div>
                        </div>
                    <?php endforeach; ?> -->
                    

                <?php else: ?>
                    <div><h4 class="mb-4">Koleksi Manuskrip</h4></div>
                    <div class="row">
                        <?php foreach($manuskripKolTerbaru as $m):?> 
                            <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
                                <div class="member" data-aos="fade-up">
                                <div class="member-img">
                                    <img src="<?= base_url("img/manuskrip/". $m['foto']); ?>" class="img-fluid"  alt="">
                                    
                                </div>
                                <div class="member-info">
                                    <h6><a href="/formlogin" target="_blank" style="color:#850000;"  ><?= $m['nama']; ?></a></h6>
                                    
                                </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div><h4 class="my-4">Transliterasi Manuskrip</h4></div>
                    <div class="row">
                        <?php foreach($manuskripTerbaru as $m):?> 
                            <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
                                <div class="member" data-aos="fade-up">
                                <div class="member-img">
                                    <img src="<?= base_url("img/manuskrip/". $m['foto']); ?>" class="img-fluid"  alt="">
                                    
                                </div>
                                <div class="member-info">
                                    <h6><a href="/formlogin" target="_blank" style="color:#850000;"  ><?= $m['judul']; ?></a></h6>
                                    <span><?= $m['tanggal']; ?></span>
                                </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    

                    

                <?php endif; ?>

            <!-- </div> -->
            <div class="section-top-border">
						<h3 class="mb-30">Digitalisasi Manuskrip</h3>
						<div class="row">
							<div class="col-lg-12">
								<blockquote class="generic-blockquote">
									Digitalisasi ini dilakukan oleh Museum Negeri Nusa Tenggara Barat berkolaborasi dengan Badan Riset dan Inovasi Nasional (BRIN) dalam program "Digitasisasi Koleksi".
                                    Melalui program ini, sejumlah manuskrip telah berhasil terdokumentasikan dalam format digital, yang bertujuan untuk memudahkan pelestarian, aksesibilitas, dan pemanfaatan informasi koleksi oleh masyarakat luas.
                                    <br><br>
                                    Daftar Manuskrip:
                                    <br>
                                    <table>
                                        <tr>
                                            <td>
                                                <li>Kakawin Hariwangsa</li>
                                                <li>Katika Tajul Muluk</li>
                                                <li>Pelukatan</li>
                                                <li>Mantra Bali</li>
                                                <li>Pasopati Siwa Dewata</li>
                                                <li>Brahma</li>
                                                <li>Kakawin Arjuna Wiwaha</li>
                                                <li>Sang Hyang Dewa</li>
                                                <li>Sang Hyang Ayu</li>
                                                <li>Sang Hyang Brahma</li>
                                                <li>Sang Hyang Darma</li>
                                                <li>Sang Hyang Widi</li>
                                                <li>Agama Hindu</li>
                                                <li>Batara Guru</li>
                                                <li>Puspakarma</li>
                                                <li>Bandar Sela</li>
                                                <li>Surat-surat</li>
                                                <li>Puspalaya</li>
                                                <li>Kayat Karbi</li>
                                                <li>Barunambara</li>
                                                <li>Badik Walam</li>
                                                <li>Selojaya Selapati</li>
                                                <li>Pedang Kamkam</li>
                                                <li>Rasajati</li>
                                                <li>Sangka Langit</li>
                                                <li>Ratna Bungsi</li>
                                            </td>
                                            <td>
                                                
                                                <li>Subandana</li>
                                                <li>Markum</li>
                                                <li>Suradilaga</li>
                                                <li>Tutur Sari Kuning</li>
                                                <li>Kakawin Ramayana</li>
                                                <li>Brahma</li>
                                                <li>Sang Hyang Dharma</li>
                                                <li>Hyang Widi</li>
                                                <li>Agama hindu</li>
                                                <li>Batara Guru</li>
                                                <li>Puspakerma</li>
                                                <li>Manek Pedang Kamkam</li>
                                                <li>Sang Hyang Widhi</li>
                                                <li>Angling Darma</li>
                                                <li>Katika</li>
                                                <li>Kotaragama</li>
                                                <li>Indarjaya</li>
                                                <li>Warung Bali</li>
                                                <li>Mantra dan Doa</li>
                                                <li>Perjanjiian Sultan Salahuddin Bima</li>
                                                <li>Silsilah Raja Bima</li>
                                                <li>Al-Quran</li>
                                                <li>Babad Suwung</li>
                                                <li>Monyeh</li>
                                                <li>Sejarah Bima</li>
                                            </td>
                                        </tr>
                                        
                                    </table>
                                    
                                    
                                    
                                    <br><br>
                                    Bagi para peneliti, pelajar, atau masyarakat yang ingin mengakses manuskrip ini, dapat mengajukan permohonan resmi kepada pihak museum. Permohonan dapat dikirimkan melalui email resmi museum disertai informasi terkait tujuan dan kebutuhan akses. Kami dengan senang hati akan memproses permohonan tersebut sesuai dengan prosedur yang berlaku.
                                </blockquote>
								
							</div>
						</div>
					</div>

        </div>
    </section><!-- End Our Team Section -->

    <div class="modal fade" id="tambahKegiatan" tabindex="-1" aria-labelledby="tambahKegiatan" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="tambahKegiatan">Login</h4>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <form action="/loginUser" method="post" enctype="multipart/form-data" id="form">
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="recipient-name" name="nama">
                        </div>
                    </div>
                
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="recipient-name" name="password">
                        </div>
                    </div>
                
                    <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#daftar" data-bs-whatever="@getbootstrap">Daftar</button> -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
               
            </div>
            
        </div>
    </div>


    <div class="modal fade" id="daftar" tabindex="-1" aria-labelledby="daftar" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="daftar">Daftar Akun</h4>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <form action="/registerUser" method="post" enctype="multipart/form-data" id="form">
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="nama">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Pekerjaan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="pekerjaan">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Whatsapp</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="wa">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="recipient-name" name="email">
                    </div>
                </div>
                
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="password">
                    </div>
                </div>
                
                <div class="modal-footer">
                  
                  <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                  <!-- <button type="button" class="btn btn-primary" id="openLoginFromDaftar">Login</button> -->
                  <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Daftar</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
                </form>
            </div>
            
        </div>
    </div>


    <script async src="https://cdn.jsdelivr.net/npm/es-module-shims@1/dist/es-module-shims.min.js" crossorigin="anonymous"></script>
    <script type="importmap">
    {
      "imports": {
        "@popperjs/core": "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/esm/popper.min.js",
        "bootstrap": "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.esm.min.js"
      }
    }
    </script>
    <script type="module">
      import * as bootstrap from 'bootstrap'

      new bootstrap.Popover(document.getElementById('popoverButton'))
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleKoleksi = document.getElementById("toggleKoleksi");
        const toggleTransliterasi = document.getElementById("toggleTransliterasi");

        const koleksiSection = document.getElementById("koleksiSection");
        const transliterasiSection = document.getElementById("transliterasiSection");

        // Fungsi untuk mengubah tampilan
        function updateDisplay() {
            if (toggleKoleksi.checked) {
                koleksiSection.style.display = "block";
                transliterasiSection.style.display = "none";
            } else if (toggleTransliterasi.checked) {
                koleksiSection.style.display = "none";
                transliterasiSection.style.display = "block";
            }
        }

        // Jalankan fungsi saat radio button berubah
        toggleKoleksi.addEventListener("change", updateDisplay);
        toggleTransliterasi.addEventListener("change", updateDisplay);

        // Panggil fungsi sekali untuk set awal
        updateDisplay();
    });
</script>

    



<?= $this->endSection(); ?>  