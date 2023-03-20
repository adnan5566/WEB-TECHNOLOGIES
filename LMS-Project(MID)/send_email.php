<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        die("Please fill all the required fields.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Please enter a valid email address.");
    }


    $date_time = date("Y-m-d H:i:s");
    $email_info = "$date_time|$name|$email|$subject|$message\n";
    file_put_contents("email-support.txt", $email_info, FILE_APPEND);


    setcookie("name", $name, time() + (86400 * 30), "/");
    setcookie("email", $email, time() + (86400 * 30), "/");


    header("Location: thankyou.html");
    exit();
} else {
    die("Invalid request method.");
}
?>