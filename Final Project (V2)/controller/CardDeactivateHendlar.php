<?php

require_once "../model/lcModel.php";

if (isset($_POST['submit'])) {
    $lc_id = $_POST['card_number'];

    if (deactivateLibraryCard($lc_id)) {
        echo "Card deactivated successfully.";
    } else {
        echo "Error deactivating card.";
    }
}

?>
