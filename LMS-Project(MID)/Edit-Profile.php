<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
</head>
<body>
	<h1>Edit Profile</h1>
	<form action="update_profile.php" method="post">
		<label for="name">Name:</label><br>
		<input type="text" id="name" name="name" required><br>
		<label for="phone">Phone:</label><br>
		<input type="text" id="phone" name="phone" required><br>
		<label for="email">Email:</label><br>
		<input type="email" id="email" name="email" required><br>
		<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
		<input type="submit" value="Save Changes">
	</form>
</body>
</html>

