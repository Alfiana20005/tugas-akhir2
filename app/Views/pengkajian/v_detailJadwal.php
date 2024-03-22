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

</div>

<?= $this->endSection(); ?>
