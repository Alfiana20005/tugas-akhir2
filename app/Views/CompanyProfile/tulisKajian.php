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
                <form id="formKajianContainer" action="/saveIsiKajian" method="post" enctype="multipart/form-data">
                    <div id="formsContainer">
                        <div class="my-4 mx-4">
                            <input type="hidden"  name="id_kajian" value="<?= $kajian['id_kajian']; ?>">
                            <div class="mb-3">
                                <label for="narasi" class="form-label">Tuliskan Narasi</label>
                                <textarea class="form-control" id="narasi" rows="3" name="narasi"></textarea>
                            </div>
                            <div class="mb-3">  
                                <div class="row mb-2">
                                    <div class="col-sm-2">
                                        <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview" id="img-preview">
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control" id="gambar" name="foto" onchange="previewImg('gambar')">
                                            <label class="custom-file-label" for="customFile">Masukkan Foto Anda</label>
                                            <?php if (!empty($data_kajian['foto'])): ?>
                                                <div class="my-2">
                                                    <p>Foto Saat Ini:</p>
                                                    <img src="<?= base_url('img/kajian/' . $data_kajian['foto']); ?>" alt="Foto Kajian" width="100">
                                                </div>
                                                
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
                            <div class="form-check my-4">
                                                    <input class="form-check-input" type="checkbox" id="removeFoto" name="removeFoto" value="1">
                                                    <label class="form-check-label" for="removeFoto">
                                                    Klik apabila tidak membutuhkan gambar
                                                    </label>
                                                </div>

                                                
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm mb-2 mx-4">Simpan</button>
                    
                </form>
            </div>
        
        
    
</div>

<script>
    document.getElementById('addSection').addEventListener('click', function (e) {
        e.preventDefault();
        addFormSection();
    });

    let formCount = 1;

    function addFormSection() {
        formCount++;
        const container = document.getElementById('formsContainer');    
        const newForm = document.createElement('div');
        newForm.classList.add('card', 'mb-3');
        newForm.innerHTML = `
        <form id="formKajianContainer" action="/saveIsiKajian" method="post" enctype="multipart/form-data">
                    <div id="formsContainer">

                        <div class="my-4 mx-4">
                            <input type="hidden" name="id_kajian${formCount}" value="<?= $kajian['id_kajian']; ?>">
                            <div class="mb-3">
                                <label for="narasi${formCount}" class="form-label">Tuliskan Narasi</label>
                                <textarea class="form-control" id="narasi${formCount}" rows="3" name="narasi${formCount}"></textarea>
                            </div>
                            <div class="mb-3">  
                                <div class="row mb-2">
                                    <div class="col-sm-2">
                                        <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview" id="img-preview">
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control" id="gambar${formCount}" name="foto${formCount}" onchange="previewImg('gambar${formCount}')">
                                            <label class="custom-file-label" >Masukkan Gambar</label>
                                            <?php if (!empty($data_kajian['foto'])): ?>
                                                <div class="my-2">
                                                    <p>Foto Saat Ini:</p>
                                                    <img src="<?= base_url('img/kajian/' . $data_kajian['foto']); ?>" alt="Foto Kajian" width="100">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-check my-4">
                                                    <input class="form-check-input" type="checkbox" id="removeFoto${formCount}" name="removeFoto${formCount}" value="1">
                                                    <label class="form-check-label" for="removeFoto">
                                                        Klik apabila tidak membutuhkan gambar
                                                    </label>
                                                </div>

                                               
                        </div>
                        </div>
                    
                </form>
                        
        `;
        container.appendChild(newForm);
    }

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
</script>

<!-- <script>
    document.getElementById('addSection').addEventListener('click', function (e) {
        e.preventDefault();
        addFormSection();
    });

    let formCount = 1;

    function addFormSection() {
        formCount++;
        const container = document.getElementById('formsContainer');    
        const newForm = document.createElement('div');
        newForm.classList.add('my-4', 'mx-4');
        newForm.innerHTML = `
            <input type="hidden" name="id_kajian" value="<?= $kajian['id_kajian']; ?>">
            <div class="mb-3">
                <label for="narasi${formCount}" class="form-label">Tuliskan Narasi</label>
                <textarea class="form-control" id="narasi${formCount}" rows="3" name="narasi[]"></textarea>
            </div>
            <div class="mb-3">
                <div class="row mb-2">
                    <div class="col-sm-2">
                        <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview" id="img-preview-${formCount}">
                    </div>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="gambar-${formCount}" name="foto[]" onchange="previewImg(this, 'img-preview-${formCount}')">
                            <label class="custom-file-label" for="gambar-${formCount}">Masukkan Gambar</label>
                        </div>
                    </div>
                </div>
            </div>
        `;
        container.appendChild(newForm);
    }

    function previewImg(input, imgPreviewId) {
        const file = input.files[0];
        const imgPreview = document.getElementById(imgPreviewId);

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
</script> -->

<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
  });
</script>

<?= $this->endSection(); ?>
