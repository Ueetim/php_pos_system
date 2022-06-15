<?php

$errors = [];

// check for id to ensure product exists
$id = $_GET['id'] ?? null; //if product doesnt exist, set id to null

$product = new Product();

$row = $product->first(['id'=>$id]);

// $row checks if product exists
if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {

    // if barcode doesnt exist, generate
    $_POST["barcode"] = empty($_POST['barcode']) ? $product->generate_barcode() : $POST['barcode'];

    // check if a file  is uploaded and add to POST
    if (!empty($_FILES['image']['name'])) { //check if image already exists
        $_POST['image'] = $_FILES['image'];
    }

    // check for errors
    $errors = $product->validate($_POST, $row['id']);

    if (empty($errors)) {
        //create new folder for image uploads 
        $folder = "uploads/";
        if (!file_exists($folder)) { // if folder does not exist, create
            mkdir($folder, 0777, true);
        }

        if (!empty($_POST['image'])) {
            $ext = strtolower(pathinfo($_POST['image']['name'],PATHINFO_EXTENSION)); //get file extension
            $destination = $folder . $product->generate_filename($ext);
            
            move_uploaded_file($_POST['image']['tmp_name'], $destination);
            $_POST['image'] = $destination;
        }

        // $product->insert($_POST);

        // authenticate($_POST);

        redirect("admin&tab=products");
    }
}

require viewsPath("products/product-edit");
