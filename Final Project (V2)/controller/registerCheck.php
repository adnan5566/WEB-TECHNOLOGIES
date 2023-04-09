<?php
session_start();

require_once '../model/userModel.php';

$name = $_POST['name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$password = $_POST['password'];
$contactnumber = isset($_POST['contactnumber']) ? $_POST['contactnumber'] : null;


if (empty($name)) {
    echo "Please enter your name. <br>";
}

if (empty($email)) {
    echo "Email is required. Please enter your email. <br>";
} else if (!strpos($email, "@") || !strpos($email, ".")) {
    echo "<b>Please enter a valid email.</b> <br>";
}

if (empty($dob)) {
    echo "<b>Please enter your date of birth.</b><br>";
} 

if (empty($password)) {
    echo "Please enter your password. <br>";
} 

if (!empty($contactnumber) && !is_numeric($contactnumber)) {
    echo "<b>Please enter your contact number.</b> <br>";
}

if (empty($name) || empty($email) || empty($dob) || empty($password)) {
    echo "<b>Please fix the above errors and try again.</b> <br>";
} else {
    $user = getUserByEmail($email);

    if ($user != null) {
        $existingUserid = $user['userid'];
        echo "<h2>A user with this email already exists. Please try a different email address! </h2> <br>";
        echo "<h2>The user ID associated with this email is: $existingUserid</h2>";
    } else {
        $userid = generateUserID();
        $userid = addUser($userid, $name, $email, $dob, $password, $contactnumber);
        if ($userid != null) {
            $_SESSION['userid'] = $userid;
            header("Location:../view/registrationComplete.php");
        } else {
            echo "Failed to create user.";
        }
    }
}
?>
