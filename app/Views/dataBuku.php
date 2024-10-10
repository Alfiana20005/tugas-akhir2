<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container-fluid">


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
                            <option <?= old("kategoriBuku") == 'Koleksi NTB'? 'selected' : 'Koleksi NTB' ?> value="Koleksi NTB">Koleksi NTB</option>
                            <option <?= old("kategoriBuku") == 'Koleksi NTB'? 'selected' : 'Koleksi NTB' ?> value="Koleksi NTB">Majalah</option>
                            <option <?= old("kategoriBuku") == 'Koleksi NTB'? 'selected' : 'Koleksi NTB' ?> value="Koleksi NTB">Koran</option>
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
                            <option selected>Pilih  </option>
                            <option <?= old("tampilkan") == 'Tampilkan Sebagai Buku Rekomendasi'? 'selected' : 'Tampilkan Sebagai Buku Rekomendasi' ?> value="Tampilkan Sebagai Buku Rekomendasi">Tampilkan Sebagai Buku Rekomendasi</option>
                            <option <?= old("tampilkan") == 'Tampilkan Sebagai Buku Favorit'? 'selected' : 'Tampilkan Sebagai Buku Favorit' ?> value="Tampilkan Sebagai Buku Favorit">Tampilkan Sebagai Buku Favorit</option>
                            <option <?= old("tampilkan") == 'Tampilkan Sebagai Katalog'? 'selected' : 'Tampilkan Sebagai Katalog' ?> value="Tampilkan Sebagai Katalog">Tampilkan Sebagai Katalog</option>
                            
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




    
</div>

<?php 
        $no=1;
        foreach($data_buku as $buku): ?> 
        <div class="modal fade" id="editBuku<?= $buku['id_buku']; ?>" tabindex="-1" aria-labelledby="editBuku" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fs-5" id="editBuku">Edit Data Buku</h4> 
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url()?>updateBuku/<?= $buku['id_buku']; ?>" method="post" enctype="multipart/form-data" id="form">
                            <div class="row mb-2">
                                <label for="email" class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="recipient-name" name="judul" value="<?= $buku['judul']; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="email" class="col-sm-3 col-form-label">Pengarang</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="recipient-name" name="pengarang" value="<?= $buku['pengarang']; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="email" class="col-sm-3 col-form-label">Penerbit</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="recipient-name" name="penerbit" value="<?= $buku['penerbit']; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="email" class="col-sm-3 col-form-label">Tempat Terbit</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="recipient-name" name="tempatTerbit" value="<?= $buku['tempatTerbit']; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="email" class="col-sm-3 col-form-label">Tahun Terbit</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="recipient-name" name="tahunTerbit" value="<?= $buku['tahunTerbit']; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="email" class="col-sm-3 col-form-label">Eksemplar</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="recipient-name" name="eksemplar" value="<?= $buku['eksemplar']; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="email" class="col-sm-3 col-form-label">Lokasi Penyimpanan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="recipient-name" name="rak" value="<?= $buku['rak']; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="" class="col-sm-3 col-form-label">Kategori Buku</label>
                                <div class="col-sm-9">
                                    <select class="form-select form-control" type="text" name="kategoriBuku"  value="<?= $buku['kategoriBuku']; ?>">
                                                <!-- harus sesuai dengan urutan enum pada database -->
                                        <option selected>Pilih Kategori</option>
                                        <option <?= $buku['kategoriBuku'] == 'Ilmu Filsafat'? 'selected' : 'Ilmu Filsafat' ?> value="Ilmu Filsafat">Ilmu Filsafat</option>
                                        <option <?= $buku['kategoriBuku'] == 'Ilmu Agama'? 'selected' : 'Ilmu Agama' ?> value="Ilmu Agama">Ilmu Agama</option>
                                        <option <?= $buku['kategoriBuku'] == 'Ilmu Bahasa'? 'selected' : 'Ilmu Bahasa' ?> value="Ilmu Bahasa">Ilmu Bahasa</option>
                                        <option <?= $buku['kategoriBuku'] == 'Ilmu Sosial'? 'selected' : 'Ilmu Sosial' ?> value="Ilmu Sosial">Ilmu Sosial</option>
                                        <option <?= $buku['kategoriBuku'] == 'Ilmu Murni/Pasti'? 'selected' : 'Ilmu Murni/Pasti' ?> value="Ilmu Murni/Pasti">Ilmu Murni/Pasti</option>
                                        <option <?= $buku['kategoriBuku'] == 'Teknologi'? 'selected' : 'Teknologi' ?> value="Teknologi">Teknologi</option>
                                        <option <?= $buku['kategoriBuku'] == 'Kesenian'? 'selected' : 'Kesenian' ?> value="Kesenian">Kesenian</option>
                                        <option <?= $buku['kategoriBuku'] == 'Sejarah/Geografi'? 'selected' : 'Sejarah/Geografi' ?> value="Sejarah/Geografi">Sejarah/Geografi</option>
                                        <option <?= $buku['kategoriBuku'] == 'Kesusastraan'? 'selected' : 'Kesusastraan' ?> value="Kesusastraan">Kesusastraan</option>
                                        <option <?= $buku['kategoriBuku'] == 'Koleksi NTB'? 'selected' : 'Koleksi NTB' ?> value="Koleksi NTB">Koleksi NTB</option>
                                        
                                        <option <?= $buku['kategoriBuku'] == 'Lainnya'? 'selected' : 'Lainnya' ?> value="Lainnya">Lainnya</option>
                                        
                                    </select>
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
                                    <input type="text" class="form-control" id="recipient-name" name="keterangan" value="<?= $buku['keterangan']; ?>">
                                </div>
                            </div>
                            
                            <div class="row mb-2">
                                <label for="" class="col-sm-3 col-form-label">OPAC</label>
                                <div class="col-sm-9">
                                    <select class="form-select form-control" type="text" name="tampilkan"  value="<?= $buku['tampilkan']; ?>">
                                                <!-- harus sesuai dengan urutan enum pada database -->
                                        <option selected>Pilih </option>
                                        <option <?= $buku['tampilkan'] == 'Tampilkan Sebagai Buku Rekomendasi'? 'selected' : 'Tampilkan Sebagai Buku Rekomendasi' ?> value="Tampilkan Sebagai Buku Rekomendasi">Tampilkan Sebagai Buku Rekomendasi</option>
                                        <option <?= $buku['tampilkan'] == 'Tampilkan Sebagai Buku Favorit'? 'selected' : 'Tampilkan Sebagai Buku Favorit' ?> value="Tampilkan Sebagai Buku Favorit">Tampilkan Sebagai Buku Favorit</option>
                                        <option <?= $buku['tampilkan'] == 'Tampilkan Sebagai Katalog'? 'selected' : 'Tampilkan Sebagai Katalog' ?> value="Tampilkan Sebagai Katalog">Tampilkan Sebagai Katalog</option>
                                        
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

                        </form>
                </div>
                    
                </div>
                
            </div>
        </div>

    <?php endforeach; ?>

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