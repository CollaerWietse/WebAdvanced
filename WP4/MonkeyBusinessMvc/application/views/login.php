<?php
/**
 * Created by PhpStorm.
 * User: Wiets
 * Date: 14/05/2017
 * Time: 14:22
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
<div class="container jumbotron">
    <?php echo form_open("Main/login","class='form-signin'" ) ?>

        <h2>Please Sign in</h2>

    <div class="input-group">
        <span class="input-group-addon" id="basic-name"><span class="glyphicon glyphicon-user"></span></span>
        <input type="text" class="form-control" aria-describedby="basic-name" name="username" value="<?php echo set_value("username");?>" placeholder="Gebruikersnaam">
    </div>

    <div class="input-group">
        <span class="input-group-addon" id="basic-pass"><span class="glyphicon glyphicon-question-sign"></span></span>
        <input type="password" class="form-control" aria-describedby="basic-pass" name="password" value="<?php echo set_value("password");?>" placeholder="Wachtwoord">
    </div>

        <input type="submit" class="btn btn-primary btn-block" value="Login">

    <?php echo form_close();?>
</div>

<div>
    <?php echo $validation;?>
</div>
</body>
</html>
