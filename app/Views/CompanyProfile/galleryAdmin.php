<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Data Petugas Terdaftar</h1> -->

    <!-- <button class="btn btn-primary mb-3">Tambah data</button> -->
    <?php if (session()->get('level') == 'Admin'): ?>
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahKegiatan" data-bs-whatever="@getbootstrap">Tambah Gallery</button>
        <?php  if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="modal fade" id="tambahKegiatan" tabindex="-1" aria-labelledby="tambahKegiatan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title fs-5" id="tambahKegiatan">Tambahkan Gallery</h4>
            
        </div>
        <div class="modal-body">
            <form action="/saveGallery" method="post" enctype="multipart/form-data" id="form">
            <div class="row mb-2">
                <label for="nama" class="col-sm-3 col-form-label">Judul</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="recipient-name" name="judul">
                </div>
            </div>
            
            <div class="row mb-2">
                <label for="message-text" class="col-sm-3 col-form-label">Deskripsi:</label>
                <div class="col-sm-9">
                <textarea class="form-control" id="message-text" name="deskripsi"></textarea>
                </div>
            </div>
            
            <div class="row mb-2">
                <label for="foto" class="col-sm-3 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-7">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="gambar" name="foto" onchange="previewImg('gambar')">
                            <label class="custom-file-label" for="customFile">Gambar Maksimal 2 Mb</label>
                            <?php if (!empty($gallery['foto'])): ?>
                                <div class="my-2">
                                    <p>Foto Saat Ini:</p>
                                    <img src="<?= base_url('img/galery/' . $gallery['foto']); ?>" alt="Foto Petugas" width="100">
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
                            <h6 class="m-0 font-weight-bold text-primary">Data Gallery  </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                    <thead >
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Gambar</th>
                                            <th style="text-align: center;">Judul</th>

                                            <th style="text-align: center;">Deskripsi</th>
        
                                            <th style="text-align: center;">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody >
                                    <?php 
                                        $no=1;
                                        foreach($gallery as $g): ?>  
                                        <tr>
                                            <!-- <td style="text-align: center;">1</td> -->
                                            <!-- <td style="text-align: center;"><img src="" alt="" style="width: 60px;"></td> -->
                                            <td style="text-align: center;"><?= $no++; ?></td>
                                            <td style="text-align: center;"><img src="<?= base_url("img/galery/". $g['foto']); ?>" alt="" style="width: 60px;"></td>
                                            
                                            <td style="text-align: center;"><?= $g['judul']; ?></td>

                                            <td style="text-align: center;"><?= $g['deskripsi']; ?></td>
                                            
                                            <td style="text-align: center;">
                                            
                                                <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editGallery<?= $g['id_gallery']; ?>" data-bs-whatever="@getbootstrap">Edit</a>
                                                <!-- <a href="" class="btn btn-danger" >hapus</a> -->
                                                <form action="/hapusGallery/<?= $g['id_gallery']; ?>" method="post" class="d-inline">
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
    <?php 
        $no=1;
        foreach($gallery as $g): ?> 
    <div class="modal fade" id="editGallery<?= $g['id_gallery']; ?>" tabindex="-1" aria-labelledby="editGallery" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="editGallery">Edit Gallery</h4>
                
            </div>
            <div class="modal-body">
                <form action="updateGallery/<?= $g['id_gallery']; ?>" method="post" enctype="multipart/form-data" id="form">
                <div class="row mb-2">
                    <label for="nama" class="col-sm-3 col-form-label">Judul</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="judul" value="<?= $g['judul']; ?>">
                    </div>
                </div>
                
                <div class="row mb-2">
                    <label for="message-text" class="col-sm-3 col-form-label">Deskripsi:</label>
                    <div class="col-sm-9">
                    <textarea class="form-control" id="message-text" name="deskripsi" > <?= $g['deskripsi']; ?></textarea>
                    </div>
                </div>
                
                <div class="row mb-2">
                            <label class="col-sm-3 col-form-label">Gambar</label>
                            <div class="col-sm-2">
                                <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview" id="img-preview-<?= $g['id_gallery']; ?>">
                            </div>
                            <div class="col-sm-7">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="gambar<?= $g['id_gallery']; ?>" name="foto" onchange="previewImg('gambar<?= $g['id_gallery']; ?>')">
                                    <label class="custom-file-label" for="customFile">Gambar Maksimal 2 Mb</label>
                                    
                                </div>
                                <?php if (!empty($g['foto'])): ?>
                                        <div class="my-4">
                                            <p>Foto Saat Ini:</p>
                                            <img src="<?= base_url('img/galery/' . $g['foto']); ?>" alt="Foto Kegiatan" width="100">
                                        </div>
                                    <?php endif; ?>
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
    <?php endforeach; ?>
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