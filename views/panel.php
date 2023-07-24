<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/cenotes/views/panel_resources/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="http://localhost/cenotes/views/panel_resources/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="http://localhost/cenotes/views/panel_resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="http://localhost/cenotes/views/panel_resources/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/cenotes/views/panel_resources/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="http://localhost/cenotes/views/panel_resources/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="http://localhost/cenotes/views/panel_resources/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="http://localhost/cenotes/views/panel_resources/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img style="width: 50%; height: 50%; margin-bottom: 44px;" src="views/assets/img/company/LogoCenote.png" alt="Logo Cenotes" class="logo">
    <img class="animation__shake" src="http://localhost/cenotes/views/panel_resources/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/cenotes" class="brand-link" style="color: #000;padding-top: 5px;" >Home</a>
      </li>
    </ul> 
    
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> -->

      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #000;">
    <!-- Brand Logo -->
    <a href="#" class="nav-link" data-target="#panel-section">
      <img src="views/assets/img/company/LogoCenote.png"  alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="    width: 53px;">
      <span class="brand-text font-weight-light" style="color: aliceblue;">PANEL</span>

      <!-- <a href="#" class="nav-link" data-target="#panel">
      <span class="brand-text font-weight-light">PANEL</span>
        
      </a> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="data:image/jpeg;base64,<?php echo base64_encode($foto); ?>" class="img-circle elevation-2" alt="User Image">
          <!-- <img src="http://localhost/cenotes/views/panel_resources/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $nombre; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">ADMINISTRACION</li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-target="#clients-section">
              <i class="nav-icon far fa-user"></i>
              <p>Turistas registrados</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-target="#cenotes-section">
              <i class="nav-icon far fa-image"></i>
              <p>Cenotes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-target="#aprobar-cenotes-section">
              <i class="nav-icon fas fa-image"></i>
              <p>Aprobar cenotes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-target="#respaldo-section">
              <i class="nav-icon fas fa-table"></i>
              <p>Respaldar base de datos</p>
            </a>
          </li>          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: rgb(39 39 39);;">
    <!-- Content Header (Page header) -->
 
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="container-fluid">
        <div class="content-section" id="panel-section">

        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
                  <h1 class="m-0">Dashboard</h1>
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $countUser; ?></h3>
                  <p>Usuarios</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $totalCount; ?><sup style="font-size: 20px"></sup></h3>
                  <p>Cenotes Registrados</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $countStatus1; ?></h3>
                  <p>Cenotes Aprobados</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?php echo $countStatus0; ?></h3>
                  <p>Cenotes sin aprobar</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="content-section" id="clients-section">
          <?php include 'views/clients.php'; ?>
        </div>

        <div class="content-section" id="cenotes-section">
          <?php include 'views/cenotes.php'; ?>
        </div>

        <div class="content-section" id="aprobar-cenotes-section">
          <?php include 'views/aprobar_cenotes.php'; ?>
        </div>

        <div class="content-section" id="respaldo-section">
          <?php include 'views/respaldo.php'; ?>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.
    </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="http://localhost/cenotes/views/panel_resources/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="http://localhost/cenotes/views/panel_resources/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="http://localhost/cenotes/views/panel_resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="http://localhost/cenotes/views/panel_resources/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="http://localhost/cenotes/views/panel_resources/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="http://localhost/cenotes/views/panel_resources/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="http://localhost/cenotes/views/panel_resources/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="http://localhost/cenotes/views/panel_resources/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="http://localhost/cenotes/views/panel_resources/plugins/moment/moment.min.js"></script>
<script src="http://localhost/cenotes/views/panel_resources/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="http://localhost/cenotes/views/panel_resources/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="http://localhost/cenotes/views/panel_resources/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="http://localhost/cenotes/views/panel_resources/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/cenotes/views/panel_resources/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://localhost/cenotes/views/panel_resources/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="http://localhost/cenotes/views/panel_resources/dist/js/pages/dashboard.js"></script>
<script>
  $(document).ready(function() {
    // Ocultar todas las secciones de contenido
    $('.content-section').hide();
    $('#panel-section').show();

    // Manejar el evento clic en los enlaces del menú lateral
    $('.nav-link').click(function(event) {
      event.preventDefault();
      var target = $(this).data('target');

      // Ocultar todas las secciones de contenido
      $('.content-section').hide();

      // Mostrar la sección de contenido correspondiente al enlace seleccionado
      $(target).show();
    });
  });
</script>
