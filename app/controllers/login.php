<?php 

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    if ($row = where(['email' => $_POST['email']], 'users')) {
        // if the supplied password is same as password in db row, authenticate
        if($row[0]['password'] === $_POST['password']) {
            authenticate($row);
            redirect('home');
        } else {
        }
        $errors['password'] = "Incorrect password";
    } else {
        $errors['email'] = 'No user exists with that email address';
    }

}

require viewsPath("auth/login");

