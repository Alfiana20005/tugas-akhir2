<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container-fluid">
<!--  -->
        <?php  if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>

            
        <?php endif; ?>

        
        
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
           
            <h6>
                <?= isset($perawatan2['nama_inv']) ? $perawatan2['nama_inv'] : 'Data tidak ditemukan'; ?>
            </h6>

        </div>
        <div class="card-body">
            <div class="text-center">
                <h6 class="m-0 font-weight-bold text-black">DATA PERAWATAN KOLEKSI</h6>
                <h6 class="m-0 font-weight-bold text-black mb-4">MUSEUM NEGERI NUSA TENGGARA BARAT (NTB)</h6>
            </div>
            <div class="d-flex text-black">
                <div class="" id="judul">
                    <table >
                        <tr><td style="color: #2b2a2a; padding-right: 5px;">Nama Koleksi</td></tr>
                        <tr><td style="color: #2b2a2a; padding-right: 5px;">No. Registrasi</td></tr>
                    </table>
                </div>
                <div class="mb-4" id="judul">
                    <table >
                        <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= !empty($perawatan2['nama_inv']) ? $perawatan2['nama_inv'] : ''; ?></td></tr>
                        <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= !empty($perawatan2['no_registrasi']) ? $perawatan2['no_registrasi'] : ''; ?></td></tr>
                    </table>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center;">
                        <tr>
                            <th style="text-align: center;">No </th>
                            <!-- <th style="text-align: center;">Nama</th> -->
                            <th style="text-align: center;">Jenis Perawatan</th>
                            <th style="text-align: center;">Deskripsi</th> 
                            <th style="text-align: center;">Tanggal</th>
                            <th style="text-align: center;">Gambar Sebelum</th>
                            <th style="text-align: center;">Gambar sesudah</th>
                            <th style="text-align: center;">Admin</th>                                            
                            <th style="text-align: center;">Penanggung Jawab</th>                                            
                        </tr>
                    </thead>
                    
                    <tbody style="text-align: center;">
                        <?php if (!empty($perawatan)): ?>
                            <?php $no = 1; ?>
                            <?php foreach ($perawatan as $item): ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no++; ?></td>
                                    <!-- <td style="text-align: center;"><?= $item['nama_inv']; ?></td> -->
                                    <td style="text-align: center;"><?= $item['jenisprw']; ?></td>
                                    <td style="text-align: center;"><?= $item['deskripsi']; ?></td>
                                    <td style="text-align: center;"><?= $item['tanggal_sebelum']; ?></td>
                                    <td style="text-align: center;"><img src="<?= base_url("img/sebelum/" . $item['foto_sebelum']); ?>" alt="sebelum" width="100px"></td>
                                    <td style="text-align: center;"><img src="<?= base_url("img/sesudah/" . $item['foto_setelah']); ?>" alt="sesudah" width="100px"></td>
                                    <td style="text-align: center;"><?= $item['petugas_name']; ?></td>
                                    <td style="text-align: center;"><?= $item['penanggung_jawab']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                    </tbody>
                        
                </table>
            </div>
        </div>
    </div>
    <div class="" id="tampilPerawatan">
            <div class="text-center">
                <h6 class="m-0 font-weight-bold text-black">DATA PERAWATAN KOLEKSI</h6>
                <h6 class="m-0 font-weight-bold text-black mb-4">MUSEUM NEGERI NUSA TENGGARA BARAT (NTB)</h6>
            </div>
            <div class="d-flex text-black">
                <div class="" id="judul">
                    <table >
                        <tr><td style="color: #2b2a2a; padding-right: 5px;">Nama Koleksi</td></tr>
                        <tr><td style="color: #2b2a2a; padding-right: 5px;">No. Registrasi</td></tr>
                    </table>
                </div>
                <div class="mb-4" id="judul">
                    <table >
                        <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= !empty($koleksi['nama_inv']) ? $koleksi['nama_inv'] : ''; ?></td></tr>
                        <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= !empty($koleksi['no_registrasi']) ? $koleksi['no_registrasi'] : ''; ?></td></tr>
                    </table>
                </div>
            </div>
            <div class="table">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 11pt;">
                    <thead style="text-align: center;">
                        <tr>
                            <th style="text-align: center;">No </th>
                            <th style="text-align: center;">Jenis Perawatan</th>
                            <th style="text-align: center;">Deskripsi</th> 
                            <th style="text-align: center;">Tanggal</th>
                            <th style="text-align: center;">Gambar Sebelum</th>
                            <th style="text-align: center;">Gambar sesudah</th>
                            <th style="text-align: center;">Admin</th>                                            
                            <th style="text-align: center;">Penanggung Jawab</th>                                            
                        </tr>
                    </thead>
                    
                    <tbody style="text-align: center;">
                        <?php if (!empty($perawatan)): ?>
                            <?php $no = 1; ?>
                            <?php foreach ($perawatan as $item): ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no++; ?></td>
                                    <td style="text-align: center;"><?= $item['jenisprw']; ?></td>
                                    <td style="text-align: center;"><?= $item['deskripsi']; ?></td>
                                    <td style="text-align: center;"><?= $item['tanggal_sebelum']; ?></td>
                                    <td style="text-align: center;"><img src="<?= base_url("img/sebelum/" . $item['foto_sebelum']); ?>" alt="sebelum" width="100px"></td>
                                    <td style="text-align: center;"><img src="<?= base_url("img/sesudah/" . $item['foto_setelah']); ?>" alt="sesudah" width="100px"></td>
                                    <td style="text-align: center;"><?= $item['petugas_name']; ?></td>
                                    <td style="text-align: center;"><?= $item['penanggung_jawab']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                    </tbody>
                        
                </table>
            </div>
        </div>
</div>


<?= $this->endSection(); ?>
