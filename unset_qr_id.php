<?php
session_start();

// Unset the $qr_id session variable
if (isset($_SESSION['QR_ID'])) {
    unset($_SESSION['QR_ID']);
}

// Redirect back to visitors_qr.php or any other appropriate page
header("Location: index.php");
exit;
?>
