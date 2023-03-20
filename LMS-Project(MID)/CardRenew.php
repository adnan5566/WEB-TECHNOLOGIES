<?php
    session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
                $lc_id = validate_input($_POST['lc_id']);
                $payment_method = validate_input($_POST['payment_method']);
                $mobile_number = validate_input($_POST['mobile_number']);
                $mobile_pin = validate_input($_POST['mobile_pin']);
                $renewal_duration = validate_input($_POST['renewal_duration']);

    
                $user_found = false;
                $library_data = file('library.txt');
                $new_library_data = '';
            foreach ($library_data as $line) {
                $line_data = explode(',', $line);

            if (count($line_data) >= 4 && $line_data[0] === $lc_id) {
                $user_found = true;
                $expiry_date = date('Y-m-d', strtotime("+{$renewal_duration} months"));
                $price = get_renewal_price($renewal_duration);
                $new_line = "$line_data[0],$line_data[1],$line_data[2],$expiry_date\n";
                $new_library_data .= $new_line;

                $payment_data = "$lc_id,$price,$payment_method,$mobile_number,$mobile_pin\n";
                file_put_contents('payment.txt', $payment_data, FILE_APPEND);
        } else {
            $new_library_data .= $line;
        }
    }

            if (!$user_found) {
                 $_SESSION['renewal_error'] = 'Library card not found!';
    }       else {

                file_put_contents('library.txt', $new_library_data);

                $_SESSION['renewal_success'] = true;

                header("Location: cardRenew.php?lc_id=$lc_id");
                exit();
    }
}


                function get_renewal_price($duration) {
            if ($duration === '1') {
                return 100;
    }       elseif ($duration === '3') {
                return 280;
    }       elseif ($duration === '6') {
                return 500;
    }       elseif ($duration === '12') {
                return 800;
    }       else {
            return 0;
    }
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
                <title>Library Card Renewal</title>
            </head>
            <body>
            <fieldset><legend><h1>Library Card Renewal</h1></legend>
        <?php

            if (isset($_SESSION['renewal_error'])) {
                echo '<p>' . $_SESSION['renewal_error'] . '</p>';
                unset($_SESSION['renewal_error']);
}


            if (isset($_SESSION['renewal_success']) && $_SESSION['renewal_success']) {
                echo '<p>Renewal successful!</p>';
                unset($_SESSION['renewal_success']);
}
?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <label for="lc_id">Library Card ID:</label>
                    <input type="text" name="lc_id" id="lc_id"><br>
                    <label for="payment_method">Payment Method:</label>
                    <select name="payment_method" id="payment_method" >
                    <option value="">Select Payment Method</option>
                    <option value="credit_card">Bkash</option>
                    <option value="debit_card">Nagad</option>
                    <option value="mobile_money">Rocket</option>
                    </select><br/>

                    <label for="mobile_number">Mobile Number:</label>
                    <input type="tel" name="mobile_number" id="mobile_number" pattern="[0-9]{11}"><br>

                    <label for="mobile_pin">Mobile PIN:</label>
                    <input type="password" name="mobile_pin" id="mobile_pin" pattern="[0-9]{4}"><br>

                    <label for="renewal_duration">Renewal Duration:</label>
                    <select name="renewal_duration" id="renewal_duration">
                    <option value="">Select Duration</option>
                    <option value="1">1 Month (Rs. 100)</option>
                    <option value="3">3 Months (Rs. 280)</option>
                    <option value="6">6 Months (Rs. 500)</option>
                    <option value="12">12 Months (Rs. 800)</option>
                    </select><br>

                    <input type="submit" value="Renew Card">
                    <input type="reset" value="Reset"><br/>

                </form>
            </body>
        </html>