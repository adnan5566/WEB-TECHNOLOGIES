<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = validate_input($_POST['user_id']);
    if (!is_valid_user($user_id)) 
    {
        $_SESSION['payment_error'] = 'Invalid user ID.';
        header("Location: paymentHis.php");
        exit();
    }

    $payment_data = get_payment_data($user_id);

    if ($payment_data === false) {
        $_SESSION['payment_error'] = 'Payment data not found.';
        header("Location: paymentHis.php");
        exit();
    }

    $_SESSION['payment_data'] = $payment_data;
    header("Location: paymentHis.php");
    exit();
}

function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function is_valid_user($user_id) {
    return true;
}

function get_payment_data($user_id) {
    $data_file = 'payment.txt';
    $handle = fopen($data_file, 'r');
    $payment_data = array();

    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $payment = explode(',', trim($line));
            if ($payment[0] === $user_id) {
                $payment_data[] = $payment;
            }
        }
        fclose($handle);
    }

    return $payment_data;
}

function display_payment_data($payment_data) {
    echo '<h1>Payment History</h1>';
    echo '<table>';
    echo '<tr><th>User ID</th><th>Payment Method</th><th>Payment Type</th><th>Amount</th><th>Phone Number</th><th>Transaction ID</th></tr>';

    foreach ($payment_data as $payment) {
        echo '<tr>';
        echo '<td>' . $payment[0] . '</td>';
        echo '<td>' . $payment[1] . '</td>';
        echo '<td>' . $payment[2] . '</td>';
        echo '<td>' . $payment[3] . '</td>';
        echo '<td>' . $payment[4] . '</td>';
        echo '<td>' . $payment[5] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment History</title>
</head>
<body>
      <fieldset>
    <?php
    if (isset($_SESSION['payment_error'])) {
        echo '<p>' . $_SESSION['payment_error'] . '</p>';
        unset($_SESSION['payment_error']);
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        User ID: <input type="text" name="user_id"><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    if (isset($_SESSION['payment_data'])) {
        display_payment_data($_SESSION['payment_data']);
        unset($_SESSION['payment_data']);
    }
    ?>
</body>
</html>
