<!DOCTYPE html>
	<html>
		<head>
			<title>Journal Cataloging</title>
			<link rel="stylesheet" href="LibrarianDashboard.css">
		</head>

		<body>
			<fieldset><legend><h1>Journal Cataloging</h1></legend>
			<form name = "catalogJournalForm" method="POST" action="../../controller/Catalog_Journalshendlar.php" onsubmit="return validateForm()">
		            <label for="title"><b>Journal Title:</b></label>
		            <input type="text" id="title" name="title"><br><br>
					<label for="publisher"><b>Publisher:</b></label>
		            <input type="text" id="publisher" name="publisher"><br/>

		            <label for="volume"><b>Volume:</b></label>
		            <input type="text" id="volume" name="volume"><br/>

		            <label for="issue"><b>Issue:</b></label>
		            <input type="date" id="issue" name="issue"><br/>

                    
					<label for="CIPN"><b>Cataloged In Page No.</b></label>
					<input type="text" id="CIPN" name="CIPN"><br/>
		            <input type="submit" name="submit" value="Submit">
					<input type="reset" value="Reset">
					<a href="Catalog-Resource.php"><button type="button">Back</button></a>
	            </form>
		</body>
	</html>


	<script>
		function validateForm() {
			var title = document.catalogJournalForm.title.value;
			var publisher = document.catalogJournalForm.publisher.value;
			var volume = document.catalogJournalForm.volume.value;
			var issue = document.catalogJournalForm.issue.value;
			var cipn = document.catalogJournalForm.CIPN.value;


			if (title == null || title == "") {
				alert("Please enter a title.");
				return false;
			}

			if (publisher ==  null || publisher == "") {
				alert("Please enter a publisher.");
				return false;
			}

			if (volume == null || volume == "") {
				alert("Please enter a volume.");
				return false;
			}

			if (issue == null || issue == "") {
				alert("Please enter an issue.");
				return false;
			}

			if (cipn == null || cipn == "") {
				alert("Please enter a Cataloged In Page No.");
				return false;
			}
		}
	</script>