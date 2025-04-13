<?php
session_start();

if (isset($_GET['reservation_id'])) {
    $reservation_id = $_GET['reservation_id'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "agristudio");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch current booking details
    $query = "SELECT * FROM reservations WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $reservation_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $reservation = $result->fetch_assoc();

    $stmt->close();
    $conn->close();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservation_id = $_POST['reservation_id'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $date_of_visit = $_POST['date_of_visit'];
    $purpose = $_POST['purpose'];
    $room = $_POST['room'];

    $conn = new mysqli("localhost", "root", "", "agristudio");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "UPDATE reservations SET phone = ?, email = ?, date_of_visit = ?, purpose = ?, room = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssi", $phone, $email, $date_of_visit, $purpose, $room, $reservation_id);

    if ($stmt->execute()) {
        echo "<script>alert('Booking updated successfully!'); window.location.href='user.php';</script>";
    } else {
        echo "<script>alert('Error updating booking.'); window.location.href='user.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!-- Edit Booking Form -->
<form method="post">
    <input type="hidden" name="reservation_id" value="<?php echo $reservation['id']; ?>">
    <label>Phone:</label>
    <input type="text" name="phone" value="<?php echo htmlspecialchars($reservation['phone']); ?>">
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($reservation['email']); ?>">
    <label>Date of Visit:</label>
    <input type="date" name="date_of_visit" value="<?php echo htmlspecialchars($reservation['date_of_visit']); ?>">
    <label>Purpose:</label>
    <input type="text" name="purpose" value="<?php echo htmlspecialchars($reservation['purpose']); ?>">
    <label>Room:</label>
    <input type="text" name="room" value="<?php echo htmlspecialchars($reservation['room']); ?>">
    <button type="submit">Update</button>
</form>
