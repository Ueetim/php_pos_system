<?php

// users class

class User extends Model
{
    protected $table = "users";

    //to make it available for the whole class, place it outside a func
    protected $allowed_columns = [
        'username',
        'email',
        'password',
        'role',
        'image',
        'date',
    ];


    // input validation
    public function validate($data)
    {
        $errors = [];

        // check username
        if (empty($data['username'])) {
            // if no input...
            $errors['username'] = "Username is required";
        } else if (!preg_match('/[a-zA-Z]/', $data['username'])) { //use regex to ensure only letters are allowed
            $errors['username'] = "Only letters allowed";

        }

        // check email
        if (empty($data['email'])) {
            // if no input...
            $errors['email'] = "Email is required";
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email is not valid";

        }

        // check password
        if (empty($data['password'])) {
            // if no input...
            $errors['password'] = "Password is required";
        } else if ($data['password'] !== $data['confirm_password']) {
            $errors['confirm_password'] = "Passwords do not match";
        } else if (strlen($data['password']) < 8) {
            // check length of password
            $errors['password'] = 'Password must be at least 8 characters long';
        }
        return $errors;

    }
}
