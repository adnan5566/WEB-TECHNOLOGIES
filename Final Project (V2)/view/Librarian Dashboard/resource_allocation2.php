<?php
    session_start();
?>

<!DOCTYPE html>
    <html>
        <head>
	        <title>Resource Allocation - Success</title>
        </head>
        
        <body>
	        <?php if(isset($_SESSION['success'])) { ?>
		    <h2><?php echo $_SESSION['success']; ?></h2>
	        <?php unset($_SESSION['success']); } ?>

	        <a href="resource_allocation.php">Allocate Another Resource</a><br/>
            <a href="Librarian-Dashboard.php"><button type="button"><b> Back </b></button></a>
        </body>
    </html>
