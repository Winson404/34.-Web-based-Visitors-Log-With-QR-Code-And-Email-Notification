<title>Visitor's Log System | Visitor records</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Visitors</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Visitor records</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <a href="visitors_mgmt.php?page=create" class="btn btn-sm bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> New visitor</a>

                <div class="card-tools mr-1 mt-3">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-3">

                  <form method="POST" action="export.php">
                      <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                              <div class="input-group">
                                  <div class="input-group-append">
                                      <div class="input-group-text">
                                          <i class="fa-solid fa-filter"></i>
                                      </div>
                                  </div>
                                  <select id="registration-filter" class="form-control form-control-sm small" name="registration" required>
                                      <option selected value="All">Sort by registration</option>
                                      <option value="Registrations Today">Registrations Today</option>
                                      <option value="Registrations in the Last 7 Days">Registrations in the Last 7 Days</option>
                                      <option value="Registrations in the Last 30 Days">Registrations in the Last 30 Days</option>
                                  </select>
                                  <button type="submit" name="filter-registration" class="ml-2 btn btn-success btn-sm float-right"><i class="fa-solid fa-file-excel"></i> Export</button>
                                  <button type="button" class="ml-2 btn btn-primary btn-sm float-right" onclick=location=URL><i class="fa-solid fa-arrows-rotate"></i> Refresh</button>
                              </div>
                          </div>
                      </div>
                  </form>

                 <table id="example11" class="table table-bordered table-hover text-sm">
                  <thead>
                  <tr> 
                    <th>QR IMAGES</th>
                    <th>NAME</th>
                    <th>TYPE OF ID</th>
                    <th>ID NUMBER</th>
                    <th>DATE REGISTERED</th>
                    <th>TOOLS</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM visitors");
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                    <tr>
                        <td class="text-center text-xs">
                            <a href="" data-toggle="modal" data-target="#viewphoto<?php echo $row['Id']; ?>">
                              <img src="../images-QR Code/<?php echo $row['qr_image']; ?>" alt="" width="25" height="25" class="img-circle d-block m-auto">View image
                            </a>
                        </td>
                        <td><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname']; ?></td>
                        <td><?php if($row['id_type'] != 'Others') { echo $row['id_type']; } else { echo $row['other_id_type']; } ?></td>
                        <td class="text-primary"><?php echo $row['id_number']; ?></td>
                        <td><?php echo date("F d, Y", strtotime($row['date_registered'])); ?></td>
                        <td>
                          <a class="btn btn-primary btn-xs ml-1" href="visitors_view.php?Id=<?php echo $row['Id']; ?>"><i class="fas fa-folder"></i> View</a>
                          <!--<a class="btn btn-info btn-xs ml-1" href="visitors_mgmt.php?page=<?php //echo $row['Id']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a>-->
                          <!--<button type="button" class="btn bg-danger btn-xs ml-1" data-toggle="modal" data-target="#delete<?php //echo $row['Id']; ?>"><i class="fas fa-trash"></i> Delete</button>-->
                        </td> 
                    </tr>

                    <?php include 'visitors_delete.php'; } ?>
                     

                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include '../includes/footer.php';  ?>
<!-- <script>
  window.addEventListener("load", window.print());
</script> -->
<script>
  $(document).ready(function () {
    // Add an event listener to the filter select box.
    $('#registration-filter').on('change', function () {
        var selectedFilter = $(this).val();

        // Send an AJAX request to ajax_filter.php with the selected filter value.
        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            data: { filter: selectedFilter },
            dataType: 'json',
            success: function (data) {
                // Clear the existing table rows.
                $('#users_data').empty();

                // Append the filtered table rows to the table body.
                $.each(data, function (index, row) {
                    // Create table rows dynamically and append them to the table body.
                    var newRow = '<tr>' +
                        '<td class="text-center text-xs"><a href="" data-toggle="modal" data-target="#viewphoto' + row['Id'] + '"><img src="../images-QR Code/'+ row['qr_image'] +'" alt="" width="25" height="25" class="img-circle d-block m-auto"> View image</a></td>' +
                        '<td>' + row['firstname'] + ' ' + row['middlename'] + ' ' + row['lastname'] + '</td>' +
                        '<td>' + (row['id_type'] != 'Others' ? row['id_type'] : row['other_id_type']) + '</td>' +
                        '<td class="text-primary">' + row['id_number'] + '</td>' +
                        '<td>' + row['date_registered'] + '</td>' +
                        '<td>' +
                        '<a class="btn btn-primary btn-sm" href="visitors_view.php?Id=' + row['Id'] + '"><i class="fas fa-folder"></i> View</a>' +
                        // '<a class="btn btn-info btn-sm" href="visitors_mgmt.php?page=' + row['Id'] + '"><i class="fas fa-pencil-alt"></i> Edit</a>' +
                        // '<button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete' + row['Id'] + '"><i class="fas fa-trash"></i> Delete</button>' +
                        '</td>' +
                        '</tr>';

                    $('#users_data').append(newRow);
                });
            }
        });
    });
});

</script>