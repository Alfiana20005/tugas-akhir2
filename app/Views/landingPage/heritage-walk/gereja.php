<?= $this->extend('landingPage/template baru'); ?>

<?= $this->section('content'); ?>


<!-- start banner Area -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Santo Antonius
                </h1>
                <p class="text-white link-nav"><a href="/home">Home </a> <span class="fa fa-chevron-right"></span> <a href="/heritage-walk/si-biru"> St. Antonius</a></p>
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
                            <img class="img-fluid" src="<?= base_url('img/si-biru.jpg'); ?>" alt="">
                        </div>
                        <div class="ket" id="ket"><i class="fa-solid fa-camera" style="padding-right: 4pt;"> </i>Gereja St. Antonius</div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <h3 class="mt-20 mb-20" style="text-align:left">Santo Antonius Padua Ampenan: Warisan Rohani di Kota Tua</h3>

                        <p class="excert" style="color: black;">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>

                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>

                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p>

                        <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End post-content Area -->


<?= $this->endSection(); ?>