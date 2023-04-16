
<!DOCTYPE html>
<html>
<head>
    <title>Library Card Issuance</title>
    <link rel="stylesheet" href="LibraryCard.css">
</head>
<body>
    <fieldset>
        <legend><h1>Library Card Issuance</h1></legend>
        <form name="libraryCardForm" method="post" action="../../controller/LibraryCardHendlar.php" onsubmit="return validateForm()">
            <label><b>User ID:</b></label>
            <input type="text" name="userid"><br/>
            <label><b>Email:</b></label>
            <input type="text" name="email"><br/>
            <input type="submit" name="submit" value="Generate Library Card">
			<input type="reset" value="Reset"><br/>
        </form>
    </fieldset>
</body>
</html>



    <script>
        function validateForm() {
            var userid = document.libraryCardForm.userid.value;
            var email = document.libraryCardForm.email.value;

            if (userid == "") {
                alert("User ID must be filled out");
                return false;
            }

            if (email == "") {
                alert("Email must be filled out");
                return false;
            }
        }
    </script>