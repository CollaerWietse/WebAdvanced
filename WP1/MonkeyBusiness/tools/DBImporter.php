<?php
header("Location: ../../../WP6/Index.php");

require_once "../vendor/autoload.php";
use \model\PDOEvenementRepository;
use \model\PDOKlantRepository;
use \view\EvenementJsonView;
use \view\KlantJsonView;
use \controller\EvenementController;
use \controller\KlantController;
use \model\Evenement;
use \model\Klant;

$user = 'root';
$password = 'user';
$database = 'MonkeyBusiness';
$hostname = '127.0.0.1';
$pdo = null;

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $evenementPDORepository = new PDOEvenementRepository($pdo);
    $evenementJsonView = new EvenementJsonView();
    $evenementController = new EvenementController($evenementPDORepository, $evenementJsonView);
    $klantPDORepository = new PDOKlantRepository($pdo);
    $klantJsonView = new KlantJsonView();
    $klantController = new KlantController($klantPDORepository, $klantJsonView);

    ImportJsonToDatabase($evenementController, $klantController);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

function ImportJsonToDatabase($evenementController, $klantController) {
    $file = file_get_contents("MonkeyBusinessDB.json");
    $data = json_decode($file,true);

    foreach ($data as $name => $value) {
        //Leest de evenementen uit en plaatst ze in de database
        if (strcmp($name,"Evenementen") === 0) {
            foreach ($value as $entry) {
                $event = new Evenement($entry['id'], $entry['naam'], $entry['begindatum'], $entry['einddatum'], $entry['klantnummer'],
                    $entry['bezetting'], $entry['kost'], $entry['materialen']);
                $evenementController->handleAddEvent($event);
            }
        }
        //Leest de klanten uit en plaatst ze in de database
        elseif (strcmp($name,"Klanten") === 0) {
            foreach ($value as $entry) {
                $customer = new Klant($entry['id'], $entry['naam'], $entry['voornaam'], $entry['postcode'], $entry['gemeente'], $entry['straat'],
                    $entry['huisnummer'], $entry['telefoonnummer'], $entry['mail']);
                $klantController->handleAddCustomer($customer);
            }
        }
    }
}