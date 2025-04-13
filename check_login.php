<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// If logged in, redirect to CheckIn.html
header("Location: CheckIn.html");
exit();
?>