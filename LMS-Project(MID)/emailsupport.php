<!DOCTYPE html>
<html>
	<head>
		<title>Library Management System Email Support</title>
	</head>
	<body>
		<fieldset>
			<legend><h1>Email Support</h1></legend>
					<p>If you have any questions or issues related to the Library Management System, please don't hesitate to contact us by email.</p>

		<fieldset>
			<legend><h2>Contact Form</h2></legend>

			<form method="post" action="send_email.php">
				<label for="name">Name:</label>
				<input type="text" id="name" name="name"><br>

				<label for="email">Email:</label>
				<input type="email" id="email" name="email"><br>

				<label for="subject">Subject:</label>
				<input type="text" id="subject" name="subject"><br>

				<label for="message">Message:</label>
				<textarea id="message" name="message" rows="5" cols="30"></textarea><br>

				<input type="submit" value="Send">
				<input type="reset" value="Reset"><br/>
			</form>
		</fieldset>

		</fieldset>

	
	</body>
</html>


