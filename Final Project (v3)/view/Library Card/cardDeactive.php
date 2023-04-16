<!DOCTYPE html>
  <html>
    <head>
      <title>Deactivate Card</title>
      <link rel="stylesheet" href="LibraryCard.css">
    </head>
    <body>
      <fieldset>
        <legend><h1>Deactivate Card</h1></legend>
        <form method="POST" action="../../controller/CardDeactivateHendlar.php" onsubmit="return validateForm();">
          <label for="card_number"><b>Card Number:</b></label>
          <input type="text" id="card_number" name="card_number">
          <br/>
          <button type="submit" name="submit">Deactivate</button>
        </form>
      </fieldset>
    </body>
  </html>

  
  <script>
    function validateForm() {
      var cardNumber = document.getElementById('card_number').value;
      if (cardNumber == "") {
        alert("Please enter card number");
        return false;
      }
    }
  </script>
