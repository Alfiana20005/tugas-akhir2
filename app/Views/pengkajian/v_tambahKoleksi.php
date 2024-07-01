<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container ">
    
                    <?php if (session()->getFlashdata('errors')): ?>
                            <div class="col alert alert-danger" role="alert">
                                <?= session()->getFlashdata('errors'); ?>
                            </div>
                        <?php endif; ?>
                    <?php  if(session()->getFlashdata('pesan')): ?>
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
                                <option <?= old("kode_kategori") == '01'? 'selected' : '01' ?> value="01">01 (Geologika)</option>
                                <option <?= old("kode_kategori") == '02'? 'selected' : '02' ?> value="02">02 (Biologika)</option>
                                <option <?= old("kode_kategori") == '03'? 'selected' : '03' ?> value="03">03 (Etnografika)</option>
                                <option <?= old("kode_kategori") == '04'? 'selected' : '04' ?> value="04">04 (Arkeologika)</option>
                                <option <?= old("kode_kategori") == '05'? 'selected' : '05' ?> value="05">05 (Historika)</option>
                                <option <?= old("kode_kategori") == '06'? 'selected' : '06' ?> value="06">06 (Numismatika)</option>
                                <option <?= old("kode_kategori") == '07'? 'selected' : '07' ?> value="07">07 (Filologika)</option>
                                <option <?= old("kode_kategori") == '08'? 'selected' : '08' ?> value="08">08 (Keramologika)</option>
                                <option <?= old("kode_kategori") == '09'? 'selected' : '09' ?> value="09">09 (Seni Rupa)</option>
                                <option <?= old("kode_kategori") == '10'? 'selected' : '10' ?> value="10">10 (Teknologika)</option>
                                <option <?= old("kode_kategori") == '11'? 'selected' : '11' ?> value="11">11 (Lain-lain)</option>
                            </select>
                        </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-3 col-form-label">Nama Benda</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="contoh: Keris" name="nama_inv" value="<?= old('nama_inv'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-sm-3 col-form-label">Ukuran</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="contoh: Panjang: 20 cm, lebar: 5 cm" name="ukuran" value="<?= old('ukuran'); ?>">
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
                        <input type="date" class="form-control"  aria-label="tahun" name="tgl_masuk" value="<?= old('tgl_masuk'); ?>">
                        <!-- <input type="text" class="form-control" name="tanggal" > -->
                    
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Keadaan Benda</label>
                    <div class="col-sm-9">
                            <select class="form-select form-control" type="text" name="keadaan"  value="<?= old('keadaan'); ?>">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih Keadaan Koleksi</option>
                                <option <?= old("keadaan") == 'Baik'? 'selected' : 'Baik' ?> value="Baik">Baik</option>
                                <option <?= old("keadaan") == 'Rusak Ringan'? 'selected' : 'Rusak Ringan' ?> value="Rusak Ringan">Rusak Ringan</option>
                                <option <?= old("keadaan") == 'Rusak Sedang'? 'selected' : 'Rusak Sedang' ?> value="Rusak Sedang">Rusak Sedang</option>
                                <option <?= old("keadaan") == 'Rusak Berat'? 'selected' : 'Rusak Berat' ?> value="Rusak Berat">Rusak Berat</option>
                            </select>
                        </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Rak/Laci</label>
                    <div class="col-sm-9">
                            <select class="form-select form-control" type="text" name="rak"  value="<?= old('rak'); ?>">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected> </option>
                                <option <?= old("rak") == 'Rak/Laci 1'? 'selected' : 'Rak/laci 1' ?> value="Rak/laci 1">Rak/laci 1</option>
                                <option <?= old("rak") == 'Rak/laci 2'? 'selected' : 'Rak/laci 2' ?> value="Rak/laci 2">Rak/laci 2</option>
                                <option <?= old("rak") == 'Rak/laci 3'? 'selected' : 'Rak/laci 3' ?> value="Rak/laci 3">Rak/laci 3</option>
                                <option <?= old("rak") == 'Rak/laci 4'? 'selected' : 'Rak/laci 4' ?> value="Rak/laci 4">Rak/laci 4</option>
                                <option <?= old("rak") == 'Rak/laci 5'? 'selected' : 'Rak/laci 5' ?> value="Rak/laci 5">Rak/laci 5</option>
                                <option <?= old("rak") == 'Rak/laci 6'? 'selected' : 'Rak/laci 6' ?> value="Rak/laci 6">Rak/laci 6</option>
                                <option <?= old("rak") == 'Rak/laci 7'? 'selected' : 'Rak/laci 7' ?> value="Rak/laci 7">Rak/laci 7</option>
                                <option <?= old("rak") == 'Rak/laci 8'? 'selected' : 'Rak/laci 8' ?> value="Rak/laci 8">Rak/laci 8</option>
                                <option <?= old("rak") == 'Rak/laci 9'? 'selected' : 'Rak/laci 9' ?> value="Rak/laci 9">Rak/laci 9</option>
                                <option <?= old("rak") == 'Rak/laci 10'? 'selected' : 'Rak/laci 10' ?> value="Rak/laci 10">Rak/laci 10</option>
                            </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Lemari</label>
                    <div class="col-sm-9">
                            <select class="form-select form-control" type="text" name="lemari"  value="<?= old('lemari'); ?>">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih...</option>
                                <option <?= old("lemari") == 'Lemari 1'? 'selected' : 'Lemari 1' ?> value="Lemari 1">Lemari 1</option>
                                <option <?= old("lemari") == 'Lemari 2'? 'selected' : 'Lemari 2' ?> value="Lemari 2">Lemari 2</option>
                                <option <?= old("lemari") == 'Lemari 3'? 'selected' : 'Lemari 3' ?> value="Lemari 3">Lemari 3</option>
                                <option <?= old("lemari") == 'Lemari 4'? 'selected' : 'Lemari 4' ?> value="Lemari 4">Lemari 4</option>
                                <option <?= old("lemari") == 'Lemari 5'? 'selected' : 'Lemari 5' ?> value="Lemari 5">Lemari 5</option>
                                <option <?= old("lemari") == 'Lemari 6'? 'selected' : 'Lemari 6' ?> value="Lemari 6">Lemari 6</option>
                                <option <?= old("lemari") == 'Lemari 7'? 'selected' : 'Lemari 7' ?> value="Lemari 7">Lemari 7</option>
                                <option <?= old("lemari") == 'Lemari 8'? 'selected' : 'Lemari 8' ?> value="Lemari 8">Lemari 8</option>
                                <option <?= old("lemari") == 'Lemari 9'? 'selected' : 'Lemari 9' ?> value="Lemari 9">Lemari 9</option>
                                <option <?= old("lemari") == 'Lemari 10'? 'selected' : 'Lemari 10' ?> value="Lemari 10">Lemari 10</option>
                            </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Lokasi</label>
                    <div class="col-sm-9">
                            <select class="form-select form-control" type="text" name="lokasi"  value="<?= old('lokasi'); ?>">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih Lokasi Koleksi</option>
                                <option <?= old("lokasi") == 'Gudang Koleksi Museum NTB'? 'selected' : 'Gudang Koleksi Museum NTB' ?> value="Gudang Koleksi Museum NTB">Gudang Koleksi Museum NTB</option>
                                <option <?= old("lokasi") == 'Gudang Atas Ruang TU'? 'selected' : 'Gudang Atas Ruang TU' ?> value="Gudang Atas Ruang TU">Gudang Atas Ruang TU</option>
                                <option <?= old("lokasi") == 'Gudang Belakang Museum NTB'? 'selected' : 'Gudang Belakang Museum NTB' ?> value="Gudang Belakang Museum NTB">Gudang Belakang Museum NTB</option>
                                <option <?= old("lokasi") == 'Ruang Pameran Tetap Museum NTB'? 'selected' : 'Ruang Pameran Tetap Museum NTB' ?> value="Ruang Pameran Tetap Museum NTB">Ruang Pameran Tetap Museum NTB</option>
                                <option <?= old("lokasi") == 'Area/Halaman Museum NTB'? 'selected' : 'Area/Halaman Museum NTB' ?> value="Area/Halaman Museum NTB">Area/Halaman Museum NTB</option>
                            </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Harga</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="contoh: Rp.000" name="harga" value="<?= old('harga'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="contoh: Pengadaan koleksi" name="keterangan" value="<?= old('keterangan'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Uraian</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="contoh: Sebuah keris ..." name="uraian" value="<?= old('uraian'); ?>">
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
                
                <div class="d-flex justify-content-end">
                     <button type="submit" class="btn btn-primary ">Simpan Data</button>
                </div> 
            </form>
        </div>

        
    </div>


        
       
</div>

<?= $this->endSection(); ?>