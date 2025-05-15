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
                                <!-- Alert untuk judul duplikat akan muncul di sini -->
                                <div id="judulAlert" class="alert alert-warning d-none" role="alert">Buku ini sudah ada di rak <span id="rakLocation"></span>
                                </div>
                                <input type="text" class="form-control" id="judul-buku" name="judul">
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
                            <label for="email" class="col-sm-3 col-form-label">Lokasi Buku</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="recipient-name" name="rak">
                            </div>
                        </div>


                        <div class="row mb-2">
                            <label for="" class="col-sm-3 col-form-label">Kategori Buku</label>
                            <div class="col-sm-9">
                                <select class="form-select form-control" type="text" name="kategoriBuku" id="kategoriBuku" value="<?= old('kategoriBuku'); ?>">
                                    <!-- harus sesuai dengan urutan enum pada database -->
                                    <option selected>Pilih </option>
                                    <option <?= old("kategoriBuku") == 'Ilmu Filsafat' ? 'selected' : 'Ilmu Filsafat' ?> value="Ilmu Filsafat">Ilmu Filsafat</option>
                                    <option <?= old("kategoriBuku") == 'Ilmu Agama' ? 'selected' : 'Ilmu Agama' ?> value="Ilmu Agama">Ilmu Agama</option>
                                    <option <?= old("kategoriBuku") == 'Ilmu Bahasa' ? 'selected' : 'Ilmu Bahasa' ?> value="Ilmu Bahasa">Ilmu Bahasa</option>
                                    <option <?= old("kategoriBuku") == 'Ilmu Sosial' ? 'selected' : 'Ilmu Sosial' ?> value="Ilmu Sosial">Ilmu Sosial</option>
                                    <option <?= old("kategoriBuku") == 'Ilmu Murni/Pasti' ? 'selected' : 'Ilmu Murni/Pasti' ?> value="Ilmu Murni/Pasti">Ilmu Murni/Pasti</option>
                                    <option <?= old("kategoriBuku") == 'Kesenian' ? 'selected' : 'Kesenian' ?> value="Kesenian">Kesenian</option>
                                    <option <?= old("kategoriBuku") == 'Sejarah/Geografi' ? 'selected' : 'Sejarah/Geografi' ?> value="Sejarah/Geografi">Sejarah/Geografi</option>
                                    <option <?= old("kategoriBuku") == 'Kesusastraan' ? 'selected' : 'Kesusastraan' ?> value="Kesusastraan">Kesusastraan</option>
                                    <option <?= old("kategoriBuku") == 'Koleksi NTB' ? 'selected' : 'Koleksi NTB' ?> value="Koleksi NTB">Koleksi NTB</option>
                                    <option <?= old("kategoriBuku") == 'Koleksi NTB' ? 'selected' : 'Koleksi NTB' ?> value="Koleksi NTB">Majalah</option>
                                    <option <?= old("kategoriBuku") == 'Koleksi NTB' ? 'selected' : 'Koleksi NTB' ?> value="Koleksi NTB">Koran</option>
                                    <option <?= old("kategoriBuku") == 'Hasil Penelitian' ? 'selected' : 'Hasil Penelitian' ?> value="Hasil Penelitian">Hasil Penelitian</option>
                                    <option <?= old("kategoriBuku") == 'Buku Anak' ? 'selected' : 'Buku Anak' ?> value="Buku Anak">Buku Anak</option>
                                    <option <?= old("kategoriBuku") == 'Arsip' ? 'selected' : 'Arsip' ?> value="Arsip">Arsip</option>
                                    <option <?= old("kategoriBuku") == 'Berkala' ? 'selected' : 'Berkala' ?> value="Berkala">Berkala</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2" id="nomorSeriContainer" style="display: none;">
                            <label for="nomorSeri" class="col-sm-3 col-form-label">Nomor Seri</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nomorSeri" name="nomorSeri">
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
            <button type="button" class="btn btn-info" onclick="printTable()"><i class="fas fa-print"></i> Cetak Data</button>
        </div>

        <div class="card-body">
            <!-- Filter section -->
            <div class="mb-4">
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <select id="filterPengarang" class="form-control">
                            <option value="">Semua Pengarang</option>
                            <?php foreach ($pengarang_list as $p): ?>
                                <option value="<?= $p['pengarang']; ?>"><?= $p['pengarang']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-2 mb-2">
                        <select id="filterPenerbit" class="form-control">
                            <option value="">Semua Penerbit</option>
                            <?php foreach ($penerbit_list as $p): ?>
                                <option value="<?= $p['penerbit']; ?>"><?= $p['penerbit']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-2 mb-2">
                        <select id="filterTempatTerbit" class="form-control">
                            <option value="">Semua Tempat Terbit</option>
                            <?php foreach ($tempatTerbit_list as $t): ?>
                                <option value="<?= $t['tempatTerbit']; ?>"><?= $t['tempatTerbit']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-2 mb-2">
                        <select id="filterTahunTerbit" class="form-control">
                            <option value="">Semua Tahun</option>
                            <?php foreach ($tahunTerbit_list as $t): ?>
                                <option value="<?= $t['tahunTerbit']; ?>"><?= $t['tahunTerbit']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-2 mb-2">
                        <select id="filterKategori" class="form-control">
                            <option value="">Semua Kategori</option>
                            <?php foreach ($kategoriBuku_list as $k): ?>
                                <option value="<?= $k['kategoriBuku']; ?>"><?= $k['kategoriBuku']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-2 mb-2">
                        <select id="filterStatus" class="form-control">
                            <option value="">Semua Status</option>
                            <?php foreach ($status_list as $s): ?>
                                <option value="<?= $s['status']; ?>"><?= $s['status']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 11pt;">
                    <thead style="text-align: center;">
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Sampul</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tempat Terbit</th>
                            <th>Tahun Terbit</th>
                            <th>Eksemplar</th>
                            <th>Nomor Seri</th>
                            <th>Kategori Buku</th>
                            <th>Lokasi Penyimpanan</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>OPAC</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <?php
                        $no = 1;
                        foreach ($data_buku as $buku): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $buku['kode']; ?></td>
                                <td><img src="<?= base_url("img/perpustakaan/" . $buku['foto']); ?>" alt="" style="width: 60px;" loading="lazy"></td>
                                <td><?= $buku['judul']; ?></td>
                                <td><?= $buku['pengarang']; ?></td>
                                <td><?= $buku['penerbit']; ?></td>
                                <td><?= $buku['tempatTerbit']; ?></td>
                                <td><?= $buku['tahunTerbit']; ?></td>
                                <td><?= $buku['eksemplar']; ?></td>
                                <td><?= $buku['nomorSeri'] === null || $buku['nomorSeri'] === '' ? '-' : $buku['nomorSeri']; ?></td>
                                <td><?= $buku['kategoriBuku']; ?></td>
                                <td><?= $buku['rak']; ?></td>
                                <td><?= $buku['status']; ?></td>
                                <td><?= $buku['keterangan']; ?></td>
                                <td><?= $buku['tampilkan']; ?></td>
                                <td>
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
            </div>

            <?php foreach ($data_buku as $buku): ?>
                <!-- Modal Edit Buku -->
                <div class="modal fade" id="editBuku<?= $buku['id_buku']; ?>" tabindex="-1" aria-labelledby="editBukuLabel<?= $buku['id_buku']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editBukuLabel<?= $buku['id_buku']; ?>">Edit Buku</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('updateBuku/' . $buku['id_buku']); ?>" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="kode" class="form-label">Kode Buku</label>
                                            <input type="text" class="form-control" id="kode" name="kode" value="<?= $buku['kode']; ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="judul" class="form-label">Judul Buku</label>
                                            <input type="text" class="form-control" id="judul" name="judul" value="<?= $buku['judul']; ?>" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="pengarang" class="form-label">Pengarang</label>
                                            <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= $buku['pengarang']; ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="penerbit" class="form-label">Penerbit</label>
                                            <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $buku['penerbit']; ?>" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="tempatTerbit" class="form-label">Tempat Terbit</label>
                                            <input type="text" class="form-control" id="tempatTerbit" name="tempatTerbit" value="<?= $buku['tempatTerbit']; ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tahunTerbit" class="form-label">Tahun Terbit</label>
                                            <input type="text" class="form-control" id="tahunTerbit" name="tahunTerbit" value="<?= $buku['tahunTerbit']; ?>" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="eksemplar" class="form-label">Eksemplar</label>
                                            <input type="number" class="form-control" id="eksemplar" name="eksemplar" value="<?= $buku['eksemplar']; ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nomorSeri" class="form-label">Nomor Seri</label>
                                            <input type="text" class="form-control" id="nomorSeri" name="nomorSeri" value="<?= $buku['nomorSeri']; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="kategoriBuku" class="form-label">Kategori Buku</label>
                                            <select class="form-select form-control" id="kategoriBuku" name="kategoriBuku" required>
                                                <option value="Ilmu Filsafat" <?= ($buku['kategoriBuku'] == 'Ilmu Filsafat') ? 'selected' : ''; ?>>Ilmu Filsafat</option>
                                                <option value="Ilmu Agama" <?= ($buku['kategoriBuku'] == 'Ilmu Agama') ? 'selected' : ''; ?>>Ilmu Agama</option>
                                                <option value="Ilmu Bahasa" <?= ($buku['kategoriBuku'] == 'Ilmu Bahasa') ? 'selected' : ''; ?>>Ilmu Bahasa</option>
                                                <option value="Ilmu Sosial" <?= ($buku['kategoriBuku'] == 'Ilmu Sosial') ? 'selected' : ''; ?>>Ilmu Sosial</option>
                                                <option value="Ilmu Murni/Pasti" <?= ($buku['kategoriBuku'] == 'Ilmu Murni/Pasti') ? 'selected' : ''; ?>>Ilmu Murni/Pasti</option>
                                                <option value="Kesenian" <?= ($buku['kategoriBuku'] == 'Kesenian') ? 'selected' : ''; ?>>Kesenian</option>
                                                <option value="Sejarah/Geografi" <?= ($buku['kategoriBuku'] == 'Sejarah/Geografi') ? 'selected' : ''; ?>>Sejarah/Geografi</option>
                                                <option value="Kesusastraan" <?= ($buku['kategoriBuku'] == 'Kesusastraan') ? 'selected' : ''; ?>>Kesusastraan</option>
                                                <option value="Koleksi NTB" <?= ($buku['kategoriBuku'] == 'Koleksi NTB') ? 'selected' : ''; ?>>Koleksi NTB</option>
                                                <option value="Majalah" <?= ($buku['kategoriBuku'] == 'Majalah') ? 'selected' : ''; ?>>Majalah</option>
                                                <option value="Koran" <?= ($buku['kategoriBuku'] == 'Koran') ? 'selected' : ''; ?>>Koran</option>
                                                <option value="Hasil Penelitian" <?= ($buku['kategoriBuku'] == 'Hasil Penelitian') ? 'selected' : ''; ?>>Hasil Penelitian</option>
                                                <option value="Buku Anak" <?= ($buku['kategoriBuku'] == 'Buku Anak') ? 'selected' : ''; ?>>Buku Anak</option>
                                                <option value="Arsip" <?= ($buku['kategoriBuku'] == 'Arsip') ? 'selected' : ''; ?>>Arsip</option>
                                                <option value="Berkala" <?= ($buku['kategoriBuku'] == 'Berkala') ? 'selected' : ''; ?>>Berkala</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="rak" class="form-label">Lokasi Penyimpanan</label>
                                            <input type="text" class="form-control" id="rak" name="rak" value="<?= $buku['rak']; ?>" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select form-control" id="status" name="status" required>
                                                <option value="Tersedia" <?= ($buku['status'] == 'Tersedia') ? 'selected' : ''; ?>>Tersedia</option>
                                                <option value="Dipinjam" <?= ($buku['status'] == 'Dipinjam') ? 'selected' : ''; ?>>Dipinjam</option>
                                                <option value="Dalam Perbaikan" <?= ($buku['status'] == 'Dalam Perbaikan') ? 'selected' : ''; ?>>Dalam Perbaikan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tampilkan" class="form-label">Tampilkan di OPAC</label>
                                            <select class="form-select form-control" id="tampilkan" name="tampilkan" required>
                                                <option value="Ya" <?= ($buku['tampilkan'] == 'Ya') ? 'selected' : ''; ?>>Ya</option>
                                                <option value="Tidak" <?= ($buku['tampilkan'] == 'Tidak') ? 'selected' : ''; ?>>Tidak</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= $buku['keterangan']; ?></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="foto" class="form-label">Sampul Buku</label>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="<?= base_url("img/perpustakaan/" . $buku['foto']); ?>" class="img-thumbnail mb-2" alt="Sampul Buku">
                                            </div>
                                            <div class="col-md-9">
                                                <input type="file" class="form-control" id="foto" name="foto">
                                                <div class="form-text">Upload gambar baru jika ingin mengganti sampul</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Initialize DataTables with custom options -->
