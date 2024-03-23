<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <?php  if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="col alert alert-danger" role="alert">
                                <?= session()->getFlashdata('errors'); ?>
                            </div>
                        <?php endif; ?>
    <div class="card shadow mb-4 col-sm-7 mx-auto">
        <div class="card-header py-3 d-sm-flex">
            <h6 class="m-0 font-weight-bold text-primary ">Tambahkan Jadwal Perawatan</h6>
        </div>

        <div class="card-body">
                <form action="/simpanJadwal" method="post" enctype="multipart/form-data">
                    
                    <?= csrf_field() ?>
                    
                    <div class="row mb-3">
                        <label for="jenis" class="col-sm-3 col-form-label">Jenis Perawatan</label>
                        <div class="col-sm-9">
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
                        <label for="email" class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="deskripsi" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="target" class="col-sm-3 col-form-label">Target</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="target" >
                        </div>
                    </div>   
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Mulai</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" placeholder="mulai" aria-label="tahun" name="mulai">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Berakhir</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" placeholder="berakhir" aria-label="tahun" name="berakhir">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jenis" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-select form-control" type="text" name="status" >
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih Status Jadwal</option>
                                <option  value="Belum Mulai">Belum Mulai</option>
                                <option  value="Sedang Berlangsung">Sedang Berlangsung</option>
                                <option  value="Selesai">Selesai</option>
                            </select>
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
