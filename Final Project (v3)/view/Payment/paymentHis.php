<?php
session_start();
require_once('../../model/paymentModel.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lc_id = validate_input($_POST['lc_id']);
    $payment_history = get_payment_history($lc_id);
}

function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<html>
<head>
    <title>Payment History</title>
    <link rel="stylesheet" href="payment.css">
</head>
<body>
    <fieldset>
    <h2>Payment History</h2>
    <?php if (isset($payment_history)): ?>
        <?php if (count($payment_history) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Payment Method</th>
                        <th>Reason</th>
                        <th>Amount</th>
                        <th>Phone Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($payment_history as $payment): ?>
                        <tr>
                            <td><?= $payment['payment_method'] ?></td>
                            <td><?= $payment['reason'] ?></td>
                            <td><?= $payment['amount'] ?></td>
                            <td><?= $payment['phone_number'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No payment history found for the provided LC ID.</p>
        <?php endif ?>
    <?php endif ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm();">
        LC ID: <input type="text" name="lc_id"><br/>
        <input type="submit" value="Get Payment History">
    </form>
        </fieldset>
</body>
</html>



<script>
    function validateForm() {
        var lc_id = document.getElementsByName('lc_id')[0].value;
        if (lc_id == "") {
            alert("Please enter a Library Card ID.");
            return false;
        }
        return true;
    }
</script>

