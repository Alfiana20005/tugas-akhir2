<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="card shadow mb-2">
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-2" id="juduldatakoleksi">
            <a href="<?= base_url('/koleksi/' . $data_koleksi['kode_kategori']) ?>"><h6 class="m-0 font-weight-bold text-primary" id='namakoleksi'><?= $data_koleksi['nama_inv']; ?></h6></a>
            <div class="d-flex">
                <a href="/ubahKoleksi/<?= $data_koleksi['id']; ?>" class="btn btn-success btn-sm" >Edit</a>
                <!-- <a href="/terakhirDiubah/{$data_koleksi['id']}" class="btn btn-warning btn-sm mx-2" >Terakhir Diubah</a> -->
                <a href="<?= base_url("/dataPerawatan/{$data_koleksi['no_registrasi']}"); ?>" class="btn btn-info btn-sm  mx-2" >Perawatan</a>
                <button onclick="window.print()" type="submit" class="btn btn-sm btn-primary shadow-sm" id="print">
                    <i class="fas fa-print fa-sm text-white-50"></i>Print
                </button>
            </div>
        </div>
        <div class="card-body ">
            <!-- <div class="text-center" >
                <h6 id="judul-inv" class="m-0 font-weight-bold mb-4" style="text-transform: uppercase;">INVENTARISASI DATA KOLEKSI <?= $data_koleksi['kategori_name']; ?> </h6>
            </div> -->
            <div class="text-center" >
                <h6 id="judul-inv" class="m-0 font-weight-bold mb-4" style="text-transform: uppercase;">DATA KOLEKSI </h6>
            </div>
            <div class="table-responsive mx-auto" style="max-width: 700px;"> <!-- Membatasi lebar maksimum tabel -->
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tbody style="font-size: 12pt; line-height: auto; text-align: justify; ">
                        <!-- Isi tabel -->
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">No. Inventarisasi</td>
                            <td>: <?= $data_koleksi['kode_kategori']; ?> . <?= $data_koleksi['no_inventaris']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">No. Registrasi</td>
                            <td>: <?= $data_koleksi['no_registrasi']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Jenis Koleksi</td>
                            <td>: <?= $data_koleksi['kategori_name']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Nama Benda</td>
                            <td>: <?= $data_koleksi['nama_inv']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Object Name</td>
                            <td>: <?= $data_koleksi['inv_name']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Usia Benda</td>
                            <td>: <?= $data_koleksi['usia']; ?></td>
                        </tr>
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Ukuran</td>
                            <td>: <?= $data_koleksi['ukuran']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Tempat Dibuat</td>
                            <td>: <?= $data_koleksi['tempat_buat']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Tempat Didapat</td>
                            <td>: <?= $data_koleksi['tempat_dapat']; ?></td>
                        </tr>
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Cara Dapat</td>
                            <td>: <?= $data_koleksi['cara_dapat']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Tanggal Masuk</td>
                            <td>: <?= $data_koleksi['tgl_masuk']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Keadaan</td>
                            <td>: <?= $data_koleksi['keadaan']; ?></td>
                        </tr>
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Penyimpanan</td>
                            <td>: <?= $data_koleksi['lokasi']; ?> <?= $data_koleksi['zona']; ?> <?= $data_koleksi['lemari']; ?> <?= $data_koleksi['rak']; ?> urutan ke <?= $data_koleksi['urutan']; ?></td>
                        </tr>
                        <!-- <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Lokasi</td>
                            <td>: <?= $data_koleksi['lokasi']; ?> </td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Zona</td>
                            <td>: <?= $data_koleksi['zona']; ?> </td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Lemari</td>
                            <td>: <?= $data_koleksi['lemari']; ?> </td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Rak/Laci</td>
                            <td>: <?= $data_koleksi['rak']; ?> </td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Urutan</td>
                            <td>: <?= $data_koleksi['urutan']; ?> </td>
                        </tr> -->
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Harga Perolehan</td>
                            <td>: <?= $data_koleksi['harga']; ?></td>
                        </tr>
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Nilai Wajar Benda (2024)</td>
                            <td>: <?= $data_koleksi['harga_wajar']; ?></td>
                        </tr>
                        
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Nilai Penggantian</td>
                            <td>: <?= $data_koleksi['harga_penggantian']; ?></td>
                        </tr>
                        
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Keterangan</td>
                            <td>: <?= $data_koleksi['keterangan']; ?></td>
                        </tr>
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Uraian</td>
                            <td>: <?= $data_koleksi['uraian']; ?></td>
                        </tr>
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Sumber Data</td>
                            <td>: <?= $data_koleksi['sumber']; ?></td>
                        </tr>
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Status</td>
                            <td>: <?= $data_koleksi['status']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Verifikator</td>
                            <td>: <?= $data_koleksi['petugas_name']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Fotografer</td>
                            <td>: <?= $data_koleksi['fotografer']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Gambar</td>
                            <td>: <img src="<?= base_url('/img/koleksi/' . $data_koleksi['gambar']); ?>" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;"></td>
                        </tr>
                        
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Kode Lembar Kerja</td>
                            <td>: <?= $data_koleksi['kode_lk']; ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>    
    </div>

        <div id="tampilPrint">
            <div class="container-fluid d-sm-flex align-items-center justify-content-center mt-4" id="judul-inv">
              <img src="<?= base_url('/img/download.png') ?>   " alt="" id="logo" style="width: 56px; margin-right: 20px;" >
              <div class="text-center">
                  <h6 class="m-0 font-weight-bold text-black" style="text-transform: uppercase;">INVENTARISASI DATA KOLEKSI <?= $data_koleksi['kategori_name']; ?> </h6>
                  <h6 class="m-0 font-weight-bold text-black">MUSEUM NEGERI NUSA TENGGARA BARAT (NTB)</h6>
                  
              </div>
              <img src=" <?= base_url('/img/logo-.png') ?>" alt="" id="logo" style="width: 80px; margin-left: 20px;">
            </div>
            <hr>
            <div class="table-responsive mx-auto" style="max-width: 700px; padding-left: 110px;"> <!-- Membatasi lebar maksimum tabel -->
                <table class="table table-borderless" width="100%" cellspacing="0">
                    <tbody style="font-size: 12pt; line-height: auto; text-align: justify; font-family:Times New Roman;">
                       <!-- Isi tabel -->
                       <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">No. Inventarisasi</td>
                            <td>: <?= $data_koleksi['kode_kategori']; ?> . <?= $data_koleksi['no_inventaris']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">No. Registrasi</td>
                            <td>: <?= $data_koleksi['no_registrasi']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Jenis Koleksi</td>
                            <td>: <?= $data_koleksi['kategori_name']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Nama Benda</td>
                            <td>: <?= $data_koleksi['nama_inv']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Object Name</td>
                            <td>: <?= $data_koleksi['inv_name']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Usia Benda</td>
                            <td>: <?= $data_koleksi['usia']; ?></td>
                        </tr>
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Ukuran</td>
                            <td>: <?= $data_koleksi['ukuran']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Tempat Dibuat</td>
                            <td>: <?= $data_koleksi['tempat_buat']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Tempat Didapat</td>
                            <td>: <?= $data_koleksi['tempat_dapat']; ?></td>
                        </tr>
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Cara Dapat</td>
                            <td>: <?= $data_koleksi['cara_dapat']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Tanggal Masuk</td>
                            <td>: <?= $data_koleksi['tgl_masuk']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Keadaan</td>
                            <td>: <?= $data_koleksi['keadaan']; ?></td>
                        </tr>
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Penyimpanan</td>
                            <td>: <?= $data_koleksi['lokasi']; ?> <?= $data_koleksi['zona']; ?> <?= $data_koleksi['lemari']; ?> <?= $data_koleksi['rak']; ?> urutan ke <?= $data_koleksi['urutan']; ?></td>
                        </tr>
                        <!-- <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Lokasi</td>
                            <td>: <?= $data_koleksi['lokasi']; ?> </td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Zona</td>
                            <td>: <?= $data_koleksi['zona']; ?> </td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Lemari</td>
                            <td>: <?= $data_koleksi['lemari']; ?> </td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Rak/Laci</td>
                            <td>: <?= $data_koleksi['rak']; ?> </td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Urutan</td>
                            <td>: <?= $data_koleksi['urutan']; ?> </td>
                        </tr> -->
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Harga Perolehan</td>
                            <td>: <?= $data_koleksi['harga']; ?></td>
                        </tr>
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Nilai Wajar Benda (2024)</td>
                            <td>: <?= $data_koleksi['harga_wajar']; ?></td>
                        </tr>
                        
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Nilai Penggantian</td>
                            <td>: <?= $data_koleksi['harga_penggantian']; ?></td>
                        </tr>
                        
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Keterangan</td>
                            <td>: <?= $data_koleksi['keterangan']; ?></td>
                        </tr>
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Uraian</td>
                            <td>: <?= $data_koleksi['uraian']; ?></td>
                        </tr>
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Sumber Data</td>
                            <td>: <?= $data_koleksi['sumber']; ?></td>
                        </tr>
                        <tr style="line-height: auto;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Status</td>
                            <td>: <?= $data_koleksi['status']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Verifikator</td>
                            <td>: <?= $data_koleksi['petugas_name']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Fotografer</td>
                            <td>: <?= $data_koleksi['fotografer']; ?></td>
                        </tr>
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Gambar</td>
                            <td>: <img src="<?= base_url('/img/koleksi/' . $data_koleksi['gambar']); ?>" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;"></td>
                        </tr>
                        
                        <tr style="line-height: 0;">
                            <td class="font-weight-bold" style="color: #2b2a2a; width: 30%;">Kode Lembar Kerja</td>
                            <td>: <?= $data_koleksi['kode_lk']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>   
        </div> 

        
</div>
<?= $this->endSection(); ?>
