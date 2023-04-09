
<!DOCTYPE html>
<html>
<head>
    <title>Library Card Issuance</title>
</head>
<body>
    <fieldset>
        <legend><h1>Library Card Issuance</h1></legend>
        <form method="post" action="../../controller/LibraryCardHendlar.php">
            <label>User ID:</label>
            <input type="text" name="userid"><br/>
            <label>Email:</label>
            <input type="text" name="email"><br/>
            <input type="submit" name="submit" value="Generate Library Card">
			<input type="reset" value="Reset"><br/>
        </form>
    </fieldset>
</body>
</html>
