<?php
include '../config.php';

$filter = $_POST['filter'];
$college_name = $_POST['college_name'];

// Modify your SQL query based on the selected filter value.
if ($filter === 'Registrations Today') {
    $sql = "SELECT * FROM visitors WHERE college_name='$college_name' AND DAY(date_registered) = DAY(CURDATE()) AND MONTH(date_registered) = MONTH(CURDATE()) AND YEAR(date_registered) = YEAR(CURDATE())";
} elseif ($filter === 'Registrations in the Last 7 Days') {
    $sql = "SELECT * FROM visitors WHERE college_name='$college_name' AND date_registered >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND YEAR(date_registered) = YEAR(CURDATE())";
} elseif ($filter === 'Registrations in the Last 30 Days') {
    $sql = "SELECT * FROM visitors WHERE college_name='$college_name' AND date_registered >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND YEAR(date_registered) = YEAR(CURDATE())";
} else {
    // Default query without any filtering.
    $sql = "SELECT * FROM visitors WHERE college_name='$college_name' AND YEAR(date_registered) = YEAR(CURDATE())";
}


$result = mysqli_query($conn, $sql);
$rows = [];

while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

// Return the filtered table rows as JSON.
echo json_encode($rows);

?>
