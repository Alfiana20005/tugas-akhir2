<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container">
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambahkan Data</h6>
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
                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " name="nip" value="<?= old('nip'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " name="nama" value="<?= old('nama'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" value="<?= old("username"); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="<?= old("email"); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" value="<?= old("password"); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                        <label for="inputjabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <select class="form-select form-control" type="text" name="level" value="<?= old("level"); ?>">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih jabatan</option>
                                <option <?= old("level") == 'Kepala Museum'? 'selected' : 'Kepala Museum' ?> value="Kepala Museum">Kepala Museum</option>
                                <option <?= old("level") == 'Petugas Pengkajian'? 'selected' : 'Petugas Pengkajian' ?> value="Petugas Pengkajian">Petugas Pengkajian</option>
                                <option <?= old("level") == 'Petugas Pelayanan'? 'selected' : 'Petugas Pelayanan' ?> value="Petugas Pelayanan">Petugas Pelayanan</option>
                                <option <?= old("level") == 'Ketua Pengkajian'? 'selected' : 'Ketua Pengkajian' ?> value="Ketua Pengkajian">Ketua Pengkajian</option>
                                <option <?= old("level") == 'Admin'? 'selected' : 'Admin' ?> value="Admin">Admin</option>
                                <option <?= old("level") == 'Admin/Pelayanan'? 'selected' : 'Admin/Pelayanan' ?> value="Admin/Pelayanan">Admin/Pelayanan</option>
                                <option <?= old("level") == 'Admin/Pengkajian'? 'selected' : 'Admin/Pengkajian' ?> value="Admin/Pengkajian">Admin/Pengkajian</option>
                                <option <?= old("level") == 'Perpustakaan'? 'selected' : 'Perpustakaan' ?> value="Perpustakaan">Perpustakaan</option>
                            </select>
                        </div>
                </div>
                <!-- <div class="row mb-3">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="foto">
                            <label class="custom-file-label" for="customFile">Masukkan Foto Anda</label>
                            <?php if (!empty($petugas['foto'])): ?>
                                <div class="my-2">
                                    <p>Foto Saat Ini:</p>
                                    <img src="<?= base_url('img/profile/' . $petugas['foto']); ?>" alt="Foto Petugas" width="100">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div> -->
                
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>


        
       
</div>

<?= $this->endSection(); ?>