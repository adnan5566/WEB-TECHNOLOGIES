<?php
require_once('db.php');

function make_payment($lc_id, $payment_method, $reason, $amount, $phone_number, $pin) {
    $conn = getConnection();
    $stmt = $conn->prepare("INSERT INTO payment (lc_id, payment_method, reason, amount, phone_number, pin) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssdss", $lc_id, $payment_method, $reason, $amount, $phone_number, $pin);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}
function get_payment_history($lc_id) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM payment WHERE lc_id = ?");
    $stmt->bind_param("s", $lc_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $payment_history = array();
    while ($row = $result->fetch_assoc()) {
        array_push($payment_history, $row);
    }
    $stmt->close();
    $conn->close();
    return $payment_history;
}


?>