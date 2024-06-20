<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Data Petugas Terdaftar</h1> -->

    <!-- <button class="btn btn-primary mb-3">Tambah data</button> -->
    <?php if (session()->get('level') == 'Perpustakaan'): ?>
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahKegiatan" data-bs-whatever="@getbootstrap">Tambah Data</button>
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
                <h4 class="modal-title fs-5" id="tambahKegiatan">Tambahkan Data Buku</h4>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <form action="/saveDataBuku" method="post" enctype="multipart/form-data" id="form">
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Kode</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="kode">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Judul</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="judul">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Pengarang</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="pengarang">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Penerbit</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="penerbit">
                    </div>
                </div>
                
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Tempat Terbit</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="tempatTerbit">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Tahun Terbit</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="tahunTerbit">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Rak</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="rak">
                    </div>
                </div>
                
                
                <div class="row mb-2">
                    <label for="" class="col-sm-3 col-form-label">Kategori Buku</label>
                    <div class="col-sm-9">
                        <select class="form-select form-control" type="text" name="kategoriBuku"  value="<?= old('kategoriBuku'); ?>">
                                    <!-- harus sesuai dengan urutan enum pada database -->
                            <option selected>Pilih </option>
                            <option <?= old("kategoriBuku") == 'Ilmu Filsafat'? 'selected' : 'Ilmu Filsafat' ?> value="Ilmu Filsafat">Ilmu Filsafat</option>
                            <option <?= old("kategoriBuku") == 'Ilmu Agama'? 'selected' : 'Ilmu Agama' ?> value="Ilmu Agama">Ilmu Agama</option>
                            <option <?= old("kategoriBuku") == 'Ilmu Bahasa'? 'selected' : 'Ilmu Bahasa' ?> value="Ilmu Bahasa">Ilmu Bahasa</option>
                            <option <?= old("kategoriBuku") == 'Ilmu Sosial'? 'selected' : 'Ilmu Sosial' ?> value="Ilmu Sosial">Ilmu Sosial</option>
                            <option <?= old("kategoriBuku") == 'Ilmu Murni/Pasti'? 'selected' : 'Ilmu Murni/Pasti' ?> value="Ilmu Murni/Pasti">Ilmu Murni/Pasti</option>
                            <option <?= old("kategoriBuku") == 'Teknologi'? 'selected' : 'Teknologi' ?> value="Teknologi">Teknologi</option>
                            <option <?= old("kategoriBuku") == 'Kesenian'? 'selected' : 'Kesenian' ?> value="Kesenian">Kesenian</option>
                            <option <?= old("kategoriBuku") == 'Sejarah/Geografi'? 'selected' : 'Sejarah/Geografi' ?> value="Sejarah/Geografi">Sejarah/Geografi</option>
                            <option <?= old("kategoriBuku") == 'Kesusastraan'? 'selected' : 'Kesusastraan' ?> value="Kesusastraan">Kesusastraan</option>
                            <option <?= old("kategoriBuku") == 'Lainnya'? 'selected' : 'Lainnya' ?> value="Lainnya">Lainnya</option>

                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Eksemplar</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="eksemplar">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="" class="col-sm-3 col-form-label">OPAC</label>
                    <div class="col-sm-9">
                        <select class="form-select form-control" type="text" name="tampilkan"  value="<?= old('tampilkan'); ?>">
                                    <!-- harus sesuai dengan urutan enum pada database -->
                            <option selected>Pilih Status </option>
                            <option <?= old("tampilkan") == 'Tampilkan Buku'? 'selected' : 'Tampilkan Buku' ?> value="Tampilkan Buku">Tampilkan Buku</option>
                            <option <?= old("tampilkan") == 'Sembunyikan'? 'selected' : 'Sembunyikan' ?> value="Sembunyikan">Sembunyikan</option>
                            
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <select class="form-select form-control" type="text" name="status"  value="<?= old('status'); ?>">
                                    <!-- harus sesuai dengan urutan enum pada database -->
                            <option selected>Pilih Status </option>
                            <option <?= old("status") == 'Boleh Dipinjam'? 'selected' : 'Boleh Dipinjam' ?> value="Boleh Dipinjam">Boleh Dipinjam</option>
                            <option <?= old("status") == 'Belum Bisa Dipinjam'? 'selected' : 'Belum Bisa Dipinjam' ?> value="Belum Bisa Dipinjam">Belum Bisa Dipinjam</option>
                            
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                        <label for="isi" class="col-sm-3 col-form-label">keterangan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="keterangan" id="" value="<?= old("keterangan"); ?>"></textarea> 
                        </div>
                    </div>
                <div class="row mb-2">
                    <label for="foto" class="col-sm-3 col-form-label">Sampul Buku</label>
                        <div class="col-sm-2">
                            <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-7">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control" id="gambar" name="foto" onchange="previewImg('gambar')">
                                <label class="custom-file-label" for="customFile">Gambar Maksimal 2 Mb</label>
                                <?php if (!empty($data_buku['foto'])): ?>
                                    <div class="my-2">
                                        <p>Foto Saat Ini:</p>
                                        <img src="<?= base_url('img/perpustakaan/' . $data_buku['foto']); ?>" alt="Foto Petugas" width="100">
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
                            <h6 class="m-0 font-weight-bold text-primary">Data Buku</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                    <thead >
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Kode</th>
                                            <th style="text-align: center;">Sampul</th>
                                            <th style="text-align: center;">Judul</th> 
                                            <th style="text-align: center;">Pengarang</th>
                                            <th style="text-align: center;">Penerbit</th>

                                            
                                            <th style="text-align: center;">Tempat Terbit</th>
                                            <th style="text-align: center;">Tahun Terbit</th>
                                            <th style="text-align: center;">Eksemplar</th>
                                            <th style="text-align: center;">Kategori Buku</th>
                                            <th style="text-align: center;">Lokasi Penyimpanan</th>
                                            <th style="text-align: center;">Status</th>
                                            <th style="text-align: center;">Keterangan</th>
                                           
                                            <th style="text-align: center;">OPAC</th>                                           
                                            <th style="text-align: center;">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody >
                                    <?php 
                                        $no=1;
                                        foreach($data_buku as $buku): ?>  
                                        <tr>
                                            <!-- <td style="text-align: center;">1</td> -->
                                            <!-- <td style="text-align: center;"><img src="" alt="" style="width: 60px;"></td> -->
                                            <td style="text-align: center;"><?= $no++; ?></td>
                                            <td style="text-align: center;"><?= $buku['kode']; ?></td>
                                            <td style="text-align: center;"><img src="<?= base_url("img/perpustakaan/". $buku['foto']); ?>" alt="" style="width: 60px;"></td>
                                            
                                            <td style="text-align: center;"><?= $buku['judul']; ?></td>
                                            <td style="text-align: center;"><?= $buku['pengarang']; ?></td>
                                            
                                            <td style="text-align: center;"><?= $buku['penerbit']; ?></td>
                                            <td style="text-align: center;"><?= $buku['tempatTerbit']; ?></td>
                                            <td style="text-align: center;"><?= $buku['tahunTerbit']; ?></td>
                                            
                                            <td style="text-align: center;"><?= $buku['eksemplar']; ?></td>
                                            <td style="text-align: center;"><?= $buku['kategoriBuku']; ?></td>
                                            <td style="text-align: center;"><?= $buku['rak']; ?></td>
                                            <td style="text-align: center;"><?= $buku['status']; ?></td>
                                            <td style="text-align: center;"><?= $buku['keterangan']; ?></td>
                                            <td style="text-align: center;"><?= $buku['tampilkan']; ?></td>
                                            <td style="text-align: center;">
                                            
                                                <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editKegiatan<?= $buku['id_buku']; ?>" data-bs-whatever="@getbootstrap">Edit</a>
                                                <!-- <a href="" class="btn btn-danger" >hapus</a> -->
                                                <form action="/deleteBuku/<?= $buku['id_buku']; ?>" method="post" class="d-inline">
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
        foreach($data_buku as $buku): ?> 
    <div class="modal fade" id="editKegiatan<?= $buku['id_buku']; ?>" tabindex="-1" aria-labelledby="editKegiatan" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="editKegiatan">Edit Data Buku</h4> 
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <form action="<?= base_url()?>updateKegiatan/<?= $buku['id_buku']; ?>" method="post" enctype="multipart/form-data" id="form">
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">Judul</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="recipient-name" name="judul" value="<?= $buku['judul']; ?>">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">Pengarang</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="recipient-name" name="pengarang" value="<?= $buku['pengarang']; ?>">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">Penerbit</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="recipient-name" name="penerbit" value="<?= $buku['penerbit']; ?>">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">Tempat Terbit</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="recipient-name" name="tempatTerbit" value="<?= $buku['tempatTerbit']; ?>">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">Tahun Terbit</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="recipient-name" name="tahunTerbit" value="<?= $buku['tahunTerbit']; ?>">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">Eksemplar</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="recipient-name" name="eksemplar" value="<?= $buku['eksemplar']; ?>">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">Lokasi Penyimpanan</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="recipient-name" name="rak" value="<?= $buku['rak']; ?>">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">Kategori Buku</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="recipient-name" name="kategoriBuku" value="<?= $buku['kategoriBuku']; ?>">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-select form-control" type="text" name="status"  value="<?= $buku['status']; ?>">
                                        <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih </option>
                                <option <?= $buku['status'] == 'Boleh Dipinjam'? 'selected' : 'Boleh Dipinjam' ?> value="Boleh Dipinjam">Boleh Dipinjam</option>
                                <option <?= $buku['status'] == 'Belum Boleh Dipinjam'? 'selected' : 'Belum Boleh Dipinjam' ?> value="Belum Boleh Dipinjam">Belum Boleh Dipinjam</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="recipient-name" name="keterangan" value="<?= $buku['keterangan']; ?>">
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <label for="" class="col-sm-3 col-form-label">OPAC</label>
                        <div class="col-sm-9">
                            <select class="form-select form-control" type="text" name="tampilkan"  value="<?= $buku['tampilkan']; ?>">
                                        <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih </option>
                                <option <?= $buku['tampilkan'] == 'Tampilkan Buku'? 'selected' : 'Tampilkan Buku' ?> value="Tampilkan Buku">Tampilkan Buku</option>
                                <option <?= $buku['tampilkan'] == 'Sembunyikan'? 'selected' : 'Sembunyikan' ?> value="Sembunyikan">Sembunyikan</option>
                                
                            </select>
                        </div>
                    </div>
                    
                        <div class="row mb-2">
                            <label class="col-sm-3 col-form-label">Sampul</label>
                            <div class="col-sm-2">
                                <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview" id="img-preview-<?= $buku['id_buku']; ?>">
                            </div>
                            <div class="col-sm-7">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="gambar<?= $buku['id_buku']; ?>" name="foto" onchange="previewImg('gambar<?= $buku['id_buku']; ?>')">
                                    <label class="custom-file-label" for="customFile">Gambar Maksimal 2 Mb</label>
                                    
                                </div>
                                <?php if (!empty($buku['foto'])): ?>
                                        <div class="my-4">
                                            <p>Foto Saat Ini:</p>
                                            <img src="<?= base_url('img/perpustakaan/' . $buku['foto']); ?>" alt="Foto Kegiatan" width="100">
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