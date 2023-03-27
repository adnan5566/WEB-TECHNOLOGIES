<!DOCTYPE html>
    <html>
		<head>
	        <title></title>
        </head>
		<body>
	        <fieldset>
				<legend><h1></h1></legend>
					
					<b><a href="View.php">View Features</a><br/>
					<hr>
					<a href="logout.php">Logout</a><br/></b>
			</fieldset>	
		</body>

        <head>
	        <title>Create Feature</title>
        </head>

        <body>
	        <fieldset>
                <legend><h1>Create Feature</h1></legend>

                    <form method="post" action="Dashboard.php" >
		                <label for="feature_name">Feature Name:</label>
		                <input type="text" id="feature_name" name="feature_name"><br/>
		                <label for="feature_id">Feature ID:</label>
		                <input type="text" id="feature_id" name="feature_id"><br/>
		                <label for="feature_details">Feature Details:</label><br/>
		                <textarea id="feature_details" name="feature_details"></textarea><br/>
		                <input type="submit" name="submit" value="Create">
	                </form>
                <?php
	                if (isset($_POST['submit'])) 
                    {
		            $feature_name = $_POST['feature_name'];
		            $feature_id = $_POST['feature_id'];
		            $feature_details = $_POST['feature_details'];

		            $file = fopen("features.txt", "a");
		            fwrite($file, $feature_name . "|" . $feature_id . "|" . $feature_details . "\n");
		            fclose($file);

		            echo "<p>Feature Created Successfully!</p>";
	                }
    
	            ?>
                
                
                </fieldset>
	


				
			<head>
				<title>Delete Feature</title>
			</head>
			<body>
				<fieldset>
        			<legend><h1>Delete Feature</h1></legend>
        				<form method="post" action="DeleteFeatures.php">
							<label for="feature_id">Feature ID:</label>
							<input type="text" id="feature_id" name="feature_id"><br><br>
							<label for="feature_name">Feature Name:</label>
							<input type="text" id="feature_name" name="feature_name"><br><br>
							<input type="submit" name="submit" value="Delete">
						</form>
   					 </fieldset>
				</body>
			
			<head>
	        	<title>Update Feature</title>
        	</head>
        	<body>
	        	<fieldset>
                	<legend><h1>Update Feature</h1></legend>
                    	<form  method="post" action="Update.php">
		                	<label for="feature_id">Feature ID:</label>
		                	<input type="text" id="feature_id" name="feature_id"><br><br>
		                	<label for="new_feature_name">New Feature Name:</label>
		                	<input type="text" id="new_feature_name" name="new_feature_name"><br><br>
		                	<label for="new_feature_details">Update Feature Details:</label><br>
		                	<textarea id="new_feature_details" name="new_feature_details"></textarea><br><br>
		                	<input type="submit" name="submit" value="Update">


	                	</form>
            	</fieldset>
			

		</body>
	</html>