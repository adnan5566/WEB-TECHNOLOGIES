<!DOCTYPE html>
<html>
  <head>
    <title>Card Replacement</title>
    <link rel="stylesheet" href="LibraryCard.css">
  </head>
  <body>
    <fieldset>
      <legend><h1>Card Replacement</h1></legend>
      <?php if(!empty($errors)): ?>
        <div>
          <?php foreach($errors as $error): ?>
            <p><?php echo $error; ?></p>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <form method="POST" action="../../controller/cardRepleceHendlar.php" onsubmit="return validateForm();">
        <label for="card_number"><b>Card Number:</b></label>
        <input type="text" id="card_number" name="card_number" value="<?php echo isset($_POST['card_number']) ? $_POST['card_number'] : ''; ?>">
        <br>
        <label for="replacement_reason"><b>Reason for Replacement:</b></label>
        <textarea id="replacement_reason" name="replacement_reason"><?php echo isset($_POST['replacement_reason']) ? $_POST['replacement_reason'] : ''; ?></textarea>
        <br>
        <button type="submit" name="submit"><b>Submit</b></button>
      </form>
    </fieldset>
  </body>
</html>



    <script>
      function validateForm() {
        var cardNumber = document.getElementById("card_number").value;
        var reason = document.getElementById("replacement_reason").value;
        
        if (cardNumber == "") {
          alert("Please enter card number");
          return false;
        }
        
        if (reason == "") {
          alert("Please enter a reason for replacement");
          return false;
        }
        
        return true;
      }
    </script>
