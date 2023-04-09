<?php
require_once '../../model/supportModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        die("Please fill all the required fields.");
    }

    if (!strpos($email, '@') || !strpos($email, '.')) {
        die("Please enter a valid email address.");
    }

    if(addEmail($name, $email, $subject, $message)){
        echo "Email sent successfully!Thank you for contacting our support team. We have received your message and we will respond to you as soon as possible.";
    } else {
        echo "Failed to send email. Please try again later.";
    }
}

?>

