<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Data Valid</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $valid; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Data Valid tbc</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $validtbc; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Data Anomali</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $anomali; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Data Disclaimer</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $disclaimer; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex py-3  align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Koleksi </h6>
            <div class="d-flex">
                <!-- <button onclick="window.print()" type="submit" class="btn btn-sm btn-primary shadow-s"><i class="fas fa-print fa-sm text-white-50"></i>Print</button> -->
                <a href="/exportExcel" class="btn btn-sm btn-primary mx-2">Export Excel</a>
            </div>
        </div>

        <div class="card-body">
            <form action="" method="get" autocomplete="off">
                <!-- Tempatkan di bagian atas tabel, mungkin di dekat tombol pencarian -->
                <div class="float-left">
                    <?php if ($filter === 'no_image'): ?>
                        <a href="<?= base_url('seluruhKoleksi'); ?>" class="btn btn-secondary btn-sm">Tampilkan Semua Data</a>
                    <?php else: ?>
                        <a href="<?= base_url('seluruhKoleksi?filter=no_image'); ?>" class="btn btn-warning btn-sm">Tampilkan Data Tanpa Gambar</a>
                    <?php endif; ?>
                </div>
                <div class="float-right ml-2 mb-4">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
                <div class="float-right">
                    <input type="text" name="keyword" id="" class="form-control" style="width: 155pt;" placeholder="search">
                </div>



            </form>
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead style="text-align: center; font-size: 10pt;">
                        <tr>
                            <th style="text-align: center;">Kode Lembar Kerja</th>
                            <th style="text-align: center;">No Registrasi</th>
                            <th style="text-align: center;">No Inventaris</th>
                            <th style="text-align: center;">Gambar</th>
                            <th style="text-align: center;">Nama</th>
                            <!-- <th style="text-align: center;">Uraian</th>
                            <th style="text-align: center;">Asal Didapat</th>
                            <th style="text-align: center;">Ukuran</th>
                            <th style="text-align: center;">Cara Didapat</th>
                            <th style="text-align: center;">Tanggal</th>
                            <th style="text-align: center;">Harga</th> -->
                            <th style="text-align: center;">Lokasi</th>
                            <th style="text-align: center;">Keadaan</th>
                            <th style="text-align: center;">Status Data</th>
                            <th style="text-align: center;">Aksi</th>

                        </tr>
                    </thead>

                    <tbody style="text-align: center; font-size: 10pt;">
                        <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $no = 1 + (15 * ($page - 1));
                        foreach ($data_koleksi as $k): ?>
                            <tr>
                                <!-- <td style="text-align: center;"><?= $k['kode_kategori']; ?> . <?= $k['no_inventaris']; ?></td>  -->
                                <td style="text-align: center;"><?= $k['kode_lk']; ?></td>
                                <td style="text-align: center;"><?= $k['no_registrasi']; ?></td>
                                <td style="text-align: center;"><?= $k['kode_kategori']; ?> . <?= $k['no_inventaris']; ?></td>
                                <td style="text-align: center;"><img src="<?= base_url("img/koleksi/" . $k['gambar']); ?>" alt="" width="100px"></td>
                                <td style="text-align: center;"><?= $k['nama_inv']; ?></td>
                                <!-- <td style="text-align: center;"><?= $k['uraian']; ?></td>
                            <td style="text-align: center;"><?= $k['tempat_dapat']; ?></td>
                            <td style="text-align: center;"><?= $k['ukuran']; ?></td>
                            <td style="text-align: center;"><?= $k['cara_dapat']; ?></td>
                            <td style="text-align: center;"><?= $k['tgl_masuk']; ?></td>
                            <td style="text-align: center;"><?= $k['harga']; ?></td> -->
                                <td style="text-align: center;"><?= $k['rak']; ?> <?= $k['lemari']; ?> <?= $k['lokasi']; ?></td>
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
                                    <button type="button" class="btn btn-sm  btn-<?php echo ($k['status'] == 'Valid') ? 'success' : (($k['status'] == 'Valid tbc') ? 'warning' : (($k['status'] == 'Anomali') ? 'danger' : (($k['status'] == 'Disclaimer') ? 'dark' : 'light'))); ?> btn-update-status" aria-haspopup="true" aria-expanded="false">
                                        <?php echo ($k['status'] == 'Valid') ? 'Valid' : (($k['status'] == 'Valid tbc') ? 'Valid tbc' : (($k['status'] == 'Anomali') ? 'Anomali' : (($k['status'] == 'Disclaimer') ? 'Disclaimer' : 'tidak ada status'))); ?>
                                    </button>
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
                                <!-- <td style="text-align: center;">
                                <?php if (session()->get('level') == 'Ketua Pengkajian' || session()->get('level') == 'Petugas Pengkajian'  || session()->get('level') == 'Admin/Pengkajian'): ?>
                                <a href="<?= base_url("/tambahPerawatan/{$k['id']}"); ?>" class="btn btn-primary btn-sm " >Tambah</a>
                                <?php endif; ?>
                                <a href="<?= base_url("/dataPerawatan/{$k['id']}"); ?>" class="btn btn-info btn-sm " >Lihat</a>
                            </td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('default', 'pagination'); ?>
            </div>
        </div>
    </div>
