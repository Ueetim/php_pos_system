<?php

//for printing out supplied value
function show($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

// for loading view pages
function viewsPath($view) {
    if(file_exists("../app/views/$view.view.php")) {
        return "../app/views/$view.view.php";
    } else {
        echo "view $view not found";
    }
}

// escape characters
function esc($str) {
    return htmlspecialchars($str);
}

// connect to db
function db_connect() {
    $DBHOST = "localhost";
    $DBNAME = "pos_db";
    $DBUSER = "root";
    $DBPASS = "";
    $DBDRIVER = "mysql";

    $con = new PDO("mysql:host=localhost;dbname=pos_db", $DBUSER, $DBPASS); //PDO makes it easier to switch btw dbases (unlike mysqli)

    show($con);
}

db_connect();

function query($query, $data=array()) {
    
}