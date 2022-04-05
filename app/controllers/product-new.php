<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $product = new Product();

    $_POST["date"] = date("Y-m-d H:i:s");

    // if barcode doesnt exist, generate
    $_POST["barcode"] = empty($_POST['barcode']) ? $product->generate_barcode() : $POST['barcode'];

    // check if a file  is uploaded and add to POST
    if (!empty($_FILES)) {
        $_POST['image'] = $_FILES['image'];
    }

    // check for errors
    $errors = $product->validate($_POST, "product");

    if (empty($errors)) {
        // hash pw
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $product->insert($_POST);

        // authenticate($_POST);

        redirect("index.php?pg=admin&tab=products");
    }
}

require viewsPath("products/product-new");
