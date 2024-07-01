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
                        <form action="/savePerawatanPreventif" method="post" enctype="multipart/form-data" id="form">
                        
                        <div class="row mb-2">
                            <label for="email" class="col-sm-3 col-form-label">Tanggal</label>
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
                            <label for="" class="col-sm-3 col-form-label">Kategori Inventaris</label>
                            <div class="col-sm-9">
                                <select class="form-select form-control" type="text" name="rak"  value="<?= old('kode_kategori'); ?>">
                                            <!-- harus sesuai dengan urutan enum pada database -->
                                    <option selected>Pilih </option>
                                    <option <?= old("kode_kategori") == '01'? 'selected' : '01' ?> value=" 01">Geologika</option>
                                    <option <?= old("kode_kategori") == '02'? 'selected' : '02' ?> value=" 02">Biologika</option>
                                    <option <?= old("kode_kategori") == '03'? 'selected' : '03' ?> value=" 03">Etnografika</option>
                                    <option <?= old("kode_kategori") == '04'? 'selected' : '04' ?> value=" 04">Arkeologika</option>
                                    <option <?= old("kode_kategori") == '05'? 'selected' : '05' ?> value=" 05">Historika</option>
                                    <option <?= old("kode_kategori") == '06'? 'selected' : '06' ?> value=" 06">Numismatika</option>
                                    <option <?= old("kode_kategori") == '07'? 'selected' : '07' ?> value=" 07">Filologika</option>
                                    <option <?= old("kode_kategori") == '08'? 'selected' : '08' ?> value=" 08">Kramologika</option>
                                    <option <?= old("kode_kategori") == '09'? 'selected' : '09' ?> value=" 09">Seni Rupa</option>
                                    <option <?= old("kode_kategori") == '10'? 'selected' : '10' ?> value=" 10">Teknologika</option>
                                    <option <?= old("kode_kategori") == 'Lain-lain'? 'selected' : 'Lain-lain' ?> value=" 11">Lain-lain</option>
                                    
                                </select>
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
                                <option selected>Pilih </option>
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
                                <option <?= old("rak") == 'Semua Rak/Laci'? 'selected' : 'Semua Rak/Laci' ?> value="Semua Rak/Laci">Semua Rak/Laci </option>
                                
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
                            <label for="foto_sebelum" class="col-sm-3 col-form-label">Foto Kegiatan</label>
                                <div class="col-sm-2">
                                    <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-7">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control" id="gambar" name="foto_sebelum" onchange="previewImg('gambar')">
                                        <label class="custom-file-label" for="customFile">Gambar Maksimal 2 Mb</label>
                                        <?php if (!empty($dataPerawatan2['foto_sebelum'])): ?>
                                            <div class="my-2">
                                                <p>Foto Saat Ini:</p>
                                                <img src="<?= base_url('img/sebelum/' . $dataPerawatan2['foto_sebelum']); ?>" alt="Foto Petugas" width="100">
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


                        </form>
                    </div>
                        
                </div>
                
            </div>
        </div>
        
    <div class="card shadow mb-4">
    
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
        
        <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#tambahPerawatan" data-bs-whatever="@getbootstrap">Tambah Data</button>
        
        <button onclick="window.print()" type="submit" class="btn btn-sm btn-primary shadow-sm" id="print">
                    <i class="fas fa-print fa-sm text-white-50"></i>Print
                </button>
        </div>
        <div class="card-body">
            <div class="text-center">
                <h6 class="m-0 font-weight-bold text-black">DATA KONSERVASI PREVENTIF</h6>
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
                            <th style="text-align: center;">No Registrasi</th>
                            <th style="text-align: center;">Nama Benda</th>
                            <th style="text-align: center;">Deskripsi Perawatan</th> 
                            <th style="text-align: center;">Tanggal</th>
                            <th style="text-align: center;">Gambar Kegiatan</th>
                            <th style="text-align: center;">Rak/Lemari</th>
                            <th style="text-align: center;">Lokasi/Ruangan</th>
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
                            <td><?= $prw['no_registrasi']; ?></td>

                            <td><?= $prw['nama_inv']; ?></td>
                            <td><?= $prw['deskripsi']; ?></td>
                            <td><?= $prw['tanggal_sebelum']; ?></td>
                            <td style="text-align: center;"><img src="<?= base_url("img/sebelum/". $prw['foto_sebelum']); ?>" alt="" style="width: 60px;"></td>
                            <td><?= $prw['rak']; ?></td>
                            <td><?= $prw['lokasi']; ?></td>
                            <!-- <td><?= $prw['petugas_name']; ?></td> -->
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
            <div class="text-center">
                <h6 class="m-0 font-weight-bold text-black">DATA KONSERVASI PREVENTIF</h6>
                <h6 class="m-0 font-weight-bold text-black mb-4">MUSEUM NEGERI NUSA TENGGARA BARAT (NTB)</h6>
            </div>
            <div class="d-flex text-black">

            </div>
            <div class="table">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 11pt;">
                    <thead style="text-align: center;">
                    <tr>
                            <th style="text-align: center;">No </th>
                            <th style="text-align: center;">No Registrasi</th>
                            <th style="text-align: center;">Nama Benda</th>
                            <th style="text-align: center;">Deskripsi Perawatan</th> 
                            <th style="text-align: center;">Tanggal</th>
                            <th style="text-align: center;">Gambar Kegiatan</th>
                            <th style="text-align: center;">Rak/Lemari</th>
                            <th style="text-align: center;">Lokasi/Ruangan</th>
                            <th style="text-align: center;">Admin</th>                                            
                            <th style="text-align: center;">Penanggung Jawab</th>                                            
                        </tr>
                    </thead>
                    
                    <tbody style="text-align: center;">
                    <?php 
                            $no=1;
                            foreach($dataPerawatan as $prw): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $prw['no_registrasi']; ?></td>

                            <td><?= $prw['nama_inv']; ?></td>
                            <td><?= $prw['deskripsi']; ?></td>
                            <td><?= $prw['tanggal_sebelum']; ?></td>
                            <td style="text-align: center;"><img src="<?= base_url("img/sebelum/". $prw['foto_sebelum']); ?>" alt="" style="width: 60px;"></td>
                            <td><?= $prw['rak']; ?></td>
                            <td><?= $prw['lokasi']; ?></td>
                            <td><?= $prw['petugas_name']; ?></td>
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
