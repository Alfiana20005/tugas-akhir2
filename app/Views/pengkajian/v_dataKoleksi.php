<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Koleksi Kategori </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 11pt;">
                    <thead style="text-align: center;">
                        <tr>
                            <th style="text-align: center;">No Inventarisasi</th>
                            <th style="text-align: center;">No Registrasi</th>
                            <th style="text-align: center;">Gambar</th> 
                            <th style="text-align: center;">Nama</th>
                            <th style="text-align: center;">Keadaan</th>
                            <th style="text-align: center;">Aksi</th>
                            <th style="text-align: center;">Perawatan</th>                                            
                        </tr>
                    </thead>
                    
                    <tbody style="text-align: center;">
                        <?php 
                            $no=1;
                            foreach($data_koleksi as $k): ?>
                        <tr>
                            <td style="text-align: center;"><?= $k['kode_kategori']; ?> . <?= $k['no_inventaris']; ?></td> 
                            <td style="text-align: center;"><?= $k['no_registrasi']; ?></td>
                            <td style="text-align: center;"><img src="<?= base_url("img/koleksi/". $k['gambar']); ?>" alt="" width="100px"></td>
                            <td style="text-align: center;"><?= $k['nama_inv']; ?></td>
                            <td style="text-align: center;"><?= $k['keadaan']; ?></td>
                            <td style="text-align: center;">
                                <a href="<?= base_url("/detailKoleksi/{$k['id']}"); ?>" class="btn btn-success " >Detail</a>
                                                
                                <form action="/hapus/<?= $k['id']; ?>" method="post"class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Hapus</button>
                                </form>
                            </td>
                            <td style="text-align: center;">
                                <a href="<?= base_url("/dataPerawatan"); ?>" class="btn btn-info " >Lihat</a>
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
