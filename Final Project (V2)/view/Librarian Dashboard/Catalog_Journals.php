<!DOCTYPE html>
	<html>
		<head>
			<title>Journal Cataloging</title>
		</head>

		<body>
			<fieldset><legend><h1>Journal Cataloging</h1></legend>
                <form method="POST" action="../../controller/Catalog_Journalshendlar.php">
		            <label for="title">Journal Title:</label>
		            <input type="text" id="title" name="title"><br><br>
					<label for="publisher">Publisher:</label>
		            <input type="text" id="publisher" name="publisher"><br/>

		            <label for="volume">Volume:</label>
		            <input type="text" id="volume" name="volume"><br/>

		            <label for="issue">Issue:</label>
		            <input type="date" id="issue" name="issue"><br/>

                    
					<label for="CIPN">Cataloged In Page No.</label>
					<input type="text" id="CIPN" name="CIPN"><br/>
		            <input type="submit" name="submit" value="Submit">
					<input type="reset" value="Reset">
					<a href="Catalog-Resource.php"><button type="button">Back</button></a>
	            </form>
		</body>
	</html>