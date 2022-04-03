<?php 

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $user = new User();

    $_POST['role'] = "user";
    $_POST["date"] = date("Y-m-d H:i:s");

    // check for errors
    $errors = $user->validate($_POST, "users");
    if (empty($errors)) {
        // hash pw
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user->insert($_POST, "users");

        // authenticate($_POST);

        redirect("login");
    }

}

require viewsPath("auth/signup");