<title>Visitor's Log System | Dashboard</title>
<?php include 'navbar.php'; ?>
  
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <?php if($college_name == 'GATE'): ?>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <?php
                    $check_login_time = date("Y-m-d");
                    $login = mysqli_query($conn, "SELECT log_Id, login_college_name FROM visitors_log_history WHERE login_college_name='$college_name' AND DATE(login_time)='$check_login_time' ");
                    $row_login = mysqli_num_rows($login);
                  ?>
                  <h3><?php echo $row_login; ?></h3>

                  <p>Today's total logins</p>
                </div>
                <div class="icon">
                  <i class="fas fa-sign-in-alt"></i>
                </div>
                <a href="log_history.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <?php else: ?>
           <div class="col-lg-3 col-6">
              <div class="small-box bg-primary">
                <div class="inner">
                  <?php
                    $reg = mysqli_query($conn, "SELECT Id, college_name FROM visitors WHERE college_name='$college_name' AND DATE(date_registered) = DATE('$date_today')");
                    $row_reg = mysqli_num_rows($reg);
                  ?>
                  <h3><?php echo $row_reg; ?></h3>

                  <p>Registered <?= $college_name ?> visitors</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-plus"></i>
                </div>
                <a href="visitors.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <?php
                    $check_login_time = date("Y-m-d");
                    $login = mysqli_query($conn, "SELECT log_Id, login_college_name FROM visitors_log_history WHERE login_college_name='$college_name' AND DATE(login_time)='$check_login_time' ");
                    $row_login = mysqli_num_rows($login);
                  ?>
                  <h3><?php echo $row_login; ?></h3>

                  <p>Today's total logins</p>
                </div>
                <div class="icon">
                  <i class="fas fa-sign-in-alt"></i>
                </div>
                <a href="log_history.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <?php endif; ?>

         
        </div>


      </div>
    </section>

  </div>

<?php include '../includes/footer.php'; ?>
