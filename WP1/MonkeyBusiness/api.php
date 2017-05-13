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

    $router->map('POST','/evenement/add',

        function($event) use (&$evenementController) {
            header("Content-Type: application/json");

            $evenement = '
            {
                "id": "1",
                "naam": "Welcome home robbe",
                "beginDatum": "2017-05-17",
                "eindDatum": "2017-05-17",
                "klantNummer": "1",
                "bezetting": "Persoon z",
                "kost": "10000",
                "materialen": "Bier" 
            }';

            $data = json_decode($evenement);

            $evenementController->handleAddEvent($data);
        }
    );

    $router->map('PUT','/evenement/update/[i:id]',
        function($id, $event) use (&$evenementController) {
            header("Content-Type: application/json");

            $evenement = '
            {
                "id": "1",
                "naam": "Welcome home robbe",
                "beginDatum": "2017-05-17",
                "eindDatum": "2017-05-17",
                "klantNummer": "1",
                "bezetting": "Persoon z",
                "kost": "10000",
                "materialen": "Bier" 
            }';

            $data = json_decode($evenement);

            $evenementController->handleUpdateEvent($id, $evenement);
        }
    );

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