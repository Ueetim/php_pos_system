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

    // check for errors
    try {
        $con = new PDO("$DBDRIVER:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS); //PDO makes it easier to switch btw dbases (unlike mysqli)
    } catch(PDOException $e) {
        echo $e->getMessage();
    }

    return $con;
}

db_connect();

// db queries --- todo: study more on PDO
function query($query, $data=array()) {
    $con = db_connect();
    $smt = $con->prepare($query);
    $check = $smt->execute($data);

    if($check) {
        $result = $smt->fetchAll(PDO::FETCH_ASSOC); //get all the results as an associative array

        // if the result is a non-empty array...
        // if(is_array($result) && count(&result) > 0) {
            
        // }
    }
    return false;
}