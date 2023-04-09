<!DOCTYPE html>
	<html>
		<head>
			<title>FAQs</title>
			<link rel="stylesheet" href="FAQs.css">
		</head>

		<body>
			<fieldset>
				<legend><h1>FAQs</h1></legend>

	<?php

		$faqs = array(
			"Question 1: What is the library's hours of operation?" => "Answer: The library is open from 9am to 6pm Saturday to Wednesday and 9am to 3pm on Thursday. The library is closed on Friday and public holidays.",
			"Question 2: How many books can I borrow at one time?" => "Answer: Library members can borrow up to 3 books at a time.",
			"Question 3: How long can I borrow books for?" => "Answer: Books can be borrowed for a period of 2 weeks. If you need more time, you can renew your books online or in person.",
			"Question 4: Can I reserve a book that is currently checked out?" => "Answer: Yes, you can place a hold on a book that is currently checked out. You will be notified when the book becomes available.",
			"Question 5: How do I get a library card?" => "Answer: You can get a library card by visiting the library in person or filling out an application form online. You will need to provide proof of identity and address."
		);

		foreach ($faqs as $question => $answer) {
			echo "<h3>$question</h3>";
			echo "<p>$answer</p>";
		}
		
	?>
	<a href="Help & Support.php"><button type="button"><b>Back</b></button></a>
		</body>
	</html>

	