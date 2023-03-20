<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (empty($_POST['title'])) {
		$_SESSION['error'] = 'Please enter journal title';
		header('Location: catalog_journals.php');
		exit;
	}
	
	if (empty($_POST['volume'])) {
		$_SESSION['error'] = 'Please enter volume number';
		header('Location: catalog_journals.php');
		exit;
	}
	
	if (empty($_POST['issue'])) {
		$_SESSION['error'] = 'Please enter issue number';
		header('Location: catalog_journals.php');
		exit;
	}

	if (empty($_POST['publisher'])) {
		$_SESSION['error'] = 'Please enter publisher name';
		header('Location: catalog_journals.php');
		exit;
	}


	$journal_data = array(
		'title' => $_POST['title'],
		'publisher' => $_POST['publisher'],
		'volume' => $_POST['volume'],
		'issue' => $_POST['issue'],
		
	);
        

	$journals_file = fopen('Journals.txt', 'a');
	fputcsv($journals_file, $journal_data);
	fclose($journals_file);

	$_SESSION['success'] = 'Journal data saved successfully';
	header('Location: catalog_journals2.php');
	exit;
} 
    else {
	header('Location: catalog_journals.php');
	exit;
}
?>
