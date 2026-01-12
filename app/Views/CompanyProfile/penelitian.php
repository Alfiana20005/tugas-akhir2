<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Data Penelitian Terdaftar</h1> -->

    <?php if (session()->get('level') == 'Admin'): ?>
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahPenelitian" data-bs-whatever="@getbootstrap">Tambah Penelitian</button>
        <?php if (session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="modal fade" id="tambahPenelitian" tabindex="-1" aria-labelledby="tambahPenelitian" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="tambahPenelitian">Tambahkan Penelitian</h4>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <form action="/savePenelitian" method="post" id="form">
                        <div class="row mb-2">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="no_identitas" class="col-sm-3 col-form-label">Nomor Identitas</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="no_identitas" name="no_identitas">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="judul_penelitian" class="col-sm-3 col-form-label">Judul Penelitian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="judul_penelitian" name="judul_penelitian">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="jenis" class="col-sm-3 col-form-label">Jenis</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="jenis" name="jenis" required>
                                    <option value="">Pilih Jenis</option>
                                    <option value="umum">Umum</option>
                                    <option value="museum">Museum</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="kategori_objek" class="col-sm-3 col-form-label">Kategori Objek</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kategori_objek" name="kategori_objek">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="jenjang_pendidikan" class="col-sm-3 col-form-label">Jenjang Pendidikan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="program_studi" class="col-sm-3 col-form-label">Program Studi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="program_studi" name="program_studi">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="instansi" class="col-sm-3 col-form-label">Instansi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="instansi" name="instansi">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="tanggal_mulai" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="tanggal_akhir" class="col-sm-3 col-form-label">Tanggal Akhir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Penelitian</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Nama</th>
                            <th style="text-align: center;">No Identitas</th>
                            <th style="text-align: center;">Judul Penelitian</th>
                            <th style="text-align: center;">Jenis</th>
                            <th style="text-align: center;">Kategori Objek</th>
                            <th style="text-align: center;">Jenjang Pendidikan</th>
                            <th style="text-align: center;">Program Studi</th>
                            <th style="text-align: center;">Instansi</th>
                            <th style="text-align: center;">Tanggal Mulai</th>
                            <th style="text-align: center;">Tanggal Akhir</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($penelitian as $p): ?>
                            <tr>
                                <td style="text-align: center;"><?= $no++; ?></td>
                                <td style="text-align: center;"><?= $p['nama']; ?></td>
                                <td style="text-align: center;"><?= $p['no_identitas']; ?></td>
                                <td style="text-align: center;"><?= $p['judul_penelitian']; ?></td>
                                <td style="text-align: center;">
                                    <span class="badge badge-<?= $p['jenis'] == 'museum' ? 'primary' : 'secondary'; ?>">
                                        <?= ucfirst($p['jenis']); ?>
                                    </span>
                                </td>
                                <td style="text-align: center;"><?= $p['kategori_objek']; ?></td>
                                <td style="text-align: center;"><?= $p['jenjang_pendidikan']; ?></td>
                                <td style="text-align: center;"><?= $p['program_studi']; ?></td>
                                <td style="text-align: center;"><?= $p['instansi']; ?></td>
                                <td style="text-align: center;"><?= $p['tanggal_mulai']; ?></td>
                                <td style="text-align: center;"><?= $p['tanggal_akhir']; ?></td>
                                <td style="text-align: center;">
                                    <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editPenelitian<?= $p['id_penelitian']; ?>" data-bs-whatever="@getbootstrap">Edit</a>
                                    <form action="/hapusPenelitian/<?= $p['id_penelitian']; ?>" method="post" class="d-inline">
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
    foreach ($penelitian as $p): ?>
        <div class="modal fade" id="editPenelitian<?= $p['id_penelitian']; ?>" tabindex="-1" aria-labelledby="editPenelitian" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fs-5" id="editPenelitian">Edit Penelitian</h4>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url() ?>updatePenelitian/<?= $p['id_penelitian']; ?>" method="post" id="form">
                            <div class="row mb-2">
                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama-<?= $p['id_penelitian']; ?>" name="nama" value="<?= $p['nama']; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="no_identitas" class="col-sm-3 col-form-label">Nomor Identitas</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="no_identitas-<?= $p['id_penelitian']; ?>" name="no_identitas" value="<?= $p['no_identitas']; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="judul_penelitian" class="col-sm-3 col-form-label">Judul Penelitian</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="judul_penelitian-<?= $p['id_penelitian']; ?>" name="judul_penelitian" value="<?= $p['judul_penelitian']; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="jenis" class="col-sm-3 col-form-label">Jenis</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="jenis-<?= $p['id_penelitian']; ?>" name="jenis" required>
                                        <option value="">Pilih Jenis</option>
                                        <option value="umum" <?= $p['jenis'] == 'umum' ? 'selected' : ''; ?>>Umum</option>
                                        <option value="museum" <?= $p['jenis'] == 'museum' ? 'selected' : ''; ?>>Museum</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="kategori_objek" class="col-sm-3 col-form-label">Kategori Objek</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kategori_objek-<?= $p['id_penelitian']; ?>" name="kategori_objek" value="<?= $p['kategori_objek']; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="jenjang_pendidikan" class="col-sm-3 col-form-label">Jenjang Pendidikan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="jenjang_pendidikan-<?= $p['id_penelitian']; ?>" name="jenjang_pendidikan" value="<?= $p['jenjang_pendidikan']; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="program_studi" class="col-sm-3 col-form-label">Program Studi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="program_studi-<?= $p['id_penelitian']; ?>" name="program_studi" value="<?= $p['program_studi']; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="instansi" class="col-sm-3 col-form-label">Instansi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="instansi-<?= $p['id_penelitian']; ?>" name="instansi" value="<?= $p['instansi']; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="tanggal_mulai" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="tanggal_mulai-<?= $p['id_penelitian']; ?>" name="tanggal_mulai" value="<?= $p['tanggal_mulai']; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="tanggal_akhir" class="col-sm-3 col-form-label">Tanggal Akhir</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="tanggal_akhir-<?= $p['id_penelitian']; ?>" name="tanggal_akhir" value="<?= $p['tanggal_akhir']; ?>">
                                </div>
                            </div>

                            <div class="modal-footer my-4">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
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