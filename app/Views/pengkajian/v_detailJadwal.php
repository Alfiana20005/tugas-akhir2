<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between">
            <a href="<?= base_url('/perawatan'); ?>   ">
                <h6 class="m-0 font-weight-bold text-primary">Perawatan <?= $jadwal['jenisprwNames']; ?> Tanggal <?= $jadwal['mulai']; ?> Hingga <?= $jadwal['berakhir']; ?></h6>
            </a>
            <button onclick="window.print()" type="submit" class="btn btn-sm btn-primary shadow-sm" id="print">
                <i class="fas fa-print fa-sm text-white-50"></i>Print
            </button>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center; font-size:10pt">
                        <tr>
                            <th style="text-align: center;">No </th>
                            <th style="text-align: center;">Nama Kolekai </th>
                            <th style="text-align: center;">Deskripsi</th>
                            <th style="text-align: center;">Tanggal</th>
                            <th style="text-align: center;">Gambar Sebelum</th>
                            <th style="text-align: center;">Gambar sesudah</th>
                            <th style="text-align: center;">Dilakukan Oleh</th>
                        </tr>
                    </thead>

                    <tbody style="text-align: center;">
                        <?php if (!empty($perawatan)): ?>
                            <?php $no = 1; ?>
                            <?php foreach ($perawatan as $item): ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no++; ?></td>
                                    <td style="text-align: center;"><?= $item['koleksiNames']; ?></td>
                                    <td style="text-align: center;"><?= $item['deskripsi']; ?></td>
                                    <td style="text-align: center;"><?= $item['tanggal']; ?></td>
                                    <td style="text-align: center;"><img src="<?= base_url("img/sebelum/" . $item['foto_sebelum']); ?>" alt="sebelum" width="100px"></td>
                                    <td style="text-align: center;"><img src="<?= base_url("img/sesudah/" . $item['foto_sesudah']); ?>" alt="sesudah" width="100px"></td>
                                    <td style="text-align: center;"><?= $item['petugasNames']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
        <?php if (!empty($perawatan)): ?>      
            <?php foreach ($perawatan as $item): ?>
            <div class="mx-5" id="printperawatan">
                <div class="container-fluid d-sm-flex align-items-center justify-content-center mt-4" id="judul-inv">
                <img src="<?= base_url('/img/download.png') ?>   " alt="" id="logo" style="width: 56px; margin-right: 20px;" >
                    <div class="text-center">
                        <h6 class="m-0 font-weight-bold text-black" style="text-transform: uppercase;">LAPORAN KONSERVASI</h6>
                        <h6 class="m-0 font-weight-bold text-black" style="text-transform: uppercase;">INVENTARISASI KOLEKSI</h6>
                        <h6 class="m-0 font-weight-bold text-black">MUSEUM NEGERI NUSA TENGGARA BARAT (NTB)</h6>
                        
                    </div>
                <img src=" <?= base_url('/img/logo-.png') ?>" alt="" id="logo" style="width: 80px; margin-left: 20px;">
                </div>
                <hr>
                <div class="d-flex text-black justify-content-center">
                    <div class="" >
                        <table style="color: #2b2a2a;">
                            <tr style="text-align: center;">
                                <td><img src="<?= base_url("img/sebelum/" . $item['foto_sebelum']); ?>" alt="sebelum" width="400px "></td>
                            </tr>
                            <tr style="text-align: center;">
                                <td>Foto Sebelum Konservasi</td>
                            </tr>
                        </table>
                    </div>
                    <div class="mb-4">
                        <table style="color: #2b2a2a;">
                            <tr style="text-align: center;">
                                <td><img src="<?= base_url("img/sesudah/" . $item['foto_sesudah']); ?>" alt="sesudah" width="400px"></td>
                            </tr >
                            <tr style="text-align: center;">
                                <td>Foto Setelah Konservasi</td>
                            </tr>
                        </table>
                    </div>
                </div> 
                <div class="d-flex text-black">
                    <div class="" id="judul">
                        <table >
                            <tr><td style="color: #2b2a2a; padding-right: 5px; ">Nama Koleksi</td></tr>
                            <tr><td style="color: #2b2a2a; padding-right: 5px; ">No. Registrasi</td></tr>
                            <!-- <tr ><td style="color: #2b2a2a; padding-right: 5px; ">Deskripsi Perawatan</td></tr> -->
                            
                        </table>
                    </div>
                    <div class="mb-4" id="judul" >
                        <table >
                            <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= $item['koleksiNames']; ?></td></tr>
                            <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= !empty($item['no_registrasi']) ? $item['no_registrasi'] : ''; ?></td></tr>
                            
                            
                        </table>
                    </div>
                </div>
                <div class="d-flex text-black">
                    <div class="my-4">
                        <table class="" style="line-height: auto; max-width: 600px;">
                            <tr style="line-height: auto;"><td style="color: #2b2a2a; padding-right: 5px; ">Deskripsi Perawatan:</td></tr>
                            <tr ><td style="color: #2b2a2a;  padding-right: 5px; "><?= !empty($item['deskripsi']) ? $item['deskripsi'] : ''; ?></td></tr>
                        </table>
                    </div>
                    
                </div>
                <div class="d-flex text-black justify-content-end">
                    <div class="my-4 ">
                        <table >
                            <tr ><td style="color: #2b2a2a; padding-right: 5px; line-height: 10; ">Konservator,</td></tr>
                            <tr ><td style="color: #2b2a2a;  padding-right: 5px; "><?= !empty($item['petugasNames']) ? $item['petugasNames'] : ''; ?></td></tr>
                            <tr ><td style="color: #2b2a2a;  padding-right: 5px; ">NIP. <?= !empty($item['nip']) ? $item['nip'] : '-'; ?></td></tr>
                            
                        </table>
                    </div>
                    
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>                        
            

    

</div>
 
<?= $this->endSection(); ?>
