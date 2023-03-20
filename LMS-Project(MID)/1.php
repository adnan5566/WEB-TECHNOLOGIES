<!DOCTYPE html>
<html>
<head>
	<title>Library Card</title>
</head>
<body>
	<h2>Library Card</h2>
	<?php
	session_start();
	if (isset($_SESSION['success'])) {
		echo '<p style="color: green;">' . $_SESSION['success'] . '</p>';
		unset($_SESSION['success']);
	}
	if (isset($_SESSION['card_id'])) {
		echo '<p>Your Library Card ID is: ' . $_SESSION['card_id'] . '</p>';
		unset($_SESSION['card_id']);
	} elseif (isset($_COOKIE['card_id'])) {
		echo '<p>Your Library Card ID is: ' . $_COOKIE['card_id'] . '</p>';
	}
	?>
</body>
</html>
