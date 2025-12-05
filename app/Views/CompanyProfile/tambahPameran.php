<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pameran</h6>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/savePameran'); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= old('judul'); ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= old('keterangan'); ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="kode_koleksi" class="col-sm-2 col-form-label">Kode Koleksi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode_koleksi" name="kode_koleksi" value="<?= old('kode_koleksi'); ?>">
                        <small class="form-text text-muted">Contoh: KL-001, PM-2024-01</small>
                    </div>
                </div>

                <!-- FIELD BARU: Jenis -->
                <div class="row mb-3">
                    <label for="jenis_option" class="col-sm-2 col-form-label">Jenis</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <select class="form-control" id="jenis_option" name="jenis_option" onchange="toggleJenisInput()">
                                <option value="">-- Pilih atau Buat Baru --</option>
                                <?php if (isset($existingJenis)): ?>
                                    <?php foreach ($existingJenis as $j): ?>
                                        <option value="<?= esc($j) ?>"><?= esc($j) ?></option>
                                    <?php endforeach ?>
                                <?php endif; ?>
                                <option value="__new__">+ Tambah Jenis Baru</option>
                            </select>
                        </div>

                        <!-- Input untuk nilai baru (hidden by default) -->
                        <div id="jenis_new_wrapper" style="display: none;" class="mt-2">
                            <input type="text" class="form-control" id="jenis_new" name="jenis_new" placeholder="Masukkan jenis baru">
                            <small class="form-text text-muted">Masukkan nama jenis baru</small>
                        </div>

                        <!-- Hidden input untuk nilai yang dipilih/diisi -->
                        <input type="hidden" id="jenis" name="jenis" value="<?= old('jenis'); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="asal_dibuat" class="col-sm-2 col-form-label">Asal Dibuat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="asal_dibuat" name="asal_dibuat" value="<?= old('asal_dibuat'); ?>">
                        <small class="form-text text-muted">Tempat/lokasi asal pembuatan</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="asal_perolehan" class="col-sm-2 col-form-label">Asal Perolehan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="asal_perolehan" name="asal_perolehan" value="<?= old('asal_perolehan'); ?>">
                        <small class="form-text text-muted">Sumber perolehan koleksi</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="periode" class="col-sm-2 col-form-label">Periode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="periode" name="periode" value="<?= old('periode'); ?>">
                        <small class="form-text text-muted">Contoh: 1945-1950, Abad ke-19</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" name="description" rows="5"><?= old('description'); ?></textarea>
                        <small class="form-text text-muted">Deskripsi lengkap tentang koleksi pameran</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Highlight</label>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="enableHighlight" onchange="toggleHighlight()">
                            <label class="form-check-label" for="enableHighlight">
                                Tambahkan informasi highlight
                            </label>
                        </div>

                        <!-- Input highlight (hidden by default) -->
                        <div id="highlightWrapper" style="display: none; margin-top: 10px;">
                            <textarea class="form-control" id="highlight" name="highlight" rows="2" placeholder="Contoh: Koleksi ini pernah di pamerkan pada Pameran Temporer di Mataram tahun 2022"><?= old('highlight'); ?></textarea>
                            <small class="form-text text-muted">Info tambahan yang akan ditampilkan dalam box merah</small>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="<?= base_url('/img/default.jpg'); ?>" alt="" class="img-thumbnail img-preview" id="imgPreview">
                    </div>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="image" name="image" onchange="previewImage()">
                        <small class="form-text text-muted">Format: JPG, JPEG, PNG, GIF | Maksimal 2 MB</small>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                        <a href="<?= base_url('pameran'); ?>" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleHighlight() {
        const checkbox = document.getElementById('enableHighlight');
        const wrapper = document.getElementById('highlightWrapper');
        const textarea = document.getElementById('highlight');

        if (checkbox.checked) {
            wrapper.style.display = 'block';
            textarea.focus();
        } else {
            wrapper.style.display = 'none';
            textarea.value = ''; // Clear value jika di-uncheck
        }
    }

    function toggleJenisInput() {
        const option = document.getElementById('jenis_option').value;
        const newWrapper = document.getElementById('jenis_new_wrapper');
        const jenisInput = document.getElementById('jenis');
        const jenisNewInput = document.getElementById('jenis_new');

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

    // Handle form submission
    document.querySelector('form').addEventListener('submit', function(e) {
        const option = document.getElementById('jenis_option').value;
        const jenisNewInput = document.getElementById('jenis_new').value.trim();
        const jenisInput = document.getElementById('jenis');

        if (option === '__new__' && jenisNewInput !== '') {
            jenisInput.value = jenisNewInput;
        } else if (option === '__new__' && jenisNewInput === '') {
            e.preventDefault();
            alert('Silakan isi jenis baru terlebih dahulu');
            document.getElementById('jenis_new').focus();
        }
    });

    function previewImage() {
        const input = document.getElementById('image');
        const preview = document.getElementById('imgPreview');

        const file = input.files[0];
        const reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "<?= base_url('/img/default.jpg'); ?>";
        }
    }

    // Inisialisasi saat halaman load
    document.addEventListener('DOMContentLoaded', function() {
        const oldValue = "<?= old('jenis'); ?>";
        if (oldValue) {
            document.getElementById('jenis_option').value = oldValue;
            document.getElementById('jenis').value = oldValue;
        }

        // Check jika ada old highlight value
        const oldHighlight = "<?= old('highlight'); ?>";
        if (oldHighlight) {
            document.getElementById('enableHighlight').checked = true;
            toggleHighlight();
        }
    });
</script>

<?= $this->endSection(); ?>