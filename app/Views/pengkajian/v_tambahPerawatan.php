<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

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

    <div class="card shadow mb-4 col-sm-7 mx-auto">
        <div class="card-header py-3 d-sm-flex">
            <h6 class="m-0 font-weight-bold text-primary ">Tambahkan Data Perawatan</h6>
        </div>

        <div class="card-body">
                <form action="<?= base_url("/simpanPerawatan"); ?>" method="post" enctype="multipart/form-data">
                    
                    <?= csrf_field() ?>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-4 col-form-label">Nama Koleksi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control " name="nama" value="<?= $koleksi['nama_inv']; ?>  ">
                        </div>
                    </div>
                    <div class="row mb-3" style="display: none;">
                        <label for="id" class="col-sm-4 col-form-label">Id Koleksi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control " name="id_koleksi" value="<?= $koleksi['id']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputjabatan" class="col-sm-4 col-form-label">Jenis Perawatan</label>
                        <div class="col-sm-8">
                            <select class="form-select form-control" type="text" name="kode_jenisprw" >
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih Jenis Perawatan</option>
                                <option  value="01">Preventif</option>
                                <option  value="02">Kuratif</option>
                                <option  value="03">Restorasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Tanggal Perawatan</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" placeholder="tanggal perawatan" aria-label="tahun" name="tanggal">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="contoh: telah dilakukan..." name="deskripsi" >
                        </div>
                    </div>

                    <!-- Foto Sebelum -->
                    <div class="row mb-3">
                        <label for="foto" class="col-sm-4 col-form-label">Foto Sebelum</label>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control" id="customFile" name="foto_sebelum">
                                <label class="custom-file-label" for="customFile">Masukkan Foto Anda</label>
                            </div>
                        </div>
                    </div>

                    <!-- Foto Sesudah -->
                    <div class="row mb-3">
                        <label for="foto" class="col-sm-4 col-form-label">Foto Sesudah</label>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control" id="customFile" name="foto_sesudah">
                                <label class="custom-file-label" for="customFile">Masukkan Foto Anda</label>
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
