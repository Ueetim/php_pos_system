<?php

$errors = [];

// check for id to ensure product exists
$id = $_GET['id'] ?? null; //if product doesnt exist, set id to null

$product = new Product();

$row = $product->first(['id' => $id]);

// $row checks if product exists
if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {

    $product->delete($row['id']);

    // delete image
    if (file_exists($row['image'])) {
        unlink($row['image']);
    }

    redirect("admin&tab=products");
}

require viewsPath("products/product-delete");
