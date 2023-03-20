
<!DOCTYPE html>
<html>
<head>
	<title>View Profile</title>
</head>
<body>
<h1>View Profile</h1>
	<form method="POST">
		<label>User ID:</label>
		<input type="text" name="user_id" value="<?php echo $user_id; ?>" readonly>

		<label>Email:</label>
		<input type="text" name="email" value="<?php echo $email; ?>">

		<label>Date of Birth:</label>
		<input type="date" name="dob" value="<?php echo $dob; ?>">

		<input type="submit" value="Save">
	</form>
	<a href="logout.php">Logout</a>
</body>
</html>