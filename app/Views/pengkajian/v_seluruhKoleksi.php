<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container-fluid">
        <?php  if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex py-3  align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Koleksi </h6>
            <button onclick="window.print()" type="submit" class="btn btn-sm btn-primary shadow-s"><i class="fas fa-print fa-sm text-white-50 mr-2"></i>Print</button>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
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
                            <th style="text-align: center;">Harga</th>
                            <th style="text-align: center;">Lokasi</th>
                            <th style="text-align: center;">Keadaan</th>
                            <th style="text-align: center;">Aksi</th>
                            
                        </tr>
                    </thead>
                    
                    <tbody style="text-align: center; font-size: 10pt;">
                        <?php 
                            $no=1;
                            foreach($data_koleksi as $k): ?>
                        <tr>
                            <!-- <td style="text-align: center;"><?= $k['kode_kategori']; ?> . <?= $k['no_inventaris']; ?></td>  -->
                            <td style="text-align: center;"><?= $k['no_registrasi']; ?></td>
                            <td style="text-align: center;"><?= $k['no_inventaris']; ?></td>
                            <td style="text-align: center;"><img src="<?= base_url("img/koleksi/". $k['gambar']); ?>" alt="" width="100px"></td>
                            <td style="text-align: center;"><?= $k['nama_inv']; ?></td>
                            <td style="text-align: center;"><?= $k['uraian']; ?></td>
                            <td style="text-align: center;"><?= $k['tempat_dapat']; ?></td>
                            <td style="text-align: center;"><?= $k['ukuran']; ?></td>
                            <td style="text-align: center;"><?= $k['cara_dapat']; ?></td>
                            <td style="text-align: center;"><?= $k['tgl_masuk']; ?></td>
                            <td style="text-align: center;"><?= $k['harga']; ?></td>
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
                                <a href="<?= base_url("/detailKoleksi/{$k['id']}"); ?>" class="btn btn-success btn-sm " >Detail</a>
                                <?php if (session()->get('level') == 'Ketua Pengkajian' || session()->get('level') == 'Petugas Pengkajian'  || session()->get('level') == 'Admin/Pengkajian'): ?>               
                                <form action="/hapus/<?= $k['id']; ?>" method="post"class="d-inline">
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
            </div>
        </div>
    </div>
</div>


<!--  -->
            <div class="seluruhKoleksi" id="printperawatan" >
                <div class="container-fluid d-sm-flex align-items-center justify-content-center mt-4" id="judul-inv">
                <img src="<?= base_url('/img/download.png') ?>   " alt="" id="logo" style="width: 56px; margin-right: 20px;" >
                    <div class="text-center" style="font-size:16pt">
                        <h6 class="m-0 font-weight-bold text-black" style="text-transform: uppercase;">DATA KOLEKSI</h6>
                        <!-- <h6 class="m-0 font-weight-bold text-black" style="text-transform: uppercase;">INVENTARISASI KOLEKSI</h6> -->
                        <h6 class="m-0 font-weight-bold text-black">MUSEUM NEGERI NUSA TENGGARA BARAT (NTB)</h6>
                        
                    </div>
                <img src=" <?= base_url('/img/logo-.png') ?>" alt="" id="logo" style="width: 80px; margin-left: 20px;">
                </div>
                <hr>


                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
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
                            $no=1;
                            foreach($data_koleksi as $k): ?>
                        <tr>
                            <td style="text-align: center;"><?= $k['no_registrasi']; ?></td>
                            <td style="text-align: center;"><?= $k['kode_kategori']; ?> . <?= $k['no_inventaris']; ?></td>
                            <td style="text-align: center;"><img src="<?= base_url("img/koleksi/". $k['gambar']); ?>" alt="" width="100px"></td>
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
