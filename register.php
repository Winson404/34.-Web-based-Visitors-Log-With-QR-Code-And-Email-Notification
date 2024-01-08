<title>Visitor's Log System | Register</title>
<?php 
    include 'navbar.php'; 
    unset($_SESSION['QR_ID']);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
 
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-11 col-md-11 col-sm-12 col-12 mt-4">
            <form action="processes.php" method="POST" enctype="multipart/form-data" onsubmit="return showPrompt();" id="yourFormId">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="#" class="h4">Registration Form</a>
              </div>
                <div class="card-body">
                    <div class="row text-muted">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="">First name</label>
                              <input type="text" class="form-control"  placeholder="First name" name="firstname" id="firstname" required onkeyup="lettersOnly(this)">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                              <label for="">Middle name</label>
                              <input type="text" class="form-control"  placeholder="Middle name" name="middlename" id="middlename" onkeyup="lettersOnly(this)" >
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="">Last name</label>
                              <input type="text" class="form-control"  placeholder="Last name" name="lastname" id="lastname" required onkeyup="lettersOnly(this)">
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
                              <textarea cols="30" rows="1" class="form-control" placeholder="Address" required id="address" name="address"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="">Contact number</label>
                                <div class="input-group">
                                    <div class="input-group-text">+63</div>
                                    <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" placeholder="9123456789" name="contact" required maxlength="10" oninput="validateContact(this)" id="contact">
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
                              <input type="text" class="form-control" placeholder="ID number" name="id_number" id="id_number" required>
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
                        <div class="col-12">
                          <input type="checkbox" id="acceptCheckbox" required> Accept <a type="button" href="" data-toggle="modal" data-target="#exampleModal" style="text-decoration: none;">Terms and Privacy</a>
                        </div>  
                    </div>
                    <!-- END ROW -->
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <button type="button" class="btn bg-primary"  id="submit_button" onclick="showConfirmationModal();" disabled><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                  </div>
                </div>
            </div>
          </div>




          <!-- Bootstrap Modal -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title d-block m-auto" id="confirmationModalLabel">PRMSU Visitors Log System</h5>
                  </div>
                  <div class="modal-body" id="confirmationModalBody">
                    <!-- Dynamic content will be inserted here -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="registration"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                  </div>
                </div>
              </div>
            </div>

          </form>


        </div>
      </div>
    </div>





    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
           <div class="modal-header bg-light">
            <h5 class="modal-title" id="exampleModalLabel">Terms and Agreement</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
            </button>
          </div>
          <div class="modal-body text-justify">
            <h3>Privacy Statement</h3>
            <p>The National Privacy Commission (NPC) is committed to fully protect your personal data privacy in compliance with Republic Act No. 10173, otherwise known as the Data Privacy Act of 2012 (DPA).</p>
            <p>We shall detail the manner in which we process your personal data and provide a separate privacy notice in an appropriate format and manner whenever we collect personal data through other channels (e.g., publicly facing data processing systems implemented, notice posted at the reception area of NPC during events where participants' personal data is collected through attendance sheets or registration forms when personal data is collected according to the NPC's mandate).</p>
            <p>In all instances, we assure you that processing your personal data will strictly follow the provisions of DPA, especially the general data privacy principles of Transparency, Legitimate Purpose, and Proportionality.</p>
          </div>
          <div class="modal-footer alert-light d-flex justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>



  </div>
  <!-- /.content-wrapper -->
<br>
<br>
<br>
<br>
<br>
<?php include 'footer.php'; ?>

