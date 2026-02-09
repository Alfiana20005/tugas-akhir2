<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Data Petugas Terdaftar</h1> -->

    <!-- <button class="btn btn-primary mb-3">Tambah data</button> -->
    <?php if (session()->get('level') == 'Admin'): ?>
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahKegiatan" data-bs-whatever="@getbootstrap">Tambah Koleksi</button>
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
                    <h4 class="modal-title fs-5" id="tambahKegiatan">Tambahkan Koleksi</h4>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <form action="/saveKoleksi" method="post" enctype="multipart/form-data" id="form">
                        <div class="row mb-2">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="recipient-name" name="nama">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for=" nama" class="col-sm-3 col-form-label">No Koleksi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="recipient-name" name="no">
                            </div>
                        </div>
                        <!-- <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="recipient-name" name="tanggal">
                    </div>
                </div> -->
                        <div class="row mb-2">
                            <label for="email" class="col-sm-3 col-form-label">kategori</label>
                            <div class="col-sm-9">
                                <select class="form-select form-control" type="text" name="kategori" value="<?= old('kategori'); ?>">
                                    <!-- harus sesuai dengan urutan enum pada database -->
                                    <option selected>Pilih Kategori</option>
                                    <option <?= old("kategori") == 'Geologika' ? 'selected' : 'Geologika' ?> value="Geologika">Geologika</option>
                                    <option <?= old("kategori") == 'Biologika' ? 'selected' : 'Biologika' ?> value="Biologika">Biologika</option>
                                    <option <?= old("kategori") == 'Etnografika' ? 'selected' : 'Etnografika' ?> value="Etnografika">Etnografika</option>
                                    <option <?= old("kategori") == 'Arkeologika' ? 'selected' : 'Arkeologika' ?> value="Arkeologika">Arkeologika</option>
                                    <option <?= old("kategori") == 'Historika' ? 'selected' : 'Historika' ?> value="Historika">Historika</option>
                                    <option <?= old("kategori") == 'Numismatika' ? 'selected' : 'Numismatika' ?> value="Numismatika">Numismatika</option>
                                    <option <?= old("kategori") == 'Filologika' ? 'selected' : 'Filologika' ?> value="Filologika">Filologika</option>
                                    <option <?= old("kategori") == 'Keramologika' ? 'selected' : 'Keramologika' ?> value="Keramologika">Keramologika</option>
                                    <option <?= old("kategori") == 'Seni Rupa' ? 'selected' : 'Seni Rupa' ?> value="Seni Rupa">Seni Rupa</option>
                                    <option <?= old("kategori") == 'Teknologika' ? 'selected' : 'Teknologika' ?> value="Teknologika">Teknologika</option>

                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="email" class="col-sm-3 col-form-label">Ukuran</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="recipient-name" name="ukuran">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="message-text" class="col-sm-3 col-form-label">Deskripsi:</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="message-text" name="deskripsi"></textarea>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="foto" class="col-sm-3 col-form-label">Gambar</label>
                            <div class="col-sm-2">
                                <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-7">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="gambar" name="foto" onchange="previewImg('gambar')">
                                    <label class="custom-file-label" for="customFile">Gambar Maksimal 2 Mb</label>
                                    <?php if (!empty($koleksi['foto'])): ?>
                                        <div class="my-2">
                                            <p>Foto Saat Ini:</p>
                                            <img src="<?= base_url('img/publikasi/' . $koleksi['foto']); ?>" alt="Foto Petugas" width="100">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Gambar Tambahan untuk Deskripsi -->
                        <div class="row mb-2">
                            <label for="gambar_deskripsi" class="col-sm-3 col-form-label">Gambar Deskripsi</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="gambar_deskripsi[]" multiple accept="image/*">
                                <small class="form-text text-muted">Pilih beberapa gambar (Max 2MB per gambar)</small>
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
            <h6 class="m-0 font-weight-bold text-primary">Data Koleksi </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Gambar</th>
                            <th style="text-align: center;">Nama</th>
                            <th style="text-align: center;">No Koleksi</th>
                            <th style="text-align: center;">Kategori</th>
                            <th style="text-align: center;">Ukuran</th>
                            <th style="text-align: center;">Deskripsi</th>

                            <th style="text-align: center;">Aksi</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($koleksi as $k): ?>
                            <tr>
                                <!-- <td style="text-align: center;">1</td> -->
                                <!-- <td style="text-align: center;"><img src="" alt="" style="width: 60px;"></td> -->
                                <td style="text-align: center;"><?= $no++; ?></td>
                                <td style="text-align: center;"><img src="<?= base_url("img/koleksiAdmin/" . $k['foto']); ?>" alt="" style="width: 60px;"></td>

                                <td style="text-align: center;"><?= $k['nama']; ?></td>
                                <td style="text-align: center;"><?= $k['no']; ?></td>
                                <td style="text-align: center;"><?= $k['kategori']; ?></td>
                                <td style="text-align: center;"><?= $k['ukuran']; ?></td>
                                <td style="text-align: center;"><?= $k['deskripsi']; ?></td>

                                <td style="text-align: center;">

                                    <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editKoleksi<?= $k['id_koleksi']; ?>" data-bs-whatever="@getbootstrap">Edit</a>
                                    <!-- <a href="" class="btn btn-danger" >hapus</a> -->
                                    <form action="/hapusKoleksiAdmin/<?= $k['id_koleksi']; ?>" method="post" class="d-inline">
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
    foreach ($koleksi as $k): ?>
        <div class="modal fade" id="editKoleksi<?= $k['id_koleksi']; ?>" tabindex="-1" aria-labelledby="editKoleksi" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fs-5" id="editKoleksi">Edit Koleksi</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url() ?>updateKoleksiAdmin/<?= $k['id_koleksi']; ?>" method="post" enctype="multipart/form-data" id="form-<?= $k['id_koleksi']; ?>">
                            <div class="row mb-2">
                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" value="<?= $k['nama']; ?>">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="nama" class="col-sm-3 col-form-label">No Koleksi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="no" value="<?= $k['no']; ?>">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                                <div class="col-sm-9">
                                    <select class="form-select form-control" name="kategori">
                                        <option>Pilih Kategori</option>
                                        <option <?= $k['kategori'] == 'Geologika' ? 'selected' : '' ?> value="Geologika">Geologika</option>
                                        <option <?= $k['kategori'] == 'Biologika' ? 'selected' : '' ?> value="Biologika">Biologika</option>
                                        <option <?= $k['kategori'] == 'Etnografika' ? 'selected' : '' ?> value="Etnografika">Etnografika</option>
                                        <option <?= $k['kategori'] == 'Arkeologika' ? 'selected' : '' ?> value="Arkeologika">Arkeologika</option>
                                        <option <?= $k['kategori'] == 'Historika' ? 'selected' : '' ?> value="Historika">Historika</option>
                                        <option <?= $k['kategori'] == 'Numismatika' ? 'selected' : '' ?> value="Numismatika">Numismatika</option>
                                        <option <?= $k['kategori'] == 'Filologika' ? 'selected' : '' ?> value="Filologika">Filologika</option>
                                        <option <?= $k['kategori'] == 'Keramologika' ? 'selected' : '' ?> value="Keramologika">Keramologika</option>
                                        <option <?= $k['kategori'] == 'Seni Rupa' ? 'selected' : '' ?> value="Seni Rupa">Seni Rupa</option>
                                        <option <?= $k['kategori'] == 'Teknologika' ? 'selected' : '' ?> value="Teknologika">Teknologika</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="ukuran" class="col-sm-3 col-form-label">Ukuran</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="ukuran" value="<?= $k['ukuran']; ?>">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="deskripsi" rows="4"><?= $k['deskripsi']; ?></textarea>
                                </div>
                            </div>

                            <!-- Gambar Utama -->
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label">Gambar Utama</label>
                                <div class="col-sm-2">
                                    <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview" id="img-preview-<?= $k['id_koleksi']; ?>">
                                </div>
                                <div class="col-sm-7">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control" id="gambar<?= $k['id_koleksi']; ?>" name="foto" onchange="previewImg('gambar<?= $k['id_koleksi']; ?>')">
                                        <label class="custom-file-label" for="customFile">Gambar Maksimal 2 Mb</label>
                                    </div>
                                    <?php if (!empty($k['foto'])): ?>
                                        <div class="my-2">
                                            <p class="mb-1"><small>Foto Saat Ini:</small></p>
                                            <img src="<?= base_url('img/koleksiAdmin/' . $k['foto']); ?>" alt="Foto Utama" width="100" class="img-thumbnail">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Gambar Deskripsi yang Sudah Ada -->
                            <?php
                            $gambar_existing = !empty($k['gambar_deskripsi']) ? json_decode($k['gambar_deskripsi'], true) : [];
                            if (!empty($gambar_existing) && is_array($gambar_existing)): ?>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Gambar Deskripsi Saat Ini</label>
                                    <div class="col-sm-9">
                                        <div id="existing-images-<?= $k['id_koleksi']; ?>" class="d-flex flex-wrap gap-2">
                                            <?php foreach ($gambar_existing as $index => $img): ?>
                                                <div class="position-relative image-item" data-image="<?= $img; ?>" style="width: 150px;">
                                                    <img src="<?= base_url('img/koleksiDeskripsi/' . $img); ?>" class="img-thumbnail" style="width: 100%; height: 150px; object-fit: cover;">
                                                    <span class="badge bg-primary position-absolute" style="top: 5px; left: 5px;"><?= $index + 1; ?></span>

                                                    <div class="btn-group-vertical position-absolute" style="top: 5px; right: 5px;">
                                                        <?php if ($index > 0): ?>
                                                            <button type="button" class="btn btn-sm btn-info" onclick="moveImage(<?= $k['id_koleksi']; ?>, <?= $index; ?>, 'up')" title="Pindah ke atas">
                                                                <i class="fas fa-arrow-up"></i>
                                                            </button>
                                                        <?php endif; ?>

                                                        <?php if ($index < count($gambar_existing) - 1): ?>
                                                            <button type="button" class="btn btn-sm btn-info" onclick="moveImage(<?= $k['id_koleksi']; ?>, <?= $index; ?>, 'down')" title="Pindah ke bawah">
                                                                <i class="fas fa-arrow-down"></i>
                                                            </button>
                                                        <?php endif; ?>

                                                        <button type="button" class="btn btn-danger btn-sm" onclick="hapusGambarDeskripsi(<?= $k['id_koleksi']; ?>, '<?= $img; ?>')" title="Hapus gambar">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>

                                        <!-- Hidden input untuk menyimpan urutan baru -->
                                        <input type="hidden" name="urutan_gambar" id="urutan-gambar-<?= $k['id_koleksi']; ?>" value="">
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Upload Gambar Deskripsi Baru -->
                            <div class="row mb-2">
                                <label for="gambar_deskripsi" class="col-sm-3 col-form-label">Tambah Gambar Deskripsi</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="gambar_deskripsi[]" multiple accept="image/*" onchange="validateFileCount<?= $k['id_koleksi']; ?>(this)">
                                    <small class="form-text text-muted">Tambah gambar baru (Maksimal total 2 gambar, masing-masing max 2MB)</small>
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

        <script>
            // Validasi jumlah file untuk koleksi ID: <?= $k['id_koleksi']; ?>
            function validateFileCount<?= $k['id_koleksi']; ?>(input) {
                const existingCount = <?= count($gambar_existing); ?>;
                const newCount = input.files.length;
                const totalCount = existingCount + newCount;

                if (totalCount > 2) {
                    alert('Maksimal total 2 gambar! Saat ini sudah ada ' + existingCount + ' gambar. Anda hanya bisa menambah ' + (2 - existingCount) + ' gambar lagi.');
                    input.value = '';
                }
            }
        </script>
    <?php endforeach; ?>

    <script>
        // Fungsi untuk memindahkan posisi gambar
        function moveImage(koleksiId, index, direction) {
            const container = document.getElementById('existing-images-' + koleksiId);
            const items = Array.from(container.querySelectorAll('.image-item'));

            if (direction === 'up' && index > 0) {
                container.insertBefore(items[index], items[index - 1]);
            } else if (direction === 'down' && index < items.length - 1) {
                container.insertBefore(items[index + 1], items[index]);
            }

            updateImageOrder(koleksiId);
        }

        // Update urutan gambar dan badge number
        function updateImageOrder(koleksiId) {
            const container = document.getElementById('existing-images-' + koleksiId);
            const items = container.querySelectorAll('.image-item');
            const order = [];

            items.forEach((item, index) => {
                // Update badge number
                item.querySelector('.badge').textContent = index + 1;

                // Update button visibility
                const btnUp = item.querySelector('.btn-info:first-child');
                const btnDown = item.querySelector('.btn-info:last-child');

                // Hide/show up button
                if (btnUp) {
                    btnUp.style.display = index > 0 ? 'block' : 'none';
                }

                // Hide/show down button  
                if (btnDown) {
                    btnDown.style.display = index < items.length - 1 ? 'block' : 'none';
                }

                // Get image filename
                const imageName = item.getAttribute('data-image');
                order.push(imageName);
            });

            // Save order to hidden input
            document.getElementById('urutan-gambar-' + koleksiId).value = JSON.stringify(order);
        }

        // Fungsi untuk hapus gambar deskripsi
        function hapusGambarDeskripsi(koleksiId, imageName) {
            if (confirm('Yakin ingin menghapus gambar ini?')) {
                fetch('<?= base_url(); ?>hapusGambarDeskripsiByName', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify({
                            id_koleksi: koleksiId,
                            image_name: imageName
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        } else {
                            alert('Gagal menghapus gambar: ' + (data.message || 'Unknown error'));
                        }
                    })
                    .catch(error => {
                        alert('Error: ' + error);
                    });
            }
        }
    </script>

    <style>
        .image-item {
            transition: all 0.3s ease;
        }

        .image-item:hover {
            transform: scale(1.02);
        }

        .btn-group-vertical .btn {
            padding: 2px 6px;
            font-size: 12px;
        }
    </style>
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