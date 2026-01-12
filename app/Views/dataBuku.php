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
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalEksemplar; ?></div>
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

    <div class="modal fade" id="tambahKegiatan" tabindex="-1" aria-labelledby="tambahKegiatan" aria-hidden="true">
        <div class="modal-dialog modal-xl">
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

                        <!-- Field Pengarang dengan Multiple Input -->
                        <div class="row mb-2">
                            <label class="col-sm-3 col-form-label">Pengarang</label>
                            <div class="col-sm-9">
                                <div id="pengarangContainer">
                                    <div class="pengarang-item mb-2" data-index="0">
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="pengarang[0][nama]" placeholder="Nama Pengarang">
                                            </div>
                                            <div class="col-md-5">
                                                <select class="form-control" name="pengarang[0][jenisPengarang]">
                                                    <option value="">Pilih Role</option>
                                                    <option value="Pengarang Utama">Pengarang Utama</option>
                                                    <option value="Pengarang Tambahan">Pengarang Tambahan</option>
                                                    <option value="Editor">Editor</option>
                                                    <option value="Penerjemah">Penerjemah</option>
                                                    <option value="Ilustrator">Ilustrator</option>
                                                    <option value="Compiler">Compiler</option>
                                                    <option value="Kontributor">Kontributor</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-danger btn-sm remove-pengarang" onclick="removePengarang(0)" style="display: none;">
                                                    <i class="fas fa-trash"></i> ×
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success btn-sm mt-2" onclick="addPengarang()">
                                    <i class="fas fa-plus"></i> Tambah Pengarang
                                </button>
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
                            <label for="email" class="col-sm-3 col-form-label">Bahasa</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="recipient-name" name="bahasa">
                            </div>
                        </div>


                        <div class="row mb-2">
                            <label for="" class="col-sm-3 col-form-label">Jenis Buku</label>
                            <div class="col-sm-9">
                                <select class="form-select form-control" type="text" name="jenisBuku" id="jenisBuku">
                                    <option selected>Pilih </option>
                                    <option value="Koleksi Khusus">Koleksi Khusus</option>
                                    <option value="Umum">Umum</option>
                                    <option value="Unggulan">Unggulan</option>
                                    <option value="Arsip">Arsip</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="rak" class="col-sm-3 col-form-label">Lokasi Buku</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="rak" name="rak">
                                    <option value="">Pilih Lokasi</option>
                                    <option value="Rak 000">Rak 000</option>
                                    <option value="Rak 100">Rak 100</option>
                                    <option value="Rak 200">Rak 200</option>
                                    <option value="Rak 300">Rak 300</option>
                                    <option value="Rak 400">Rak 400</option>
                                    <option value="Rak 500">Rak 500</option>
                                    <option value="Rak 600">Rak 600</option>
                                    <option value="Rak 700">Rak 700</option>
                                    <option value="Rak 800">Rak 800</option>
                                    <option value="Rak 900">Rak 900</option>
                                    <option value="Rak Koleksi Khusus">Rak Koleksi Khusus</option>
                                    <option value="Rak Koleksi Unggulan">Rak Koleksi Unggulan</option>
                                    <!-- <option value="Lemari 6">Lemari 6</option>
                                    <option value="Lemari Berkala">Lemari Berkala</option> -->
                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="" class="col-sm-3 col-form-label">Kategori Buku</label>
                            <div class="col-sm-9">
                                <select class="form-select form-control" type="text" name="kategoriBuku" id="kategoriBuku">
                                    <option selected>Pilih </option>
                                    <option value="Karya Umum">000 - Karya Umum</option>
                                    <option value="Ilmu Filsafat">100 - Ilmu Filsafat</option>
                                    <option value="Agama">200 - Agama</option>
                                    <option value="Ilmu Sosial">300 - Ilmu Sosial</option>
                                    <option value="Ilmu Bahasa">400 - Ilmu Bahasa</option>
                                    <option value="Ilmu Murni/Pasti">500 - Ilmu Murni/Pasti</option>
                                    <option value="Ilmu Terapan">600 - Ilmu Terapan</option>
                                    <option value="Kesenian dan Olahraga">700 - Kesenian dan Olahraga</option>
                                    <option value="Kesusastraan">800 - Kesusastraan</option>
                                    <option value="Sejarah dan Geografi">900 - Sejarah dan Geografi</option>
                                    <option value="Arsip">Arsip</option>
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
                            <label for="eksemplar" class="col-sm-3 col-form-label">Jumlah Eksemplar</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="eksemplar" name="eksemplar" min="1" max="100" value="1" oninput="generatePreviewKodeEksemplar()">
                                <small class="text-muted">Masukkan jumlah eksemplar yang ingin dibuat (maksimal 100)</small>
                            </div>
                        </div>

                        <!-- Field Kode Eksemplar Baru -->
                        <div class="row mb-2">
                            <label for="" class="col-sm-3 col-form-label">Kode Eksemplar</label>
                            <div class="col-sm-9">
                                <div class="row g-2 align-items-center mb-3">
                                    <div class="col-md-3">
                                        <label class="form-label mb-0">Prefix:</label>
                                        <input type="text" class="form-control" id="kodePrefix" name="kode_prefix" maxlength="3" placeholder="p" oninput="generatePreviewKodeEksemplar()">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label mb-0">Suffix:</label>
                                        <input type="text" class="form-control" id="kodeSuffix" name="kode_suffix" maxlength="3" placeholder="s" oninput="generatePreviewKodeEksemplar()">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label mb-0">Nomor Mulai:</label>
                                        <input type="number" class="form-control" id="nomorMulai" name="nomor_mulai" min="1" value="1" oninput="generatePreviewKodeEksemplar()">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-info btn-sm mt-4" onclick="togglePreview()">
                                            <i class="fas fa-eye"></i> Preview
                                        </button>
                                    </div>
                                </div>

                                <!-- Preview Kode Eksemplar -->
                                <div id="previewContainer" style="display: none;">
                                    <div class="card">
                                        <div class="card-header bg-light">
                                            <h6 class="mb-0">Preview Kode Eksemplar yang akan dibuat:</h6>
                                        </div>
                                        <div class="card-body" style="max-height: 200px; overflow-y: auto;">
                                            <div id="previewKodeList" class="row g-2">
                                                <!-- Preview codes will be generated here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <small class="text-muted">Format: [prefix][5 digit angka][suffix]. Contoh: p00001s, p00002s, dst.</small>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="email" class="col-sm-3 col-form-label">ISBN</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="recipient-name" name="isbn">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="" class="col-sm-3 col-form-label">OPAC</label>
                            <div class="col-sm-9">
                                <select class="form-select form-control" type="text" name="tampilkan">
                                    <option selected>Pilih </option>
                                    <option value="Tampilkan Sebagai Buku Rekomendasi">Tampilkan Sebagai Buku Rekomendasi</option>
                                    <option value="Tampilkan Sebagai Buku Favorit">Tampilkan Sebagai Buku Favorit</option>
                                    <option value="Tampilkan Sebagai Katalog">Tampilkan Sebagai Katalog</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-select form-control" type="text" name="status">
                                    <option selected>Pilih Status </option>
                                    <option value="Boleh Dipinjam">Boleh Dipinjam</option>
                                    <option value="Belum Bisa Dipinjam">Belum Bisa Dipinjam</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="isi" class="col-sm-3 col-form-label">Deskripsi Fisik</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="keterangan" id=""></textarea>
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
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-success" onclick="printFilteredData()">
                    <i class="fas fa-print"></i> Print Data (Filter Aktif)
                </button>
                <button type="button" class="btn btn-info" onclick="loadAllDataAndPrint()">
                    <i class="fas fa-print"></i> Print Semua Data
                </button>
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
                            <th style="text-align: center;">Kode Eksemplar</th>
                            <th style="text-align: center;">Sampul</th>
                            <th style="text-align: center;">Judul</th>
                            <th style="text-align: center;">Pengarang</th>
                            <th style="text-align: center;">Penerbit</th>
                            <th style="text-align: center;">Tempat Terbit</th>
                            <th style="text-align: center;">Tahun Terbit</th>
                            <th style="text-align: center;">Jenis Buku</th>
                            <th style="text-align: center;">Kategori</th>
                            <th style="text-align: center;">Bahasa</th>
                            <th style="text-align: center;">Rak</th>
                            <th style="text-align: center;">ISBN</th>
                            <th style="text-align: center;">Subjek</th>
                            <th style="text-align: center;" title="Jumlah copy buku dan total eksemplar">Eksemplar</th>
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
                                    <td style="text-align: center; max-width: 120px;">
                                        <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"
                                            title="<?= esc($buku['kodeEksemplar']); ?>">
                                            <?= esc($buku['kodeEksemplar']); ?>
                                        </div>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php if (!empty($buku['foto']) && file_exists(FCPATH . "img/perpustakaan/" . $buku['foto']) && $buku['foto'] !== 'no_cover.jpeg'): ?>
                                            <img src="<?= base_url("img/perpustakaan/" . $buku['foto']); ?>"
                                                alt="Cover <?= esc($buku['judul']); ?>"
                                                width="60px"
                                                height="80px"
                                                style="object-fit: cover; border-radius: 4px;"
                                                loading="lazy"
                                                onerror="this.src='<?= base_url('img/perpustakaan/no_cover.jpeg'); ?>'">
                                        <?php else: ?>
                                            <div style="width: 60px; height: 80px; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 4px; color: #666; font-size: 9px;">
                                                No Cover
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td style="text-align: left; max-width: 200px;">
                                        <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"
                                            title="<?= esc($buku['judul']); ?>">
                                            <?= esc($buku['judul']); ?>
                                        </div>
                                    </td>
                                    <td style="text-align: left; max-width: 180px;">
                                        <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            <span title="<?= esc($buku['pengarang']); ?>"><?= esc($buku['pengarang']); ?></span>
                                            <?php if (!empty($buku['jenisPengarang'])): ?>
                                                <br><small style="color: #666; font-style: italic;">[<?= esc($buku['jenisPengarang']); ?>]</small>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td style="text-align: center;"><?= esc($buku['penerbit']); ?></td>
                                    <td style="text-align: center;"><?= esc($buku['tempatTerbit'] ?? '-'); ?></td>
                                    <td style="text-align: center;"><?= esc($buku['tahunTerbit'] ?? '-'); ?></td>
                                    <td style="text-align: center;"><?= esc($buku['jenisBuku'] ?? '-'); ?></td>
                                    <td style="text-align: center;"><?= esc($buku['kategoriBuku'] ?? '-'); ?></td>
                                    <td style="text-align: center;"><?= esc($buku['bahasa'] ?? '-'); ?></td>
                                    <td style="text-align: center;"><?= esc($buku['rak'] ?? '-'); ?></td>
                                    <td style="text-align: center;"><?= esc($buku['isbn'] ?? '-'); ?></td>
                                    <td style="text-align: center; max-width: 100px;">
                                        <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"
                                            title="<?= esc($buku['subjek']); ?>">
                                            <?= esc($buku['subjek'] ?? '-'); ?>
                                        </div>
                                    </td>
                                    <td style="text-align: center;">
                                        <span class="badge bg-primary" style="font-size: 14px; color: white; padding: 10px">
                                            <?= esc($buku['jumlah_eksemplar']); ?> copy
                                        </span>
                                        <?php if (isset($buku['total_eksemplar']) && $buku['total_eksemplar'] > $buku['jumlah_eksemplar']): ?>
                                            <br><small class="text-muted">(<?= esc($buku['total_eksemplar']); ?> total eksemplar)</small>
                                        <?php endif; ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="btn-group" role="group">
                                            <?php if (session()->get('level') == 'Perpustakaan'): ?>
                                                <!-- Edit Eksemplar Button - always uses the first ID from the group -->
                                                <a href="#"
                                                    class="btn btn-primary btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editBuku<?= $buku['id_buku']; ?>"
                                                    title="Edit Eksemplar">
                                                    <i class="fas fa-edit"></i> Edit Eksemplar
                                                </a>

                                                <!-- Hapus Semua Eksemplar Button -->
                                                <button type="button"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="deleteAllCopies('<?= $buku['all_ids']; ?>', '<?= esc($buku['judul']); ?>')"
                                                    title="Hapus Semua Eksemplar">
                                                    <i class="fas fa-trash"></i> Hapus Semua
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                        else:
                            ?>
                            <tr>
                                <td colspan="17" style="text-align: center; padding: 20px; color: #666;">
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
    <div class="modal fade" id="editBuku<?= $buku['id_buku']; ?>" tabindex="-1" aria-labelledby="editBuku<?= $buku['id_buku']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="editBuku<?= $buku['id_buku']; ?>">Edit Data Buku - <?= esc($buku['judul']); ?></h4>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url("updateBuku/{$buku['id_buku']}"); ?>" method="post" enctype="multipart/form-data" id="editForm<?= $buku['id_buku']; ?>">
                        <?= csrf_field(); ?>

                        <div class="row mb-2">
                            <label for="kode<?= $buku['id_buku']; ?>" class="col-sm-3 col-form-label">Kode</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kode<?= $buku['id_buku']; ?>" name="kode" value="<?= esc($buku['kode']); ?>">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="judul<?= $buku['id_buku']; ?>" class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="judul<?= $buku['id_buku']; ?>" name="judul" value="<?= esc($buku['judul']); ?>">
                            </div>
                        </div>

                        <!-- Field Pengarang dengan Multiple Input -->
                        <div class="row mb-2">
                            <label class="col-sm-3 col-form-label">Pengarang</label>
                            <div class="col-sm-9">
                                <div id="pengarangContainer<?= $buku['id_buku']; ?>">
                                    <?php
                                    $pengarangList = explode('; ', $buku['pengarang']);
                                    $jenisPengarangList = !empty($buku['jenisPengarang']) ? explode('; ', $buku['jenisPengarang']) : [];

                                    for ($i = 0; $i < count($pengarangList); $i++):
                                    ?>
                                        <div class="pengarang-item mb-2" data-index="<?= $i; ?>">
                                            <div class="row g-2">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="pengarang[<?= $i; ?>][nama]" placeholder="Nama Pengarang" value="<?= esc(trim($pengarangList[$i])); ?>">
                                                </div>
                                                <div class="col-md-5">
                                                    <select class="form-control" name="pengarang[<?= $i; ?>][jenisPengarang]">
                                                        <option value="">Pilih Role</option>
                                                        <?php
                                                        $selectedRole = isset($jenisPengarangList[$i]) ? trim($jenisPengarangList[$i]) : '';
                                                        $roles = ['Pengarang Utama', 'Pengarang Tambahan', 'Editor', 'Penerjemah', 'Ilustrator', 'Compiler', 'Kontributor'];
                                                        foreach ($roles as $role):
                                                        ?>
                                                            <option value="<?= $role; ?>" <?= ($selectedRole === $role) ? 'selected' : ''; ?>>
                                                                <?= $role; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="button" class="btn btn-danger btn-sm remove-pengarang" onclick="removePengarangEdit(<?= $i; ?>, <?= $buku['id_buku']; ?>)" <?= ($i === 0 && count($pengarangList) === 1) ? 'style="display: none;"' : ''; ?>>
                                                        <i class="fas fa-trash"></i> ×
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                                <button type="button" class="btn btn-success btn-sm mt-2" onclick="addPengarangEdit(<?= $buku['id_buku']; ?>)">
                                    <i class="fas fa-plus"></i> Tambah Pengarang
                                </button>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="penerbit<?= $buku['id_buku']; ?>" class="col-sm-3 col-form-label">Penerbit</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="penerbit<?= $buku['id_buku']; ?>" name="penerbit" value="<?= esc($buku['penerbit']); ?>">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="tempatTerbit<?= $buku['id_buku']; ?>" class="col-sm-3 col-form-label">Tempat Terbit</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tempatTerbit<?= $buku['id_buku']; ?>" name="tempatTerbit" value="<?= esc($buku['tempatTerbit']); ?>">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="tahunTerbit<?= $buku['id_buku']; ?>" class="col-sm-3 col-form-label">Tahun Terbit</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tahunTerbit<?= $buku['id_buku']; ?>" name="tahunTerbit" value="<?= esc($buku['tahunTerbit']); ?>">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="bahasa<?= $buku['id_buku']; ?>" class="col-sm-3 col-form-label">Bahasa</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="bahasa<?= $buku['id_buku']; ?>" name="bahasa" value="<?= esc($buku['bahasa']); ?>">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="jenisBuku<?= $buku['id_buku']; ?>" class="col-sm-3 col-form-label">Jenis Buku</label>
                            <div class="col-sm-9">
                                <select class="form-select form-control" type="text" name="jenisBuku" id="jenisBuku<?= $buku['id_buku']; ?>">
                                    <option>Pilih</option>
                                    <option value="Koleksi Khusus" <?= ($buku['jenisBuku'] === 'Koleksi Khusus') ? 'selected' : ''; ?>>Koleksi Khusus</option>
                                    <option value="Umum" <?= ($buku['jenisBuku'] === 'Umum') ? 'selected' : ''; ?>>Umum</option>
                                    <option value="Unggulan" <?= ($buku['jenisBuku'] === 'Unggulan') ? 'selected' : ''; ?>>Unggulan</option>
                                    <option value="Arsip" <?= ($buku['jenisBuku'] === 'Arsip') ? 'selected' : ''; ?>>Arsip</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="rak<?= $buku['id_buku']; ?>" class="col-sm-3 col-form-label">Lokasi Buku</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="rak<?= $buku['id_buku']; ?>" name="rak">
                                    <option value="">Pilih Lokasi</option>
                                    <option value="Rak 000" <?= ($buku['rak'] === 'Rak 000') ? 'selected' : ''; ?>>Rak 000</option>
                                    <option value="Rak 100" <?= ($buku['rak'] === 'Rak 100') ? 'selected' : ''; ?>>Rak 100</option>
                                    <option value="Rak 200" <?= ($buku['rak'] === 'Rak 200') ? 'selected' : ''; ?>>Rak 200</option>
                                    <option value="Rak 300" <?= ($buku['rak'] === 'Rak 300') ? 'selected' : ''; ?>>Rak 300</option>
                                    <option value="Rak 400" <?= ($buku['rak'] === 'Rak 400') ? 'selected' : ''; ?>>Rak 400</option>
                                    <option value="Rak 500" <?= ($buku['rak'] === 'Rak 500') ? 'selected' : ''; ?>>Rak 500</option>
                                    <option value="Rak 600" <?= ($buku['rak'] === 'Rak 600') ? 'selected' : ''; ?>>Rak 600</option>
                                    <option value="Rak 700" <?= ($buku['rak'] === 'Rak 700') ? 'selected' : ''; ?>>Rak 700</option>
                                    <option value="Rak 800" <?= ($buku['rak'] === 'Rak 800') ? 'selected' : ''; ?>>Rak 800</option>
                                    <option value="Rak 900" <?= ($buku['rak'] === 'Rak 900') ? 'selected' : ''; ?>>Rak 900</option>
                                    <option value="Rak Koleksi Khusus" <?= ($buku['rak'] === 'Rak Koleksi Khusus') ? 'selected' : ''; ?>>Rak Koleksi Khusus</option>
                                    <option value="Rak Koleksi Unggulan" <?= ($buku['rak'] === 'Rak Koleksi Unggulan') ? 'selected' : ''; ?>>Rak Koleksi Unggulan</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="kategoriBuku<?= $buku['id_buku']; ?>" class="col-sm-3 col-form-label">Kategori Buku</label>
                            <div class="col-sm-9">
                                <select class="form-select form-control" type="text" name="kategoriBuku" id="kategoriBuku<?= $buku['id_buku']; ?>" onchange="toggleNomorSeriEdit(<?= $buku['id_buku']; ?>)">
                                    <option>Pilih</option>
                                    <option value="Karya Umum" <?= ($buku['kategoriBuku'] === 'Karya Umum') ? 'selected' : ''; ?>>000 - Karya Umum</option>
                                    <option value="Ilmu Filsafat" <?= ($buku['kategoriBuku'] === 'Ilmu Filsafat') ? 'selected' : ''; ?>>100 - Ilmu Filsafat</option>
                                    <option value="Agama" <?= ($buku['kategoriBuku'] === 'Agama') ? 'selected' : ''; ?>>200 - Agama</option>
                                    <option value="Ilmu Sosial" <?= ($buku['kategoriBuku'] === 'Ilmu Sosial') ? 'selected' : ''; ?>>300 - Ilmu Sosial</option>
                                    <option value="Ilmu Bahasa" <?= ($buku['kategoriBuku'] === 'Ilmu Bahasa') ? 'selected' : ''; ?>>400 - Ilmu Bahasa</option>
                                    <option value="Ilmu Murni/Pasti" <?= ($buku['kategoriBuku'] === 'Ilmu Murni/Pasti') ? 'selected' : ''; ?>>500 - Ilmu Murni/Pasti</option>
                                    <option value="Ilmu Terapan" <?= ($buku['kategoriBuku'] === 'Ilmu Terapan') ? 'selected' : ''; ?>>600 - Ilmu Terapan</option>
                                    <option value="Kesenian dan Olahraga" <?= ($buku['kategoriBuku'] === 'Kesenian dan Olahraga') ? 'selected' : ''; ?>>700 - Kesenian dan Olahraga</option>
                                    <option value="Kesusastraan" <?= ($buku['kategoriBuku'] === 'Kesusastraan') ? 'selected' : ''; ?>>800 - Kesusastraan</option>
                                    <option value="Sejarah dan Geografi" <?= ($buku['kategoriBuku'] === 'Sejarah dan Geografi') ? 'selected' : ''; ?>>900 - Sejarah dan Geografi</option>
                                    <option value="Arsip" <?= ($buku['kategoriBuku'] === 'Arsip') ? 'selected' : ''; ?>>Arsip</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-2" id="nomorSeriContainerEdit<?= $buku['id_buku']; ?>" style="display: <?= ($buku['kategoriBuku'] === 'Arsip') ? 'flex' : 'none'; ?>;">
                            <label for="nomorSeriEdit<?= $buku['id_buku']; ?>" class="col-sm-3 col-form-label">Nomor Seri</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nomorSeriEdit<?= $buku['id_buku']; ?>" name="nomorSeri" value="<?= esc($buku['nomorSeri']); ?>">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="eksemplarEdit<?= $buku['id_buku']; ?>" class="col-sm-3 col-form-label">Jumlah Eksemplar</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="eksemplarEdit<?= $buku['id_buku']; ?>" name="eksemplar" min="1" max="100" value="<?= $buku['jumlah_eksemplar']; ?>" oninput="generatePreviewKodeEksemplarEdit(<?= $buku['id_buku']; ?>)">
                                <small class="text-muted">Jumlah eksemplar saat ini: <?= $buku['jumlah_eksemplar']; ?> (maksimal 100)</small>
                            </div>
                        </div>

                        <!-- Field Kode Eksemplar Edit -->
                        <div class="row mb-2">
                            <label for="" class="col-sm-3 col-form-label">Kode Eksemplar</label>
                            <div class="col-sm-9">
                                <?php
                                // Ekstrak prefix, nomor, dan suffix dari kodeEksemplar yang ada
                                $currentKode = $buku['kodeEksemplar'] ?? '';
                                $extractedPrefix = '';
                                $extractedSuffix = '';
                                $extractedNomor = 1;

                                if (!empty($currentKode)) {
                                    // Pattern untuk mencocokkan format: [prefix][5 digit][suffix]
                                    // Contoh: p00001s, ABC00123XYZ, 00001, p00001, 00001s
                                    if (preg_match('/^([a-zA-Z]*)(\d{5})([a-zA-Z]*)$/', $currentKode, $matches)) {
                                        $extractedPrefix = $matches[1];
                                        $extractedNomor = intval($matches[2]);
                                        $extractedSuffix = $matches[3];
                                    }
                                    // Fallback jika format tidak sesuai, coba pattern yang lebih fleksibel
                                    elseif (preg_match('/^([a-zA-Z]*)(\d+)([a-zA-Z]*)$/', $currentKode, $matches)) {
                                        $extractedPrefix = $matches[1];
                                        $extractedNomor = intval($matches[2]);
                                        $extractedSuffix = $matches[3];
                                    }
                                }
                                ?>
                                <div class="row g-2 align-items-center mb-3">
                                    <div class="col-md-3">
                                        <label class="form-label mb-0">Prefix:</label>
                                        <input type="text" class="form-control" id="kodePrefixEdit<?= $buku['id_buku']; ?>" name="kode_prefix" maxlength="3" placeholder="p" value="<?= esc($extractedPrefix); ?>" oninput="generatePreviewKodeEksemplarEdit(<?= $buku['id_buku']; ?>)">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label mb-0">Suffix:</label>
                                        <input type="text" class="form-control" id="kodeSuffixEdit<?= $buku['id_buku']; ?>" name="kode_suffix" maxlength="3" placeholder="s" value="<?= esc($extractedSuffix); ?>" oninput="generatePreviewKodeEksemplarEdit(<?= $buku['id_buku']; ?>)">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label mb-0">Nomor Mulai:</label>
                                        <input type="number" class="form-control" id="nomorMulaiEdit<?= $buku['id_buku']; ?>" name="nomor_mulai" min="1" value="<?= $extractedNomor; ?>" oninput="generatePreviewKodeEksemplarEdit(<?= $buku['id_buku']; ?>)">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-info btn-sm mt-4" onclick="togglePreviewEdit(<?= $buku['id_buku']; ?>)">
                                            <i class="fas fa-eye"></i> Preview
                                        </button>
                                    </div>
                                </div>

                                <!-- Preview Kode Eksemplar Edit -->
                                <div id="previewContainerEdit<?= $buku['id_buku']; ?>" style="display: none;">
                                    <div class="card">
                                        <div class="card-header bg-light">
                                            <h6 class="mb-0">Preview Kode Eksemplar yang akan dibuat:</h6>
                                        </div>
                                        <div class="card-body" style="max-height: 200px; overflow-y: auto;">
                                            <div id="previewKodeListEdit<?= $buku['id_buku']; ?>" class="row g-2">
                                                <!-- Preview codes will be generated here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <small class="text-muted">
                                    Format: [prefix][5 digit angka][suffix]. Contoh: p00001s, p00002s, dst.<br>
                                    <?php if (!empty($currentKode)): ?>
                                        <strong>Kode saat ini:</strong> <?= esc($currentKode); ?>
                                    <?php endif; ?>
                                </small>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="isbn<?= $buku['id_buku']; ?>" class="col-sm-3 col-form-label">ISBN</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="isbn<?= $buku['id_buku']; ?>" name="isbn" value="<?= esc($buku['isbn']); ?>">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="tampilkan<?= $buku['id_buku']; ?>" class="col-sm-3 col-form-label">OPAC</label>
                            <div class="col-sm-9">
                                <select class="form-select form-control" type="text" name="tampilkan" id="tampilkan<?= $buku['id_buku']; ?>">
                                    <option>Pilih</option>
                                    <option value="Tampilkan Sebagai Buku Rekomendasi" <?= ($buku['tampilkan'] === 'Tampilkan Sebagai Buku Rekomendasi') ? 'selected' : ''; ?>>Tampilkan Sebagai Buku Rekomendasi</option>
                                    <option value="Tampilkan Sebagai Buku Favorit" <?= ($buku['tampilkan'] === 'Tampilkan Sebagai Buku Favorit') ? 'selected' : ''; ?>>Tampilkan Sebagai Buku Favorit</option>
                                    <option value="Tampilkan Sebagai Katalog" <?= ($buku['tampilkan'] === 'Tampilkan Sebagai Katalog') ? 'selected' : ''; ?>>Tampilkan Sebagai Katalog</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="status<?= $buku['id_buku']; ?>" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-select form-control" type="text" name="status" id="status<?= $buku['id_buku']; ?>">
                                    <option>Pilih Status</option>
                                    <option value="Boleh Dipinjam" <?= ($buku['status'] === 'Boleh Dipinjam') ? 'selected' : ''; ?>>Boleh Dipinjam</option>
                                    <option value="Belum Bisa Dipinjam" <?= ($buku['status'] === 'Belum Bisa Dipinjam') ? 'selected' : ''; ?>>Belum Bisa Dipinjam</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="keterangan<?= $buku['id_buku']; ?>" class="col-sm-3 col-form-label">Deskripsi Fisik</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="keterangan" id="keterangan<?= $buku['id_buku']; ?>"><?= esc($buku['keterangan']); ?></textarea>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="foto<?= $buku['id_buku']; ?>" class="col-sm-3 col-form-label">Sampul Buku</label>
                            <div class="col-sm-2">
                                <?php if (!empty($buku['foto']) && $buku['foto'] !== 'no_cover.jpeg'): ?>
                                    <img src="<?= base_url("img/perpustakaan/" . $buku['foto']); ?>" alt="Cover" class="img-thumbnail img-preview-edit-<?= $buku['id_buku']; ?>">
                                <?php else: ?>
                                    <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview-edit-<?= $buku['id_buku']; ?>">
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-7">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="foto<?= $buku['id_buku']; ?>" name="foto" onchange="previewImgEdit('foto<?= $buku['id_buku']; ?>', <?= $buku['id_buku']; ?>)">
                                    <label class="custom-file-label" for="foto<?= $buku['id_buku']; ?>">Gambar Maksimal 2 Mb</label>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
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
                <th style="text-align: center;">Status</th>
                <th style="text-align: center;">Eksemplar</th>
            </tr>
        </thead>

        <tbody style="text-align: center; font-size: 10pt;">
            <?php
            $no = 1;
            // Pastikan $data_buku berisi SEMUA data dari database
            foreach ($data_buku as $buku):
            ?>
                <tr>
                    <td style="text-align: center;"><?= $no++; ?></td>
                    <td style="text-align: center;"><?= $buku['kode']; ?></td>
                    <td style="text-align: center;">
                        <img src="<?= base_url("img/perpustakaan/" . $buku['foto']); ?>" alt="" width="80px">
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

    <!-- Info total data -->
    <div style="margin-top: 10px; font-size: 10pt;">
        <strong>Total Judul Buku: <?= count($data_buku); ?></strong><br>
        <strong>Total Eksemplar: <?= $totalEksemplar; ?></strong>
    </div>
