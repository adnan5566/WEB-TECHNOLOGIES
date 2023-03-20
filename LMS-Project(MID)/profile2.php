<?php
// Start session
session_start();

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get user ID and email
	$userid = $_POST["userid"];
	$email = $_POST["email"];

	// Validate user ID and email
	if (empty($userid) || empty($email)) {
		echo "Please enter both user ID and email.";
	} else {
		// Read data.txt file to find user information
		$file = fopen("data.txt", "r");
		while (!feof($file)) {
			$line = fgets($file);
			$data = explode(",", $line);
			if ($userid == $data[0] && $email == $data[1]) {
				// Authentication successful, store user ID and email in session and cookie
				$_SESSION["userid"] = $userid;
				setcookie("email", $email, time() + 3600, "/");
				header("Location: profile3.php");
				exit;
			}
		}
		echo "Invalid user ID or email.";
		fclose($file);
	}
}
?>
