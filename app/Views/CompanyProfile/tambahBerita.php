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
            <form action="/saveBerita" method="post" enctype="multipart/form-data" id="form">
                
                <?= csrf_field() ?>
                <div class="row mb-3">
                        <label  class="col-sm-2 col-form-label">Tipe Berita</label>
                        <div class="col-sm-10">
                            <select class="form-select form-control" type="text" name="type" value="<?= old("type"); ?>">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih Tipe Berita yang akan di masukkan</option>
                                <option <?= old("type") == 'Narasi'? 'selected' : 'Narasi' ?> value="Narasi">Narasi</option>
                                <option <?= old("type") == 'Link'? 'selected' : 'Link' ?> value="Link">Link</option>
                                
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
                    <input type="date" class="form-control"  aria-label="tanggal" name="tanggal" value="<?= old('tanggal'); ?>">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="isi" class="col-sm-2 col-form-label">Isi Berita</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="isi" id="" value="<?= old("isi"); ?>"></textarea>
                        <!-- <input type="text area" class="form-control" name="isi" value="<?= old("isi"); ?>"> -->
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="foto" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview">
                    </div>    
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="foto" name="foto" onchange="previewImg('foto')">
                            <label class="custom-file-label" for="customFile">Masukkan Gambar Koleksi</label>
                            
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>


        
       
</div>



<?= $this->endSection(); ?>