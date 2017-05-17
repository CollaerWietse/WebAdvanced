<?php
/**
 * Created by PhpStorm.
 * User: Wiets
 * Date: 15/05/2017
 * Time: 17:06
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
<div>
    <!--
    <nav class="navbar navbar-inverse">
        <div class="container-fluid" style="height: 75px;">
            <div class="navbar-header">
                <a class="navbar-brand" href="https://webadvanced.vjho.be/Main/home">
                    <img alt="Monkey Business" src="<?php echo asset_url();?>logo/logo_monkey.jpg" class="image">
                </a>
                <input type="submit" class="btn btn-primary float-right" onclick="">
            </div>
        </div>
    </nav>
    -->
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

    <?php echo form_open(); ?>
    <div class="input-group">
        <span class="input-group-addon" id="basic-title"><span class="glyphicon glyphicon-tags"></span></span>
        <input type="text" class="form-control" placeholder="Titel" id="title" name="title"
               value="<?php echo set_value('title'); ?>" aria-describedby="basic-title">
    </div>

    <div class="input-group">
        <span class="input-group-addon" id="basic-customer"><span class="glyphicon glyphicon-user"></span></span>
        <select name="selectedCustomer" id="selectedCustomer" aria-describedby="basic-customer" class="form-control">
            <?php
            foreach ($customers as $customer) {
                ?>
                <option value="<?php echo $customer->id; ?>"><?php echo $customer->name; ?></option>
                <?php
            }
            ?>
    </select>
    </div>

    <div class="input-group">
        <span class="input-group-addon" id="basic-date"><span class="glyphicon glyphicon-calendar"></span></span>
        <input type="text"  class="form-control" id="date" name="date" placeholder="datum" aria-describedby="basic-date">
    </div>
    <input type="submit" class="btn btn-primary" onclick="validateEventData()">
    <?php echo form_close(); ?>

    <div id="errors">
        <p><?php echo validation_errors(); ?></p>
    </div>
</div>

<script>
    function validateEventData() {
        var name = document.getElementById("name");
        var email = document.getElementById("email");
        var phone = document.getElementById("phone");
        var address = document.getElementById("address");
        var city = document.getElementById("city");

        var errors = document.getElementById("errors");

        if (name === "" || email === "" || phone === "" || address === "" || city === "") {
            alert("Alle velden moeten ingevuld worden");
        }
    }
</script>
</body>
</html>
