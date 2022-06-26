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

    // if file already exists, return
    if(file_exists($cropped_file)) {
        return $cropped_file;
    }

    /* alternative method for replacing extension
        *$cropped_file = preg_replace("/\.$ext$/", "_cropped.".$ext, $filename); 
    */

    // create image resource
    switch ($ext) {
        case 'jpg':
        case 'jpeg':
            $src_image = imagecreatefromjpeg($filename);
            break;
            
        case 'png':
            $src_image = imagecreatefrompng($filename);
            break;

        case 'gif':
            $src_image = imagecreatefromgif($filename);
            break;
        
        default:
            return $filename;
            break;
    }
    
    // set cropping params
    
    // assign values
    $dst_x = 0;
    $dst_y = 0;
    $dst_w = (int)$size;
    $dst_h = (int)$size;

    $original_width = imagesx($src_image); //get the image width
    $original_height = imagesy($src_image); // get the image height

    // check if width or height is larger
    if($original_width < $original_height) {
        $src_x = 0;
        $src_y = ($original_height - $original_width) / 2;
        $src_w = $original_width;
        $src_h = $original_width;
    } else {
        $src_x = ($original_width - $original_height) / 2;
        $src_y = 0;
        $src_w = $original_height;
        $src_h = $original_height;
    }
    
    $dst_image = imagecreatetruecolor((int)$size, (int)$size);

    imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h); //fn to crop or resize an img

    // save final img
    switch ($ext) {
        case 'jpg':
        case 'jpeg':
            imagejpeg($dst_image, $cropped_file, 90);
            break;
            
        case 'png':
            imagepng($dst_image, $cropped_file);
            break;

        case 'gif':
            imagegif($dst_image, $cropped_file);
            break;
        
        default:
            return $filename;
            break;
    }

    imagedestroy($dst_image);
    imagedestroy($src_image);

    return $cropped_file;
}