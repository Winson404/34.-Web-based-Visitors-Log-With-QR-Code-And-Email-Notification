<?php 
	include '../config.php';
	include("../includes/XLSXLibrary.php");

	// SAVE ADMIN - ADMIN_MGMT.PHP
	if (isset($_POST['filter-registration'])) {
	    $registration = mysqli_real_escape_string($conn, $_POST['registration']);
	    $college_name = mysqli_real_escape_string($conn, $_POST['college_name']);
	    

	     $visitor = [
	        ['No.', 'Visitors name', 'Age', 'Address', 'Contact number', 'Type of ID', 'Specified Other Type of ID', 'ID number', 'Purpose', 'Specified Other Purpose', 'Date registered']
	      ];

	     	$id = 0;
	      	// $sql = "SELECT * FROM residence ORDER BY lastname";
	        if ($registration === 'Registrations Today') {
			        $sql = "SELECT * FROM visitors WHERE college_name='$college_name' AND DAY(date_registered) = DAY(CURDATE()) AND MONTH(date_registered) = MONTH(CURDATE()) AND YEAR(date_registered) = YEAR(CURDATE()) ORDER BY lastname";
			} elseif ($registration === 'Registrations in the Last 7 Days') {
			    $sql = "SELECT * FROM visitors WHERE college_name='$college_name' AND date_registered >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND YEAR(date_registered) = YEAR(CURDATE()) ORDER BY lastname";
			} elseif ($registration === 'Registrations in the Last 30 Days') {
			    $sql = "SELECT * FROM visitors WHERE college_name='$college_name' AND date_registered >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND YEAR(date_registered) = YEAR(CURDATE()) ORDER BY lastname";
			} else {
			    // Default query without any filtering.
			    $sql = "SELECT * FROM visitors WHERE college_name='$college_name'";
			}
	      $res = mysqli_query($conn, $sql);
	      if (mysqli_num_rows($res) > 0) {
	        foreach ($res as $row) {
	          $id++;
	          $name = $row['lastname']. ', ' .$row['firstname']. ' ' .$row['middlename'];
	          $visitor = array_merge($visitor, array(array($id, $name, $row['age'], $row['address'], $row['contact'], $row['id_type'], $row['other_id_type'], $row['id_number'], $row['purpose'], $row['other_purpose'], date("F d, Y", strtotime($row['date_registered'])))));
	        }
	      } else {
	        $_SESSION['message'] = "No record found in the database.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
	        header("Location: visitors.php");
	      }

	      $xlsx = SimpleXLSXGen::fromArray($visitor);
	      $xlsx->downloadAs('Visitor records at '.$college_name.'.xlsx'); // This will download the file to your local system

	      // $xlsx->saveAs('resident.xlsx'); // This will save the file to your server

	      echo "<pre>";

	      print_r($visitor);

	      header('Location: visitors.php');

	}




	
?>



