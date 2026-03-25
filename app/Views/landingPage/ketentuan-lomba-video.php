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

    /* ── Content Area ── */
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

    .content-text {
        color: var(--ink-soft);
        line-height: 1.85;
        font-size: 1rem;
        text-align: justify;
    }

    /* ── Highlight Box (Tema) ── */
    .theme-box {
        background: linear-gradient(135deg, var(--maroon-dark), var(--maroon));
        color: #fff;
        border-radius: 8px;
        padding: 28px 32px;
        margin: 12px 0 24px;
        position: relative;
        overflow: hidden;
    }

    .theme-box::before {
        content: '"';
        position: absolute;
        top: -10px;
        left: 16px;
        font-size: 8rem;
        font-family: 'Playfair Display', serif;
        color: rgba(201, 168, 76, 0.18);
        line-height: 1;
    }

    .theme-box h4 {
        font-family: 'Playfair Display', serif;
        font-size: 1.25rem;
        color: var(--gold-light);
        margin-bottom: 10px;
    }

    .theme-box p {
        font-size: 0.97rem;
        opacity: 0.93;
        line-height: 1.75;
    }

    /* ── Ordered List Styled ── */
    .styled-list {
        list-style: none;
        padding: 0;
    }

    .styled-list>li {
        padding: 10px 0 10px 0;
        border-bottom: 1px dashed var(--border);
        color: var(--ink-soft);
        line-height: 1.75;
        font-size: 0.98rem;
    }

    .styled-list>li:last-child {
        border-bottom: none;
    }

    .styled-list>li>strong {
        color: var(--maroon);
        margin-right: 6px;
    }

    .sub-list {
        list-style: none;
        padding: 0 0 0 28px;
        margin-top: 8px;
    }

    .sub-list li {
        padding: 5px 0;
        color: var(--ink-soft);
        font-size: 0.96rem;
        line-height: 1.7;
        border-bottom: none;
    }

    .sub-list li strong {
        color: var(--maroon-light);
        margin-right: 6px;
    }

    /* ── Table ── */
    .table-wrapper {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(133, 0, 0, 0.08);
        margin: 12px 0 20px;
    }

    .table-wrapper table {
        margin: 0;
        font-size: 0.95rem;
    }

    .table-wrapper thead th {
        background: var(--maroon);
        color: #fff;
        font-family: 'Playfair Display', serif;
        font-size: 0.95rem;
        padding: 14px 16px;
        border: none;
    }

    .table-wrapper tbody tr:nth-child(even) {
        background: #fdf4ec;
    }

    .table-wrapper tbody td {
        padding: 12px 16px;
        color: var(--ink-soft);
        border-color: var(--border);
        vertical-align: middle;
    }

    /* ── Prize Table ── */
    .prize-table .gold-row td {
        background: #fffae8;
        font-weight: 600;
    }

    .prize-table .silver-row td {
        background: #f7f7f7;
    }

    .prize-table .bronze-row td {
        background: #fdf4ec;
    }

    .prize-table tbody td:last-child {
        font-weight: 600;
        color: var(--maroon);
    }

    /* ── Download Button ── */
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
        transition: all 0.25s;
        margin-top: 24px;
    }

    .btn-download:hover {
        background: transparent;
        color: var(--maroon);
        text-decoration: none;
    }

    .btn-download .fa {
        font-size: 1rem;
    }

    /* ── Divider ── */
    .ornament-divider {
        text-align: center;
        color: var(--gold);
        font-size: 1.2rem;
        letter-spacing: 12px;
        margin: 40px 0 0;
        opacity: 0.6;
    }

    /* ── Float Contact ── */
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
        box-shadow: 0 4px 16px rgba(133, 0, 0, 0.35);
        cursor: pointer;
        transition: transform 0.2s;
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
        box-shadow: 0 6px 24px rgba(133, 0, 0, 0.3);
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
        opacity: 0.7;
    }

    .cp-close:hover {
        opacity: 1;
    }

    .cp-content a {
        color: var(--gold-light);
    }
</style>

<!-- start banner Area -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Lomba Video Dokumenter
                </h1>
                <p class="text-white link-nav"><a href="/home">Home </a> <span class="fa fa-chevron-right"></span> <a href="/lomba-video-dokumenter">Lomba Video Dokumenter</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- ── Content ── -->
