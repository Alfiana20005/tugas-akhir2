<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container">
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambahkan Berita</h6>
        </div>

        <div class="card-body">
            
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="col alert alert-danger" role="alert">
                                <?= session()->getFlashdata('errors'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                </div>
            <form action="/save" method="post">
                
                <?= csrf_field() ?>
                <div class="row mb-3">
                        <label for="inputjabatan" class="col-sm-2 col-form-label">Tipe Berita</label>
                        <div class="col-sm-10">
                            <select class="form-select form-control" type="text" name="tipe" value="<?= old("tipe"); ?>">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih Tipe Berita yang akan di masukkan</option>
                                <option <?= old("tipe") == '1'? 'selected' : 'narasi' ?> value="1">Narasi</option>
                                <option <?= old("tipe") == '2'? 'selected' : 'link' ?> value="2">Link</option>
                                
                            </select>
                        </div>
                </div>
                <div class="row mb-3">
                    <label for="nip" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " name="judul" value="<?= old('judul'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tanggal" value="<?= old("tanggal"); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Narasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " name="narasi" value="<?= old('narasi'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Link</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="link" value="<?= old("link"); ?>">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="foto">
                            <label class="custom-file-label" for="customFile">Masukkan Foto Anda</label>
                            <!-- <?php if (!empty($petugas['foto'])): ?>
                                <div class="my-2">
                                    <p>Foto Saat Ini:</p>
                                    <img src="<?= base_url('img/profile/' . $petugas['foto']); ?>" alt="Foto Petugas" width="100">
                                </div>
                            <?php endif; ?> -->
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>


        
       
</div>

<?= $this->endSection(); ?>