<script>
    $(document).ready(function() {
        var table = $('#dataTable').DataTable({
            responsive: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            order: [
                [0, 'asc']
            ],
            columnDefs: [{
                    orderable: false,
                    targets: [2, 14]
                } // Disable sorting for image and action columns
            ]
        });

        // Apply custom filters
        $('#filterPengarang').on('change', function() {
            table.column(4).search(this.value).draw();
        });

        $('#filterPenerbit').on('change', function() {
            table.column(5).search(this.value).draw();
        });

        $('#filterTempatTerbit').on('change', function() {
            table.column(6).search(this.value).draw();
        });

        $('#filterTahunTerbit').on('change', function() {
            table.column(7).search(this.value).draw();
        });

        $('#filterKategori').on('change', function() {
            table.column(9).search(this.value).draw();
        });

        $('#filterStatus').on('change', function() {
            table.column(11).search(this.value).draw();
        });
    });

    $(document).ready(function() {
        $('#tambahKegiatan').on('shown.bs.modal', function() {
            const judulInput = document.getElementById('judul-buku');
            const judulAlert = document.getElementById('judulAlert');
            const rakLocation = document.getElementById('rakLocation');
            const submitBtn = document.querySelector('button[type="submit"]');
            let typingTimer;
            const doneTypingInterval = 500;

            function doneTyping() {
                const judul = judulInput.value.trim();

                if (judul.length > 0) {
                    $.ajax({
                        url: window.location.origin + '/cekJudulBuku',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            judul: judul
                        },
                        success: function(data) {
                            if (data.exists) {
                                // Tampilkan informasi rak
                                if (data.rak) {
                                    rakLocation.textContent = data.rak;
                                } else {
                                    rakLocation.textContent = "tidak diketahui";
                                }
                                judulAlert.classList.remove('d-none');
                            } else {
                                judulAlert.classList.add('d-none');
                                if (submitBtn) submitBtn.disabled = false;
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error checking judul:', error);
                            judulAlert.textContent = 'Error saat memeriksa judul buku.';
                            judulAlert.classList.remove('d-none');
                        }
                    });
                } else {
                    judulAlert.classList.add('d-none');
                    if (submitBtn) submitBtn.disabled = false;
                }
            }

            judulInput.addEventListener('keyup', function() {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(doneTyping, doneTypingInterval);
            });

            judulInput.addEventListener('keydown', function() {
                clearTimeout(typingTimer);
            });
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        // Get the category select element
        const kategoriSelect = document.getElementById('kategoriBuku');
        const nomorSeriContainer = document.getElementById('nomorSeriContainer');

        // Add event listener for changes in the select
        kategoriSelect.addEventListener('change', function() {
            // Check if "Berkala", "Majalah", or "Koran" is selected
            if (this.value === 'Berkala' || this.value === 'Majalah' || this.value === 'Koran') {
                // Show the Nomor Seri field
                nomorSeriContainer.style.display = 'flex';
            } else {
                // Hide the Nomor Seri field
                nomorSeriContainer.style.display = 'none';
            }
        });

        // Check initial value in case of form reload
        if (kategoriSelect.value === 'Berkala' ||
            kategoriSelect.value === 'Majalah' ||
            kategoriSelect.value === 'Koran') {
            nomorSeriContainer.style.display = 'flex';
        }
    });

    function printTable() {
        // Create a new window for printing
        const printWindow = window.open('', '_blank');

        // Get the current date for the report header
        const currentDate = new Date().toLocaleDateString('id-ID');

        // Create the content to be printed
        printWindow.document.write(`
<!DOCTYPE html>
<html>
<head>
    <title>Data Konservasi Preventif</title>
    <style>
        body {
            font-family: Times New Roman, sans-serif;
            margin: 20px;
        }
        h2, h3 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;
        }
        th, td {
            border: 0.5px solid #808080;
            padding: 4px;
            text-align: center;
            font-size: 11px;
            vertical-align: middle;
            word-wrap: break-word; /* Allow words to break */
            white-space: normal; /* Allow text to wrap */
            height: auto; /* Let height adjust to content */
        }
        th {
            background-color: #f2f2f2;
        }
        th:nth-child(1), td:nth-child(1) { width: 5%; } /* No */
        th:nth-child(2), td:nth-child(2) { width: 8%; } /* Kode */
        th:nth-child(3), td:nth-child(3) { width: 15%; } /* Judul */
        th:nth-child(4), td:nth-child(4) { width: 12%; } /* Pengarang */
        th:nth-child(5), td:nth-child(5) { width: 15%; } /* Penerbit */
        th:nth-child(6), td:nth-child(6) { width: 10%; } /* Tempat Terbit */
        th:nth-child(7), td:nth-child(7) { width: 5%; } /* Tahun */
        th:nth-child(8), td:nth-child(8) { width: 15%; } /* Kategori */
        th:nth-child(9), td:nth-child(9) { width: 7%; } /* Rak */
        th:nth-child(10), td:nth-child(10) { width: 8%; } /* Status */
        .date {
            text-align: right;
            margin-bottom: 20px;
        }
        .no-print {
            display: none;
        }
        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }
        .logo {
            height: 56px;
        }
        .logo-right {
            height: 80px;
        }
        .header-text {
            text-align: center;
            margin: 0 20px;
        }
        @media print {
            .no-print {
                display: none;
            }
            /* Ensure table cells show all content when printing */
            td {
                page-break-inside: avoid;
                overflow: visible;
            }
        }
    </style>
</head>
<body>
    <div class="logo-container">
        <img src="${window.location.origin}/img/download.png" alt="" class="logo">
        <div class="header-text">
            <h6 style="margin: 0; font-weight: bold; text-transform: uppercase;">DATA BUKU PERPUSTAKAAN</h6>
            <h6 style="margin: 0; font-weight: bold;">MUSEUM NEGERI NUSA TENGGARA BARAT (NTB)</h6>
        </div>
        <img src="${window.location.origin}/img/logo-.png" alt="" class="logo-right">
    </div>
    <div class="date">Tanggal Cetak: ${currentDate}</div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tempat Terbit</th>
                <th>Tahun Terbit</th>
                <th>Kategori</th>
                <th>Rak</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
`);

        // Get the filtered data from DataTables
        var table = $('#dataTable').DataTable();
        var filteredData = table.rows({
            search: 'applied'
        }).data();

        // Add rows to the print window
        for (var i = 0; i < filteredData.length; i++) {
            var rowData = filteredData[i];
            printWindow.document.write('<tr>');

            // Add No column
            printWindow.document.write(`<td>${i+1}</td>`);

            // Add other columns in the correct order
            printWindow.document.write(`<td>${rowData[1]}</td>`); // Kode
            printWindow.document.write(`<td>${rowData[3]}</td>`); // Judul
            printWindow.document.write(`<td>${rowData[4]}</td>`); // Pengarang
            printWindow.document.write(`<td>${rowData[5]}</td>`); // Penerbit
            printWindow.document.write(`<td>${rowData[6]}</td>`); // Tempat Terbit
            printWindow.document.write(`<td>${rowData[7]}</td>`); // Tahun Terbit
            printWindow.document.write(`<td>${rowData[9]}</td>`); // Kategori
            printWindow.document.write(`<td>${rowData[10]}</td>`); // Rak
            printWindow.document.write(`<td>${rowData[11]}</td>`); // Status

            printWindow.document.write('</tr>');
        }

        // Close the HTML structure
        printWindow.document.write(`
        </tbody>
    </table>
    <div style="margin-top: 50px; text-align: right;">
        <p>................................, ${currentDate}</p>
        <br><br><br>
        <p>(_________________________)</p>
        <p>Petugas Perpustakaan</p>
    </div>
    <div class="no-print">
        <button onclick="window.print()" style="margin-top: 20px;">Print</button>
    </div>
</body>
</html>
`);

        // Finish writing and focus on the print window
        printWindow.document.close();
        printWindow.focus();
    }
</script>

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