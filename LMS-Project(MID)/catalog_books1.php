<?php
	session_start();


		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{

			if (empty($_POST['bookname'])) 
			{
				$_SESSION['error'] = 'Please enter book name';
				header('Location: catalog_books.php');
				exit;
			}
	
			if (empty($_POST['authorname'])) 
			{
				$_SESSION['error'] = 'Please enter author name';
				header('Location: catalog_books.php');
				exit;
			}
	
			if (empty($_POST['publishyear'])) 
			{
				$_SESSION['error'] = 'Please enter published year';
				header('Location: catalog_books.php');
				exit;
			}

			if (empty($_POST['publisher'])) 
			{
				$_SESSION['error'] = 'Please enter publisher name';
				header('Location: catalog_books.php');
				exit;
			}

			if (empty($_POST['isbn'])) 
			{
				$_SESSION['error'] = 'Please enter ISBN number';
				header('Location: catalog_books.php');
				exit;
			}


				$book_data = array(
					'bookname' => $_POST['bookname'], 
					'authorname' => $_POST['authorname'],
					'publishyear' => $_POST['publishyear'],
					'publisher' => $_POST['publisher'],
					'isbn' => $_POST['isbn']);
        

				$books_file = fopen('Books.txt', 'a');
					fputcsv($books_file, $book_data);
					fclose($books_file);

				$_SESSION['success'] = 'Book data saved successfully';
				header('Location: catalog_books2.php');
				exit;
	} 
   			 else 
			{
				header('Location: catalog_books.php');
				exit;
			}
?>


