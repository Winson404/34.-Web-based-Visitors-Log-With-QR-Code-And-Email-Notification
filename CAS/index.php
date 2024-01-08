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
<body class="hold-transition layout-top-nav">
  <div class="wrapper">
    <video id="background-video" autoplay loop muted >
      <source src="../images/bg1.mp4" type="video/mp4">
    </video>

    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style="opacity:.8">
      <div class="container">
        <a href="index.php" class="navbar-brand">
          <img src="../images/systemlogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 1">
          <span class="brand-text font-weight-light">PRMSU Visitor's Log Check-in/Check-out</span>
        </a>
        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="nav-item">
            <a href="session_unset.php" class="nav-link"><img src="../images/cas.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 1">Admin login</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="row d-flex justify-content-center" style="margin: 10px 10px 5px 10px;">
      <div class="col-1">
      <img src="../images/systemlogo.png" alt="PRMSU Logo" class="img-fluid d-block m-auto" >
      </div>
      <div class="col-1">
      <img src="../images/cas.png" alt="CAS Logo" class="img-fluid d-block m-auto">
      </div>
    </div>

    <div class="lockscreen-logo">
      <a href="index.php" class="text-light" style="font-weight: bold;">WELCOME<br>TO<br>
      <span class="text-primary">COLLEGE OF ARTS AND SCIENCES</span>
      </a>
    </div>

    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-8 col-12 m-3" >
        <div class="card text-center">
          <div class="card-body p-3 m-0">
            <p>Place the printed QR Code in front of the camera</p>
            <form action="processes.php" method="POST" class="form-horizontal">
              <input type="hidden" name="visitorsQR" id="visitorsQR" class="form-control" autofocus>
            </form>
            <div class="d-block m-auto bg-dark" id="containerScanner">
              <video id="preview" width="100%" class="shadow-sm" style="border: 4px solid gray;"></video>
            </div>
            <div class="d-flex justify-content-center">
              <button type="button" class="btn btn-sm bg-dark mt-2" id="clickMe" onclick="refreshPage()"><i class="fa-solid fa-rotate-right"></i> RESET CAMERA</button>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>

    <!-- <div class="container p-0 ">
      <div class="row d-flex justify-content-center p-0">
        <div class="col-md-5 d-flex">
          <div class="card flex-fill">
            <div class="card-body">
              <h5 class="card-title text-bold ">Mission</h5>
              <p class="card-text text-center">The PRMSU shall primarily provide advance and higher professional, technical, and special instructions in various disciplines, undertake research, extension and income generaton programs for the sustainable development of Zambales, the region and the country.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex">
          <div class="card flex-fill">
            <div class="card-body">
              <h5 class="card-title text-bold">Vision</h5>
              <p class="card-text text-center">PRMSU as a premier learner-centered and proactive university in a digital and global society.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex">
          <div class="card flex-fill">
            <div class="card-body">
              <h5 class="card-title text-bold">Quality Policy</h5>
              <p class="card-text text-center">The President Ramon Magsaysay State University is committed to continually strive for excellence in instruction, research, extension, and production to strengthen global competitiveness adhering to quality standards for the utmost satisfaction of its valued customers.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="lockscreen-footer text-center m-1">
        <hr>
        Copyright &copy; 2023 <b><a href="#" class="text-black">Visitor's Log System</a></b><br>
        All rights reserved
      </div>
    </div> -->
  
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


<?php include 'sweetalert_messages.php'; ?>


<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- jquery-validation -->
<script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../plugins/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript" src="../plugins/instascan.min.js"></script>
<script>

  $(window).on('load', function() {
      document.getElementById("containerScanner").classList.remove("bg-dark");
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
        Instascan.Camera.getCameras().then(function(cameras){
          if(cameras.length > 0 ){
            scanner.start(cameras[0]);
          } else{
            alert('No cameras found');
            document.getElementById("containerScanner").classList.add("bg-dark");
          }

        }).catch(function(e) {
          console.error(e);
        });

        scanner.addListener('scan',function(c){
        document.getElementById('visitorsQR').value = c;
        document.forms[0].submit();
      });
  })
   

   function load_upmodal() {
    
    document.getElementById("containerScanner").classList.remove("bg-dark");

    let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
      Instascan.Camera.getCameras().then(function(cameras){
        if(cameras.length > 0 ){
          scanner.start(cameras[0]);
        } else{
          alert('No cameras found');
          document.getElementById("containerScanner").classList.add("bg-dark");
        }

      }).catch(function(e) {
        console.error(e);
      });

      scanner.addListener('scan',function(c){
        document.getElementById('visitorsQR').value = c;
         document.forms[0].submit();
      });
  } 

  // REFRESH PAGE ON BUTTON CLICK
  function refreshPage() {
    location.reload();
    load_upmodal();
  }
</script>

