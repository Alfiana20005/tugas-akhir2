<?= $this->extend('landingPage/template baru'); ?>
<?= $this->section('content'); ?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Source+Serif+4:ital,wght@0,300;0,400;0,600;1,300&display=swap');

    :root {
        --maroon: #850000;
        --maroon-dark: #5c0000;
        --maroon-light: #b30000;
        --gold: #c9a84c;
        --gold-light: #e8c97a;
        --cream: #fdf8f2;
        --ink: #1a1208;
        --ink-soft: #3d2f1f;
        --border: #e8ddd0;
    }

    body {
        background-color: var(--cream);
        color: var(--ink);
    }

    .post-content-area {
        padding: 20px 0 80px;
    }

    .section-heading {
        font-family: 'Playfair Display', serif;
        font-size: 1.35rem;
        font-weight: bold;
        color: var(--maroon);
        border-left: 4px solid var(--gold);
        padding-left: 14px;
        margin-top: 50px;
        margin-bottom: 20px;
    }

    .desc-box {
        background: #fff;
        border: 1px solid var(--border);
        border-left: 4px solid var(--maroon);
        border-radius: 6px;
        padding: 22px 26px;
        margin-bottom: 28px;
        box-shadow: 0 2px 10px rgba(133, 0, 0, 0.06);
    }

    .desc-box p {
        color: var(--ink-soft);
        line-height: 1.85;
        font-size: .98rem;
        margin: 0;
    }

    .styled-list {
        list-style: none;
        padding: 0;
    }

    .styled-list>li {
        padding: 10px 0;
        border-bottom: 1px dashed var(--border);
        color: var(--ink-soft);
        line-height: 1.75;
        font-size: .98rem;
    }

    .styled-list>li:last-child {
        border-bottom: none;
    }

    .styled-list>li>strong {
        color: var(--maroon);
        margin-right: 6px;
    }

    .btn-download {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: var(--maroon);
        color: #fff;
        font-size: 1rem;
        padding: 14px 36px;
        border-radius: 4px;
        border: 2px solid var(--maroon);
        text-decoration: none;
        transition: all .25s;
        margin-top: 24px;
    }

    .btn-download:hover {
        background: transparent;
        color: var(--maroon);
        text-decoration: none;
    }

    .ornament-divider {
        text-align: center;
        color: var(--gold);
        font-size: 1.2rem;
        letter-spacing: 12px;
        margin: 40px 0 0;
        opacity: .6;
    }

    .cp-float {
        position: fixed;
        bottom: 32px;
        right: 28px;
        z-index: 999;
    }

    .cp-toggle {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: var(--maroon);
        color: #fff;
        border: none;
        font-size: 1.2rem;
        box-shadow: 0 4px 16px rgba(133, 0, 0, .35);
        cursor: pointer;
        transition: transform .2s;
    }

    .cp-toggle:hover {
        transform: scale(1.08);
    }

    .cp-content {
        display: none;
        position: absolute;
        bottom: 62px;
        right: 0;
        background: var(--maroon);
        color: #fff;
        border-radius: 8px;
        padding: 20px 22px;
        min-width: 200px;
        box-shadow: 0 6px 24px rgba(133, 0, 0, .3);
        font-size: 14px;
    }

    .cp-content.open {
        display: block;
    }

    .cp-close {
        background: none;
        border: none;
        color: #fff;
        float: right;
        cursor: pointer;
        opacity: .7;
    }

    .cp-close:hover {
        opacity: 1;
    }

    .cp-content a {
        color: var(--gold-light);
    }
</style>

<!-- Banner -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">Lomba Melukis Caping</h1>
                <p class="text-white link-nav">
                    <a href="/home">Home</a>
                    <span class="fa fa-chevron-right"></span>
                    <a href="/lomba-melukis-caping">Lomba Melukis Caping</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Content -->
<section class="post-content-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <h3 class="section-heading">Deskripsi</h3>
                <div class="desc-box">
                    <p>Lomba Melukis Caping adalah kegiatan kreatif bagi siswa untuk mengekspresikan imajinasi dan nilai budaya melalui hiasan pada caping sebagai media seni tradisional yang edukatif.</p>
                </div>

                <div class="ornament-divider">✦ ✦ ✦</div>

                <h3 class="section-heading">Persyaratan Pendaftaran</h3>
                <ul class="styled-list">
                    <li><strong>1.</strong> Peserta merupakan siswa aktif SD sederajat kelas <strong>4, 5, atau 6</strong>.</li>
                    <li><strong>2.</strong> Lomba bersifat <strong>individu</strong>.</li>
                    <li><strong>3.</strong> Peserta melukis atau menghias caping sesuai tema yang ditentukan oleh panitia.</li>
                    <li><strong>4.</strong> Seluruh perlengkapan utama disediakan oleh panitia.</li>
                    <li><strong>5.</strong> Peserta wajib hadir tepat waktu sesuai jadwal yang telah ditentukan.</li>
                    <li><strong>6.</strong> Peserta wajib menjaga kebersihan dan ketertiban selama kegiatan berlangsung.</li>
                    <li><strong>7.</strong> Mengisi formulir pendaftaran dan mengumpulkan sesuai batas waktu yang ditentukan.</li>
                    <li><strong>8.</strong> Keputusan dewan juri bersifat mutlak dan tidak dapat diganggu gugat.</li>
                    <li><strong>9.</strong> Pendaftaran akan ditutup apabila kuota sudah terpenuhi.</li>
                </ul>

                <div class="ornament-divider">✦ ✦ ✦</div>

                <div class="text-center mt-5 mb-2">
                    <a href="https://forms.gle/P7oqHrgMFKpJQP2H9" target="_blank" class="btn-download">
                        <i class="fa fa-pencil"></i> Formulir Pendaftaran Lomba Melukis Caping
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Float Contact -->
<div class="cp-float" id="cpFloat">
    <button class="cp-toggle" onclick="toggleCP()">
        <i class="fa fa-phone"></i>
    </button>
    <div class="cp-content" id="cpContent">
        <button class="cp-close" onclick="toggleCP()"><i class="fa fa-times"></i></button>
        <h6 style="margin-bottom:10px;font-weight:bold;">Hubungi Kami</h6>
        <p style="margin:5px 0;font-size:14px;"><i class="fa fa-user"></i> Lala</p>
        <p style="margin:5px 0;font-size:14px;"><i class="fa fa-phone"></i> <a href="https://wa.me/622145090530">0821-4509-0530</a></p>
    </div>
</div>

<script>
    function toggleCP() {
        document.getElementById('cpContent').classList.toggle('open');
    }
</script>

<?= $this->endSection(); ?>