<script>

   function showConfirmationModal() {
    // Get form data using JavaScript
  var firstname = document.getElementById('firstname').value;
  var middlename = document.getElementById('middlename').value;
  var lastname = document.getElementById('lastname').value;
  var age = document.getElementById('age-input').value;
  var address = document.getElementById('address').value;
  var contact = document.getElementById('contact').value;
  var id_type = document.getElementById('id_type').value;
  var other_id_type = document.getElementById('other_id_type').value;
  var id_number = document.getElementById('id_number').value;
  var purpose = document.getElementById('purpose').value;
  var other_purpose = document.getElementById('other_purpose').value;

  // Check if any required field is empty
  if (
    firstname === '' ||
    lastname === '' ||
    age === '' ||
    address === '' ||
    contact === '' ||
    id_type === '' ||
    id_number === '' ||
    purpose === ''
  ) {

    // Display an alert or perform any other action to inform the user
    alert('Please fill in all required fields before submitting.');
    return false; // Prevent the form from submitting
  }

      var form = document.getElementById('yourFormId'); // replace 'yourFormId' with your actual form ID
      var modalBody = document.getElementById('confirmationModalBody');
      
      // Get form data using JavaScript
      var firstname = document.getElementById('firstname').value;
      var middlename = document.getElementById('middlename').value;
      var lastname = document.getElementById('lastname').value;
      var age = document.getElementById('age-input').value;
      var address = document.getElementById('address').value;
      var contact = document.getElementById('contact').value;
      var id_type = document.getElementById('id_type').value;
      var other_id_type = document.getElementById('other_id_type').value;
      var id_number = document.getElementById('id_number').value;
      var purpose = document.getElementById('purpose').value;
      var other_purpose = document.getElementById('other_purpose').value;

      // Set modal content
      modalBody.innerHTML = `
        <p><strong>Firstname:</strong> ${firstname}</p>
        <p><strong>Middlename:</strong> ${middlename}</p>
        <p><strong>Lastname:</strong> ${lastname}</p>
        <p><strong>Age:</strong> ${age}</p>
        <p><strong>Address:</strong> ${address}</p>
        <p><strong>Contact:</strong> ${contact}</p>
        <p><strong>ID Type:</strong> ${id_type}</p>
        <p><strong>Other ID Type:</strong> ${other_id_type}</p>
        <p><strong>ID Number:</strong> ${id_number}</p>
        <p><strong>Purpose:</strong> ${purpose}</p>
        <p><strong>Other Purpose:</strong> ${other_purpose}</p>
      `;

      // Show the Bootstrap modal
      $('#confirmationModal').modal('show');

      // Return false to prevent the form from submitting
      return false;
    }



    function updateIDTypeOptions() {
        var age = document.getElementById('age-input').value;
        var idTypeSelect = document.getElementById('id_type');
        idTypeSelect.innerHTML = ''; // Clear existing options

        if (age <= 17) {
            addOption(idTypeSelect, 'School ID');
            addOption(idTypeSelect, 'National ID');
            addOption(idTypeSelect, 'Passport');
            addOption(idTypeSelect, 'PWD');
            addOption(idTypeSelect, 'Others');
        } else if (age >= 18 && age <= 59) {
            addOption(idTypeSelect, 'School ID');
            addOption(idTypeSelect, 'National ID');
            addOption(idTypeSelect, 'Passport');
            addOption(idTypeSelect, 'PWD');
            addOption(idTypeSelect, 'SSS');
            addOption(idTypeSelect, 'PhilHealth');
            addOption(idTypeSelect, 'UMID');
            addOption(idTypeSelect, 'Postal ID');
            addOption(idTypeSelect, 'Others');
        } else {
            addOption(idTypeSelect, 'National ID');
            addOption(idTypeSelect, 'Passport');
            addOption(idTypeSelect, 'PWD');
            addOption(idTypeSelect, 'SSS');
            addOption(idTypeSelect, 'PhilHealth');
            addOption(idTypeSelect, 'UMID');
            addOption(idTypeSelect, 'Postal ID');
            addOption(idTypeSelect, 'Senior Citizen');
            addOption(idTypeSelect, 'Others');
        }
    }

    function addOption(selectElement, optionText) {
        var option = document.createElement('option');
        option.text = optionText;
        selectElement.add(option);
    }

    $(document).ready(function () {



        $('#id_type').change(function () {
            var otherIdInput = $('#other_id_type');
            if ($(this).val() === 'Others') {
                otherIdInput.removeAttr('readonly').attr('required', 'required');
            } else {
                otherIdInput.attr('readonly', 'readonly').removeAttr('required');
            }
        });

        $('#purpose').change(function () {
            var otherPurposeInput = $('#other_purpose');
            if ($(this).val() === 'Others') {
                otherPurposeInput.removeAttr('readonly').attr('required', 'required');
            } else {
                otherPurposeInput.attr('readonly', 'readonly').removeAttr('required');
            }
        });

        // FORMAT CONTACT NUMBER
        $('input[name="contact"]').on('input', function() {
            const pattern = /^[7-9]{1}[0-9]{9}$/;
            const contactError = $('#contact-error');
            const submitButton = $('#submit_button');

            if (!pattern.test($(this).val())) {
                contactError.text('Please follow the format: 9123456789');
                $("#submit_button").disabled = true;
                submitButton.prop('disabled', true);
            } else {
                contactError.text('');
                submitButton.prop('disabled', false);
            }
        });


        // VALIDATE AGE INPUT
        $('#age-input').on('input', function() {
            const value = parseInt($(this).val());
            const submitButton = $('#submit_button');

            if (isNaN(value) || !Number.isInteger(value)) {
                $('#age-error').text('Invalid input');
                $(this).get(0).setCustomValidity('Invalid input');
                submitButton.prop('disabled', true);
            } else {
                $('#age-error').text('');
                $(this).get(0).setCustomValidity('');
                submitButton.prop('disabled', false);
            }
        });

    });

    // Add an event listener to the checkbox
    document.getElementById('acceptCheckbox').addEventListener('change', function() {
        // Get the submit button
        var submitButton = document.getElementById('submit_button');

        // Update the disabled property based on the checkbox's checked status
        submitButton.disabled = !this.checked;
    });
</script>