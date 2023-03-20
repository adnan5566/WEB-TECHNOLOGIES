<!DOCTYPE html>
	<html>
		<head>
			<title>Journal Cataloging</title>
		</head>

		<body>
			<fieldset><legend><h1>Journal Cataloging</h1></legend>
                <form method="POST" action="Catalog_Journals1.php">
		            <label for="title">Journal Title:</label>
		            <input type="text" id="title" name="title" required><br><br>


		            <label for="volume">Volume:</label>
		            <input type="text" id="volume" name="volume" required><br><br>

		            <label for="issue">Issue:</label>
		            <input type="text" id="issue" name="issue" required><br><br>

                    <label for="publisher">Publisher:</label>
		            <input type="text" id="publisher" name="publisher" required><br><br>

		            <input type="submit" name="submit" value="Submit">
	            </form>
		</body>
	</html>