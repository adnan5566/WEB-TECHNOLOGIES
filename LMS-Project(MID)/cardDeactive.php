<?php
if(isset($_POST['submit'])) {
  $cardid = $_POST['card_number'];
  
  // Open library.txt file for reading and writing
  $library_file = fopen("library.txt", "r+");
  
  // Create an empty array to store library data
  $library_data = array();
  
  // Loop through each line of the file and add data to the array
  while (!feof($library_file)) {
    $line = fgets($library_file);
    $data = explode(",", $line);
    $library_data[] = $data;
  }
  
  // Find the index of the card ID in the array
  $card_index = -1;
  for ($i = 0; $i < count($library_data); $i++) {
    if ($library_data[$i][0] === $cardid) {
      $card_index = $i;
      break;
    }
  }
  
  // If the card ID was found, update the status to "deactivated"
  if ($card_index >= 0) {
    $library_data[$card_index][4] = "deactivated";
    
    // Write the updated library data back to the file
    ftruncate($library_file, 0);
    rewind($library_file);
    foreach ($library_data as $data) {
      $line = implode("|", $data) . "\n";
      fwrite($library_file, $line);
    }
    
    // Close the file
    fclose($library_file);
    
    // Output success message
    echo "Card $cardid has been deactivated.";
  } else {
    // Close the file
    fclose($library_file);
    
    // Output error message
    echo "Card $cardid not found.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Deactivate Card</title>
</head>
<body>
  <h1>Deactivate Card</h1>
  <form method="POST">
    <label for="card_number">Card Number:</label>
    <input type="text" id="card_number" name="card_number">
    <br>
    <button type="submit" name="submit">Deactivate</button>
  </form>
</body>
</html>

