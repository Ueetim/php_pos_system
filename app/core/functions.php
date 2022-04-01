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

// redirect
function redirect($page) {
    header("Location: index.php?pg=" .$page);
    die; //necessary in case someone disables redirects on their browser
}


// db_connect();



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

// where function
function where($data, $table) {
    $keys = array_keys($data);

    $query = "SELECT * FROM $table WHERE ";

    foreach ($keys as $key) {
        $query .= "$key = :$key && ";
    }

    $query = trim($query, "&& ");

    return query($query, $data);
}

// input validation
function validate($data, $table) {
    $errors = [];

    if ($table == "users"){
        // check username
        if(empty($data['username'])) {
            // if no input...
            $errors['username'] = "Username is required";
        } else if (!preg_match('/[a-zA-Z]/', $data['username'])) { //use regex to ensure only letters are allowed
            $errors['username'] = "Only letters allowed";

        }

        // check email
        if(empty($data['email'])) {
            // if no input...
            $errors['email'] = "Email is required";
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email is not valid";

        }

        // check password
        if(empty($data['password'])) {
            // if no input...
            $errors['password'] = "Password is required";
        } else if ($data['password'] !== $data['confirm_password']) {
            $errors['confirm_password'] = "Passwords do not match";
        } else if (strlen($data['password']) < 8) {
            // check length of password
            $errors['password'] = 'Password must be at least 8 characters long';
        }
    }
    return $errors;

}

// for retaining value of input
function set_value($key, $default = "") {
    if (!empty($_POST[$key])) {
        return $_POST[$key];
    }
    return $default;
}

// user authentication
function authenticate($row) {
    $_SESSION["USER"] = $row;
}

// if user is authenticated, return. else, return 'unknown'
function auth($column) {
    if (!empty($_SESSION['USER'][$column])) {
        return $_SESSION['USER'][$column]; 
    }
    return "Unknown";
}