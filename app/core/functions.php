<?php

//for printing out supplied value
function show($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

// for loading view pages
function viewsPath($view) {
    if(file_exists("../app/views/$view.view.php")) {
        return "../app/views/$view.view.php";
    } else {
        echo "view $view not found";
    }
}

// escape characters
function esc($str) {
    return htmlspecialchars($str);
}

// redirect
function redirect($page) {
    header("Location: index.php?pg=" .$page);
    die; //necessary in case user disables redirects on their browser
}


// for retaining value of input
function set_value($key, $default = "") {
    if (!empty($_POST[$key])) {
        return $_POST[$key];
    }
    return $default;
}

// user authentication
function authenticate($row) {
    $_SESSION["USER"] = $row;
}

// if user is authenticated, return. else, return 'unknown'
function auth($column) {
    if (!empty($_SESSION['USER'][$column])) {
        return $_SESSION['USER'][$column];
    }
    return "Unknown";
}

// image cropping
function crop($filename, $size = 600) {
    // grab file name without extension
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    // new file
    $cropped_file = str_replace(".".$ext, "_cropped.".$ext, $filename);

    // alternative method for replacing extension
    //$cropped_file = preg_replace("/\.$ext$/", "_cropped.".$ext, $filename);

    echo $cropped_file;
    return;

    // imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h); //fn to crop or resize an img

    // save destination img
    // imagejpeg($dst_image, $cropped_file);

    // imagedestroy($dst_image);
    // imagedestroy($src_image);

    return $cropped_file;
}