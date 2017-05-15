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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo asset_url();?>Script/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1>Klant toevoegen</h1>

    <?php echo form_open();?>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
        <input type="text" class="form-control" placeholder="Naam" id="name" name="name" value="<?php echo set_value('name');?>" aria-describedby="basic-addon1">
    </div>

    <div>
        <span></span>
        <input type="email" id="email" name="email" value="<?php echo set_value('email');?>" placeholder="emailadres">
    </div>

    <div>
        <span></span>
        <input type="text" id="phone" name="phone" value="<?php echo set_value('phone');?>" placeholder="telefoonnummer">
    </div>

    <div>
        <span></span>
        <input type="text" id="address" name="address" value="<?php echo set_value('address');?>" placeholder="adres">
    </div>

    <div>
        <span></span>
        <input type="text" id="city" name="city" value="<?php echo set_value('city');?>" placeholder="gemeente">
    </div>

    <input type="submit" class="btn btn-primary" onclick="validateCustomerData()">
    <?php echo form_close();?>

    <div id="errors">
        <p><?php echo validation_errors();?></p>
    </div>
</div>
</body>
</html>
