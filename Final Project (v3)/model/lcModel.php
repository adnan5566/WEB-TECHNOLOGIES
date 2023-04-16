<?php

require_once "db.php";
require_once "userModel.php";

function addLibraryCard($userid) {
    $conn = getConnection();

    $user = getUserById($userid);
    if (!$user) {
        die('User not found. Please check your User ID and email and try again.');
    }

    $card_id = generateLibraryCardId();

    $sql = "INSERT INTO librarycardbd (userid, lc_id, status) VALUES ('$userid', '$card_id', 'active')";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        return $card_id;
    } else {
        echo "Error: " . mysqli_error($conn);
        mysqli_close($conn);
        return null;
    }
}

function generateLibraryCardId() {
    $card_id = 'LC-' . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
    return $card_id;
}



function deactivateLibraryCard($lc_id) {
    $conn = getConnection();

    $sql = "UPDATE librarycardbd SET status='deactivate' WHERE lc_id='$lc_id'";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        return true;
    } else {
        echo "Error: " . mysqli_error($conn);
        mysqli_close($conn);
        return false;
    }
}


function reactivateLibraryCard($card_number) {
    $conn = getConnection();

    $sql = "UPDATE librarycardbd SET status='active' WHERE lc_id='$card_number'";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        return true;
    } else {
        echo "Error: " . mysqli_error($conn);
        mysqli_close($conn);
        return false;
    }
}



function replaceLibraryCard($card_number, $replacement_reason) {
    $conn = getConnection();
    $sql = "UPDATE library_card SET card_status='Inactive', replacement_reason='$replacement_reason' WHERE card_number='$card_number'";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}
function isValidCardNumber($card_number) {
    return preg_match('/^LC-\d{4}$/', $card_number) === 1;
}


?>
