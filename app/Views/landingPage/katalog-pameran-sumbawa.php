<?= $this->extend('landingPage/template baru'); ?>

<?= $this->section('content'); ?>

<!-- start banner Area -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Katalog Pameran Wastra Kre Alang (Jejak tenun identitas Sumbawa)
                </h1>
                <p class="text-white link-nav"><a href="/home">Home </a> <span class="fa fa-chevron-right"></span> <a href="/heritage-walk/si-biru"> Katalog Pameran Sumbawa</a></p>
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
    }
</style>

<!-- Start post-content Area -->
<section class="post-content-area single-post-area">
    <div class="container">
        <!-- KELOMPOK 1: KERE ALANG (11 items) -->

        <!-- Section 1: Kere Alang -->
        <div class="content-section">
            <div class="image-side">
                <img src="<?= base_url('img/3627.jpg'); ?>" alt="Dummy Image 1">
            </div>
            <div class="text-side">
                <span class="section-badge">Kere Alang</span>
                <h3 class="section-title">Motif Lonto Engal, Cepa, dan Pusuk Rebong</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1984/1985, <strong>No.3627</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1850 – 1964
                </p>
                <p class="section-desc">
                    Kain terbuat dari benang katun dan benang perak (tahan uji) dengan teknik songket dan sulam. Kain dihias dengan motif lonto engal, cepa, dan pusuk rebong. Kain ini dipakai oleh kalangan bangsawan Sumbawa pada saat upacara adat.
                </p>
                <div class="highlight" style="background-color: #850000; padding: 10px; border-radius: 5px;">
                    <small style="color: white;">Koleksi ini pernah di pamerkan pada Pameran Temporer di Mataram tahun 2022 dan Pameran Bersama <strong>Cross Musea</strong> di Surabaya tahun 2024</small>
                </div>
            </div>
        </div>

        <!-- Section 2: Kere Alang -->
        <div class="content-section reverse">
            <div class="image-side">
                <img src="<?= base_url('img/5587.jpg'); ?>" alt="5587">
            </div>
            <div class="text-side">
                <span class="section-badge">Kere Alang</span>
                <h3 class="section-title">Motif Cepa, Selimpat, Manusia, Kapal, Lasuji, Piyo, dan Lonto Engal</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1992/1993, <strong>No.5587</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1850 – 1964
                </p>
                <p class="section-desc">
                    Kain terbuat dari benang katun dan benang perak (tahan uji) dengan teknik songket. Kain dihias dengan motif cepa, selimpat, manusia, kapal, lasuji, piyo, dan lonto engal. Kain ini dipakai oleh kalangan bangsawan Sumbawa pada saat upacara adat.
                </p>
            </div>
        </div>

        <!-- Section 3: Kere Alang -->
        <div class="content-section">
            <div class="image-side">
                <img src="<?= base_url('img/5776.jpg'); ?>" alt="Dummy Image 1">
            </div>
            <div class="text-side">
                <span class="section-badge">Kere Alang</span>
                <h3 class="section-title">Motif Kemang Setange, Lonto Engal, Pusuk Rebong, Ayam, Cepa, Naga, dan Kepiting</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1993/1994, <strong>No.5776</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1850 – 1964
                </p>
                <p class="section-desc">
                    Kain terbuat dari benang katun dan benang perak dengan teknik songket. Kain dihias dengan kemang setange, lonto engal, pusuk rebong, ayam, cepa, naga, dan kepiting. Kain ini dipakai oleh kalangan bangsawan Sumbawa pada saat upacara adat.
                </p>
                <div class="highlight" style="background-color: #850000; padding: 10px; border-radius: 5px;">
                    <small style="color: white;">Koleksi ini pernah di pamerkan pada Pameran Temporer di Mataram tahun 2022</small>
                </div>
            </div>
        </div>

        <!-- Section 4: Kere Alang 'Meraja Sangaji' -->
        <div class="content-section reverse">
            <div class="image-side">
                <img src="<?= base_url('img/1025.jpg'); ?>" alt="1025">
            </div>
            <div class="text-side">
                <span class="section-badge">Kere Alang 'Meraja Sangaji'</span>
                <h3 class="section-title">Motif Burung Garuda Berkepala Dua dan Lipan Api</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1977/1978, <strong>No.1025</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1790
                </p>
                <p class="section-desc">
                    Kain ini melambangkan dua kesultanan di NTB yang disimbolkan dengan gambar garuda berkepala dua (lambang Kesultanan Bima) dan lipan api (lambang Kesultanan Sumbawa). Kain terbuat dari benang katun dan benang perak (tahan uji) dengan teknik songket dan sulam. Kain dihias dengan motif burung garuda berkepala dua, lipan api, lonto engal, padu telu, kemang setange (bunga setangkai), pusuk dopa, dan nggusuwaru. Kain ini digunakan pada saat penikahan agung antara Sultan Bima Abdul Hamid Ruma Mantau Asi Saninu dengan Sultanah Sumbawa Syafiatuddin pada tahun 1790. Pada Tahun 1790 berlangsung pernikahan Agung antara Sultan Bima Abdul Hamid Muhammadsyah dengan Daeng Massiki Binti Dewa Masmawa Sultan Harit Al Rasyid II Sultan Sumbawa.
                    Pernikahan Agung ini menjadi Catatan tersendiri bagi Tau Tana Samawa, karena tak lama setelah Pernikahan berlangsung. Sultan Harun Al Rasyid II Mangkat. Tahta Kesultanan Sumbawa jatuh kepada Putri tertuanya Yakni Daeng Massiki Ruma Pa'duka Sultan Bima. Dalam Penobatannya di Tahun 1791 Daeng Massiki menyandang gelar Dewa Masmawa Sultanah Shafiatuddin.
                    Peristiwa Sejarah besar Pernikahan dan Penobatan ini diabadikan dalam Tenun Songket Khas Sumbawa KERE ALANG yg kemudian diberi nama MARAJA SANGAJI sbg penggambaran sejarah Dua Sultan yg memerintah di dua Kesultanan yakni Sumbawa dan Bima.
                    Sebagai Dokumentasi peristiwa bersejarah. Ragam hias atau motif dari kere alang maraja sangaji, yakni Lambang dari dua Kesultanan.
                    Lipan Api atau naga yg diambil dari Panji Sultan Sumbawa dan Garuda berkepala Dua dari Panji Kesultanan Bima berpadu dalam songketan ragam hias Kere Alang Maraja Sangaji.
                    Selain pasa kere Alang. Kedua lambang Kesultanan, dituang juga dlm beberapa piranti Adat baik berupa Cipo Cila maupun ukuran Regalia Toksl Adat Ode PAKEBAS
                </p>
                <div class="highlight" style="background-color: #850000; padding: 10px; border-radius: 5px;">
                    <small style="color: white;">Kain ini pernah dipamerkan pada Pameran Temporer tahun 2023 dan Pameran 'Khasanah Ramadhan' di Islamic Center Mataram</small>
                </div>
            </div>
        </div>

        <!-- Section 6: Kere Alang -->
        <div class="content-section reverse">
            <div class="image-side">
                <img src="<?= base_url('img/5712.jpg'); ?>" alt="5712">
            </div>
            <div class="text-side">
                <span class="section-badge">Kere Alang</span>
                <h3 class="section-title">Motif Pusuk Rebong, Piyo, Rusa, Cepa, dan Hujan Emas</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1993/1994, <strong>No.5712</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1850 – 1964
                </p>
                <p class="section-desc">
                    Kain terbuat dari benang katun dan benag perak dengan teknik songket. Kain dihias dengan motif pusuk rebong, piyo, rusa, cepa, dan hujan emas. Kain ini dipakai oleh kalangan bangsawan Sumbawa pada saat upacara adat.
                </p>
                <div class="highlight" style="background-color: #850000; padding: 10px; border-radius: 5px;">
                    <small style="color: white;">Koleksi ini pernah di pamerkan pada Pameran Temporer di Mataram tahun 2022 </small>
                </div>
            </div>
        </div>

        <!-- Section 7: Kere Alang -->
        <div class="content-section">
            <div class="image-side">
                <img src="<?= base_url('img/1046.jpg'); ?>" alt="1046">
            </div>
            <div class="text-side">
                <span class="section-badge">Kere Alang</span>
                <h3 class="section-title">Motif Cepa, Selimpat, Lonto Engal, Piyo, Pohon Hayat, dan Kemang Setange</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1993/1994, <strong>No.1046</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1977 – 1978
                </p>
                <p class="section-desc">
                    Kain terbuat dari benang katun dan benang emas dengan teknik songket. Kain dihias dengan motif cepa, selimpat, lonto engal, piyo, pohon hayat, dan kemang setange. Kain ini dipakai oleh kalangan bangsawan Sumbawa pada saat upacara adat.
                </p>
            </div>
        </div>

        <!-- Section 8: Kere Alang -->
        <div class="content-section reverse">
            <div class="image-side">
                <img src="<?= base_url('img/S.01.jpg'); ?>" alt="S.01">
            </div>
            <div class="text-side">
                <span class="section-badge">Kere Alang</span>
                <h3 class="section-title">Motif Pusuk Rebong, Orang Berperahu, Cepa, Lonto Engal, Kemang Setange, dan Lasuji</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1993/1994, <strong>No.S.01</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1850 – 1964
                </p>
                <p class="section-desc">
                    Kain terbuat dari benang katun dan benang emas dengan teknik songket. Kain dihias dengan motif pusuk rebong, orang berperahu, cepa, lonto engal, kemang setange, dan lasuji. Kain ini dipakai oleh keluarga Kesultanan Sumbawa pada saat upacara adat.
                </p>
                <div class="highlight" style="background-color: #850000; padding: 10px; border-radius: 5px;">
                    <small style="color: white;">Koleksi ini pernah dipamerkan pada Pameran Internasional Islamic Arts Beinnale di Jedah-Saudi Arabia tahun 2025 </small>
                </div>
            </div>
        </div>

        <div class="content-section">
            <div class="image-side">
                <img src="<?= base_url('img/5057.jpg'); ?>" alt="5057">
            </div>
            <div class="text-side">
                <span class="section-badge">Kerudung</span>
                <h3 class="section-title">Motif Kemang Setange, Cepa, dan Geometris</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1990/1991, <strong>No.5057</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1900-an
                </p>
                <p class="section-desc">
                    Kain terbuat dari benang katun dan benang perak (jit tahan uji) dengan teknik songket. Kain dihias dengan motif kemang setange, wajik, dan lonto engal. Kain ini dipakai sebagai kerudung atau penutup kepala oleh kaum perempuan masyarakat etnis Samawa.
                </p>
            </div>
        </div>

        <!-- KELOMPOK 2: KAIN SARUNG SUMBAWA -->

        <!-- Section 9: Kain Sarung Sumbawa -->
        <div class="content-section reverse">
            <div class="image-side">
                <img src="<?= base_url('img/1014.jpg'); ?>" alt="1014">
            </div>
            <div class="text-side">
                <span class="section-badge">Kain Sarung Sumbawa</span>
                <h3 class="section-title">Motif Lonto Cepa, Hujan Emas, dan Lonto Engal</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1977/1978, <strong>No.1014</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1850 – 1964
                </p>
                <p class="section-desc">
                    Kain terbuat dari benang katun dan benang perak (tahan uji) dengan teknik songket dan sulam. Kain dihias dengan motif cepa, hujan emas, dan lontono engal yang mengandung makna kebersamaan dan kegotong-royongan. Kain ini dipakai oleh kalangan bangsawan Sumbawa pada saat upacara adat.
                </p>
                <div class="highlight" style="background-color: #850000; padding: 10px; border-radius: 5px;">
                    <small style="color: white;">Koleksi ini pernah di pamerkan pada pameran temporer di Mataram tahun 2022 dan pameran bersama <strong>Cross Musea</strong> di Surabaya tahun 2024</small>
                </div>
            </div>
        </div>

        <!-- KELOMPOK 3: SAPU' ALANG -->

        <!-- Section 10: Sapu' Alang -->
        <div class="content-section">
            <div class="image-side">
                <img src="<?= base_url('img/1043.jpg'); ?>" alt="1043">
            </div>
            <div class="text-side">
                <span class="section-badge">Sapu' Alang</span>
                <h3 class="section-title">Motif Lonto Engal</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1977/1978, <strong>No.1043</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1900-an
                </p>
                <p class="section-desc">
                    Kain terbuat dari benang katun dan benang perak dengan Teknik songket. Kain dihias dengan motif lonto engal. Kain ini di pakai sebagai ikat kepala oleh kaum laki-laki masyarakat etnis Samawa.
                </p>
            </div>
        </div>

        <!-- KELOMPOK 4: CIPO CILA -->

        <!-- Section 11: Cipo Cila -->
        <div class="content-section reverse">
            <div class="image-side">
                <img src="<?= base_url('img/1158.jpg'); ?>" alt="1158">
            </div>
            <div class="text-side">
                <span class="section-badge">Cipo Cila</span>
                <h3 class="section-title">Motif Kemang Setange, Burung, dan Cepa</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1978/1979, <strong>No.1158</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1900-an
                </p>
                <p class="section-desc">
                    Kain terbuat dari benang katun dan benang perak (jit tahan uji) dengan teknik sulam. Kain dihias dengan motif kemang setange, burung, dan cepa. Kain ini dipakai sebagai kerudung oleh kaum perempuan masyarakat etnis Samawa.
                </p>
            </div>
        </div>

        <!-- KELOMPOK 5: KERE BARAK -->

        <!-- Section 12: Kere Barak -->
        <div class="content-section">
            <div class="image-side">
                <img src="<?= base_url('img/5982.jpg'); ?>" alt="5982">
            </div>
            <div class="text-side">
                <span class="section-badge">Kere Barak</span>
                <h3 class="section-title">Motif Kotak-Kotak</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1994/1995, <strong>No.5982</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1850 – 1950
                </p>
                <p class="section-desc">
                    Kain terbuat dari benang kapas dengan motif kotak-kotak. Kain ini dipakai sebagai kelengakapan pakaian sehari-hari masyarakat etnis Samawa.
                </p>
            </div>
        </div>

        <!-- Section 13: Kere Barak -->
        <div class="content-section reverse">
            <div class="image-side">
                <img src="<?= base_url('img/6626.jpg'); ?>" alt="6626">
            </div>
            <div class="text-side">
                <span class="section-badge">Kere Barak</span>
                <h3 class="section-title">Kere Barak</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1997/1998, <strong>No.6626</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1850 – 1950
                </p>
                <p class="section-desc">
                    Kain terbuat dari benang kapas tanpa motif (polos). Kain ini dipakai sebagai kelengakapan pakaian sehari-hari masyarakat etnis Samawa.
                </p>
            </div>
        </div>

        <!-- KELOMPOK 6: LAMUNG DAPANG -->

        <!-- Section 14: Lamung Dapang -->
        <div class="content-section">
            <div class="image-side">
                <img src="<?= base_url('img/3269.b.jpg'); ?>" alt="3269">
            </div>
            <div class="text-side">
                <span class="section-badge">Lamung Dapang</span>
                <h3 class="section-title">Motif Cepa</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1983/1984, <strong>No.3269.b</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1850 – 1964
                </p>
                <p class="section-desc">
                    Lamung Dapang terbuat dari benang katun dan benang perak (jit tahan uji) dengan teknik sulam. Lamung Dapang dipakai sebagai baju pengantin perempuan bangsawan dari etnis Samawa.
                </p>
            </div>
        </div>

        <!-- KELOMPOK 7: KERIS SUMBAWA -->

        <!-- Section 15: Keris Sumbawa -->
        <div class="content-section reverse">
            <div class="image-side">
                <img src="<?= base_url('img/753.jpg'); ?>" alt="753">
            </div>
            <div class="text-side">
                <span class="section-badge">Keris Sumbawa</span>
                <h3 class="section-title"> Luk Tujuh dan Pamor Ujung Gunung Kulit Semangka</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1977/1978, <strong>No.753</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1850 – 1950
                </p>
                <p class="section-desc">
                    Sebilah keris Sumbawa, luk tujuh, dapur sempana dengan pamor ujung gunung kulit semangka, hulu patah tiga dari bahan gading. Keris digunakan sebagai alat upacara, senjata, dan simbol status sosial.
                </p>
            </div>
        </div>

        <!-- Section 16: Keris Sumbawa -->
        <div class="content-section">
            <div class="image-side">
                <img src="<?= base_url('img/1878.jpg'); ?>" alt="1878">
            </div>
            <div class="text-side">
                <span class="section-badge">Keris Sumbawa</span>
                <h3 class="section-title">Luk Sembilan dan Pamor Ujung Gunung Sura</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1980/1981, <strong>No.1878</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1850 – 1950
                </p>
                <p class="section-desc">
                    Sebilah keris Sumbawa, luk sembilan, dapur sempana dengan pamor ujung gunung sura, hulu patah tiga dari bahan kayu birak ketemuk. Keris digunakan sebagai alat upacara, senjata, dan simbol status sosial.
                </p>
            </div>
        </div>

        <!-- Section 17: Keris Sumbawa -->
        <div class="content-section reverse">
            <div class="image-side">
                <img src="<?= base_url('img/3165.jpg'); ?>" alt="3165">
            </div>
            <div class="text-side">
                <span class="section-badge">Keris Sumbawa</span>
                <h3 class="section-title">Luk Lima dan Pamor Ujung Gunung Kulit Semangka</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1982/1983, <strong>No.3165</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1850 – 1950
                </p>
                <p class="section-desc">
                    Sebilah keris Sumbawa, luk lima, dapur sempana dengan pamor ujung gunung kulit semangka, hulu patah tiga dari bahan gading dengan selut dari perak. Keris digunakan sebagai alat upacara, senjata, dan simbol status sosial.
                </p>
            </div>
        </div>

        <!-- KELOMPOK 8: REPLIKA PAKEBAS (KIPAS EMAS) -->

        <!-- Section 18: Replika Pakebas -->
        <div class="content-section">
            <div class="image-side">
                <img src="<?= base_url('img/7715.jpg'); ?>" alt="7715">
            </div>
            <div class="text-side">
                <span class="section-badge">Replika Pakebas (Kipas Emas)</span>
                <h3 class="section-title">Motif Pusuk Rebong,Lonto Engal, dan Geometris</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 2024, <strong>No.7715</strong></div>
                <p class="section-desc">
                    <strong>Hibah dari Kesultanan Sumbawa tahun 2024</strong>
                </p>
                <p class="section-desc">
                    Kipas ini merupakan replika dari kipas milik Kesultanan Sumbawa. Kipas dihias dengan motif pusuk rebong, lonto engal, dan geometris. Selain digunakan sebagai kipas, juga sebagai alat untuk menyodorkan sesuatu kepada sultan
                </p>
                <div class="highlight" style="background-color: #850000; padding: 10px; border-radius: 5px;">
                    <small style="color: white;">Koleksi ini dipamerkan pada Pameran Tetap Museum Negeri NTB</small>
                </div>
            </div>
        </div>

        <!-- Section 19: Replika Pakebas -->
        <div class="content-section reverse">
            <div class="image-side">
                <img src="<?= base_url('img/6744.jpg'); ?>" alt="6744">
            </div>
            <div class="text-side">
                <span class="section-badge">Replika Pakebas (Kipas Emas)</span>
                <h3 class="section-title">Motif Pusuk Rebong, Lonto Engal, dan Geometris</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1997/1998, <strong>No.6744</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Dibuat di Bali tahun 1998
                </p>
                <p class="section-desc">
                    Kipas ini merupakan replika dari kipas milik Kesultanan Sumbawa. Kipas dihias dengan motif pusuk rebong, lonto engal, dan geometris. Selain digunakan sebagai kipas, juga sebagai alat untuk menyodorkan sesuatu kepada sultan.
                </p>
                <div class="highlight" style="background-color: #850000; padding: 10px; border-radius: 5px;">
                    <small style="color: white;">Koleksi ini dipamerkan pada Ruang Khasanah Pameran Tetap Museum Negeri NTB</small>
                </div>
            </div>
        </div>

        <!-- Section 20 replika salepa -->
        <div class="content-section">
            <div class="image-side">
                <img src="<?= base_url('img/7716.jpg'); ?>" alt="7716">
            </div>
            <div class="text-side">
                <span class="section-badge">Replika Salepa</span>
                <h3 class="section-title">Motif Lonto Engal Dan Geometris</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 2024, <strong>No.7716</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> dari Kesultanan Sumbawa tahun 2024
                </p>
                <p class="section-desc">
                    Salepa ini merupakan replika dari salepa milik Kesultanan Sumbawa. Salepa dihias dengan motif lonto engal dan geometris. Salepa digunakan sebagai wadah rokok Sultan Sumbawa.
                </p>
            </div>
        </div>

        <!-- section 21 -->
        <div class="content-section reverse">
            <div class="image-side">
                <img src="<?= base_url('img/5778.jpg'); ?>" alt="5778">
            </div>
            <div class="text-side">
                <span class="section-badge">Tempat Perhiasan</span>
                <h3 class="section-title">Motif Lonto Engal dan Geometris</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1993/1994, <strong>No.5778</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1900-an
                </p>
                <p class="section-desc">
                    Tempat perhiasan terbuat dari bahan perak dengan motif lonto engal dan geometris. Digunakan sebagai tempat perhiasan bangsawan etnis Samawa.
                </p>
            </div>
        </div>

        <!-- section 22 -->
        <div class="content-section">
            <div class="image-side">
                <img src="<?= base_url('img/7008.jpg'); ?>" alt="7008">
            </div>
            <div class="text-side">
                <span class="section-badge">Gelang Tangan</span>
                <h3 class="section-title">Bentuk Ular yang Melingkar</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1999/2000, <strong>No.7008</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1900-an
                </p>
                <p class="section-desc">
                    Sebuah gelang terbuat dari logam berbentuk ular yang melingkar. Digunakan sebagai hiasan tangan (gelang tangan) bangsawan etnis Samawa.
                </p>
            </div>
        </div>

        <!-- Section 23 -->
        <div class="content-section reverse">
            <div class="image-side">
                <img src="<?= base_url('img/3269.e1,e2.jpg'); ?>" alt="3269. e1,e2">
            </div>
            <div class="text-side">
                <span class="section-badge">Tekan Ima</span>
                <h3 class="section-title">Lonto Engal, Cepa, dan Burung</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1977/1978, <strong>No.3269. e1,e2</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1900-an
                </p>
                <p class="section-desc">
                    Kawari terbuat dari bahan perak diukir dengan motif cepa san pusuk rebong. Tekan ima digunakan sebagai hiasan dada bagi anak saat upacara daur hidup pada etnis Samawa.
                </p>
            </div>
        </div>

        <!-- section 24 -->
        <div class="content-section">
            <div class="image-side">
                <img src="<?= base_url('img/2533.jpg'); ?>" alt="Dummy Image 2">
            </div>
            <div class="text-side">
                <span class="section-badge">Kawari</span>
                <h3 class="section-title">Motif Cepa dan Pusuk Rebong</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1981/1982, <strong>No.2533</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1900-an
                </p>
                <p class="section-desc">
                    Kawari terbuat dari bahan perak diukir dengan motif cepa san pusuk rebong. Tekan ima digunakan sebagai hiasan dada bagi anak saat upacara daur hidup pada etnis Samawa.
                </p>
            </div>
        </div>

        <!-- Section 25: Gambar Kanan, Teks Kiri -->
        <div class="content-section reverse">
            <div class="image-side">
                <img src="<?= base_url('img/6595.jpg'); ?>" alt="6595">
            </div>
            <div class="text-side">
                <span class="section-badge">Tabola</span>
                <h3 class="section-title">Motif Kemang Setange, Cepa, dan Geometris</h3>
                <div class="section-code">Koleksi Museum Negeri NTB, pengadaan koleksi tahun 1978/1979, <strong>No.6595</strong></div>
                <p class="section-desc">
                    <strong>Asal:</strong> Sumbawa, Nusa Tenggara Barat<br>
                    <strong>Periode:</strong> Diperkirakan sekitar tahun 1900-an
                </p>
                <p class="section-desc">
                    Tudung saji dengan delapan sudut terbuat dari daun lontar yang ditutup dengan kain warna hijau bermotif kemang setange. Tabola digunakan sepakai penutup makanan pada masyarakat etnis Samawa.
                </p>
            </div>
        </div>

    </div>
</section>
<!-- End post-content Area -->

<?= $this->endSection(); ?>