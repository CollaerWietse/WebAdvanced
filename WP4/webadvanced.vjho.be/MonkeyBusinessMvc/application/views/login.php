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
</head>
<body>

<?php echo form_open("Main/login") ?>
<input type="text" name="username" value="<?php echo set_value("username");?>" placeholder="Gebruikersnaam">
<input type="password" name="password" value="<?php echo set_value("password");?>" placeholder="Wachtwoord">
<input type="submit" class="button"  value="Login">
<?php echo form_close();?>

<div>
    <?php echo $validation;?>
</div>
</body>
</html>
