<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <form action="<?= base_url('/laporan');?>" method="post">
        <div class="row">
            <div class="col">
                 <div>
                    <select class="form-select form-control" type="text" name="kode_jenisprw" >
                        <option selected>Pilih Jenis Perawatan</option>
                        <option  <?= $kode_jenisprw == '01'? 'selected' : '' ?> value="01">Preventif</option>
                        <option  <?= $kode_jenisprw == '02'? 'selected' : '' ?> value="02">Kuratif</option>
                        <option  <?= $kode_jenisprw == '03'? 'selected' : '' ?> value="03">Restorasi</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <input type="date" class="form-control" placeholder="Mulai dari" aria-label="tanggal" name="mulaiDari"  value="<?= (!empty($tanggalAwal)) ? $tanggalAwal : ''; ?>">
            </div>
            <div class="col">
                <input type="date" class="form-control" placeholder="Hingga" aria-label="tanggal" name="hingga" value="<?= (!empty($tanggalAkhir)) ? $tanggalAkhir : ''; ?>">
            </div>
            <div class="col mb-4">
            <button type="submit" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-sm text-white-50"></i> Tampilkan Data
            </button>
            </div>
        </div>
    </form>
    
    
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between">
            <?php if (!empty($tanggalAwal) && !empty($tanggalAkhir)): ?>
                <h6 class="m-0 font-weight-bold text-primary">
                    Laporan Perawatan <?= $nama['jenisprw']; ?> Koleksi (<?= date('d M Y', strtotime($tanggalAwal)); ?>) hingga (<?= date('d M Y', strtotime($tanggalAkhir)); ?>)
                    
                </h6>
            <?php else: ?>
                <h6 class="m-0 font-weight-bold text-primary">Laporan Perawatan Koleksi</h6>
            <?php endif; ?> 
            <button onclick="window.print()" type="submit" class="btn btn-sm btn-primary shadow-s"><i class="fas fa-print fa-sm text-white-50 mr-2"></i>Print</button>                                      
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Perawatan</th>
                            <th>Nama Koleksi</th>
                            <th>Deskripsi</th>
                            <th>Foto sebelum</th>
                            <th>Foto Sesudah</th>
                            <th>Tanggal Perawatan</th>
                            <th>Konservator</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($perawatan as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['jenisprw']; ?></td>
                                <td><?= $row['koleksiNames']; ?></td>
                                <td><?= $row['deskripsi']; ?></td>
                                <td><img src="<?= base_url("img/sebelum/" . $row['foto_sebelum']); ?>" alt="sebelum" width="100px"></td>
                                <td><img src="<?= base_url("img/sesudah/" . $row['foto_sesudah']); ?>" alt="sebelum" width="100px"></td>
                                <td><?= $row['tanggal']; ?></td>
                                <td><?= $row['petugasNames']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php if (!empty($perawatan)): ?>      
            <?php foreach ($perawatan as $row): ?>
            <div class="" id="printperawatan">
                <div class="container-fluid d-sm-flex align-items-center justify-content-center mt-4" id="judul-inv">
                <img src="<?= base_url('/img/download.png') ?>   " alt="" id="logo" style="width: 56px; margin-right: 20px;" >
                    <div class="text-center" style="font-size:16pt">
                        <h6 class="m-0 font-weight-bold text-black" style="text-transform: uppercase;">LAPORAN KONSERVASI</h6>
                        <h6 class="m-0 font-weight-bold text-black" style="text-transform: uppercase;">INVENTARISASI KOLEKSI</h6>
                        <h6 class="m-0 font-weight-bold text-black">MUSEUM NEGERI NUSA TENGGARA BARAT (NTB)</h6>
                        
                    </div>
                <img src=" <?= base_url('/img/logo-.png') ?>" alt="" id="logo" style="width: 80px; margin-left: 20px;">
                </div>
                <hr>
                <div class="d-flex text-black justify-content-center">
                    <div class="mt-4 " >
                        <table class="table table-bordered">
                            <tr style="text-align: center;">
                                <td><img src="<?= base_url("img/sebelum/" . $row['foto_sebelum']); ?>" alt="sebelum" width="270px"></td>
                            </tr>
                            <tr style="text-align: center;">
                                <td>Foto Sebelum Konservasi</td>
                            </tr>
                        </table>
                    </div>
                    <div class="mt-4 ">
                        <table class="table table-bordered" >
                            <tr style="text-align: center;">
                                <td><img src="<?= base_url("img/sesudah/" . $row['foto_sesudah']); ?>" alt="sesudah" width="270px"></td>
                            </tr >
                            <tr style="text-align: center;">
                                <td>Foto Setelah Konservasi</td>
                            </tr>
                        </table>
                    </div>
                </div> 
                <div class="d-flex text-black mt-4">
                    <div class="" id="judul">
                        <table >
                            <tr><td style="color: #2b2a2a; padding-right: 5px; ">Nama Koleksi</td></tr>
                            <tr><td style="color: #2b2a2a; padding-right: 5px; ">No. Registrasi</td></tr>
                            <!-- <tr ><td style="color: #2b2a2a; padding-right: 5px; ">Deskripsi Perawatan</td></tr> -->
                            
                        </table>
                    </div>
                    <div class="mb-4" id="judul" >
                        <table >
                            <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= $row['koleksiNames']; ?></td></tr>
                            <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= !empty($row['no_registrasi']) ? $row['no_registrasi'] : ''; ?></td></tr>
                            
                            
                        </table>
                    </div>
                </div>
                <div class="d-flex text-black">
                    <div class="my-4">
                        <table class="" style="line-height: auto; max-width: 600px;">
                            <tr style="line-height: auto;"><td style="color: #2b2a2a; padding-right: 5px; ">Deskripsi Perawatan:</td></tr>
                            <tr ><td style="color: #2b2a2a;  padding-right: 5px; "><?= !empty($row['deskripsi']) ? $row['deskripsi'] : ''; ?></td></tr>
                        </table>
                    </div>
                    
                </div>
                <div class="d-flex text-black justify-content-end" style="padding-bottom: 100;">
                    <div class="my-4 ">
                        <table >
                            <tr ><td style="color: #2b2a2a; padding-right: 5px;padding-top: 150px;">Mataram, <?= !empty($row['tanggal']) ? $row['tanggal'] : ''; ?> </td></tr>
                            <tr ><td style="color: #2b2a2a; padding-right: 5px; padding-bottom: 70px; ">Konservator,</td></tr>
                            <tr ><td style="color: #2b2a2a;  padding-right: 5px; "><?= !empty($row['petugasNames']) ? $row['petugasNames'] : ''; ?></td></tr>
                            <tr ><td style="color: #2b2a2a;  padding-right: 5px; ">NIP. <?= !empty($row['nip']) ? $row['nip'] : '-'; ?></td></tr>
                            
                        </table>
                    </div>
                    
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>      
<?= $this->endSection(); ?>
