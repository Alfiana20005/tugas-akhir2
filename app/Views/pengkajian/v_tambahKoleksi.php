<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container ">

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="col alert alert-danger" role="alert">
            <?= session()->getFlashdata('errors'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4 col-sm-7 mx-auto">
        <div class="card-header py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">Tambahkan Data Inventaris Koleksi</h6>
        </div>
        <div class="card-body">
            <!-- <div class="row mb-3 alert alert-danger" role="alert">
                 simple danger alert—check it out!
            </div> -->

            <form action="/saveData" method="post" enctype="multipart/form-data" id="form">

                <?= csrf_field() ?>

                <div class="row mb-3 ">
                    <label for="name" class="col-sm-3 col-form-label">No Registrasi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="contoh: 1111" name="no_registrasi" value="<?= old('no_registrasi'); ?>">
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-3 col-form-label">No Inventaris</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="contoh: 290" name="no_inventaris" value="<?= old('no_inventaris'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputjabatan" class="col-sm-3 col-form-label">Kode Inventaris</label>
                    <div class="col-sm-9">
                        <select class="form-select form-control" type="text" name="kode_kategori" value="<?= old('kode_kategori'); ?>">
                            <!-- harus sesuai dengan urutan enum pada database -->
                            <option selected>Pilih Kode Inventaris</option>
                            <option <?= old("kode_kategori") == '01' ? 'selected' : '01' ?> value="01">01 (Geologika)</option>
                            <option <?= old("kode_kategori") == '02' ? 'selected' : '02' ?> value="02">02 (Biologika)</option>
                            <option <?= old("kode_kategori") == '03' ? 'selected' : '03' ?> value="03">03 (Etnografika)</option>
                            <option <?= old("kode_kategori") == '04' ? 'selected' : '04' ?> value="04">04 (Arkeologika)</option>
                            <option <?= old("kode_kategori") == '05' ? 'selected' : '05' ?> value="05">05 (Historika)</option>
                            <option <?= old("kode_kategori") == '06' ? 'selected' : '06' ?> value="06">06 (Numismatika)</option>
                            <option <?= old("kode_kategori") == '07' ? 'selected' : '07' ?> value="07">07 (Filologika)</option>
                            <option <?= old("kode_kategori") == '08' ? 'selected' : '08' ?> value="08">08 (Keramologika)</option>
                            <option <?= old("kode_kategori") == '09' ? 'selected' : '09' ?> value="09">09 (Seni Rupa)</option>
                            <option <?= old("kode_kategori") == '10' ? 'selected' : '10' ?> value="10">10 (Teknologika)</option>
                            <option <?= old("kode_kategori") == '11' ? 'selected' : '11' ?> value="11">11 (Lain-lain)</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-3 col-form-label">Nama Benda</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="" name="nama_inv" value="<?= old('nama_inv'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="judul" class="col-sm-3 col-form-label">Object Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="" name="inv_name" value="<?= old('inv_name'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-sm-3 col-form-label">Usia Benda</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="" name="usia" value="<?= old('usia'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-sm-3 col-form-label">Ukuran</label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control" name="ukuran" value="<?= old('ukuran'); ?>"></textarea>
                        <!-- <input type="text" class="form-control" placeholder="contoh: Panjang: 20 cm, lebar: 5 cm" name="ukuran" value="<?= old('ukuran'); ?>"> -->
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Tempat dibuat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="contoh: Lombok" name="tempat_buat" value="<?= old('tempat_buat'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Tempat didapat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="contoh: Lombok" name="tempat_dapat" value="<?= old('tempat_dapat'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Cara didapat</label>
                    <div class="col-sm-9">

                        <input type="text" class="form-control" placeholder="contoh: Hibah" name="cara_dapat" value="<?= old('cara_dapat'); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" aria-label="tahun" name="tgl_masuk" value="<?= old('tgl_masuk'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Keadaan Benda</label>
                    <div class="col-sm-9">
                        <select class="form-select form-control" type="text" name="keadaan" value="<?= old('keadaan'); ?>">
                            <!-- harus sesuai dengan urutan enum pada database -->
                            <option selected>Pilih Keadaan Koleksi</option>
                            <option <?= old("keadaan") == 'Baik' ? 'selected' : 'Baik' ?> value="Baik">Baik</option>
                            <option <?= old("keadaan") == 'Rusak Ringan' ? 'selected' : 'Rusak Ringan' ?> value="Rusak Ringan">Rusak Ringan</option>
                            <option <?= old("keadaan") == 'Rusak Sedang' ? 'selected' : 'Rusak Sedang' ?> value="Rusak Sedang">Rusak Sedang</option>
                            <option <?= old("keadaan") == 'Rusak Berat' ? 'selected' : 'Rusak Berat' ?> value="Rusak Berat">Rusak Berat</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Lokasi</label>
                    <div class="col-sm-9">
                        <select class="form-select form-control" type="text" name="lokasi" value="<?= old('lokasi'); ?>">
                            <!-- harus sesuai dengan urutan enum pada database -->
                            <option selected></option>
                            <option <?= old("lokasi") == 'Gudang Koleksi Museum NTB' ? 'selected' : 'Gudang Koleksi Museum NTB' ?> value="Gudang Koleksi Museum NTB">Gudang Koleksi Museum NTB</option>
                            <option <?= old("lokasi") == 'Gudang Atas Ruang TU' ? 'selected' : 'Gudang Atas Ruang TU' ?> value="Gudang Atas Ruang TU">Gudang Atas Ruang TU</option>
                            <option <?= old("lokasi") == 'Ruang Rapat Tambora Museum NTB' ? 'selected' : 'Ruang Rapat Tambora Museum NTB' ?> value="Ruang Rapat Tambora Museum NTB">Ruang Rapat Tambora Museum NTB</option>
                            <option <?= old("lokasi") == 'Ruang Pameran Tetap Museum NTB' ? 'selected' : 'Ruang Pameran Tetap Museum NTB' ?> value="Ruang Pameran Tetap Museum NTB">Ruang Pameran Tetap Museum NTB</option>
                            <option <?= old("lokasi") == 'Ruang Pengkajian Museum NTB' ? 'selected' : 'Ruang Pengkajian Museum NTB' ?> value="Ruang Pengkajian Museum NTB">Ruang Pengkajian Museum NTB</option>
                            <option <?= old("lokasi") == 'Area/Halaman Museum NTB' ? 'selected' : 'Area/Halaman Museum NTB' ?> value="Area/Halaman Museum NTB">Area/Halaman Museum NTB</option>
                            <option <?= old("lokasi") == 'Brankas Ruang Koleksi Museum NTB' ? 'selected' : 'Brankas Ruang Koleksi Museum NTB' ?> value="Brankas Ruang Koleksi Museum NTB">Brankas Ruang Koleksi Museum NTB</option>
                            <option <?= old("lokasi") == 'Ruang Pameran 1' ? 'selected' : 'Ruang Pameran 1' ?> value="Ruang Pameran 1">Ruang Pameran 1</option>
                            <option <?= old("lokasi") == 'Ruang Pameran 2' ? 'selected' : 'Ruang Pameran 2' ?> value="Ruang Pameran 2">Ruang Pameran 2</option>
                            <option <?= old("lokasi") == 'Ruang Khazanah' ? 'selected' : 'Ruang Khazanah' ?> value="Ruang Khazanah">Ruang Khazanah</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Zona</label>
                    <div class="col-sm-9">
                        <select class="form-select form-control" type="text" name="zona" value="<?= old('zona'); ?>">
                            <!-- harus sesuai dengan urutan enum pada database -->
                            <option selected></option>
                            <option <?= old("zona") == 'Zona A (Meja Besar)' ? 'selected' : 'Zona A (Meja Besar)' ?> value="Zona A (Meja Besar)">Zona A (Meja Besar)</option>
                            <option <?= old("zona") == 'Zona B (Senjata)' ? 'selected' : 'Zona B (Senjata)' ?> value="Zona B (Senjata)">Zona B (Senjata)</option>
                            <option <?= old("zona") == 'Zona C (Wayang)' ? 'selected' : 'Zona C (Wayang)' ?> value="Zona C (Wayang)">Zona C (Wayang)</option>
                            <option <?= old("zona") == 'Zona D (Naskah)' ? 'selected' : 'Zona D (Naskah)' ?> value="Zona D (Naskah)">Zona D (Naskah)</option>
                            <option <?= old("zona") == 'Zona E (Etnografika)' ? 'selected' : 'Zona E (Etnografika)' ?> value="Zona E (Etnografika)">Zona E (Etnografika)</option>
                            <option <?= old("zona") == 'Zona F (Etnografika, Arkeologika, Geologika, Biologika)' ? 'selected' : 'Zona F (Etnografika, Arkeologika, Geologika, Biologika)' ?> value="Zona F (Etnografika, Arkeologika, Geologika, Biologika)">Zona F (Etnografika, Arkeologika, Geologika, Biologika)</option>
                            <option <?= old("zona") == 'Zona G (Keramik, Gerabah)' ? 'selected' : 'Zona G (Keramik, Gerabah)' ?> value="Zona G (Keramik, Gerabah)">Zona G (Keramik, Gerabah)</option>
                            <option <?= old("zona") == 'Zona H (Kain)' ? 'selected' : 'Zona H (Kain)' ?> value="Zona H (Kain)">Zona H (Kain)</option>
                            <option <?= old("zona") == 'Zona I (Etnografika)' ? 'selected' : 'Zona I (Etnografika)' ?> value="Zona I (Etnografika)">Zona I (Etnografika)</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Lemari</label>
                    <div class="col-sm-9">
                        <select class="form-select form-control" type="text" name="lemari" value="<?= old('lemari'); ?>">
                            <!-- harus sesuai dengan urutan enum pada database -->
                            <option selected></option>
                            <option <?= old("lemari") == 'Lemari 1' ? 'selected' : 'Lemari 1' ?> value="Lemari 1">Lemari 1</option>
                            <option <?= old("lemari") == 'Lemari 2' ? 'selected' : 'Lemari 2' ?> value="Lemari 2">Lemari 2</option>
                            <option <?= old("lemari") == 'Lemari 3' ? 'selected' : 'Lemari 3' ?> value="Lemari 3">Lemari 3</option>
                            <option <?= old("lemari") == 'Lemari 4' ? 'selected' : 'Lemari 4' ?> value="Lemari 4">Lemari 4</option>
                            <option <?= old("lemari") == 'Lemari 5' ? 'selected' : 'Lemari 5' ?> value="Lemari 5">Lemari 5</option>
                            <option <?= old("lemari") == 'Lemari 6' ? 'selected' : 'Lemari 6' ?> value="Lemari 6">Lemari 6</option>
                            <option <?= old("lemari") == 'Lemari 7' ? 'selected' : 'Lemari 7' ?> value="Lemari 7">Lemari 7</option>
                            <option <?= old("lemari") == 'Lemari 8' ? 'selected' : 'Lemari 8' ?> value="Lemari 8">Lemari 8</option>
                            <option <?= old("lemari") == 'Lemari 9' ? 'selected' : 'Lemari 9' ?> value="Lemari 9">Lemari 9</option>
                            <option <?= old("lemari") == 'Lemari 10' ? 'selected' : 'Lemari 10' ?> value="Lemari 10">Lemari 10</option>
                            <option <?= old("lemari") == 'Lemari 11' ? 'selected' : 'Lemari 11' ?> value="Lemari 11">Lemari 11</option>
                            <option <?= old("lemari") == 'Lemari 12' ? 'selected' : 'Lemari 12' ?> value="Lemari 12">Lemari 12</option>
                            <option <?= old("lemari") == 'Lemari 13' ? 'selected' : 'Lemari 13' ?> value="Lemari 13">Lemari 13</option>
                            <!-- Vitrin options 1-46 -->
                            <option <?= old("lemari") == 'Vitrin 1' ? 'selected' : 'Vitrin 1' ?> value="Vitrin 1">Vitrin 1</option>
                            <option <?= old("lemari") == 'Vitrin 2' ? 'selected' : 'Vitrin 2' ?> value="Vitrin 2">Vitrin 2</option>
                            <option <?= old("lemari") == 'Vitrin 3' ? 'selected' : 'Vitrin 3' ?> value="Vitrin 3">Vitrin 3</option>
                            <option <?= old("lemari") == 'Vitrin 4' ? 'selected' : 'Vitrin 4' ?> value="Vitrin 4">Vitrin 4</option>
                            <option <?= old("lemari") == 'Vitrin 5' ? 'selected' : 'Vitrin 5' ?> value="Vitrin 5">Vitrin 5</option>
                            <option <?= old("lemari") == 'Vitrin 6' ? 'selected' : 'Vitrin 6' ?> value="Vitrin 6">Vitrin 6</option>
                            <option <?= old("lemari") == 'Vitrin 7' ? 'selected' : 'Vitrin 7' ?> value="Vitrin 7">Vitrin 7</option>
                            <option <?= old("lemari") == 'Vitrin 8' ? 'selected' : 'Vitrin 8' ?> value="Vitrin 8">Vitrin 8</option>
                            <option <?= old("lemari") == 'Vitrin 9' ? 'selected' : 'Vitrin 9' ?> value="Vitrin 9">Vitrin 9</option>
                            <option <?= old("lemari") == 'Vitrin 10' ? 'selected' : 'Vitrin 10' ?> value="Vitrin 10">Vitrin 10</option>
                            <option <?= old("lemari") == 'Vitrin 11' ? 'selected' : 'Vitrin 11' ?> value="Vitrin 11">Vitrin 11</option>
                            <option <?= old("lemari") == 'Vitrin 12' ? 'selected' : 'Vitrin 12' ?> value="Vitrin 12">Vitrin 12</option>
                            <option <?= old("lemari") == 'Vitrin 13' ? 'selected' : 'Vitrin 13' ?> value="Vitrin 13">Vitrin 13</option>
                            <option <?= old("lemari") == 'Vitrin 14' ? 'selected' : 'Vitrin 14' ?> value="Vitrin 14">Vitrin 14</option>
                            <option <?= old("lemari") == 'Vitrin 15' ? 'selected' : 'Vitrin 15' ?> value="Vitrin 15">Vitrin 15</option>
                            <option <?= old("lemari") == 'Vitrin 16' ? 'selected' : 'Vitrin 16' ?> value="Vitrin 16">Vitrin 16</option>
                            <option <?= old("lemari") == 'Vitrin 17' ? 'selected' : 'Vitrin 17' ?> value="Vitrin 17">Vitrin 17</option>
                            <option <?= old("lemari") == 'Vitrin 18' ? 'selected' : 'Vitrin 18' ?> value="Vitrin 18">Vitrin 18</option>
                            <option <?= old("lemari") == 'Vitrin 19' ? 'selected' : 'Vitrin 19' ?> value="Vitrin 19">Vitrin 19</option>
                            <option <?= old("lemari") == 'Vitrin 20' ? 'selected' : 'Vitrin 20' ?> value="Vitrin 20">Vitrin 20</option>
                            <option <?= old("lemari") == 'Vitrin 21' ? 'selected' : 'Vitrin 21' ?> value="Vitrin 21">Vitrin 21</option>
                            <option <?= old("lemari") == 'Vitrin 22' ? 'selected' : 'Vitrin 22' ?> value="Vitrin 22">Vitrin 22</option>
                            <option <?= old("lemari") == 'Vitrin 23' ? 'selected' : 'Vitrin 23' ?> value="Vitrin 23">Vitrin 23</option>
                            <option <?= old("lemari") == 'Vitrin 24' ? 'selected' : 'Vitrin 24' ?> value="Vitrin 24">Vitrin 24</option>
                            <option <?= old("lemari") == 'Vitrin 25' ? 'selected' : 'Vitrin 25' ?> value="Vitrin 25">Vitrin 25</option>
                            <option <?= old("lemari") == 'Vitrin 26' ? 'selected' : 'Vitrin 26' ?> value="Vitrin 26">Vitrin 26</option>
                            <option <?= old("lemari") == 'Vitrin 27' ? 'selected' : 'Vitrin 27' ?> value="Vitrin 27">Vitrin 27</option>
                            <option <?= old("lemari") == 'Vitrin 28' ? 'selected' : 'Vitrin 28' ?> value="Vitrin 28">Vitrin 28</option>
                            <option <?= old("lemari") == 'Vitrin 29' ? 'selected' : 'Vitrin 29' ?> value="Vitrin 29">Vitrin 29</option>
                            <option <?= old("lemari") == 'Vitrin 30' ? 'selected' : 'Vitrin 30' ?> value="Vitrin 30">Vitrin 30</option>
                            <option <?= old("lemari") == 'Vitrin 31' ? 'selected' : 'Vitrin 31' ?> value="Vitrin 31">Vitrin 31</option>
                            <option <?= old("lemari") == 'Vitrin 32' ? 'selected' : 'Vitrin 32' ?> value="Vitrin 32">Vitrin 32</option>
                            <option <?= old("lemari") == 'Vitrin 33' ? 'selected' : 'Vitrin 33' ?> value="Vitrin 33">Vitrin 33</option>
                            <option <?= old("lemari") == 'Vitrin 34' ? 'selected' : 'Vitrin 34' ?> value="Vitrin 34">Vitrin 34</option>
                            <option <?= old("lemari") == 'Vitrin 35' ? 'selected' : 'Vitrin 35' ?> value="Vitrin 35">Vitrin 35</option>
                            <option <?= old("lemari") == 'Vitrin 36' ? 'selected' : 'Vitrin 36' ?> value="Vitrin 36">Vitrin 36</option>
                            <option <?= old("lemari") == 'Vitrin 37' ? 'selected' : 'Vitrin 37' ?> value="Vitrin 37">Vitrin 37</option>
                            <option <?= old("lemari") == 'Vitrin 38' ? 'selected' : 'Vitrin 38' ?> value="Vitrin 38">Vitrin 38</option>
                            <option <?= old("lemari") == 'Vitrin 39' ? 'selected' : 'Vitrin 39' ?> value="Vitrin 39">Vitrin 39</option>
                            <option <?= old("lemari") == 'Vitrin 40' ? 'selected' : 'Vitrin 40' ?> value="Vitrin 40">Vitrin 40</option>
                            <option <?= old("lemari") == 'Vitrin 41' ? 'selected' : 'Vitrin 41' ?> value="Vitrin 41">Vitrin 41</option>
                            <option <?= old("lemari") == 'Vitrin 42' ? 'selected' : 'Vitrin 42' ?> value="Vitrin 42">Vitrin 42</option>
                            <option <?= old("lemari") == 'Vitrin 43' ? 'selected' : 'Vitrin 43' ?> value="Vitrin 43">Vitrin 43</option>
                            <option <?= old("lemari") == 'Vitrin 44' ? 'selected' : 'Vitrin 44' ?> value="Vitrin 44">Vitrin 44</option>
                            <option <?= old("lemari") == 'Vitrin 45' ? 'selected' : 'Vitrin 45' ?> value="Vitrin 45">Vitrin 45</option>
                            <option <?= old("lemari") == 'Vitrin 46' ? 'selected' : 'Vitrin 46' ?> value="Vitrin 46">Vitrin 46</option>
                            <option <?= old("lemari") == 'Vitrin 47' ? 'selected' : 'Vitrin 47' ?> value="Vitrin 47">Vitrin 47</option>
                            <option <?= old("lemari") == 'Vitrin 48' ? 'selected' : 'Vitrin 48' ?> value="Vitrin 48">Vitrin 48</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Rak/Laci</label>
                    <div class="col-sm-9">
                        <select class="form-select form-control" type="text" name="rak" value="<?= old('rak'); ?>">
                            <!-- harus sesuai dengan urutan enum pada database -->
                            <option selected> </option>
                            <option <?= old("rak") == 'Rak/Laci 1' ? 'selected' : 'Rak/Laci 1' ?> value="Rak/Laci 1">Rak/Laci 1</option>
                            <option <?= old("rak") == 'Rak/Laci 2' ? 'selected' : 'Rak/Laci 2' ?> value="Rak/Laci 2">Rak/Laci 2</option>
                            <option <?= old("rak") == 'Rak/Laci 3' ? 'selected' : 'Rak/Laci 3' ?> value="Rak/Laci 3">Rak/Laci 3</option>
                            <option <?= old("rak") == 'Rak/Laci 4' ? 'selected' : 'Rak/Laci 4' ?> value="Rak/Laci 4">Rak/Laci 4</option>
                            <option <?= old("rak") == 'Rak/Laci 5' ? 'selected' : 'Rak/Laci 5' ?> value="Rak/Laci 5">Rak/Laci 5</option>
                            <option <?= old("rak") == 'Rak/Laci 6' ? 'selected' : 'Rak/Laci 6' ?> value="Rak/Laci 6">Rak/Laci 6</option>
                            <option <?= old("rak") == 'Rak/Laci 7' ? 'selected' : 'Rak/Laci 7' ?> value="Rak/Laci 7">Rak/Laci 7</option>
                            <option <?= old("rak") == 'Rak/Laci 8' ? 'selected' : 'Rak/Laci 8' ?> value="Rak/Laci 8">Rak/Laci 8</option>
                            <option <?= old("rak") == 'Rak/Laci 9' ? 'selected' : 'Rak/Laci 9' ?> value="Rak/Laci 9">Rak/Laci 9</option>
                            <option <?= old("rak") == 'Rak/Laci 10' ? 'selected' : 'Rak/Laci 10' ?> value="Rak/Laci 10">Rak/Laci 10</option>
                            <option <?= old("rak") == 'Rak/Laci 11' ? 'selected' : 'Rak/Laci 11' ?> value="Rak/Laci 10">Rak/Laci 11</option>
                            <option <?= old("rak") == 'Rak/Laci 12' ? 'selected' : 'Rak/Laci 12' ?> value="Rak/Laci 10">Rak/Laci 12</option>
                            <option <?= old("rak") == 'Lantai' ? 'selected' : 'Lantai' ?> value="Lantai">Lantai</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Urutan (Kiri ke kanan)</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="" name="urutan" value="<?= old('urutan'); ?>">
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Harga Perolehan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="contoh: Rp.000" name="harga" value="<?= old('harga'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Nilai Wajar Benda (2024)</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="contoh: Rp.000" name="harga_wajar" value="<?= old('harga_wajar'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Nilai Penggantian</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="contoh: Rp.000" name="harga_penggantian" value="<?= old('harga_penggantian'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                        <!-- <input type="text" class="form-control" placeholder="contoh: Pengadaan koleksi" name="keterangan" value="<?= old('keterangan'); ?>"> -->
                        <textarea type="text" class="form-control" name="keterangan" value="<?= old('keterangan'); ?>"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Uraian</label>
                    <div class="col-sm-9">
                        <!-- <input type="text" class="form-control" placeholder="contoh: Sebuah keris ..." name="uraian" value="<?= old('uraian'); ?>"> -->
                        <textarea type="text" class="form-control" name="uraian" value="<?= old('uraian'); ?>"></textarea>
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="foto" class="col-sm-3 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-7">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="gambar" name="gambar" onchange="previewImg('gambar')">
                            <label class="custom-file-label" for="customFile">Masukkan Gambar Koleksi</label>

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sumber" class="col-sm-3 col-form-label">Fotografer</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="" name="fotografer" value="<?= old('fotografer'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sumber" class="col-sm-3 col-form-label">Sumber Data</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="" name="sumber" value="<?= old('sumber'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <select class="form-select form-control" type="text" name="status" value="<?= old('status'); ?>">
                            <!-- harus sesuai dengan urutan enum pada database -->
                            <option selected>Pilih</option>
                            <option <?= old("status") == 'Valid' ? 'selected' : 'Valid' ?> value="Valid">Valid</option>
                            <option <?= old("status") == 'Valid tbc' ? 'selected' : 'Valid tbc' ?> value="Valid tbc">Valid tbc</option>
                            <option <?= old("status") == 'Anomali' ? 'selected' : 'Anomali' ?> value="Anomali">Anomali</option>
                            <option <?= old("status") == 'Disclaimer' ? 'selected' : 'Disclaimer' ?> value="Disclaimer">Disclaimer</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sumber" class="col-sm-3 col-form-label">Kode Lembar Kerja</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="" name="kode_lk" value="<?= old('kode_lk'); ?>">
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary ">Simpan Data</button>
                </div>
            </form>
        </div>


    </div>




</div>

<?= $this->endSection(); ?>