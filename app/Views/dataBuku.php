<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">


    <!-- <button class="btn btn-primary mb-3">Tambah data</button> -->
    <?php if (session()->get('level') == 'Perpustakaan'): ?>
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahKegiatan" data-bs-whatever="@getbootstrap">Tambah Data</button>
        <?php if (session()->getFlashdata('pesan')): ?>
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
                                <select class="form-select form-control" type="text" name="kategoriBuku" value="<?= old('kategoriBuku'); ?>">
                                    <!-- harus sesuai dengan urutan enum pada database -->
                                    <option selected>Pilih </option>
                                    <option <?= old("kategoriBuku") == 'Ilmu Filsafat' ? 'selected' : 'Ilmu Filsafat' ?> value="Ilmu Filsafat">Ilmu Filsafat</option>
                                    <option <?= old("kategoriBuku") == 'Ilmu Agama' ? 'selected' : 'Ilmu Agama' ?> value="Ilmu Agama">Ilmu Agama</option>
                                    <option <?= old("kategoriBuku") == 'Ilmu Bahasa' ? 'selected' : 'Ilmu Bahasa' ?> value="Ilmu Bahasa">Ilmu Bahasa</option>
                                    <option <?= old("kategoriBuku") == 'Ilmu Sosial' ? 'selected' : 'Ilmu Sosial' ?> value="Ilmu Sosial">Ilmu Sosial</option>
                                    <option <?= old("kategoriBuku") == 'Ilmu Murni/Pasti' ? 'selected' : 'Ilmu Murni/Pasti' ?> value="Ilmu Murni/Pasti">Ilmu Murni/Pasti</option>
                                    <option <?= old("kategoriBuku") == 'Teknologi' ? 'selected' : 'Teknologi' ?> value="Teknologi">Teknologi</option>
                                    <option <?= old("kategoriBuku") == 'Kesenian' ? 'selected' : 'Kesenian' ?> value="Kesenian">Kesenian</option>
                                    <option <?= old("kategoriBuku") == 'Sejarah/Geografi' ? 'selected' : 'Sejarah/Geografi' ?> value="Sejarah/Geografi">Sejarah/Geografi</option>
                                    <option <?= old("kategoriBuku") == 'Kesusastraan' ? 'selected' : 'Kesusastraan' ?> value="Kesusastraan">Kesusastraan</option>
                                    <option <?= old("kategoriBuku") == 'Koleksi NTB' ? 'selected' : 'Koleksi NTB' ?> value="Koleksi NTB">Koleksi NTB</option>
                                    <option <?= old("kategoriBuku") == 'Koleksi NTB' ? 'selected' : 'Koleksi NTB' ?> value="Koleksi NTB">Majalah</option>
                                    <option <?= old("kategoriBuku") == 'Koleksi NTB' ? 'selected' : 'Koleksi NTB' ?> value="Koleksi NTB">Koran</option>
                                    <option <?= old("kategoriBuku") == 'Lainnya' ? 'selected' : 'Lainnya' ?> value="Lainnya">Lainnya</option>

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
                                <select class="form-select form-control" type="text" name="tampilkan" value="<?= old('tampilkan'); ?>">
                                    <!-- harus sesuai dengan urutan enum pada database -->
                                    <option selected>Pilih </option>
                                    <option <?= old("tampilkan") == 'Tampilkan Sebagai Buku Rekomendasi' ? 'selected' : 'Tampilkan Sebagai Buku Rekomendasi' ?> value="Tampilkan Sebagai Buku Rekomendasi">Tampilkan Sebagai Buku Rekomendasi</option>
                                    <option <?= old("tampilkan") == 'Tampilkan Sebagai Buku Favorit' ? 'selected' : 'Tampilkan Sebagai Buku Favorit' ?> value="Tampilkan Sebagai Buku Favorit">Tampilkan Sebagai Buku Favorit</option>
                                    <option <?= old("tampilkan") == 'Tampilkan Sebagai Katalog' ? 'selected' : 'Tampilkan Sebagai Katalog' ?> value="Tampilkan Sebagai Katalog">Tampilkan Sebagai Katalog</option>

                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-select form-control" type="text" name="status" value="<?= old('status'); ?>">
                                    <!-- harus sesuai dengan urutan enum pada database -->
                                    <option selected>Pilih Status </option>
                                    <option <?= old("status") == 'Boleh Dipinjam' ? 'selected' : 'Boleh Dipinjam' ?> value="Boleh Dipinjam">Boleh Dipinjam</option>
                                    <option <?= old("status") == 'Belum Bisa Dipinjam' ? 'selected' : 'Belum Bisa Dipinjam' ?> value="Belum Bisa Dipinjam">Belum Bisa Dipinjam</option>

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

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Buku</h6>
        </div>

        <div class="card-body">
            <form action="" method="get" autocomplete="off">
                <div class="row mb-4">
                    <!-- Filter dropdowns moved to the left -->
                    <div class="col-md-10 mb-2">
                        <div class="row">
                            <div class="col-md-2 mb-2">
                                <select name="pengarang" class="form-control" onchange="this.form.submit()">
                                    <option value="">Pengarang</option>
                                    <?php foreach ($pengarang_list as $p):
                                        $selected = ($filters['pengarang'] ?? '') == $p['pengarang'] ? 'selected' : '';
                                    ?>
                                        <option value="<?= $p['pengarang']; ?>" <?= $selected; ?>><?= $p['pengarang']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-2 mb-2">
                                <select name="penerbit" class="form-control" onchange="this.form.submit()">
                                    <option value="">Penerbit</option>
                                    <?php foreach ($penerbit_list as $p):
                                        $selected = ($filters['penerbit'] ?? '') == $p['penerbit'] ? 'selected' : '';
                                    ?>
                                        <option value="<?= $p['penerbit']; ?>" <?= $selected; ?>><?= $p['penerbit']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-2 mb-2">
                                <select name="tempatTerbit" class="form-control" onchange="this.form.submit()">
                                    <option value="">Tempat Terbit</option>
                                    <?php foreach ($tempatTerbit_list as $t):
                                        $selected = ($filters['tempatTerbit'] ?? '') == $t['tempatTerbit'] ? 'selected' : '';
                                    ?>
                                        <option value="<?= $t['tempatTerbit']; ?>" <?= $selected; ?>><?= $t['tempatTerbit']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-2 mb-2">
                                <select name="tahunTerbit" class="form-control" onchange="this.form.submit()">
                                    <option value="">Tahun Terbit</option>
                                    <?php foreach ($tahunTerbit_list as $t):
                                        $selected = ($filters['tahunTerbit'] ?? '') == $t['tahunTerbit'] ? 'selected' : '';
                                    ?>
                                        <option value="<?= $t['tahunTerbit']; ?>" <?= $selected; ?>><?= $t['tahunTerbit']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-2 mb-2">
                                <select name="kategoriBuku" class="form-control" onchange="this.form.submit()">
                                    <option value="">Kategori</option>
                                    <?php foreach ($kategoriBuku_list as $k):
                                        $selected = ($filters['kategoriBuku'] ?? '') == $k['kategoriBuku'] ? 'selected' : '';
                                    ?>
                                        <option value="<?= $k['kategoriBuku']; ?>" <?= $selected; ?>><?= $k['kategoriBuku']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-2 mb-2">
                                <select name="status" class="form-control" onchange="this.form.submit()">
                                    <option value="">Status</option>
                                    <?php foreach ($status_list as $s):
                                        $selected = ($filters['status'] ?? '') == $s['status'] ? 'selected' : '';
                                    ?>
                                        <option value="<?= $s['status']; ?>" <?= $selected; ?>><?= $s['status']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Search input moved to the right -->
                    <div class="col-md-2 mb-2">
                        <div class="d-flex">
                            <input type="text" name="keyword" class="form-control form-control-sm mr-2" placeholder="search" value="<?= $filters['keyword'] ?? ''; ?>">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- The rest of your table code remains the same -->
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <!-- Table header and body remain unchanged -->
                    <thead>
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
                    <tbody>
                        <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $no = 1 + (15 * ($page - 1));

                        foreach ($data_buku as $buku): ?>
                            <tr>
                                <td style="text-align: center;"><?= $no++; ?></td>
                                <td style="text-align: center;"><?= $buku['kode']; ?></td>
                                <td style="text-align: center;"><img src="<?= base_url("img/perpustakaan/" . $buku['foto']); ?>" alt="" style="width: 60px;" loading="lazy"></td>
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
                                    <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editBuku<?= $buku['id_buku']; ?>" data-bs-whatever="@getbootstrap">Edit</a>
                                    <form action="deleteBuku/<?= $buku['id_buku']; ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin?');">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('default', 'pagination'); ?>
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