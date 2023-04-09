<?php
    require_once('../model/userModel.php');
    require_once('../model/db.php');

    if(isset($_POST['submit'])) {
        $userid = trim($_POST['userid']);
        $password = trim($_POST['password']);

        if (empty($userid)) {
            echo "<b>Please enter your UserID.</b> <br>";
        }

        if (empty($password)) {
            echo "<b>Please enter your password.</b> <br>";
        } 

        if(empty($userid) || empty($password)) {
            exit();
        }

        $user = getUserByuserId($userid);

        if(!$user) {
            echo "<h2>Invalid User ID!</h2>";
            exit();
        }

        if(!isset($user['password']) || $password !== $user['password']) {
            echo "<h2>Login Failed!</h2>";
            echo "<p>Please check your Password then try again.</p>";
            exit();
        }

        if(substr($userid, 0, 2) == 'U-') {
            setcookie('userid', $userid, time()+5000);
            header('Location:../view/Adnan.php');
            exit();
        } elseif(substr($userid, 0, 2) == 'L-') {
            setcookie('userid', $userid, time()+5000);
            header('Location:../view/Librarian DashBoard/librarian-Dashboard.php');
            exit();
        } elseif(substr($userid, 0, 2) == 'A-') {
            setcookie('userid', $userid, time()+5000);
            header('Location:../view/admin.php');
            exit();
        }
    }
?>
