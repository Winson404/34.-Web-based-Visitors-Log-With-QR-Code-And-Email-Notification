<?php include 'navbar.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Visitor's Log records</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Visitor's Log history</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <div class="card">
            <div class="card-header">
              <!-- <a href="users_mgmt.php?page=create" class="btn btn-sm bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> New User</a> -->
              <div class="card-tools mr-1">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-3">
              <form id="sortingForm" class="mb-3" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="sortBy">Sort By:</label>
                    <select id="sortBy" class="form-control" onchange="showDateInputs()" required>
                      <option value="" selected disabled>Select sorting type</option>
                      <option value="daily">Daily</option>
                      <option value="weekly">Weekly</option>
                      <option value="monthly">Monthly</option>
                      <option value="yearly">Yearly</option>
                      <option value="custom">Custom Date</option>
                    </select>
                  </div>
                  <div id="dateInputs" class="form-group col-md-6">
                    <!-- Date inputs will be dynamically added here based on the selection -->
                  </div>
                  <div class="form-group col-md-3" style="margin-top: 31px;">
                    <button type="submit" class="btn btn-warning" onclick="sortRecords()"><i class="fa-solid fa-sort"></i> Sort Records</button>
                    <button type="button" name="filter" class="btn btn-primary" onclick=location=URL><i class="fa-solid fa-arrows-rotate"></i> Refresh</button>
                  </div>
                </div>
              </form>

              <?php 
                if(isset($_POST['daily'])) {
                  $dailyDate = $_POST['dailyDate'];
                  $selectedDate = date('Y-m-d', strtotime($dailyDate));
                  $sql = mysqli_query($conn, "SELECT * FROM visitors_log_history 
                          JOIN visitors ON visitors_log_history.Id=visitors.Id 
                          WHERE DATE(login_time) = '$selectedDate' 
                             OR DATE(logout_time) = '$selectedDate' 
                          ORDER BY log_Id DESC");
              ?>

              <?php if(mysqli_num_rows($sql) > 0) { ?>
                <button id="printButton" class="btn btn-success btn-sm float-sm-right mr-3"><i class="fa-solid fa-print"></i> Print</button>
                <div id="printElement">
                  <div class="row d-flex justify-content-center">
                    <div class="col-lg-1 col-md-1 col-sm-3">
                      <img src="../images/systemlogo.png" class="img-fluid" alt="" width="80" style="top: 5px;">
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 text-center">
                        <p class="text-sm m-0">Republic of the Philippines</p>
                        <p class="m-0"><b>President Ramon Magsaysay State University</b></p>
                        <p class="text-sm font-italic m-0">(Formerly Ramon Magsaysay Technological University)</p>
                        <p class="text-sm m-0">Iba, Zambales</p>
                    </div>
                    <!--<div class="col-lg-1 col-md-1 col-sm-3">-->
                    <!--  <img src="../images/CCIT.png" class="img-fluid" alt="" width="80" style="top: 5px;">-->
                    <!--</div>-->
                  </div>
                  <hr>
                  <p class="text-center"><b>VISITOR'S LOG HISTORY ON <?= strtoupper(date("F d, Y", strtotime($dailyDate))); ?></b></p>
                  <table id="example111" class="table table-bordered table-hover text-sm table-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>VISITOR'S NAME</th>
                        <th>DATE LOGIN</th>
                        <th>LOGIN BLDG</th>
                        <th>DATE LOGOUT</th>
                        <th>LOGOUT BLDG</th>
                      </tr>
                    </thead>
                    <tbody id="users_data">
                      <?php
                      $i = 1;
                      while ($row = mysqli_fetch_array($sql)) {
                      ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= ucwords($row['firstname'].' '.$row['middlename'].' '.$row['lastname']) ?></td>
                        <td><?= date("F d, Y h:i A",strtotime($row['login_time'])) ?></td>
                        <td><?= ucwords($row['login_college_name']) ?></td>
                        <td><?php if($row['logout_time'] != '') { echo date("F d, Y h:i A",strtotime($row['logout_time'])); } else { echo 'On-going session'; } ?></td>
                        <td><?= ucwords($row['logout_college_name']) ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              <?php } else { ?>
                  <table id="example11" class="table table-bordered table-hover table-sm text-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>VISITOR'S NAME</th>
                        <th>DATE LOGIN</th>
                        <th>LOGIN BLDG</th>
                        <th>DATE LOGOUT</th>
                        <th>LOGOUT BLDG</th>
                      </tr>
                    </thead>
                    <tbody id="users_data">
                      <?php
                      $i = 1;
                      $sql = mysqli_query($conn, "SELECT * FROM visitors_log_history 
                          JOIN visitors ON visitors_log_history.Id=visitors.Id 
                          WHERE DATE(login_time) = '$selectedDate' 
                             OR DATE(logout_time) = '$selectedDate' 
                          ORDER BY log_Id DESC");
                      while ($row = mysqli_fetch_array($sql)) {
                      ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= ucwords($row['firstname'].' '.$row['middlename'].' '.$row['lastname']) ?></td>
                        <td><?= date("F d, Y h:i A",strtotime($row['login_time'])) ?></td>
                        <td><?= ucwords($row['login_college_name']) ?></td>
                        <td><?php if($row['logout_time'] != '') { echo date("F d, Y h:i A",strtotime($row['logout_time'])); } else { echo 'On-going session'; } ?></td>
                        <td><?= ucwords($row['logout_college_name']) ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
              <?php } ?>


              <?php
                } elseif(isset($_POST['weekly'])) {
                  $weeklyStartDate = $_POST['weeklyStartDate'];
                  $weeklyEndDate   = $_POST['weeklyEndDate'];

                  // Modify the format of the selected dates if needed
                  $startDate = date('Y-m-d', strtotime($weeklyStartDate));
                  $endDate   = date('Y-m-d', strtotime($weeklyEndDate));

                  $sql = mysqli_query($conn, "SELECT * FROM visitors_log_history 
                          JOIN visitors ON visitors_log_history.Id=visitors.Id 
                          WHERE (DATE(login_time) BETWEEN '$startDate' AND '$endDate') 
                             OR (DATE(logout_time) BETWEEN '$startDate' AND '$endDate') 
                          ORDER BY log_Id DESC");
              ?>
              <?php if(mysqli_num_rows($sql) > 0) { ?>
                <button id="printButton" class="btn btn-success btn-sm float-sm-right mr-3"><i class="fa-solid fa-print"></i> Print</button>
                <div id="printElement">
                  <div class="row d-flex justify-content-center">
                    <div class="col-lg-1 col-md-1 col-sm-3">
                      <img src="../images/systemlogo.png" class="img-fluid" alt="" width="80" style="top: 5px;">
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 text-center">
                        <p class="text-sm m-0">Republic of the Philippines</p>
                        <p class="m-0"><b>President Ramon Magsaysay State University</b></p>
                        <p class="text-sm font-italic m-0">(Formerly Ramon Magsaysay Technological University)</p>
                        <p class="text-sm m-0">Iba, Zambales</p>
                    </div>
                    <!--<div class="col-lg-1 col-md-1 col-sm-3">-->
                    <!--  <img src="../images/CCIT.png" class="img-fluid" alt="" width="80" style="top: 5px;">-->
                    <!--</div>-->
                  </div>
                  <hr>
                  <p class="text-center"><b>VISITOR'S LOG HISTORY BETWEEN <?= strtoupper(date("F d, Y", strtotime($weeklyStartDate))).' - '.strtoupper(date("F d, Y", strtotime($weeklyEndDate))); ?></b></p>
                  <table id="example111" class="table table-bordered table-hover text-sm table-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>VISITOR'S NAME</th>
                        <th>DATE LOGIN</th>
                        <th>LOGIN BLDG</th>
                        <th>DATE LOGOUT</th>
                        <th>LOGOUT BLDG</th>
                      </tr>
                    </thead>
                    <tbody id="users_data">
                      <?php
                      $i = 1;
                      while ($row = mysqli_fetch_array($sql)) {
                      ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= ucwords($row['firstname'].' '.$row['middlename'].' '.$row['lastname']) ?></td>
                        <td><?= date("F d, Y h:i A",strtotime($row['login_time'])) ?></td>
                        <td><?= ucwords($row['login_college_name']) ?></td>
                        <td><?php if($row['logout_time'] != '') { echo date("F d, Y h:i A",strtotime($row['logout_time'])); } else { echo 'On-going session'; } ?></td>
                        <td><?= ucwords($row['logout_college_name']) ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              <?php } else { ?>
                  <table id="example11" class="table table-bordered table-hover table-sm text-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>VISITOR'S NAME</th>
                        <th>DATE LOGIN</th>
                        <th>LOGIN BLDG</th>
                        <th>DATE LOGOUT</th>
                        <th>LOGOUT BLDG</th>
                      </tr>
                    </thead>
                    <tbody id="users_data">
                      <?php
                      $i = 1;
                      $sql = mysqli_query($conn, "SELECT * FROM visitors_log_history 
                            JOIN visitors ON visitors_log_history.Id=visitors.Id 
                            WHERE (DATE(login_time) BETWEEN '$startDate' AND '$endDate') 
                               OR (DATE(logout_time) BETWEEN '$startDate' AND '$endDate') 
                            ORDER BY log_Id DESC");
                      while ($row = mysqli_fetch_array($sql)) {
                      ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= ucwords($row['firstname'].' '.$row['middlename'].' '.$row['lastname']) ?></td>
                        <td><?= date("F d, Y h:i A",strtotime($row['login_time'])) ?></td>
                        <td><?= ucwords($row['login_college_name']) ?></td>
                        <td><?php if($row['logout_time'] != '') { echo date("F d, Y h:i A",strtotime($row['logout_time'])); } else { echo 'On-going session'; } ?></td>
                        <td><?= ucwords($row['logout_college_name']) ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
              <?php } ?>


              <?php
                } elseif(isset($_POST['monthly'])) {
                  $monthlyMonth = $_POST['monthlyMonth'];
                  $currentYear = date('Y');
                  $sql = mysqli_query($conn, "SELECT * FROM visitors_log_history 
                        JOIN visitors ON visitors_log_history.Id=visitors.Id 
                        WHERE MONTH(login_time) = '$monthlyMonth' 
                           OR MONTH(logout_time) = '$monthlyMonth' 
                        ORDER BY log_Id DESC");
              ?>

              <?php if(mysqli_num_rows($sql) > 0) { ?>
                <button id="printButton" class="btn btn-success btn-sm float-sm-right mr-3"><i class="fa-solid fa-print"></i> Print</button>
                <div id="printElement">
                  <div class="row d-flex justify-content-center">
                    <div class="col-lg-1 col-md-1 col-sm-3">
                      <img src="../images/systemlogo.png" class="img-fluid" alt="" width="80" style="top: 5px;">
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 text-center">
                        <p class="text-sm m-0">Republic of the Philippines</p>
                        <p class="m-0"><b>President Ramon Magsaysay State University</b></p>
                        <p class="text-sm font-italic m-0">(Formerly Ramon Magsaysay Technological University)</p>
                        <p class="text-sm m-0">Iba, Zambales</p>
                    </div>
                    <!--<div class="col-lg-1 col-md-1 col-sm-3">-->
                    <!--  <img src="../images/CCIT.png" class="img-fluid" alt="" width="80" style="top: 5px;">-->
                    <!--</div>-->
                  </div>
                  <hr>
                  <p class="text-center"><b>VISITOR'S LOG HISTORY ON THE MONTH OF <?= strtoupper(date("F", strtotime("$currentYear-$monthlyMonth-01"))) . " $currentYear"; ?></b></p>
                  <table id="example111" class="table table-bordered table-hover text-sm table-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>VISITOR'S NAME</th>
                        <th>DATE LOGIN</th>
                        <th>LOGIN BLDG</th>
                        <th>DATE LOGOUT</th>
                        <th>LOGOUT BLDG</th>
                      </tr>
                    </thead>
                    <tbody id="users_data">
                      <?php
                      $i = 1;
                      while ($row = mysqli_fetch_array($sql)) {
                      ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= ucwords($row['firstname'].' '.$row['middlename'].' '.$row['lastname']) ?></td>
                        <td><?= date("F d, Y h:i A",strtotime($row['login_time'])) ?></td>
                        <td><?= ucwords($row['login_college_name']) ?></td>
                        <td><?php if($row['logout_time'] != '') { echo date("F d, Y h:i A",strtotime($row['logout_time'])); } else { echo 'On-going session'; } ?></td>
                        <td><?= ucwords($row['logout_college_name']) ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              <?php } else { ?>
                  <table id="example11" class="table table-bordered table-hover table-sm text-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>VISITOR'S NAME</th>
                        <th>DATE LOGIN</th>
                        <th>LOGIN BLDG</th>
                        <th>DATE LOGOUT</th>
                        <th>LOGOUT BLDG</th>
                      </tr>
                    </thead>
                    <tbody id="users_data">
                      <?php
                      $i = 1;
                      $sql = mysqli_query($conn, "SELECT * FROM visitors_log_history 
                            JOIN visitors ON visitors_log_history.Id=visitors.Id 
                            WHERE MONTH(login_time) = '$monthlyMonth' 
                               OR MONTH(logout_time) = '$monthlyMonth' 
                            ORDER BY log_Id DESC");
                      while ($row = mysqli_fetch_array($sql)) {
                      ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= ucwords($row['firstname'].' '.$row['middlename'].' '.$row['lastname']) ?></td>
                        <td><?= date("F d, Y h:i A",strtotime($row['login_time'])) ?></td>
                        <td><?= ucwords($row['login_college_name']) ?></td>
                        <td><?php if($row['logout_time'] != '') { echo date("F d, Y h:i A",strtotime($row['logout_time'])); } else { echo 'On-going session'; } ?></td>
                        <td><?= ucwords($row['logout_college_name']) ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
              <?php } ?>


              <?php
                } elseif(isset($_POST['yearly'])) {
                  $yearlyDate = $_POST['yearlyDate'];
                  $sql = mysqli_query($conn, "SELECT * FROM visitors_log_history 
                        JOIN visitors ON visitors_log_history.Id=visitors.Id 
                        WHERE (YEAR(login_time) = '$yearlyDate' 
                           OR YEAR(logout_time) = '$yearlyDate')
                        ORDER BY log_Id DESC");
              ?>

              <?php if(mysqli_num_rows($sql) > 0) { ?>
                <button id="printButton" class="btn btn-success btn-sm float-sm-right mr-3"><i class="fa-solid fa-print"></i> Print</button>
                <div id="printElement">
                  <div class="row d-flex justify-content-center">
                    <div class="col-lg-1 col-md-1 col-sm-3">
                      <img src="../images/systemlogo.png" class="img-fluid" alt="" width="80" style="top: 5px;">
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 text-center">
                        <p class="text-sm m-0">Republic of the Philippines</p>
                        <p class="m-0"><b>President Ramon Magsaysay State University</b></p>
                        <p class="text-sm font-italic m-0">(Formerly Ramon Magsaysay Technological University)</p>
                        <p class="text-sm m-0">Iba, Zambales</p>
                    </div>
                    <!--<div class="col-lg-1 col-md-1 col-sm-3">-->
                    <!--  <img src="../images/CCIT.png" class="img-fluid" alt="" width="80" style="top: 5px;">-->
                    <!--</div>-->
                  </div>
                  <hr>
                  <p class="text-center"><b>VISITOR'S LOG HISTORY ON THE YEAR <?= $yearlyDate ?></b></p>
                  <table id="example111" class="table table-bordered table-hover text-sm table-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>VISITOR'S NAME</th>
                        <th>DATE LOGIN</th>
                        <th>LOGIN BLDG</th>
                        <th>DATE LOGOUT</th>
                        <th>LOGOUT BLDG</th>
                      </tr>
                    </thead>
                    <tbody id="users_data">
                      <?php
                      $i = 1;
                      while ($row = mysqli_fetch_array($sql)) {
                      ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= ucwords($row['firstname'].' '.$row['middlename'].' '.$row['lastname']) ?></td>
                        <td><?= date("F d, Y h:i A",strtotime($row['login_time'])) ?></td>
                        <td><?= ucwords($row['login_college_name']) ?></td>
                        <td><?php if($row['logout_time'] != '') { echo date("F d, Y h:i A",strtotime($row['logout_time'])); } else { echo 'On-going session'; } ?></td>
                        <td><?= ucwords($row['logout_college_name']) ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              <?php } else { ?>
                  <table id="example11" class="table table-bordered table-hover table-sm text-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>VISITOR'S NAME</th>
                        <th>DATE LOGIN</th>
                        <th>LOGIN BLDG</th>
                        <th>DATE LOGOUT</th>
                        <th>LOGOUT BLDG</th>
                      </tr>
                    </thead>
                    <tbody id="users_data">
                      <?php
                      $i = 1;
                      $sql = mysqli_query($conn, "SELECT * FROM visitors_log_history 
                            JOIN visitors ON visitors_log_history.Id=visitors.Id 
                            WHERE (YEAR(login_time) = '$yearlyDate' 
                                OR YEAR(logout_time) = '$yearlyDate')
                            ORDER BY log_Id DESC");
                      while ($row = mysqli_fetch_array($sql)) {
                      ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= ucwords($row['firstname'].' '.$row['middlename'].' '.$row['lastname']) ?></td>
                        <td><?= date("F d, Y h:i A",strtotime($row['login_time'])) ?></td>
                        <td><?= ucwords($row['login_college_name']) ?></td>
                        <td><?php if($row['logout_time'] != '') { echo date("F d, Y h:i A",strtotime($row['logout_time'])); } else { echo 'On-going session'; } ?></td>
                        <td><?= ucwords($row['logout_college_name']) ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
              <?php } ?>


              <?php
                } elseif(isset($_POST['custom'])) {
                  $StartDate = $_POST['StartDate'];
                  $EndDate   = $_POST['EndDate'];

                  // Modify the format of the selected dates if needed
                  $startDate = date('Y-m-d', strtotime($StartDate));
                  $endDate   = date('Y-m-d', strtotime($EndDate));

                  $sql = mysqli_query($conn, "SELECT * FROM visitors_log_history 
                          JOIN visitors ON visitors_log_history.Id=visitors.Id 
                          WHERE (DATE(login_time) BETWEEN '$startDate' AND '$endDate') 
                             OR (DATE(logout_time) BETWEEN '$startDate' AND '$endDate') 
                          ORDER BY log_Id DESC");
              ?>
              <?php if(mysqli_num_rows($sql) > 0) { ?>
                <button id="printButton" class="btn btn-success btn-sm float-sm-right mr-3"><i class="fa-solid fa-print"></i> Print</button>
                <div id="printElement">
                  <div class="row d-flex justify-content-center">
                    <div class="col-lg-1 col-md-1 col-sm-3">
                      <img src="../images/systemlogo.png" class="img-fluid" alt="" width="80" style="top: 5px;">
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 text-center">
                        <p class="text-sm m-0">Republic of the Philippines</p>
                        <p class="m-0"><b>President Ramon Magsaysay State University</b></p>
                        <p class="text-sm font-italic m-0">(Formerly Ramon Magsaysay Technological University)</p>
                        <p class="text-sm m-0">Iba, Zambales</p>
                    </div>
                    <!--<div class="col-lg-1 col-md-1 col-sm-3">-->
                    <!--  <img src="../images/CCIT.png" class="img-fluid" alt="" width="80" style="top: 5px;">-->
                    <!--</div>-->
                  </div>
                  <hr>
                  <p class="text-center"><b>VISITOR'S LOG HISTORY BETWEEN <?= strtoupper(date("F d, Y", strtotime($StartDate))).' - '.strtoupper(date("F d, Y", strtotime($EndDate))); ?></b></p>
                  <table id="example111" class="table table-bordered table-hover text-sm table-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>VISITOR'S NAME</th>
                        <th>DATE LOGIN</th>
                        <th>LOGIN BLDG</th>
                        <th>DATE LOGOUT</th>
                        <th>LOGOUT BLDG</th>
                      </tr>
                    </thead>
                    <tbody id="users_data">
                      <?php
                      $i = 1;
                      while ($row = mysqli_fetch_array($sql)) {
                      ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= ucwords($row['firstname'].' '.$row['middlename'].' '.$row['lastname']) ?></td>
                        <td><?= date("F d, Y h:i A",strtotime($row['login_time'])) ?></td>
                        <td><?= ucwords($row['login_college_name']) ?></td>
                        <td><?php if($row['logout_time'] != '') { echo date("F d, Y h:i A",strtotime($row['logout_time'])); } else { echo 'On-going session'; } ?></td>
                        <td><?= ucwords($row['logout_college_name']) ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              <?php } else { ?>
                  <table id="example11" class="table table-bordered table-hover table-sm text-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>VISITOR'S NAME</th>
                        <th>DATE LOGIN</th>
                        <th>LOGIN BLDG</th>
                        <th>DATE LOGOUT</th>
                        <th>LOGOUT BLDG</th>
                      </tr>
                    </thead>
                    <tbody id="users_data">
                      <?php
                      $i = 1;
                      $sql = mysqli_query($conn, "SELECT * FROM visitors_log_history 
                            JOIN visitors ON visitors_log_history.Id=visitors.Id 
                            WHERE (DATE(login_time) BETWEEN '$startDate' AND '$endDate') 
                               OR (DATE(logout_time) BETWEEN '$startDate' AND '$endDate') 
                            ORDER BY log_Id DESC");
                      while ($row = mysqli_fetch_array($sql)) {
                      ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= ucwords($row['firstname'].' '.$row['middlename'].' '.$row['lastname']) ?></td>
                        <td><?= date("F d, Y h:i A",strtotime($row['login_time'])) ?></td>
                        <td><?= ucwords($row['login_college_name']) ?></td>
                        <td><?php if($row['logout_time'] != '') { echo date("F d, Y h:i A",strtotime($row['logout_time'])); } else { echo 'On-going session'; } ?></td>
                        <td><?= ucwords($row['logout_college_name']) ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
              <?php } ?>


              <?php
                } else {
              ?>
              <table id="example11" class="table table-bordered table-hover table-sm text-sm">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>VISITOR'S NAME</th>
                    <th>DATE LOGIN</th>
                    <th>LOGIN BLDG</th>
                    <th>DATE LOGOUT</th>
                    <th>LOGOUT BLDG</th>
                  </tr>
                </thead>
                <tbody id="users_data">
                  <?php
                  $i = 1;
                  $sql = mysqli_query($conn, "SELECT * FROM visitors_log_history JOIN visitors ON visitors_log_history.Id=visitors.Id ORDER BY log_Id DESC");
                  while ($row = mysqli_fetch_array($sql)) {
                  ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= ucwords($row['firstname'].' '.$row['middlename'].' '.$row['lastname']) ?></td>
                    <td><?= date("F d, Y h:i A",strtotime($row['login_time'])) ?></td>
                    <td><?= ucwords($row['login_college_name']) ?></td>
                    <td><?php if($row['logout_time'] != '') { echo date("F d, Y h:i A",strtotime($row['logout_time'])); } else { echo 'On-going session'; } ?></td>
                    <td><?= ucwords($row['logout_college_name']) ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script src="../includes/print.js"></script> 
<?php include '../includes/footer.php';  ?>
<!-- <script>
  window.addEventListener("load", window.print());
</script> -->
<script>
 function showDateInputs() {
  var sortBy = $('#sortBy').val();
  var dateInputsContainer = $('#dateInputs');
  dateInputsContainer.empty(); // Clear previous inputs

  if (sortBy === 'daily') {
    dateInputsContainer.append('<label for="dailyDate">Date:</label>' +
      '<input type="date" class="form-control" id="dailyDate" name="dailyDate" required>');
  } else if (sortBy === 'weekly') {
    // Create a form row for horizontal layout
    dateInputsContainer.append('<div class="form-row"></div>');

    // Add start date input to the form row
    dateInputsContainer.find('.form-row').append('<div class="form-group col-md-6">' +
      '<label for="weeklyStartDate">Start Date:</label>' +
      '<input type="date" class="form-control" id="weeklyStartDate" name="weeklyStartDate" required>' +
      '</div>');

    // Add end date input to the form row
    dateInputsContainer.find('.form-row').append('<div class="form-group col-md-6">' +
      '<label for="weeklyEndDate">End Date (7th day):</label>' +
      '<input type="date" class="form-control" id="weeklyEndDate" name="weeklyEndDate" required readonly>' +
      '</div>');

    // Add an event listener to the start date input
    $('#weeklyStartDate').on('change', function () {
      // Calculate and set the value of the end date input to be the 7th day
      var startDate = new Date($(this).val());
      var endDate = new Date(startDate);
      endDate.setDate(startDate.getDate() + 6);
      
      // Format the date as 'YYYY-MM-DD' and set the value of the end date input
      var formattedEndDate = endDate.toISOString().split('T')[0];
      $('#weeklyEndDate').val(formattedEndDate);
    });
  } else if (sortBy === 'monthly') {
    // For simplicity, let's assume a fixed set of months
    dateInputsContainer.append('<label for="monthlyMonth">Month:</label>' +
      '<select class="form-control" id="monthlyMonth" name="monthlyMonth" required>' +
      '<option value="" selected disabled>Select month</option>' +
      '<option value="01">January</option>' +
      '<option value="02">February</option>' +
      '<option value="03">March</option>' +
      '<option value="04">April</option>' +
      '<option value="05">May</option>' +
      '<option value="06">June</option>' +
      '<option value="07">July</option>' +
      '<option value="08">August</option>' +
      '<option value="09">September</option>' +
      '<option value="10">October</option>' +
      '<option value="11">November</option>' +
      '<option value="12">December</option>' +
      '</select>');
  } else if (sortBy === 'yearly') {
    dateInputsContainer.append('<label for="yearly">Date:</label>' +
    '<input type="number" class="form-control" id="yearly" name="yearlyDate" required placeholder="2000" min="1000" step="1">');

      // Add an input event listener to enforce the maximum length
      $('#yearly').on('input', function() {
        if ($(this).val().length > 4) {
          $(this).val($(this).val().slice(0, 4));
        }
      });
  } else if (sortBy === 'custom') {
    // Create a form row for horizontal layout
    dateInputsContainer.append('<div class="form-row"></div>');

    // Add start date input to the form row
    dateInputsContainer.find('.form-row').append('<div class="form-group col-md-6">' +
      '<label for="StartDate">Start Date:</label>' +
      '<input type="date" class="form-control" id="StartDate" name="StartDate" required>' +
      '</div>');

    // Add end date input to the form row
    dateInputsContainer.find('.form-row').append('<div class="form-group col-md-6">' +
      '<label for="EndDate">End Date:</label>' +
      '<input type="date" class="form-control" id="EndDate" name="EndDate" required>' +
      '</div>');
  } 

  // Update the name attribute of the submit button
  var submitButton = $('#sortingForm button[type="submit"]');
  submitButton.attr('name', sortBy);
}




  // function sortRecords() {
  //   var sortBy = $('#sortBy').val();
  //   // WHATEVER VALUE IS SELECTED FROM THE DROPDOWN (DAILY, WEEKLY, MONTHLY, YEARLY, CUSTOM DATE), THAT WILL BE THE NAME OF THE SUBMIT BUTTON
  //   var sortBy = $('#sortingForm button[type="submit"]').attr('name');

  //   if (sortBy === 'daily') {
  //     var dailyDate = $('#dailyDate').val();
  //   } else if (sortBy === 'custom') {
  //     var StartDate = $('#StartDate').val();
  //     var EndDate = $('#EndDate').val();
  //   } else if (sortBy === 'monthly') {
  //     var monthlyMonth = $('#monthlyMonth').val();
  //   }
  // }
</script>