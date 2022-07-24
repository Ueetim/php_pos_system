<?php

defined("ABSPATH") ? "" : die();


$productClass = new Product();


$rows = $productClass->getAll();

// crop img
if ($rows){
    foreach ($rows as $key => $row) {
        $rows[$key]['image'] = crop($row['image']);
        // $rows[$key]['description'] = strtoupper($row['description']);
    }
    echo json_encode($rows);
}