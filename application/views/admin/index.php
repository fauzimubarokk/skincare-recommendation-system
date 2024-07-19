<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Skincare</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/images/logos/logo.png" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.min.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/datatables/datatables.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
  <style>
    html,
    body {
      height: 100%;
    }

    .wrapper {
      min-height: 100%;
      display: flex;
      flex-direction: column;
    }

    .content {
      flex: 1;
    }

    .sidebar-nav ul .sidebar-item.selected>.sidebar-link,
    .sidebar-nav ul .sidebar-item.selected>.sidebar-link.active,
    .sidebar-nav ul .sidebar-item>.sidebar-link.active {
      background-color: #FC8EAC;
    }

    @media (min-width: 1200px) {
      #main-wrapper[data-layout=vertical][data-header-position=fixed] .app-header {
        background-color: #FC8EAC;
        width: calc(100% - 270px);
      }
    }

    .btn-outline-primary {
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

    .btn-danger {
      --bs-btn-color: #fff;
      --bs-btn-bg: #dc3545;
      --bs-btn-border-color: #dc3545;
      --bs-btn-hover-color: #fff;
      --bs-btn-hover-bg: #d5745b;
      --bs-btn-hover-border-color: #dc3545;
      --bs-btn-focus-shadow-rgb: 251, 155, 129;
      --bs-btn-active-color: #fff;
      --bs-btn-active-bg: #dc3545;
      --bs-btn-active-border-color: #bc6750;
      --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
      --bs-btn-disabled-color: #fff;
      --bs-btn-disabled-bg: #dc3545;
      --bs-btn-disabled-border-color: #dc3545;
    }
  </style>
</head>

<body c>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="<?= base_url() ?>assets/images/logos/logo.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item <?php echo ($this->uri->segment(1) == 'home' || $this->uri->segment(1) == 'admin') ? 'selected' : ''; ?>">
              <a class="sidebar-link" href="<?= base_url() ?>home" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <?php if ($this->session->userdata('role') == "Admin") { ?>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Data Master</span>
              </li>
              <li class="sidebar-item <?php echo ($this->uri->segment(1) == 'skincare') ? 'selected' : ''; ?>">
                <a class="sidebar-link" href="<?= base_url() ?>skincare" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">Skincare</span>
                </a>
              </li>
              <li class="sidebar-item <?php echo ($this->uri->segment(1) == 'user') ? 'selected' : ''; ?>">
                <a class="sidebar-link" href="<?= base_url() ?>user" aria-expanded="false">
                  <span>
                    <i class="ti ti-mood-happy"></i>
                  </span>
                  <span class="hide-menu">Pengguna</span>
                </a>
              </li>
            <?php } ?>

            <?php if ($this->session->userdata('role') == "User") { ?>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Data Rekomendasi</span>
              </li>
              <li class="sidebar-item <?php echo ($this->uri->segment(1) == 'skincare') ? 'selected' : ''; ?>">
                <a class="sidebar-link" href="./ui-buttons.html" aria-expanded="false">
                  <span>
                    <i class="ti ti-mood-happy"></i>
                  </span>
                  <span class="hide-menu">Cek Rekomendasi</span>
                </a>
              </li>
              <li class="sidebar-item <?php echo ($this->uri->segment(1) == 'recom') ? 'selected' : ''; ?>">
                <a class="sidebar-link" href="<?= base_url() ?>recom/history" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">Riwayat Rekomendasi</span>
                </a>
              </li>
            <?php } ?>

          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <b class="text-white"> Welcome : <?= $this->session->userdata('name'); ?></b>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="<?= base_url() ?>/assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="<?= site_url('change-password') ?>" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-lock fs-6"></i>
                      <p class="mb-0 fs-3">Ubah Password</p>
                    </a>
                    <a href="<?= base_url() ?>logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        <?php $this->load->view($contents) ?>

        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">My Skincare @2024</p>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url() ?>assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/js/sidebarmenu.js"></script>
  <script src="<?= base_url() ?>assets/js/app.min.js"></script>
  <script src="<?= base_url() ?>assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="<?= base_url() ?>assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="<?= base_url() ?>assets/js/dashboard.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
  <!-- DataTables JS -->
  <!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->
  <script src="<?= base_url() ?>assets/datatables/js/datatables.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.dataTables.js"></script>

  <script>
    new DataTable('#example-table', {
      responsive: true
    });

    setTimeout(function() {
      $('#myAlert').alert('close');
    }, 3000);
  </script>
</body>

</html>