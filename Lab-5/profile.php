<?php
	if(isset($_COOKIE['flag'])){
?>

<!DOCTYPE html>
	<html>
		<body>
		<table height = "50px" width = "100%"  border="1">
		<tr height = "100px">
		<td colspan="2" > <center>
			<h1>Logged in as <a href="profile.html"> <?=$_COOKIE['user']['uname']?> </a><a href="logout.php">| Logout</a> </h1>
		</center>
		<img src="Xcompany.PNG" width="280" height="150" />
		</td>
	</tr>
	<tr height = "150px">
		<th >
		    Account
		</th>
		<th rowspan="2">
			<fieldset>
			    <legend><b>PROFILE</b></legend>
				<form>
					<br/>
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td>Name</td>
							<td>:</td>
							<td><?=$_COOKIE['user']['name']?></td>
							<td rowspan="7" align="center">
								<img width="128" src="<?=$_COOKIE['user']['picture']?>"/>
				                <br/>
				                <a href="picture.php">Change</a>
							</td>
						</tr>		
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><?=$_COOKIE['user']['email']?></td>
						</tr>		
						<tr><td colspan="3"><hr/></td></tr>			
						<tr>
							<td>Gender</td>
							<td>:</td>
							<td><?=$_COOKIE['user']['gender']?></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Date of Birth</td>
							<td>:</td>
							<td><?=$_COOKIE['user']['day']?> / <?=$_COOKIE['user']['month']?> / <?=$_COOKIE['user']['year']?></td>
						</tr>
					</table>	
			        <hr/>
			        <a href="../write/edit_profile.html">Edit Profile</a>	
				</form>
			</fieldset>
		</th>
	<tr>
		<td>
			<a href="Dashboard.php"><u>. Dashboard</u></a><br>
			<a href="profile.php"><u>. View Profile</u></a><br>
			<a href="edit_profile.php"><u>. Edit Profile</u></a><br>
			<a href="picture.php"><u>. Change Profile Picture</u></a><br>
			<a href="change_password.html"><u>. Change Password</u></a><br>
			<a href="logout.php"><u>. Logout</u></a><br>
			<br>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2">
	        Copyright(C) 2017
	    </td>
	</tr>

		</table>
	</body>
</html>


<?php
	} else {
		header('location: ../view/login.php');
	}
?>