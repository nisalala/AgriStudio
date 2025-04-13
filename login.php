<?php
session_start();

$servername = "localhost";
$username = "root"; // Change if needed
$password = ""; // Change if needed
$dbname = "agristudio";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $photo=$_POST['photo'];
    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the user's data
        $row = $result->fetch_assoc();

        // Start session and set cookies
        $_SESSION['user'] = ['name' => $row['username'], 'email' => $row['email']];
        $_SESSION['photo']=$photo;
        // Set cookies for username and email
        setcookie("username", $row['username'], time() + 86400, "/"); // Store username for 1 day
        setcookie("userEmail", $row['email'], time() + 86400, "/");  // Store email for 1 day
        setcookie("userLoggedIn", "true", time() + 86400, "/"); // Mark user as logged in

        // Redirect to index.php
        header("Location: index.php");
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AgriStudio</title>
    <style>

    
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('img/login.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }
        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h2 {
            text-align: center;
        }
        input[type="text"], input[type="password"], button {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
    
        }
        button {
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .signup-link {
            text-align: center;
            margin-top: 10px;
        }
        .signup-link a {
            color: #28a745;
            text-decoration: none;
        }
        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Log In</button>
        </form>
       
        <div class="signup-link">
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>
</body>
</html>
