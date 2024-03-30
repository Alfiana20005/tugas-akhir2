<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container-fluid">

        <div class="row mt-5">
            <div class="col-lg-7 mb-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambahkan Data Pengunjung</h6>
                </div>
            
                <div class="card-body">
                <?php if (session()->getFlashdata('errors')): ?>
                            <div class="col alert alert-danger" role="alert">
                                <?= session()->getFlashdata('errors'); ?>
                            </div>
                        <?php endif; ?>
                    <form action="/tambahPengunjung" method="post">
                    <?= csrf_field() ?>
                        <div class="row mb-3">
                            <label for="inputname" class="col-sm-3 col-form-label">Nama/Instansi/Keluarga</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Contoh: Universitas Mataram"  name="nama" value="<?= old('nama'); ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Contoh: Jl. Gajah Mada"  name="alamat" value="<?= old('alamat'); ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="No Hp" class="col-sm-3 col-form-label">No.Telp/Hp</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Contoh: 081xxxxxxxxx" name="no_hp" value="<?= old('no_hp'); ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="No Hp" class="col-sm-3 col-form-label">Tanggal Kunjungan</label>
                            <div class="col-sm-9">
                            <input type="date" class="form-control" name="created_at" value="<?= old('created_at'); ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                                <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                                <div class="col-sm-9">
                                    <select class="form-select form-control" type="text" name="kategori">
                                        <option selected>Pilih Kategori</option>
                                        <option <?= old("kategori") == 'TK'? 'selected' : 'TK' ?> value="TK">TK</option>
                                        <option <?= old("kategori") == 'SD'? 'selected' : 'SD' ?>value="SD">SD</option>
                                        <option <?= old("kategori") == 'SMP'? 'selected' : 'SMP' ?>value="SMP">SMP</option>
                                        <option <?= old("kategori") == 'SMA'? 'selected' : 'SMA' ?>value="SMA">SMA</option>
                                        <option <?= old("kategori") == 'Mahasiswa'? 'selected' : 'Mahasiswa' ?>value="Mahasiswa">Mahasiswa</option>
                                        <option <?= old("kategori") == 'Peneliti'? 'selected' : 'Peneliti' ?>value="Peneliti">Peneliti</option>
                                        <option <?= old("kategori") == 'Wisatawan Asing'? 'selected' : 'Wisatawan Asing' ?>value="Wisatawan Asing">Wisatawan Asing</option>
                                        <option <?= old("kategori") == 'Rombongan Tamu Daerah'? 'selected' : 'Rombongan Tamu Daerah' ?>value="Rombongan Tamu Daerah">Rombongan Tamu Daerah</option>
                                        <option <?= old("kategori") == 'Rombongan Tamu Negara'? 'selected' : 'Rombongan Tamu Negara' ?>value="Rombongan Tamu Negara">Rombongan Tamu Negara</option>
                                        <option <?= old("kategori") == 'Umum'? 'selected' : 'Umum' ?>value="Umum">Umum</option>
                                    </select>
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Contoh: 10" name="jumlah" value="<?= old('jumlah'); ?>">
                            </div>
                        </div>
            
                         <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </form>
                </div>
            </div>
            </div>
            <div class="col-lg-5 mb-3">
                <div class="card shadow bg-light">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Jumlah Pengunjung</h6>
                    </div>
                    <div class="card-body">
                       <table class="table">
                            <tr>
                                <td>Hari ini</td>
                                <td>: <?= $totalHariIni; ?></td>
                            </tr>
                            <tr>
                                <td>Bulan ini</td>
                                <td>: <?= $totalBulan; ?></td>
                            </tr>
                            <tr>
                                <td>Tahun ini</td>
                                <td>: <?= $totalTahun; ?></td>
                            </tr>
                            <tr>
                                <td>Keseluruhan (1982-Sekarang)</td>
                                <td>: <?= $totalkeseluruhan; ?></td>
                            </tr>
                       </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Outer Row -->


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pengunjung Hari ini <?= date('d-m-Y') ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Alamat</th>
                                    <th>No Hp</th>
                                    <th>Kategori</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Kunjungan</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $no = 1;
                                
                                foreach($data_pengunjung as $pengunjung): 
                                    // Periksa apakah tanggal kunjungan sama dengan hari ini
                                    $tanggal_kunjungan = date('Y-m-d', strtotime($pengunjung['created_at']));
                                    $today = date('Y-m-d');
                                    
                                    if ($tanggal_kunjungan == $today):
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $pengunjung['nama']; ?></td>
                                    <td><?= $pengunjung['alamat']; ?></td>
                                    <td><?= $pengunjung['no_hp']; ?></td>
                                    <td><?= $pengunjung['kategori']; ?></td>
                                    <td><?= $pengunjung['jumlah']; ?></td>
                                    <td><?= date('d-m-Y', strtotime($pengunjung['created_at'])); ?></td>
                                </tr>
                                <?php 
                                    endif;
                                endforeach; 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</div>

<?= $this-> endSection(); ?>