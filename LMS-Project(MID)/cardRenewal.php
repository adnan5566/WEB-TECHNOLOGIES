<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form data
    $lc_id = validate_input($_POST['lc_id']);
    $payment_method = validate_input($_POST['payment_method']);
    $mobile_number = validate_input($_POST['mobile_number']);
    $mobile_pin = validate_input($_POST['mobile_pin']);

    // Load user data from library.txt
    $user_found = false;
    $library_data = file('library.txt');
    $new_library_data = '';
    foreach ($library_data as $line) {
        $line_data = explode(',', $line);
        if (count($line_data) >= 4 && $line_data[0] === $lc_id) {
            $user_found = true;
            $expiry_date = date('Y-m-d', strtotime('+1 month'));
            $price = 100;
            if ($_POST['renewal_duration'] === '3') {
                $expiry_date = date('Y-m-d', strtotime('+3 months'));
                $price = 280;
            } elseif ($_POST['renewal_duration'] === '6') {
                $expiry_date = date('Y-m-d', strtotime('+6 months'));
                $price = 500;
            } elseif ($_POST['renewal_duration'] === '12') {
                $expiry_date = date('Y-m-d', strtotime('+12 months'));
                $price = 800;
            }
            $new_line = "$line_data[0],$line_data[1],$line_data[2],$expiry_date\n";
            $new_library_data .= $new_line;

            // Save payment data to file
            $payment_data = "$lc_id,$price,$payment_method,$mobile_number,$mobile_pin\n";
            file_put_contents('payment.txt', $payment_data, FILE_APPEND);
        } else {
            $new_library_data .= $line;
        }
    }

    // Save updated user data to library.txt
    file_put_contents('library.txt', $new_library_data);

    // Set success message in session
    $_SESSION['renewal_success'] = true;

    // Redirect to LC_Issuance.php with lc_id and email parameters
    header("Location: cardRenewal.php?lc_id=$lc_id&email=$line_data[2]");
    exit();
}

// Function to validate form data
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
    <title>Renewal Form</title>
</head>
<body>
<h1>Renewal Form</h1>
<?php
// Display success message if renewal was successful
if (isset($_SESSION['renewal_success']) && $_SESSION['renewal_success']) {
    echo '<p style="color:green;">Renewal successful!</p>';
    unset($_SESSION['renewal_success']);
}
?>
<form method="post" action="CardRenew.php">
    <label>LC ID:</label>
    <input type="text" name="lc_id"><br>

    <label>Renewal Duration:</label>
    <select name="renewal_duration">
        <option value="1">1 month (100 TK)</option>
        <option value="3">3 months (280 TK)</option>
        <option value="6">6 months (500 TK)</option>
        <option value="12">12 months (800 TK)</option>
    </select><br>

    <label>Payment Method:</label>
    <select name="payment_method">
    <option value="bKash">bKash</option>
    <option value="Rocket">Rocket</option>
    <option value="Nagad">Nagad</option>
    </select><br>

    <label>Mobile Number:</label>
    <input type="text" name="mobile_number"><br>

    <label>Mobile PIN:</label>
    <input type="password" name="mobile_pin"><br>

    <input type="submit" value="Renew">
    </form>
</body>
</html>