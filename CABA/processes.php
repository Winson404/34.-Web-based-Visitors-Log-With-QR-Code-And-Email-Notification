<?php 

	include '../config.php';
	$college_name = 'CABA';
	// ********************* SINGLE LOGIN AND LOGOUT ******************************//
	
	function login_error() {
		$_SESSION['message'] = "Unknown error occurs.";
		$_SESSION['text'] = "Please try again.";
		$_SESSION['status'] = "error";
		header("Location: index.php");
		exit();
	}




	// ********************* UNLIMITED LOGIN AND LOGOUT ******************************//
	// QR CODE SCANNING - SCANQRCODE.PHP
	if(isset($_POST['visitorsQR'])) {
		$visitorsQR  = $_POST['visitorsQR'];

		$log = date("Y-m-d H:i:s");
		$check = mysqli_query($conn, "SELECT * FROM visitors WHERE qr_id='$visitorsQR'");
		if(mysqli_num_rows($check) > 0 ) {
			$row = mysqli_fetch_array($check);
			$Id = $row['Id'];

			$check_login_time = date("Y-m-d");
			$log_time = date("g:i A");

			$check2 = mysqli_query($conn, "SELECT * FROM visitors_log_history WHERE Id='$Id' AND DATE(login_time)='$check_login_time' ORDER BY log_Id DESC LIMIT 1");

			$delay_minutes = 2;

			if (mysqli_num_rows($check2) > 0) {
			    $row2 = mysqli_fetch_array($check2);
			    $logged_in_college_name = $row2['login_college_name'];
			    $log_Id = $row2['log_Id']; 

			    // Check the time difference
			    $last_login_time = strtotime($row2['login_time']);
			    $current_time = time();
			    $time_difference = ($current_time - $last_login_time) / 60; // in minutes

			    if ($time_difference < $delay_minutes AND $logged_in_college_name != $college_name) {
			        // Redirect or handle the case where the delay is not met
			        $_SESSION['message'] = "You must wait at least 2 minutes before logging in to another building.";
			        $_SESSION['text'] = "Please try again later.";
			        $_SESSION['status'] = "error";
			        header("Location: index.php");
			        exit();
			    }
			    
			    
			    
			    
			    if($college_name == 'GATE') {
			    	if(empty($row2['logout_time'])) {


				    	if($logged_in_college_name == 'GATE') {
				    		$update = mysqli_query($conn, "UPDATE visitors_log_history SET logout_time='$log', logout_college_name='$college_name' WHERE log_Id='$log_Id'");
					        if ($update) {
								$_SESSION['message'] = "You have successfully checked-out at ".$college_name." at exactly at ".$log_time;
								$_SESSION['text'] = "Check-out successful!";
								$_SESSION['status'] = "success";
								header("Location: delay_redirect.php");
								exit();
							} else {
								login_error();
							}
				    	} elseif($logged_in_college_name == $college_name) {
				    		$update = mysqli_query($conn, "UPDATE visitors_log_history SET logout_time='$log', logout_college_name='$college_name' WHERE log_Id='$log_Id'");
					        if ($update) {
								$_SESSION['message'] = "You have successfully checked-out at ".$college_name." at exactly at ".$log_time;
								$_SESSION['text'] = "Check-out successful!";
								$_SESSION['status'] = "success";
								header("Location: delay_redirect.php");
								exit();
							} else {
								login_error();
							}
				    	} else {
				    		$update = mysqli_query($conn, "UPDATE visitors_log_history SET logout_time='$log', logout_college_name='$college_name' WHERE log_Id='$log_Id'");
					        if ($update) {
								$_SESSION['message'] = "You have successfully checked-out at ".$logged_in_college_name." and checked-out at ".$college_name." at exactly ".$log_time;
								$_SESSION['text'] = "Check-in successful";
								$_SESSION['status'] = "success";
								header("Location: delay_redirect.php");
								exit();
							} else {
								login_error();
							}
				    	}

				    } else {
			    		$save = mysqli_query($conn, "INSERT INTO visitors_log_history (Id, login_time, login_college_name) VALUES ('$Id', '$log', '$college_name')");
					    if ($save) {
							$_SESSION['message'] = "You have successfully checked-in at ".$college_name." at exactly ".$log_time;
							$_SESSION['text'] = "Check-in successful";
							$_SESSION['status'] = "success";
							header("Location: delay_redirect.php");
							exit();
						} else {
							login_error();
						}
			    	}

			    } else {
			    	if(empty($row2['logout_time'])) {
			    		if($logged_in_college_name == 'GATE') {
				    		$save = mysqli_query($conn, "INSERT INTO visitors_log_history (Id, login_time, login_college_name) VALUES ('$Id', '$log', '$college_name')");
						    if ($save) {
								$_SESSION['message'] = "You have successfully checked-in at ".$college_name." at exactly ".$log_time;
								$_SESSION['text'] = "Check-in successful";
								$_SESSION['status'] = "success";
								header("Location: delay_redirect.php");
								exit();
							} else {
								login_error();
							}
				    	} elseif($logged_in_college_name == $college_name) {
				    		$update = mysqli_query($conn, "UPDATE visitors_log_history SET logout_time='$log', logout_college_name='$college_name' WHERE log_Id='$log_Id'");
					        if ($update) {
								$_SESSION['message'] = "You have successfully checked-out at ".$college_name." at exactly at ".$log_time;
								$_SESSION['text'] = "Check-out successful!";
								$_SESSION['status'] = "success";
								header("Location: delay_redirect.php");
								exit();
							} else {
								login_error();
							}
						}	else {
							$update = mysqli_query($conn, "UPDATE visitors_log_history SET logout_time='$log', logout_college_name='$college_name' WHERE log_Id='$log_Id'");
					        if ($update) {
								$save = mysqli_query($conn, "INSERT INTO visitors_log_history (Id, login_time, login_college_name) VALUES ('$Id', '$log', '$college_name')");
							    if ($save) {
									$_SESSION['message'] = "You have successfully checked-out at ".$logged_in_college_name." and checked-in at ".$college_name." at exactly ".$log_time;
									$_SESSION['text'] = "Check-in successful";
									$_SESSION['status'] = "success";
									header("Location: delay_redirect.php");
									exit();
								} else {
									login_error();
								}
							} else {
								login_error();
							}
				    	}
			    	} else {
			    		$save = mysqli_query($conn, "INSERT INTO visitors_log_history (Id, login_time, login_college_name) VALUES ('$Id', '$log', '$college_name')");
					    if ($save) {
							$_SESSION['message'] = "You have successfully checked-in at ".$college_name." at exactly ".$log_time;
							$_SESSION['text'] = "Check-in successful";
							$_SESSION['status'] = "success";
							header("Location: delay_redirect.php");
							exit();
						} else {
							login_error();
						}
			    	}
			    }

   			} else {
			    // Insert a new login record
			    $save = mysqli_query($conn, "INSERT INTO visitors_log_history (Id, login_time, login_college_name) VALUES ('$Id', '$log', '$college_name')");
			    if ($save) {
					$_SESSION['message'] = "You have successfully checked-in at ".$college_name." at exactly ".$log_time;
					$_SESSION['text'] = "Check-in successful";
					$_SESSION['status'] = "success";
					header("Location: delay_redirect.php");
					exit();
				} else {
					login_error();
				}
			}
			
		} else {
			$_SESSION['message'] = "There is no visitor record found with this QR Code.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: index.php");
		}
	}
	// ********************* UNLIMITED LOGIN AND LOGOUT ******************************//

?>
