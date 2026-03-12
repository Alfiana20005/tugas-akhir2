<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="d-flex align-items-center mb-3">
        <a href="/kajianAdmin" class="btn btn-secondary btn-sm me-2"><i class="fas fa-arrow-left"></i> Kembali</a>
        <h4 class="mb-0">Tambahkan Kajian Baru</h4>
    </div>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('errors'); ?>
        </div>
    <?php endif; ?>

    <form action="/saveKajian" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">Informasi Kajian</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= old('judul'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" name="penulis" value="<?= old('penulis'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-select form-control" name="kategori">
                            <option selected>Pilih </option>
                            <option <?= old("kategori") == 'Opini' ? 'selected' : '' ?> value="Opini">Opini</option>
                            <option <?= old("kategori") == 'Artikel' ? 'selected' : '' ?> value="Artikel">Artikel</option>
                            <option <?= old("kategori") == 'Kajian Koleksi' ? 'selected' : '' ?> value="Kajian Koleksi">Kajian Koleksi</option>
                            <option <?= old("kategori") == 'Kajian Budaya' ? 'selected' : '' ?> value="Kajian Budaya">Kajian Budaya</option>
                            <option <?= old("kategori") == 'Permuseuman' ? 'selected' : '' ?> value="Permuseuman">Permuseuman</option>
                            <option <?= old("kategori") == 'Resensi Buku' ? 'selected' : '' ?> value="Resensi Buku">Resensi Buku</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview" id="img-preview-sampul">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="gambar-sampul" name="sampul" onchange="previewImgSampul()">
                            <label class="custom-file-label" for="gambar-sampul">Gambar Maksimal 2 Mb</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">Isi Narasi</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="narasi" class="form-label">Tuliskan Narasi</label>
                    <textarea class="form-control" id="narasi" rows="3" name="narasi"><?= old('narasi'); ?></textarea>
                </div>
                <div class="mb-3">
                    <div class="row mb-2">
                        <div class="col-sm-2">
                            <img src="/img/default.jpg" alt="" class="img-thumbnail" id="img-preview-narasi">
                        </div>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control" id="gambar-narasi" name="foto" onchange="previewImgNarasi()">
                                <label class="custom-file-label" for="gambar-narasi">Masukkan Foto Anda</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-check my-3">
                    <input class="form-check-input" type="checkbox" id="removeFoto" name="removeFoto" value="1">
                    <label class="form-check-label" for="removeFoto">
                        Klik apabila tidak membutuhkan gambar
                    </label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-4">Simpan Kajian</button>
    </form>
</div>

<script>
    function previewImgSampul() {
        const input = document.getElementById('gambar-sampul');
        const imgPreview = document.getElementById('img-preview-sampul');
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }

    function previewImgNarasi() {
        const input = document.getElementById('gambar-narasi');
        const imgPreview = document.getElementById('img-preview-narasi');
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
</script>

<script>
    tinymce.init({
        selector: '#narasi',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    });
</script>

<?= $this->endSection(); ?>