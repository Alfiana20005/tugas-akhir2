<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <?php
    // Inisialisasi variabel $kode_kategori jika tidak ada
    $kode_kategori = isset($kode_kategori) ? $kode_kategori : '';
    $data_ditemukan = isset($data_ditemukan) ? $data_ditemukan : false;
    ?>

    <form action="<?= base_url('detailJadwal/' . $jadwal['id']); ?>" method="post">
            
            <div class="row">
                <div class="col">
                    <div>
                        <select class="form-select form-control" type="text" name="kode_kategori" >
                            <option selected>Pilih Kategori</option>
                            <option  <?= $kode_kategori== '01'? 'selected' : 'Geologika' ?> value="01">Geologika</option>
                            <option  <?= $kode_kategori== '02'? 'selected' : 'Biologika' ?> value="02">Biologika</option>
                            <option  <?= $kode_kategori== '03'? 'selected' : 'Etnografika' ?> value="03">Etnografika</option>
                            <option  <?= $kode_kategori== '04'? 'selected' : 'Arkeologika' ?> value="04">Arkeologika</option>
                            <option  <?= $kode_kategori== '05'? 'selected' : 'Historika' ?> value="05">Historika</option>
                            <option  <?= $kode_kategori== '06'? 'selected' : 'Numismatika' ?> value="06">Numismatika</option>
                            <option  <?= $kode_kategori== '07'? 'selected' : 'Filologika' ?> value="07">Filologika</option>
                            <option  <?= $kode_kategori== '08'? 'selected' : 'Kramologika' ?> value="08">Kramologika</option>
                            <option  <?= $kode_kategori== '09'? 'selected' : 'Seni Rupa' ?> value="09">Seni Rupa</option>
                            <option  <?= $kode_kategori== '10'? 'selected' : 'Teknologika' ?> value="10">Teknologika</option>
                            <option  <?= $kode_kategori== '11'? 'selected' : 'Lain-lain' ?> value="11">Lain-lain</option>
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
            <a href="<?= base_url('/perawatan'); ?>   ">
                <h6 class="m-0 font-weight-bold text-primary">Perawatan <?= $jadwal['jenisprwNames']; ?> Tanggal <?= $jadwal['mulai']; ?> Hingga <?= $jadwal['berakhir']; ?></h6>
            </a>
            <button onclick="window.print()" type="submit" class="btn btn-sm btn-primary shadow-s"><i class="fas fa-print fa-sm text-white-50 mr-2"></i>Print</button>

        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <!-- Tampilkan pesan jika data tidak ditemukan -->
                <?php if (!$data_ditemukan): ?>
                    <p style="text-align: center;">Data tidak ditemukan</p>
                <?php else: ?>
                <!-- Tampilkan data jika ditemukan -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center; font-size:10pt">
                        <tr>
                            <th style="text-align: center;">No </th>
                            <th style="text-align: center;">Tanggal Mulai</th>
                            <th style="text-align: center;">Tanggal Selesai</th>
                            <th style="text-align: center;">No Regis </th>
                            <th style="text-align: center;">Nama Benda </th>
                            <th style="text-align: center;">Deskripsi</th>
                            
                            <th style="text-align: center;">Gambar Sebelum</th>
                            <th style="text-align: center;">Gambar sesudah</th>
                            
                            <th style="text-align: center;">Penanggung Jawab</th>
                        </tr>
                    </thead>

                    <tbody style="text-align: center;">
                        <?php if (!empty($perawatan)): ?>
                            <?php $no = 1; ?>
                            
                            <?php foreach ($perawatan as $item): ?>
                                <?php if ($item['status'] == 'Selesai'): ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no++; ?></td>
                                    <td style="text-align: center;"><?= $item['tanggal_sebelum']; ?></td>
                                    <td style="text-align: center;"><?= $item['tanggal_sesudah']; ?></td>
                                    <td style="text-align: center;"><?= $item['no_registrasi']; ?></td>
                                    <td style="text-align: center;"><?= $item['nama_inv']; ?></td>
                                    <td style="text-align: center;"><?= $item['deskripsi']; ?></td>
                                    
                                    <td style="text-align: center;"><img src="<?= base_url("img/sebelum/" . $item['foto_sebelum']); ?>" alt="sebelum" width="100px"></td>
                                    <td style="text-align: center;"><img src="<?= base_url("img/sesudah/" . $item['foto_setelah']); ?>" alt="sesudah" width="100px"></td>
                                    <td style="text-align: center;"><?= $item['penanggung_jawab']; ?></td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            
                        <?php endif; ?>
                    </tbody>
                </table>

                <?php endif; ?>
            </div>
        </div>
    </div>
    

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

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center; font-size:10pt">
                        <tr>
                            <th style="text-align: center;">No </th>
                            <th style="text-align: center;">Tanggal Mulai</th>
                            <th style="text-align: center;">Tanggal Selesai</th>
                            <th style="text-align: center;">No Regis </th>
                            <th style="text-align: center;">Nama Benda </th>
                            <th style="text-align: center;">Deskripsi</th>
                            
                            <th style="text-align: center;">Gambar Sebelum</th>
                            <th style="text-align: center;">Gambar sesudah</th>
                            
                            <th style="text-align: center;">Dilakukan Oleh</th>
                        </tr>
                    </thead>

                    <tbody style="text-align: center;">
                        <?php if (!empty($perawatan)): ?>
                            <?php $no = 1; ?>
                            
                            <?php foreach ($perawatan as $item): ?>
                                <?php if ($item['status'] == 'Selesai'): ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no++; ?></td>
                                    <td style="text-align: center;"><?= $item['tanggal_sebelum']; ?></td>
                                    <td style="text-align: center;"><?= $item['tanggal_sesudah']; ?></td>
                                    <td style="text-align: center;"><?= $item['no_registrasi']; ?></td>
                                    <td style="text-align: center;"><?= $item['nama_inv']; ?></td>
                                    <td style="text-align: center;"><?= $item['deskripsi']; ?></td>
                                    
                                    <td style="text-align: center;"><img src="<?= base_url("img/sebelum/" . $item['foto_sebelum']); ?>" alt="sebelum" width="100px"></td>
                                    <td style="text-align: center;"><img src="<?= base_url("img/sesudah/" . $item['foto_setelah']); ?>" alt="sesudah" width="100px"></td>
                                    <td style="text-align: center;"><?= $item['petugasNames']; ?></td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            
                        <?php endif; ?>
                    </tbody>
                </table>

            </div>
                       
            

    

</div>
 
<?= $this->endSection(); ?>
