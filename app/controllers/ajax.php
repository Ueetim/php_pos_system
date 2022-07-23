<?php

defined("ABSPATH") ? "" : die();


$productClass = new Product();


$rows = $productClass->getAll();

echo json_encode($rows);