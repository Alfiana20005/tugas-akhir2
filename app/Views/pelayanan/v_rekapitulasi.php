<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container-fluid">
<?php  if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
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
                            
                                                
                        </div>
                        <div class="card-body">
                            
                            <form action="" method="get" autocomplete="off">
                                <div class="float-right ml-2 mb-4">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                                <div class="float-right">
                                    <input type="text" name="keyword" id="" class="form-control" style="width: 155pt;" placeholder="search">
                                </div>
                                

                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                        $no= 1+(15 * ($page - 1)) ; 
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
                                            <td>
                                            <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editGallery<?= $pengunjung['id_pengunjung']; ?>" data-bs-whatever="@getbootstrap">Edit</a>
                                                <form action="/deleteData/<?= $pengunjung['id_pengunjung']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin?');">
                                                    Hapus
                                                    </button>
                                    
                                                </form></td>
                                        </tr>

                                    <?php endforeach; ?>
                                
                                    </tbody>
                                </table>
                                <?php if ($pager): ?>
                                    <?= $pager->links('default', 'pagination'); ?>
                                <?php endif; ?>

                            </div>
                        </div>
    </div>


    <?php 
        $no=1;
        foreach($data_pengunjung as $pengunjung): ?> 
    <div class="modal fade" id="editGallery<?= $pengunjung['id_pengunjung']; ?>" tabindex="-1" aria-labelledby="editGallery" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="editGallery">Edit Sega</h4>
                
            </div>
            <div class="modal-body">
                <form action="updatePengunjung/<?= $pengunjung['id_pengunjung']; ?>" method="post" enctype="multipart/form-data" id="form">
                <div class="row mb-2">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="nama" value="<?= $pengunjung['nama']; ?>">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="nama" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="alamat" value="<?= $pengunjung['alamat']; ?>">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="nama" class="col-sm-3 col-form-label">No_hp</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="no_hp" value="<?= $pengunjung['no_hp']; ?>">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Tanggal Kunjungan</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="recipient-name" name="created_at" value="<?= $pengunjung['created_at']; ?>">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="" class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                        <select class="form-select form-control" type="text" name="kategori"  value="<?= $pengunjung['kategori']; ?>">
                                    <!-- harus sesuai dengan urutan enum pada database -->
                            <option selected>Pilih </option>
                            <option <?= $pengunjung['kategori'] == 'TK'? 'selected' : 'TK' ?> value="TK">TK</option>
                            <option <?= $pengunjung['kategori'] == 'SD'? 'selected' : 'SD' ?> value="SD">SD</option>
                            <option <?= $pengunjung['kategori'] == 'SMP'? 'selected' : 'SMP' ?> value="SMP">SMP</option>
                            <option <?= $pengunjung['kategori'] == 'SMA'? 'selected' : 'SMA' ?> value="SMA">SMA</option>
                            <option <?= $pengunjung['kategori'] == 'Mahasiswa'? 'selected' : 'Mahasiswa' ?> value="Mahasiswa">Mahasiswa</option>
                            <option <?= $pengunjung['kategori'] == 'Peneliti'? 'selected' : 'Peneliti' ?> value="Peneliti">Peneliti</option>
                            <option <?= $pengunjung['kategori'] == 'Wisatawan Asing'? 'selected' : 'Wisatawan Asing' ?> value="Wisatawan Asing">Wisatawan Asing</option>
                            <option <?= $pengunjung['kategori'] == 'Rombongan Tamu Daerah'? 'selected' : 'Rombongan Tamu Daerah' ?> value="Rombongan Tamu Daerah">Rombongan Tamu Daerah</option>
                            <option <?= $pengunjung['kategori'] == 'Rombongan Tamu Negara'? 'selected' : 'Rombongan Tamu Negara' ?> value="Rombongan Tamu Negara">Rombongan Tamu Negara</option>
                            <option <?= $pengunjung['kategori'] == 'Umum'? 'selected' : 'Umum' ?> value="Umum">Umum</option>
                            
                        </select>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="nama" class="col-sm-3 col-form-label">Jumlah</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="jumlah" value="<?= $pengunjung['jumlah']; ?>">
                    </div>
                </div>
 
                
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </div>
                </form>
            </div>
            
        </div>
    </div>
    <?php endforeach; ?>
</div>

<script async src="https://cdn.jsdelivr.net/npm/es-module-shims@1/dist/es-module-shims.min.js" crossorigin="anonymous"></script>
    <script type="importmap">
    {
      "imports": {
        "@popperjs/core": "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/esm/popper.min.js",
        "bootstrap": "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.esm.min.js"
      }
    }
    </script>
    <script type="module">
      import * as bootstrap from 'bootstrap'

      new bootstrap.Popover(document.getElementById('popoverButton'))
    </script>

<?= $this->endSection(); ?>