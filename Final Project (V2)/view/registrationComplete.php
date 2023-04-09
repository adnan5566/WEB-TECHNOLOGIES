<?php
session_start();

if(isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    echo "<h1>Registration Complete</h1>";
    echo "<h2>Your user ID is: $userid</h2>";
    echo "<p>Thank you for registering!</p>";
    echo "<a href='../view/login.php'><button type='button'>Login</button></a>";
} else {
    echo "<h1>Registration Failed</h1>";
    echo "<p>Sorry, there was an error while registering. Please try again later or contact our support team at <a href='../view/emailsupport.php'>support@lms.com</a>.</p>";
    echo "<a href='../view/registration.php'><button type='button'>Try Again</button></a>";
}
?>
