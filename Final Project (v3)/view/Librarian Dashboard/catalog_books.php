<!DOCTYPE html>
<html>
  <head>
    <title>Book Cataloging System</title>
    <link rel="stylesheet" href="LibrarianDashboard.css">
  </head>

  <body>
    <fieldset>
      <legend>
        <h1>Book Cataloging System</h1>
      </legend>
      <form name = "catalogbooksForm" method="post" action="../../controller/catalog_booksHendlar.php" onsubmit="return validateForm()">
        <b>
          <label for="bookname"><b>Book Name:</b></label>
          <input type="text" id="bookname" name="bookname"><br/>
          <label for="authorname"><b>Author Name:</b></label>
          <input type="text" id="authorname" name="authorname"><br/>
          <label for="publishyear"><b>Published Year:</b></label>
          <input type="year" id="publishyear" name="publishyear"><br/>
          <label for="publisher"><b>Publisher:</b></label>
          <input type="text" id="publisher" name="publisher"><br/>
          <label for="isbn"><b>ISBN Number:</b></label>
          <input type="text" id="isbn" name="isbn"><br/>
          <label for="CIPN"><b>Cataloged In Page No.</b></label>
          <input type="text" id="CIPN" name="CIPN"><br/>
          <input type="submit" value="Submit">
        </b>
        <input type="reset" value="Reset">
        <a href="Catalog-Resource.php"><button type="button">Back</button></a>
      </form>
    </fieldset>
	</body>
</html>

    <script>
      function validateForm() {
        var bookName = document.catalogbooksForm.bookname.value;
        var authorName = document.catalogbooksForm.authorname.value;
        var publishYear = document.catalogbooksForm.publishyear.value;
        var publisher = document.catalogbooksForm.publisher.value;
        var isbn = document.catalogbooksForm.isbn.value;
        var cipn = document.catalogbooksForm.CIPN.value;

        if (bookName == null || bookName == "") {
          alert("Book Name must be filled out.");
          return false;
        }

        if (authorName == null || authorName == "") {
          alert("Author Name must be filled out.");
          return false;
        }

        if (publishYear == null || publishYear == "") {
          alert("Published Year must be filled out.");
          return false;
        }

        if (publisher == null || publisher == "") {
          alert("Publisher must be filled out.");
          return false;
        }

        if (isbn == null || isbn == "") {
          alert("ISBN Number must be filled out.");
          return false;
        }

        if (cipn == null || cipn == "") {
          alert("Cataloged In Page No. must be filled out.");
          return false;
        }

        return true;
      }
    </script>

