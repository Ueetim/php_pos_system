<?php 

$tab = $_GET["tab"] ?? "dashboard"; 

if($tab == "products") {
    $productClass = new Product();
    $products = $productClass->query("SELECT * FROM products ORDER BY id DESC");
}

require viewsPath("admin/admin");