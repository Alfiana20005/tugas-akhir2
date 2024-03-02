<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container">
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambahkan Data Perawatan</h6>
        </div>

        <div class="card-body">
            <!-- <div class="row mb-3 alert alert-danger" role="alert">
                 simple danger alert—check it out!
            </div> -->
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
            <form action="" method="post">
                
                <?= csrf_field() ?>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nama Koleksi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " name="nama" value="">
                    </div>
                </div>
                <div class="row mb-3">
                        <label for="inputjabatan" class="col-sm-2 col-form-label">Jenis Perawatan</label>
                        <div class="col-sm-10">
                            <select class="form-select form-control" type="text" name="jenis" >
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih Jenis Perawatan</option>
                                <option  value="1">Preventif</option>
                                <option  value="2">Kuratif</option>
                                <option  value="3">Restorasi</option>
                            </select>
                        </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tanggal Perawatan</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" placeholder="tanggal perawatan" aria-label="tahun" name="tanggal">
                        <!-- <input type="text" class="form-control" name="tanggal" > -->
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="deskripsi" >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="foto" class="col-sm-2 col-form-label">Foto Sebelum</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="fotoSebelum">
                            <label class="custom-file-label" for="customFile">Masukkan Foto Anda</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="foto" class="col-sm-2 col-form-label">Foto Sesudah</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="fotoSesudah">
                            <label class="custom-file-label" for="customFile">Masukkan Foto Anda</label>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>


        
       
</div>

<?= $this->endSection(); ?>