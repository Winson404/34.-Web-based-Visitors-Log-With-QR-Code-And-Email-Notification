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
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $users = mysqli_query($conn, "SELECT user_Id from users WHERE user_type='Admin'");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h3><?php echo $row_users; ?></h3>

                <p>Total administrators</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-shield"></i>
              </div>
              <a href="admin.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  $visitors = mysqli_query($conn, "SELECT Id from visitors");
                  $row_visitors = mysqli_num_rows($visitors);
                ?>
                <h3><?php echo $row_visitors; ?></h3>

                <p>Total registered visitors</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="visitors.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  $check_login_time = date("Y-m-d");
                  $user_login = mysqli_query($conn, "SELECT log_Id FROM log_history JOIN users ON log_history.user_Id=users.user_Id WHERE users.user_type != 'Superadmin' AND DATE(login_time)='$check_login_time' ");
                  $row_user_login = mysqli_num_rows($user_login);
                ?>
                <h3><?php echo $row_user_login; ?></h3>

                <p>Today's total administrator logins</p>
              </div>
              <div class="icon">
                <i class="fas fa-sign-in-alt"></i>
              </div>
              <a href="users_log_history.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $check_login_time = date("Y-m-d");
                  $login = mysqli_query($conn, "SELECT log_Id FROM visitors_log_history WHERE DATE(login_time)='$check_login_time' ");
                  $row_login = mysqli_num_rows($login);
                ?>
                <h3><?php echo $row_login; ?></h3>

                <p>Today's total visitor logins</p>
              </div>
              <div class="icon">
                <i class="fas fa-sign-in-alt"></i>
              </div>
              <a href="log_history.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $reg = mysqli_query($conn, "SELECT Id FROM visitors WHERE DATE(date_registered) = DATE('$date_today')");
                  $row_reg = mysqli_num_rows($reg);
                ?>
                <h3><?php echo $row_reg; ?></h3>

                <p>Today's total registration</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="visitors.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>


      </div>
    </section>

  </div>

<?php include '../includes/footer.php'; ?>
