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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo asset_url(); ?>Script/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1>Klant toevoegen</h1>

    <?php echo form_open(); ?>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-tags"></span></span>
        <input type="text" class="form-control" placeholder="Titel" id="title" name="title"
               value="<?php echo set_value('title'); ?>" aria-describedby="basic-addon1">
    </div>

    <select name="selectedCustomer" id="selectedCustomer">
        <?php
        foreach ($customers as $customer) {
            ?>
            <option value="<?php echo $customer->id; ?>"><?php echo $customer->name; ?></option>
            <?php
        }
        ?>
    </select> <br>
    <div>
        <span></span>
        <input type="text" id="date" name="date">
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
