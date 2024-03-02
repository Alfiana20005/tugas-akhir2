<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>
<div class="container">
<?php  if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    <div class="card shadow mb-2">
            <div class="card-header d-sm-flex align-items-center justify-content-between mb-2">
                <h6 class="m-0 font-weight-bold text-primary"><?= $data_koleksi['nama_inv']; ?></h6>
            <div class="d-flex">
                <button onclick="" type="submit" class="btn btn-sm btn-success shadow-sm mx-1" id="edit">
                    <i class="fas fa-pen fa-sm text-white-50"></i>Edit
                </button>
                <button onclick="window.print()" type="submit" class="btn btn-sm btn-primary shadow-sm" id="print">
                    <i class="fas fa-print fa-sm text-white-50"></i>Print
                </button>
            </div>
            </div>
        <div class="card-body">
        <div class="card-body ">
            <div class="text-center">
                <h6 class="m-0 font-weight-bold mb-4">INVENTARISASI DATA KOLEKSI [KATEGORI]</h6>
            </div>
                    <div class="d-flex text-black">
                        <div class="flex-shrink-0 mx-4">
                            <img src="<?= base_url('/img/koleksi/' . $data_koleksi['gambar']); ?>"
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
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= $data_koleksi['kode_kategori']; ?> . <?= $data_koleksi['no_inventaris']; ?></td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= $data_koleksi['no_registrasi']; ?></td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= $data_koleksi['kode_kategori']; ?></td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= $data_koleksi['nama_inv']; ?></td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= $data_koleksi['ukuran']; ?></td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= $data_koleksi['tempat_buat']; ?></td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= $data_koleksi['tempat_dapat']; ?></td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= $data_koleksi['cara_dapat']; ?></td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= $data_koleksi['tgl_masuk']; ?></td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= $data_koleksi['keadaan']; ?></td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= $data_koleksi['lokasi']; ?></td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">: 
                                <?= $data_koleksi['petugas_name']; ?>
                                </td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= $data_koleksi['keterangan']; ?></td></tr>
                                <tr><td style="color: #2b2a2a; padding-right: 5px;">: <?= $data_koleksi['uraian']; ?></td></tr>
                            </table>
                        </div>


                        </div>
                    </div>

        </div>

        
    </div>  
       
</div>
<?= $this->endSection(); ?>