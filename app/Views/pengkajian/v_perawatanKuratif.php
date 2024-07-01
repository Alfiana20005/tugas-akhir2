<?= $this->extend('template/v_template'); ?>

<?= $this-> section('content'); ?>

<div class="container-fluid">
<!--  -->
        <?php  if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <!-- <form action="<?= base_url('/');?>" method="post">
            
            <div class="row">
                
                <div class="col">
                    <input type="date" class="form-control" placeholder="Mulai dari" aria-label="tanggal" name="mulaiDari"  value="<?= (!empty($tanggalAwal)) ? $tanggalAwal : ''; ?>">
                </div>
                
                <div class="col">
                    <input type="date" class="form-control" placeholder="Hingga" aria-label="tanggal" name="hingga" value="<?= (!empty($tanggalAkhir)) ? $tanggalAkhir : ''; ?>">
                </div>
                <div class="col mb-4">
                <button type="submit" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-sm text-white-50"></i> Tampilkan Data
                </button>
                </div>
            </div>
        </form> -->

        <div class="modal fade" id="tambahPerawatan" tabindex="-1" aria-labelledby="tambahPerawatan" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="tambahPerawatan">Tambahkan Data</h4>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <form action="/savePerawatanKuratif" method="post" enctype="multipart/form-data" id="form">
                    
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="recipient-name" name="tanggal_sebelum">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">No. Registrasi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="recipient-name" name="no_registrasi">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">Nama Benda</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="recipient-name" name="nama_inv">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="" class="col-sm-3 col-form-label">Rak/Laci</label>
                        <div class="col-sm-9">
                            <select class="form-select form-control" type="text" name="rak"  value="<?= old('rak'); ?>">
                                        <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected> </option>
                                <option <?= old("rak") == 'Rak/Laci 1'? 'selected' : 'Rak/Laci 1' ?> value="Rak/Laci 1">Rak/Laci 1</option>
                                <option <?= old("rak") == 'Rak/Laci 2'? 'selected' : 'Rak/Laci 2' ?> value="Rak/Laci 2">Rak/Laci 2</option>
                                <option <?= old("rak") == 'Rak/Laci 3'? 'selected' : 'Rak/Laci 3' ?> value="Rak/Laci 3">Rak/Laci 3</option>
                                <option <?= old("rak") == 'Rak/Laci 4'? 'selected' : 'Rak/Laci 4' ?> value="Rak/Laci 4">Rak/Laci 4</option>
                                <option <?= old("rak") == 'Rak/Laci 5'? 'selected' : 'Rak/Laci 5' ?> value="Rak/Laci 5">Rak/Laci 5</option>
                                <option <?= old("rak") == 'Rak/Laci 6'? 'selected' : 'Rak/Laci 6' ?> value="Rak/Laci 6">Rak/Laci 6</option>
                                <option <?= old("rak") == 'Rak/Laci 7'? 'selected' : 'Rak/Laci 7' ?> value="Rak/Laci 7">Rak/Laci 7</option>
                                <option <?= old("rak") == 'Rak/Laci 8'? 'selected' : 'Rak/Laci 8' ?> value="Rak/Laci 8">Rak/Laci 8</option>
                                <option <?= old("rak") == 'Rak/Laci 9'? 'selected' : 'Rak/Laci 9' ?> value="Rak/Laci 9">Rak/Laci 9</option>
                                <option <?= old("rak") == 'Rak/Laci 10'? 'selected' : 'Rak/Laci 10' ?> value="Rak/Laci 10">Rak/Laci 10</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="" class="col-sm-3 col-form-label">Lemari</label>
                        <div class="col-sm-9">
                            <select class="form-select form-control" type="text" name="lemari"  value="<?= old('lemari'); ?>">
                                        <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih </option>
                                <option <?= old("lemari") == 'Lemari 1'? 'selected' : 'Lemari 1' ?> value="Lemari 1">Lemari 1</option>
                                <option <?= old("lemari") == 'Lemari 2'? 'selected' : 'Lemari 2' ?> value="Lemari 2">Lemari 2</option>
                                <option <?= old("lemari") == 'Lemari 3'? 'selected' : 'Lemari 3' ?> value="Lemari 3">Lemari 3</option>
                                <option <?= old("lemari") == 'Lemari 4'? 'selected' : 'Lemari 4' ?> value="Lemari 4">Lemari 4</option>
                                <option <?= old("lemari") == 'Lemari 5'? 'selected' : 'Lemari 5' ?> value="Lemari 5">Lemari 5</option>
                                <option <?= old("lemari") == 'Lemari 6'? 'selected' : 'Lemari 6' ?> value="Lemari 6">Lemari 6</option>
                                <option <?= old("lemari") == 'Lemari 7'? 'selected' : 'Lemari 7' ?> value="Lemari 7">Lemari 7</option>
                                <option <?= old("lemari") == 'Lemari 8'? 'selected' : 'Lemari 8' ?> value="Lemari 8">Lemari 8</option>
                                <option <?= old("lemari") == 'Lemari 9'? 'selected' : 'Lemari 9' ?> value="Lemari 9">Lemari 9</option>
                                <option <?= old("lemari") == 'Lemari 10'? 'selected' : 'Lemari 10' ?> value="Lemari 10">Lemari 10</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="" class="col-sm-3 col-form-label">Lokasi/Ruangan</label>
                        <div class="col-sm-9">
                            <select class="form-select form-control" type="text" name="lokasi"  value="<?= old('lokasi'); ?>">
                                        <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih Lokasi Koleksi</option>
                                <option <?= old("lokasi") == 'Gudang Koleksi Museum NTB'? 'selected' : 'Gudang Koleksi Museum NTB' ?> value="Gudang Koleksi Museum NTB">Gudang Koleksi Museum NTB</option>
                                <option <?= old("lokasi") == 'Gudang Atas Ruang TU'? 'selected' : 'Gudang Atas Ruang TU' ?> value="Gudang Atas Ruang TU">Gudang Atas Ruang TU</option>
                                <option <?= old("lokasi") == 'Gudang Belakang Museum NTB'? 'selected' : 'Gudang Belakang Museum NTB' ?> value="Gudang Belakang Museum NTB">Gudang Belakang Museum NTB</option>
                                <option <?= old("lokasi") == 'Ruang Pameran Tetap Museum NTB'? 'selected' : 'Ruang Pameran Tetap Museum NTB' ?> value="Ruang Pameran Tetap Museum NTB">Ruang Pameran Tetap Museum NTB</option>
                                <option <?= old("lokasi") == 'Area/Halaman Museum NTB'? 'selected' : 'Area/Halaman Museum NTB' ?> value="Area/Halaman Museum NTB">Area/Halaman Museum NTB</option>
                                
                            </select>
                        </div>
                    </div>
                     
                    <div class="row mb-2">
                            <label for="isi" class="col-sm-3 col-form-label">Deskripsi Perawatan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="deskripsi" id="" ></textarea>
                                
                            </div>
                    </div>
                    <div class="row mb-2">
                        <label for="foto" class="col-sm-3 col-form-label">Gambar Sebelum</label>
                            <div class="col-sm-2">
                                <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-7">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="gambar" name="foto_sebelum" onchange="previewImg('gambar')">
                                    <label class="custom-file-label" for="customFile">Gambar Maksimal 2 Mb</label>
                                    <?php if (!empty($dataPerawatan['foto_sebelum'])): ?>
                                        <div class="my-2">
                                            <p>Foto Saat Ini:</p>
                                            <img src="<?= base_url('img/perawatan/' . $dataPerawatan['foto_sebelum']); ?>" alt="Foto Petugas" width="100">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                    </div>
                    <div class="row mb-2">
                            <label for="email" class="col-sm-3 col-form-label">Penanggung Jawab</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="recipient-name" name="penanggung_jawab">
                            </div>
                        </div>
                        
                    

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
                </div>
                    </form>
                </div>
                
            </div>
        </div>
        
        <?php 
        $no=1;
        foreach($dataPerawatan as $prw): ?> 
    <div class="modal fade" id="editKuratif<?= $prw['id_perawatan2']; ?>" tabindex="-1" aria-labelledby="editKuratif" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="editKuratif">Edit Perawatan</h4> 
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <form action="<?= base_url()?>updatePerawatan/<?= $prw['id_perawatan2']; ?>" method="post" enctype="multipart/form-data" id="form">
                    
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="recipient-name" name="tanggal" value="<?= $prw['tanggal_sebelum']; ?>">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">No Registrasi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="recipient-name" name="no_registrasi" value="<?= $prw['no_registrasi']; ?>">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">Nama Benda</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="recipient-name" name="nama_inv" value="<?= $prw['nama_inv']; ?>">
                        </div>
                    </div>
                    
                    
                   
                    <div class="row mb-2">
                        <label for="" class="col-sm-3 col-form-label">Rak/Laci</label>
                        <div class="col-sm-9">
                            <select class="form-select form-control" type="text" name="rak"  value="<?= $prw['rak']; ?>">
                                        <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected> </option>
                                <option <?= $prw['rak'] == 'Rak/Laci 1'? 'selected' : 'Rak/Laci 1' ?> value="Rak/Laci 1">Rak/Laci 1</option>
                                <option <?= $prw['rak'] == 'Rak/Laci 2'? 'selected' : 'Rak/Laci 2' ?> value="Rak/Laci 2">Rak/Laci 2</option>
                                <option <?= $prw['rak'] == 'Rak/Laci 3'? 'selected' : 'Rak/Laci 3' ?> value="Rak/Laci 3">Rak/Laci 3</option>
                                <option <?= $prw['rak'] == 'Rak/Laci 4'? 'selected' : 'Rak/Laci 4' ?> value="Rak/Laci 4">Rak/Laci 4</option>
                                <option <?= $prw['rak'] == 'Rak/Laci 5'? 'selected' : 'Rak/Laci 5' ?> value="Rak/Laci 5">Rak/Laci 5</option>
                                <option <?=  $prw['rak'] == 'Rak/Laci 6'? 'selected' : 'Rak/Laci 6' ?> value="Rak/Laci 6">Rak/Laci 6</option>
                                <option <?=  $prw['rak'] == 'Rak/Laci 7'? 'selected' : 'Rak/Laci 7' ?> value="Rak/Laci 7">Rak/Laci 7</option>
                                <option <?=  $prw['rak'] == 'Rak/Laci 8'? 'selected' : 'Rak/Laci 8' ?> value="Rak/Laci 8">Rak/Laci 8</option>
                                <option <?=  $prw['rak'] == 'Rak/Laci 9'? 'selected' : 'Rak/Laci 9' ?> value="Rak/Laci 9">Rak/Laci 9</option>
                                <option <?=  $prw['rak'] == 'Rak/Laci 10'? 'selected' : 'Rak/Laci 10' ?> value="Rak/Laci 10">Rak/Laci 10</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="" class="col-sm-3 col-form-label">Lemari</label>
                        <div class="col-sm-9">
                            <select class="form-select form-control" type="text" name="lemari"  value="<?= $prw['lemari']; ?>">
                                        <!-- harus sesuai dengan urutan enum pada database -->
                                
                                <option selected>Pilih </option>
                                <option <?= $prw['lemari'] == 'Lemari 1'? 'selected' : 'Lemari 1' ?> value="Lemari 1">Lemari 1</option>
                                <option <?= $prw['lemari'] == 'Lemari 2'? 'selected' : 'Lemari 2' ?> value="Lemari 2">Lemari 2</option>
                                <option <?= $prw['lemari'] == 'Lemari 3'? 'selected' : 'Lemari 3' ?> value="Lemari 3">Lemari 3</option>
                                <option <?= $prw['lemari'] == 'Lemari 4'? 'selected' : 'Lemari 4' ?> value="Lemari 4">Lemari 4</option>
                                <option <?= $prw['lemari'] == 'Lemari 5'? 'selected' : 'Lemari 5' ?> value="Lemari 5">Lemari 5</option>
                                <option <?= $prw['lemari'] == 'Lemari 6'? 'selected' : 'Lemari 6' ?> value="Lemari 6">Lemari 6</option>
                                <option <?= $prw['lemari'] == 'Lemari 7'? 'selected' : 'Lemari 7' ?> value="Lemari 7">Lemari 7</option>
                                <option <?= $prw['lemari'] == 'Lemari 8'? 'selected' : 'Lemari 8' ?> value="Lemari 8">Lemari 8</option>
                                <option <?= $prw['lemari'] == 'Lemari 9'? 'selected' : 'Lemari 9' ?> value="Lemari 9">Lemari 9</option>
                                <option <?= $prw['lemari'] == 'Lemari 10'? 'selected' : 'Lemari 10' ?> value="Lemari 10">Lemari 10</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="" class="col-sm-3 col-form-label">Lokasi/Ruangan</label>
                        <div class="col-sm-9">
                            <select class="form-select form-control" type="text" name="lokasi"  value="<?= $prw['lokasi']; ?>">
                                        <!-- harus sesuai dengan urutan enum pada database -->
                                <option selected>Pilih Lokasi Koleksi</option>
                                <option <?= $prw['lokasi'] == 'Gudang Koleksi Museum NTB'? 'selected' : 'Gudang Koleksi Museum NTB' ?> value="Gudang Koleksi Museum NTB">Gudang Koleksi Museum NTB</option>
                                <option <?= $prw['lokasi'] == 'Gudang Atas Ruang TU'? 'selected' : 'Gudang Atas Ruang TU' ?> value="Gudang Atas Ruang TU">Gudang Atas Ruang TU</option>
                                <option <?= $prw['lokasi'] == 'Gudang Belakang Museum NTB'? 'selected' : 'Gudang Belakang Museum NTB' ?> value="Gudang Belakang Museum NTB">Gudang Belakang Museum NTB</option>
                                <option <?= $prw['lokasi'] == 'Ruang Pameran Tetap Museum NTB'? 'selected' : 'Ruang Pameran Tetap Museum NTB' ?> value="Ruang Pameran Tetap Museum NTB">Ruang Pameran Tetap Museum NTB</option>
                                <option <?= $prw['lokasi'] == 'Area/Halaman Museum NTB'? 'selected' : 'Area/Halaman Museum NTB' ?> value="Area/Halaman Museum NTB">Area/Halaman Museum NTB</option>
                                
                            </select>
                        </div>
                    </div>
                    
                        <div class="row mb-2">
                            <label class="col-sm-3 col-form-label">Gambar Sebelum</label>
                            <div class="col-sm-2">
                                <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview" id="img-preview-<?= $prw['id_perawatan2']; ?>">
                            </div>
                            <div class="col-sm-7">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="gambar<?= $prw['id_perawatan2']; ?>" name="foto_sebelum" onchange="previewImg('gambar<?= $prw['id_perawatan2']; ?>')">
                                    <label class="custom-file-label" for="customFile">Gambar Maksimal 2 Mb</label>
                                    
                                </div>
                                <?php if (!empty($prw['foto_sebelum'])): ?>
                                        <div class="my-4">
                                            <p>Foto Saat Ini:</p>
                                            <img src="<?= base_url('img/sebelum/' . $prw['foto_sebelum']); ?>" alt="Foto Prawatan" width="100">
                                        </div>
                                    <?php endif; ?>
                            </div>
                            
                        </div>
                        <div class="row mb-2">
                            <label for="isi" class="col-sm-3 col-form-label">Deskripsi Perawatan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="deskripsi" id="deskripsi"><?= $prw['deskripsi']; ?></textarea>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="" class="col-sm-3 col-form-label">Status Prawatan</label>
                            <div class="col-sm-9">
                                <select class="form-select form-control" type="text" name="status"  value="<?= $prw['status']; ?>">
                                            
                                    <option selected>Pilih </option>
                                    <option <?= $prw['status'] == 'Sedang Dirawat'? 'selected' : 'Sedang Dirawat' ?> value="Sedang Dirawat">Sedang Dirawat</option>
                                    <option <?= $prw['status'] == 'Selesai'? 'selected' : 'Selesai' ?> value="Selesai">Selesai</option>
                                    
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-2">
                            <label class="col-sm-3 col-form-label">Gambar Setelah</label>
                            <div class="col-sm-2">
                                <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview" id="img-preview-<?= $prw['id_perawatan2']; ?>">
                            </div>
                            <div class="col-sm-7">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="gambar2<?= $prw['id_perawatan2']; ?>" name="foto_setelah" onchange="previewImg('gambar2<?= $prw['id_perawatan2']; ?>')">
                                    <label class="custom-file-label" for="customFile">Gambar Maksimal 2 Mb</label>
                                    
                                </div>
                                <?php if (!empty($prw['foto_setelah'])): ?>
                                        <div class="my-4">
                                            <p>Foto Saat Ini:</p>
                                            <img src="<?= base_url('img/sesudah/' . $prw['foto_setelah']); ?>" alt="Foto Kegiatan" width="100">
                                        </div>
                                    <?php endif; ?>
                            </div>
                            
                        </div>
                    <div class="row mb-2">
                        <label for="email" class="col-sm-3 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="recipient-name" name="tanggal_sesudah" value="<?= $prw['tanggal_sesudah']; ?>">
                        </div>
                    </div>
                    <div class="row mb-2">
                            <label for="email" class="col-sm-3 col-form-label">Penanggung Jawab</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="recipient-name" name="penanggung_jawab" value="<?= $prw['penanggung_jawab']; ?>">
                            </div>
                        </div>
                        
                    

                    <div class="modal-footer my-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
                </form>
            </div>
            
        </div>
    </div>

    <?php endforeach; ?>
    <div class="card shadow mb-4">
    
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
        <button type="button" class="btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#tambahPerawatan" data-bs-whatever="@getbootstrap">Tambah Data</button>
        <button onclick="window.print()" type="submit" class="btn btn-sm btn-primary shadow-sm" id="print">
                    <i class="fas fa-print fa-sm text-white-50"></i>Print
                </button>
        </div>
        <div class="card-body">
            <div class="text-center">
                <h6 class="m-0 font-weight-bold text-black">DATA KONSERVASI KURATIF</h6>
                <h6 class="m-0 font-weight-bold text-black mb-4">MUSEUM NEGERI NUSA TENGGARA BARAT (NTB)</h6>
            </div>
            <div class="d-flex text-black">
                <!-- <div class="" id="judul">
                    <table >
                        <tr><td style="color: #2b2a2a; padding-right: 5px;">Nama Koleksi</td></tr>
                        <tr><td style="color: #2b2a2a; padding-right: 5px;">No. Registrasi</td></tr>
                    </table>
                </div>
                 -->
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center;">
                        <tr>
                            <th style="text-align: center;">No </th>
                            <th style="text-align: center;">Tanggal Mulai</th>
                            <th style="text-align: center;">Tanggal Selesai</th>
                            <th style="text-align: center;">No Registrasi</th>
                            <th style="text-align: center;">Nama Benda</th>
                            <th style="text-align: center;">Deskripsi Perawatan</th> 
                            <!-- <th style="text-align: center;">Rak/Lemari</th>  -->
                            <th style="text-align: center;">Lokasi Penyimpanan</th> 
                            <th style="text-align: center;">Status Perawatan</th>
                            <th style="text-align: center;">Gambar Sebelum</th>
                            <th style="text-align: center;">Gambar sesudah</th>
                            <th style="text-align: center;">Admin</th>                                            
                            <th style="text-align: center;">Penanggung Jawab</th>                                            
                            <th style="text-align: center;">Aksi</th>                                            
                        </tr>
                    </thead>
                    
                    <tbody style="text-align: center;">
                    <?php 
                            $no=1;
                            foreach($dataPerawatan as $prw): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $prw['tanggal_sebelum']; ?></td>
                            <td><?= $prw['tanggal_sesudah']; ?></td>
                            <td><?= $prw['no_registrasi']; ?></td>
                            <td><?= $prw['nama_inv']; ?></td>
                            <td><?= $prw['deskripsi']; ?></td>
                            
                            <td><?= $prw['rak']; ?> <?= $prw['lemari']; ?> <?= $prw['lokasi']; ?></td>
                            <td><?= $prw['status']; ?></td>
                            <td style="text-align: center;"><img src="<?= base_url("img/sebelum/". $prw['foto_sebelum']); ?>" alt="" style="width: 60px;"></td>
                            <td style="text-align: center;"><img src="<?= base_url("img/sesudah/". $prw['foto_setelah']); ?>" alt="" style="width: 60px;"></td>
                            
                            <td><?= $prw['petugas_name']; ?></td>
                            <td><?= $prw['penanggung_jawab']; ?></td>
                            <td>
                                <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editKuratif<?= $prw['id_perawatan2']; ?>" data-bs-whatever="@getbootstrap">Edit</a>
                                                <!-- <a href="" class="btn btn-danger" >hapus</a> -->
                                                <form action="/deletePerawatan2/<?= $prw['id_perawatan2']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin?');">Hapus</button>
                                                </form>
                            </td>
                        </tr>

                        <?php endforeach; ?> 
                    </tbody>
                        
                </table>
            </div>
        </div>
    </div>
    <div class="" id="tampilPerawatan">
    <div class="container-fluid d-sm-flex align-items-center justify-content-center mt-4" id="judul-inv">
              <img src="<?= base_url('/img/download.png') ?>   " alt="" id="logo" style="width: 56px; margin-right: 20px;" >
              <div class="text-center">
                  <h6 class="m-0 font-weight-bold text-black" style="text-transform: uppercase;">DATA KONSERVASI KURATIF</h6>
                  <h6 class="m-0 font-weight-bold text-black">MUSEUM NEGERI NUSA TENGGARA BARAT (NTB)</h6>
                  
              </div>
              <img src=" <?= base_url('/img/logo-.png') ?>" alt="" id="logo" style="width: 80px; margin-left: 20px;">
            </div>
            <hr>
            <div class="table">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 11pt;">
                    <thead style="text-align: center;">
                        <tr>
                        <th style="text-align: center;">No </th>
                            <th style="text-align: center;">Tanggal Mulai</th>
                            <th style="text-align: center;">Tanggal Selesai</th>
                            <th style="text-align: center;">No Registrasi</th>
                            <th style="text-align: center;">Nama Benda</th>
                            <th style="text-align: center;">Deskripsi Perawatan</th> 
                            <th style="text-align: center;">Rak/Lemari</th> 
                            <th style="text-align: center;">Lokasi/Ruangan</th> 
                            <th style="text-align: center;">Status Perawatan</th>
                            <th style="text-align: center;">Gambar Sebelum</th>
                            <th style="text-align: center;">Gambar sesudah</th>
                            <th style="text-align: center;">Penanggung Jawab</th>                                            
                        </tr>
                    </thead>
                    
                    <tbody style="text-align: center;">
                    <?php 
                            $no=1;
                            foreach($dataPerawatan as $prw): ?>
                            <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $prw['tanggal_sebelum']; ?></td>
                            <td><?= $prw['tanggal_sesudah']; ?></td>
                            <td><?= $prw['no_registrasi']; ?></td>
                            <td><?= $prw['nama_inv']; ?></td>
                            <td><?= $prw['deskripsi']; ?></td>
                            <td><?= $prw['rak']; ?></td>
                            <td><?= $prw['lokasi']; ?></td>
                            <td><?= $prw['status']; ?></td>
                            <td style="text-align: center;"><img src="<?= base_url("img/sebelum/". $prw['foto_sebelum']); ?>" alt="" style="width: 60px;"></td>
                            <td style="text-align: center;"><img src="<?= base_url("img/sesudah/". $prw['foto_setelah']); ?>" alt="" style="width: 60px;"></td>
                            
                            <td><?= $prw['penanggung_jawab']; ?></td>
                            </tr>
                            <?php endforeach; ?> 
                    </tbody>
                        
                </table>
            </div>
        </div>
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
