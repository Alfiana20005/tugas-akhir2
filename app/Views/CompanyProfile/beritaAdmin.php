<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Data Petugas Terdaftar</h1> -->

    <!-- <button class="btn btn-primary mb-3">Tambah data</button> -->
    <?php if (session()->get('level') == 'Admin'): ?>
        <a class="btn btn-primary mb-3" href="/tambahBerita" role="button">Tambah Berita</a>
        <?php  if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Berita</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                    <thead >
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Foto</th>
                                            <th style="text-align: center;">Judul Berita</th> 
                                            <th style="text-align: center;">Narasi</th>
                                            
                                            <th style="text-align: center;">Tanggal</th>
                                            
                                            <th style="text-align: center;">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody >
                                       
                                        <tr>
                                        <td style="text-align: center;">1</td>
                                            <!-- <td style="text-align: center;"><img src="" alt="" style="width: 60px;"></td> -->
                                            <!-- <td>1</td> -->
                                            <td><img src="" alt=""></td>
                                            
                                            <td>judul Berita</td>
                                            <td>narasi</td>
                                            <td>tanggal</td>
                                            <td style="text-align: center;">
                                                <a href="/ubahpetugas/" class="btn btn-success btn-sm" >Edit</a>
                                                <!-- <a href="" class="btn btn-danger" >hapus</a> -->
                                                <form action="/hapuspetugas/" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin?');">Hapus</button>
                                                </form>
                                                
                                            </td>

                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
    </div>
</div>

<?= $this->endSection(); ?>