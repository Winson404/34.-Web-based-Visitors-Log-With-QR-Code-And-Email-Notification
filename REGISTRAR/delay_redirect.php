<?php 
  include '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Visitor's Log System</title>
  <!---FAVICON ICON FOR WEBSITE--->
  <link rel="shortcut icon" type="image/png" href="../images/systemlogo.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Font Awesome -->
  <script src="../plugins/fontawesome-free/js/font-awesome-ni-erwin.js" crossorigin="anonymous"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <!-- <script src="../sweetalert2.min.js"></script> -->
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0 auto;
    }
    body::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-position: center;
      z-index: -1;
      text-align: center;
    }
    label {
      margin-bottom: 2px;
    }
    .form-control:not([type="email"]):not([type="password"]) {
      text-transform: capitalize;
    }
    #background-video {
      width: 100vw;
      height: 100vh;
      object-fit: cover;
      position: fixed;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      z-index: -1;
    }
  </style>
</head>
<body class="hold-transition layout-top-nav layout-footer-fixed">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style="opacity:.8">
      <div class="container">
        <a href="index.php" class="navbar-brand">
          <img src="../images/systemlogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 1">
          <span class="brand-text font-weight-light">PRMSU Entrance / Exit Gate</span>
        </a>
        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="nav-item">
            <a href="session_unset.php" class="nav-link">Admin login</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container mt-5 p-4">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-7 col-md-7 col-sm-8 col-12" >
          <div class="card text-center">
            <div class="card-body">

                <?php
                if (isset($_SESSION['message']) && isset($_SESSION['text']) && isset($_SESSION['status'])) {
                    $message = $_SESSION['message'];
                    $text = $_SESSION['text'];
                    $status = $_SESSION['status'];

                    echo '<h3 class="text-success text-bold">Success</h3>';
                    echo '<div class="alert alert-' . $status . '">';
                    echo '<h4 class="alert-heading">' . $message . '</h4>';
                    echo '<p>' . $text . '</p>';
                    echo '</div>';

                    unset($_SESSION['message']); 
                    unset($_SESSION['text']); 
                    unset($_SESSION['status']);
                } else {
                    echo '<h3 class="text-danger text-bold">Error</h3>';
                    echo '<div class="alert alert-' . $status . '">';
                    echo '<h4 class="alert-heading">' . $message . '</h4>';
                    echo '<p>' . $text . '</p>';
                    echo '</div>';
                    header("Location: index.php");
                    exit();
                }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>

  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
   <!-- /.control-sidebar -->
   <footer class="main-footer">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 bg-white">
          <label>MISSION</label>
          <p class="text-sm text-justify text-muted">The PRMSU shall primarily provide advance and higher professional, technical, and special instructions in various disciplines, undertake research, extension and income generaton programs for the sustainable development of Zambales, the region and the country.</p>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 bg-white">
          <label>VISION</label>
          <p class="text-sm text-justify text-muted">PRMSU as a premiere learner-centered and proactive university in a digital and global society.</p>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 bg-white">
          <label>QUALITY POLICY</label>
          <p class="text-sm text-justify text-muted">The President Ramon Magsaysay State University is committed to continually strive for excellence in instruction, resarch, extension and production to strengthen global competitiveness adhering to quality standards for the utmost satisfaction of its valued customers.</p>
        </div>
      </div>
      <div class="dropdown-divider"></div>
      <strong>Copyright &copy; 2023 <a href="#">Visitor's Log System</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>
</div>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>


<!-- <?php //include 'sweetalert_messages.php'; ?> -->


<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- jquery-validation -->
<script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../plugins/jquery-validation/additional-methods.min.js"></script>


<script>
setTimeout(function() {
    window.location.href = 'index.php'; 
}, 3000);
</script>

