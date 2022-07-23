<?php
require "../app/core/config.php";
require "../app/core/functions.php";
require "../app/core/database.php";
require "../app/core/model.php";

// load file when needed
spl_autoload_register('my_function');

// check for needed class in models folder
function my_function($classname)
{
    $filename = "../app/models/" . ucfirst($classname) . ".php";
    if (file_exists($filename)) {
        require $filename;
    }
}
