<!DOCTYPE html>
<html>
<head>
    <title>Resource Allocation</title>
    <link rel="stylesheet" href="LibrarianDashboard.css">
</head>

<body>
    <fieldset>
        <legend><h1>Resource Allocation</h1></legend>

        <form method="post" action="../../controller/allocationHendlar.php" onsubmit="return validateForm()">
            <b>
            <label for="type"><b>Select resource type:</b></label>

            <select name="type" id="type">
                <option value="book"><b>Book</b></option>
                <option value="journal"><b>Journal</b></option>
            </select><br/>

            <hr>

            <label for="title"><b>Title:</b></label>
            <input type="text" name="title" id="title"><br/>

            <hr>

            <label for="author"><b>Author:</b></label>
            <input type="text" name="author" id="author"><br/>

            <hr>

            <label for="year"><b>Year:</b></label>
            <input type="text" name="year" id="year"><br/>

            <hr>

            <label for="quantity"><b>Quantity:</b></label>
            <input type="number" name="quantity" id="quantity"><br/>

            <hr>

            <input type="submit" value="Submit">
            <input type="reset" value="Reset"><br/>
            <a href="Librarian-Dashboard.php"><button type="button">Back</button></a>
        </form>
    </fieldset>
	</body>
</html>

    <script>
        function validateForm() {
            var title = document.getElementById("title").value;
            var author = document.getElementById("author").value;
            var year = document.getElementById("year").value;
            var quantity = document.getElementById("quantity").value;

            if (title == "") {
                alert("Title field must be filled out");
                return false;
            }
            if (author == "") {
                alert("Author field must be filled out");
                return false;
            }
            if (year == "") {
                alert("Year field must be filled out");
                return false;
            }

            if (quantity == "") {
                alert("Quantity field must be filled out");
                return false;
            }
            

            return true;
        }
    </script>

