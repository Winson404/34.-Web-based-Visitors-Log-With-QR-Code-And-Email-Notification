<title>Visitor's Log System | Visitor info</title>
<?php 
    include 'navbar.php'; 
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">



<?php if($page === 'create') { ?>

    <!-- CREATION -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>New Visitor</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Visitor info</li>
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
            <form action="process_save.php" method="POST" enctype="multipart/form-data">
              <div class="card">
                <div class="card-body">
                    <div class="row text-muted">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="">First name</label>
                              <input type="text" class="form-control"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                              <label for="">Middle name</label>
                              <input type="text" class="form-control"  placeholder="Middle name" name="middlename" onkeyup="lettersOnly(this)">
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="">Last name</label>
                              <input type="text" class="form-control"  placeholder="Last name" name="lastname" required onkeyup="lettersOnly(this)">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="">Age</label>
                                <input type="number" class="form-control" placeholder="Age" required name="age" id="age-input" onchange="updateIDTypeOptions()">
                                <p id="age-error" class="text-danger text-danger text-xs font-italic"></p>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="">Address</label>
                              <textarea id="" cols="30" rows="1" class="form-control" placeholder="Address" required name="address"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="">Contact number</label>
                                <div class="input-group">
                                    <div class="input-group-text">+63</div>
                                    <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" placeholder="9123456789" name="contact" required maxlength="10" oninput="validateContact(this)">
                                </div>
                                <p id="contact-error" class="text-danger text-xs font-italic"></p>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="">Type of ID</label>
                                <select class="form-control" name="id_type" id="id_type" required>
                                    <option selected disabled value="">Select type</option>
                                    <!-- Options dynamically added based on age -->
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="">Specify type of ID</label>
                                <input type="text" class="form-control" placeholder="Specify type of ID" name="other_id_type" id="other_id_type" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                              <label for="">ID number</label>
                              <input type="text" class="form-control" placeholder="ID number" name="id_number" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="">Purpose of Visit</label>
                                <select class="form-control" name="purpose" id="purpose" required>
                                    <option selected disabled value="">Select type</option>
                                    <option value="Seminar">Seminar</option>
                                    <option value="Process documents">Process documents</option>
                                    <option value="Faculty meeting">Faculty meeting</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="">Other purpose</label>
                                <input type="text" class="form-control" placeholder="Other purpose" name="other_purpose" id="other_purpose" readonly>
                            </div>
                        </div>
                        <!-- <div class="col-12">
                          <input type="checkbox" required> Accept <a type="button" href="" data-toggle="modal" data-target="#exampleModal" style="text-decoration: none;">Terms and Privacy</a>
                        </div>   -->
                    </div>
                    <!-- END ROW -->
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="visitors.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                    <button type="submit" class="btn bg-primary" name="registration" id="submit_button"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  <!-- END CREATION -->


<?php } else { 
  $Id = $page;
  $fetch = mysqli_query($conn, "SELECT * FROM visitors WHERE Id='$Id'");
  $row = mysqli_fetch_array($fetch);
?>


  <!-- UPDATE -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3>Update Visitor</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Visitor info</li>
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
          <form action="process_update.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="Id" required value="<?php echo $row['Id']; ?>">
            <div class="card">
              <div class="card-body">
                <div class="row text-muted">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                          <label for="">First name</label>
                          <input type="text" class="form-control"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)" value="<?= $row['firstname']; ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                      <div class="form-group">
                          <label for="">Middle name</label>
                          <input type="text" class="form-control"  placeholder="Middle name" name="middlename" onkeyup="lettersOnly(this)" value="<?= $row['middlename']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                          <label for="">Last name</label>
                          <input type="text" class="form-control"  placeholder="Last name" name="lastname" required onkeyup="lettersOnly(this)" value="<?= $row['lastname']; ?>">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="">Age</label>
                            <input type="number" class="form-control" placeholder="Age" required name="age" id="age-input" value="<?= $row['age']; ?>" onchange="updateIDTypeOptions()">
                            <p id="age-error" class="text-danger text-danger text-xs font-italic"></p>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                          <label for="">Address</label>
                          <textarea id="" cols="30" rows="1" class="form-control" placeholder="Address" required name="address"><?= $row['address']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="">Contact number</label>
                            <div class="input-group">
                                <div class="input-group-text">+63</div>
                                <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" placeholder="9123456789" name="contact" required maxlength="10" oninput="validateContact(this)" value="<?= $row['contact']; ?>">
                            </div>
                            <p id="contact-error" class="text-danger text-xs font-italic"></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">

                            <label for="id_type">Type of ID</label>
                            <select class="form-control" name="id_type" id="id_type" required>
                                <option selected disabled value="">Select type</option>
                                <option value="Passport" <?php if($row['id_type'] == 'Passport') { echo 'selected'; } ?>>Passport</option>
                                <option value="UMID" <?php if($row['id_type'] == 'UMID') { echo 'selected'; } ?>>UMID</option>
                                <option value="Postal ID" <?php if($row['id_type'] == 'Postal ID') { echo 'selected'; } ?>>Postal ID</option>
                                <option value="Senior Citizen" id="seniorOption" <?php if($row['id_type'] == 'Senior Citizen') { echo 'selected'; } ?>>Senior Citizen</option>
                                <option value="SSS" <?php if($row['id_type'] == 'SSS') { echo 'selected'; } ?>>SSS</option>
                                <option value="PWD" <?php if($row['id_type'] == 'PWD') { echo 'selected'; } ?>>PWD</option>
                                <option value="PhilHealth" <?php if($row['id_type'] == 'PhilHealth') { echo 'selected'; } ?>>PhilHealth</option>
                                <option value="Others" <?php if($row['id_type'] == 'Others') { echo 'selected'; } ?>>Others</option>
                            </select>

                            <!-- <select class="form-control" name="id_type" id="id_type" required>
                                <option value="" disabled>Select type</option>
                                <?php
                                // $idTypes = ['Passport', 'UMID', 'Postal ID', 'Senior Citizen', 'SSS', 'PWD', 'PhilHealth', 'Others'];
                                // $selectedIdType = $row['id_type'];
                                // foreach ($idTypes as $idType):
                                ?>
                                    <option value="<?php //echo $idType; ?>" <?php //echo ($selectedIdType === $idType) ? 'selected' : ''; ?>><?php //echo $idType; ?></option>
                                <?php //endforeach; ?>
                            </select> -->
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="other_id_type">Specify type of ID</label>
                            <input type="text" class="form-control" placeholder="Specify type of ID" name="other_id_type" id="other_id_type" readonly value="<?= $row['other_id_type']; ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                          <label for="">ID number</label>
                          <input type="text" class="form-control" placeholder="ID number" name="id_number" required value="<?= $row['id_number']; ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="purpose">Purpose of Visit</label>
                            <select class="form-control" name="purpose" id="purpose" required>
                                <option value="" disabled>Select type</option>
                                <?php
                                $purposes = ['Seminar', 'Process documents', 'Faculty meeting', 'Others'];
                                $selectedpurpose = $row['purpose'];
                                foreach ($purposes as $purpose):
                                ?>
                                    <option value="<?php echo $purpose; ?>" <?php echo ($selectedpurpose === $purpose) ? 'selected' : ''; ?>><?php echo $purpose; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="other_purpose">Other purpose</label>
                            <input type="text" class="form-control" placeholder="Other purpose" name="other_purpose" id="other_purpose" readonly value="<?= $row['other_purpose']; ?>">
                        </div>
                    </div>                  
                    <!-- <div class="col-12">
                      <input type="checkbox" required> Accept <a type="button" href="" data-toggle="modal" data-target="#exampleModal" style="text-decoration: none;">Terms and Privacy</a>
                    </div>   -->
                </div>
                <!-- END ROW -->
              </div>
              <div class="card-footer">
                <div class="float-right">
                  <a href="visitors.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                  <button type="submit" class="btn bg-primary" name="update_visitor" id="submit_button"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- END UPDATE -->


<?php } ?>


</div>

<?php } else { include '../includes/404.php'; } ?>



<br>
<br>
<br>
<br>
<br>
<br>
<?php include '../includes/footer.php';  ?>

