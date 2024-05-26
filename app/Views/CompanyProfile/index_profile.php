<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MuseumNTB</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <a href="/"><link href="<?= base_url();?>/img/logobaru.png" rel="icon"></a>
  <a href="/"><link href="<?= base_url();?>/img/logobaru.png" rel="apple-touch-icon"></a>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0Yz/Zn6PjyW2hg0TKfTk0x60EgKJzU6wuFHYIBk1j7rFJzFLbmPe0zv9yzB2O82" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+gbg4C/N8WWtHk+N5K9K7QwoirjwQVyTC6s7721" crossorigin="anonymous"></script>
  <!-- Vendor CSS Files -->
  <link href="<?= base_url();?>/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url();?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url();?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url();?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url();?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url();?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">




  <!-- Google Fonts -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->

  <!-- Vendor CSS Files -->
  <link href="<?= base_url();?>/assets2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?= base_url();?>/assets2/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url();?>/assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url();?>/assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url();?>/assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url();?>/assets2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url();?>/assets2/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url();?>/assets2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="<?= base_url();?>/assets2/css/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url();?>/assets/css/style.css" rel="stylesheet">
  <link href="<?= base_url();?>/css/style4.css" rel="stylesheet">
  <link href="<?= base_url();?>/css/style2.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>js/sweetalert.min.js"></script>
  
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <!-- <section id="topbar" class="d-flex align-items-center">
    
  </section> -->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="/"><img src="/img/logoMuseum.png" alt="" ></a></h1>

      <nav id="navbar" class="navbar">
        <ul>
        <li><a class="nav-link scrollto" href="/" style="font-family: roboto;">Home</a></li>
          <li class="dropdown"><a href="#" style="font-family: roboto;"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/sejarah">Sejarah</a></li>
              <li><a href="/visimisi">Visi dan Misi</a></li>
              <li><a href="/struktur">Struktur Organisasi</a></li>
              
            </ul>
          </li>
          <li class="dropdown"><a href="#" style="font-family: roboto;"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/tatatertib">Tata Tertib</a></li>
              <li><a href="/ruangPamer">Ruang Pamer</a></li>
              
              
            </ul>
          </li>
          
          <li><a class="nav-link scrollto" href="/berita" style="font-family: roboto;">Berita</a></li>
          <li><a class="nav-link scrollto" href="/kegiatan" style="font-family: roboto;">Kegiatan</a></li>
          <li class="dropdown"><a href="#" style="font-family: roboto;"><span>Kajian Museum</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/kajian">Kajian</a></li>
              <!-- <li><a href="#">Hasil Kajian</a></li> -->
              <li><a href="/publikasi">Publikasi</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="/koleksi_page" style="font-family: roboto;">Koleksi</a></li>
          <li><a class="nav-link scrollto" href="/perpustakaan" style="font-family: roboto;">Perpustakaan</a></li>
          <li><a class="nav-link scrollto" href="/halamanLogin" style="font-family: roboto;">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
        
          <!-- <i  class="bi bi-list mobile-nav-toggle dropdown ">
              <ul>
                <li><a href="/">Home</a></li>
                <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
                  <ul>
                    <li><a href="/sejarah">Sejarah</a></li>
                    <li><a href="/visimisi">Visi dan Misi</a></li>
                    <li><a href="/struktur">Struktur Organisasi</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
                  <ul>
                    
                    <li><a href="/ruangPamer">Ruang Pamer</a></li>
                    <li><a href="/tatatertib">Tata Tertib</a></li>
                    <li><a href="/tatatertib">Sahabat Museum</a></li>
                    
                  </ul>
                </li>
                <li><a href="/berita">Berita</a></li>
                <li><a href="/kegiatan">Kegiatan</a></li>
                <li class="dropdown"><a href="#"><span>Kajian Museum</span> <i class="bi bi-chevron-down"></i></a>
                  <ul>
                    <li><a href="/kajian">Kajian</a></li>
                    <li><a href="#">Publikasi</a></li>
                  </ul>
                </li>
                <li><a class="nav-link scrollto" href="">Koleksi</a></li>
                <li><a class="nav-link scrollto" href="">Perpustakaan</a></li>
                <li><a class="nav-link scrollto" href="/halamanLogin">Login</a></li>
                
              </ul>
          </i> -->
            
          
        <!-- </i> -->
      </nav>

    </div>
  </header>
  <!-- End Header -->




  <main id="main">

  <!-- Begin Page Content -->
  <?= $this->renderSection('main'); ?>
                <!-- /.container-fluid -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <!-- <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div> -->

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3 style="color: #850000;">Museum NTB<span>.</span></h3>
            <p>
              Jl. Panji Tilar Negara No.6, <br>
              Taman Sari,Kec. Ampenan, Kota Mataram,<br>
              Nusa Tenggara Barat. 83117 <br><br>
              <strong>Kontak:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Total Pengunjung</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Hari Ini</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Bulan Ini</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Tahun Ini</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Keseluruhan</a></li>
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="#"></a></li> -->
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Total Koleksi</h4>
            <!-- <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Arkeologika</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul> -->
            <h1 style="color: #850000;" >7.707</h1>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Ikuti Sosial Media Kami</h4>
            <!-- <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p> -->
            <div class="social-links mt-3">
              <a href="https://twitter.com/museum_ntb" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.facebook.com/museumnegerintb/" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/museumntb/" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="https://www.youtube.com/channel/UC3491bQdveCXUTbROL_-s2A" class="google-plus"><i class="bx bxl-youtube"></i></a>
              <!-- <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- <div class="container py-4">
      <div class="copyright">
        <strong><span>Museum Negeri Nusa Tenggara Barat</span></strong>
      </div>
      <div class="credits">
      </div>
    </div> -->
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
  const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
  const navbarMobile = document.querySelector('.navbar-mobile ul');

  // Tambahkan event listener untuk toggle mobile nav saat tombol ditekan
  mobileNavToggle.addEventListener('click', function () {
    navbarMobile.classList.toggle('active');
  });
});

  </script> -->
  <!-- Vendor JS Files -->
  <script src="<?= base_url();?>/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= base_url();?>/assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url();?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url();?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url();?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url();?>/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?= base_url();?>/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url();?>/assets/js/main.js"></script>
  <!-- <script src="js/scripts4.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+gbg4C/N8WWtHk+N5K9K7QwoirjwQVyTC6s7721" crossorigin="anonymous"></script>

    <!-- Vendor JS Files -->
  <script src="<?= base_url();?>/assets2/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= base_url();?>/assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url();?>/assets2/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url();?>/assets2/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url();?>/assets2/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url();?>/assets2/js/main.js"></script>
  <script src="<?= base_url();?>/assets3/js/scripts.js"></script>


  <!-- Vendor JS Files -->
  <script src="<?= base_url();?>/assets4/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= base_url();?>/assets4/vendor/aos/aos.js"></script>
  <script src="<?= base_url();?>/assets4/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url();?>/assets4/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url();?>/assets4/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url();?>/assets4/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url();?>/assets4/js/main.js"></script>
  <script src="<?= base_url() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



</body>

</html>