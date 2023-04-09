
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
          <form method="POST" action="../../controller/cardRepleceHendlar.php">
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