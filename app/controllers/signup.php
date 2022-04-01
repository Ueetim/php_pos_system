<?php 

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_POST['role'] = "user";
    $_POST["date"] = date("Y-m-d H:i:s");

    // check for errors
    $errors = validate($_POST, "users");
    if (empty($errors)) {
        // hash pw
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        insert($_POST, "users");

        authenticate($_POST);

        redirect("login");
    }

}

require viewsPath("auth/signup");