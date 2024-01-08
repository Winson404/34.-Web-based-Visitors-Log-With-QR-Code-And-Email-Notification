<?php 
    include 'config.php';
    if(isset($_SESSION['superadmin_Id'])) {
      header('Location: Superadmin/dashboard.php');
    } else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PRMSU Visitor's Log System</title>
  <!---FAVICON ICON FOR WEBSITE--->
  <link rel="shortcut icon" type="image/png" href="images/systemlogo.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Font Awesome -->
  <script src="plugins/fontawesome-free/js/font-awesome-ni-erwin.js" crossorigin="anonymous"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
    label {
      margin-bottom: 2px;
    }
    .form-control:not([type="email"]):not([type="password"]) {
      text-transform: capitalize;
    }
</style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <?php 
    $current_page = basename($_SERVER['PHP_SELF']);
    if ($current_page !== 'index.php') { ?>
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
          <a href="session_unset.php" class="navbar-brand">
            <img src="images/systemlogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Visitor's Log System</span>
          </a>

          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <!-- <ul class="navbar-nav">
              <li class="nav-item">
                <a href="index3.html" class="nav-link">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                  <li><a href="#" class="dropdown-item">Some action </a></li>
                  <li><a href="#" class="dropdown-item">Some other action</a></li>
                </ul>
              </li>
            </ul> -->

            <!-- SEARCH FORM -->
            <!-- <form class="form-inline ml-0 ml-md-3">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </form> -->
          </div>

          <!-- Right navbar links -->
          <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
              <?php 
                $current_page = basename($_SERVER['PHP_SELF']);
                if ($current_page !== 'login.php') { ?>
                  <li class="nav-item">
                      <a href="login.php" class="nav-link">Admin login</a>
                  </li>
              <?php } ?>
          </ul>
        </div>
      </nav>
  <?php } ?>

  <!-- /.navbar -->
  <?php } ?>