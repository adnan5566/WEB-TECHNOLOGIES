<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $userid = validate_input($_POST['userid']);
    $email = validate_input($_POST['email']);


    $user_found = false;
    $lines = file('data.txt');
    foreach ($lines as $line) {
        $line_data = explode(',', $line);
        if (count($line_data) >= 3 && $line_data[0] === $userid && $line_data[2] === $email) {
            $user_found = true;
            break;
        }
    }

    if (!$user_found) {
        die('User not found. Please check your User ID and email and try again.');
    }

    $card_id = 'LC-' . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);


    $user_data = "$card_id,$line";
    file_put_contents('library.txt', $user_data, FILE_APPEND);


    $_SESSION['card_id'] = $card_id;
    $_SESSION['user_id'] = $userid;


    header('Location: LC_Issuance.php');
    exit();
}


function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Card Issuance</title>
</head>
<body>
    <fieldset>
        <legend><h1>Library Card Issuance</h1></legend>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
