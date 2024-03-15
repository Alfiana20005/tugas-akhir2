<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container">
<?php  if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex">
            <h6 class="m-0 font-weight-bold text-primary ">Tambahkan Jadwal Perawatan</h6>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    
                </div>
            </div>

            
                <form action="/simpanJadwal" method="post" enctype="multipart/form-data">
                    
                    <?= csrf_field() ?>
                    
                    <div class="row mb-3">
                        <label for="jenis" class="col-sm-2 col-form-label">Jenis Perawatan</label>
                        <div class="col-sm-10">
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
                        <label for="email" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="deskripsi" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="target" class="col-sm-2 col-form-label">Target</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="target" >
                        </div>
                    </div>   
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Mulai</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" placeholder="mulai" aria-label="tahun" name="mulai">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Berakhir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" placeholder="berakhir" aria-label="tahun" name="berakhir">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jenis" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-select form-control" type="text" name="status" >
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih Status Jadwal</option>
                                <option  value="Belum Mulai">Belum Mulai</option>
                                <option  value="Sedang Berlangsung">Sedang Berlangsung</option>
                                <option  value="Selesai">Selesai</option>
                            </select>
                        </div>
                    </div>
                                        
                    <button type="submit" class="btn btn-primary">Simpan Data Perawatan</button>
                </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
