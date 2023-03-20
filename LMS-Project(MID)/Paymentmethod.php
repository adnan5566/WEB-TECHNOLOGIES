<?php
session_start();


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
    
    $file = fopen('payment.txt', 'a'); // Open file in append mode
    $payment_data = "$lc_id,$payment_method,$reason,$amount,$phone_number,$pin\n";
    fwrite($file, $payment_data); // Write data to file
    fclose($file); // Close file
    
    
    $_SESSION['payment_success'] = true;
    header("Location: paymentmethod.php");
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
    <title>Library Payment</title>
</head>
<body>
    <fieldset>
        <legend><h1>Library Payment</h1></legend>
        <?php
        if (isset($_SESSION['payment_error'])) {
            echo '<p>' . $_SESSION['payment_error'] . '</p>';
            unset($_SESSION['payment_error']);
        }
        if (isset($_SESSION['payment_success']) && $_SESSION['payment_success']) {
            echo '<p>Payment successful!</p>';
            unset($_SESSION['payment_success']);
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="lc_id">Library Card ID:</label>
            <input type="text" name="lc_id" id="lc_id"><br>
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" id="phone_number"><br>
            <label for="pin">PIN:</label>
            <input type="password" name="pin" id="pin"><br>
            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" id="payment_method">
                <option value="">Select Payment Method</option>
                <option value="bkash">Bkash</option>
                <option value="nagad">Nagad</option>
                <option value="rocket">Rocket</option>
            </select><br>
            <label for="reason">Reason for Payment:</label>
            <select name="reason" id="reason">
                <option value="">Select Reason</option>
                <option value="buy_books">Buy Books</option>
                <option value="fine">Fine</option>
                <option value="lost_book">Lost Book</option>
                <option value="other">Other</option>
            </select><br>
            <label for="amount">Amount:</label>
            <input type="text" name="amount" id="amount"><br>
            <input type="submit" value="Pay">
            <input type="reset" value="Reset"><br>
        </form>
    </fieldset>
</body>
</html>