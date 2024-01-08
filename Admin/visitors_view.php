<title>Visitor's Log System| Visitor's profile</title>
<?php 
    include 'navbar.php';

    if(isset($_GET['Id'])) {
    $Id = $_GET['Id'];
    $fetch = mysqli_query($conn, "SELECT * FROM visitors WHERE Id='$Id'");
    $row = mysqli_fetch_array($fetch);
  ?>
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Visitor's profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Visitor's profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../images-QR Code/<?= $row['qr_image']; ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $row['firstname'].' '.$row['middlename'].' '.$row['lastname']; ?></h3>

                <p class="text-muted text-center">Visitor</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Presented ID:</b> <a class="float-right"><?= $row['id_type']; ?></a>
                  </li>
                  <?php if($row['id_type'] == 'Others'): ?>
                  <li class="list-group-item">
                    <b>Specified ID:</b> <a class="float-right"><?= $row['other_id_type']; ?></a>
                  </li>
                  <?php endif; ?>
                  <li class="list-group-item">
                    <b>ID Number</b> <a class="float-right"><?= $row['id_number']; ?></a>
                  </li>
                </ul>
                <a href="../images-QR Code/<?php echo $row['qr_image']; ?>" type="button" class="btn btn-primary btn-block" download><i class="fa-solid fa-download"></i> Download QR Code</a>
              </div>
            </div>

          </div>

          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#aboutMe" data-toggle="tab">Visitor's info</a></li>
                  <li class="nav-item"><a class="nav-link" href="#purpose" data-toggle="tab">Purpose of visitation</a></li>
                  <li class="nav-item"><a class="nav-link" href="#QR" data-toggle="tab">QR ID</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="aboutMe">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Address" value="<?= $row['address']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputAge" class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputAge" placeholder="Age" value="<?= $row['age']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputContact" class="col-sm-2 col-form-label">Contact</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputContact" placeholder="Contact" value="<?= '+63 '.$row['address']; ?>" readonly>
                        </div>
                      </div>
                  </div>

                  <div class="tab-pane" id="purpose">
                    <div class="post">
                      <p><?php if($row['purpose'] == 'Others') { echo $row['other_purpose']; } else { echo $row['purpose']; } ?></p>
                    </div>
                    <div class="post clearfix">
                      <span class="description">Date registered: <?= date("F d, Y", strtotime($row['date_registered'])); ?></span>
                    </div>
                  </div>

                  <div class="tab-pane" id="QR">
                      <div class="post">
                          <p><?= $row['qr_id']; ?></p>
                          <button class="btn btn-primary" id="copy-qr-id">
                              <i class="fas fa-copy"></i> Copy QR ID
                          </button>
                      </div>
                      <div class="alert alert-success mt-3" id="copy-success-message" style="display: none;">
                          QR ID copied successfully.
                      </div>
                  </div>
<script>
    // Initialize Clipboard.js
    new ClipboardJS('#copy-qr-id', {
        text: function () {
            return "<?= $row['qr_id']; ?>";
        }
    }).on('success', function (e) {
        // Show the success message
        $('#copy-success-message').fadeIn('fast');

        // Automatically hide the success message after a few seconds
        setTimeout(function () {
            $('#copy-success-message').fadeOut('fast');
        }, 3000); // Adjust the duration as needed (e.g., 3000 milliseconds = 3 seconds)
    });

    // Show a tooltip when the text is copied
    $('#copy-qr-id').tooltip({
        trigger: 'click',
        placement: 'bottom'
    }).on('mouseleave', function () {
        // Automatically hide the tooltip after copying
        $(this).tooltip('hide');
    });
</script>



                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 
  </div>
  <?php } else { include '../includes/404.php'; } ?>
<?php include '../includes/footer.php';  ?>

