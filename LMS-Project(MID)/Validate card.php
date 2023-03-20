<!DOCTYPE html>
<html>
<head>
	<title>Payment Page</title>
</head>
<body>
	<h2>Payment Page</h2>
	
	<form method="post" action="VCS.php>
		<label>Card ID:</label>
		<input type="text" name="cardid" >
		<br>
		<label>Duration:</label>
		<select name="duration">
			<option value="">Select duration</option>
			<option value="6">6 months (500tk)</option>
		</select>
		<br>
		<input type="submit" name="submit" value="Submit">
	</form>
	<?php
		// Show validation errors
		if (!empty($errors)) {
			echo '<div>';
			foreach ($errors as $error) {
				echo '<p>' . $error . '</p>';
			}
			echo '</div>';
		}
	?>
</body>
</html>
