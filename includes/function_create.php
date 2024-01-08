<?php 
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	// 	require '../../vendor/PHPMailer/src/Exception.php';
	//  require '../../vendor/PHPMailer/src/PHPMailer.php';
	//  require '../../vendor/PHPMailer/src/SMTP.php';
	if (!class_exists('PHPMailer\PHPMailer\Exception')) { require __DIR__ . '/../vendor/phpmailer/src/Exception.php'; }
	if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) { require __DIR__ . '/../vendor/phpmailer/src/PHPMailer.php'; }
	if (!class_exists('PHPMailer\PHPMailer\SMTP')) { require __DIR__ . '/../vendor/phpmailer/src/SMTP.php'; }



	
	// SAVE SYSTEM USERS - ADMIN/ADMIN_MGMT.PHP || ADMIN/USERS_MGMT.PHP
	function saveVisitor($conn, $page, $qr_image_path, $college_name) {
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
		
		// SAVING QR CODES**********************************************************************
		$qr_id = uniqid('', true);
		// Generate the QR code image filename (with path)
		$path = $qr_image_path;
		$qr_image_filename = $qr_id . ".png";
		$qr_image = $path . $qr_image_filename;
		// Save the QR code image
		QRcode::png($qr_id, $qr_image, 'L', 10, 10);
	    // *************************************************************************************
	    $date_today = date('Y-m-d');

	    $check1 = mysqli_query($conn, "SELECT * FROM visitors WHERE qr_id='$qr_id'");
	    if (mysqli_num_rows($check1) > 0) {
	        displayErrorMessage("QR ID already exists.", $page);
	    } else {
	    	$check2 = mysqli_query($conn, "SELECT * FROM visitors WHERE id_type='$id_type'");
		    if (mysqli_num_rows($check2) > 0) {
		    	// $check3 = mysqli_query($conn, "SELECT * FROM visitors WHERE id_number='$id_number'");
			    // if (mysqli_num_rows($check3) > 0) {
			    //     displayErrorMessage("ID number with the same type of ID already exists.", $page);
			    // } else {
			    	$save = mysqli_query($conn, "INSERT INTO visitors (qr_id, firstname, middlename, lastname, age, address, contact, id_type, other_id_type, id_number, purpose, other_purpose, qr_image, college_name, date_registered) VALUES ('$qr_id', '$firstname', '$middlename', '$lastname', '$age', '$address', '$contact', '$id_type', '$other_id_type', '$id_number', '$purpose', '$other_purpose', '$qr_image_filename', '$college_name', '$date_today')");
		        	// displaySaveMessage($save, $page);
		        	
		      //  	session_start();
		      //  	$_SESSION['QR_ID'] = $qr_id;
		        	if ($save) {
		        	    session_start();
		        		$_SESSION['QR_ID'] = $qr_id;
						$_SESSION['message'] = "New record has been added.";
						$_SESSION['text'] = "Saved successfully!";
						$_SESSION['status'] = "success";
						header("Location: $page");
						exit();
					} else {
						$_SESSION['message'] = "Error.";
						$_SESSION['text'] = "Please try again.";
						$_SESSION['status'] = "error";
						header("Location: $page");
						exit();
					}
		 		// }
		    } else {
		    	$save = mysqli_query($conn, "INSERT INTO visitors (qr_id, firstname, middlename, lastname, age, address, contact, id_type, other_id_type, id_number, purpose, other_purpose, qr_image, college_name, date_registered) VALUES ('$qr_id', '$firstname', '$middlename', '$lastname', '$age', '$address', '$contact', '$id_type', '$other_id_type', '$id_number', '$purpose', '$other_purpose', '$qr_image_filename', '$college_name', '$date_today')");
	        	displaySaveMessage($save, $page);
	 		}
	    }
	}




	// SAVE SYSTEM USERS - ADMIN/ADMIN_MGMT.PHP || ADMIN/USERS_MGMT.PHP
	function saveUser($conn, $page, $path = "../images-users/") {
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
		$password         = md5($_POST['password']);
		$file             = basename($_FILES["fileToUpload"]["name"]);

	    $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
	    if (mysqli_num_rows($check_email) > 0) {
	        displayErrorMessage("Email already exists!", $page);
	    } else {
	        $target_dir = $path;
	        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	        $uploadOk = 1;
	        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	        if ($check == false) {
	            displayErrorMessage("File is not an image.", $page);
	            $uploadOk = 0;
	        } elseif ($_FILES["fileToUpload"]["size"] > 3000000) {
	            displayErrorMessage("File must be up to 500KB in size.", $page);
	            $uploadOk = 0;
	        } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
	            displayErrorMessage("Only JPG, JPEG, PNG & GIF files are allowed.", $page);
	            $uploadOk = 0;
	        } elseif ($uploadOk == 0) {
	            displayErrorMessage("Your file was not uploaded.", $page);
	        } else {
	            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	            	$save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, dob, age, email, contact, birthplace, gender, civilstatus, occupation, religion, house_no, street_name, purok, zone, barangay, municipality, province, region, image, password, college_name, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$dob', '$age', '$email', '$contact', '$birthplace', '$gender', '$civilstatus', '$occupation', '$religion', '$house_no', '$street_name', '$purok', '$zone', '$barangay', '$municipality', '$province', '$region', '$file', '$password', '$college_name', NOW())");
	            	displaySaveMessage($save, $page);
	            } else {
	            	displayErrorMessage("There was an error uploading your profile picture.", $page); 
	            }
	        }
	    }
	}



	// SAVE ACTIVITY - ADMIN/ANNOUNCEMENT_ADD.PHP
	function saveActivity($conn, $page, $activity, $actDate) {
		$date_acquired = date('Y-m-d h:i A');
		$save = mysqli_query($conn, "INSERT INTO announcement (actName, actDate, date_added) VALUES ('$activity', '$actDate', '$date_acquired')");
		displaySaveMessage($save, $page);
	}



	// CONTACT EMAIL MESSAGING
	function sendEmail($subject, $message, $recipientEmail, $page) {
	    $mail = new PHPMailer(true);
	    try {
	        // Server settings
	        $mail->isSMTP();
	        $mail->Host = 'smtp.gmail.com';
	        $mail->SMTPAuth = true;
	        $mail->Username = 'tatakmedellin@gmail.com';
	        $mail->Password = 'nzctaagwhqlcgbqq';
	        $mail->SMTPOptions = array(
	            'ssl' => array(
	                'verify_peer' => false,
	                'verify_peer_name' => false,
	                'allow_self_signed' => true
	            )
	        );
	        $mail->SMTPSecure = 'ssl';
	        $mail->Port = 465;

	        // Send Email
	        $mail->setFrom('tatakmedellin@gmail.com');

	        // Recipients
	        $mail->addAddress($recipientEmail);
	        $mail->addReplyTo('tatakmedellin@gmail.com');

	        // Content
	        $mail->isHTML(true);
	        $mail->Subject = $subject;
	        $mail->Body = $message;

	        $mail->send();

	        $_SESSION['success'] = "Email sent successfully!";
			$_SESSION['text'] = "Saved successfully!";
			$_SESSION['status'] = "success";
			header("Location: $page");

	    } catch (Exception $e) {
	        $_SESSION['success'] = "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
	        header("Location: $page");
	    }
	}


?>



