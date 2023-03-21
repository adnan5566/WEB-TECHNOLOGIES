<?php
	if(isset($_POST['submit'])) {

		$uname = $_POST['uname'];
		$password = $_POST['password'];
        $remember = isset($_POST['remember']) ? $_POST['remember'] : '';

		if($uname != '' && $password != '') {
			if($_COOKIE['uname'] == $uname && $_COOKIE['password'] == $password){
				if($remember == 'on') {
					setcookie('uname', $uname, time()+3600*24*30);
					setcookie('password', $password, time()+3600*24*30);
				}
				header('location: Dashboard.php');
			}
			else{
				echo 'invalid username/password';
			}
		}
		else{
			echo "null value found...";
		}
	}
	else{
		echo "invalid request...";
	}
?>