</div>

<style>
    @media print {

        /* Reset semua style yang tidak perlu */
        * {
            -webkit-print-color-adjust: exact !important;
            color-adjust: exact !important;
        }

        body {
            margin: 0;
            padding: 10px;
            font-family: Arial, sans-serif;
        }

        /* Sembunyikan elemen yang tidak perlu saat print */
        .no-print {
            display: none !important;
        }

        /* Style untuk table */
        table {
            width: 100% !important;
            border-collapse: collapse !important;
            font-size: 8pt !important;
        }

        th,
        td {
            border: 1px solid #000 !important;
            padding: 3px !important;
            font-size: 8pt !important;
        }

        th {
            background-color: #f0f0f0 !important;
            font-weight: bold !important;
        }

        /* Ukuran gambar lebih kecil untuk print */
        img {
            max-width: 60px !important;
            max-height: 80px !important;
        }

        /* Header print */
        #judul-inv {
            margin-bottom: 10px !important;
        }

        #judul-inv h6 {
            margin: 0 !important;
            font-size: 12pt !important;
        }

        /* Page break control */
        .page-break {
            page-break-before: always;
        }

        /* Hindari page break di tengah row */
        tr {
            page-break-inside: avoid;
        }
    }
</style>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var totalBuku = <?php echo $totalBuku; ?>;
    var totalEksemplar = <?php echo $totalEksemplar; ?>;

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

    // Kategori selection untuk nomor seri di ADD modal
    document.addEventListener('DOMContentLoaded', function() {
        const kategoriSelect = document.getElementById('kategoriBuku');
        const nomorSeriContainer = document.getElementById('nomorSeriContainer');

        if (kategoriSelect && nomorSeriContainer) {
            function toggleNomorSeri() {
                const kategori = kategoriSelect.value;
                if (kategori === 'Arsip') {
                    nomorSeriContainer.style.display = 'flex';
                } else {
                    nomorSeriContainer.style.display = 'none';
                    document.getElementById('nomorSeri').value = '';
                }
            }

            kategoriSelect.addEventListener('change', toggleNomorSeri);
            toggleNomorSeri();
        }
    });

    // Function untuk toggle nomor seri di EDIT modal
    function toggleNomorSeriEdit(bookId) {
        const kategori = document.getElementById('kategoriBuku' + bookId).value;
        const nomorSeriContainer = document.getElementById('nomorSeriContainerEdit' + bookId);

        if (kategori === 'Arsip') {
            nomorSeriContainer.style.display = 'flex';
        } else {
            nomorSeriContainer.style.display = 'none';
            document.getElementById('nomorSeriEdit' + bookId).value = '';
        }
    }

    function printFilteredData() {
        const keyword = document.querySelector('input[name="keyword"]')?.value || '';
        const pengarang = document.querySelector('select[name="pengarang"]')?.value || '';
        const penerbit = document.querySelector('select[name="penerbit"]')?.value || '';
        const tempatTerbit = document.querySelector('select[name="tempatTerbit"]')?.value || '';
        const tahunTerbit = document.querySelector('select[name="tahunTerbit"]')?.value || '';
        const kategoriBuku = document.querySelector('select[name="kategoriBuku"]')?.value || '';
        const status = document.querySelector('select[name="status"]')?.value || '';

        const hasActiveFilter = keyword || pengarang || penerbit || tempatTerbit ||
            tahunTerbit || kategoriBuku || status;

        if (!hasActiveFilter) {
            if (!confirm('Tidak ada filter yang aktif. Apakah Anda ingin print semua data?')) {
                return;
            }
        }

        const loadingAlert = document.createElement('div');
        loadingAlert.className = 'alert alert-info position-fixed top-50 start-50 translate-middle';
        loadingAlert.style.zIndex = '9999';
        loadingAlert.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memuat data untuk print...';
        document.body.appendChild(loadingAlert);

        const params = new URLSearchParams();
        if (keyword) params.append('keyword', keyword);
        if (pengarang) params.append('pengarang', pengarang);
        if (penerbit) params.append('penerbit', penerbit);
        if (tempatTerbit) params.append('tempatTerbit', tempatTerbit);
        if (tahunTerbit) params.append('tahunTerbit', tahunTerbit);
        if (kategoriBuku) params.append('kategoriBuku', kategoriBuku);
        if (status) params.append('status', status);

        const url = '<?= base_url('getFilteredDataBuku') ?>' + (params.toString() ? '?' + params.toString() : '');

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            timeout: 30000,
            success: function(response) {
                loadingAlert.remove();

                if (response.success && response.data && response.data.length > 0) {
                    // Update print content dengan data yang di-filter
                    updatePrintContent(response.data, response.totalBuku, response.totalEksemplar, response.filters);

                    // Tunggu sebentar untuk memastikan DOM sudah terupdate
                    setTimeout(() => {
                        printTable();
                    }, 100);
                } else {
                    alert('Tidak ada data yang ditemukan dengan filter yang dipilih');
                }
            },
            error: function(xhr, status, error) {
                loadingAlert.remove();

                let errorMsg = 'Terjadi kesalahan saat memuat data';

                if (xhr.status === 404) {
                    errorMsg = 'Endpoint tidak ditemukan (404). Periksa route dan controller.';
                } else if (xhr.status === 500) {
                    errorMsg = 'Server error (500). Periksa log server.';
                } else if (status === 'timeout') {
                    errorMsg = 'Request timeout. Data terlalu besar atau server lambat.';
                }

                alert(errorMsg);
            }
        });
    }

    // Function untuk load semua data sebelum print
    function loadAllDataAndPrint() {
        $.ajax({
            url: '<?= base_url('getAllDataBuku') ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    updatePrintContent(response.data);
                    printTable();
                } else {
                    alert('Gagal memuat data');
                }
            },
            error: function() {
                alert('Terjadi kesalahan saat memuat data');
            }
        });
    }

    // Function untuk update content print dengan semua data
    // Function untuk update content print dengan data yang di-filter
    function updatePrintContent(allData, totalBuku = null, totalEksemplar = null, filters = null) {
        let tbody = '';
        allData.forEach(function(buku, index) {
            tbody += `
            <tr>
                <td style="text-align: center;">${index + 1}</td>
                <td style="text-align: center;">${buku.kode || '-'}</td>
                <td style="text-align: center;">
                    <img src="<?= base_url("img/perpustakaan/") ?>${buku.foto || 'default.jpg'}" alt="" width="60px" onerror="this.src='<?= base_url("img/perpustakaan/default.jpg") ?>'">
                </td>
                <td style="text-align: center;">${buku.judul || '-'}</td>
                <td style="text-align: center;">${buku.pengarang || '-'}</td>
                <td style="text-align: center;">${buku.penerbit || '-'}</td>
                <td style="text-align: center;">${buku.tempatTerbit || '-'}</td>
                <td style="text-align: center;">${buku.tahunTerbit || '-'}</td>
                <td style="text-align: center;">${buku.kategoriBuku || '-'}</td>
                <td style="text-align: center;">${buku.rak || '-'}</td>
                <td style="text-align: center;">${buku.status || '-'}</td>
                <td style="text-align: center;">${buku.eksemplar || 0}</td>
            </tr>
        `;
        });

        document.querySelector('#printBuku tbody').innerHTML = tbody;

        // Hitung total jika tidak diberikan
        const calculatedTotalBuku = totalBuku !== null ? totalBuku : allData.length;
        const calculatedTotalEksemplar = totalEksemplar !== null ? totalEksemplar :
            allData.reduce((sum, item) => sum + parseInt(item.eksemplar || 0), 0);

        const totalInfo = document.querySelector('#printBuku .total-info');
        if (totalInfo) {
            let filterInfo = '';
            if (filters) {
                const activeFilters = [];
                if (filters.keyword) activeFilters.push(`Keyword: ${filters.keyword}`);
                if (filters.pengarang) activeFilters.push(`Pengarang: ${filters.pengarang}`);
                if (filters.penerbit) activeFilters.push(`Penerbit: ${filters.penerbit}`);
                if (filters.kategoriBuku) activeFilters.push(`Kategori: ${filters.kategoriBuku}`);
                if (filters.status) activeFilters.push(`Status: ${filters.status}`);

                if (activeFilters.length > 0) {
                    filterInfo = `<div style="margin-top: 10px; font-size: 9pt;"><strong>Filter Aktif:</strong> ${activeFilters.join(', ')}</div>`;
                }
            }

            totalInfo.innerHTML = `
            <strong>Total Judul Buku: ${calculatedTotalBuku}</strong><br>
            <strong>Total Eksemplar: ${calculatedTotalEksemplar}</strong>
            ${filterInfo}
        `;
        }
    }

    // Print function
    function printTable() {
        const printContent = document.getElementById('printBuku');
        const printWindow = window.open('', '_blank', 'width=800,height=600');
        printWindow.document.write(`
            <!DOCTYPE html>
            <html>
            <head>
                <title>Data Buku Perpustakaan</title>
                <style>
                    body { margin: 0; padding: 10px; font-family: Arial, sans-serif; }
                    table { width: 100%; border-collapse: collapse; font-size: 8pt; }
                    th, td { border: 1px solid #000; padding: 3px; font-size: 8pt; }
                    th { background-color: #f0f0f0; font-weight: bold; }
                    img { max-width: 60px; max-height: 80px; }
                    .text-center { text-align: center; }
                    .font-weight-bold { font-weight: bold; }
                    tr { page-break-inside: avoid; }
                </style>
            </head>
            <body>
                ${printContent.innerHTML}
            </body>
            </html>
        `);

        printWindow.document.close();
        printWindow.focus();

        setTimeout(function() {
            printWindow.print();
            printWindow.close();
        }, 250);
    }

    // ========== PENGARANG FUNCTIONS FOR ADD MODAL ==========
    let pengarangIndex = 1;

    function addPengarang() {
        const container = document.getElementById('pengarangContainer');
        const newPengarang = document.createElement('div');
        newPengarang.className = 'pengarang-item mb-2';
        newPengarang.setAttribute('data-index', pengarangIndex);

        newPengarang.innerHTML = `
        <div class="row g-2">
            <div class="col-md-6">
                <input type="text" class="form-control" name="pengarang[${pengarangIndex}][nama]" placeholder="Nama Pengarang">
            </div>
            <div class="col-md-5">
                <select class="form-control" name="pengarang[${pengarangIndex}][jenisPengarang]">
                    <option value="">Pilih Role</option>
                    <option value="Pengarang Utama">Pengarang Utama</option>
                    <option value="Pengarang Tambahan">Pengarang Tambahan</option>
                    <option value="Editor">Editor</option>
                    <option value="Penerjemah">Penerjemah</option>
                    <option value="Ilustrator">Ilustrator</option>
                    <option value="Compiler">Compiler</option>
                    <option value="Kontributor">Kontributor</option>
                </select>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger btn-sm remove-pengarang" onclick="removePengarang(${pengarangIndex})">
                    <i class="fas fa-trash"></i> ×
                </button>
            </div>
        </div>
    `;

        container.appendChild(newPengarang);
        pengarangIndex++;
        updateRemoveButtons();
    }

    function removePengarang(index) {
        const pengarangItem = document.querySelector(`[data-index="${index}"]`);
        if (pengarangItem) {
            pengarangItem.remove();
            updateRemoveButtons();
        }
    }

    function updateRemoveButtons() {
        const pengarangItems = document.querySelectorAll('#pengarangContainer .pengarang-item');
        const removeButtons = document.querySelectorAll('#pengarangContainer .remove-pengarang');

        if (pengarangItems.length > 1) {
            removeButtons.forEach(button => {
                button.style.display = 'block';
            });
        } else {
            removeButtons.forEach(button => {
                button.style.display = 'none';
            });
        }
    }

    // ========== PENGARANG FUNCTIONS FOR EDIT MODAL ==========
    function addPengarangEdit(bukuId) {
        const container = document.getElementById(`pengarangContainer${bukuId}`);
        const currentItems = container.querySelectorAll('.pengarang-item');
        const newIndex = Math.max(...Array.from(currentItems).map(item => parseInt(item.dataset.index))) + 1;

        const newPengarang = document.createElement('div');
        newPengarang.className = 'pengarang-item mb-2';
        newPengarang.setAttribute('data-index', newIndex);

        newPengarang.innerHTML = `
        <div class="row g-2">
            <div class="col-md-6">
                <input type="text" class="form-control" name="pengarang[${newIndex}][nama]" placeholder="Nama Pengarang">
            </div>
            <div class="col-md-5">
                <select class="form-control" name="pengarang[${newIndex}][jenisPengarang]">
                    <option value="">Pilih Role</option>
                    <option value="Pengarang Utama">Pengarang Utama</option>
                    <option value="Pengarang Tambahan">Pengarang Tambahan</option>
                    <option value="Editor">Editor</option>
                    <option value="Penerjemah">Penerjemah</option>
                    <option value="Ilustrator">Ilustrator</option>
                    <option value="Compiler">Compiler</option>
                    <option value="Kontributor">Kontributor</option>
                </select>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger btn-sm remove-pengarang" onclick="removePengarangEdit(${newIndex}, ${bukuId})">
                    <i class="fas fa-trash"></i> ×
                </button>
            </div>
        </div>
    `;

        container.appendChild(newPengarang);
        updateRemoveButtonsEdit(bukuId);
    }

    function removePengarangEdit(index, bukuId) {
        const container = document.getElementById(`pengarangContainer${bukuId}`);
        const pengarangItem = container.querySelector(`[data-index="${index}"]`);
        if (pengarangItem) {
            pengarangItem.remove();
            updateRemoveButtonsEdit(bukuId);
            reindexPengarangEdit(bukuId);
        }
    }

    function updateRemoveButtonsEdit(bukuId) {
        const container = document.getElementById(`pengarangContainer${bukuId}`);
        const pengarangItems = container.querySelectorAll('.pengarang-item');
        const removeButtons = container.querySelectorAll('.remove-pengarang');

        if (pengarangItems.length > 1) {
            removeButtons.forEach(button => {
                button.style.display = 'block';
            });
        } else {
            removeButtons.forEach(button => {
                button.style.display = 'none';
            });
        }
    }

    function reindexPengarangEdit(bukuId) {
        const container = document.getElementById(`pengarangContainer${bukuId}`);
        const items = container.querySelectorAll('.pengarang-item');

        items.forEach((item, index) => {
            item.setAttribute('data-index', index);
            const namaInput = item.querySelector('input[name*="[nama]"]');
            const jenisSelect = item.querySelector('select[name*="[jenisPengarang]"]');
            const removeBtn = item.querySelector('.remove-pengarang');

            if (namaInput) namaInput.name = `pengarang[${index}][nama]`;
            if (jenisSelect) jenisSelect.name = `pengarang[${index}][jenisPengarang]`;
            if (removeBtn) removeBtn.setAttribute('onclick', `removePengarangEdit(${index}, ${bukuId})`);
        });
    }

    // ========== IMAGE PREVIEW FUNCTIONS ==========
    function previewImg(inputId) {
        const input = document.getElementById(inputId);
        const preview = document.querySelector('.img-preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewImgEdit(inputId, bukuId) {
        const input = document.getElementById(inputId);
        const preview = document.querySelector(`.img-preview-edit-${bukuId}`);

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // ========== KODE EKSEMPLAR PREVIEW FUNCTIONS ==========
    let previewVisible = false;

    function generatePreviewKodeEksemplar() {
        const prefix = document.getElementById('kodePrefix').value || '';
        const suffix = document.getElementById('kodeSuffix').value || '';
        const jumlahEksemplar = parseInt(document.getElementById('eksemplar').value) || 1;
        const nomorMulai = parseInt(document.getElementById('nomorMulai').value) || 1;

        const previewContainer = document.getElementById('previewKodeList');
        previewContainer.innerHTML = '';

        for (let i = 0; i < Math.min(jumlahEksemplar, 100); i++) {
            const nomorUrut = nomorMulai + i;
            const nomorFormatted = nomorUrut.toString().padStart(5, '0');
            const kodeEksemplar = prefix + nomorFormatted + suffix;

            const codeElement = document.createElement('div');
            codeElement.className = 'col-md-3 col-sm-4 col-6 mb-2';
            codeElement.innerHTML = `
            <div class="badge bg-primary text-wrap" style="font-family: 'Courier New', monospace; font-size: 1rem; padding: 0.5rem 0.75rem; color: white;">
                ${kodeEksemplar || `[prefix]${nomorFormatted}[suffix]`}
            </div>
        `;
            previewContainer.appendChild(codeElement);
        }

        if (jumlahEksemplar > 100) {
            const warningElement = document.createElement('div');
            warningElement.className = 'col-12';
            warningElement.innerHTML = `
            <div class="alert alert-warning mt-2" role="alert">
                <i class="fas fa-exclamation-triangle"></i> 
                Hanya menampilkan 100 kode pertama. Total yang akan dibuat: ${jumlahEksemplar}
            </div>
        `;
            previewContainer.appendChild(warningElement);
        }
    }

    function togglePreview() {
        const previewContainer = document.getElementById('previewContainer');
        const button = event.target.closest('button');

        previewVisible = !previewVisible;

        if (previewVisible) {
            previewContainer.style.display = 'block';
            button.innerHTML = '<i class="fas fa-eye-slash"></i> Sembunyikan';
            button.className = 'btn btn-secondary btn-sm mt-4';
            generatePreviewKodeEksemplar();
        } else {
            previewContainer.style.display = 'none';
            button.innerHTML = '<i class="fas fa-eye"></i> Preview';
            button.className = 'btn btn-info btn-sm mt-4';
        }
    }

    // ========== EDIT MODAL KODE EKSEMPLAR FUNCTIONS ==========
    function generatePreviewKodeEksemplarEdit(bookId) {
        const eksemplar = parseInt(document.getElementById('eksemplarEdit' + bookId).value) || 1;
        const prefix = document.getElementById('kodePrefixEdit' + bookId).value || '';
        const suffix = document.getElementById('kodeSuffixEdit' + bookId).value || '';
        const nomorMulai = parseInt(document.getElementById('nomorMulaiEdit' + bookId).value) || 1;

        const previewContainer = document.getElementById('previewKodeListEdit' + bookId);
        previewContainer.innerHTML = '';

        for (let i = 0; i < Math.min(eksemplar, 100); i++) {
            const nomor = (nomorMulai + i).toString().padStart(5, '0');
            const kode = prefix + nomor + suffix;

            const codeElement = document.createElement('div');
            codeElement.className = 'col-md-3 col-sm-4 col-6 mb-2';
            codeElement.innerHTML = `
                <div class="badge bg-primary text-wrap" style="font-family: 'Courier New', monospace; font-size: 1rem; padding: 0.5rem 0.75rem; color: white;">
                    ${kode || `[prefix]${nomor}[suffix]`}
                </div>
            `;
            previewContainer.appendChild(codeElement);
        }

        if (eksemplar > 100) {
            const warningElement = document.createElement('div');
            warningElement.className = 'col-12';
            warningElement.innerHTML = `
                <div class="alert alert-warning mt-2" role="alert">
                    <i class="fas fa-exclamation-triangle"></i> 
                    Hanya menampilkan 100 kode pertama. Total yang akan dibuat: ${eksemplar}
                </div>
            `;
            previewContainer.appendChild(warningElement);
        }
    }

    function togglePreviewEdit(bookId) {
        const previewContainer = document.getElementById('previewContainerEdit' + bookId);
        const isVisible = previewContainer.style.display !== 'none';

        if (isVisible) {
            previewContainer.style.display = 'none';
        } else {
            generatePreviewKodeEksemplarEdit(bookId);
            previewContainer.style.display = 'block';
        }
    }

    // ========== FORM SUBMISSION ==========
    // ADD FORM validation and submission
    document.getElementById('form').addEventListener('submit', function(e) {
        const pengarangInputs = document.querySelectorAll('#pengarangContainer input[name*="[nama]"]');
        let hasValidPengarang = false;

        pengarangInputs.forEach(input => {
            if (input.value.trim() !== '') {
                hasValidPengarang = true;
            }
        });

        if (!hasValidPengarang) {
            e.preventDefault();
            alert('Minimal satu pengarang harus diisi!');
            return;
        }

        e.preventDefault();

        const formData = new FormData(this);
        const jumlahEksemplar = parseInt(document.getElementById('eksemplar').value) || 1;
        const prefix = document.getElementById('kodePrefix').value || '';
        const suffix = document.getElementById('kodeSuffix').value || '';
        const nomorMulai = parseInt(document.getElementById('nomorMulai').value) || 1;

        if (jumlahEksemplar > 10) {
            if (!confirm(`Anda akan membuat ${jumlahEksemplar} data buku. Lanjutkan?`)) {
                return;
            }
        }

        const kodeEksemplarArray = [];
        for (let i = 0; i < jumlahEksemplar; i++) {
            const nomorUrut = nomorMulai + i;
            const nomorFormatted = nomorUrut.toString().padStart(5, '0');
            const kodeEksemplar = prefix + nomorFormatted + suffix;
            kodeEksemplarArray.push(kodeEksemplar);
        }

        formData.append('kode_eksemplar_array', JSON.stringify(kodeEksemplarArray));
        formData.append('jumlah_eksemplar_total', jumlahEksemplar);

        const submitButton = this.querySelector('button[type="submit"]');
        const originalText = submitButton.innerHTML;
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
        submitButton.disabled = true;

        fetch('/saveDataBuku', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP Error: ${response.status} ${response.statusText}`);
                }

                const contentType = response.headers.get('content-type');
                if (!contentType || !contentType.includes('application/json')) {
                    throw new Error('Response is not JSON. Possible redirect or HTML error page.');
                }

                return response.json();
            })
            .then(data => {
                console.log('Server response:', data);

                if (data.success) {
                    if (data.errors && data.errors.length > 0) {
                        console.warn('Warnings during save:', data.errors);
                    }

                    const modalElement = document.getElementById('tambahKegiatan');
                    const modal = new bootstrap.Modal(modalElement);
                    modal.hide();

                    window.location.href = '/dataBuku';

                } else {
                    throw new Error(data.message || 'Server returned success=false');
                }
            })
            .catch(error => {
                console.error('Error details:', error);

                let errorMessage = 'Terjadi kesalahan saat menyimpan data';

                if (error.message.includes('JSON')) {
                    errorMessage = 'Server mengembalikan response yang tidak valid. Periksa log server.';
                } else if (error.message.includes('HTTP Error')) {
                    errorMessage = `Server error: ${error.message}`;
                } else if (error.message) {
                    errorMessage = error.message;
                }

                alert(errorMessage);
            })
            .finally(() => {
                submitButton.innerHTML = originalText;
                submitButton.disabled = false;
            });
    });

    // ========== OTHER FUNCTIONS ==========
    function deleteAllCopies(allIds, judul) {
        if (confirm(`Apakah Anda yakin ingin menghapus semua eksemplar dari buku "${judul}"?`)) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '<?= base_url("deleteMultipleBuku"); ?>';

            const csrfField = document.createElement('input');
            csrfField.type = 'hidden';
            csrfField.name = '<?= csrf_token(); ?>';
            csrfField.value = '<?= csrf_hash(); ?>';
            form.appendChild(csrfField);

            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            form.appendChild(methodField);

            const idsField = document.createElement('input');
            idsField.type = 'hidden';
            idsField.name = 'book_ids';
            idsField.value = allIds;
            form.appendChild(idsField);

            document.body.appendChild(form);
            form.submit();
        }
    }

    // ========== DOCUMENT READY INITIALIZATION ==========
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize add modal functions
        generatePreviewKodeEksemplar();
        updateRemoveButtons();

        // Initialize edit modal functions for each book
        <?php if (isset($data_buku)): ?>
            <?php foreach ($data_buku as $buku): ?>
                updateRemoveButtonsEdit(<?= $buku['id_buku']; ?>);
                generatePreviewKodeEksemplarEdit(<?= $buku['id_buku']; ?>);

                // Initialize nomor seri toggle for edit modal
                const kategoriSelect<?= $buku['id_buku']; ?> = document.getElementById('kategoriBuku<?= $buku['id_buku']; ?>');
                if (kategoriSelect<?= $buku['id_buku']; ?>) {
                    toggleNomorSeriEdit(<?= $buku['id_buku']; ?>);
                }
            <?php endforeach; ?>
        <?php endif; ?>
    });
</script>

<?= $this->endSection(); ?>