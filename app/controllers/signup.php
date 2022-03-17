<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_POST['role'] = "user";
    $_POST["date"] = date("Y-m-d H:i:s");
   
    insert($_POST, 'users');

}

require viewsPath("auth/signup");