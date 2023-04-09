<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <fieldset><legend><h1>Login</h1></legend>
        <form method="post" action="../controller/loginCheck.php">
            <label>User ID:</label>
            <input type="text" name="userid"><br/>
            <label>Password:</label>
            <input type="password" name="password"><br/>
            <input type="submit" name="submit" value="Login">
            <input type="reset" value="Reset"><br/>
        </form>
    </fieldset>
</body>
</html>
