<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>
<div class="container">
<?php  if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            
            <h6 class="m-0 font-weight-bold text-primary">Inventarisasi Data Koleksi (nama Kategori)</h6>
            
        </div>

        <div class="card-body">
        <div class="card-body p-4">
                        <div class="d-flex text-black">
                        <div class="flex-shrink-0 mx-4">
                            <img src="<?= base_url('/img/koleksi/img.png'); ?>"
                            alt="Generic placeholder image" class="img-fluid"
                            style="width: 180px; border-radius: 10px;">
                            
                        </div>
                        <div class="">
                            <table >
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">No. Inventarisasi</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">No. Registrasi</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">Jenis Koleksi</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">Nama Benda</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">Ukuran</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">Tempat Asal Dibuat</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">Tempat Asal Didapat</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">Cara Didapat</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">Tanggal Masuk</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">Keadaan Benda</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">Tempat Penyimpanan</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">Dicatat Oleh</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">Keterangan</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">Uraian</td></tr>
                            </table>
                        </div>
                        <div class="">
                            <table >
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">:</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">:</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">:</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">:</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">:</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">:</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">:</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">:</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">:</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">:</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">:</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">:</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">:</td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">:</td></tr>
                            </table>
                        </div>


                        </div>
                    </div>

        </div>
    </div>  
       
</div>
<?= $this->endSection(); ?>