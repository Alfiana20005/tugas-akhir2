<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Data Petugas Terdaftar</h1> -->

    <!-- <button class="btn btn-primary mb-3">Tambah data</button> -->
    <?php if (session()->get('level') == 'Admin'): ?>
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahKaryawan" data-bs-whatever="@getbootstrap">Tambah Data</button>
        <?php  if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="modal fade" id="tambahKaryawan" tabindex="-1" aria-labelledby="tambahKaryawan" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="tambahKaryawan">Tambahkan Data Petugas</h4>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <form action="/petugasMuseum" method="post" enctype="multipart/form-data" id="form">
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="nama">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">NIP</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="nip">
                    </div>
                </div>
                
                <div class="row mb-2">
                        <label for="isi" class="col-sm-3 col-form-label">Jabatan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="jabatan" id="" value="<?= old("jabatan"); ?>"></textarea>
                            
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
                                <label class="custom-file-label" for="customFile">Masukkan Foto Anda</label>
                                <?php if (!empty($dataPetugas['foto'])): ?>
                                    <div class="my-2">
                                        <p>Foto Saat Ini:</p>
                                        <img src="<?= base_url('img/semuaPetugas/' . $dataPetugas['foto']); ?>" alt="Foto Petugas" width="100">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                </div>
                

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
            </div>
                </form>
            </div>
            
        </div>
    </div>

    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Semua Petugas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                    <thead >
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Foto</th>
                                            <th style="text-align: center;">Nama</th> 
                                            <th style="text-align: center;">NIP</th>
                                            <!-- <th style="text-align: center;">Tipe Berita</th> -->
                                            
                                            <th style="text-align: center;">Jabatan</th>
                                            
                                            
                                            <th style="text-align: center;">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                        $no=1;
                                        foreach($dataPetugas as $ptgs): ?>  
                                        <tr>
                                            <!-- <td style="text-align: center;">1</td> -->
                                            <!-- <td style="text-align: center;"><img src="" alt="" style="width: 60px;"></td> -->
                                            <td style="text-align: center;"><?= $no++; ?></td>
                                            <td style="text-align: center;"><img src="<?= base_url("img/semuaPetugas/". $ptgs['foto']); ?>" alt="" style="width: 60px;"></td>
                                            
                                            <td style="text-align: center;"><?= $ptgs['nama']; ?></td>
                                            <td style="text-align: center;"><?= $ptgs['nip']; ?></td>
                                            
                                            <td style="text-align: center;"><?= $ptgs['jabatan']; ?></td>
                                            
                                            
                                            <td style="text-align: center;">
                                            
                                                <a  class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editPetugas<?= $ptgs['id_karyawan']; ?>" data-bs-whatever="@getbootstrap">Edit</a>
                                                <form action="/hapusOrganisasi/<?= $ptgs['id_karyawan']; ?>" method="post" class="d-inline">
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
        foreach($dataPetugas as $ptgs): ?> 
    <div class="modal fade" id="editPetugas<?= $ptgs['id_karyawan']; ?>" tabindex="-1" aria-labelledby="editPetugas" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="editPetugas">Edit Karyawan</h4> 
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <form action="<?= base_url()?>updateKaryawan/<?= $ptgs['id_karyawan']; ?>" method="post" enctype="multipart/form-data" id="form">
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="recipient-name" name="nama" value="<?= $ptgs['nama']; ?>">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">NIP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="recipient-name" name="nip" value="<?= $ptgs['nip']; ?>">
                        </div>
                    </div>
                    
                    
                    <div class="row mb-2">
                            <label for="isi" class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="jabatan" id="keterangan"><?= $ptgs['jabatan']; ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 col-form-label">Gambar</label>
                            <div class="col-sm-2">
                                <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview" id="img-preview-<?= $ptgs['id_karyawan']; ?>">
                            </div>
                            <div class="col-sm-7">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="gambar<?= $ptgs['id_karyawan']; ?>" name="foto" onchange="previewImg('gambar<?= $ptgs['id_karyawan']; ?>')">
                                    <label class="custom-file-label" for="customFile">Masukkan Gambar </label>
                                    
                                </div>
                                <?php if (!empty($ptgs['foto'])): ?>
                                        <div class="my-4">
                                            <p>Foto Saat Ini:</p>
                                            <img src="<?= base_url('img/semuaPetugas/' . $ptgs['foto']); ?>" alt="Foto Kegiatan" width="100">
                                        </div>
                                    <?php endif; ?>
                            </div>
                            
                        </div>

                    <div class="modal-footer my-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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