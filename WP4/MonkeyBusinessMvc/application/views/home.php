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
                    <td><a href="<?php echo base_url(); ?>Data/removeCustomer/<?php echo $customer->id; ?>"><span
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
                    <td><?php echo date_create($event->date)->format("d/m/Y G:i");?></td>
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
