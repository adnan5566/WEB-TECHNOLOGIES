<?php

session_start();

if (!isset($_SESSION['card_id']) || !isset($_SESSION['user_id'])) {
    header('Location: LC.php');
    exit();
}

$card_id = $_SESSION['card_id'];
$user_id = $_SESSION['user_id'];

echo "<h2>Your Library Card ID is: $card_id</h2>";
echo "<p>User ID: $user_id</p>";


unset($_SESSION['card_id']);
unset($_SESSION['user_id']);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Card Issuance</title>
</head>
<body>
    <p>Thank you for using our Library Card Issuance system. Please save this card ID for future use.</p>
    <a href="Library Card.php"><button type="button"><b> Back </b></button></a>

</body>
</html>
