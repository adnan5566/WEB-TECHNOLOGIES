<?php

function generateUserID() {
    return 'U-' . sprintf('%04d', rand(0, 9999));
}
?>
