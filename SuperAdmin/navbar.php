<?php
    include '../config.php';
    // UNSET THIS QR CODE IF IN CASE THE SESSION IS RUNNING OUTSIDE THE ADMIN FOLDER
    unset($_SESSION['QR_ID']);

    if(isset($_SESSION['superadmin_Id']) && isset($_SESSION['login_time'])) {

      $id = $_SESSION['superadmin_Id'];
      $users = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$id'");
      $row = mysqli_fetch_array($users);
      
      $login_time = $_SESSION['login_time'];
      $logout_time = date('Y-m-d h:i A');

      // RECORD TIME LOGGED IN TO BE USED IN AUTO LOGOUT - CODE CAN BE FOUND ON ../INCLUDES/FOOTER.PHP
      $_SESSION['last_active'] = time();

    include '../includes/topbar.php';
?>



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="../images/systemlogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Visitor's Log System</span>
      <br>
      <span class="text-xs ml-5 font-weight-light mt-2">&nbsp;&nbsp;Palanginan, Iba Zambales 2201</span>
    </a>



    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-4 pb-2 pt-3 mb-3 d-flex">
        <div class="image">
          <?php //if($row['image'] == ""): ?>
          <img src="../dist/img/avatar.png" alt="User Avatar" class="img-size-50 img-circle">
          <?php //else: ?>
          <img src="../images-users/<?php //echo $row['image']; ?>" alt="User Image" style="height: 34px; width: 34px; border-radius: 50%;">
          <?php //endif; ?>
        </div>
        <div class="info">
          <a href="profile.php" class="d-block"><?php //echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></a>
        </div>
      </div> -->
      

      <!-- SidebarSearch Form -->
      <!--   <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-4">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="dashboard.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard </p></a>
          </li>

          <li class="nav-header text-secondary" style="margin-bottom: -10px;">RECORDS</li>
          <li class="nav-item">
            <a href="admin.php" class="nav-link <?= (in_array(basename($_SERVER['PHP_SELF']), ['admin.php', 'admin_mgmt.php', 'admin_view.php']) ? 'active' : '') ?>"><i class="fas fa-user-shield"></i><p>&nbsp;&nbsp; Administrator records</p></a>
          </li>

          <li class="nav-item">
            <a href="visitors.php" class="nav-link <?= (in_array(basename($_SERVER['PHP_SELF']), ['visitors.php', 'visitors_mgmt.php', 'visitors_view.php']) ? 'active' : '') ?>"><i class="fas fa-users"></i><p>&nbsp;&nbsp; Visitor records</p></a>
          </li>

          <li class="nav-header text-secondary" style="margin-bottom: -10px;">ANNOUNCEMENTS</li>
          <li class="nav-item">
            <a href="announcement.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'announcement.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-bell"></i><p>&nbsp;&nbsp; Announcement</p></a>
          </li>

          <li class="nav-header text-secondary" style="margin-bottom: -10px;">LOG HISTORY</li>
          <li class="nav-item">
            <a href="log_history.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'log_history.php') ? 'active' : ''; ?>"><i class="fa-solid fa-right-to-bracket"></i><p>&nbsp;&nbsp; Visitor's Log</p></a>
          </li>
          <li class="nav-item">
            <a href="users_log_history.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'users_log_history.php') ? 'active' : ''; ?>"><i class="fa-solid fa-right-to-bracket"></i><p>&nbsp;&nbsp; System User's Log</p></a>
          </li>

          

        </ul>
      </nav>


      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>




  

<?php
// ------------------------------CLOSING THE SESSION OF THE LOGGED IN USER WITH else statement----------//
    } else {
     header('Location: ../login.php');
    }
?>
