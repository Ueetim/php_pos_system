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
    public function validate($data, $id = null)
    {
        $errors = [];

        // check description
        if (empty($data['description'])) {
            // if no input...
            $errors['description'] = "Product description is required";
        } else if (!preg_match('/[a-zA-Z0-9_\-\&\(\)]+/', $data['description'])) { //use regex to ensure only letters are allowed
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

        // check image

        // check if id exists. so image upload can be skipped on edit
        if(!$id || ($id && !empty($data['image']))){
            // image size
            $max_size = 4;
            $size = $max_size * (1024 * 1024); //convert from bytes to mb
    
            if (empty($data['image'])) {
                // if no input...
                $errors['image'] = "Product image is required";
            } else if (!($data['image']['type'] == "image/jpeg" || $data['image']['type'] == "image/png")) { //check for the file extension
                $errors['image'] = "Image must be a valid JPEG or PNG file";
            } else if (($data['image']['error'] > 0)) {
                $errors['image'] = "The image failed to upload. Error no. " . $data['image']['error'];
            } else if (($data['image']['size'] > $size)) {
                $errors['image'] = "The image must be lower than " . $max_size . "mb";
            }
        }

        return $errors;
    }

    public function generate_filename($ext = "jpg")
    {
        return hash("sha1", rand(1000, 999999999)) . "_" . rand(1000, 9999) . "." . $ext;
    }

    public function generate_barcode()
    {
        // generate random numbers
        return "2222" . rand(1000, 999999999);
    }
}
