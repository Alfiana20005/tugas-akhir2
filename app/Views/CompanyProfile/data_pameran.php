<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <?php if (session()->get('level') == 'Admin'): ?>
        <a class="btn btn-primary mb-3" href="/tambahPameran" role="button">Tambah Pameran</a>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pameran</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Foto</th>
                            <th style="text-align: center;">Judul</th>
                            <th style="text-align: center;">Keterangan</th>
                            <th style="text-align: center;">Kode Koleksi</th>
                            <th style="text-align: center;">Jenis</th>
                            <th style="text-align: center;">Asal Dibuat</th>
                            <th style="text-align: center;">Asal Perolehan</th>
                            <th style="text-align: center;">Periode</th>
                            <th style="text-align: center;">Pengadaan</th>
                            <th style="text-align: center;">Highlight</th>
                            <th style="text-align: center;">Deskripsi</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pameran as $p): ?>
                            <tr>
                                <td style="text-align: center;"><?= $no++; ?></td>
                                <td style="text-align: center;">
                                    <?php if (!empty($p['image'])): ?>
                                        <img src="<?= base_url("img/pameran/" . $p['image']); ?>" alt="" style="width: 60px;">
                                    <?php else: ?>
                                        <img src="<?= base_url("img/default.jpg"); ?>" alt="" style="width: 60px;">
                                    <?php endif; ?>
                                </td>
                                <td style="text-align: center;"><?= $p['judul']; ?></td>
                                <td style="text-align: center; width: 300px; max-width: 300px;">
                                    <?= strlen($p['keterangan']) > 50 ? substr($p['keterangan'], 0, 50) . '...' : $p['keterangan']; ?>
                                </td>
                                <td style="text-align: center;"><?= $p['kode_koleksi']; ?></td>
                                <td style="text-align: center;"><?= $p['jenis']; ?></td>
                                <td style="text-align: center;"><?= $p['asal_dibuat']; ?></td>
                                <td style="text-align: center;"><?= $p['asal_perolehan']; ?></td>
                                <td style="text-align: center;"><?= $p['periode']; ?></td>
                                <td style="text-align: center;"><?= $p['pengadaan']; ?></td>
                                <td style="text-align: center;"><?= $p['highlight']; ?></td>
                                <td style="text-align: center; width: 300px; max-width: 300px;">
                                    <?= strlen($p['description']) > 50 ? substr($p['description'], 0, 50) . '...' : $p['description']; ?>
                                </td>
                                <td style="text-align: center;">
                                    <a href="" class="btn btn-success btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#editPameran<?= $p['id_pameran']; ?>" data-bs-whatever="@getbootstrap">Edit</a>
                                    <form action="/hapusPameran/<?= $p['id_pameran']; ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Hapus</button>
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
    foreach ($pameran as $p): ?>
        <div class="modal fade" id="editPameran<?= $p['id_pameran']; ?>" tabindex="-1" aria-labelledby="editPameran" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fs-5" id="editPameran">Edit Pameran</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url() ?>/updatePameran/<?= $p['id_pameran']; ?>" method="post" enctype="multipart/form-data" id="form">
                            <?= csrf_field(); ?>

                            <div class="row mb-2">
                                <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="judul" value="<?= $p['judul']; ?>" required>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="keterangan" rows="3"><?= $p['keterangan']; ?></textarea>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="kode_koleksi" class="col-sm-3 col-form-label">Kode Koleksi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="kode_koleksi" value="<?= $p['kode_koleksi']; ?>">
                                </div>
                            </div>

                            <!-- FIELD JENIS -->
                            <div class="row mb-2">
                                <label for="jenis_<?= $p['id_pameran']; ?>" class="col-sm-3 col-form-label">Jenis</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select class="form-control" id="jenis_option_<?= $p['id_pameran']; ?>" onchange="toggleJenisInputEdit(<?= $p['id_pameran']; ?>)">
                                            <option value="">-- Pilih atau Buat Baru --</option>
                                            <?php if (isset($existingJenis)): ?>
                                                <?php foreach ($existingJenis as $j): ?>
                                                    <option value="<?= esc($j) ?>" <?= ($j == $p['jenis']) ? 'selected' : '' ?>><?= esc($j) ?></option>
                                                <?php endforeach ?>
                                            <?php endif; ?>
                                            <option value="__new__">+ Tambah Jenis Baru</option>
                                        </select>
                                    </div>

                                    <!-- Input untuk nilai baru (hidden by default) -->
                                    <div id="jenis_new_wrapper_<?= $p['id_pameran']; ?>" style="display: none;" class="mt-2">
                                        <input type="text" class="form-control" id="jenis_new_<?= $p['id_pameran']; ?>" placeholder="Masukkan jenis baru">
                                        <small class="form-text text-muted">Masukkan nama jenis baru</small>
                                    </div>

                                    <!-- LANGSUNG GUNAKAN NAMA "jenis" TANPA HIDDEN INPUT -->
                                    <input type="hidden" name="jenis" id="jenis_hidden_<?= $p['id_pameran']; ?>" value="<?= esc($p['jenis']); ?>">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="asal_dibuat" class="col-sm-3 col-form-label">Asal Dibuat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="asal_dibuat" value="<?= $p['asal_dibuat']; ?>">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="asal_perolehan" class="col-sm-3 col-form-label">Asal Perolehan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="asal_perolehan" value="<?= $p['asal_perolehan']; ?>">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="periode" class="col-sm-3 col-form-label">Periode</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="periode" value="<?= $p['periode']; ?>">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="pengadaan" class="col-sm-3 col-form-label">Pengadaan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="pengadaan" value="<?= $p['pengadaan']; ?>">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="description" class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="description" rows="4"><?= $p['description']; ?></textarea>
                                </div>
                            </div>

                            <!-- FIELD HIGHLIGHT DENGAN CHECKBOX -->
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">Highlight</label>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="enableHighlight_<?= $p['id_pameran']; ?>"
                                            onchange="toggleHighlightEdit(<?= $p['id_pameran']; ?>)"
                                            <?= !empty($p['highlight']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="enableHighlight_<?= $p['id_pameran']; ?>">
                                            Tambahkan informasi highlight
                                        </label>
                                    </div>

                                    <!-- Input highlight -->
                                    <div id="highlightWrapper_<?= $p['id_pameran']; ?>"
                                        style="<?= !empty($p['highlight']) ? 'display: block;' : 'display: none;'; ?> margin-top: 10px;">
                                        <textarea class="form-control" id="highlight_<?= $p['id_pameran']; ?>" name="highlight" rows="2"
                                            placeholder="Contoh: Koleksi ini pernah di pamerkan pada Pameran Temporer di Mataram tahun 2022"><?= $p['highlight'] ?? ''; ?></textarea>
                                        <small class="text-muted">Info tambahan dalam box merah</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="image" class="col-sm-3 col-form-label">Gambar</label>
                                <div class="col-sm-2">
                                    <img src="<?= !empty($p['image']) ? base_url('img/pameran/' . $p['image']) : base_url('img/default.jpg'); ?>" alt="" class="img-thumbnail img-preview" id="preview<?= $p['id_pameran']; ?>">
                                </div>
                                <div class="col-sm-7">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control" id="gambar<?= $p['id_pameran']; ?>" name="image" onchange="previewImg('gambar<?= $p['id_pameran']; ?>', 'preview<?= $p['id_pameran']; ?>')">
                                        <label class="custom-file-label" for="customFile">Gambar Maksimal 2 Mb</label>
                                    </div>
                                    <?php if (!empty($p['image'])): ?>
                                        <div class="my-4">
                                            <p>Foto Saat Ini:</p>
                                            <img src="<?= base_url('img/pameran/' . $p['image']); ?>" alt="Foto Pameran" width="100">
                                        </div>
                                    <?php endif; ?>
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

<script>
    function previewImg(inputId, previewId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);

        const file = input.files[0];
        const reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "<?= base_url('img/default.jpg'); ?>";
        }
    }

    // TAMBAHKAN FUNGSI INI
    function toggleHighlightEdit(id) {
        const checkbox = document.getElementById('enableHighlight_' + id);
        const wrapper = document.getElementById('highlightWrapper_' + id);
        const textarea = document.getElementById('highlight_' + id);

        if (checkbox.checked) {
            wrapper.style.display = 'block';
            textarea.focus();
        } else {
            wrapper.style.display = 'none';
            textarea.value = ''; // Clear value jika di-uncheck
        }
    }

    function toggleJenisInputEdit(id) {
        const option = document.getElementById('jenis_option_' + id).value;
        const newWrapper = document.getElementById('jenis_new_wrapper_' + id);
        const jenisInput = document.getElementById('jenis_' + id);
        const jenisNewInput = document.getElementById('jenis_new_' + id);

        if (option === '__new__') {
            newWrapper.style.display = 'block';
            jenisNewInput.focus();
            jenisInput.value = '';
        } else if (option !== '') {
            newWrapper.style.display = 'none';
            jenisInput.value = option;
            jenisNewInput.value = '';
        } else {
            newWrapper.style.display = 'none';
            jenisInput.value = '';
            jenisNewInput.value = '';
        }
    }

    // Inisialisasi nilai jenis saat modal dibuka
    document.addEventListener('DOMContentLoaded', function() {
        // ... kode yang sudah ada untuk jenis ...

        // Handle form submission untuk setiap modal
        const forms = document.querySelectorAll('form[id^="formEdit"]');
        forms.forEach(function(form) {
            form.addEventListener('submit', function(e) {
                const action = form.getAttribute('action');
                const id = action.split('/').pop();

                const option = document.getElementById('jenis_select_' + id).value;
                const newInput = document.getElementById('new_jenis_input_' + id);

                if (option === '__new__') {
                    const newValue = newInput.value.trim();
                    if (newValue === '') {
                        e.preventDefault();
                        alert('Silakan isi jenis baru terlebih dahulu!');
                        newInput.focus();
                        return false;
                    }
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'jenis';
                    hiddenInput.value = newValue;
                    this.appendChild(hiddenInput);

                    document.getElementById('jenis_select_' + id).disabled = true;
                }
            });
        });
    });
</script>

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