<?= $this->extend('CompanyProfile/index_profile'); ?>

<?= $this-> section('main'); ?>

<!-- <h3 class="text-center">Halaman Ini Dalam Tahap Pengembangan</h3>  -->


    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Publikasi</h2>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>

        <div class="row">
          <?php foreach($publikasi as $p):?>   
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="<?= base_url("img/publikasi/". $p['foto']); ?>" class="img-fluid" alt="">
                <div class="social">
                  <!-- <a href=""><i class="bi bi-download"></i></a>                   -->
                  <a href="<?= $p['link']; ?>"><i class="fa-solid fa-circle-info"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4><?= $p['judul']; ?></h4>
                <span><?= $p['tanggal']; ?></span>
              </div>
            </div>
          </div>
          <?php endforeach; ?>

        </div>

      </div>
    </section><!-- End Doctors Section -->

<?= $this->endSection(); ?>  