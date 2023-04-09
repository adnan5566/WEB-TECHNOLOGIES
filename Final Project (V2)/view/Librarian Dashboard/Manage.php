<!DOCTYPE html>
<html>
<head>
	<title>Librarian Dashboard</title>
</head>
<body>
	<fieldset>
	<legend><h1>Manage Books and Journals</h1></legend>
	<form action="Manage.php" method="post">
		<h2>Add New Book</h2>
		<label for="book-title">Title:</label>
		<input type="text" id="book-title" name="book_title" required><br>
		<label for="book-author">Author:</label>
		<input type="text" id="book-author" name="book_author" required><br>
		<label for="book-publisher">Publisher:</label>
		<input type="text" id="book-publisher" name="book_publisher" required><br>
		<label for="book-year">Pulished-year:</label>
		<input type="text" id="book-year" name="book_year" required><br>
		<input type="submit" value="Add Book">
	</form>
	<hr>
	<form action="Manage.php" method="post">
		<h2>Add New Journal</h2>
		<label for="journal-title">Title:</label>
		<input type="text" id="journal-title" name="journal_title" required><br>
		<label for="journal-author">Author:</label>
		<input type="text" id="journal-author" name="journal_author" required><br>
		<label for="journal-publisher">Publisher:</label>
		<input type="text" id="journal-publisher" name="journal_publisher" required><br>
		<label for="journal-year">Published-year:</label>
		<input type="text" id="journal-year" name="journal_year" required><br>
		<input type="submit" value="Add Journal">
	</form>
</body>
</html>
