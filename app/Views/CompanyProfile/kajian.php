<?= $this->extend('CompanyProfile/index_profile'); ?>

<?= $this-> section('main'); ?>

<!-- <h1>Halaman Ini Dalam Tahap Pengembangan</h1>  -->
      
    <!-- ======= Breadcrumbs ======= -->
    <!-- <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
      <h3>Kajian Museum</h3>
        <div class="d-flex justify-content-between align-items-center">
          
        </div>

      </div>
    </section> -->
    
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
      <div class="section-title mt-4" data-aos="fade-up">
        <h2>Kajian  <strong>Museum</strong></h2>
      </div>

        <div class="row">

          <div class="col-lg-8 entries">
          <?php 
                foreach($kajian as $kj):
                ?>

            <article class="entry">

              <div class="entry-img">
                <img src="<?= base_url("img/kajian/". $kj['sampul']); ?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="<?= base_url("/tulisan/{$kj['id_kajian']}"); ?>"><?= $kj['judul']; ?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html"><?= $kj['penulis']; ?></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01"><?= $kj['created_at']; ?></time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html"><?= $kj['kategori']; ?></a></li>
                </ul>
              </div>

              <div class="entry-content">
                <!-- <p>
                  Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta.
                  Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.
                </p> -->
                <div class="read-more">
                  <a href="<?= base_url("/tulisan/{$kj['id_kajian']}"); ?>">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->

                <?php endforeach; ?>


            <!-- <div class="blog-pagination">
              <ul class="justify-content-center">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
              </ul>
            </div> -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <!-- <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div> -->
              <!-- End sidebar search formn-->

              <h3 class="sidebar-title">Kategori Kajian</h3>
              <div class="sidebar-item categories">
                
                <ul>
                  <li><a href="/kajian">Semua Kajian <span>(0)</span></a></li>
                  <li><a href="/kajianKategori/Opini">Opini <span>(0)</span></a></li>
                  <li><a href="/kajianKategori/Kajian Koleksi ">Kajian Koleksi <span>(12)</span></a></li>
                  <li><a href="/kajianKategori/Permuseuman">Permuseuman <span>(5)</span></a></li>
                  <li><a href="/kajianKategori/Kajian Budaya ">Kajian Budaya <span>(22)</span></a></li>
                  <li><a href="/kajianKategori/Artikel">Artikel <span>(8)</span></a></li>
                  <!-- <li><a href="#">Educaion <span>(14)</span></a></li> -->
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Kajian Terbaru</h3>
              <div class="sidebar-item recent-posts">
                <?php 
                foreach ($kajianTerbaru as $kajian): {
                  # code...
                } ?>
                <div class="post-item clearfix">
                  <img src="<?= base_url("img/kajian/". $kajian['sampul']); ?>" alt="">
                  <h4><a href="<?= base_url("/tulisan/{$kajian['id_kajian']}"); ?>"><?= $kajian['judul']; ?></a></h4>
                  <time datetime="2020-01-01"><?= $kajian['created_at']; ?></time>
                </div>

                <?php endforeach; ?>



              </div><!-- End sidebar recent posts-->

              <!-- <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div> -->
              <!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

<?= $this->endSection(); ?>  