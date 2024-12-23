<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Data Petugas Terdaftar</h1> -->

    <!-- <button class="btn btn-primary mb-3">Tambah data</button> -->
   
    <div class="modal fade" id="tambahKegiatan" tabindex="-1" aria-labelledby="tambahKegiatan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="tambahKegiatan">Data Hak Akses Manuskrip</h4>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <form action="/saveManuskrip" method="post" enctype="multipart/form-data" id="form">
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Judul</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="judul">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="recipient-name" name="tanggal">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">link</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="link">
                    </div>
                </div>
                
                <div class="row mb-2">
                    <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                        <div class="col-sm-2">
                            <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-7">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control" id="gambar" name="foto" onchange="previewImg('gambar')">
                                <label class="custom-file-label" for="customFile">Gambar Maksimal 2 Mb</label>
                                <?php if (!empty($data_publikasi['foto'])): ?>
                                    <div class="my-2">
                                        <p>Foto Saat Ini:</p>
                                        <img src="<?= base_url('img/publikasi/' . $data_publikasi['foto']); ?>" alt="Foto Petugas" width="100">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                </div>
                
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </div>
            </form>
        </div>
        
    </div>
    </div>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Hak Akses User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                    <thead >
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Nama</th>
                                            <th style="text-align: center;">Pekerjaan</th> 
                                            <th style="text-align: center;">Instansi</th> 
                                            <th style="text-align: center;">Whatsapp</th>
                                            <th style="text-align: center;">Email</th>
                                            <th style="text-align: center;">Password</th>
                                            <th style="text-align: center;">Keperluan</th>
                                            
                                            <th style="text-align: center;">Hak Akses</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody >
                                    <?php 
                                        $no=1;
                                        foreach($user as $u): ?>  
                                        <tr>
                                            <!-- <td style="text-align: center;">1</td> -->
                                            <!-- <td style="text-align: center;"><img src="" alt="" style="width: 60px;"></td> -->
                                            <td style="text-align: center;"><?= $no++; ?></td>
                                            <td style="text-align: center;"><?= $u['nama']; ?></td>
                                            <td style="text-align: center;"><?= $u['pekerjaan']; ?></td>
                                            <td style="text-align: center;"><?= $u['instansi']; ?></td>
                                            <td style="text-align: center;"><?= $u['wa']; ?></td>
                                            <td style="text-align: center;"><?= $u['email']; ?></td>
                                            <td style="text-align: center;"><?= $u['password']; ?></td>
                                            <td style="text-align: center;"><?= $u['keperluan']; ?></td>
                                            
                                            <td style="text-align: center;">
                                            
                                                <?php if (session()->get('level') == 'Admin' ): ?> 
                                                    <form action="/acceptedUpdate" method="post">
                                                        <input type="hidden" name="id_user" value="<?= $u['id_user']; ?>">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-sm  btn-<?php echo ($u['accepted'] == 'Diterima') ? 'success' : (($u['accepted'] == 'Menunggu') ? 'warning' : 'danger'); ?> btn-update-status dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <?php echo ($u['accepted'] == 'Diterima') ? 'Diterima' : (($u['accepted'] == 'Menunggu') ? 'Menunggu' : 'Ditolak'); ?>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <button class="dropdown-item status-option" type="submit" name="accepted" value="Diterima">Diterima</button>
                                                                <button class="dropdown-item status-option" type="submit" name="accepted" value="Menunggu">Menunggu</button>
                                                                <button class="dropdown-item status-option" type="submit" name="accepted" value="Ditolak">Ditolak</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                <?php endif; ?>
                                                
                                            </td>

                                        </tr>
                                        <?php endforeach; ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
    </div>


</div>

<script async src="https://cdn.jsdelivr.net/npm/es-module-shims@1/dist/es-module-shims.min.js" crossorigin="anonymous"></script>
    <script type="importmap">
    {
      "imports": {
        "@popperjs/core": "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/esm/popper.min.js",
        "bootstrap": "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.esm.min.js"
      }
    }
    </script>
    <script type="module">
      import * as bootstrap from 'bootstrap'

      new bootstrap.Popover(document.getElementById('popoverButton'))
    </script>

<?= $this->endSection(); ?>