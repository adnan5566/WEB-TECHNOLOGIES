<?php
session_start();

if(isset($_POST['submit'])) {

  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  
  if(empty($email)) {
    echo "<b>Email field is required!</b>";
    exit();
  }
  
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<h2>Invalid email format!</h2>";
    exit();
  }
  l
  $user_found = false;
  $data_file = 'data.txt';
  $handle = fopen($data_file, 'r');
  if ($handle) {
    while (($line = fgets($handle)) !== false) {
      $user_data = explode(',', trim($line));
      if ($user_data[2] === $email) {
        $user_found = true;

        $new_password = generatePassword();
        $user_data[4] = $new_password;
        $new_user_data = implode(',', $user_data);
        update_user_data($data_file, $line, $new_user_data);

        send_email($email, $new_password);
        echo "<h2>A new password has been sent to your email address.</h2>";
        break;
      }
    }
    fclose($handle);
  }
  
  if (!$user_found) {
    echo "<h2>No user with that email was found.</h2>";
  }

  exit;
}

function generatePassword() {
  $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  $pass = array(); 
  $alphaLength = strlen($alphabet) - 1; 
  for ($i = 0; $i < 8; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
  }
  return implode($pass); 
}

function update_user_data($data_file, $old_line, $new_line) {
  $file_contents = file_get_contents($data_file);
  $file_contents = str_replace($old_line, $new_line, $file_contents);
  file_put_contents($data_file, $file_contents);
}

function send_email($to_email, $new_password) {
  $subject = 'New Password for Your Account';
  $message = 'Your new password is: ' . $new_password;
  $headers = 'From: noreply@example.com' . "\r\n" .
    'Reply-To: noreply@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

  mail($to_email, $subject, $message, $headers);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Forget Password</title>
</head>
<body>
	<fieldset><legend><h1>Forget Password</h1></legend>
		<form method="post" action="reset_password.php">
			<label>Email:</label>
			<input type="email" name="email"><br/>
			<b><input type="submit" name="submit" value="Reset Password"></b>
			<input type="reset" value="Reset"><br/>
		</form>
	</fieldset>
</body>
</html>
