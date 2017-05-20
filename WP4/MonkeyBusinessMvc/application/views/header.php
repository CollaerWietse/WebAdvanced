<?php
/**
 * Created by PhpStorm.
 * User: Wiets
 * Date: 14/05/2017
 * Time: 14:42
 */

?>
<!DOCTYPE html>
<html>
<head>
    <title>Welkom</title>
    <link rel="stylesheet" href="<?php echo asset_url() ?>Style/bootstrap.css">
    <link rel="stylesheet" href="<?php echo asset_url() ?>Style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo asset_url(); ?>Script/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url();?>Main/home">
                <img alt="Bedrijf" class="image" src="<?php echo asset_url();?>logo/logo_monkey.jpg">
            </a>
        </div>
        <p class="navbar-text">Ingelogd als <?php echo $_SESSION["firstName"] . " " . $_SESSION["lastName"];?></p>
        <p class="navbar-text navbar-right"><a href="<?php echo base_url();?>Main/logout" class="navbar-link">Log uit</a></p>
    </div>
</nav>