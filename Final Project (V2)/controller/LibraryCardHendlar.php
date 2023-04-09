<?php
session_start();
require_once "../model/userModel.php";
require_once "../model/lcModel.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userid = validate_input($_POST['userid']);
    $email = validate_input($_POST['email']);

    $user = getUserById($userid);
    if (!$user || $user['email'] !== $email) {
        die('User not found. Please check your User ID and email and try again.');
    }

    $card_id = generateLibraryCardId();

    if (!$card_id) {
        die('Failed to generate library card.');
    }

    $result = addLibraryCard($userid);

    if (!$result) {
        die('Failed to issue library card.');
    }

    $_SESSION['card_id'] = $card_id;
    $_SESSION['user_id'] = $userid;

    header('Location: ../view/Library Card/LC_Issuance.php');
    exit();
}

function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
