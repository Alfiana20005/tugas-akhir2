<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container">
    
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
            <form action="/save" method="post">
                
                <?= csrf_field() ?>
                <div class="row mb-3 ">
                    <label for="name" class="col-sm-2 col-form-label">No Inventaris</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " name="no_inv" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">No Registrasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " name="no_reg" value="">
                    </div>
                </div>
                <div class="row mb-3">
                        <label for="inputjabatan" class="col-sm-2 col-form-label">Kode Inventaris</label>
                        <div class="col-sm-10">
                            <select class="form-select form-control" type="text" name="kodede" value="">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih Kategori</option>
                                <option  value="1">Arkeologika</option>
                                <option  value="2">Biologika</option>
                                <option  value="3">Etnografika</option>
                                <option  value="4">Filologika</option>
                                <option  value="5">Geologika</option>
                                <option  value="6">Historika</option>
                                <option  value="7">Kramologika</option>
                                <option  value="8">Numismatika</option>
                                <option  value="9">Seni Rupa</option>
                                <option  value="10">Teknologika</option>
                            </select>
                        </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nama Benda</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " name="nama" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Ukuran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="ukuran" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Tempat dibuat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tempatDibuat" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Tempat didapat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tempatDidapat" value="">
                    </div>
                </div>                
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Cara didapat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tempatDidapat" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tempatDidapat" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Keadaan Benda</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tempatDidapat" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tempatDidapat" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tempatDidapat" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Uraian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tempatDidapat" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="foto">
                            <label class="custom-file-label" for="customFile">Masukkan Foto Anda</label>
                            
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