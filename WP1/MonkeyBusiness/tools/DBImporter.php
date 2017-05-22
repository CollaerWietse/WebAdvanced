<?php
require_once "../vendor/autoload.php";
use \model\Evenement;
use \model\Klant;
use \model\PDOEvenementRepository;
use \model\PDOKlantRepository;

$user = 'root';
$password = 'user';
$database = 'MonkeyBusiness';
$hostname = '127.0.0.1';
$pdo = null;

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    ImportJsonToDatabase($pdo);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

function ImportJsonToDatabase($connection) {
    $file = file_get_contents("MonkeyBusinessDB.json");
    $data = json_decode($file,true);

    foreach ($data as $name => $value) {
        //Leest de evenementen uit en plaatst ze in de database
        if (strcmp($name,"Evenementen") === 0) {
            $repository = new PDOEvenementRepository($connection);
            foreach ($value as $entry) {
                $event = new Evenement($entry['id'], $entry['naam'], $entry['begindatum'], $entry['einddatum'], $entry['klantnummer'],
                                       $entry['bezetting'], $entry['kost'], $entry['materialen']);
                $repository->addEvent($event);
            }
        }
        //Leest de klanten uit en plaatst ze in de database
        /*
        elseif (strcmp($name,"Klanten") === 0) {
            $repository = new PDOKlantRepository($connection);
            foreach ($value as $entry) {
                $customer = new Klant($entry['id'], $entry['naam'], $entry['voornaam'], $entry['postcode'], $entry['gemeente'], $entry['straat'],
                                      $entry['huisnummer'], $entry['telefoonnummer'], $entry['mail']);
                $repository->addCustomer($customer);
            }
        }
        */
    }
}