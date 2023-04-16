<?php

require_once '../model/userModel.php';
require_once '../model/db.php';
session_start();

if(isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $user = getUserByuserId($userid);

    if($user) {
        $name = $user['name'];
        $email = $user['email'];
        $dob = $user['dob'];
        $contactnumber = $user['contactnumber'];
    }
    else {
        echo "Error: Could not fetch user details!";
    }
}
else {
    header("Location: ../view/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Profile</title>
</head>
<body>
    <h1>Librarian Profile</h1>
    <?php if(isset($name)) { ?>
        <p><strong>Name:</strong> <?php echo $name; ?></p>
    <?php } ?>
    <?php if(isset($email)) { ?>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
    <?php } ?>
    <?php if(isset($dob)) { ?>
        <p><strong>Date of Birth:</strong> <?php echo $dob; ?></p>
    <?php } ?>
    <?php if(isset($contactnumber)) { ?>
        <p><strong>Contact Number:</strong> <?php echo $contactnumber; ?></p>
    <?php } ?>
    <br>
    <a href="../view/update-profile.php">Update Profile</a>
    <a href="../view/change-password.php">Change Password</a>
</body>
</html>
