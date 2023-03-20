<!DOCTYPE html>
<html>
<head>
  <title>Librarian Profile</title>
</head>
<body>
  <h1>Librarian Profile</h1>
  <?php
    session_start();
    $error_msg = '';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // check if the userid is valid
      if (preg_match('/^L-\d{5}$/', $_POST['userid'])) {
        // read data from data.txt
        $data_file = fopen('data.txt', 'r');
        $librarian_found = false;
        while (!feof($data_file)) {
          $line = fgets($data_file);
          $fields = explode(',', $line);
          if ($fields[0] === $_POST['userid']) {
            $librarian_found = true;
            echo '<p>Name: '.$fields[1].'</p>';
            echo '<p>Email: '.$fields[2].'</p>';
            echo '<p>Photo: <img src="'.$fields[3].'" alt="Librarian Photo"></p>';
            echo '<p>Date of Birth: '.$fields[4].'</p>';
            break;
          }
        }
        fclose($data_file);
        
        if (!$librarian_found) {
          $error_msg = 'Librarian not found.';
        }
      } else {
        $error_msg = 'Invalid userid. The userid must be in the format L-XXXXX, where X is a digit.';
      }
    }
  ?>
  <form method="post">
    <label for="userid">User ID:</label>
    <input type="text" id="userid" name="userid">
    <button type="submit">View Profile</button>
  </form>
  <?php
    if ($error_msg !== '') {
      echo '<p>Error: '.$error_msg.'</p>';
    }
  ?>
</body>
</html>
