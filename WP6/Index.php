<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Import - Export</title>
    <link rel="stylesheet" href="Style/bootstrap.css">
    <link rel="stylesheet" href="Style/bootstrap-theme.css">
    <link rel="stylesheet" href="Style/style.css">
    <style type="text/css">
        .button-container form {
            display: inline;
            vertical-align: middle;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <?php
        require('Include/config.php');
    ?>
    <div class="container">
        <div>
            <h1>Klanten</h1>
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Telefoonnummer</th>
                    <th>Adres</th>
                    <th>Gemeente</th>
                </tr>
                <?php
                $statement = $pdo->prepare("SELECT * FROM Klanten");
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $statement->execute();

                while($customer = $statement->fetch())
                {
                    echo"<tr>".
                        "<td>".$customer["id"]."</td>".
                        "<td>".$customer["voornaam"]." ".$customer["naam"]."</td>".
                        "<td>".$customer["mail"]."</td>".
                        "<td>".$customer["telefoonnummer"]."</td>".
                        "<td>".$customer["straat"]." ".$customer["huisnummer"]."</td>".
                        "<td>".$customer["postcode"]." ".$customer["gemeente"]."</td>".
                        "</tr>";
                }
                ?>
            </table>
        </div>

        <div>
            <h1>Evenementen</h1>
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Naam</th>
                    <th>Begindatum</th>
                    <th>Einddatum</th>
                    <th>Klantnummer</th>
                    <th>Bezetting</th>
                    <th>Kost</th>
                    <th>Materialen</th>
                </tr>
                <?php
                $statement = $pdo->prepare("SELECT * FROM Evenementen");
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $statement->execute();

                while($event = $statement->fetch())
                {
                    echo"<tr>".
                        "<td>".$event["id"]."</td>".
                        "<td>".$event["naam"]."</td>".
                        "<td>".$event["begindatum"]."</td>".
                        "<td>".$event["einddatum"]."</td>".
                        "<td>".$event["klantnummer"]."</td>".
                        "<td>".$event["bezetting"]."</td>".
                        "<td>".$event["kost"]."</td>".
                        "<td>".$event["materialen"]."</td>".
                        "</tr>";
                }
                ?>
            </table>
        </div>

        <div class="button-container">
            <form action="DBExporter.php" method="get">
                <input type="submit" value="Export">
            </form>
            <form action="../WP1/MonkeyBusiness/tools/DBImporter.php" method="get">
                <input type="submit" value="Import">
            </form>
        </div>
    </div>
</body>
</html>