<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>
<div class="container">
<?php  if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
            
        </div>

        <div class="card-body">
        <div class="card-body p-4">
                        <div class="d-flex text-black">
                        <div class="flex-shrink-0 mx-4">
                            <img src="<?= base_url('/img/profile/'). session()->get('foto'); ?>"
                            alt="Generic placeholder image" class="img-fluid"
                            style="width: 180px; border-radius: 10px;">
                            
                        </div>
                        
                        <div class="flex-grow-1 ms-3">

                            <h5 class="mb-2"><?= session()->get('nama'); ?></h5>
                            <p class="mb-2 pb-1" style="color: #2b2a2a;">NIP: <?= session()->get('nip'); ?></p>
                            <p class="mb-2 pb-1" style="color: #2b2a2a;">Username: <?= session()->get('username'); ?></p>
                            <p class="mb-2 pb-1" style="color: #2b2a2a;">email: <?= session()->get('email'); ?></p>
                            <p class="mb-2 pb-1" style="color: #2b2a2a;">Password: <?= session()->get('password'); ?></p>
                            <p class="mb-2 pb-1" style="color: #2b2a2a;">Jabatan: <?= session()->get('level'); ?></p>

                            <div class="d-flex pt-1">
                                <?php foreach ($data_petugas as $p): ?>
                                    <?php if ($p['id_petugas'] == session()->get('id_petugas')): ?>
                                        <a class="btn btn-primary flex-grow-2" href="/ubahpetugas/<?= $p['id_petugas']; ?>"> Edit Profile</a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        </div>
                    </div>

        </div>
    </div>  
       
</div>
<?= $this->endSection(); ?>