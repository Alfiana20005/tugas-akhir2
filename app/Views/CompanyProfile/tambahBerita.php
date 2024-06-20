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
                                
                                <option selected>Pilih Tipe Berita yang akan di masukkan</option>
                                <option <?= old("type") == 'Narasi'? 'selected' : 'Narasi' ?> value="Narasi">Narasi</option>
                                <option <?= old("type") == 'Link'? 'selected' : 'Link' ?> value="Link">Link</option>
                                
                            </select>
                        </div>
                </div>
                <div class="row mb-3">
                        <label  class="col-sm-2 col-form-label">Sifat Berita</label>
                        <div class="col-sm-10">
                            <select class="form-select form-control" type="text" name="kategoriBerita" value="<?= old("kategoriBerita"); ?>">
                                
                                <option selected>Pilih Sifat Berita</option>
                                <option <?= old("kategoriBerita") == 'Regional'? 'selected' : 'Regional' ?> value="Regional">Regional</option>
                                <option <?= old("kategoriBerita") == 'Nasional'? 'selected' : 'Nasional' ?> value="Nasional">Nasional</option>
                                
                            </select>
                        </div>
                </div>
                <!-- <div class="row mb-3">
                        <label  class="col-sm-2 col-form-label">Kategori Berita</label>
                        <div class="col-sm-10">
                            <select class="form-select form-control" type="text" name="kategoriBerita" value="<?= old("kategoriBerita"); ?>">
                                
                                <option selected>Pilih Kategori Berita</option>
                                <option <?= old("kategoriBerita") == 'Regional'? 'selected' : 'Regional' ?> value="Regional">Regional</option>
                                <option <?= old("kategoriBerita") == 'Nasional'? 'selected' : 'Nasional' ?> value="Nasional">Nasional</option>
                                
                            </select>
                        </div>
                </div> -->
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
                            <label class="custom-file-label" for="customFile">Gambar Maksimal 2 Mb</label>
                            
                        </div>
                    </div>
                    <div class="form-check my-4">
                                                    <input class="form-check-input" type="checkbox" id="removeFoto" name="removeFoto" value="1">
                                                    <label class="form-check-label" for="removeFoto">
                                                    Klik apabila tidak membutuhkan gambar
                                                    </label>
                                                </div>
                </div>
                <div class="row mb-3">
                    <label for="isi" class="col-sm-2 col-form-label">Keterangan Gambar</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="ketgambar" id="" value="<?= old("ketgambar"); ?>"></textarea>
                        
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>


        
       
</div>



<?= $this->endSection(); ?>