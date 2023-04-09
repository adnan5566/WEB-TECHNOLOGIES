<!DOCTYPE html>
	<html>
		<head>
			<title>Book Cataloging System</title>
		</head>

		<body>
			<fieldset><legend><h1>Book Cataloging System</h1></legend>
				<form method="post" action="../../controller/catalog_booksHendlar.php">
					<b><label for="bookname">Book Name:</label>
					<input type="text" id="bookname" name="bookname" ><br/>
					<label for="authorname">Author Name:</label>
					<input type="text" id="authorname" name="authorname" ><br/>
					<label for="publishyear">Published Year:</label>
					<input type="year" id="publishyear" name="publishyear"><br/>
					<label for="publisher">Publisher:</label>
					<input type="text" id="publisher" name="publisher"><br/>
					<label for="isbn">ISBN Number:</label>
					<input type="text" id="isbn" name="isbn"><br/>
					<label for="CIPN">Cataloged In Page No.</label>
					<input type="text" id="CIPN" name="CIPN"><br/>
					<input type="submit" value="Submit"></b>
					<input type="reset" value="Reset">
					<a href="Catalog-Resource.php"><button type="button">Back</button></a>
				</form>
		</body>
	</html>

