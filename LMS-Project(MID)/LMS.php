<?php
session_start();

if (isset($_POST['userid']) && isset($_POST['cardid'])) {
  $userid = $_POST['userid'];
  $cardid = $_POST['cardid'];

  // Check if user exists in library.txt
  $users = file('library.txt');
  $user = null;
  foreach ($users as $u) {
    $u = explode(',', $u);
    if (trim($u[0]) == $userid && trim($u[1]) == $cardid) {
      $user = $u;
      break;
    }
  }

  if ($user) {
    // Get user data from data.txt
    $data = file('data.txt');
    $userdata = null;
    foreach ($data as $d) {
      $d = explode(',', $d);
      if (trim($d[0]) == $userid) {
        $userdata = $d;
        break;
      }
    }

    if ($userdata) {
      // Save user data in session
      $_SESSION['user'] = [
        'id' => $userid,
        'name' => trim($userdata[1]),
        'email' => trim($userdata[2]),
        'dob' => trim($userdata[3]),
        'photo' => trim($userdata[4])
      ];

      header('Location: index.php');
    } else {
      echo 'User data not found';
    }
  } else {
    echo 'Invalid user ID or card ID';
  }
}
?>
