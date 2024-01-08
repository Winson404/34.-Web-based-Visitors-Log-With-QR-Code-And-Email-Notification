<?php 
    session_start();
    if(isset($_SESSION['QR_ID'])) {
      unset($_SESSION['QR_ID']); 
    } 

    if(isset($_SESSION['superadmin_Id'])) {
      header('Location: Superadmin/dashboard.php');
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Visitor's Log System</title>
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
        margin: 0; /* Remove default body margin */
        overflow: hidden; /* Prevent page content from overflowing the body */

        /* Set the background color with opacity */
        background-color: rgba(255, 255, 255, 0.5);
    }

    /* Create a pseudo-element for the background image */
    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-video: url("images/bg1.mp4");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        z-index: -1; /* Ensure the pseudo-element is behind the page content */
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
<body class="hold-transition layout-top-nav p-5">
<div class="wrapper m-5">

   <video id="background-video" autoplay loop muted >
      <source src="images/bg1.mp4" type="video/mp4">
    </video>
       
    <div class="row d-flex justify-content-center">
        <div class="col-4">
            <img src="images/systemlogo.png" alt="User Image" class="img-fluid d-block m-auto" width="150">
        </div>
    </div>

    <div class="lockscreen-logo">
      <a href="index.php" class="text-light" style="font-weight: bold; font-size: 50px;">
        WELCOME<br>
        TO<br>
        <span class="text-primary">PRESIDENT RAMON MAGSAYSAY STATE UNIVERSITY</span>
      </a>
    </div>

    <div class="help-block text-center">
      <a href="register.php" class="btn btn-primary btn-sm"><i class="fa-solid fa-right-to-bracket"></i> Click to register</a>
      <!-- <a href="logout_scanQR.php" class="btn btn-dark btn-sm"><i class="fa-solid fa-door-closed"></i> Check-out</a> -->
    </div>
   
    <div class="lockscreen-footer text-center">
      <hr>
      Copyright &copy; 2023 <b><a href="#" class="text-black">Visitor's Log System</a></b><br>
      All rights reserved
    </div>

<?php include 'footer.php'; ?>
