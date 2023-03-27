<?php 
    session_start();
    unset($_COOKIE['rememberMe']);
    setcookie('rememberMe',0,time()-3600,'/');
    $_SESSION=[];
    header('location: login.php');
?>