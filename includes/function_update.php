<?php 

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	// 	require '../../vendor/PHPMailer/src/Exception.php';
	//  require '../../vendor/PHPMailer/src/PHPMailer.php';
	//  require '../../vendor/PHPMailer/src/SMTP.php';
	if (!class_exists('PHPMailer\PHPMailer\Exception')) { require __DIR__ . '/../vendor/phpmailer/src/Exception.php'; }
	if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) { require __DIR__ . '/../vendor/phpmailer/src/PHPMailer.php'; }
	if (!class_exists('PHPMailer\PHPMailer\SMTP')) { require __DIR__ . '/../vendor/phpmailer/src/SMTP.php'; }

	
	function updateSystemUser($conn, $user_Id, $page) {
		$college_name     = mysqli_real_escape_string($conn, $_POST['college_name']);
   		$firstname        = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename       = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname         = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix           = mysqli_real_escape_string($conn, $_POST['suffix']);
		$dob              = mysqli_real_escape_string($conn, $_POST['dob']);
		$age              = mysqli_real_escape_string($conn, $_POST['age']);
		$birthplace       = mysqli_real_escape_string($conn, $_POST['birthplace']);
		$gender           = mysqli_real_escape_string($conn, $_POST['gender']);
		$civilstatus      = mysqli_real_escape_string($conn, $_POST['civilstatus']);
		$occupation       = mysqli_real_escape_string($conn, $_POST['occupation']);
		$religion		  = mysqli_real_escape_string($conn, $_POST['religion']);
		$email		      = mysqli_real_escape_string($conn, $_POST['email']);
		$contact		  = mysqli_real_escape_string($conn, $_POST['contact']);
		$house_no         = mysqli_real_escape_string($conn, $_POST['house_no']);
		$street_name      = mysqli_real_escape_string($conn, $_POST['street_name']);
		$purok            = mysqli_real_escape_string($conn, $_POST['purok']);
		$zone             = mysqli_real_escape_string($conn, $_POST['zone']);
		$barangay         = mysqli_real_escape_string($conn, $_POST['barangay']);
		$municipality     = mysqli_real_escape_string($conn, $_POST['municipality']);
		$province         = mysqli_real_escape_string($conn, $_POST['province']);
		$region           = mysqli_real_escape_string($conn, $_POST['region']);
		$file             = basename($_FILES["fileToUpload"]["name"]);

		$check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND user_Id !='$user_Id'");
		if(mysqli_num_rows($check_email) > 0) {
	       displayErrorMessage("Email already exists.", $page);
		} else {
			if(empty($file)) {
				$update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', dob='$dob', age='$age', email='$email', contact='$contact', birthplace='$birthplace', gender='$gender', civilstatus='$civilstatus', occupation='$occupation', religion='$religion', house_no='$house_no', street_name='$street_name', purok='$purok', zone='$zone', barangay='$barangay', municipality='$municipality', province='$province', region='$region', college_name='$college_name' WHERE user_Id='$user_Id' ");
				displayUpdateMessage($update, "Record has been updated.", $page);
			} else {
				// Check if image file is a actual image or fake image
				$target_dir = "../images-users/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check == false) {
				    displayErrorMessage("File is not an image.", $page);
					$uploadOk = 0;
				} 

				// Check file size // 500KB max size
				elseif ($_FILES["fileToUpload"]["size"] > 3000000) {
				    displayErrorMessage("File must be up to 500KB in size.", $page);
					$uploadOk = 0;
				}

				// Allow certain file formats
				elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				    displayErrorMessage("Only JPG, JPEG, PNG & GIF files are allowed.", $page);
				    $uploadOk = 0;
				}

				// Check if $uploadOk is set to 0 by an error
				elseif ($uploadOk == 0) {
					displayErrorMessage("Your file was not uploaded.", $page);
				// if everything is ok, try to upload file
				} else {

					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

					 $update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', dob='$dob', age='$age', email='$email', contact='$contact', birthplace='$birthplace', gender='$gender', civilstatus='$civilstatus', occupation='$occupation', religion='$religion', house_no='$house_no', street_name='$street_name', purok='$purok', zone='$zone', barangay='$barangay', municipality='$municipality', province='$province', region='$region', college_name='$college_name', image='$file' WHERE user_Id='$user_Id' ");
              	     displayUpdateMessage($update, "Record has been updated.", $page);
					} else {
	    	            displayErrorMessage("There was an error uploading your profile picture.", $page);
					}
				}
			}
		}
	}



	// SAVE SYSTEM USERS - ADMIN/ADMIN_MGMT.PHP || ADMIN/USERS_MGMT.PHP
	function updateVisitor($conn, $Id, $page) {
		$firstname        = mysqli_real_escape_string($conn, ucwords($_POST['firstname']));
		$middlename       = mysqli_real_escape_string($conn, ucwords($_POST['middlename']));
		$lastname         = mysqli_real_escape_string($conn, ucwords($_POST['lastname']));
		$age              = mysqli_real_escape_string($conn, $_POST['age']);
		$address          = mysqli_real_escape_string($conn, ucwords($_POST['address']));
		$contact		  = mysqli_real_escape_string($conn, $_POST['contact']);
		$id_type          = mysqli_real_escape_string($conn, $_POST['id_type']);
		$other_id_type    = mysqli_real_escape_string($conn, ucwords($_POST['other_id_type']));
		$id_number		  = mysqli_real_escape_string($conn, $_POST['id_number']);
		$purpose		  = mysqli_real_escape_string($conn, $_POST['purpose']);
		$other_purpose    = mysqli_real_escape_string($conn, ucwords($_POST['other_purpose']));
	   
    	$check2 = mysqli_query($conn, "SELECT * FROM visitors WHERE id_type='$id_type' AND Id !='$Id'");
	    if (mysqli_num_rows($check2) > 0) {
	    	$check3 = mysqli_query($conn, "SELECT * FROM visitors WHERE id_number='$id_number' AND Id !='$Id'");
		    if (mysqli_num_rows($check3) > 0) {
		        displayErrorMessage("ID number with the same type of ID already exists.", $page);
		    } else {
		    	$update = mysqli_query($conn, "UPDATE visitors SET firstname='$firstname', middlename='$middlename', lastname='$lastname', age='$age', address='$address', contact='$contact', id_type='$id_type', other_id_type='$other_id_type', id_number='$id_number', purpose='$purpose', other_purpose='$other_purpose' WHERE Id='$Id' ");
	        	displayUpdateMessage($update, "Record has been updated.", $page);
	 		}
	    } else {
	    	$update = mysqli_query($conn, "UPDATE visitors SET firstname='$firstname', middlename='$middlename', lastname='$lastname', age='$age', address='$address', contact='$contact', id_type='$id_type', other_id_type='$other_id_type', id_number='$id_number', purpose='$purpose', other_purpose='$other_purpose' WHERE Id='$Id' ");
        	displayUpdateMessage($update, "Record has been updated.", $page);
 		}
	}






	// CHANGE ADMIN PASSWORD - ADMIN/ADMIN_DELETE.PHP
	function changePassword($conn, $user_Id, $OldPassword, $password, $cpassword, $page) {

	    $check_old_password = mysqli_query($conn, "SELECT * FROM users WHERE password='$OldPassword' AND user_Id='$user_Id'");

	    if (mysqli_num_rows($check_old_password) === 1) {
	        if ($password != $cpassword) {
	            displayErrorMessage("Password did not match.", $page);
	        } else {
	            $update = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id'");
	            displayUpdateMessage($update, "Password has been changed.", $page);
	        }
	    } else {
	    	displayErrorMessage("Old password is incorrect.", $page);
	    }
	}




	// UPDATE ADMIN PROFILE - ADMIN/PROFILE.PHP || || USER/PROFILE.PHP
	function updateProfileAdmin($conn, $user_Id, $page) {
	    $file = basename($_FILES["fileToUpload"]["name"]);
	    $target_dir = "../images-users/";
	    $target_file = $target_dir . $file;
	    $uploadOk = 1;
	    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if ($check === false) {
	        displayErrorMessage("Selected file is not an image.", $page);
	    }

	    if ($_FILES["fileToUpload"]["size"] > 3000000) {
	        displayErrorMessage("File must be up to 500KB in size.", $page);
	    }

	    if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
	        displayErrorMessage("Only JPG, JPEG, PNG & GIF files are allowed.", $page);
	    }

	    if ($_FILES["fileToUpload"]["error"] != 0) {
	        displayErrorMessage("Your file was not uploaded.", $page);
	    }

	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        $update = mysqli_query($conn, "UPDATE users SET image='$file' WHERE user_Id='$user_Id'");
	        displayUpdateMessage($update, "Profile picture has been updated!", $page);
	    } else {
	        displayErrorMessage("There was an error uploading your file.", $page);
	    }
	}




	// UPDATE ADMIN INFO - ADMIN/PROFILE.PHP || USER/PROFILE.PHP
	function updateProfileInfo($conn, $user_Id, $page) {
		$firstname        = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename       = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname         = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix           = mysqli_real_escape_string($conn, $_POST['suffix']);
		$dob              = mysqli_real_escape_string($conn, $_POST['dob']);
		$age              = mysqli_real_escape_string($conn, $_POST['age']);
		$birthplace       = mysqli_real_escape_string($conn, $_POST['birthplace']);
		$gender           = mysqli_real_escape_string($conn, $_POST['gender']);
		$civilstatus      = mysqli_real_escape_string($conn, $_POST['civilstatus']);
		$occupation       = mysqli_real_escape_string($conn, $_POST['occupation']);
		$religion		  = mysqli_real_escape_string($conn, $_POST['religion']);
		$email		      = mysqli_real_escape_string($conn, $_POST['email']);
		$contact		  = mysqli_real_escape_string($conn, $_POST['contact']);
		$house_no         = mysqli_real_escape_string($conn, $_POST['house_no']);
		$street_name      = mysqli_real_escape_string($conn, $_POST['street_name']);
		$purok            = mysqli_real_escape_string($conn, $_POST['purok']);
		$zone             = mysqli_real_escape_string($conn, $_POST['zone']);
		$barangay         = mysqli_real_escape_string($conn, $_POST['barangay']);
		$municipality     = mysqli_real_escape_string($conn, $_POST['municipality']);
		$province         = mysqli_real_escape_string($conn, $_POST['province']);
		$region           = mysqli_real_escape_string($conn, $_POST['region']);

	    $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND user_Id !='$user_Id' ");
		if(mysqli_num_rows($check_email) > 0 ) {
		   $_SESSION['message'] = "";
	       displayErrorMessage("Email already exists!", $page);
		} else {
		  $update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', dob='$dob', age='$age', email='$email', contact='$contact', birthplace='$birthplace', gender='$gender', civilstatus='$civilstatus', occupation='$occupation', religion='$religion', house_no='$house_no', street_name='$street_name', purok='$purok', zone='$zone', barangay='$barangay', municipality='$municipality', province='$province', region='$region' WHERE user_Id='$user_Id' ");

      	  displayUpdateMessage($update, "Record has been updated", $page);
		}
	}


?>



