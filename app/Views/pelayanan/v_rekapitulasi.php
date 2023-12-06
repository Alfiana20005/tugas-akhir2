<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <form action="<?= base_url('/rekapitulasi');?>" method="post">
        <div class="row">
            <div class="col">
                <input type="date" class="form-control" placeholder="tanggal awal" aria-label="bulan" name="awal"  value="<?= (!empty($tanggalAwal)) ? $tanggalAwal : ''; ?>">
            </div>
            <div class="col">
                <input type="date" class="form-control" placeholder="tanggal akhir" aria-label="tahun" name="akhir" value="<?= (!empty($tanggalAkhir)) ? $tanggalAkhir : ''; ?>">
            </div>
            <div class="col mb-4">
            <button type="submit" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-sm text-white-50"></i> Tampilkan Data
            </button>
            </div>
            <!-- <div class=" col mb-4 ">
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>   
            </div> -->
        </div>
    </form>
    
    
    <div class="card shadow mb-4">
                        
                        <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi Data Pengunjung</h6>
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->

                            <?php if (!empty($tanggalAwal) && !empty($tanggalAkhir)): ?>
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Rekapitulasi Data Pengunjung (<?= date('d M Y', strtotime($tanggalAwal)); ?>) hingga (<?= date('d M Y', strtotime($tanggalAkhir)); ?>)
                                </h6>
                            <?php else: ?>
                                <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi Data Pengunjung</h6>
                            <?php endif; ?>
                            <a href="<?= base_url('/generate-report'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
                            </a>
                                                
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama/Instansi/Keluarga</th>
                                            <th>Alamat</th>
                                            <th>No.Tlp</th>
                                            <th>Kategori</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Kunjungan</th>
                                            <th>Dicatat Oleh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $no = 1;
                                        
                                        foreach($data_pengunjung as $pengunjung): 
                                            // Periksa apakah tanggal kunjungan sama dengan hari ini
                                            // $tanggal_kunjungan = date('Y-m-d', strtotime($pengunjung['created_at']));
                                            // $today = date('Y-m-d');
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $pengunjung['nama']; ?></td>
                                            <td><?= $pengunjung['alamat']; ?></td>
                                            <td><?= $pengunjung['no_hp']; ?></td>
                                            <td><?= $pengunjung['kategori']; ?></td>
                                            <td><?= $pengunjung['jumlah']; ?></td>
                                            <td><?= $pengunjung['created_at']; ?></td>
                                            <td>
                                            <?php
                                                $petugasName = $M_Pengunjung->getPetugasName($pengunjung['id_petugas']);
                                                echo isset($petugasName['nama']) ? $petugasName['nama'] : 'Nama Petugas Tidak Tersedia';
                                            ?>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>
    </div>
</div>

<?= $this->endSection(); ?>