<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
</head>
<body>
    <fieldset>
        <legend><h1>Payment</h1></legend>
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
        <form method="post" action="http://localhost/FTP/controller/paymentCheck.php">
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
                <option value="Card Renewal">Lost Book</option>
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