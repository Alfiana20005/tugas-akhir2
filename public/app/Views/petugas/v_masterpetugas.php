<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Data Petugas Terdaftar</h1> -->

    <!-- <button class="btn btn-primary mb-3">Tambah data</button> -->
    <?php if (session()->get('level') == 'Admin'): ?>
        <a class="btn btn-primary mb-3" href="/tambahpetugas" role="button">Tambah Data</a>
        <?php  if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                    <thead >
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Foto</th>
                                            <th style="text-align: center;">Nama</th> 
                                            <th style="text-align: center;">Jabatan</th>
                                            <?php if (session()->get('level') == 'Admin'): ?>
                                            <th style="text-align: center;">Email</th>
                                            <th style="text-align: center;">Username</th>
                                            <th style="text-align: center;">Password</th>
                                            <th style="text-align: center;">Aksi</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    
                                    <tbody >
                                        <?php 
                                        $no=1;
                                    
                                        foreach($data_petugas as $p): ?>
                                        <tr>
                                        <td style="text-align: center;"><?= $no++; ?></td>
                                            <td style="text-align: center;"><img src="<?= base_url('img/profile/' . $p['foto']); ?>" alt="" style="width: 60px;"></td>
                                            <td><?= $p['nama']; ?></td>
                                            <td><?= $p['level']; ?></td>
                                            <?php if (session()->get('level') == 'Admin'): ?>
                                            <td><?= $p['email']; ?></td>
                                            <td><?= $p['username']; ?></td>
                                            <td><?= str_repeat('*', strlen($p['password'])); ?></td>
                                            <td style="text-align: center;">
                                                <a href="/ubahpetugas/<?= $p['id_petugas']; ?>" class="btn btn-success btn-sm" >Edit</a>
                                                <!-- <a href="" class="btn btn-danger" >hapus</a> -->
                                                <form action="/hapuspetugas/<?= $p['id_petugas']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin?');">Hapus</button>
                                                </form>
                                                
                                            </td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
    </div>
</div>

<?= $this->endSection(); ?>