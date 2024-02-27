<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container">
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah Data</h6>
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
            <form action="/updatepetugas/<?= $petugas['id_petugas']; ?>" method="post">
                
                <?= csrf_field() ?>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " name="nama" value="<?= $petugas['nama']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" value="<?= $petugas['username']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="<?= $petugas['email']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" value="<?= $petugas['password']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                        <label for="inputjabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <select class="form-select form-control" type="text" name="level" value="<?= $petugas['level']; ?>">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih jabatan</option>
                                <option <?= $petugas['level'] == 'Kepala Museum'? 'selected' : '' ?> value="1">Kepala Museum</option>
                                <option <?= $petugas['level'] == 'Petugas Pengkajian'? 'selected' : '' ?> value="2">Petugas Pengkajian</option>
                                <option <?= $petugas['level'] == 'Petugas Pelayanan'? 'selected' : '' ?> value="3">Petugas Pelayanan</option>
                                <option <?= $petugas['level'] == 'Ketua Pengkajian'? 'selected' : '' ?> value="4">Ketua Pengkajian</option>
                            </select>
                        </div>
                </div>
                <!-- <div class="row mb-5">
                        <label for="formFileSm" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                        <input class="form-control" id="formFileSm" type="file">
                        </div>
                </div> -->
                
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>


        
       
</div>

<?= $this->endSection(); ?>