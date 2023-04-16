<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <link rel="stylesheet" href="payment.css">
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
        <form name="paymentForm" method="post" action="../../controller/paymentCheck.php" onsubmit="return validateForm();">
            <label for="lc_id"><b>Library Card ID:</b></label>
            <input type="text" name="lc_id" id="lc_id"><br>
            <label for="phone_number"><b>Phone Number:</b></label>
            <input type="text" name="phone_number" id="phone_number"><br>
            <label for="pin"><b>PIN:</b></label>
            <input type="password" name="pin" id="pin"><br>
            <label for="payment_method"><b>Payment Method:</b></label>
            <select name="payment_method" id="payment_method">
                <option value=""><b>Select Payment Method</b></option>
                <option value="bkash"><b>Bkash</b></option>
                <option value="nagad"><b>Nagad</b></option>
                <option value="rocket"><b>Rocket</b></option>
            </select><br>
            <label for="reason"><b>Reason for Payment:</b></label>
            <select name="reason" id="reason">
                <option value=""><b>Select Reason</b></option>
                <option value="Card Renewal"><b>Renew Card</b></option>
                <option value="buy_books"><b>Buy Books</b></option>
                <option value="fine"><b>Fine</b></option>
                <option value="lost_book"><b>Lost Book</b></option>
                <option value="other"><b>Other</b></option>
            </select><br>
            <label for="amount">Amount:</label>
            <input type="text" name="amount" id="amount"><br>
            <input type="submit" value="Pay">
            <input type="reset" value="Reset"><br>
        </form>
    </fieldset>

    <script>
        function validateForm() {
            var lc_id = document.paymentForm.lc_id.value;
            var phone_number = document.paymentForm.phone_number.value;
            var pin = document.paymentForm.pin.value;
            var payment_method = document.paymentForm.payment_method.value;
            var reason = document.paymentForm.reason.value;
            var amount = document.paymentForm.amount.value;

            if (lc_id == "") {
                alert("Please enter Library Card ID");
                return false;
            }
            if (phone_number == "") {
                alert("Please enter Phone Number");
                return false;
            }
            if (pin == "") {
                alert("Please enter PIN");
                return false;
            }
            if (payment_method == "") {
                alert("Please select Payment Method");
                return false;
            }
            if (reason == "") {
                alert("Please select Reason for Payment");
                return false;
            }
            if (amount == "") {
                alert("Please enter Amount & Amount must be a number");
                return false;
            }

            return true;
        }
    </script>