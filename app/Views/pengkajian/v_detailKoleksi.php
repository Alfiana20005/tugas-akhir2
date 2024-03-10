<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="card shadow mb-2">
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-2" id="juduldatakoleksi">
            <a href="<?= base_url('/koleksi/' . $data_koleksi['kode_kategori']) ?>"><h6 class="m-0 font-weight-bold text-primary" id='namakoleksi'><?= $data_koleksi['nama_inv']; ?></h6></a>
            <div class="d-flex">
                <a href="/ubahKoleksi/<?= $data_koleksi['id']; ?>" class="btn btn-success mx-2" >Edit</a>
                <button onclick="window.print()" type="submit" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-print fa-sm text-white-50"></i>Print
                </button>
            </div>
        </div>
        <div class="card-body ">
            <div class="text-center" >
                <h6 id="judul-inv" class="m-0 font-weight-bold mb-4" style="text-transform: uppercase;">INVENTARISASI DATA KOLEKSI <?= $data_koleksi['kategori_name']; ?> </h6>
            </div>
            <div class="d-md-flex text-black mx-auto" style="width: fit-content;">
                
                <div class="flex-grow-1"> 
                    <table class="table table-borderless" style="line-height: 0; border: none;" id="koleksi">
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">No. Inventarisasi</td>
                            <td>: <?= $data_koleksi['kode_kategori']; ?> . <?= $data_koleksi['no_inventaris']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">No. Registrasi</td>
                            <td>: <?= $data_koleksi['no_registrasi']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Jenis Koleksi</td>
                            <td>: <?= $data_koleksi['kategori_name']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Nama Benda</td>
                            <td>: <?= $data_koleksi['nama_inv']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Ukuran</td>
                            <td>: <?= $data_koleksi['ukuran']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Tempat Dibuat</td>
                            <td>: <?= $data_koleksi['tempat_buat']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Tempat Didapat</td>
                            <td>: <?= $data_koleksi['tempat_dapat']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Cara Dapat</td>
                            <td>: <?= $data_koleksi['cara_dapat']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Tanggal Masuk</td>
                            <td>: <?= $data_koleksi['tgl_masuk']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Keadaan</td>
                            <td>: <?= $data_koleksi['keadaan']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Lokasi</td>
                            <td>: <?= $data_koleksi['lokasi']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Diubah oleh</td>
                            <td>: <?= $data_koleksi['petugas_name']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Keterangan</td>
                            <td>: <?= $data_koleksi['keterangan']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Uraian</td>
                            <td>: <?= $data_koleksi['uraian']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Gambar</td>
                            <td>: <img src="<?= base_url('/img/koleksi/' . $data_koleksi['gambar']); ?>" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;"></td>
                        </tr>
                        <!-- Tambahkan baris lain sesuai kebutuhan -->
                    </table>
                </div>
                
            </div>
            
        </div>
    </div>

        <div id="tampilPrint">
            <div class="text-center" >
                <h6 id="judul-inv" class="m-0 font-weight-bold mb-4" style="text-transform: uppercase; font-size: 14pt">INVENTARISASI DATA KOLEKSI <?= $data_koleksi['kategori_name']; ?> </h6>
            </div>
            <div class="d-md-flex text-black mx-auto " style="width: fit-content;">
                
                <div class="flex-grow-1"> 
                    <table class="table table-borderless" style="line-height: 0; border: none;" id="koleksi">
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">No. Inventarisasi</td>
                            <td>: <?= $data_koleksi['kode_kategori']; ?> . <?= $data_koleksi['no_inventaris']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">No. Registrasi</td>
                            <td>: <?= $data_koleksi['no_registrasi']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Jenis Koleksi</td>
                            <td>: <?= $data_koleksi['kategori_name']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Nama Benda</td>
                            <td>: <?= $data_koleksi['nama_inv']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Ukuran</td>
                            <td>: <?= $data_koleksi['ukuran']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Tempat Dibuat</td>
                            <td>: <?= $data_koleksi['tempat_buat']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Tempat Didapat</td>
                            <td>: <?= $data_koleksi['tempat_dapat']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Cara Dapat</td>
                            <td>: <?= $data_koleksi['cara_dapat']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Tanggal Masuk</td>
                            <td>: <?= $data_koleksi['tgl_masuk']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Keadaan</td>
                            <td>: <?= $data_koleksi['keadaan']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Lokasi</td>
                            <td>: <?= $data_koleksi['lokasi']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Diubah oleh</td>
                            <td>: <?= $data_koleksi['petugas_name']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Keterangan</td>
                            <td>: <?= $data_koleksi['keterangan']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Uraian</td>
                            <td>: <?= $data_koleksi['uraian']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="color: #2b2a2a;">Gambar</td>
                            <td>: <img src="<?= base_url('/img/koleksi/' . $data_koleksi['gambar']); ?>" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;"></td>
                        </tr>
                        <!-- Tambahkan baris lain sesuai kebutuhan -->
                    </table>
                </div>
                
            </div>
        </div>
</div>


<?= $this->endSection(); ?>
