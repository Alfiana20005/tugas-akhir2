<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Data Petugas Terdaftar</h1> -->

    <!-- <button class="btn btn-primary mb-3">Tambah data</button> -->
    <?php if (session()->get('level') == 'Admin'): ?>
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahKegiatan" data-bs-whatever="@getbootstrap">Tambah Data</button>
        <?php if (session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="modal fade" id="tambahKegiatan" tabindex="-1" aria-labelledby="tambahKegiatan" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="tambahKegiatan">Tambahkan Data</h4>

                </div>
                <div class="modal-body">
                    <form action="/saveSega" method="post" enctype="multipart/form-data" id="form">


                        <div class="row mb-2">
                            <label for="foto" class="col-sm-3 col-form-label">Gambar</label>
                            <div class="col-sm-2">
                                <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-7">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="gambar" name="foto" onchange="previewImg('gambar')">
                                    <label class="custom-file-label" for="customFile">Gambar Maksimal 2 Mb</label>
                                    <?php if (!empty($sega['foto'])): ?>
                                        <div class="my-2">
                                            <p>Foto Saat Ini:</p>
                                            <img src="<?= base_url('img/sega/' . $sega['foto']); ?>" alt="Foto Petugas" width="100">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="nama" class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="recipient-name" name="judul">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="message-text" class="col-sm-3 col-form-label">Deskripsi Indo:</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="message-text" name="deskripsi_indo"></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="message-text" class="col-sm-3 col-form-label">Deskripsi Eng:</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="message-text" name="deskripsi_eng"></textarea>
                            </div>
                        </div>
                        <!-- Audio Indonesia -->
                        <div class="row mb-2">
                            <label for="audio_id" class="col-sm-3 col-form-label">Audio Indo:</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="audio_id" name="audio_id" accept=".mp3">
                                <small class="form-text text-muted">Maksimal 2 Mb (Format MP3)</small>
                            </div>
                        </div>
                        <!-- Audio English -->
                        <div class="row mb-2">
                            <label for="audio_eng" class="col-sm-3 col-form-label">Audio Eng:</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="audio_eng" name="audio_eng" accept=".mp3">
                                <small class="form-text text-muted">Maksimal 2 Mb (Format MP3)</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                </div>
                </form>
            </div>

        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Sega </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Gambar</th>
                            <th style="text-align: center;">Judul</th>
                            <th style="text-align: center;">Deskripsi</th>
                            <th style="text-align: center;">Audio Indo</th>
                            <th style="text-align: center;">Audio Eng</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($sega as $g): ?>
                            <tr>
                                <!-- <td style="text-align: center;">1</td> -->
                                <!-- <td style="text-align: center;"><img src="" alt="" style="width: 60px;"></td> -->
                                <td style="text-align: center;"><?= $no++; ?></td>
                                <td style="text-align: center;"><img src="<?= base_url("img/sega/" . $g['foto']); ?>" alt="" style="width: 60px;"></td>
                                <td style="text-align: center;"><?= $g['judul']; ?></td>
                                <td style="text-align: center;"><?= $g['deskripsi_pendek1']; ?> <?= $g['deskripsi_pendek2']; ?> </td>
                                <td style="text-align: center;">
                                    <?php if (!empty($g['audio_id'])): ?>
                                        <audio controls>
                                            <source src="<?= base_url('audio/' . $g['audio_id']); ?>" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    <?php else: ?>
                                        <p>Tidak ada audio yang tersedia.</p>
                                    <?php endif; ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if (!empty($g['audio_eng'])): ?>
                                        <audio controls>
                                            <source src="<?= base_url('audio/' . $g['audio_eng']); ?>" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    <?php else: ?>
                                        <p>Tidak ada audio yang tersedia.</p>
                                    <?php endif; ?>
                                </td>
                                <td style="text-align: center;">
                                    <a href="<?= base_url("/previewSega/{$g['id_sega']}"); ?>" class="btn btn-warning btn-sm">Lihat</a>
                                    <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editGallery<?= $g['id_sega']; ?>" data-bs-whatever="@getbootstrap">Edit</a>
                                    <form action="/deleteSega/<?= $g['id_sega']; ?>" method="post" class="d-inline">
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
    foreach ($sega as $g): ?>
        <div class="modal fade" id="editGallery<?= $g['id_sega']; ?>" tabindex="-1" aria-labelledby="editGallery" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fs-5" id="editGallery">Edit Sega</h4>

                    </div>
                    <div class="modal-body">
                        <form action="updateSega/<?= $g['id_sega']; ?>" method="post" enctype="multipart/form-data" id="form">
                            <div class="row mb-2">
                                <label for="nama" class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="recipient-name" name="judul" value="<?= $g['judul']; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="message-text" class="col-sm-3 col-form-label">Deskripsi Indo:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="message-text" name="deskripsi_indo"> <?= $g['deskripsi_indo']; ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="message-text" class="col-sm-3 col-form-label">Deskripsi Eng:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="message-text" name="deskripsi_eng"> <?= $g['deskripsi_eng']; ?></textarea>
                                </div>
                            </div>
                            <!-- Audio Indonesia -->
                            <div class="row mb-2">
                                <label for="audio_id<?= $g['id_sega']; ?>" class="col-sm-3 col-form-label">Audio Indo:</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="audio_id<?= $g['id_sega']; ?>" name="audio_id" accept=".mp3">
                                    <small class="form-text text-muted">Maksimal 2 Mb (Format MP3)</small>
                                    <?php if (!empty($g['audio_id'])): ?>
                                        <div class="my-2">
                                            <p>File Saat Ini:</p>
                                            <audio controls>
                                                <source src="<?= base_url('audio/' . $g['audio_id']); ?>" type="audio/mpeg">
                                                Your browser does not support the audio tag.
                                            </audio>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Audio English -->
                            <div class="row mb-2">
                                <label for="audio_eng<?= $g['id_sega']; ?>" class="col-sm-3 col-form-label">Audio Eng:</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="audio_eng<?= $g['id_sega']; ?>" name="audio_eng" accept=".mp3">
                                    <small class="form-text text-muted">Maksimal 2 Mb (Format MP3)</small>
                                    <?php if (!empty($g['audio_eng'])): ?>
                                        <div class="my-2">
                                            <p>File Saat Ini:</p>
                                            <audio controls>
                                                <source src="<?= base_url('audio/' . $g['audio_eng']); ?>" type="audio/mpeg">
                                                Your browser does not support the audio tag.
                                            </audio>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">Gambar</label>
                                <div class="col-sm-2">
                                    <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview" id="img-preview-<?= $g['id_sega']; ?>">
                                </div>
                                <div class="col-sm-7">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control" id="gambar<?= $g['id_sega']; ?>" name="foto" onchange="previewImg('gambar<?= $g['id_sega']; ?>')">
                                        <label class="custom-file-label" for="customFile">Gambar Maksimal 2 Mb</label>

                                    </div>
                                    <?php if (!empty($g['foto'])): ?>
                                        <div class="my-4">
                                            <p>Foto Saat Ini:</p>
                                            <img src="<?= base_url('img/sega/' . $g['foto']); ?>" alt="Foto Kegiatan" width="100">
                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
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