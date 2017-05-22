<?php
require_once "vendor/autoload.php";
use \model\PDOEvenementRepository;
use \view\EvenementJsonView;
use \controller\EvenementController;
use \model\Evenement;

$user = 'root';
$password = 'user';
$database = 'MonkeyBusiness';
$hostname = '127.0.0.1';
$pdo = null;
try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database",
        $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
    $evenementPDORepository = new PDOEvenementRepository($pdo);
    $evenementJsonView = new EvenementJsonView();
    $evenementController = new EvenementController(
        $evenementPDORepository, $evenementJsonView);

    $router = new AltoRouter();

    $router->setBasePath('/ProjectWebAdvanced/WP1/MonkeyBusiness');
    //$router->setBasePath('/~user/ProjectWebAdvanced/WP1/MonkeyBusiness');

    $router->map('GET','/evenement/[i:id]',
        function($id) use (&$evenementController) {
            header("Content-Type: application/json");
            $evenementController->handleFindEvenementById($id);
        }
    );

    $router->map('GET','/evenement',
        function() use (&$evenementController) {
            header("Content-Type: application/json");
            $evenementController->handleFindEvents();
        }
    );

    $router->map('GET','/evenement/klant/[i:id]',
        function($id) use (&$evenementController) {
            header("Content-Type: application/json");
            $evenementController->handleFindEventByCustomer($id);
        }
    );

    $router->map('GET','/evenement/from/[:from]/until/[:until]',
        function($from, $until) use (&$evenementController) {
            header("Content-Type: application/json");
            $evenementController->handleFindEvenementByDate($from, $until);
        }
    );

    $router->map('GET','/evenement/klant/[i:id]/from/[:from]/until/[:until]',
        function($id, $from, $until) use (&$evenementController) {
            header("Content-Type: application/json");
            $evenementController->handleFindEventByCustomerAndDate($id, $from, $until);
        }
    );

    //vb: http://192.168.46.137/ProjectWebAdvanced/WP1/MonkeyBusiness/evenement/add/party robbe/2017-05-20/2017-05-20/1/niets/5000/niets
    $router->map('POST','/evenement/add/[:naam]/[:beginDatum]/[:eindDatum]/[:klantNummer]/[:bezetting]/[:kost]/[:materialen]',
        function($naam, $beginDatum, $eindDatum, $klantNummer, $bezetting, $kost, $materialen) use (&$evenementController) {
            header("Content-Type: application/json");
            $evenement = new Evenement(null, $naam, $beginDatum, $eindDatum, $klantNummer, $bezetting, $kost, $materialen);
            $evenementController->handleAddEvent($evenement);
        }
    );

    //vb: http://192.168.46.137/ProjectWebAdvanced/WP1/MonkeyBusiness/evenement/update/18/party joachim/2017-05-20/2017-05-20/1/niets/5000/niets
    $router->map('PUT','/evenement/update/[i:id]/[:naam]/[:beginDatum]/[:eindDatum]/[:klantNummer]/[:bezetting]/[:kost]/[:materialen]',
        function($id, $naam, $beginDatum, $eindDatum, $klantNummer, $bezetting, $kost, $materialen) use (&$evenementController) {
            header("Content-Type: application/json");
            $evenement = new Evenement($id, $naam, $beginDatum, $eindDatum, $klantNummer, $bezetting, $kost, $materialen);
            $evenementController->handleUpdateEvent($evenement);
        }
    );
    //vb: http://192.168.46.137/ProjectWebAdvanced/WP1/MonkeyBusiness/evenement/delete/18
    $router->map('DELETE','/evenement/delete/[i:id]',
        function($id) use (&$evenementController) {
            header("Content-Type: application/json");
            $evenementController->handleDeleteEvent($id);
        }
    );

    $match = $router->match();

    if( $match && is_callable( $match['target'] ) ){
        call_user_func_array( $match['target'], $match['params'] );
    }
} catch (Exception $e) {
    echo $e->getMessage();
}