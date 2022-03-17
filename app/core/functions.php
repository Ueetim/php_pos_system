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
        if(is_array($result) && count($result) > 0) {
            return $result;
        }
    }
    return false;
}

// allowed columns for db insert
function allowed_columns($data, $table) {
    if ($table == "users") {
        $columns = [
            'username',
            'email',
            'password',
            'role',
            'image',
            'date',
        ];

        // remove values that are not in the array
        foreach ($data as $key => $value) {
            if (!in_array($key, $columns)) {
                unset($data[$key]);
            }
        }
        return $data;
    }
}

// insert function
function insert($data, $table) {
    // get clean array by selecting allowed columns
    $clean_array = allowed_columns($data, $table);

    // get the keys from the clean array
    $keys = array_keys($clean_array);

    $query = "INSERT INTO $table";

    // implode is used to separate the keys where commas are present
    $query .= "(".implode(",", $keys) .") values ";
    $query .= "(:".implode(",:", $keys) .")"; // values have same name as table columns(keys)

    query($query, $clean_array);

}