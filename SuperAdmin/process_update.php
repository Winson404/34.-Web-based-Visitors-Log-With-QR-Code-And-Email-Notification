<?php 
	include '../config.php';
	include '../includes/function_update.php';

		
	// UPDATE ADMIN - ADMIN_MGMT.PHP
	if(isset($_POST['update_admin'])) {
		$user_Id		  = mysqli_real_escape_string($conn, $_POST['user_Id']);
		updateSystemUser($conn, $user_Id, "admin_mgmt.php?page=".$user_Id."");
	}




	// CHANGE ADMIN PASSWORD - ADMIN_DELETE.PHP
	if (isset($_POST['password_admin'])) {
	    $user_Id     = $_POST['user_Id'];
	    $OldPassword = md5($_POST['OldPassword']);
	    $password    = md5($_POST['password']);
	    $cpassword   = md5($_POST['cpassword']);
	    changePassword($conn, $user_Id, $OldPassword, $password, $cpassword, "admin.php");
	}




	// UPDATE USER - USERS_MGMT.PHP
	if(isset($_POST['update_user'])) {
		$user_Id		  = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$user_type		  = "User";
		updateSystemUser($conn, $user_Id, $user_type, "visitors_mgmt.php?page=".$user_Id);
	}
    



	// CHANGE USERS PASSWORD - USERS_DELETE.PHP
	if (isset($_POST['password_user'])) {
	    $user_Id     = $_POST['user_Id'];
	    $OldPassword = md5($_POST['OldPassword']);
	    $password    = md5($_POST['password']);
	    $cpassword   = md5($_POST['cpassword']);
	    changePassword($conn, $user_Id, $OldPassword, $password, $cpassword, "users.php");
	}




	// UPDATE ADMIN INFO - PROFILE.PHP
	if (isset($_POST['update_profile_info'])) {
	    $user_Id = mysqli_real_escape_string($conn, $_POST['user_Id']);
	    updateProfileInfo($conn, $user_Id, "profile.php");
	}




	// CHANGE USERS PASSWORD - USERS_DELETE.PHP
	if (isset($_POST['update_password_admin'])) {
	    $user_Id     = $_POST['user_Id'];
	    $OldPassword = md5($_POST['OldPassword']);
	    $password    = md5($_POST['password']);
	    $cpassword   = md5($_POST['cpassword']);
	    changePassword($conn, $user_Id, $OldPassword, $password, $cpassword, "profile.php");
	}

		


	// UPDATE ADMIN PROFILE - PROFILE.PHP
	if (isset($_POST['update_profile_admin'])) {
	    $user_Id = $_POST['user_Id'];
	    updateProfileAdmin($conn, $user_Id, "profile.php");
	}





	// UPDATE ACTIVITIY - ACTIVITY_UPDATE_DELETE.PHP
	if(isset($_POST['update_activity'])) {
		$actId 			= $_POST['actId'];
		$activity       = $_POST['activity'];
		$actDate        = $_POST['actDate'];
		$date_acquired  = date('Y-m-d');
		$update = mysqli_query($conn, "UPDATE announcement SET actName='$activity', actDate='$actDate' WHERE actId='$actId'");
		displayUpdateMessage($update, "Announcement has been updated.", "announcement.php");
	}





	// UPDATE VISITORS - VISITORS_MGMT.PHP
	if(isset($_POST['update_visitor'])) {
		$Id = mysqli_real_escape_string($conn, $_POST['Id']);
		updateVisitor($conn, $Id, "visitors_mgmt.php?page=".$Id);
	}







?>
