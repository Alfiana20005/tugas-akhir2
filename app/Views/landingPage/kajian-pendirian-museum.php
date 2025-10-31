<?= $this->extend('landingPage/template baru'); ?>

<?= $this->section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Kajian Pendirian Museum
                </h1>
                <p class="text-white link-nav"><a href="/home">Home </a> <span class="fa fa-chevron-right"></span> <a href="/kajian-pendirian-museum"> Kajian Pendirian Museum</a> <span class="fa fa-chevron-right"></span> Detail</p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start Publication Detail Area -->
<section class="sample-text-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="publication-detail">
                    <!-- Publication Preview -->
                    <div class="mb-4">
                        <!-- Google Drive Preview -->
                        <div class="embed-responsive" style="position: relative; width: 100%; height: 600px; overflow: hidden; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                            <iframe src="https://drive.google.com/file/d/1RLwSiThPDkuCEQ9f5W9iCYb99vF5szq7/preview"
                                style="width: 100%; height: 100%; border: none;"
                                allow="autoplay">
                            </iframe>
                        </div>
                    </div>

                    <!-- Publication Title -->
                    <div class="mb-4">
                        <h2 class="text-center" style="color:#850000;">
                            Kajian Pendirian Museum
                        </h2>
                    </div>

                    <!-- Action Buttons -->
                    <div class="text-center">
                        <a href="https://drive.google.com/file/d/1RLwSiThPDkuCEQ9f5W9iCYb99vF5szq7/view?usp=sharing"
                            target="_blank"
                            class="btn btn-primary btn-md mb-3 me-2"
                            style="background-color:#850000; border-color:#850000; padding: 12px 30px;">
                            <i class="fa fa-download"></i> Download / Buka di Google Drive
                        </a>
                        <a href="https://drive.google.com/drive/u/2/folders/1WApVHbvjJEdFP-R7TiaYUDBkihhlCBTB"
                            target="_blank"
                            class="btn btn-primary btn-md mb-3"
                            style="background-color:#850000; border-color:#850000; padding: 12px 30px;">
                            <i class="fa fa-folder-open"></i> Borang Museum
                        </a>
                        <br>
                        <a href="<?= base_url('publikasi'); ?>"
                            class="btn btn-outline-secondary"
                            style="padding: 10px 25px;">
                            <i class="fa fa-arrow-left"></i> Kembali ke Daftar Publikasi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Publication Detail Area -->

<?= $this->endSection(); ?>