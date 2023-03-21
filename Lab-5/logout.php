<?php
    if(isset($_COOKIE['flag'])){
        unset($_COOKIE['flag']);
        setcookie('flag', null, -1, '/');
    }
    header('location: login.html');
?>
