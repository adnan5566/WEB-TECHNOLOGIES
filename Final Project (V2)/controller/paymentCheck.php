<?php
session_start();
require_once('../model/paymentModel.php');

$valid_reasons = array('buy_books', 'fine', 'lost_book', 'other');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $lc_id = validate_input($_POST['lc_id']);
    $payment_method = validate_input($_POST['payment_method']);
    $reason = validate_input($_POST['reason']);
    if (!in_array($reason, $valid_reasons)) {
        $_SESSION['payment_error'] = 'Invalid reason for payment.';
        header("Location: paymentmethod.php");
        exit();
    }
    $amount = validate_input($_POST['amount']);
    if (!is_numeric($amount) || $amount <= 0) {
        $_SESSION['payment_error'] = 'Invalid amount.';
        header("Location: paymentmethod.php");
        exit();
    }
    $phone_number = validate_input($_POST['phone_number']);
    if (strlen($phone_number) != 11 || !is_numeric($phone_number)) {
        $_SESSION['payment_error'] = 'Invalid phone number.';
        header("Location: paymentmethod.php");
        exit();
    }
    $pin = validate_input($_POST['pin']);
    if (strlen($pin) != 4 || !is_numeric($pin)) {
        $_SESSION['payment_error'] = 'Invalid pin.';
        header("Location: paymentmethod.php");
        exit();
    }


    $result = make_payment($lc_id, $payment_method, $reason, $amount, $phone_number, $pin);
    if (!$result) {
        $_SESSION['payment_error'] = 'Payment failed.';
        header("Location: paymentmethod.php");
        exit();
    }
    
    $_SESSION['payment_success'] = true;
    header("Location: ../view/Payment/paymentR.php");
    exit();
}

function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>