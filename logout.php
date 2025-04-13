<?php
// Start the session
session_start();

// List of all cookies used in the application
$cookies_to_delete = [
    'selectedOption',  // From CheckIn.html
    'selectedRoom',    // From rooms.html
    'userLoggedIn',    // From login.php
    'username',        // From login.php
    'userEmail',       // From login.php
    'purpose',         // From contact.php
    'selectedRoomDetails' // From contact.php
];

// Loop through each cookie and delete it
foreach ($cookies_to_delete as $cookie) {
    if (isset($_COOKIE[$cookie])) {
        setcookie($cookie, '', time() - 3600, '/'); // Expire the cookie
    }
}

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: index.php");
exit();
