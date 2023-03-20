<?php
  session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    
    {

	        $type = $_POST['type'];
	        $title = $_POST['title'];
	        $author = $_POST['author'];
	        $year = $_POST['year'];
	        $quantity = $_POST['quantity'];

	
	    if (empty($title))
        {
		    $_SESSION['error'] = 'Please enter a title';
		    header('Location: resource_allocation.php');
		    exit;
	    }

	    if (empty($author)) 
        {
		    $_SESSION['error'] = 'Please enter an author';
		    header('Location: resource_allocation.php');
		    exit;
	    }

	    if (empty($year)) 
        {
		    $_SESSION['error'] = 'Please enter a year';
		    header('Location: resource_allocation.php');
		    exit;
	    }

	    if (empty($quantity) || $quantity <= 0) 
        {
		    $_SESSION['error'] = 'Please enter a valid quantity';
		    header('Location: resource_allocation.php');
		    exit;
	    }

	
	        $data = array(
		        'title' => $title,
		        'author' => $author,
		    'year' => $year,
		    'quantity' => $quantity,);


	    if ($type == 'book')
        {
		    $file_name = 'RAbook.txt';
	    }     
        
        elseif ($type == 'journal') 
        {
		$file_name = 'RAjournal.txt';
	    }

	
	        $existing_records = file($file_name, FILE_IGNORE_NEW_LINES);
	        foreach ($existing_records as $key => $record) 
            {
		          $record_array = explode(',', $record);
		        if ($record_array[0] == $title && $record_array[1] == $author && $record_array[2] == $year)
                {
			        $existing_records[$key] = $title . ',' . $author . ',' . $year . ',' . ($record_array[3] + $quantity);
			        $data = NULL;
			    break;
		        }
	        }

	
	        if ($data) 
            {
		        $existing_records[] = implode(',', $data);
	        }

	
	        $file_handle = fopen($file_name, 'w');
	        foreach ($existing_records as $record) 
            {
		        fwrite($file_handle, $record . PHP_EOL);
	        }
	            fclose($file_handle);

	            $_SESSION['success'] = 'Resource allocation saved successfully';
	            header('Location: resource_allocation2.php');
	            exit;

    } 
    
    else 
    {
	    header('Location: resource_allocation.php');
	    exit;
    }
?>