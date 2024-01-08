<?php 
	include '../config.php';
	include('../phpqrcode/qrlib.php');
	include '../includes/function_create.php';
	

	// SAVE ADMIN - ADMIN_MGMT.PHP
	if (isset($_POST['create_admin'])) {
	    $path = "../images-users/";
	    saveUser($conn, "admin_mgmt.php?page=create", $path);
	}


	// REGISTER USER - VISITORS_MGMT.PHP 
	if (isset($_POST['registration'])) {
		saveVisitor($conn, "visitors_mgmt.php?page=create", "../images-QR Code/", $college_name='N/A - Added by Superadmin');
	}


	// SAVE ACTIVITY - ANNOUNCEMENT_ADD.PHP
	if (isset($_POST['create_activity'])) {
		$activity = mysqli_real_escape_string($conn, $_POST['activity']);
		$actDate  = mysqli_real_escape_string($conn, $_POST['actDate']);
		saveActivity($conn, "announcement.php", $activity, $actDate);
	}

	
?>



