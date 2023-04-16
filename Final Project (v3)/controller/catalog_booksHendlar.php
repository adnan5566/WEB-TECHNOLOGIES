<?php
session_start();
require_once('../model/catalogModel.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['bookname'])) {
        $_SESSION['error'] = 'Please enter book name';
        header('Location: ../view/Librarian Dashboard/catalog_books.php');
        exit;
    }

    if (empty($_POST['authorname'])) {
        $_SESSION['error'] = 'Please enter author name';
        header('Location: ../view/Librarian Dashboard/catalog_books.php');
        exit;
    }

    if (empty($_POST['publishyear'])) {
        $_SESSION['error'] = 'Please enter published year';
        header('Location: ../view/Librarian Dashboard/catalog_books.php');
        exit;
    }

    if (empty($_POST['publisher'])) {
        $_SESSION['error'] = 'Please enter publisher name';
        header('Location: ../view/Librarian Dashboard/catalog_books.php');
        exit;
    }

    if (empty($_POST['isbn'])) {
        $_SESSION['error'] = 'Please enter ISBN number';
        header('Location: ../view/Librarian Dashboard/catalog_books.php');
        exit;
    }

    if (empty($_POST['CIPN'])) {
        $_SESSION['error'] = 'Please enter Cataloged In Page No.';
        header('Location: ../view/Librarian Dashboard/catalog_books.php');
        exit;
    }

    $book_data = array(
        'bookname' => $_POST['bookname'],
        'authorname' => $_POST['authorname'],
        'publishyear' => $_POST['publishyear'],
        'publisher' => $_POST['publisher'],
        'isbn' => $_POST['isbn'],
        'CIPN' => $_POST['CIPN']
    );

    if (saveBookData($book_data)) {
        $_SESSION['success'] = 'Book data saved successfully';
        header('Location: ../view/Librarian Dashboard/catalog_books2.php');
        exit;
    } else {
        $_SESSION['error'] = 'Failed to save book data';
        header('Location: ../view/Librarian Dashboard/catalog_books.php');
        exit;
    }
} else {
    header('Location: ../view/Librarian Dashboard/catalog_books.php');
    exit;
}
