<!-- this page contains basic routing -->

<?php 

    require "../app/core/init.php";


    // if no page name is set, use "home" as default value
    $controller = $_GET['pg'] ?? "home";

    $controller = strtolower($controller); //convert value to lowercase

    // if a file exists with controller name on controllers folder, require
    if (file_exists("../app/controllers/" . $controller . ".php")) {
        require "../app/controllers/" . $controller . ".php";
    } else {
        echo "controller not found";
    }