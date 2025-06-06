<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Progres Perawatan Koleksi Sedang Berlangsung</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Preventif Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Preventif</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        $preventifFound = false;
                                        $highestPreventifProgress = 0;
                                        $currentPreventifItem = null;

                                        // Find the most recent or current Preventif item
                                        foreach ($jadwal as $j) {
                                            if ($j['jenisprwNames'] == 'Preventif') {
                                                // Check if this is an active item (in progress)
                                                if ($j['status'] == 'Sedang Berlangsung') {
                                                    $currentPreventifItem = $j;
                                                    $preventifFound = true;
                                                    break;
                                                }
                                                // Otherwise, keep track of the highest progress item
                                                else if ($j['progress'] > $highestPreventifProgress) {
                                                    $highestPreventifProgress = $j['progress'];
                                                    $currentPreventifItem = $j;
                                                    $preventifFound = true;
                                                }
                                            }
                                        }

                                        if ($preventifFound) {
                                            $progressPreventif = $currentPreventifItem['progress'];
                                            echo number_format($progressPreventif, 1) . "%";
                                        } else {
                                            echo "0%";
                                            $progressPreventif = 0;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-warning" role="progressbar"
                                            style="width: <?= $progressPreventif; ?>%"
                                            aria-valuenow="<?= $progressPreventif; ?>"
                                            aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kuratif Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kuratif</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        $kuratifFound = false;
                                        $highestKuratifProgress = 0;
                                        $currentKuratifItem = null;

                                        // Find the most recent or current Kuratif item
                                        foreach ($jadwal as $j) {
                                            if ($j['jenisprwNames'] == 'Kuratif') {
                                                // Check if this is an active item (in progress)
                                                if ($j['status'] == 'Sedang Berlangsung') {
                                                    $currentKuratifItem = $j;
                                                    $kuratifFound = true;
                                                    break;
                                                }
                                                // Otherwise, keep track of the highest progress item
                                                else if ($j['progress'] > $highestKuratifProgress) {
                                                    $highestKuratifProgress = $j['progress'];
                                                    $currentKuratifItem = $j;
                                                    $kuratifFound = true;
                                                }
                                            }
                                        }

                                        if ($kuratifFound) {
                                            $progressKuratif = $currentKuratifItem['progress'];
                                            echo number_format($progressKuratif, 1) . "%";
                                        } else {
                                            echo "0%";
                                            $progressKuratif = 0;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: <?= $progressKuratif; ?>%"
                                            aria-valuenow="<?= $progressKuratif; ?>"
                                            aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Restorasi Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Restorasi</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        $restorasiFound = false;
                                        $highestRestorasiProgress = 0;
                                        $currentRestorasiItem = null;

                                        // Find the most recent or current Restorasi item
                                        foreach ($jadwal as $j) {
                                            if ($j['jenisprwNames'] == 'Restorasi') {
                                                // Check if this is an active item (in progress)
                                                if ($j['status'] == 'Sedang Berlangsung') {
                                                    $currentRestorasiItem = $j;
                                                    $restorasiFound = true;
                                                    break;
                                                }
                                                // Otherwise, keep track of the highest progress item
                                                else if ($j['progress'] > $highestRestorasiProgress) {
                                                    $highestRestorasiProgress = $j['progress'];
                                                    $currentRestorasiItem = $j;
                                                    $restorasiFound = true;
                                                }
                                            }
                                        }

                                        if ($restorasiFound) {
                                            $progressRestorasi = $currentRestorasiItem['progress'];
                                            echo number_format($progressRestorasi, 1) . "%";
                                        } else {
                                            echo "0%";
                                            $progressRestorasi = 0;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-danger" role="progressbar"
                                            style="width: <?= $progressRestorasi; ?>%"
                                            aria-valuenow="<?= $progressRestorasi; ?>"
                                            aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php if (session()->get('level') == 'Ketua Pengkajian' || session()->get('level') == 'Petugas Pengkajian'  || session()->get('level') == 'Admin/Pengkajian'): ?>
        <a class="btn btn-primary my-4" href="/tambahJadwal" role="button">Tambah Jadwal Perawatan</a>
        <a class="btn btn-warning my-4" href="/perawatanPreventif" role="button">Preventif</a>
        <a class="btn btn-success my-4" href="/perawatanKuratif" role="button">Kuratif</a>
        <a class="btn btn-danger my-4" href="/perawatanRestorasi" role="button">Restorasi</a>
        <?php if (session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Perawatan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="font-size: 10pt;">
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Jenis Perawatan</th>
                            <th style="text-align: center;">Target</th>
                            <th style="text-align: center;">Deskripsi</th>
                            <th style="text-align: center;">Mulai</th>
                            <th style="text-align: center;">Berakhir</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Rincian</th>
                            <th style="text-align: center;">Aksi</th>

                            <th style="text-align: center;">Capaian Target</th>
                        </tr>
                    </thead>

                    <tbody style="font-size: 10pt;">
                        <?php
                        $no = 1;
                        foreach ($jadwal as $j): ?>

                            <tr>
                                <td style="text-align: center;"><?= $no++; ?></td>
                                <td style="text-align: center;"><?= $j['jenisprwNames']; ?></td>
                                <td style="text-align: center;"><?= $j['target']; ?></td>
                                <td style="text-align: center;"><?= $j['deskripsi']; ?></td>
                                <td style="text-align: center;"><?= $j['mulai']; ?></td>
                                <td style="text-align: center;"><?= $j['berakhir']; ?></td>
                                <td style="text-align: center;">

                                    <?php if ($j['status'] == 'Selesai'): ?>
                                        <span class="btn btn-success btn-sm">Selesai</span>
                                    <?php elseif ($j['status'] == 'Sedang Berlangsung'): ?>
                                        <span class="btn btn-warning btn-sm">Sedang berlangsung</span>
                                    <?php elseif ($j['status'] == 'Tidak Selesai'): ?>
                                        <span class="btn btn-danger btn-sm">Tidak Selesai</span>
                                    <?php else: ?>
                                        <span class="btn btn-primary btn-sm">Belum Mulai</span>
                                    <?php endif; ?>

                                </td>


                                <td class="d-sm-flex" style="text-align: center;">
                                    <button type="button" class="btn btn-primary btn-sm "><?= $j['perawatan']; ?></button>
                                    <a href="<?= base_url('detailJadwal/' . $j['id']); ?>" class="btn btn-info btn-sm mx-2"> Detail</a>
                                </td>

                                <td>

                                    <form action="/deleteJadwal/<?= $j['id']; ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin?');">
                                            Hapus
                                        </button>

                                    </form>

                                </td>

                                <td style="text-align: center;">
                                    <?php
                                    $progressRestorasi = ($j['perawatan'] / $j['target']) * 100;
                                    $progressRestorasi = min($progressRestorasi, 100);
                                    echo $progressRestorasi . "%";
                                    ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- Content Row -->
</div>
<div class="modal fade" id="modalCetak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Laporan Perawatan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/cetak'); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="row mb-3">
                        <label for="jenis" class="col-sm-3 col-form-label">Jenis Perawatan</label>
                        <div class="col-sm-9">
                            <select class="form-select form-control" type="text" name="jenisprw">
                                <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih Jenis Perawatan</option>
                                <option value="01">Preventif</option>
                                <option value="02">Kuratif</option>
                                <option value="03">Restorasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Mulai Dari</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" placeholder="mulai" aria-label="tahun" name="mulaiDari">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Hingga</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" placeholder="berakhir" aria-label="tahun" name="hingga">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="" type="submit">Cetak</a>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>