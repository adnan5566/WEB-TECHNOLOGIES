<?php
session_start();


function generateUserID() {
  return 'B-' . sprintf('%04d', rand(0, 9999));
}

if(isset($_POST['submit'])) {

  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $dob = $_POST['dob'];
  $password = $_POST['password'];
  
  if(empty($name) || empty($email) || empty($dob) || empty($password)) {
    echo "<b>All fields are required!</b>";
    exit();
  }
  
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<h2>Invalid email format!</h2>";
    exit();
  }
  

  $userid = generateUserID();
  

  $user_file = fopen('user.txt', 'a');
  $user_data = "$userid,$name,$email,$dob,$password\n";
  fwrite($user_file, $user_data);
  fclose($user_file);
  

  $_SESSION['userid'] = $userid;
  

  header('Location: registration.php');
  exit;

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration Complete</title>
</head>
<body>
  <h1>Registration Complete</h1>
  <h2>Your user ID is: <?php echo $_SESSION['userid']; ?></h2>
  <p>Thank you for registering!</p>
  <a href="login.php"><button type="button">Login</button></a>
</body>
</html>