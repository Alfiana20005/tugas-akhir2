<?= $this->extend('landingPage/template baru'); ?>

<?= $this->section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Katalog Pameran Temporer
                </h1>
                <p class="text-white link-nav"><a href="/home">Home </a> <span class="fa fa-chevron-right"></span> <a href="/katalog-pameran-temporer"> Katalog Pameran Temporer</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<style>
    .content-section {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 60px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .content-section.reverse {
        flex-direction: row-reverse;
    }

    .image-side {
        flex: 1;
        min-width: 450px;
    }

    .image-side img {
        width: 100%;
        height: 350px;
        object-fit: cover;
    }

    .text-side {
        flex: 1;
        padding: 30px;
        margin: 0;
    }

    .section-badge {
        display: inline-block;
        background: #850000;
        color: white;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .section-title {
        font-size: 20px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 10px;
        text-align: left;
    }

    .section-code {
        font-family: 'Courier New', monospace;
        font-size: 13px;
        color: #333;
        margin-bottom: 15px;
        padding: 8px 12px;
        background: #f7fafc;
        border-left: 4px solid #850000;
        display: inline-block;
    }

    .section-desc {
        font-size: 15px;
        color: #333;
        line-height: 1.8;
        margin-bottom: 10px;
    }

    @media (max-width: 768px) {

        .content-section,
        .content-section.reverse {
            flex-direction: column;
            margin-bottom: 40px;
            gap: 30px;
        }

        .image-side {
            min-width: 100%;
            height: auto;
        }

        .image-side img {
            height: 100%;
            object-fit: cover;
        }

        .text-side {
            margin-top: -30px;
        }

        .about-content h1 {
            font-size: 28px;
        }
    }
</style>

<!-- Start post-content Area -->
<section class="post-content-area single-post-area">
    <div class="container">
        <!-- KELOMPOK 1: KERE ALANG (11 items) -->

        <!-- Section 1: Kere Alang -->
        <div class="content-section">
            <div class="image-side">
                <img src="<?= base_url('img/5490.png'); ?>" alt="Dummy Image 1">
            </div>
            <div class="text-side">
                <span class="section-badge">Kain Songket Singapura</span>
                <h3 class="section-title">Motif Perahu Layar,Pucuk Rebung, Bunga, dan Geometris</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1991/1992, <strong>No.5490</strong></div>
                <p class="section-desc">
                    <strong>Asal dibuat kemungkinan:</strong> India atau Eropa<br>
                    <strong>Asal Perolehan:</strong> Lombok, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1925 – 1970
                </p>
                <p class="section-desc">
                    Terbuat dari benang katun dengan teknik songket. Kain dihias dengan motif perahu layar, pucuk rebung, bunga, dan geometris. Kain ini dipakai pada saat upacara adat. Disebut kain Singapura karena perdagangan ditemukan di Singapura, sehingga ketika dijual di Lombok disebut juga Kain Singapura
                </p>
            </div>
        </div>

        <!-- Section 2: Kere Alang -->

    </div>
</section>
<!-- End post-content Area -->

<?= $this->endSection(); ?>