<section class="post-content-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <!-- 1. Ketentuan Karya -->
                <h3 class="section-heading">Ketentuan Karya</h3>
                <ul class="styled-list">
                    <li><strong>1.</strong> Karya video merupakan karya asli (original) dan belum pernah diikutsertakan dalam lomba lain.</li>
                    <li>
                        <strong>2.</strong> Karya berupa video dokumenter yang mengangkat tema:
                        <div class="theme-box mt-3">
                            <h4>"Kotaku Museumku – Kampungku Museumku"</h4>
                            <p>Dengan menampilkan cerita, budaya, atau kehidupan masyarakat di wilayah Nusa Tenggara Barat (NTB).</p>
                        </div>
                    </li>
                    <li><strong>3.</strong> Karya yang dinilai merupakan 50 (lima puluh) karya pertama yang dikirimkan sesuai dengan ketentuan dan batas waktu yang ditetapkan panitia.</li>
                    <li><strong>4.</strong> Durasi video <strong>3–5 menit</strong>.</li>
                    <li><strong>5.</strong> Setiap karya wajib dilengkapi dengan <strong>poster karya</strong>.</li>
                    <li><strong>6.</strong> Peserta wajib menyertakan <strong>sinopsis video</strong> maksimal 150 kata.</li>
                    <li><strong>7.</strong> Video tidak boleh mengandung unsur SARA, kekerasan, pornografi, atau konten yang melanggar hukum.</li>
                    <li><strong>8.</strong> Peserta diperbolehkan menggunakan footage referensi atau arsip sejarah dengan mencantumkan sumber, dengan ketentuan <strong>maksimal 20%</strong> dari keseluruhan durasi video. Selebihnya harus berupa footage orisinal yang diproduksi oleh peserta.</li>
                    <li><strong>9.</strong> Seluruh footage yang digunakan dalam karya <strong>tidak diperbolehkan</strong> berasal dari atau dihasilkan menggunakan teknologi Artificial Intelligence (AI).</li>
                    <li><strong>10.</strong> Peserta yang lolos 10 besar diwajibkan membuat <strong>trailer video berdurasi 30 detik</strong>. Informasi lebih lanjut akan disampaikan melalui email resmi panitia.</li>
                    <li><strong>11.</strong> Sepuluh karya terpilih akan ditayangkan dalam <strong>sesi screening publik</strong>. Dari sesi ini akan dipilih Pemenang Favorit berdasarkan apresiasi penonton.</li>
                    <li><strong>12.</strong> Peserta wajib mengikuti seluruh akun media sosial Museum Negeri NTB.</li>
                    <li><strong>13.</strong> Keputusan dewan juri bersifat mutlak dan tidak dapat diganggu gugat.</li>
                </ul>

                <div class="ornament-divider">✦ ✦ ✦</div>

                <!-- 2. Teknis Pengumpulan -->
                <h3 class="section-heading">Teknis Pengumpulan Karya</h3>
                <ul class="styled-list">
                    <li><strong>1.</strong> Peserta melakukan pendaftaran dengan mengisi formulir pendaftaran melalui tautan yang disediakan.</li>
                    <li><strong>2.</strong> Setelah mengisi formulir, peserta akan menerima <strong>email konfirmasi</strong> bahwa pendaftaran telah berhasil dilakukan.</li>
                    <li><strong>3.</strong> Peserta yang telah terdaftar akan menerima email lanjutan berisi <strong>tautan Google Drive</strong> untuk mengunggah karya pada periode pengunggahan sesuai jadwal yang telah ditentukan oleh panitia.</li>
                    <li><strong>4.</strong> Peserta mengunggah karya video dengan format <strong>MP4 atau MOV</strong> melalui folder Google Drive yang disediakan oleh panitia.</li>
                    <li>
                        <strong>5.</strong> Setiap peserta wajib mengunggah:
                        <ul class="sub-list mt-2">
                            <li><strong>a)</strong> File video karya</li>
                            <li><strong>b)</strong> Poster karya</li>
                            <li><strong>c)</strong> Sinopsis video (maksimal 150 kata)</li>
                        </ul>
                    </li>
                </ul>

                <div class="ornament-divider">✦ ✦ ✦</div>

                <!-- 3. Hak Cipta -->
                <h3 class="section-heading">Hak Cipta dan Pembatasan Penggunaan Karya</h3>
                <ul class="styled-list">
                    <li><strong>1.</strong> Seluruh hak cipta karya video yang dikirimkan menjadi milik <strong>penyelenggara/museum</strong> setelah karya dinyatakan sebagai peserta lomba.</li>
                    <li>
                        <strong>2.</strong> Dengan mengikuti lomba ini, peserta menyetujui bahwa seluruh materi visual (shot, footage, audio, dan elemen lain) yang digunakan dalam video <strong>tidak boleh digunakan kembali</strong> oleh peserta untuk:
                        <ul class="sub-list mt-2">
                            <li><strong>a)</strong> Perlombaan lain</li>
                            <li><strong>b)</strong> Produksi video lain</li>
                            <li><strong>c)</strong> Publikasi komersial maupun non-komersial di luar kepentingan museum/penyelenggara</li>
                        </ul>
                    </li>
                    <li>
                        <strong>3.</strong> Museum NTB memiliki hak penuh untuk:
                        <ul class="sub-list mt-2">
                            <li><strong>a)</strong> Mengarsipkan karya</li>
                            <li><strong>b)</strong> Menayangkan ulang</li>
                            <li><strong>c)</strong> Mengadaptasi dan memanfaatkan karya untuk kepentingan edukasi, promosi, pameran, dan publikasi museum</li>
                        </ul>
                    </li>
                    <li><strong>4.</strong> Peserta bertanggung jawab penuh atas keaslian karya serta perizinan objek, lokasi, dan narasumber yang terekam dalam video.</li>
                </ul>

                <div class="ornament-divider">✦ ✦ ✦</div>

                <!-- Formulir -->
                <div class="text-center mt-5 mb-2">
                    <a href="https://forms.gle/GGmeznxCH9UR3J4t6" target="_blank" class="btn-download">
                        <i class="fa fa-download"></i> Formulir Pendaftaran
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- ── Float Contact ── -->
<div class="cp-float" id="cpFloat">
    <button class="cp-toggle" id="cpToggle" onclick="toggleCP()">
        <i class="fa fa-phone"></i>
    </button>
    <div class="cp-content" id="cpContent">
        <button class="cp-close" onclick="toggleCP()">
            <i class="fa fa-times"></i>
        </button>
        <h6 style="margin-bottom: 10px; font-weight: bold;">Hubungi Kami</h6>
        <p style="margin: 5px 0; font-size: 14px;">
            <i class="fa fa-user"></i> Lala
        </p>
        <p style="margin: 5px 0; font-size: 14px;">
            <i class="fa fa-phone"></i>
            <a href="https://wa.me/622145090530">0821-4509-0530</a>
        </p>
    </div>
</div>

<script>
    function toggleCP() {
        const el = document.getElementById('cpContent');
        el.classList.toggle('open');
    }
</script>

<?= $this->endSection(); ?>