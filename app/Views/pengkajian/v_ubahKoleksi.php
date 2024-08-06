<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container">
    <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="col alert alert-danger" role="alert">
                                <?= session()->getFlashdata('errors'); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php  if(session()->getFlashdata('pesan')): ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Inventaris Koleksi</h6>
        </div>

        
        <div class="card-body p-7">
            <!-- <div class="row mb-3 alert alert-danger" role="alert">
                 simple danger alert—check it out!
            </div> -->
                <div class="row">
                    <div class="col-sm-2"></div>
                    <!--  -->
                    
                </div>
            <form action="/updateKoleksi/<?= $data_koleksi['id']; ?> " method="post" enctype="multipart/form-data">
                
                <?= csrf_field() ?>
                                
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">No Registrasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="no_registrasi" value="<?= $data_koleksi['no_registrasi']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">No Inventaris</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="no_inventaris" value="<?= $data_koleksi['no_inventaris']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                        <label for="inputjabatan" class="col-sm-2 col-form-label">Kode Inventaris</label>
                        <div class="col-sm-10">
                            <select class="form-select form-control" type="text" name="kode_kategori" value="<?= $data_koleksi['kode_kategori']; ?>">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih Kode Inventaris</option>
                                <option <?= $data_koleksi['kode_kategori'] == '01'? 'selected' : '' ?> value="01">01</option>
                                <option <?= $data_koleksi['kode_kategori'] == '02'? 'selected' : '' ?> value="02">02</option>
                                <option <?= $data_koleksi['kode_kategori'] == '03'? 'selected' : '' ?> value="03">03</option>
                                <option <?= $data_koleksi['kode_kategori'] == '04'? 'selected' : '' ?> value="04">04</option>
                                <option <?= $data_koleksi['kode_kategori'] == '05'? 'selected' : '' ?> value="05">05</option>
                                <option <?= $data_koleksi['kode_kategori'] == '06'? 'selected' : '' ?> value="06">06</option>
                                <option <?= $data_koleksi['kode_kategori'] == '07'? 'selected' : '' ?> value="07">07</option>
                                <option <?= $data_koleksi['kode_kategori'] == '08'? 'selected' : '' ?> value="08">08</option>
                                <option <?= $data_koleksi['kode_kategori'] == '09'? 'selected' : '' ?> value="09">09</option>
                                <option <?= $data_koleksi['kode_kategori'] == '10'? 'selected' : '' ?> value="10">10</option>
                            </select>
                        </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nama Benda</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " name="nama_inv" value="<?= $data_koleksi['nama_inv']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Object Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " name="inv_name" value="<?= $data_koleksi['inv_name']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Ukuran</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control"  name="ukuran" value="<?= $data_koleksi['ukuran']; ?>"><?= $data_koleksi['ukuran']; ?></textarea>
                        <!-- <input type="text" class="form-control" name="ukuran" value="<?= $data_koleksi['ukuran']; ?>"> -->
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Tempat dibuat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tempat_buat" value="<?= $data_koleksi['tempat_buat']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Tempat didapat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tempat_dapat" value="<?= $data_koleksi['tempat_dapat']; ?>">
                    </div>
                </div>                
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Cara didapat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="cara_dapat" value="<?= $data_koleksi['cara_dapat']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control"  aria-label="tahun" name="tgl_masuk" value="<?= $data_koleksi['tgl_masuk']; ?>">
                        <!-- <input type="text" class="form-control" name="tanggal" > -->
                    
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Keadaan Benda</label>
                    <div class="col-sm-10">
                            <select class="form-select form-control" type="text" name="keadaan"  value="<?= $data_koleksi['keadaan']; ?>">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih Keadaan Koleksi</option>
                                <option <?= $data_koleksi['keadaan'] == 'Baik'? 'selected' : '' ?> value="Baik">Baik</option>
                                <option <?= $data_koleksi['keadaan'] == 'Rusak Ringan'? 'selected' : '' ?> value="Rusak Ringan">Rusak Ringan</option>
                                <option <?= $data_koleksi['keadaan'] == 'Rusak Sedang'? 'selected' : '' ?> value="Rusak Sedang">Rusak Sedang</option>
                                <option <?= $data_koleksi['keadaan'] == 'Rusak Berat'? 'selected' : '' ?> value="Rusak Berat">Rusak Berat</option>
                            </select>
                        </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-10">
                            <select class="form-select form-control" type="text" name="lokasi" value="<?= $data_koleksi['lokasi']; ?>">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih Lokasi Koleksi</option>
                                <option <?= $data_koleksi['lokasi'] == 'Gudang Koleksi Museum NTB'? 'selected' : 'Gudang Koleksi Museum NTB' ?> value="Gudang Koleksi Museum NTB">Gudang Koleksi Museum NTB</option>
                                <option <?= $data_koleksi['lokasi'] == 'Gudang Atas Ruang TU'? 'selected' : 'Gudang Atas Ruang TU' ?> value="Gudang Atas Ruang TU">Gudang Atas Ruang TU</option>
                                <option <?= $data_koleksi['lokasi'] == 'Gudang Belakang Museum NTB'? 'selected' : 'Gudang Belakang Museum NTB' ?> value="Gudang Belakang Museum NTB">Gudang Belakang Museum NTB</option>
                                <option <?= $data_koleksi['lokasi'] == 'Ruang Pameran Tetap Museum NTB'? 'selected' : 'Ruang Pameran Tetap Museum NTB' ?> value="Ruang Pameran Tetap Museum NTB">Ruang Pameran Tetap Museum NTB</option>
                                <option <?= $data_koleksi['lokasi'] == 'Area/Halaman Museum NTB'? 'selected' : 'Area/Halaman Museum NTB' ?> value="Area/Halaman Museum NTB">Area/Halaman Museum NTB</option>
                            </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Zona</label>
                    <div class="col-sm-10">
                            <select class="form-select form-control" type="text" name="zona" value="<?= $data_koleksi['zona']; ?>">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih...</option>
                                <option <?= $data_koleksi['zona'] == 'Zona A (Meja Besar)'? 'selected' : 'Zona A (Meja Besar)' ?> value="Zona A Meja Besar">Zona A Meja Besar</option>
                                <option <?= $data_koleksi['zona'] == 'Zona B (Senjata)'? 'selected' : 'Zona B (Senjata)' ?> value="Zona B (Senjata)">Zona B (Senjata)</option>
                                <option <?= $data_koleksi['zona'] == 'Zona C (Wayang)'? 'selected' : 'Zona C (Wayang)' ?> value="Zona C (Wayang)">Zona C (Wayang)</option>
                                <option <?= $data_koleksi['zona'] == 'Zona D (Naskah)'? 'selected' : 'Zona D (Naskah)' ?> value="Zona D (Naskah)">Zona D (Naskah)</option>
                                <option <?= $data_koleksi['zona'] == 'Zona E (Etnografika)'? 'selected' : 'Zona E (Etnografika)' ?> value="Zona E (Etnografika)">Zona E (Etnografika)</option>
                                <option <?= $data_koleksi['zona'] == 'Zona F (Etnografika, Arkeologika, Geologika, Biologika)'? 'selected' : 'Zona F (Etnografika, Arkeologika, Geologika, Biologika)' ?> value="Zona F (Etnografika, Arkeologika, Geologika, Biologika)">Zona F (Etnografika, Arkeologika, Geologika, Biologika)</option>
                                <option <?= $data_koleksi['zona'] == 'Zona G (Keramik, Gerabah)'? 'selected' : 'Zona G (Keramik, Gerabah)' ?> value="Zona G (Keramik, Gerabah)">Zona G (Keramik, Gerabah)</option>
                                <option <?= $data_koleksi['zona'] == 'Zona H (Kain)'? 'selected' : 'Zona H (Kain)' ?> value="Zona H (Kain)">Zona H (Kain)</option>
                                <option <?= $data_koleksi['zona'] == 'Zona I (Etnografika)'? 'selected' : 'Zona I (Etnografika)' ?> value="Zona I (Etnografika)">Zona I (Etnografika)</option>
                               
                            </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Lemari</label>
                    <div class="col-sm-10">
                            <select class="form-select form-control" type="text" name="lemari" value="<?= $data_koleksi['lemari']; ?>">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected> </option>
                                <option <?= $data_koleksi['lemari'] == 'Lemari 1'? 'selected' : 'Lemari 1' ?> value="Lemari 1">Lemari 1</option>
                                <option <?= $data_koleksi['lemari'] == 'Lemari 2'? 'selected' : 'Lemari 2' ?> value="Lemari 2">Lemari 2</option>
                                <option <?= $data_koleksi['lemari'] == 'Lemari 3'? 'selected' : 'Lemari 3' ?> value="Lemari 3">Lemari 3</option>
                                <option <?= $data_koleksi['lemari'] == 'Lemari 4'? 'selected' : 'Lemari 4' ?> value="Lemari 4">Lemari 4</option>
                                <option <?= $data_koleksi['lemari'] == 'Lemari 5'? 'selected' : 'Lemari 5' ?> value="Lemari 5">Lemari 5</option>
                                <option <?= $data_koleksi['lemari'] == 'Lemari 6'? 'selected' : 'Lemari 6' ?> value="Lemari 6">Lemari 6</option>
                                <option <?= $data_koleksi['lemari'] == 'Lemari 7'? 'selected' : 'Lemari 7' ?> value="Lemari 7">Lemari 7</option>
                                <option <?= $data_koleksi['lemari'] == 'Lemari 8'? 'selected' : 'Lemari 8' ?> value="Lemari 8">Lemari 8</option>
                                <option <?= $data_koleksi['lemari'] == 'Lemari 9'? 'selected' : 'Lemari 9' ?> value="Lemari 9">Lemari 9</option>
                                <option <?= $data_koleksi['lemari'] == 'Lemari 10'? 'selected' : 'Lemari 10' ?> value="Lemari 10">Lemari 10</option>
                               
                                
                            </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Rak/Laci</label>
                    <div class="col-sm-10">
                            <select class="form-select form-control" type="text" name="rak" value="<?= $data_koleksi['rak']; ?>">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected> </option>
                                <option <?= $data_koleksi['rak'] == 'Rak/Laci 1'? 'selected' : 'Rak/Laci 1' ?> value="Rak/Laci 1">Rak/Laci 1</option>
                                <option <?= $data_koleksi['rak'] == 'Rak/Laci 2'? 'selected' : 'Rak/Laci 2' ?> value="Rak/Laci 2">Rak/Laci 2</option>
                                <option <?= $data_koleksi['rak'] == 'Rak/Laci 3'? 'selected' : 'Rak/Laci 3' ?> value="Rak/Laci 3">Rak/Laci 3</option>
                                <option <?= $data_koleksi['rak'] == 'Rak/Laci 4'? 'selected' : 'Rak/Laci 4' ?> value="Rak/Laci 4">Rak/Laci 4</option>
                                <option <?= $data_koleksi['rak'] == 'Rak/Laci 5'? 'selected' : 'Rak/Laci 5' ?> value="Rak/Laci 5">Rak/Laci 5</option>
                                <option <?= $data_koleksi['rak'] == 'Rak/Laci 6'? 'selected' : 'Rak/Laci 6' ?> value="Rak/Laci 6">Rak/Laci 6</option>
                                <option <?= $data_koleksi['rak'] == 'Rak/Laci 7'? 'selected' : 'Rak/Laci 7' ?> value="Rak/Laci 7">Rak/Laci 7</option>
                                <option <?= $data_koleksi['rak'] == 'Rak/Laci 8'? 'selected' : 'Rak/Laci 8' ?> value="Rak/Laci 8">Rak/Laci 8</option>
                                <option <?= $data_koleksi['rak'] == 'Rak/Laci 9'? 'selected' : 'Rak/Laci 9' ?> value="Rak/Laci 9">Rak/Laci 9</option>
                                <option <?= $data_koleksi['rak'] == 'Rak/Laci 10'? 'selected' : 'Rak/Laci 10' ?> value="Rak/Laci 10">Rak/Laci 10</option>
                                <option <?= $data_koleksi['rak'] == 'Lantai'? 'selected' : 'Lantai' ?> value="Lantai">Lantai</option>
                                
                            </select>
                    </div>
                </div>
                
                
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Urutan (Kiri ke Kanan)</label>
                    <div class="col-sm-10">
                        
                        <input type="text" class="form-control" name="urutan" value="<?= $data_koleksi['urutan']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Usia Benda</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="usia" value="<?= $data_koleksi['usia']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Harga Perolehan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="harga" value="<?= $data_koleksi['harga']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Nilai Wajar Benda</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="harga_wajar" value="<?= $data_koleksi['harga_wajar']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Nilai Penggantian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="harga_penggantian" value="<?= $data_koleksi['harga_penggantian']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Usia Benda</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="usia" value="<?= $data_koleksi['usia']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control"  name="keterangan" value="<?= $data_koleksi['keterangan']; ?>"><?= $data_koleksi['keterangan']; ?></textarea>
                        <!-- <input type="text" class="form-control" name="keterangan" value="<?= $data_koleksi['keterangan']; ?>"> -->
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Uraian</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control"  name="uraian" value="<?= $data_koleksi['uraian']; ?>"><?= $data_koleksi['uraian']; ?></textarea>
                        <!-- <input type="text" class="form-control" name="uraian" value="<?= $data_koleksi['uraian']; ?>"> -->
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="foto" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="gambar" name="gambar" onchange="previewImg('gambar')">
                            <label class="custom-file-label" for="customFile">Masukkan Gambar Koleksi</label>
                            <?php if (!empty($data_koleksi['gambar'])): ?>
                                <div class="my-2">
                                    <p>Foto Saat Ini:</p>
                                    <img src="<?= base_url('img/koleksi/' . $data_koleksi['gambar']); ?>" alt="Gambar Koleksi" width="100">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Fotografer</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="fotografer" value="<?= $data_koleksi['fotografer']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Sumber Data</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sumber" value="<?= $data_koleksi['sumber']; ?>">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                            <select class="form-select form-control" type="text" name="status"  value="<?= $data_koleksi['status']; ?>">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih</option>
                                <option <?= $data_koleksi['status'] == 'Valid'? 'selected' : 'Valid' ?> value="Valid">Valid</option>
                                <option <?= $data_koleksi['status'] == 'Valid tbc'? 'selected' : 'Valid tbc' ?> value="Valid tbc">Valid tbc</option>
                                <option <?= $data_koleksi['status'] == 'Anomali'? 'selected' : 'Anomali' ?> value="Anomali">Anomali</option>
                                <option <?= $data_koleksi['status'] == 'Disclaimer'? 'selected' : 'Disclaimer' ?> value="Disclaimer">Disclaimer</option>
                            </select>
                        </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Kode Lembar Kerja</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="kode_lk" value="<?= $data_koleksi['kode_lk']; ?>">
                    </div>
                </div>

                
                
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>


        
       
</div>

<?= $this->endSection(); ?>