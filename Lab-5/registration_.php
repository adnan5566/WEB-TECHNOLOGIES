<?php
	if(isset($_POST['submit'])){

		$name       = $_POST['name'];
		$uname      = $_POST['uname'];
		$email      = $_POST['email'];
		$password   = $_POST['password'];
		$gender     = $_POST['gender'];
		$day        = $_POST['day'];
		$month      = $_POST['month'];
		$year       = $_POST['year'];
		$picture    = $_POST['picture'];

	if($name != '' && $uname != '' && $password != '' && $email != '' && $gender !='' && $day != '' && $month != '' && $year != ''  )
	{
		$user =['name'=>$name, 'email'=>$email , 'uname'=> $uname , 'password'=>$password , 'picture'=>$picture, 'gender'=>$gender , 'day'=>$day , 'month'=>$month, 'year'=>$year ];
	
		setcookie('name', $name, time() + 3600); 
		setcookie('email', $email, time() + 3600);
		setcookie('uname', $uname, time() + 3600);
		setcookie('password', $password, time() + 3600);
		setcookie('picture', $picture, time() + 3600);
		setcookie('gender', $gender, time() + 3600);
		setcookie('day', $day, time() + 3600);
		setcookie('month', $month, time() + 3600);
		setcookie('year', $year, time() + 3600);

		header('location: Login.html');
	} 	
		else 
		{
			echo "null value found...";
		}
	} 
		else 
		{
			header('location: Login.html');
		}
?>