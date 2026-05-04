Berikut accordion dengan logika **Scroll + Checkbox** untuk setiap lomba:

```php
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

    body { background-color: var(--cream); }

    .linktree-area { padding: 60px 20px 80px; }

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

    .acc-item.open { border-color: var(--maroon); }

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
        left: 0; top: 0; bottom: 0;
        width: 4px;
        background: var(--maroon);
    }

    .acc-icon {
        width: 42px; height: 42px;
        border-radius: 50%;
        background: #fdf4ec;
        border: 1.5px solid var(--border);
        display: flex; align-items: center; justify-content: center;
        font-size: 1rem;
        color: var(--maroon);
        flex-shrink: 0;
        transition: all 0.25s;
    }

    .acc-item.open .acc-icon { background: var(--maroon); color: #fff; }

    .acc-title { flex: 1; }
    .acc-title strong {
        display: block;
        font-family: 'Playfair Display', serif;
        font-size: 1.05rem;
        color: var(--maroon);
        margin-bottom: 2px;
    }
    .acc-title span { font-size: 0.82rem; color: var(--ink-soft); opacity: 0.75; }

    .acc-chevron {
        font-size: 0.9rem;
        color: var(--gold);
        transition: transform 0.3s ease;
    }
    .acc-item.open .acc-chevron { transform: rotate(90deg); }

    .acc-body {
        display: none;
        padding: 0 24px 28px 24px;
        border-top: 1px dashed var(--border);
    }
    .acc-item.open .acc-body { display: block; }

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

    /* Scroll box untuk syarat */
    .syarat-scroll-box {
        max-height: 260px;
        overflow-y: auto;
        border: 1.5px solid var(--border);
        border-radius: 6px;
        padding: 4px 16px 4px 8px;
        background: #fff;
        position: relative;
        scroll-behavior: smooth;
    }

    .syarat-scroll-box::-webkit-scrollbar { width: 6px; }
    .syarat-scroll-box::-webkit-scrollbar-track { background: #f5f0eb; border-radius: 4px; }
    .syarat-scroll-box::-webkit-scrollbar-thumb { background: var(--maroon); border-radius: 4px; opacity: .6; }

    .scroll-hint {
        text-align: center;
        font-size: 0.8rem;
        color: var(--gold);
        margin-top: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        transition: opacity 0.4s;
    }
    .scroll-hint.hidden { opacity: 0; pointer-events: none; }

    .styled-list { list-style: none; padding: 0; margin: 0; }
    .styled-list > li {
        padding: 9px 0;
        border-bottom: 1px dashed var(--border);
        color: var(--ink-soft);
        line-height: 1.75;
        font-size: .95rem;
    }
    .styled-list > li:last-child { border-bottom: none; }
    .styled-list > li > strong { color: var(--maroon); margin-right: 6px; }

    .sub-list { list-style: none; padding: 0 0 0 24px; margin-top: 6px; }
    .sub-list li { padding: 4px 0; color: var(--ink-soft); font-size: .93rem; line-height: 1.7; }
    .sub-list li strong { color: var(--maroon-light); margin-right: 6px; }

    /* Checkbox area */
    .confirm-area {
        margin-top: 20px;
        padding: 14px 18px;
        background: #fff8f0;
        border: 1.5px dashed var(--gold);
        border-radius: 6px;
        display: flex;
        align-items: center;
        gap: 12px;
        opacity: 0.4;
        pointer-events: none;
        transition: opacity 0.4s;
    }
    .confirm-area.unlocked { opacity: 1; pointer-events: auto; }
    .confirm-area input[type="checkbox"] {
        width: 18px; height: 18px;
        accent-color: var(--maroon);
        cursor: pointer;
        flex-shrink: 0;
    }
    .confirm-area label {
        font-size: .9rem;
        color: var(--ink-soft);
        cursor: pointer;
        margin: 0;
    }

    /* Tombol daftar */
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
        margin-top: 16px;
        pointer-events: none;
        opacity: 0.4;
    }
    .btn-download.active {
        opacity: 1;
        pointer-events: auto;
    }
    .btn-download.active:hover {
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

    /* Float Contact */
    .cp-float { position: fixed; bottom: 32px; right: 28px; z-index: 999; }
    .cp-toggle {
        width: 52px; height: 52px;
        border-radius: 50%;
        background: var(--maroon); color: #fff;
        border: none; font-size: 1.2rem;
        box-shadow: 0 4px 16px rgba(133,0,0,.35);
        cursor: pointer; transition: transform .2s;
    }
    .cp-toggle:hover { transform: scale(1.08); }
    .cp-content {
        display: none;
        position: absolute; bottom: 62px; right: 0;
        background: var(--maroon); color: #fff;
        border-radius: 8px; padding: 20px 22px;
        min-width: 200px;
        box-shadow: 0 6px 24px rgba(133,0,0,.3);
        font-size: 14px;
    }
    .cp-content.open { display: block; }
    .cp-close { background: none; border: none; color: #fff; float: right; cursor: pointer; opacity: .7; }
    .cp-close:hover { opacity: 1; }
    .cp-content a { color: var(--gold-light); }

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
                <h1 class="text-white">Kategori Lomba</h1>
                <p class="text-white link-nav">
                    <a href="/home">Home</a>
                    <span class="fa fa-chevron-right"></span>
                    <a href="#">Kategori Lomba</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Accordion Content -->
<section class="linktree-area">
    <div class="container">
        <h2 class="section-label">Kategori Lomba</h2>
        <p class="section-desc">Klik salah satu kategori untuk melihat deskripsi, ketentuan, dan formulir pendaftaran</p>

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
                    <div class="syarat-scroll-box" id="scroll-caping" onscroll="onScroll('caping')">
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
                    </div>
                    <p class="scroll-hint" id="hint-caping"><i class="fa fa-arrow-down"></i> Scroll untuk membaca semua ketentuan</p>

                    <div class="confirm-area" id="confirm-caping">
                        <input type="checkbox" id="chk-caping" onchange="onCheck('caping')">
                        <label for="chk-caping">Saya telah membaca dan memahami seluruh ketentuan lomba ini</label>
                    </div>

                    <div class="text-center">
                        <a href="https://forms.gle/P7oqHrgMFKpJQP2H9" target="_blank" class="btn-download" id="btn-caping">
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
                    <div class="syarat-scroll-box" id="scroll-dance" onscroll="onScroll('dance')">
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
                    </div>
                    <p class="scroll-hint" id="hint-dance"><i class="fa fa-arrow-down"></i> Scroll untuk membaca semua ketentuan</p>

                    <div class="confirm-area" id="confirm-dance">
                        <input type="checkbox" id="chk-dance" onchange="onCheck('dance')">
                        <label for="chk-dance">Saya telah membaca dan memahami seluruh ketentuan lomba ini</label>
                    </div>

                    <div class="text-center">
                        <a href="https://forms.gle/aF5jFLGhYMavibj4A" target="_blank" class="btn-download" id="btn-dance">
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
                    <div class="syarat-scroll-box" id="scroll-talent" onscroll="onScroll('talent')">
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
                    </div>
                    <p class="scroll-hint" id="hint-talent"><i class="fa fa-arrow-down"></i> Scroll untuk membaca semua ketentuan</p>

                    <div class="confirm-area" id="confirm-talent">
                        <input type="checkbox" id="chk-talent" onchange="onCheck('talent')">
                        <label for="chk-talent">Saya telah membaca dan memahami seluruh ketentuan lomba ini</label>
                    </div>

                    <div class="text-center">
                        <a href="https://forms.gle/EbhwfK71YCMJ8iEu9" target="_blank" class="btn-download" id="btn-talent">
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
    // State scroll per lomba
    const scrolled = { caping: false, dance: false, talent: false };

    function onScroll(key) {
        if (scrolled[key]) return;
        const box = document.getElementById('scroll-' + key);
        const threshold = box.scrollHeight - box.clientHeight - 10;
        if (box.scrollTop >= threshold) {
            scrolled[key] = true;
            document.getElementById('hint-' + key).classList.add('hidden');
            document.getElementById('confirm-' + key).classList.add('unlocked');
        }
    }

    function onCheck(key) {
        const checked = document.getElementById('chk-' + key).checked;
        const btn = document.getElementById('btn-' + key);
        if (checked) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }
    }

    function toggleAcc(id) {
        const item = document.getElementById(id);
        const isOpen = item.classList.contains('open');
        document.querySelectorAll('.acc-item').forEach(el => el.classList.remove('open'));
        if (!isOpen) item.classList.add('open');
    }

    function toggleCP() {
        document.getElementById('cpContent').classList.toggle('open');
    }
</script>

<?= $this->endSection(); ?>
```

Alur yang terjadi sekarang:
1. **Accordion dibuka** → syarat muncul dalam scroll box dengan hint panah bawah
2. **User scroll sampai bawah** → hint hilang, checkbox muncul dan bisa diklik
3. **User centang checkbox** → tombol formulir aktif dan bisa diklik
4. **Reset otomatis** — jika accordion ditutup lalu dibuka lagi, state scroll & checkbox tetap tersimpan selama sesi berlangsung (tidak reset), supaya tidak memaksa user baca ulang jika tidak sengaja menutup
