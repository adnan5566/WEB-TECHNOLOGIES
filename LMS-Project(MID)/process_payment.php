<?php
// start the session
session_start();

// validate that the form was submitted
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Invalid request');
}

// validate that the user selected a payment method
if (!isset($_SESSION['payment_method'])) {
    die('Payment method not selected');
}

// read user ID and card ID from library.txt
$library_file = fopen('library.txt', 'r');
$library_data = [];
while ($line = fgets($library_file)) {
    $line_data = explode(',', $line);
    $library_data[$line_data[0]] = $line_data[1];
}
fclose($library_file);

$user_id = $_POST['userid'];
$card_id = $_POST['cardid'];

// validate that the user ID and card ID are in the library data
if (!isset($library_data[$user_id]) || $library_data[$user_id] != $card_id) {
    die('Invalid user ID or card ID');
}

// process the payment based on the selected payment method
if ($_SESSION['payment_method'] == 'card') {
    $card_number = $_POST['cardnumber'];
    $card_pin = $_POST['cardpin'];

    // validate that the card number and pin are not empty
    if ($card_number == '' || $card_pin == '') {
        die('Card number and pin are required');
    }

    // store payment details in payment.txt
    $payment_file = fopen('payment.txt', 'a');
    fwrite($payment_file, "Payment method: Card\n");
    fwrite($payment_file, "User ID: $user_id\n");
    fwrite($payment_file, "Card ID: $card_id\n");
    fwrite($payment_file, "Card number: $card_number\n");
    fwrite($payment_file, "Card pin: $card_pin\n");
    fwrite($payment_file, "\n");
    fclose($payment_file);

    // display payment confirmation
    echo "<h1>Payment Successful</h1>";
    echo "<p>Thank you for your payment using card.</p>";
} else {
    $phone_number = $_POST['phonenumber'];
    $phone_pin = $_POST['phonepin'];

    // validate that the phone number and pin are not empty
    if ($phone_number == '' || $phone_pin == '') {
        die('Phone number and pin are required');
    }

    // store payment details in payment.txt
    $payment_file = fopen('payment.txt', 'a');
    fwrite($payment_file, "Payment method: {$_SESSION['payment_method']}\n");
    fwrite($payment_file, "User ID: $user_id\n");
    fwrite($payment_file, "Card ID: $card_id\n");
    fwrite($payment_file, "Phone number: $phone_number\n");
    fwrite($payment_file, "Phone pin: $phone_pin\n");
    fwrite($payment_file, "\n");
    fclose($payment_file);

    // display payment confirmation
    echo "<h1>Payment Successful</h1>";
    echo "<p>Thank you for your payment using {$_SESSION['payment_method']}.</p>";
}

// clear the session
session_unset();
session_destroy();
?>
