<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container-fluid">
<a class="btn btn-primary mb-3" href="/tambahPerawatan" role="button">Tambah Data</a>
        <?php  if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">NAMA KOLEKSI</h6>
            <button onclick="window.print()" type="submit" class="btn btn-sm btn-primary shadow-sm" id="print">
                    <i class="fas fa-print fa-sm text-white-50"></i>Print
                </button>
        </div>
        <div class="card-body">
        <div class="text-center">
            <h6 class="m-0 font-weight-bold text-black">DATA PERAWATAN KOLEKSI</h6>
            <h6 class="m-0 font-weight-bold text-black">MUSEUM NEGERI NUSA TENGGARA BARAT (NTB)</h6>
        </div>
        <div class="d-flex text-black">
            <div class="" id="judul">
                <table >
                    <tr><td style="color: #2b2a2a; padding-right: 5px;">Nama Koleksi</td></tr>
                    <tr><td style="color: #2b2a2a; padding-right: 5px;">No. Registrasi</td></tr>
                </table>
            </div>
            <div class="" id="judul">
                <table >
                    <tr><td style="color: #2b2a2a; padding-right: 5px;">: </td></tr>
                    <tr><td style="color: #2b2a2a; padding-right: 5px;">: </td></tr>
                </table>
            </div>
        </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 11pt;">
                    <thead style="text-align: center;">
                        <tr>
                            <th style="text-align: center;">No </th>
                            <th style="text-align: center;">Jenis Perawatan</th>
                            <th style="text-align: center;">Deskripsi</th> 
                            <th style="text-align: center;">Tanggal</th>
                            <th style="text-align: center;">Gambar Sebelum</th>
                            <th style="text-align: center;">Gambar sesudah</th>
                            <th style="text-align: center;">Dilakukan Oleh</th>                                            
                        </tr>
                    </thead>
                    
                    <tbody style="text-align: center;">
                        <tr>
                            <td style="text-align: center;">1</td> 
                            <td style="text-align: center;">kuratif</td>
                            <td style="text-align: center;">Melakukan penyemprotan</td>
                            <td style="text-align: center;">tanggal</td>
                            <td style="text-align: center;"><img src="<?= base_url("img/koleksi/img.png"); ?>" alt="" width="100px"></td>
                            <td style="text-align: center;"><img src="<?= base_url("img/koleksi/img.png"); ?>" alt="" width="100px"></td>
                            <td style="text-align: center;">nama petugas</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
