<?php
session_start();
require_once('../model/catalogModel.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['title'])) {
        $_SESSION['error'] = 'Please enter journal title';
        header('Location: /view/Librarian Dashboard/Catalog_Journals.php');
        exit;
    }

    if (empty($_POST['volume'])) {
        $_SESSION['error'] = 'Please enter volume number';
        header('Location: ../view/Librarian Dashboard/Catalog_Journals.php');
        exit;
    }

    if (empty($_POST['issue'])) {
        $_SESSION['error'] = 'Please enter issue number';
        header('Location: ../view/Librarian Dashboard/Catalog_Journals.php');
        exit;
    }

    if (empty($_POST['publisher'])) {
        $_SESSION['error'] = 'Please enter publisher name';
        header('Location: ../view/Librarian Dashboard/Catalog_Journals.php');
        exit;
    }

    $journal_data = array(
        'title' => $_POST['title'],
        'publisher' => $_POST['publisher'],
        'volume' => $_POST['volume'],
        'issue' => $_POST['issue'],
        'CIPN' => $_POST['CIPN']
    );

    if (saveJournalData($journal_data)) {
        $_SESSION['success'] = 'Journal data saved successfully';
        header('Location: ../view/Librarian Dashboard/catalog_journals2.php');
        exit;
    } else {
        $_SESSION['error'] = 'Failed to save Journal data';
        header('Location: ../view/Librarian Dashboard/Catalog_Journals.php');
        exit;
    }

} else {
    header('Location: ../view/Librarian Dashboard/Catalog_Journals.php');
    exit;
}
?>
