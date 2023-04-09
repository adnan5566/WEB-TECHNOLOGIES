<!DOCTYPE html>
	<html>
		<head>
			<title>Resource Allocation</title>
		</head>
		
		<body>
			<fieldset><legend><h1>Resource Allocation</h1></legend>

				<form method="post" action="../../controller/allocationHendlar.php">
					<b>
					<label for="type">Select resource type</label>

					<select name="type" id="type">
					<option value="book">Book</option>
					<option value="journal">Journal</option>
					</select><br/>
					
					<hr>

					<label for="title">Title:</label>
					<input type="text" name="title" id="title"><br/>

					<hr>

					<label for="author">Author:</label>
					<input type="text" name="author" id="author"><br/>

					<hr>

					<label for="year">Year:</label>
					<input type="text" name="year" id="year"><br/>

					<hr>

					<label for="quantity">Quantity:</label>
					<input type="number" name="quantity" id="quantity"><br/>

					<hr>
					
					<input type="submit" value="Submit"></b>
					<input type="reset" value="Reset"><br/>
					<a href="Librarian-Dashboard.php"><button type="button">Back</button></a>
				</form>
		</body>
	</html>
