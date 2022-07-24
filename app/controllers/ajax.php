<?php

defined("ABSPATH") ? "" : die();

// capture ajax data
$raw_data = file_get_contents("php://input");

if (!empty($raw_data)) {
    $OBJ = json_decode($raw_data, true);

    if (is_array($OBJ)){
        if ($OBJ['dataType'] == 'search'){
            $productClass = new Product();

            if (!empty($OBJ['text'])) {
                // search
                $text = '%' . $OBJ['text'] . '%';
                $query = "SELECT * FROM products WHERE description like :find LIMIT 10";
                $rows = $productClass->query($query, ['find'=>$text]);
            } else {
                // get all products
                $rows = $productClass->getAll();
            }


            // crop img
            if ($rows){
                foreach ($rows as $key => $row) {
                    $rows[$key]['image'] = crop($row['image']);
                }
                echo json_encode($rows);
            }
        }
    }
}