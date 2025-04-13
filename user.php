<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "root"; // Change if necessary
$password = ""; // Change if necessary
$dbname = "agristudio"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

// Fetch user details from session
$user = $_SESSION['user']['name'];

// Query to fetch reservation details
$query = "SELECT * FROM reservations WHERE name = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $user); // Bind username parameter
$stmt->execute();
$result = $stmt->get_result();

// Default values if no reservation found
$phone = $email = $purpose = $date_of_visit = $room = 'N/A';

// If a reservation is found
if ($result->num_rows > 0) {
    $reservation = $result->fetch_assoc();
    $phone = htmlspecialchars($reservation['phone']);
    $email = htmlspecialchars($reservation['email']);
    $purpose = htmlspecialchars($reservation['purpose']);
    $date_of_visit = htmlspecialchars($reservation['visit_date']);
    $room = htmlspecialchars($reservation['room']);
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Receipt - AgriStudio</title>
    <link rel="stylesheet" href="check-style.css">
    <style>

        .container {
            margin-top: 12rem;
        }
        
        .user-icon {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      cursor: pointer;
      margin-top: -0.5rem;
    }
    .user-icon img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }

    .user-icon {
    position: relative;
    display: inline-block;
    cursor: pointer;
  }

  .user-icon img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
  }

  /* Dropdown Menu */
  .logout-menu {
    display: none;
    position: absolute;
    top: 50px;
    right: 0;
    background-color: #ffffff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    min-width: 100px;
    z-index: 10;
  }

  .logout-menu a {
    display: block;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    color: #000;
    font-size: 0.9rem;
  }

  .logout-menu a:hover {
    background-color: #f4f4f4;
    color: #333;
  }

  /* Show menu on hover */
  .user-icon:hover .logout-menu {
    display: block;
  }

  .user-receipt {
   
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    padding: 20px;
    margin: 20px auto;
    max-width: 600px;
    color: #333; /* Dark text color for readability */
    text-align: center;
}

.user-receipt h1 {
    font-weight: 500;
    margin-bottom: 20px;
    
}

.user-receipt p {
    font-size: 1.2rem;
    margin: 10px 0;
}

.user-receipt strong {
    font-weight: 600;
    color: #000; /* Bold label color */
}

.user-receipt .field {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.user-receipt .field-label {
    font-weight: bold;
    color: #555;
}

.user-receipt .field-value {
    color: #666;
}

.action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        
        .action-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }

        .action-buttons .delete {
            background-color: #e74c3c;
            color: white;
        }

        .action-buttons .edit {
            background-color: #3498db;
            color: white;
        }

        .action-buttons button:hover {
            opacity: 0.9;
        }

    </style>
</head>
<body>
    <div class="navigation">
        <a href="index.php"><img src="img/logo-modified.png" class="logo" alt="AgriStudio Logo"></a>
        <ul>
            <li><a href="#aboutus">ABOUT US</a></li>
            <li><a href="#gallery">GALLERY</a></li>
            <li><a href="#events">EVENTS</a></li>
            <li><a href="#contactus">CONTACT US</a></li>
            <li>
                <div class="user-icon">
                    <a href="user.php"><img src="img/user.jpg" alt="User Icon"></a>
                </div>
            </li>
        </ul>
    </div>
<div class="container">
    <div class="user-receipt">
    <img src="img/dot.png" alt="..." />
        <h1>YOUR BOOKINGS</h1>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($user); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
        <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($phone); ?></p>
        <p><strong>Date of Visit:</strong> <?php echo htmlspecialchars($date_of_visit); ?></p>
        <p><strong>Purpose:</strong> <?php echo htmlspecialchars($purpose); ?></p>
        <p><strong>Selected Room:</strong> <?php echo htmlspecialchars($room); ?></p>
    </div>
    </div>

    <div class="action-buttons">
                <form action="delete_booking.php" method="post" style="display:inline;">
                    <input type="hidden" name="reservation_id" value="<?php echo $user; ?>">
                    <button type="submit" class="delete">Delete Booking</button>
                </form>
                <form action="edit_booking.php" method="get" style="display:inline;">
                    <input type="hidden" name="reservation_id" value="<?php echo $reservation_id; ?>">
                    <button type="submit" class="edit">Edit Booking</button>
                </form>
            </div>
</body>
</html>
