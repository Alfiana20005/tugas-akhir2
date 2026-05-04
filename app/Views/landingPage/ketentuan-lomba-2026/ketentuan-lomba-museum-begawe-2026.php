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
    }

    .linktree-area {
        padding: 60px 20px 80px;
    }

    .section-label {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--maroon);
        text-align: center;
        margin-bottom: 8px;
    }

    .section-desc {
        font-size: 0.9rem;
        color: var(--ink-soft);
        text-align: center;
        margin-bottom: 40px;
        opacity: 0.8;
    }

    /* Accordion */
    .acc-wrapper {
        display: flex;
        flex-direction: column;
        gap: 16px;
        max-width: 780px;
        margin: 0 auto;
    }

    .acc-item {
        background: #fff;
        border: 2px solid var(--border);
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(133, 0, 0, 0.05);
        overflow: hidden;
        transition: border-color 0.25s;
    }

    .acc-item.open {
        border-color: var(--maroon);
    }

    .acc-header {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 18px 24px;
        cursor: pointer;
        position: relative;
        user-select: none;
    }

    .acc-header::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background: var(--maroon);
    }

    .acc-icon {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #fdf4ec;
        border: 1.5px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        color: var(--maroon);
        flex-shrink: 0;
        transition: all 0.25s;
    }

    .acc-item.open .acc-icon {
        background: var(--maroon);
        color: #fff;
    }

    .acc-title {
        flex: 1;
    }

    .acc-title strong {
        display: block;
        font-family: 'Playfair Display', serif;
        font-size: 1.05rem;
        color: var(--maroon);
        margin-bottom: 2px;
    }

    .acc-title span {
        font-size: 0.82rem;
        color: var(--ink-soft);
        opacity: 0.75;
    }

    .acc-chevron {
        font-size: 0.9rem;
        color: var(--gold);
        transition: transform 0.3s ease;
    }

    .acc-item.open .acc-chevron {
        transform: rotate(90deg);
    }

    .acc-body {
        display: none;
        padding: 0 24px 28px 24px;
        border-top: 1px dashed var(--border);
    }

    .acc-item.open .acc-body {
        display: block;
    }

    .section-heading {
        font-family: 'Playfair Display', serif;
        font-size: 1.1rem;
        font-weight: bold;
        color: var(--maroon);
        border-left: 4px solid var(--gold);
        padding-left: 12px;
        margin-top: 28px;
        margin-bottom: 14px;
    }

    .desc-box {
        background: var(--cream);
        border: 1px solid var(--border);
        border-left: 4px solid var(--maroon);
        border-radius: 6px;
        padding: 18px 20px;
        margin-bottom: 10px;
    }

    .desc-box p {
        color: var(--ink-soft);
        line-height: 1.85;
        font-size: .95rem;
        margin: 0;
    }

    .styled-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .styled-list > li {
        padding: 9px 0;
        border-bottom: 1px dashed var(--border);
        color: var(--ink-soft);
        line-height: 1.75;
        font-size: .95rem;
    }

    .styled-list > li:last-child {
        border-bottom: none;
    }

    .styled-list > li > strong {
        color: var(--maroon);
        margin-right: 6px;
    }

    .sub-list {
        list-style: none;
        padding: 0 0 0 24px;
        margin-top: 6px;
    }

    .sub-list li {
        padding: 4px 0;
        color: var(--ink-soft);
        font-size: .93rem;
        line-height: 1.7;
    }

    .sub-list li strong {
        color: var(--maroon-light);
        margin-right: 6px;
    }

    .btn-download {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: var(--maroon);
        color: #fff;
        font-size: .95rem;
        padding: 12px 28px;
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
        font-size: 1.1rem;
        letter-spacing: 12px;
        margin-top: 48px;
        opacity: 0.5;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .acc-item:nth-child(1) { animation: fadeUp 0.5s ease 0.1s both; }
    .acc-item:nth-child(2) { animation: fadeUp 0.5s ease 0.22s both; }
    .acc-item:nth-child(3) { animation: fadeUp 0.5s ease 0.34s both; }
</style>

<!-- Banner -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">Tautan Penting</h1>
                <p class="text-white link-nav">
                    <a href="/home">Home</a>
                    <span class="fa fa-chevron-right"></span>
                    <a href="#">Tautan Penting</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Accordion Content -->
<section class="linktree-area">
    <div class="container">
        <h2 class="section-label">Tautan Penting</h2>
        <p class="section-desc">Pilih salah satu lomba di bawah ini untuk melihat ketentuan dan formulir pendaftaran</p>

        <div class="acc-wrapper">

            <!-- Lomba Melukis Caping -->
            <div class="acc-item" id="acc-caping">
                <div class="acc-header" onclick="toggleAcc('acc-caping')">
                    <div class="acc-icon"><i class="fa fa-paint-brush"></i></div>
                    <div class="acc-title">
                        <strong>Lomba Melukis Caping</strong>
                        <span>Ketentuan & formulir pendaftaran</span>
                    </div>
                    <span class="acc-chevron fa fa-chevron-right"></span>
                </div>
                <div class="acc-body">
                    <h3 class="section-heading">Deskripsi</h3>
                    <div class="desc-box">
                        <p>Lomba Melukis Caping adalah kegiatan kreatif bagi siswa untuk mengekspresikan imajinasi dan nilai budaya melalui hiasan pada caping sebagai media seni tradisional yang edukatif.</p>
                    </div>

                    <h3 class="section-heading">Persyaratan Pendaftaran</h3>
                    <ul class="styled-list">
                        <li><strong>1.</strong> Peserta merupakan siswa aktif SD sederajat kelas <strong>4, 5, atau 6</strong>.</li>
                        <li><strong>2.</strong> Lomba bersifat <strong>individu</strong>.</li>
                        <li><strong>3.</strong> Peserta melukis atau menghias caping sesuai tema yang ditentukan oleh panitia.</li>
                        <li><strong>4.</strong> Seluruh perlengkapan utama disediakan oleh panitia.</li>
                        <li><strong>5.</strong> Peserta diperkenankan membawa perlengkapan tambahan jika dibutuhkan (sesuai ketentuan panitia).</li>
                        <li><strong>6.</strong> Karya harus orisinal dan dikerjakan langsung di lokasi lomba.</li>
                        <li><strong>7.</strong> Durasi pengerjaan akan ditentukan oleh panitia.</li>
                        <li><strong>8.</strong> Peserta wajib hadir tepat waktu sesuai jadwal yang telah ditentukan.</li>
                        <li><strong>9.</strong> Peserta wajib menjaga kebersihan dan ketertiban selama kegiatan berlangsung.</li>
                        <li><strong>10.</strong> Mengisi formulir pendaftaran dan mengumpulkan sesuai batas waktu yang ditentukan.</li>
                        <li><strong>11.</strong> Keputusan dewan juri bersifat mutlak dan tidak dapat diganggu gugat.</li>
                    </ul>

                    <div class="text-center">
                        <a href="https://forms.gle/P7oqHrgMFKpJQP2H9" target="_blank" class="btn-download">
                            <i class="fa fa-pencil"></i> Formulir Pendaftaran Lomba Melukis Caping
                        </a>
                    </div>
                </div>
            </div>

            <!-- Lomba Modern Ethnic Dance -->
            <div class="acc-item" id="acc-dance">
                <div class="acc-header" onclick="toggleAcc('acc-dance')">
                    <div class="acc-icon"><i class="fa fa-music"></i></div>
                    <div class="acc-title">
                        <strong>Lomba Modern Ethnic Dance</strong>
                        <span>Ketentuan & formulir pendaftaran</span>
                    </div>
                    <span class="acc-chevron fa fa-chevron-right"></span>
                </div>
                <div class="acc-body">
                    <h3 class="section-heading">Deskripsi</h3>
                    <div class="desc-box">
                        <p>Lomba Modern Ethnic Dance adalah kompetisi tari yang menggabungkan unsur gerak tradisional dengan gaya modern untuk menciptakan ekspresi baru yang kreatif dan relevan dengan generasi masa kini.</p>
                    </div>

                    <h3 class="section-heading">Persyaratan Pendaftaran</h3>
                    <ul class="styled-list">
                        <li><strong>1.</strong> Peserta merupakan siswa aktif tingkat SMA/SMK/MA atau sederajat di wilayah Nusa Tenggara Barat.</li>
                        <li><strong>2.</strong> Setiap sekolah mengirimkan maksimal 1 (satu) tim.</li>
                        <li><strong>3.</strong> Setiap tim terdiri dari <strong>4–10 orang</strong> beserta 1 orang pendamping.</li>
                        <li><strong>4.</strong> Peserta membawakan tari modern ethnic, yaitu perpaduan unsur gaya tari modern dan tradisional.</li>
                        <li><strong>5.</strong> Durasi penampilan <strong>5–7 menit</strong>.</li>
                        <li><strong>6.</strong> Peserta wajib menyerahkan sinopsis singkat tarian (maksimal 200 kata).</li>
                        <li><strong>7.</strong> Musik pengiring disiapkan oleh peserta dan diserahkan kepada panitia sebelum pelaksanaan.</li>
                        <li><strong>8.</strong> Kostum mencerminkan konsep tari, tetap sopan, dan mendukung tema yang dibawakan.</li>
                        <li><strong>9.</strong> Properti diperbolehkan selama tidak membahayakan peserta maupun penonton.</li>
                        <li><strong>10.</strong> Penampilan tidak mengandung unsur SARA, kekerasan, atau konten yang tidak sesuai norma.</li>
                        <li><strong>11.</strong> Mengisi formulir pendaftaran dan mengumpulkan sesuai batas waktu yang ditentukan.</li>
                        <li><strong>12.</strong> Pendaftaran akan ditutup apabila kuota telah terpenuhi.</li>
                        <li><strong>13.</strong> Keputusan dewan juri bersifat mutlak dan tidak dapat diganggu gugat.</li>
                    </ul>

                    <div class="text-center">
                        <a href="https://forms.gle/aF5jFLGhYMavibj4A" target="_blank" class="btn-download">
                            <i class="fa fa-pencil"></i> Formulir Pendaftaran Modern Ethnic Dance
                        </a>
                    </div>
                </div>
            </div>

            <!-- Lomba Museum Got Talent -->
            <div class="acc-item" id="acc-talent">
                <div class="acc-header" onclick="toggleAcc('acc-talent')">
                    <div class="acc-icon"><i class="fa fa-star"></i></div>
                    <div class="acc-title">
                        <strong>Lomba Museum Got Talent</strong>
                        <span>Ketentuan & formulir pendaftaran</span>
                    </div>
                    <span class="acc-chevron fa fa-chevron-right"></span>
                </div>
                <div class="acc-body">
                    <h3 class="section-heading">Deskripsi</h3>
                    <div class="desc-box">
                        <p>Lomba Museum Got Talent merupakan ajang pentas seni kelompok bagi siswa Sekolah Luar Biasa (SLB) untuk mengekspresikan kreativitas melalui tari, musik, atau teater dalam ruang edukatif museum.</p>
                    </div>

                    <h3 class="section-heading">Persyaratan Pendaftaran</h3>
                    <ul class="styled-list">
                        <li><strong>1.</strong> Peserta merupakan siswa aktif Sekolah Luar Biasa (SLB) di wilayah Nusa Tenggara Barat.</li>
                        <li><strong>2.</strong> Setiap sekolah mengirimkan 1 (satu) tim.</li>
                        <li><strong>3.</strong> Setiap tim terdiri dari maksimal 9 peserta beserta dengan 1 (satu) guru pendamping.</li>
                        <li>
                            <strong>4.</strong> Peserta menampilkan pertunjukan seni kelompok berupa:
                            <ul class="sub-list mt-2">
                                <li><strong>a)</strong> Tari (tradisional/kontemporer)</li>
                                <li><strong>b)</strong> Musik (band, vokal, paduan suara, musikalisasi puisi)</li>
                                <li><strong>c)</strong> Teater mini (drama pendek)</li>
                                <li><strong>d)</strong> dll.</li>
                            </ul>
                        </li>
                        <li><strong>5.</strong> Durasi penampilan <strong>5–10 menit</strong>.</li>
                        <li><strong>6.</strong> Penampilan disesuaikan dengan kemampuan peserta dan mengedepankan ekspresi, kreativitas, serta kerja sama tim.</li>
                        <li><strong>7.</strong> Penampilan tidak mengandung unsur kekerasan, diskriminasi, atau konten yang tidak sesuai dengan nilai edukatif.</li>
                        <li><strong>8.</strong> Peserta wajib didampingi oleh guru/pendamping selama kegiatan berlangsung.</li>
                        <li><strong>9.</strong> Perwakilan sekolah wajib mengikuti <strong>Technical Meeting</strong>.</li>
                        <li><strong>10.</strong> Mengisi formulir pendaftaran secara lengkap dan mengumpulkan sesuai batas waktu yang ditentukan.</li>
                        <li><strong>11.</strong> Kebutuhan khusus peserta (aksesibilitas, alat bantu, dll.) wajib diinformasikan kepada panitia sejak awal.</li>
                        <li><strong>12.</strong> Keputusan dewan juri bersifat mutlak dan tidak dapat diganggu gugat.</li>
                    </ul>

                    <div class="text-center">
                        <a href="https://forms.gle/EbhwfK71YCMJ8iEu9" target="_blank" class="btn-download">
                            <i class="fa fa-pencil"></i> Formulir Pendaftaran Museum Got Talent
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="ornament-divider">✦ ✦ ✦</div>
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
    function toggleAcc(id) {
        const item = document.getElementById(id);
        const isOpen = item.classList.contains('open');

        // Tutup semua accordion lain
        document.querySelectorAll('.acc-item').forEach(el => el.classList.remove('open'));

        // Toggle yang diklik
        if (!isOpen) item.classList.add('open');
    }

    function toggleCP() {
        document.getElementById('cpContent').classList.toggle('open');
    }
</script>

<?= $this->endSection(); ?>