</div>


<!--  -->
<div class="seluruhKoleksi" id="printperawatan">
    <div class="container-fluid d-sm-flex align-items-center justify-content-center mt-4" id="judul-inv">
        <img src="<?= base_url('/img/download.png') ?>   " alt="" id="logo" style="width: 56px; margin-right: 20px;">
        <div class="text-center" style="font-size:16pt">
            <h6 class="m-0 font-weight-bold text-black" style="text-transform: uppercase;">DATA KOLEKSI</h6>
            <!-- <h6 class="m-0 font-weight-bold text-black" style="text-transform: uppercase;">INVENTARISASI KOLEKSI</h6> -->
            <h6 class="m-0 font-weight-bold text-black">MUSEUM NEGERI NUSA TENGGARA BARAT (NTB)</h6>

        </div>
        <img src=" <?= base_url('/img/logo-.png') ?>" alt="" id="logo" style="width: 80px; margin-left: 20px;">
    </div>
    <hr>


    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead style="text-align: center; font-size: 10pt;">
            <tr>
                <th style="text-align: center;">No Registrasi</th>
                <th style="text-align: center;">No Inventaris</th>
                <th style="text-align: center;">Gambar</th>
                <th style="text-align: center;">Nama</th>
                <th style="text-align: center;">Uraian</th>
                <th style="text-align: center;">Asal Didapat</th>
                <th style="text-align: center;">Ukuran</th>
                <th style="text-align: center;">Cara Didapat</th>
                <th style="text-align: center;">Tanggal</th>
                <!-- <th style="text-align: center;">Harga</th> -->
                <th style="text-align: center;">Lokasi</th>
                <th style="text-align: center;">Keadaan</th>

                <!-- <th style="text-align: center;">Perawatan</th>                                             -->
            </tr>
        </thead>

        <tbody style="text-align: center; font-size: 10pt;">
            <?php
            $no = 1;
            foreach ($data_koleksi as $k): ?>
                <tr>
                    <td style="text-align: center;"><?= $k['no_registrasi']; ?></td>
                    <td style="text-align: center;"><?= $k['kode_kategori']; ?> . <?= $k['no_inventaris']; ?></td>
                    <td style="text-align: center;"><img src="<?= base_url("img/koleksi/" . $k['gambar']); ?>" alt="" width="100px"></td>
                    <td style="text-align: center;"><?= $k['nama_inv']; ?></td>
                    <td style="text-align: center;"><?= $k['uraian']; ?></td>
                    <td style="text-align: center;"><?= $k['tempat_dapat']; ?></td>
                    <td style="text-align: center;"><?= $k['ukuran']; ?></td>
                    <td style="text-align: center;"><?= $k['cara_dapat']; ?></td>
                    <td style="text-align: center;"><?= $k['tgl_masuk']; ?></td>
                    <!-- <td style="text-align: center;"><?= $k['harga']; ?></td> -->
                    <td style="text-align: center;"><?= $k['rak']; ?> <?= $k['lemari']; ?> <?= $k['lokasi']; ?></td>
                    <td style="text-align: center;"><?= $k['keadaan']; ?></td>

                    <!-- <td style="text-align: center;">
                                <?php if (session()->get('level') == 'Ketua Pengkajian' || session()->get('level') == 'Petugas Pengkajian'  || session()->get('level') == 'Admin/Pengkajian'): ?>
                                <a href="<?= base_url("/tambahPerawatan/{$k['id']}"); ?>" class="btn btn-primary btn-sm " >Tambah</a>
                                <?php endif; ?>
                                <a href="<?= base_url("/dataPerawatan/{$k['id']}"); ?>" class="btn btn-info btn-sm " >Lihat</a>
                            </td> -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?= $this->endSection(); ?>