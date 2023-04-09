<?php
session_start();
require_once('../model/allocationModel.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type = $_POST['type'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $quantity = $_POST['quantity'];

    if (empty($title)) {
        $_SESSION['error'] = 'Please enter a title';
        header('Location: ../view/Librarian Dashboard/resource_allocation.php');
        exit;
    }

    if (empty($author)) {
        $_SESSION['error'] = 'Please enter an author';
        header('Location: ../view/Librarian Dashboard/resource_allocation.php');
        exit;
    }

    if (empty($year)) {
        $_SESSION['error'] = 'Please enter a year';
        header('Location: ../view/Librarian Dashboard/resource_allocation.php');
        exit;
    }

    if (empty($quantity)) {
        $_SESSION['error'] = 'Please enter a valid quantity';
        header('Location: ../view/Librarian Dashboard/resource_allocation.php');
        exit;
    }

    $resource = getResource($type, $title, $author, $year);

    if ($resource) {
        $id = $resource['id'];
        updateResource($id, $quantity);
    } else {
        addResource($type, $title, $author, $year, $quantity);
    }

    $_SESSION['success'] = 'Resource allocation saved successfully';
    header('Location: ../view/Librarian Dashboard/resource_allocation2.php');
    exit;

} else {
    header('Location: ../view/Librarian Dashboard/resource_allocation.php');
    exit;
}
?>
