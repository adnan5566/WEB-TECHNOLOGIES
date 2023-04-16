<!DOCTYPE html>
  <html>
    <head>
      <title>Reactivate Card</title>
      <link rel="stylesheet" href="LibraryCard.css">
    </head>
    <body>
      <fieldset>
          <Legend><h1>Reactivate Card</h1></Legend>
        <form method="POST" action="../../controller/cardReactivationHendlar.php" onsubmit="return validateForm();">
          <label for="card_number"><b>Card Number:</b></label>
          <input type="text" id="card_number" name="card_number">
          <br/>
          <button type="submit" name="submit">Reactivate</button>
        </form>
      </fieldset>
    </body>
  </html>

  <script>
    function validateForm() {
      var cardNumber = document.getElementById("card_number").value;
      if (cardNumber == "") {
        alert("Please enter card number");
        return false;
      }
      return true;
    }
  </script>
