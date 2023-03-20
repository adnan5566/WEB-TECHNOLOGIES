<!DOCTYPE html>
    <html>
        <head>
	        <title>View Feature</title>
        </head>
        <body>
	        <fieldset>
                <legend><h1>View Feature</h1></legend>
                    <form method="post" action="View.php" >
		                <label for="feature_id">Feature ID:</label>
		                <input type="text" id="feature_id" name="feature_id"><br><br>
		                <input type="submit" name="submit" value="View">
	                </form>
	        <?php
	            if (isset($_POST['submit'])) {
		            $feature_id = $_POST['feature_id'];
                    $features = file('features.txt');
	
                foreach ($features as $feature) {
                    $feature_parts = explode('|', $feature);
                if ($feature_parts[1] == $feature_id) {
                    echo "<h2>" . $feature_parts[0] . "</h2>";
                    echo "<p>" . $feature_parts[2] . "</p>";
            }
        }
    }
            ?>

            </fieldset>
        </body>
    </html>