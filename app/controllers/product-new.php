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
        //create new folder for image uploads 
        $folder = "uploads/";
        if (!file_exists($folder)) { // if folder does not exist, create
            mkdir($folder, 0777, true);
        }

        $ext = strtolower(pathinfo($_POST['image']['name'],PATHINFO_EXTENSION)); //get file extension
        $destination = $folder . $product->generate_filename($ext);

        move_uploaded_file($_POST['image']['tmp_name'], $destination);
        $_POST['image'] = $destination;

        $product->insert($_POST);

        // authenticate($_POST);

        redirect("index.php?pg=admin&tab=products");
    }
}

require viewsPath("products/product-new");
