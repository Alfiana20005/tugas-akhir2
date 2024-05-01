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
                    <label for="username" class="col-sm-2 col-form-label">Ukuran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="ukuran" value="<?= $data_koleksi['ukuran']; ?>">
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
                    <label for="email" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="keterangan" value="<?= $data_koleksi['keterangan']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Uraian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="uraian" value="<?= $data_koleksi['uraian']; ?>">
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

                
                
                <!-- <div class="row mb-5">
                        <label for="formFileSm" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                        <input class="form-control" id="formFileSm" type="file">
                        </div>
                </div> -->
                
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>


        
       
</div>

<?= $this->endSection(); ?>