<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
</head>
<body>
	<fieldset>
	<legend><h1>Contact Us</h1></legend>
	<table>
		
	</table>
	<h2>You can send us massage with your name and email</h2>
	<form method="post" action="contact.php">
		<label for="name">Name:</label>
		<input type="text" name="name" required><br>

		<label for="email">Email:</label>
		<input type="email" name="email" required><br>

		<label for="message">Message:</label>
		<textarea name="message" required></textarea><br>

		<input type="submit" value="Submit"></br>
		
		
	</form>
</body>
</html>
