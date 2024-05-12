<?= $this->extend('CompanyProfile/index_profile'); ?>

<?= $this-> section('main'); ?>


<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000" loop="loop">
            
            <div class="carousel-inner">
                <!-- <h3 class="text-center" style="color: #fff;">Event</h3> -->
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
<section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Sejarah</h2>
                    <h3 class="section-subheading text-muted">Museum Negeri Nusa Tenggara Barat</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <!-- <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div> -->
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>1976-1981</h4>
                                <!-- <h4 class="subheading">Our Humble Beginnings</h4> -->
                            </div>
                            <div class="timeline-body"><p class="text-muted">Museum Negeri Nusa Tenggara Barat
mulai dirintis melalui Proyek
Rehabilitasi dan Perluasan Museum
pada tahun 1976.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <!-- <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div> -->
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>1982</h4>
                                <!-- <h4 class="subheading">An Agency is Born</h4> -->
                            </div>
                            <div class="timeline-body"><p class="text-muted">Museum Negeri Nusa Tenggara Barat
diresmikan pada tanggal 23 Januari
1982 oleh Menteri oleh Mendikbud RI
Dr. Daoed Joesoef berdasarkan Surat
Keputusan Mendikbud RI
No. 022/0/1/1982.
</p></div>
                        </div>
                    </li>
                    <li>
                        <!-- <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div> -->
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>1982-2000</h4>
                                <!-- <h4 class="subheading">Transition to Full Service</h4> -->
                            </div>
                            <div class="timeline-body"><p class="text-muted">Museum Negeri Nusa Tenggara Barat
menjadi UPT (Unit Pelaksana Teknis)
Diktorat Jenderal Kebudayaan.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <!-- <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div> -->
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2000-2016</h4>
                                <!-- <h4 class="subheading">Phase Two Expansion</h4> -->
                            </div>
                            <div class="timeline-body"><p class="text-muted">Museum Negeri Nusa Tenggara Barat
bernaung di bawah Pemerintah Provinsi
Nusa Tenggara Barat dan menjadi UPTD
(Unit Pelaksana Teknis Dinas) pada
Dinas Kebudayaan dan Pariwisata
Provinsi Nusa Tenggara Barat.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <!-- <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div> -->
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2017</h4>
                                <!-- <h4 class="subheading">Phase Two Expansion</h4> -->
                            </div>
                            <div class="timeline-body"><p class="text-muted">Museum Negeri Nusa Tenggara Barat
Sejak tanggal 1 Januari 2017, Museum
Negeri Nusa Tenggara Barat
merupakan UPTD pada Dinas
Pendidikan dan Kebudayaan Provinsi
Nusa Tenggara Barat.
</p></div>
                        </div>
                    </li>
                    <!-- <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Be Part
                                <br />
                                Of Our
                                <br />
                                Story!
                            </h4>
                        </div>
                    </li> -->
                </ul>
            </div>
        </section>

<?= $this->endSection(); ?>  