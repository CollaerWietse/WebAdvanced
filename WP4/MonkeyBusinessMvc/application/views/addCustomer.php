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
