<?php
// Start session
session_start();

// Check if user is authenticated
if (!isset($_SESSION["userid"]) || !isset($_COOKIE["email"])) {
	header("Location: profile1.php");
	exit;
}

// Get user ID and email from session and cookie
$userid = $_SESSION["userid"];
$email = $_COOKIE["email"];

// Read data.txt file to find user information
$file = fopen("data.txt", "r");
while (!feof($file)) {
	$line = fgets($file);
	$data = explode(",", $line);
	if ($userid == $data[0] && $email == $data[1]) {
		// Display user data
		echo "User ID: " . $data[0] . "<br>";
		echo "Email: " . $data[1] . "<br>";
		echo "Date of Birth: " . $data[2] . "<br>";
		break;
	}
}
fclose($file);
?>
