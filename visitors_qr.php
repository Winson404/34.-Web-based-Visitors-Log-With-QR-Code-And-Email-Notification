<?php
include 'config.php';
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
    /*body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url("images/index.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center
    z-index: -1;
    }*/
    label {
    margin-bottom: 2px;
    }
    .form-control:not([type="email"]):not([type="password"]) {
    text-transform: capitalize;
    }
    </style>
  </head>
  <body class="hold-transition layout-top-nav">
    <?php
      $qr_id = $_SESSION['QR_ID'];
      $sql = mysqli_query($conn, "SELECT * FROM visitors WHERE qr_id='$qr_id'");
      $row = mysqli_fetch_array($sql);
    ?>
    <div class="wrapper m-5">
      <div class="row d-flex justify-content-center m-5">
        <div class="col-lg-5 col-md-5 col-sm-6 col12">
          <div class="card card-solid"  id="printElement">
            <div class="card-header text-center">
              <table style=" width: 65%;
                border-collapse: collapse;">
                <tr>
                  <th><img src="images/prmsu.jpg" style="width: 60%; max-width: 60px; float: left;"> </th>
                  <th><a href="#"><?= $row['firstname'].' '.$row['middlename'].' '.$row['lastname']; ?></a></th>
                </tr>
              </table>
            </div>
            <div class="card-body text-center">
              <img src="images-QR Code/<?= $row['qr_image']; ?>" alt="User Image" class="d-block m-auto" width="250" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
              <p class="text-sm m-1 font-italic">ID: <?= $row['qr_id']; ?></p>
              <b>Note:</b> Please be advised not to discard your printed QR Code, as it will be required for future check-in and out purposes.
              
            </div>
          </div>
          <div class="help-block text-center">
            <button class="btn btn-success btn-sm" id="printButton"><i class="fa-solid fa-print"></i> Print QR Code</button>
            <a href="index.php" class="btn btn-dark btn-sm" id="printButton"><i class="fa-solid fa-house"></i> Back to Home</a>
          </div>
        </div>
      </div>
    </div>
      
      
          <script src="includes/print.js"> </script>
          <?php include 'footer.php'; ?>
          <script>
          // PRINT QR CODE ON PAGE LOAD
          $(window).on('load', function() {
          document.getElementById("printButton").click();
          })
          // REFRESH THE VISITORS_QR.PHP PAGE EVERY AFTER 5 MINUTES AND UNSET THE SESSION['QR_ID']
          setTimeout(function () {
          // Unset the QR_ID session variable after 5 minutes (300,000 milliseconds)
          <?php if (isset($_SESSION['QR_ID'])) { ?>
          window.location.href = 'unset_qr_id.php'; // Redirect to a PHP script to unset QR_ID
          <?php } else { ?>
          location.reload(); // Reload the page
          <?php } ?>
          }, 1 * 60 * 7000); // 5 minutes in milliseconds
          </script>