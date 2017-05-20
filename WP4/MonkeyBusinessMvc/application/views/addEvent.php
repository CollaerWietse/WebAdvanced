<div class="container">
    <h1>Klant toevoegen</h1>

    <?php echo form_open("Main/addEvent", "id='eventForm'"); ?>
    <div class="input-group">
        <span class="input-group-addon" id="basic-title"><span class="glyphicon glyphicon-tags"></span></span>
        <input type="text" class="form-control" placeholder="Titel" id="title" required name="title"
               value="<?php echo set_value('title'); ?>" aria-describedby="basic-title">
    </div>

    <div class="input-group">
        <span class="input-group-addon" id="basic-customer"><span class="glyphicon glyphicon-user"></span></span>
        <select name="selectedCustomer" required id="selectedCustomer" aria-describedby="basic-customer" class="form-control">
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
        <input type="text" required class="form-control" id="date" name="date" placeholder="dd/mm/jjjj uu:mm" aria-describedby="basic-date">
    </div>
    <input type="submit" class="btn btn-primary">
    <?php echo form_close(); ?>

    <div id="errors">
        <p><?php echo validation_errors(); ?></p>
    </div>
</div>

<script>
    document.getElementById("eventForm").onsubmit = function (event) {
        event.preventDefault();
        document.getElementById("errors").innerHTML = "";
        var date = document.getElementById("date").value;

        if(!checkFormat(date)){
            document.getElementById("errors").innerHTML = "<p>Datum moet in het formaat dd/mm/jjjj uu:mm staan.";
        }
        else{
            document.getElementById("eventForm").submit();
        }
    };

    function checkFormat(date) {
        var matches = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})[ ](\d{1,2})[:](\d{1,2})$/.exec(date);
        return matches !== null;
    }
</script>
</body>
</html>
