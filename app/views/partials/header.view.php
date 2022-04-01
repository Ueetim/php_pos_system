<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=esc(APP_NAME)?></title>

    <!-- links -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/all.min.css">
</head>

<body>
<!-- exempt some pages from displaying the nav bar -->
<?php
        $no_nav[] = "login";
        // $no_nav[] = "signup";
    ?>

    <!-- if the controller is not in the array, display the nav -->
    <?php if (!in_array($controller, $no_nav)): ?>
        <?php require viewsPath("partials/nav");?>
    <?php endif;?>

    <div class="container-fluid" style="min-width: 350px;">