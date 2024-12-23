<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Museum NTB - FormLogin</title>

    <link rel="shortcut icon" href="img/logomuseum2.png">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url();?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url();?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-light">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                                <div class="col-lg-6">
                                    <img src="<?= base_url(); ?>/img/museum2.png" style="height: 550px; width: 600px;" alt="" class="img-fluid">
                                </div>
                            <div class="col-lg-6 " >
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <!-- <form class="user"> -->
                                    <div class="">
                                        <?php if (session()->getFlashdata('errors')): ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= session()->getFlashdata('errors'); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (session()->getFlashdata('pesanlogin')): ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= session()->getFlashdata('pesanlogin'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (session()->getFlashdata('pesan')): ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= session()->getFlashdata('pesan'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (session()->getFlashdata('pesanlogout')): ?>
                                            <div class="alert alert-success" role="alert">
                                                <?= session()->getFlashdata('pesanlogout'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php 
                                    echo form_open('/loginUser');
                                    ?>
                                        <div class="form-group">
                                            <label for="" class="d-inline" style="font-size:small;">Nama:</label>
                                            <input type="text" class="form-control form-control-user" name="nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="d-inline" style="font-size:small;">Password:</label>
                                            <input type="password" class="form-control form-control-user" name="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a> -->
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                    <?php 
                                    echo form_close();
                                    ?>
                                    <!-- </form> -->
                                    <hr>
                                    
                                    <div class="text-center">
                                        
                                        <a class="small" href="" data-bs-toggle="modal" data-bs-target="#daftar" data-bs-whatever="@getbootstrap">Daftar Akun</a>
                                        <br>
                                        <a class="small" href="/home">Museum Negeri Nusa Tenggara Barat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <div class="modal fade" id="daftar" tabindex="-1" aria-labelledby="daftar" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="daftar">Daftar Akun</h4>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <form action="/registerUser" method="post" enctype="multipart/form-data" id="form">
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="nama">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Pekerjaan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="pekerjaan">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Instansi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="instansi">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Whatsapp</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="wa">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="recipient-name" name="email">
                    </div>
                </div>
                
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="password">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="email" class="col-sm-3 col-form-label">Keperluan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="recipient-name" name="keperluan">
                    </div>
                </div>
                
                <div class="modal-footer">
                  
                  <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                  <!-- <button type="button" class="btn btn-primary" id="openLoginFromDaftar">Login</button> -->
                  <button type="submit" class="btn btn-success" data-bs-dismiss="modal" >Daftar</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
                </form>
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


</body>

</html>