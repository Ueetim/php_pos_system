<?php

// users class

class Product extends Model
{
    protected $table = "products";

    //to make it available for the whole class, place it outside a func
    protected $allowed_columns = [
        'barcode',
        'user_id',
        'description',
        'qty',
        'amount',
        'image',
        'date',
        'views',
    ];


    // input validation
    public function validate($data)
    {
        $errors = [];

        // check description
        if (empty($data['description'])) {
            // if no input...
            $errors['description'] = "Product description is required";
        } else if (!preg_match('/[a-zA-Z]/', $data['description'])) { //use regex to ensure only letters are allowed
            $errors['description'] = "Only letters allowed in description";

        }

        // check qty
        if (empty($data['qty'])) {
            // if no input...
            $errors['qty'] = "Product quantity is required";
        } else if (!preg_match('/^[0-9]+$/', $data['qty'])) { //use regex to ensure only letters are allowed
            $errors['qty'] = "Quantity must be a number";

        }

        // check amount
        if (empty($data['amount'])) {
            // if no input...
            $errors['amount'] = "Product amount is required";
        } else if (!preg_match('/^[0-9.]+$/', $data['amount'])) { //use regex to ensure only letters are allowed
            $errors['amount'] = "Amount must be a number";

        }

        return $errors;

    }

    public function generate_barcode()
    {
        // generate random numbers
        return "2222" . rand(1000, 999999999);
    }
}
