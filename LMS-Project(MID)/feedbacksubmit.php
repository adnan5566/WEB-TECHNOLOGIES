<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $feedback = trim($_POST["feedback"]);

    if (empty($name) || empty($email) || empty($feedback)) {
        die("Please fill all the required fields.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Please enter a valid email address.");
    }


    $feedback_info = "$name,$email,$feedback\n";
    file_put_contents("feedback.txt", $feedback_info, FILE_APPEND);


    setcookie("name", $name, time() + (86400 * 30), "/");
    setcookie("email", $email, time() + (86400 * 30), "/");


    header("Location: fthankyou.php");
    exit();
} else {
    die("Invalid request method.");
}
?>
