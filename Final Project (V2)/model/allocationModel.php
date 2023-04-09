<?php

require_once 'db.php';

function getResource($type, $title, $author, $year)
{
    $connection = getConnection();
    $query = "SELECT * FROM resources WHERE type='$type' AND title='$title' AND author='$author' AND year='$year'";
    $result = mysqli_query($connection, $query);
    return mysqli_fetch_assoc($result);
}

function addResource($type, $title, $author, $year, $quantity)
{
    $connection = getConnection();
    $query = "INSERT INTO resources (type, title, author, year, quantity) VALUES ('$type', '$title', '$author', '$year', '$quantity')";
    mysqli_query($connection, $query);
}

function updateResource($title, $quantity)
{
    $connection = getConnection();
    $query = "UPDATE resources SET quantity=quantity+$quantity WHERE title='$title'";
    mysqli_query($connection, $query);
}


?>
