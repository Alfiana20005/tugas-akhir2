<?= $this->extend('template/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <?php if (session()->get('level') == 'Admin'): ?>
        <div class="d-flex">
            <a class="btn btn-primary btn-sm mb-2" href="#" id="addSection" role="button">Tambahkan Bagian</a>
            <a class="btn btn-warning btn-sm mb-2 mx-2" href="<?= base_url("/previewKajian/{$kajian['id_kajian']}"); ?>"  role="button">Preview</a>
        </div>
        
        <?php if (session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    
    <div class="card mb-3">
        <div class="row">
            <div class="col-md-2" style="width: 150px;">
                <img src="<?= base_url("img/kajian/" . $kajian['sampul']); ?>" class="img-fluid rounded-start mx-4 mt-4" style="width: 250px;" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <a href="/kajianAdmin"><h5 class="card-title"><?= $kajian['judul']; ?></h5></a>
                    <p class="card-text"><?= $kajian['kategori']; ?></p>
                    <p class="card-text"><small class="text-body-secondary">Last updated <?= $kajian['updated_at']; ?></small></p>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ NARASI YANG SUDAH ADA (EDIT MODE) ============ -->
    <?php if (!empty($data_kajian)): ?>
        <?php foreach ($data_kajian as $index => $dk): ?>
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Bagian <?= $index + 1; ?></h6>
                    <form action="/deleteIsiKajian/<?= $dk['id_dataKajian']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus bagian narasi ini?');">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
                <div class="card-body">
                    <form action="/updateIsiKajian/<?= $dk['id_dataKajian']; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_kajian" value="<?= $kajian['id_kajian']; ?>">
                        <div class="mb-3">
                            <label for="narasi-edit-<?= $dk['id_dataKajian']; ?>" class="form-label">Narasi</label>
                            <textarea class="form-control tinymce-editor" id="narasi-edit-<?= $dk['id_dataKajian']; ?>" rows="3" name="narasi"><?= $dk['narasi']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="row mb-2">
                                <div class="col-sm-2">
                                    <?php if (!empty($dk['foto'])): ?>
                                        <img src="<?= base_url('img/kajian/' . $dk['foto']); ?>" alt="Foto Narasi" class="img-thumbnail" id="img-preview-edit-<?= $dk['id_dataKajian']; ?>">
                                    <?php else: ?>
                                        <img src="/img/default.jpg" alt="" class="img-thumbnail" id="img-preview-edit-<?= $dk['id_dataKajian']; ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control" id="gambar-edit-<?= $dk['id_dataKajian']; ?>" name="foto" onchange="previewImg('gambar-edit-<?= $dk['id_dataKajian']; ?>', 'img-preview-edit-<?= $dk['id_dataKajian']; ?>')">
                                        <label class="custom-file-label">Ganti Foto (opsional)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="removeFoto-edit-<?= $dk['id_dataKajian']; ?>" name="removeFoto" value="1">
                            <label class="form-check-label" for="removeFoto-edit-<?= $dk['id_dataKajian']; ?>">
                                Klik apabila tidak membutuhkan gambar
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fas fa-save"></i> Update Narasi
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- ============ FORM TAMBAH NARASI BARU ============ -->
    <div class="card mb-3" id="formTambahNarasi">
        <div class="card-header">
            <h6 class="mb-0">Tambah Narasi Baru</h6>
        </div>
        <div class="card-body">
            <form id="formKajianContainer" action="/saveIsiKajian" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_kajian" value="<?= $kajian['id_kajian']; ?>">
                <div class="mb-3">
                    <label for="narasi" class="form-label">Tuliskan Narasi</label>
                    <textarea class="form-control tinymce-editor" id="narasi" rows="3" name="narasi"></textarea>
                </div>
                <div class="mb-3">
                    <div class="row mb-2">
                        <div class="col-sm-2">
                            <img src="/img/default.jpg" alt="" class="img-thumbnail" id="img-preview-new">
                        </div>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control" id="gambar-new" name="foto" onchange="previewImg('gambar-new', 'img-preview-new')">
                                <label class="custom-file-label" for="gambar-new">Masukkan Foto Anda</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="removeFoto" name="removeFoto" value="1">
                    <label class="form-check-label" for="removeFoto">
                        Klik apabila tidak membutuhkan gambar
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Simpan Narasi Baru
                </button>
            </form>
        </div>
    </div>

</div>

<script>
    function previewImg(inputId, imgId) {
        const input = document.getElementById(inputId);
        const imgPreview = document.getElementById(imgId);
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }

    document.getElementById('addSection').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('formTambahNarasi').scrollIntoView({ behavior: 'smooth' });
    });
</script>

<script>
    tinymce.init({
        selector: '.tinymce-editor',
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
