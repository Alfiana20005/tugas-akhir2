<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <!-- Dashboard Cards -->
    <h6 class="mb-3 font-weight-bold text-primary">Total Buku</h6>
    <div class="row mb-2">
        <!-- Total Book Titles Card -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Judul Buku</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalBuku; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Book Copies Card -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Eksemplar Buku</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalJumlahBuku; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-copy fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Cards -->
    </div>
    <h6 class="mb-3 font-weight-bold text-primary">Jumlah Buku Berdasarkan Kategori</h6>
    <div class="row mb-4">
        <?php
        // Define some color variations for the cards
        $colors = ['primary', 'success', 'info', 'warning', 'danger', 'secondary'];
        $colorIndex = 0;

        // Loop through each category and create a card
        foreach ($kategoriCounts as $kategori => $count):
            // Get current color and increment index
            $currentColor = $colors[$colorIndex % count($colors)];
            $colorIndex++;
        ?>
            <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
                <div class="card border-left-<?= $currentColor ?> shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-<?= $currentColor ?> text-uppercase mb-1">
                                    <?= $kategori ?></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book-open fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
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
                            <label for="rak" class="col-sm-3 col-form-label">Lokasi Buku</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="rak" name="rak">
                                    <option value="">Pilih Lokasi</option>
                                    <option value="Lemari 1">Lemari 1</option>
                                    <option value="Lemari 2">Lemari 2</option>
                                    <option value="Lemari 3">Lemari 3</option>
                                    <option value="Lemari 4">Lemari 4</option>
                                    <option value="Lemari 5">Lemari 5</option>
                                    <option value="Lemari 6">Lemari 6</option>
                                    <option value="Lemari Berkala">Lemari Berkala</option>
                                </select>
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
                                    <option <?= old("kategoriBuku") == 'Majalah' ? 'selected' : 'Majalah' ?> value="Majalah">Majalah</option>
                                    <option <?= old("kategoriBuku") == 'Koran' ? 'selected' : 'Koran' ?> value="Koran">Koran</option>
                                    <option <?= old("kategoriBuku") == 'Hasil Penelitian' ? 'selected' : 'Hasil Penelitian' ?> value="Hasil Penelitian">Hasil Penelitian</option>
                                    <option <?= old("kategoriBuku") == 'Buku Anak' ? 'selected' : 'Buku Anak' ?> value="Buku Anak">Buku Anak</option>
                                    <option <?= old("kategoriBuku") == 'Arsip' ? 'selected' : 'Arsip' ?> value="Arsip">Arsip</option>
                                    <option <?= old("kategoriBuku") == 'Karya Umum' ? 'selected' : 'Karya Umum' ?> value="Karya Umum">Karya Umum</option>
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

            <!-- Search Box -->
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" id="searchInput" class="form-control" placeholder="Cari berdasarkan judul, pengarang, atau kode buku...">
                    </div>
                    <div class="col-md-3">
                        <select id="entriesPerPage" class="form-control">
                            <option value="10">10 entries per page</option>
                            <option value="25" selected>25 entries per page</option>
                            <option value="50">50 entries per page</option>
                            <option value="100">100 entries per page</option>
                            <option value="all">Show all</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-secondary" onclick="resetFilters()">Reset Filter</button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="" width="100%" cellspacing="0" style="font-size: 11pt;">
                    <thead style="text-align: center; background-color: #f8f9fc;">
                        <tr>
                            <th onclick="sortTable(0)" style="cursor: pointer;">No <i class="fas fa-sort"></i></th>
                            <th onclick="sortTable(1)" style="cursor: pointer;">Kode <i class="fas fa-sort"></i></th>
                            <th>Sampul</th>
                            <th onclick="sortTable(3)" style="cursor: pointer;">Judul <i class="fas fa-sort"></i></th>
                            <th onclick="sortTable(4)" style="cursor: pointer;">Pengarang <i class="fas fa-sort"></i></th>
                            <th onclick="sortTable(5)" style="cursor: pointer;">Penerbit <i class="fas fa-sort"></i></th>
                            <th onclick="sortTable(6)" style="cursor: pointer;">Tempat Terbit <i class="fas fa-sort"></i></th>
                            <th onclick="sortTable(7)" style="cursor: pointer;">Tahun Terbit <i class="fas fa-sort"></i></th>
                            <th onclick="sortTable(8)" style="cursor: pointer;">Eksemplar <i class="fas fa-sort"></i></th>
                            <th onclick="sortTable(9)" style="cursor: pointer;">Nomor Seri <i class="fas fa-sort"></i></th>
                            <th onclick="sortTable(10)" style="cursor: pointer;">Kategori Buku <i class="fas fa-sort"></i></th>
                            <th onclick="sortTable(11)" style="cursor: pointer;">Lokasi Penyimpanan <i class="fas fa-sort"></i></th>
                            <th onclick="sortTable(12)" style="cursor: pointer;">Status <i class="fas fa-sort"></i></th>
                            <th onclick="sortTable(13)" style="cursor: pointer;">Keterangan <i class="fas fa-sort"></i></th>
                            <th onclick="sortTable(14)" style="cursor: pointer;">OPAC <i class="fas fa-sort"></i></th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody" style="text-align: center;">
                        <?php
                        $no = 1;
                        foreach ($data_buku as $buku): ?>
                            <tr data-pengarang="<?= $buku['pengarang']; ?>"
                                data-penerbit="<?= $buku['penerbit']; ?>"
                                data-tempatTerbit="<?= $buku['tempatTerbit']; ?>"
                                data-tahunTerbit="<?= $buku['tahunTerbit']; ?>"
                                data-kategori="<?= $buku['kategoriBuku']; ?>"
                                data-status="<?= $buku['status']; ?>">
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

            <!-- Pagination -->
            <div class="row mt-3">
                <div class="col-md-6">
                    <div id="showingInfo" class="text-muted"></div>
                </div>
                <div class="col-md-6">
                    <nav aria-label="Table navigation">
                        <ul class="pagination justify-content-end" id="pagination">
                            <!-- Pagination will be generated by JavaScript -->
                        </ul>
                    </nav>
                </div>
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
                                                <option value="Karya Umum" <?= ($buku['kategoriBuku'] == 'Karya Umum') ? 'selected' : ''; ?>>Karya Umum</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="rak" class="form-label">Lokasi Penyimpanan</label>
                                            <select class="form-control" id="rak" name="rak" required>
                                                <option value="">Pilih Lokasi</option>
                                                <option value="Lemari 1" <?= ($buku['rak'] == 'Lemari 1') ? 'selected' : ''; ?>>Lemari 1</option>
                                                <option value="Lemari 2" <?= ($buku['rak'] == 'Lemari 2') ? 'selected' : ''; ?>>Lemari 2</option>
                                                <option value="Lemari 3" <?= ($buku['rak'] == 'Lemari 3') ? 'selected' : ''; ?>>Lemari 3</option>
                                                <option value="Lemari 4" <?= ($buku['rak'] == 'Lemari 4') ? 'selected' : ''; ?>>Lemari 4</option>
                                                <option value="Lemari 5" <?= ($buku['rak'] == 'Lemari 5') ? 'selected' : ''; ?>>Lemari 5</option>
                                                <option value="Lemari 6" <?= ($buku['rak'] == 'Lemari 6') ? 'selected' : ''; ?>>Lemari 6</option>
                                                <option value="Lemari Berkala" <?= ($buku['rak'] == 'Lemari Berkala') ? 'selected' : ''; ?>>Lemari Berkala</option>
                                            </select>
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
    var totalBuku = <?php echo $totalBuku; ?>;
    var totalJumlahBuku = <?php echo $totalJumlahBuku; ?>;

    let currentPage = 1;
    let itemsPerPage = 25;
    let filteredRows = [];
    let allRows = [];
    let sortDirection = {};

    $(document).ready(function() {
        // Initialize
        allRows = $('#tableBody tr').toArray();
        filteredRows = [...allRows];
        updateTable();

        // Search functionality
        $('#searchInput').on('input', function() {
            applyFilters();
        });

        // Entries per page
        $('#entriesPerPage').on('change', function() {
            itemsPerPage = this.value === 'all' ? filteredRows.length : parseInt(this.value);
            currentPage = 1;
            updateTable();
        });

        // Filter dropdowns
        $('#filterPengarang, #filterPenerbit, #filterTempatTerbit, #filterTahunTerbit, #filterKategori, #filterStatus').on('change', function() {
            applyFilters();
        });
    });

    function applyFilters() {
        const searchTerm = $('#searchInput').val().toLowerCase();
        const pengarangFilter = $('#filterPengarang').val();
        const penerbitFilter = $('#filterPenerbit').val();
        const tempatTerbitFilter = $('#filterTempatTerbit').val();
        const tahunTerbitFilter = $('#filterTahunTerbit').val();
        const kategoriFilter = $('#filterKategori').val();
        const statusFilter = $('#filterStatus').val();

        filteredRows = allRows.filter(row => {
            const $row = $(row);
            const rowText = $row.text().toLowerCase();

            // Search filter
            if (searchTerm && !rowText.includes(searchTerm)) {
                return false;
            }

            // Dropdown filters
            if (pengarangFilter && $row.data('pengarang') !== pengarangFilter) return false;
            if (penerbitFilter && $row.data('penerbit') !== penerbitFilter) return false;
            if (tempatTerbitFilter && $row.data('tempatterbit') !== tempatTerbitFilter) return false;
            if (tahunTerbitFilter && $row.data('tahunterbit') !== tahunTerbitFilter) return false;
            if (kategoriFilter && $row.data('kategori') !== kategoriFilter) return false;
            if (statusFilter && $row.data('status') !== statusFilter) return false;

            return true;
        });

        currentPage = 1;
        updateTable();
    }

    function updateTable() {
        const tbody = $('#tableBody');
        tbody.empty();

        if (filteredRows.length === 0) {
            tbody.append('<tr><td colspan="16" class="text-center">Tidak ada data yang ditemukan</td></tr>');
            updatePagination();
            updateShowingInfo();
            return;
        }

        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = itemsPerPage === filteredRows.length ? filteredRows.length : Math.min(startIndex + itemsPerPage, filteredRows.length);

        // Update row numbers and display rows
        for (let i = startIndex; i < endIndex; i++) {
            const $row = $(filteredRows[i]);
            $row.find('td:first').text(i + 1);
            tbody.append($row);
        }

        updatePagination();
        updateShowingInfo();
    }

    function updatePagination() {
        const totalPages = Math.ceil(filteredRows.length / itemsPerPage);
        const pagination = $('#pagination');
        pagination.empty();

        if (totalPages <= 1) return;

        // Previous button
        pagination.append(`
        <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(${currentPage - 1})">Previous</a>
        </li>
    `);

        // Page numbers
        for (let i = 1; i <= totalPages; i++) {
            if (i === 1 || i === totalPages || (i >= currentPage - 2 && i <= currentPage + 2)) {
                pagination.append(`
                <li class="page-item ${currentPage === i ? 'active' : ''}">
                    <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
                </li>
            `);
            } else if (i === currentPage - 3 || i === currentPage + 3) {
                pagination.append('<li class="page-item disabled"><span class="page-link">...</span></li>');
            }
        }

        // Next button
        pagination.append(`
        <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(${currentPage + 1})">Next</a>
        </li>
    `);
    }

    function updateShowingInfo() {
        const startIndex = (currentPage - 1) * itemsPerPage + 1;
        const endIndex = Math.min(currentPage * itemsPerPage, filteredRows.length);

        $('#showingInfo').text(`Showing ${startIndex} to ${endIndex} of ${filteredRows.length} entries`);
    }

    function changePage(page) {
        const totalPages = Math.ceil(filteredRows.length / itemsPerPage);
        if (page >= 1 && page <= totalPages) {
            currentPage = page;
            updateTable();
        }
    }

    function sortTable(columnIndex) {
        const currentDirection = sortDirection[columnIndex] || 'asc';
        const newDirection = currentDirection === 'asc' ? 'desc' : 'asc';
        sortDirection[columnIndex] = newDirection;

        filteredRows.sort((a, b) => {
            let aVal = $(a).find('td').eq(columnIndex).text().trim();
            let bVal = $(b).find('td').eq(columnIndex).text().trim();

            // Handle numeric columns
            if (columnIndex === 0 || columnIndex === 7 || columnIndex === 8) {
                aVal = parseInt(aVal) || 0;
                bVal = parseInt(bVal) || 0;
            }

            if (aVal < bVal) return newDirection === 'asc' ? -1 : 1;
            if (aVal > bVal) return newDirection === 'asc' ? 1 : -1;
            return 0;
        });

        // Update sort icons
        $('th i').removeClass('fa-sort-up fa-sort-down').addClass('fa-sort');
        $(`th:eq(${columnIndex}) i`).removeClass('fa-sort').addClass(newDirection === 'asc' ? 'fa-sort-up' : 'fa-sort-down');

        updateTable();
    }

    function resetFilters() {
        $('#searchInput').val('');
        $('#filterPengarang, #filterPenerbit, #filterTempatTerbit, #filterTahunTerbit, #filterKategori, #filterStatus').val('');
        $('#entriesPerPage').val('25');
        itemsPerPage = 25;
        filteredRows = [...allRows];
        currentPage = 1;
        sortDirection = {};
        $('th i').removeClass('fa-sort-up fa-sort-down').addClass('fa-sort');
        updateTable();
    }

    // Optimasi untuk modal dan AJAX
    $(document).ready(function() {
        let judulCheckTimeout;

        $('#tambahKegiatan').on('shown.bs.modal', function() {
            const judulInput = document.getElementById('judul-buku');
            const judulAlert = document.getElementById('judulAlert');
            const rakLocation = document.getElementById('rakLocation');
            const submitBtn = document.querySelector('button[type="submit"]');

            function checkJudul() {
                const judul = judulInput.value.trim();

                if (judul.length > 2) { // Hanya cek jika lebih dari 2 karakter
                    // Batalkan request sebelumnya jika ada
                    if (window.currentJudulRequest) {
                        window.currentJudulRequest.abort();
                    }

                    window.currentJudulRequest = $.ajax({
                        url: window.location.origin + '/cekJudulBuku',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            judul: judul
                        },
                        timeout: 5000, // Timeout 5 detik
                        success: function(data) {
                            if (data.exists) {
                                rakLocation.textContent = data.rak || "tidak diketahui";
                                judulAlert.classList.remove('d-none');
                            } else {
                                judulAlert.classList.add('d-none');
                                if (submitBtn) submitBtn.disabled = false;
                            }
                        },
                        error: function(xhr, status, error) {
                            if (status !== 'abort') {
                                console.error('Error checking judul:', error);
                                judulAlert.textContent = 'Error saat memeriksa judul buku.';
                                judulAlert.classList.remove('d-none');
                            }
                        },
                        complete: function() {
                            window.currentJudulRequest = null;
                        }
                    });
                } else {
                    judulAlert.classList.add('d-none');
                    if (submitBtn) submitBtn.disabled = false;
                }
            }

            // Debounced event handler
            judulInput.addEventListener('input', function() {
                clearTimeout(judulCheckTimeout);
                judulCheckTimeout = setTimeout(checkJudul, 500);
            });
        });
    });

    // Optimasi untuk kategori selection
    document.addEventListener('DOMContentLoaded', function() {
        const kategoriSelect = document.getElementById('kategoriBuku');
        const nomorSeriContainer = document.getElementById('nomorSeriContainer');

        if (kategoriSelect && nomorSeriContainer) {
            const periodicCategories = ['Berkala', 'Majalah', 'Koran'];

            function toggleNomorSeri() {
                const isPeriodicCategory = periodicCategories.includes(kategoriSelect.value);
                nomorSeriContainer.style.display = isPeriodicCategory ? 'flex' : 'none';
            }

            kategoriSelect.addEventListener('change', toggleNomorSeri);
            toggleNomorSeri(); // Check initial value
        }
    });

    // Optimasi print function
    function printTable() {
        // Show loading indicator
        const loadingIndicator = document.createElement('div');
        loadingIndicator.innerHTML = 'Menyiapkan data untuk print...';
        loadingIndicator.style.cssText = 'position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);background:white;padding:20px;border:1px solid #ccc;z-index:9999;';
        document.body.appendChild(loadingIndicator);

        // Use setTimeout to allow UI to update
        setTimeout(function() {
            try {
                const printWindow = window.open('', '_blank');
                const currentDate = new Date().toLocaleDateString('id-ID');

                // Optimasi: Ambil data secara batch
                const table = $('#dataTable').DataTable();
                const filteredData = table.rows({
                    search: 'applied'
                }).data().toArray();

                // Build HTML lebih efisien
                const htmlParts = [
                    '<!DOCTYPE html><html><head><title>Data Buku</title>',
                    getOptimizedPrintStyles(),
                    '</head><body>',
                    getPrintHeader(),
                    getPrintSummary(currentDate),
                    '<table><thead><tr>',
                    '<th>No</th><th>Kode</th><th>Judul</th><th>Pengarang</th><th>Penerbit</th>',
                    '<th>Tempat Terbit</th><th>Tahun Terbit</th><th>Kategori</th><th>Rak</th>',
                    '<th>Status</th><th>Eksemplar</th>',
                    '</tr></thead><tbody>'
                ];

                // Batch process rows
                const batchSize = 50;
                for (let i = 0; i < filteredData.length; i += batchSize) {
                    const batch = filteredData.slice(i, i + batchSize);
                    htmlParts.push(processBatch(batch, i));
                }

                htmlParts.push('</tbody></table>');
                htmlParts.push(getPrintFooter(currentDate));
                htmlParts.push('</body></html>');

                printWindow.document.write(htmlParts.join(''));
                printWindow.document.close();
                printWindow.focus();

            } catch (error) {
                console.error('Error during print:', error);
                alert('Terjadi error saat menyiapkan print. Silakan coba lagi.');
            } finally {
                // Remove loading indicator
                document.body.removeChild(loadingIndicator);
            }
        }, 100);
    }

    function processBatch(batch, startIndex) {
        return batch.map((rowData, index) => {
            const rowIndex = startIndex + index + 1;
            return `<tr>
            <td>${rowIndex}</td>
            <td>${rowData[1]}</td>
            <td>${rowData[3]}</td>
            <td>${rowData[4]}</td>
            <td>${rowData[5]}</td>
            <td>${rowData[6]}</td>
            <td>${rowData[7]}</td>
            <td>${rowData[9]}</td>
            <td>${rowData[10]}</td>
            <td>${rowData[11]}</td>
            <td>${rowData[8]}</td>
        </tr>`;
        }).join('');
    }

    function getOptimizedPrintStyles() {
        return `<style>
        body { font-family: Times New Roman, sans-serif; margin: 20px; }
        h2, h3 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; table-layout: fixed; }
        th, td { border: 0.5px solid #808080; padding: 4px; text-align: center; font-size: 11px; 
                 vertical-align: middle; word-wrap: break-word; white-space: normal; height: auto; }
        th { background-color: #f2f2f2; }
        th:nth-child(1), td:nth-child(1) { width: 4%; }
        th:nth-child(2), td:nth-child(2) { width: 7%; }
        th:nth-child(3), td:nth-child(3) { width: 14%; }
        th:nth-child(4), td:nth-child(4) { width: 12%; }
        th:nth-child(5), td:nth-child(5) { width: 13%; }
        th:nth-child(6), td:nth-child(6) { width: 9%; }
        th:nth-child(7), td:nth-child(7) { width: 5%; }
        th:nth-child(8), td:nth-child(8) { width: 13%; }
        th:nth-child(9), td:nth-child(9) { width: 6%; }
        th:nth-child(10), td:nth-child(10) { width: 7%; }
        th:nth-child(11), td:nth-child(11) { width: 6%; }
        .date { text-align: right; }
        .summary-info { text-align: left; }
        .summary-info p { margin: 3px 0; font-size: 12px; }
        .logo-container { display: flex; align-items: center; justify-content: center; margin-bottom: 10px; }
        .logo { height: 56px; }
        .logo-right { height: 80px; }
        .header-text { text-align: center; margin: 0 20px; }
        @media print { td { page-break-inside: avoid; overflow: visible; } }
    </style>`;
    }

    function getPrintHeader() {
        return `<div class="logo-container">
        <img src="${window.location.origin}/img/download.png" alt="" class="logo">
        <div class="header-text">
            <h6 style="margin: 0; font-weight: bold; text-transform: uppercase;">DATA BUKU PERPUSTAKAAN</h6>
            <h6 style="margin: 0; font-weight: bold;">MUSEUM NEGERI NUSA TENGGARA BARAT (NTB)</h6>
        </div>
        <img src="${window.location.origin}/img/logo-.png" alt="" class="logo-right">
    </div>`;
    }

    function getPrintSummary(currentDate) {
        return `<div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
        <div class="summary-info">
            <p>Total Judul Buku: ${totalBuku}</p>
            <p>Total Jumlah Buku (Eksemplar): ${totalJumlahBuku}</p>
        </div>
        <div class="date">Tanggal Cetak: ${currentDate}</div>
    </div>`;
    }

    function getPrintFooter(currentDate) {
        return `<div style="margin-top: 50px; text-align: right;">
        <p>................................, ${currentDate}</p>
        <br><br><br>
        <p>(_________________________)</p>
        <p>Petugas Perpustakaan</p>
    </div>`;
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