<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Data Petugas Terdaftar</h1> -->

    <!-- <button class="btn btn-primary mb-3">Tambah data</button> -->
    <?php if (session()->get('level') == 'Admin'): ?>
        
        <?php  if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pesan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                    <thead >
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Nama</th>
                                            <th style="text-align: center;">Email</th> 
                                            <th style="text-align: center;">Isi Pesan</th>              
                                            <th style="text-align: center;">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody >
                                    <?php 
                                        $no=1;
                                        foreach($pesan as $p): ?>   
                                        <tr>
                                            <!-- <td style="text-align: center;">1</td> -->
                                            <!-- <td style="text-align: center;"><img src="" alt="" style="width: 60px;"></td> -->
                                            <td style="text-align: center;"><?= $no++; ?></td>
                                           
                                            <td style="text-align: center;"><?= $p['nama']; ?></td>
                                            <td style="text-align: center;"><?= $b['email']; ?></td>
                                            <td style="text-align: center;"><?= $b['pesan']; ?></td>
                                            <td style="text-align: center;">
                                            
                                                
                                                <form action="/hapuspesan/<?= $p['id_pesan']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin?');">Hapus</button>
                                                </form>
                                                
                                            </td>

                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
    </div>
</div>

<?= $this->endSection(); ?>