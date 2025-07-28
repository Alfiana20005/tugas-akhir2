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
    </div>

    <!-- Category Cards -->
    <h6 class="mb-3 font-weight-bold text-primary">Jumlah Buku Berdasarkan Kategori</h6>
    <div class="row mb-4">
        <?php
        $colors = ['primary', 'success', 'info', 'warning', 'danger', 'secondary'];
        $colorIndex = 0;
        foreach ($kategoriCounts as $kategori => $count):
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

    <!-- Add Book Button -->
    <?php if (session()->get('level') == 'Perpustakaan'): ?>
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahKegiatan" data-bs-whatever="@getbootstrap">Tambah Data</button>
        <?php if (session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Modal Add Book -->
    <div class="modal fade" id="tambahKegiatan" tabindex="-1" aria-labelledby="tambahKegiatan" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="tambahKegiatan">Tambahkan Data Buku</h4>
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
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex py-3 align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Buku</h6>
            <div class="d-flex">
                <button type="button" class="btn btn-info" onclick="printTable()"><i class="fas fa-print"></i> Cetak Data</button>
            </div>
        </div>

        <div class="card-body">
            <!-- Search and Filter Form -->
            <form action="" method="get" autocomplete="off">
                <div class="float-right ml-2 mb-4">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
                <div class="float-right">
                    <input type="text" name="keyword" id="" class="form-control" style="width: 155pt;" placeholder="search" value="<?= esc($filters['keyword'] ?? ''); ?>">
                </div>

                <div class="clearfix"></div>

                <!-- Filter section -->
                <div class="mb-4">
                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <select name="pengarang" id="filterPengarang" class="form-control">
                                <option value="">Semua Pengarang</option>
                                <?php foreach ($pengarang_list as $p): ?>
                                    <option value="<?= $p['pengarang']; ?>" <?= ($filters['pengarang'] ?? '') == $p['pengarang'] ? 'selected' : ''; ?>><?= $p['pengarang']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <select name="penerbit" id="filterPenerbit" class="form-control">
                                <option value="">Semua Penerbit</option>
                                <?php foreach ($penerbit_list as $p): ?>
                                    <option value="<?= $p['penerbit']; ?>" <?= ($filters['penerbit'] ?? '') == $p['penerbit'] ? 'selected' : ''; ?>><?= $p['penerbit']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <select name="tempatTerbit" id="filterTempatTerbit" class="form-control">
                                <option value="">Semua Tempat Terbit</option>
                                <?php foreach ($tempatTerbit_list as $t): ?>
                                    <option value="<?= $t['tempatTerbit']; ?>" <?= ($filters['tempatTerbit'] ?? '') == $t['tempatTerbit'] ? 'selected' : ''; ?>><?= $t['tempatTerbit']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <select name="tahunTerbit" id="filterTahunTerbit" class="form-control">
                                <option value="">Semua Tahun</option>
                                <?php foreach ($tahunTerbit_list as $t): ?>
                                    <option value="<?= $t['tahunTerbit']; ?>" <?= ($filters['tahunTerbit'] ?? '') == $t['tahunTerbit'] ? 'selected' : ''; ?>><?= $t['tahunTerbit']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <select name="kategoriBuku" id="filterKategori" class="form-control">
                                <option value="">Semua Kategori</option>
                                <?php foreach ($kategoriBuku_list as $k): ?>
                                    <option value="<?= $k['kategoriBuku']; ?>" <?= ($filters['kategoriBuku'] ?? '') == $k['kategoriBuku'] ? 'selected' : ''; ?>><?= $k['kategoriBuku']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <select name="status" id="filterStatus" class="form-control">
                                <option value="">Semua Status</option>
                                <?php foreach ($status_list as $s): ?>
                                    <option value="<?= $s['status']; ?>" <?= ($filters['status'] ?? '') == $s['status'] ? 'selected' : ''; ?>><?= $s['status']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </form>



            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0" style="font-size: 11pt;">
                    <thead style="text-align: center; background-color: #f8f9fc;">
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Kode</th>
                            <th style="text-align: center;">Sampul</th>
                            <th style="text-align: center;">Judul</th>
                            <th style="text-align: center;">Pengarang</th>
                            <th style="text-align: center;">Penerbit</th>
                            <th style="text-align: center;">Tempat Terbit</th>
                            <th style="text-align: center;">Tahun Terbit</th>
                            <th style="text-align: center;">Kategori</th>
                            <th style="text-align: center;">Lokasi</th>
                            <th style="text-align: center;">Eksemplar</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center; font-size: 10pt;">
                        <?php
                        // Menggunakan data dari controller yang sudah menghitung pagination
                        $currentPage = $pager->getCurrentPage();
                        $perPage = $pager->getPerPage();
                        $no = 1 + ($perPage * ($currentPage - 1));

                        if (!empty($data_buku)):
                            foreach ($data_buku as $buku):
                        ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no++; ?></td>
                                    <td style="text-align: center;"><?= esc($buku['kode']); ?></td>
                                    <td style="text-align: center;">
                                        <?php if (!empty($buku['foto']) && file_exists(FCPATH . "img/perpustakaan/" . $buku['foto'])): ?>
                                            <img src="<?= base_url("img/perpustakaan/" . $buku['foto']); ?>"
                                                alt="Cover <?= esc($buku['judul']); ?>"
                                                width="80px"
                                                height="100px"
                                                style="object-fit: cover; border-radius: 4px;"
                                                loading="lazy"
                                                onerror="this.src='<?= base_url('img/perpustakaan/no-image.png'); ?>'">
                                        <?php else: ?>
                                            <div style="width: 80px; height: 100px; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 4px; color: #666; font-size: 10px;">
                                                No Image
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td style="text-align: left; max-width: 200px;">
                                        <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"
                                            title="<?= esc($buku['judul']); ?>">
                                            <?= esc($buku['judul']); ?>
                                        </div>
                                    </td>
                                    <td style="text-align: center;"><?= esc($buku['pengarang']); ?></td>
                                    <td style="text-align: center;"><?= esc($buku['penerbit']); ?></td>
                                    <td style="text-align: center;"><?= esc($buku['tempatTerbit'] ?? '-'); ?></td>
                                    <td style="text-align: center;"><?= esc($buku['tahunTerbit'] ?? '-'); ?></td>
                                    <td style="text-align: center;">
                                        <?= esc($buku['kategoriBuku'] ?? '-'); ?>
                                    </td>
                                    <td style="text-align: center;"><?= esc($buku['rak'] ?? '-'); ?></td>
                                    <td style="text-align: center;">
                                        <?= esc($buku['eksemplar'] ?? '0'); ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php
                                        $statusClass = match ($buku['status']) {
                                            'Boleh Dipinjam' => 'success',
                                            'Tidak Boleh Dipinjam' => 'warning',
                                            'Rusak' => 'danger',
                                            'Hilang' => 'dark',
                                            default => 'secondary'
                                        };
                                        ?>
                                        <?= esc($buku['status']); ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="btn-group" role="group">
                                            <a href="<?= base_url("/detailBuku/{$buku['id_buku']}"); ?>"
                                                class="btn btn-info btn-sm"
                                                title="Detail Buku">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>

                                            <?php if (session()->get('level') == 'Perpustakaan'): ?>
                                                <a href="#"
                                                    class="btn btn-primary btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editBuku<?= $buku['id_buku']; ?>"
                                                    title="Edit Buku">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>

                                                <form action="<?= base_url("deleteBuku/{$buku['id_buku']}"); ?>"
                                                    method="post"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm"
                                                        title="Hapus Buku">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                        else:
                            ?>
                            <tr>
                                <td colspan="13" style="text-align: center; padding: 20px; color: #666;">
                                    <i class="fas fa-book-open fa-2x mb-2"></i><br>
                                    Tidak ada data buku yang ditemukan
                                    <?php if (!empty($filters['keyword']) || !empty($filters['pengarang']) || !empty($filters['penerbit'])): ?>
                                        <br><small>dengan filter yang dipilih</small>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <?= $pager->links('default', 'pagination'); ?>
            </div>
        </div>
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


<!-- Print Version Section (Hidden by default, similar to tabel koleksi) -->
<div class="dataBuku" id="printBuku" style="display: none;">
    <div class="container-fluid d-sm-flex align-items-center justify-content-center mt-4" id="judul-inv">
        <img src="<?= base_url('/img/download.png') ?>" alt="" id="logo" style="width: 56px; margin-right: 20px;">
        <div class="text-center" style="font-size:16pt">
            <h6 class="m-0 font-weight-bold text-black" style="text-transform: uppercase;">DATA BUKU PERPUSTAKAAN</h6>
            <h6 class="m-0 font-weight-bold text-black">MUSEUM NEGERI NUSA TENGGARA BARAT (NTB)</h6>
        </div>
        <img src="<?= base_url('/img/logo-.png') ?>" alt="" id="logo" style="width: 80px; margin-left: 20px;">
    </div>
    <hr>

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead style="text-align: center; font-size: 10pt;">
            <tr>
                <th style="text-align: center;">Kode</th>
                <th style="text-align: center;">Sampul</th>
                <th style="text-align: center;">Judul</th>
                <th style="text-align: center;">Pengarang</th>
                <th style="text-align: center;">Penerbit</th>
                <th style="text-align: center;">Tempat Terbit</th>
                <th style="text-align: center;">Tahun Terbit</th>
                <th style="text-align: center;">Kategori</th>
                <th style="text-align: center;">Lokasi</th>
                <th style="text-align: center;">Status</th>
                <th style="text-align: center;">Eksemplar</th>
            </tr>
        </thead>

        <tbody style="text-align: center; font-size: 10pt;">
            <?php
            $no = 1;
            foreach ($data_buku as $buku):
            ?>
                <tr>
                    <td style="text-align: center;"><?= $buku['kode']; ?></td>
                    <td style="text-align: center;">
                        <img src="<?= base_url("img/perpustakaan/" . $buku['foto']); ?>" alt="" width="100px">
                    </td>
                    <td style="text-align: center;"><?= $buku['judul']; ?></td>
                    <td style="text-align: center;"><?= $buku['pengarang']; ?></td>
                    <td style="text-align: center;"><?= $buku['penerbit']; ?></td>
                    <td style="text-align: center;"><?= $buku['tempatTerbit']; ?></td>
                    <td style="text-align: center;"><?= $buku['tahunTerbit']; ?></td>
                    <td style="text-align: center;"><?= $buku['kategoriBuku']; ?></td>
                    <td style="text-align: center;"><?= $buku['rak']; ?></td>
                    <td style="text-align: center;"><?= $buku['status']; ?></td>
                    <td style="text-align: center;"><?= $buku['eksemplar']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var totalBuku = <?php echo $totalBuku; ?>;
    var totalJumlahBuku = <?php echo $totalJumlahBuku; ?>;

    // Optimasi untuk modal dan AJAX (similar to original)
    $(document).ready(function() {
        let judulCheckTimeout;

        $('#tambahKegiatan').on('shown.bs.modal', function() {
            const judulInput = document.getElementById('judul-buku');
            const judulAlert = document.getElementById('judulAlert');
            const rakLocation = document.getElementById('rakLocation');
            const submitBtn = document.querySelector('button[type="submit"]');

            function checkJudul() {
                const judul = judulInput.value.trim();

                if (judul.length > 2) {
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
                        timeout: 5000,
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

            judulInput.addEventListener('input', function() {
                clearTimeout(judulCheckTimeout);
                judulCheckTimeout = setTimeout(checkJudul, 500);
            });
        });
    });

    // Kategori selection untuk nomor seri
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
            toggleNomorSeri();
        }
    });

    // Print function (simplified version following koleksi table concept)
    function printTable() {
        const printContent = document.getElementById('printBuku');
        const originalContent = document.body.innerHTML;

        document.body.innerHTML = printContent.innerHTML;
        window.print();
        document.body.innerHTML = originalContent;

        // Reload to restore functionality
        location.reload();
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