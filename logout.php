<?php 
session_start();
session_unset();
session_destroy();
// header('Location: index.php');

if(isset($_GET['college_name'])) {
	
	// Your existing code to get $college_name (assuming it is set in the session)
	$college_name = $_GET['college_name'];

	// Additional code for redirection
	if ($college_name == 'CABA') {
	    header("Location: CABA/index.php");
	} elseif ($college_name == 'CAF') {
	    header("Location: CAF/index.php");
	} elseif ($college_name == 'CAS') {
	    header("Location: CAS/index.php");
	} elseif ($college_name == 'CCIT') {
	    header("Location: CCIT/index.php");
	} elseif ($college_name == 'CIT') {
	    header("Location: CIT/index.php");
	} elseif ($college_name == 'COE') {
	    header("Location: COE/index.php");
	} elseif ($college_name == 'CON') {
	  	header("Location: NURSING/index.php");
	} elseif ($college_name == 'CTE') {
	  	header("Location: CTE/index.php");
	} elseif ($college_name == 'CTHM') {
	  	header("Location: CTHM/index.php");
	} elseif ($college_name == 'GATE') {
	  	header("Location: GATE/index.php");
	} elseif ($college_name == 'REGISTRAR') {
	  	header("Location: REGISTRAR/index.php");
	} elseif ($college_name == 'ADMIN') {
	  	header("Location: ADMINBUILDING/index.php");
	} else {
	    
	}
	
} else {
	// Perform the redirection
	header('Location: index.php');
	exit();
}

?>