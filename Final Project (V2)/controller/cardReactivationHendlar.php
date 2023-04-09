<?php

require_once "../model/lcModel.php";

if (isset($_POST["submit"])) {
    $card_number = $_POST["card_number"];

    if ( reactivateLibraryCard($card_number)) {
        echo "Card reactivated successfully";
    } else {
        echo "Error reactivating card";
    }
}

?>
