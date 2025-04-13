


<?php
// Start session to retrieve cookies
session_start();

// Retrieve cookies for selected purpose and room
$purpose = isset($_COOKIE['selectedOption']) ? $_COOKIE['selectedOption'] : 'Not Specified';
$room = isset($_COOKIE['selectedRoom']) ? $_COOKIE['selectedRoom'] : 'Not Applicable';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "agristudio";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO reservations (name, email, phone, visit_date, purpose, room) 
            VALUES ('$name', '$email', '$phone', '$date', '$purpose', '$room')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Booking successful!');</script>";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="check-style.css">
    <style>
       
        .container {
            width: 50%;
            margin: 2rem auto;
            padding: 2rem;
            margin-top: 9rem;
            background: #ffffff;
            /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
        }
        h1 {
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 500;
        
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 1rem;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        .btn-submit {
            display: block;
            margin-right: auto;
            margin-left: auto;
            padding: 1rem 2.5rem;
            border-radius: 0.5rem;
            background-color: #feaf18;
            border: none;
            color: white;
            font-size: 15px;
            font-weight: 700;
            margin-top: 1rem;
          
  }
        
        .btn-submit:hover {
            background:rgb(253, 164, 0);
        }
        .receipt {
            margin-top: 2rem;
            padding: 1rem;
            border: 1px solid #ced4da;
            border-radius: 4px;
            background: #e9ecef;
        }

        img{
            display: block;
            margin-left: auto;
            margin-right: auto;
          
        }
    </style>
</head>
<body>
<div class="navigation">
      <a href="index.php"><img src="img/logo-modified.png" class="logo" /></a>
      <ul>
        <li><a href="#aboutus">ABOUT US</a></li>
        <li><a href="#gallery">GALLERY</a></li>
        <li><a href="#events">EVENTS</a></li>
        <li><a href="#contactus">CONTACT US</a></li>
        <li>
  <?php if ($loggedIn): ?>
    <!-- User Icon with Logout Menu -->
    <div class="user-icon">
     <a href="user.php"> <img src="img/user.jpg" alt="User Icon"> </a>
      <div class="logout-menu">
        <a href="logout.php">Logout</a>
      </div>
    </div>
  <?php endif; ?>
</li>
      </ul>
    </div>
    <div class="container">
    <img src="img/dot.png" alt="..." />
        <h1>Contact Form</h1>
        <form method="POST" action="contact.php">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your account username"required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="date">Date of Visit:</label>
                <input type="date" id="date" name="date" required>
            </div>
            <button type="submit" class="btn-submit">Submit</button>
        </form>

        <!-- Display Receipt -->
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <div class="receipt">
            <h2>Booking Receipt</h2>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
            <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($phone); ?></p>
            <p><strong>Date of Visit:</strong> <?php echo htmlspecialchars($date); ?></p>
            <p><strong>Purpose:</strong> <?php echo htmlspecialchars($purpose); ?></p>
            <p><strong>Room:</strong> <?php echo htmlspecialchars($room); ?></p>
        </div>
        <?php } ?>
    </div>
</body>
</html>
