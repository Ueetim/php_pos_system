<?php 

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = new User();
    
    if ($row =$user->where(['email' => $_POST['email']], 'users')) {
        // if the supplied password is same as password in db row, authenticate
        if(password_verify($_POST['password'], $row[0]['password'])) {
            authenticate($row[0]);
            redirect('home');
        } else {
        }
        $errors['password'] = "Password is incorrect";
    } else {
        $errors['email'] = 'No user exists with that email address';
    }

}

require viewsPath("auth/login");

