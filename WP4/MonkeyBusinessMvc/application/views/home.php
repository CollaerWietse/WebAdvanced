<div class="container">
    <div>
        <h1>Klanten</h1>
        <table class="table table-striped">
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Telefoonnummer</th>
                <th>Adres</th>
                <th>Gemeente</th>
                <th>Verwijder</th>
            </tr>
            <?php
            foreach ($customers as $customer) {
                ?>
                <tr>
                    <td><?php echo $customer->name; ?></td>
                    <td><?php echo $customer->email; ?></td>
                    <td><?php echo $customer->phone; ?></td>
                    <td><?php echo $customer->address; ?></td>
                    <td><?php echo $customer->city; ?></td>
                    <td><a href="<?php echo base_url(); ?>Main/removeCustomer/<?php echo $customer->id; ?>"><span
                                    class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                </tr>
                <?php
            }
            ?>
        </table>

        <a href="<?php echo base_url(); ?>Main/addCustomer" class="btn btn-primary"><span
                    class="glyphicon glyphicon-plus"></span> Klant toevoegen</a>
    </div>

    <div>
        <h1>Evenementen</h1>
        <table class="table table-striped">
            <tr>
                <th>Titel</th>
                <th>Klant</th>
                <th>Datum</th>
            </tr>
            <?php
            foreach ($events as  $event){
                ?>
                <tr>
                    <td><?php echo $event->title;?></td>
                    <td><?php echo $customers[array_search($event->customer_id, $customers)]->name;?></td>
                    <td><?php echo date("d/m/Y H:i", $event->date);?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <a href="<?php echo base_url(); ?>Main/addEvent" class="btn btn-primary"><span
                    class="glyphicon glyphicon-plus"></span> Evenement toevoegen</a>
    </div>
</div>
</body>
</html>
