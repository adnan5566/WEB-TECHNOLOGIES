<?php

    require_once('../model/productModel.php');

        $product_name = $_REQUEST['product_name'];
        $product_buying_price = $_REQUEST['buying_price'];
        $product_selling_price = $_REQUEST['selling_price'];
        $id = $_REQUEST['id'];

    if (isset($_POST['display'])) 
    {
        $displayStatus = $_POST['display'];
    } 
    
    else 
    {
        $displayStatus = "No";
    }

        $product = ['id' => $id, 'name' => $product_name, 'buying_price' => $product_buying_price, 'selling_price' => $product_selling_price, 'displayable' => $displayStatus];
        $status = editProduct($product);

    if ($status) 
    {
        header('location: ../views/productList.php');
    } 
    else 
    {
    header('location: ../views/edit.php?id={$id}');
    }