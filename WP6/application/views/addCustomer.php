<?php
/**
 * Created by PhpStorm.
 * User: Wiets
 * Date: 15/05/2017
 * Time: 17:58
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welkom</title>
    <link rel="stylesheet" href="<?php echo asset_url()?>Style/bootstrap.css">
    <link rel="stylesheet" href="<?php echo asset_url() ?>Style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo asset_url();?>Script/bootstrap.min.js"></script>
</head>
<body>
<div>
    <nav class="navbar navbar-inverse" role="navigation">
        <button class="btn btn-primary navbar-right btnSize" onclick="">Uitloggen</button>
        <div class="collapse navbar-collapse">
            <div class="form-group">
                <a class="navbar-brand fixSize" href="https://webadvanced.vjho.be/Main/home">
                    <img alt="Monkey Business" src="<?php echo asset_url();?>logo/logo_monkey.jpg" class="image">
                </a>
            </div>
        </div>
    </nav>
</div>
<div class="container">
    <h1>Klant toevoegen</h1>

    <?php echo form_open();?>
    <div class="input-group">
        <span class="input-group-addon" id="basic-name"><span class="glyphicon glyphicon-user"></span></span>
        <input type="text" class="form-control" placeholder="Naam" id="name" name="name" value="<?php echo set_value('name');?>" aria-describedby="basic-name">
    </div>

    <div class="input-group">
        <span class="input-group-addon" id="basic-email"><span class="glyphicon glyphicon-envelope"></span></span>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email');?>" placeholder="emailadres" aria-describedby="basic-email">
    </div>

    <div class="input-group">
        <span class="input-group-addon" id="basic-phone"><span class="glyphicon glyphicon-earphone"></span></span>
        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo set_value('phone');?>" placeholder="telefoonnummer" aria-describedby="basic-phone">
    </div>

    <div class="input-group">
        <span class="input-group-addon" id="basic-address"><span class="glyphicon glyphicon-home"></span></span>
        <input type="text" class="form-control" id="address" name="address" value="<?php echo set_value('address');?>" placeholder="adres" aria-describedby="basic-address">
    </div>

    <div class="input-group">
        <span class="input-group-addon" id="basic-city"><span class="glyphicon glyphicon-road"></span></span>
        <input type="text" class="form-control" id="city" name="city" value="<?php echo set_value('city');?>" placeholder="gemeente" aria-describedby="basic-city">
    </div>

    <input type="submit" class="btn btn-primary" onclick="validateCustomerData()">
    <?php echo form_close();?>

    <div id="errors">
        <p><?php echo validation_errors();?></p>
    </div>
</div>
</body>
</html>
