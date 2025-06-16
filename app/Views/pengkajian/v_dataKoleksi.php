<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Koleksi <?= $judul ?></h6>
            <small class="text-muted">
                Showing <?= (($currentPage - 1) * $perPage) + 1 ?> to <?= min($currentPage * $perPage, $totalData) ?> of <?= $totalData ?> entries
            </small>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <form method="GET" action="<?= base_url("/koleksi/{$kode_kategori}"); ?>" class="d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search"
                                placeholder="Cari berdasarkan nama, no registrasi, no inventaris, kode LK, atau keadaan..."
                                value="<?= esc($search); ?>">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i> Cari
                                </button>
                                <?php if (!empty($search)): ?>
                                    <a href="<?= base_url("/koleksi/{$kode_kategori}"); ?>" class="btn btn-secondary">
                                        <i class="fas fa-times"></i> Reset
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
                <?php if (!empty($search)): ?>
                    <div class="col-md-6">
                        <div class="alert alert-info mb-0 py-2">
                            <small><i class="fas fa-info-circle"></i> Menampilkan hasil pencarian untuk: <strong>"<?= esc($search); ?>"</strong></small>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead class="table-dark" style="text-align: center; font-size: 10pt;">
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Kode Lembar Kerja</th>
                            <th style="text-align: center;">No Inventarisasi</th>
                            <th style="text-align: center;">No Registrasi</th>
                            <th style="text-align: center;">Gambar</th>
                            <th style="text-align: center;">Nama</th>
                            <th style="text-align: center;">Keadaan</th>
                            <th style="text-align: center;">Aksi</th>
                            <th style="text-align: center;">Perawatan</th>
                        </tr>
                    </thead>

                    <tbody style="text-align: center; font-size: 10pt;">
                        <?php
                        $no = (($currentPage - 1) * $perPage) + 1;
                        foreach ($data_koleksi as $k): ?>
                            <tr>
                                <td style="text-align: center;"><?= $no++; ?></td>
                                <td style="text-align: center;"><?= $k['kode_lk']; ?></td>
                                <td style="text-align: center;"><?= $k['kode_kategori']; ?> . <?= $k['no_inventaris']; ?></td>
                                <td style="text-align: center;"><?= $k['no_registrasi']; ?></td>
                                <td style="text-align: center;"><img src="<?= base_url("img/koleksi/" . $k['gambar']); ?>" alt="" width="100px"></td>
                                <td style="text-align: center;"><?= $k['nama_inv']; ?></td>
                                <td style="text-align: center;">
                                    <?php if (session()->get('level') == 'Kepala Museum'): ?>
                                        <?= $k['keadaan']; ?>

                                    <?php endif; ?>
                                    <?php if (session()->get('level') == 'Ketua Pengkajian' || session()->get('level') == 'Petugas Pengkajian' || session()->get('level') == 'Admin/Pengkajian'): ?>
                                        <form action="/updateKeadaan" method="post">
                                            <input type="hidden" name="id" value="<?= $k['id']; ?>">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm  btn-<?php echo ($k['keadaan'] == 'Baik') ? 'success' : (($k['keadaan'] == 'Rusak Ringan') ? 'warning' : (($k['keadaan'] == 'Rusak Sedang') ? 'danger' : 'dark')); ?> btn-update-status dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <?php echo ($k['keadaan'] == 'Baik') ? 'Baik' : (($k['keadaan'] == 'Rusak Ringan') ? 'Rusak Ringan' : (($k['keadaan'] == 'Rusak Sedang') ? 'Rusak Sedang' : 'Rusak Berat')); ?>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item status-option" type="submit" name="keadaan" value="Baik">Baik</button>
                                                    <button class="dropdown-item status-option" type="submit" name="keadaan" value="Rusak Ringan">Rusak Ringan</button>
                                                    <button class="dropdown-item status-option" type="submit" name="keadaan" value="Rusak Sedang">Rusak Sedang</button>
                                                    <button class="dropdown-item status-option" type="submit" name="keadaan" value="Rusak Berat">Rusak Berat</button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php endif; ?>
                                </td>
                                <td style="text-align: center;">
                                    <a href="<?= base_url("/detailKoleksi/{$k['id']}"); ?>" class="btn btn-success btn-sm ">Detail</a>
                                    <?php if (session()->get('level') == 'Ketua Pengkajian' || session()->get('level') == 'Petugas Pengkajian'  || session()->get('level') == 'Admin/Pengkajian'): ?>
                                        <form action="/hapus/<?= $k['id']; ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm " onclick="return confirm('apakah anda yakin?');">Hapus</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if (session()->get('level') == 'Ketua Pengkajian' || session()->get('level') == 'Petugas Pengkajian'  || session()->get('level') == 'Admin/Pengkajian'): ?>
                                        <!-- <a href="<?= base_url("/tambahPerawatan/{$k['no_registrasi']}"); ?>" class="btn btn-primary btn-sm " >Tambah</a> -->
                                    <?php endif; ?>
                                    <a href="<?= base_url("/dataPerawatan/{$k['no_registrasi']}"); ?>" class="btn btn-info btn-sm ">Lihat</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination Controls -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>
                    <small class="text-muted">
                        Halaman <?= $currentPage ?> dari <?= ceil($totalData / $perPage) ?>
                    </small>
                </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm mb-0">
                        <!-- Previous Button -->
                        <?php if ($currentPage > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="<?= base_url("/koleksi/{$kode_kategori}?page=" . ($currentPage - 1)); ?>">
                                    &laquo; Previous
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="page-item disabled">
                                <span class="page-link">&laquo; Previous</span>
                            </li>
                        <?php endif; ?>

                        <!-- Page Numbers -->
                        <?php
                        $totalPages = ceil($totalData / $perPage);
                        $startPage = max(1, $currentPage - 2);
                        $endPage = min($totalPages, $currentPage + 2);

                        // Show first page if not in range
                        if ($startPage > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="<?= base_url("/koleksi/{$kode_kategori}?page=1"); ?>">1</a>
                            </li>
                            <?php if ($startPage > 2): ?>
                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <!-- Page range -->
                        <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                            <li class="page-item <?= ($i == $currentPage) ? 'active' : ''; ?>">
                                <a class="page-link" href="<?= base_url("/koleksi/{$kode_kategori}?page={$i}"); ?>"><?= $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <!-- Show last page if not in range -->
                        <?php if ($endPage < $totalPages): ?>
                            <?php if ($endPage < $totalPages - 1): ?>
                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>
                            <?php endif; ?>
                            <li class="page-item">
                                <a class="page-link" href="<?= base_url("/koleksi/{$kode_kategori}?page={$totalPages}"); ?>"><?= $totalPages; ?></a>
                            </li>
                        <?php endif; ?>

                        <!-- Next Button -->
                        <?php if ($currentPage < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link" href="<?= base_url("/koleksi/{$kode_kategori}?page=" . ($currentPage + 1)); ?>">
                                    Next &raquo;
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="page-item disabled">
                                <span class="page-link">Next &raquo;</span>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>