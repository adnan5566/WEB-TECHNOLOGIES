<?php

require_once "../model/lcModel.php";

$errors = [];

if (isset($_POST['submit'])) {
    $card_number = $_POST['card_number'];
    $replacement_reason = $_POST['replacement_reason'];

    if (empty($card_number)) {
        $errors[] = 'Card Number is required.';
    } elseif (!isValidCardNumber($card_number)) {
        $errors[] = 'Invalid Card Number format. Card Number should start with "LC-" followed by a 4 digit number.';
    }

    if (empty($replacement_reason)) {
        $errors[] = 'Reason for Replacement is required.';
    }

    if (empty($errors)) {
        $result = replaceLibraryCard($card_number, $replacement_reason);
        if ($result) {
            echo 'Card Replacement request has been submitted successfully.';
        } else {
            echo 'An error occurred while submitting the Card Replacement request. Please try again.';
        }
    }
}


?>
