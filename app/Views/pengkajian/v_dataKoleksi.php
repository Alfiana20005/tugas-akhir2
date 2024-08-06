<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container-fluid">
        <?php  if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Koleksi <?= $judul ?> </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                    <thead style="text-align: center; font-size: 10pt;">
                        <tr>
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
                            $no=1;
                            foreach($data_koleksi as $k): ?>
                        <tr>
                            <td style="text-align: center;"><?= $k['kode_lk']; ?></td> 
                            <td style="text-align: center;"><?= $k['kode_kategori']; ?> . <?= $k['no_inventaris']; ?></td> 
                            <td style="text-align: center;"><?= $k['no_registrasi']; ?></td>
                            <td style="text-align: center;"><img src="<?= base_url("img/koleksi/". $k['gambar']); ?>" alt="" width="100px"></td>
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
                                <a href="<?= base_url("/detailKoleksi/{$k['id']}"); ?>" class="btn btn-success btn-sm " >Detail</a>
                                <?php if (session()->get('level') == 'Ketua Pengkajian' || session()->get('level') == 'Petugas Pengkajian'  || session()->get('level') == 'Admin/Pengkajian'): ?>               
                                <form action="/hapus/<?= $k['id']; ?>" method="post"class="d-inline">
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
                                <a href="<?= base_url("/dataPerawatan/{$k['no_registrasi']}"); ?>" class="btn btn-info btn-sm " >Lihat</a>
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
