<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Skincare</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.min.css" />
  <style>
    .btn-primary {
      --bs-btn-color: #fff;
      --bs-btn-bg: #FC8EAC;
      --bs-btn-border-color: #FC8EAC;
      --bs-btn-hover-color: #fff;
      --bs-btn-hover-bg: #FF007F;
      --bs-btn-hover-border-color: #FF007F;
      --bs-btn-focus-shadow-rgb: 117, 153, 255;
      --bs-btn-active-color: #fff;
      --bs-btn-active-bg: #FF007F;
      --bs-btn-active-border-color: #4665bf;
      --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
      --bs-btn-disabled-color: #fff;
      --bs-btn-disabled-bg: #5D87FF;
      --bs-btn-disabled-border-color: #5D87FF;
    }

    .text-primary {
        --bs-text-opacity: 1;
        color: #FF007F !important;
    }
  </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">

              <div class="card-body">
                <?php if ($this->session->flashdata('error_message')) { ?>
                  <div class="alert-container">
                    <div id="myAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('error_message'); ?>
                    </div>
                  </div>
                <?php } ?>

                <?php if ($this->session->flashdata('success_message')) { ?>
                  <div class="alert-container">
                    <div id="myAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('success_message'); ?>
                    </div>
                  </div>
                <?php } ?>

                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="<?= base_url() ?>assets/images/logos/logo.png" width="180" alt="">
                </a>
                <p class="text-center">Silahkan Login Dahulu</p>
                <form method="post" action="<?= site_url('authentication/login'); ?>">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                  </div>
                  <!-- <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                    <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a>
                  </div> -->
                  <input type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Masuk">
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Belum Punya Akun?</p>
                    <a class="text-primary fw-bold ms-2" href="<?= base_url() ?>register">Daftar</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url() ?>assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    setTimeout(function() {
      $('#myAlert').alert('close');
    }, 3000);
  </script>
</body>

</html>