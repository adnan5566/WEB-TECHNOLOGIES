<?php
if(isset($_POST['submit'])) {
  $lc_id = $_POST['card_number'];
  
 
  $library_file = fopen("library.txt", "r+");
  

  $library_data = array();
  

  while (!feof($library_file)) {
    $line = fgets($library_file);
    $data = explode(",", $line);
    $library_data[] = $data;
  }
  

  $card_index = -1;
  for ($i = 0; $i < count($library_data); $i++) {
    if ($library_data[$i][0] === $lc_id) {
      $card_index = $i;
      break;
    }
  }
  

  if ($card_index >= 0 && $library_data[$card_index][6] === "deactivated") {
    unset($library_data[$card_index]);
    

    ftruncate($library_file, 0);
    rewind($library_file);
    foreach ($library_data as $data) {
      $line = implode(",", $data) . "\n";
      fwrite($library_file, $line);
    }
    

    fclose($library_file);
    

    echo "Card $lc_id has been reactivated.";
  } else {

    fclose($library_file);
    

    echo "Card $lc_id has been reactivated.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Reactivate Card</title>
</head>
<body>
  <h1>Reactivate Card</h1>
  <form method="POST">
    <label for="card_number">Card Number:</label>
    <input type="text" id="card_number" name="card_number">
    <br>
    <button type="submit" name="submit">Reactivate</button>
  </form>
</body>
</html>
