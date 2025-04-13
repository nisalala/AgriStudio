<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservation_id = $_POST['reservation_id'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "agristudio");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete query
    
    $query = "DELETE FROM reservations WHERE name = '$reservation_id'";


    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Booking deleted successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error deleting booking.'); window.location.href='user.php';</script>";
    
    }
    
    // $stmt->close();
    $conn->close();
}
?>
