<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container">
    
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
                    
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambahkan Data Inventaris Koleksi</h6>
        </div>

        
        <div class="card-body p-7">
            <!-- <div class="row mb-3 alert alert-danger" role="alert">
                 simple danger alert—check it out!
            </div> -->
                <div class="row">
                    <div class="col-sm-2"></div>
                    <!--  -->
                    
                </div>
            <form action="/saveData" method="post" enctype="multipart/form-data">
                
                <?= csrf_field() ?>
                                
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">No Registrasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="no_registrasi" value="<?= old('no_registrasi'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">No Inventaris</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="no_inventaris" value="<?= old('no_inventaris'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                        <label for="inputjabatan" class="col-sm-2 col-form-label">Kode Inventaris</label>
                        <div class="col-sm-10">
                            <select class="form-select form-control" type="text" name="kode_kategori" value="<?= old('kode_kategori'); ?>">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih Kode Inventaris</option>
                                <option  value="01">01 (Geologika)</option>
                                <option  value="02">02 (Biologika)</option>
                                <option  value="03">03 (Etnografika)</option>
                                <option  value="04">04 (Arkeologika)</option>
                                <option  value="05">05 (Historika)</option>
                                <option  value="06">06 (Numismatika)</option>
                                <option  value="07">07 (Filologika)</option>
                                <option  value="08">08 (Keramologika)</option>
                                <option  value="09">09 (Seni Rupa)</option>
                                <option  value="10">10 (Teknologika)</option>
                                <option  value="11">11 (Lain-lain)</option>
                            </select>
                        </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nama Benda</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " name="nama_inv" value="<?= old('nama_inv'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Ukuran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="ukuran" value="<?= old('ukuran'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Tempat dibuat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tempat_buat" value="<?= old('tempat_buat'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Tempat didapat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tempat_dapat" value="<?= old('tempat_dapat'); ?>">
                    </div>
                </div>                
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Cara didapat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="cara_dapat" value="<?= old('cara_dapat'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control"  aria-label="tahun" name="tgl_masuk" value="<?= old('tgl_masuk'); ?>">
                        <!-- <input type="text" class="form-control" name="tanggal" > -->
                    
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Keadaan Benda</label>
                    <div class="col-sm-10">
                            <select class="form-select form-control" type="text" name="keadaan"  value="<?= old('keadaan'); ?>">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih Keadaan Koleksi</option>
                                <option  value="1">Baik</option>
                                <option  value="2">Rusak Ringan</option>
                                <option  value="3">Rusak Sedang</option>
                                <option  value="3">Rusak Berat</option>
                            </select>
                        </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="lokasi" value="<?= old('lokasi'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="keterangan" value="<?= old('keterangan'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Uraian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="uraian" value="<?= old('uraian'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="foto" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="gambar">
                            <label class="custom-file-label" for="customFile">Masukkan Gambar Koleksi</label>
                            
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