<?php
session_start();

$errors = [];

if(isset($_POST['submit'])) {
    $lc_id = trim($_POST['card_number']);
    $replacement_reason = trim($_POST['replacement_reason']);

    
    if(empty($lc_id)) {
        $errors[] = "Card number is required";
    } else {
        $valid_card = false;
        $library_file = fopen('library.txt', 'r');
        while(!feof($library_file)){
            $line = fgets($library_file);
            $data = explode(',', $line);
            if(trim($data[0]) === $lc_id){
                $valid_card = true;
                break;
            }
        }
        fclose($library_file);
        if(!$valid_card){
            $errors[] = "Invalid Card ID!";
        }
    }

   
    if(empty($replacement_reason)) {
        $errors[] = "Reason for replacement is required";
    }

    
    if(empty($errors)) {
        $replacement_file = fopen('card-replacement.txt', 'a');
        $userid = $_SESSION['userid'];
        $timestamp = date("Y-m-d H:i:s");
        $replacement_data = "$lc_id|$user_id|$replacement_reason|$timestamp\n";
        fwrite($replacement_file, $replacement_data);
        fclose($replacement_file);

        

        header('Location: CR.php');
        exit;
    }
}
?>
<!DOCTYPE html>
    <html>
      <head>
          <title>Card Replacement</title>
      </head>
      <body>
        <fieldset>
            <legend><h1>Card Replacement</h1></legend>
            <?php if(!empty($errors)): ?>
            <div">
                <?php foreach($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
          <form method="POST">
            <label for="card_number">Card Number:</label>
            <input type="text" id="card_number" name="card_number" value="<?php echo isset($_POST['card_number']) ? $_POST['card_number'] : ''; ?>">
            <br>
            <label for="replacement_reason">Reason for Replacement:</label>
            <textarea id="replacement_reason" name="replacement_reason"><?php echo isset($_POST['replacement_reason']) ? $_POST['replacement_reason'] : ''; ?></textarea>
            <br>
            <button type="submit" name="submit">Submit</button>
        </form>
    </fieldset>
</body>
</html> 