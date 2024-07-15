<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Museum - NTB</title>

    <link rel="icon" href="img/logomuseum2.png">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url();?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?= base_url();?>/vendor/datatables/datatables.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= base_url();?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url();?>/css/myStyle.css" rel="stylesheet">
    <link href="<?= base_url();?>/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="<?= base_url();?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    

    <!-- Memuat Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Memuat file statistik.js -->
    <script src="path/to/statistik.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Memuat jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Memuat DataTables -->
    <!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css"></script>
    

    <script src="https://cdn.tiny.cloud/1/gtj01mmywsyppz5gtyrpv6yzaw511bybybikku5m2o97dzl1/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->include('template/sidebar'); ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('template/topbar'); ?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?= $this->renderSection('content'); ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Museum Negeri Nusa Tenggara Barat <?= date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" >Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Cetak Perawatan Modal-->
    <div class="modal fade" id="modalCetak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cetak Laporan Perawatan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/cetak'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row mb-3">
                            <label for="jenis" class="col-sm-3 col-form-label">Jenis Perawatan</label>
                            <div class="col-sm-9">
                                <select class="form-select form-control" type="text" name="jenisprw" >
                                    <!-- harus sesuai dengan urutan enum pada database -->
                                    <option selected>Pilih Jenis Perawatan</option>
                                    <option  value="01">Preventif</option>
                                    <option  value="02">Kuratif</option>
                                    <option  value="03">Restorasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Mulai Dari</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" placeholder="mulai" aria-label="tahun" name="mulaiDari">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Hingga</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" placeholder="berakhir" aria-label="tahun" name="hingga">
                            </div>
                        </div>                
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" >Cancel</button>
                    <a class="btn btn-primary" href="" type="submit" >Cetak</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url();?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url();?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url();?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url();?>/js/sb-admin-2.min.js"></script>

    <!-- dashboard -->

    <!-- Page level plugins -->
    <script src="<?= base_url();?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?= base_url();?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url();?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url();?>/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url();?>/js/demo/chart-pie-demo.js"></script>
    <script src="<?= base_url();?>/js/demo/chart-bar-demo.js"></script>
    <script src="<?= base_url();?>/js/demo/datatables-demo.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
    <script src="<?= base_url();?>/vendor/datatables/datatables.min.js"></script>

    <!-- <script>
        function previewImg(){
            const gambar = document.querySelector('#gambar');
            const gambarLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            gambarLabel.textContent = gambar.files[0].name;

            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);

            fileGambar.onload = function(e){
                imgPreview.src= e.target.result;
            }
        }
        
    </script> -->
    <script>
        function previewImg(id){
            const gambar = document.querySelector(`#${id}`);
            const gambarLabel = gambar.nextElementSibling;
            const imgPreview = gambar.closest('.row').querySelector('.img-preview');

            gambarLabel.textContent = gambar.files[0].name;

            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);

            fileGambar.onload = function(e){
                imgPreview.src= e.target.result;
            }
        }
    </script>
    

</body>

</html>