<?php

if(isset($_POST['submit'])) {
    $userid = trim($_POST['userid']);
    $password = trim($_POST['password']);

    if(empty($userid) || empty($password)) {
        echo "<h2>Please enter both User ID and Password!</h2>";
        exit();
    }

    if(!preg_match("/^(U|L|A)-\d+$/", $userid)) {
        echo "<h2>Invalid User ID format!</h2>";
        exit();
    }

    $user_found = false;

    $file = fopen('data.txt', 'r');

    while(($line = fgets($file)) !== false) {
        $fields = explode(',', $line);
        if($fields[0] == $userid && $fields[4] == $password) {
            $user_found = true;
            break;
        }
    }

    fclose($file);

    if($user_found) {
        if(substr($userid, 0, 2) == 'U-') {
            setcookie('userid', $userid, time()+5000);
            header('Location: Adnan.php');
            exit();
        }
        elseif(substr($userid, 0, 2) == 'L-') {
            setcookie('userid', $userid, time()+5000);
            header('Location: librarian-Dashboard.php');
            exit();
        } 
        elseif(substr($userid, 0, 2) == 'A-') {
            setcookie('userid', $userid, time()+5000);
            header('Location: login1.php');
            exit();
        }
    } else {
        echo "<h2>Login Failed!</h2>";
        echo "<p>Please check your User ID or Password then try again.</p>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <fieldset><legend><h1>Login</h1></legend>
        <form method="post" action="login.php">
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
