
<?= $this->extend('template_profile'); ?>

<?= $this-> section('profile'); ?>

       <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
                <div class="container">
                    <a class="navbar-brand" href="#page-top"><img src="img/logo-.png" style=" width:70px; " alt="..." /></a>
                    <a class="navbar-brand" href="#page-top">Museum Negeri NTB</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars ms-1"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Profile
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown1" style="font-size: 12px;">
                                    <li><a class="dropdown-item" href="#" >Sejarah</a></li>
                                    <li><a class="dropdown-item" href="#">Visi dan Misi</a></li>
                                    <li><a class="dropdown-item" href="#">Struktur Organisasi</a></li>
                                </ul>
                            </li>
                            <!-- <li class="nav-item"><a class="nav-link" href="#services">Profile</a></li> -->
                            <li class="nav-item"><a class="nav-link" href="#portfolio">Layanan</a></li>
                            <li class="nav-item"><a class="nav-link" href="#portfolio">Berita</a></li>
                            <li class="nav-item"><a class="nav-link" href="#about">Kegiatan</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="#team">Kajian Ilmiah</a></li> -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Kajian
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown1" style="font-size: 12px;">
                                    <li><a class="dropdown-item" href="#">Artikel</a></li>
                                    <li><a class="dropdown-item" href="#">Hasil Kajian</a></li>
                                    <li><a class="dropdown-item" href="#">Publikasi</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#contact">Koleksi</a></li>
                            <li class="nav-item"><a class="nav-link" href="#contact">Perpustakaan</a></li>
                            <li class="nav-item"><a class="nav-link" href="/halamanLogin">Login</a></li>
                        </ul>
                    </div>

                    

                </div>
        </nav>

        

        <!-- Background Video-->
        <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"><source src="/assets/img/drone-museum.mp4" type="video/mp4" /></video>
        
        
        <!-- Masthead-->
        
        <div class="masthead">
            <div class="masthead-content text-white">
                <div class="container-fluid px-4 px-lg-0">
                    <h1 class="fst-italic lh-1 mb-5">Selamat Datang Di Museum Negeri Nusa Tenggara Barat</h1>
                    <p class="mb-5">KotaKu MuseumKu Kampungku Museumku</p>
                </div>
            </div>
        </div>

        <!-- Social Icons-->
        <!-- For more icon options, visit https://fontawesome.com/icons?d=gallery&p=2&s=brands-->
        <div class="social-icons">
            <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
                <a class="btn btn-success m-3" href="#!"><i class="fa-brands fa-whatsapp"></i></a>
                <a class="btn btn-primary m-3" href="#!"><i class="fa-brands fa-youtube"></i></a>
                <a class="btn btn-danger m-3" href="https://www.instagram.com/museumntb/"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>

        

        <!-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000" data-bs-wrap="true" loop="loop">
            <h2 class="text-white mt-0 text-center">Event</h2>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/kegiatan/1.png" class="img-responsive d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Judul Kegiatan</h5>
                        <p>Deskripsi Singkat</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/kegiatan/2.png" class="img-responsive d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Judul Kegiatan</h5>
                        <p>Deskripsi Singkat</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/kegiatan/3.png" class="img-responsive d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Judul Kegiatan</h5>
                        <p>Deskripsi Singkat</p>
                    </div>
                </div>
            </div>
        </div> -->

        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" loop="loop">
            
        <div class="carousel-inner">
            <h3 class="text-center" style="color: #fff;">Event</h3>
            <div class="carousel-item active">
            <img src="img/kegiatan/1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="img/kegiatan/2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="img/kegiatan/3.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>

    
        <div class="berita">
            <h3 class="text-center">Berita Terkini</h3>
            <div class=" d-flex">
                <div class="card mx-4" style="width: 18rem;">
                    <img src="img/berita/berita1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Taruna TNI Angkatan Laut Belajar Multikultural di Musuem Negeri NTB</h5>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    <a href="#" class="btn btn-danger">Baca Selengkapnya</a>
                    </div>
                </div>
            <div class="card mx-4" style="width: 18rem;">
                <img src="img/berita/berita1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Taruna TNI Angkatan Laut Belajar Multikultural di Musuem Negeri NTB</h5>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    <a href="#" class="btn btn-danger">Baca Selengkapnya</a>
                </div>
            </div>
            <div class="card mx-4" style="width: 18rem;">
                <img src="img/berita/berita1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Taruna TNI Angkatan Laut Belajar Multikultural di Musuem Negeri NTB</h5>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    <a href="#" class="btn btn-danger">Baca Selengkapnya</a>
                </div>
            </div>
            <div class="card mx-4" style="width: 18rem;">
                <img src="img/berita/berita1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Taruna TNI Angkatan Laut Belajar Multikultural di Musuem Negeri NTB</h5>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    <a href="#" class="btn btn-danger">Baca Selengkapnya</a>
                </div>
            </div>
            <div class="card mx-4" style="width: 18rem;">
                <img src="img/berita/berita1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Taruna TNI Angkatan Laut Belajar Multikultural di Musuem Negeri NTB</h5>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    <a href="#" class="btn btn-danger">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        </div>



    <div id="portfolio" class="my-4">
    <h4 class="text-center">Gallery</h4>
    <div class="container-fluid p-0 ">
        <div class="row g-0">
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/taman.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/taman.png" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Fasilitas</div>
                        <div class="project-name">Taman</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/pameran.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/pameran.png" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Fasilitas</div>
                        <div class="project-name">Ruang Pameran Tetap</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/perpus.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/perpus.png" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Fasilitas</div>
                        <div class="project-name">Perpustakaan</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/pameran.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/pameran.png" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Fasilitas</div>
                        <div class="project-name">Ruang Pameran Tetap</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/perpus.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/perpus.png" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Fasilitas</div>
                        <div class="project-name">Perpustakaan</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/perpus.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/perpus.png" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Fasilitas</div>
                        <div class="project-name">Perpustakaan</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0 ">
        <div class="row g-0">
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/taman.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/taman.png" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Fasilitas</div>
                        <div class="project-name">Taman</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/pameran.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/pameran.png" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Fasilitas</div>
                        <div class="project-name">Ruang Pameran Tetap</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/perpus.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/perpus.png" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Fasilitas</div>
                        <div class="project-name">Perpustakaan</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/pameran.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/pameran.png" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Fasilitas</div>
                        <div class="project-name">Ruang Pameran Tetap</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/perpus.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/perpus.png" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Fasilitas</div>
                        <div class="project-name">Perpustakaan</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-sm-4">
                <a class="portfolio-box" href="img/landingPage/perpus.png" title="Project Name">
                    <img class="img-fluid" src="img/landingPage/perpus.png" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Fasilitas</div>
                        <div class="project-name">Perpustakaan</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="info">
    <!-- <section class="page-section bg-dark"> -->
        <div class="container my-0">
            <div class="row">
                <div class="col-lg-4 ">
                    <div class="text-white">
                        <p class="mt-0 text-center" >Museum Negeri NTB</p>
                        <hr class="divider-light" />
                        
                        <p class="mb-4" style="font-size: 10pt;"><i class="fa-solid fa-location-dot" style="padding-right: 10px;"></i>Jl. Panji Tilar Negara No.6, Taman Sari, Kec. Ampenan, Kota Mataram, Nusa Tenggara Barat. 83117</p>
                        <!-- <p style="font-size: 10pt;">Kode Pos:  </p> -->
                        
                        <p style="font-size: 10pt;"><i class="fa-solid fa-phone" style="padding-right: 10px;"></i>08973862445</p>
                        <p style="font-size: 10pt;"><i class="fa-solid fa-envelope" style="padding-right: 10px;"></i>Email: Museum@gmail.go.id</p>
                        <p style="font-size: 10pt;"><i class="fa-brands fa-instagram" style="padding-right: 10px;"></i>museumntb</p>
                        <p style="font-size: 10pt;"><i class="fa-brands fa-youtube" style="padding-right: 10px;"></i>museumntb</p>
                        <!-- <a class="btn btn-light btn-xl" href="#services">Get Started!</a> -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="text-white text-center">
                        <p class="mt-0 text-center">Lokasi</p>
                        <hr class="divider-light" />
                        <a href="https://www.google.com/maps/place/Museum+Negeri+Nusa+Tenggara+Barat/@-8.5850895,116.0832957,17z/data=!3m1!4b1!4m6!3m5!1s0x2dcdc07e57ab2055:0x559532ffe67ed68f!8m2!3d-8.5850895!4d116.0858706!16s%2Fm%2F0r4ldj7?entry=ttu"><img src="img/landingPage/peta.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="text-white">
                        <p class="mt-0 text-center">Total Kunjungan</p>
                        <hr class="divider-light" />
                        <p class="mb-4" style="font-size: 10pt;">Total Kunjungan Hari ini </p>
                        <p class="mb-4" style="font-size: 10pt;">Total Kunjungan Bulan ini </p>
                        <p class="mb-4" style="font-size: 10pt;">Total Kunjungan Tahun ini </p>
                        <p class="mb-4" style="font-size: 10pt;">Total Kunjungan Keseluruhan </p>

                        <!-- <a class="btn btn-light btn-xl" href="#services">Get Started!</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


        
<?= $this->endSection(); ?>     
