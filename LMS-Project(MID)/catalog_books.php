<!DOCTYPE html>
	<html>
		<head>
			<title>Book Cataloging System</title>
		</head>

		<body>
			<fieldset><legend><h1>Book Cataloging System</h1></legend>
				<form method="post" action="catalog_books1.php">
					<b><label for="bookname">Book Name:</label>
					<input type="text" id="bookname" name="bookname" ><br/>
					<label for="authorname">Author Name:</label>
					<input type="text" id="authorname" name="authorname" ><br/>
					<label for="publishyear">Published Year:</label>
					<input type="number" id="publishyear" name="publishyear"><br/>
					<label for="publisher">Publisher:</label>
					<input type="text" id="publisher" name="publisher"><br/>
					<label for="isbn">ISBN Number:</label>
					<input type="text" id="isbn" name="isbn"><br/>
					<input type="submit" value="Submit"></b>
					<a href="Catalog-Resource.php"><button type="button">Back</button></a>
				</form>
		</body>
	</html>

