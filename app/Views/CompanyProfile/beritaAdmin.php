<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <?php if (session()->get('level') == 'Admin'): ?>
        <a class="btn btn-primary mb-3" href="/tambahBerita" role="button">Tambah Berita</a>
        <?php if (session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Berita</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Foto</th>
                            <th style="text-align: center;">Judul Berita</th>
                            <th style="text-align: center;">Isi Berita</th>
                            <th style="text-align: center;">Tipe Berita</th>
                            <th style="text-align: center;">Sumber</th>
                            <th style="text-align: center;">Link</th>
                            <th style="text-align: center;">Sifat Berita</th>
                            <th style="text-align: center;">Kategori</th>
                            <th style="text-align: center;">Tanggal</th>
                            <th style="text-align: center;">Ket.Gambar</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dataBerita as $b): ?>
                            <tr>
                                <td style="text-align: center;"><?= $no++; ?></td>
                                <td style="text-align: center;"><img src="<?= base_url("img/berita/" . $b['foto']); ?>" alt="" style="width: 60px;"></td>
                                <td style="text-align: center;"><?= $b['judul']; ?></td>
                                <td style="text-align: center; width: 400px; max-width: 400px;">
                                    <?= strlen($b['isi']) > 40 ? substr($b['isi'], 0, 40) . '...' : $b['isi']; ?>
                                </td>
                                <td style="text-align: center;"><?= $b['type']; ?></td>
                                <td style="text-align: center;"><?= $b['sumber']; ?></td>
                                <td style="text-align: center; width: 400px; max-width: 400px;">
                                    <?= strlen($b['link']) > 40 ? substr($b['link'], 0, 40) . '...' : $b['link']; ?>
                                </td>
                                <td style="text-align: center;"><?= $b['kategoriBerita']; ?></td>
                                <td style="text-align: center;"><?= $b['jenisBerita']; ?></td>
                                <td style="text-align: center;"><?= $b['tanggal']; ?></td>
                                <td style="text-align: center;"><?= $b['ketgambar']; ?></td>
                                <td style="text-align: center;">
                                    <a href="" class="btn btn-success btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#editBerita<?= $b['id_berita']; ?>" data-bs-whatever="@getbootstrap">Edit</a>
                                    <!-- <a href="" class="btn btn-danger" >hapus</a> -->
                                    <form action="/hapusberita/<?= $b['id_berita']; ?>" method="post" class="d-inline">
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


    <?php
    $no = 1;
    foreach ($dataBerita as $b): ?>
        <div class="modal fade" id="editBerita<?= $b['id_berita']; ?>" tabindex="-1" aria-labelledby="editBerita" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fs-5" id="editBerita">Edit Berita</h4>

                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url() ?>updateBerita/<?= $b['id_berita']; ?>" method="post" enctype="multipart/form-data" id="form">
                            <div class="row mb-2">
                                <label for="email" class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="recipient-name" name="judul" value="<?= $b['judul']; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="email" class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="recipient-name" name="tanggal" value="<?= $b['tanggal']; ?>">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="" class="col-sm-3 col-form-label">Tipe Berita</label>
                                <div class="col-sm-9">
                                    <select class="form-select form-control" type="text" name="type" value="<?= $b['type']; ?>">
                                        <!-- harus sesuai dengan urutan enum pada database -->
                                        <option selected>Pilih </option>
                                        <option <?= $b['type'] == 'Narasi' ? 'selected' : 'Narasi' ?> value="Narasi">Narasi</option>
                                        <option <?= $b['type'] == 'Link' ? 'selected' : 'Link' ?> value="Link">Link</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="" class="col-sm-3 col-form-label">Sifat Berita</label>
                                <div class="col-sm-9">
                                    <select class="form-select form-control" type="text" name="kategoriBerita" value="<?= $b['kategoriBerita']; ?>">
                                        <!-- harus sesuai dengan urutan enum pada database -->
                                        <option selected>Pilih </option>
                                        <option <?= $b['kategoriBerita'] == 'Regional' ? 'selected' : 'Regional' ?> value="Regional">Regional</option>
                                        <option <?= $b['kategoriBerita'] == 'Nasional' ? 'selected' : 'Nasional' ?> value="Nasional">Nasional</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="" class="col-sm-3 col-form-label">Jenis Berita</label>
                                <div class="col-sm-9">
                                    <select class="form-select form-control" type="text" name="jenisBerita" value="<?= $b['jenisBerita']; ?>">
                                        <!-- harus sesuai dengan urutan enum pada database -->
                                        <option selected>Pilih </option>
                                        <option <?= $b['jenisBerita'] == 'Pendidikan' ? 'selected' : 'Pendidikan' ?> value="Pendidikan">Pendidikan</option>
                                        <option <?= $b['jenisBerita'] == 'Sosial Masyarakat' ? 'selected' : 'Sosial Masyarakat' ?> value="Sosial Masyarakat">Sosial Masyarakat</option>
                                        <option <?= $b['jenisBerita'] == 'Sejarah dan Budaya' ? 'selected' : 'Sejarah dan Budaya' ?> value="Sejarah dan Budaya">Sejarah dan Budaya</option>
                                        <option <?= $b['jenisBerita'] == 'Pemerintahan' ? 'selected' : 'Pemerintahan' ?> value="Pemerintahan">Pemerintahan</option>
                                        <option <?= $b['jenisBerita'] == 'Pariwisata' ? 'selected' : 'Pariwisata' ?> value="Pariwisata">Pariwisata</option>

                                    </select>
                                </div>
                            </div>

                            <!-- Field Sumber Berita - BARU -->
                            <div class="row mb-2">
                                <label for="sumber" class="col-sm-3 col-form-label">Sumber Berita</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="sumber" id="sumber<?= $b['id_berita']; ?>" placeholder="Contoh: Kompas, Detik, dll" value="<?= isset($b['sumber']) ? $b['sumber'] : ''; ?>">
                                    <small class="form-text text-muted">Opsional - Masukkan nama sumber berita</small>
                                </div>
                            </div>

                            <!-- Field Link Berita - BARU -->
                            <div class="row mb-2">
                                <label for="link" class="col-sm-3 col-form-label">Link Berita</label>
                                <div class="col-sm-9">
                                    <input type="url" class="form-control" name="link" id="link<?= $b['id_berita']; ?>" placeholder="https://contoh.com/berita" value="<?= isset($b['link']) ? $b['link'] : ''; ?>">
                                    <small class="form-text text-muted">Opsional - Masukkan link URL sumber berita</small>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="isi" class="col-sm-3 col-form-label">Isi Berita</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="isi" id="isi"><?= $b['isi']; ?></textarea>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="foto" class="col-sm-3 col-form-label">Gambar</label>
                                <div class="col-sm-2">
                                    <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-7">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control" id="gambar<?= $b['id_berita']; ?>" name="foto" onchange="previewImg('gambar<?= $b['id_berita']; ?>')">
                                        <label class="custom-file-label" for="customFile">Gambar Maksimal 2 Mb</label>

                                    </div>
                                    <?php if (!empty($b['foto'])): ?>
                                        <div class="my-4">
                                            <p>Foto Saat Ini:</p>
                                            <img src="<?= base_url('img/berita/' . $b['foto']); ?>" alt="Foto Petugas" width="100">
                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div>

                            <div class="row mb-2">
                                <label for="isi" class="col-sm-3 col-form-label">Keterangan Gambar</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="ketgambar" id="ketgambar"><?= $b['ketgambar']; ?></textarea>
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