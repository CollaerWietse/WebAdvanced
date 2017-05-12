<?php
require_once "vendor/autoload.php";
use \model\PDOEvenementRepository;
use \view\EvenementJsonView;
use \controller\EvenementController;

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
            //var_dump($event);
            //$event = new \model\Evenement("test", "2017-05-12", "2017-05-12", "1", "test", "5000", "test");
            $_POST[$event];

            print_r($_POST);//print out the whole post
            print_r($_POST[$event]); //print out only the data array

            header("Content-Type: application/json");
            //$evenementController->handleAddEvent($event);
        }
    );

    $router->map('PUT','/evenement/update/[i:id]',
        function($id, $event) use (&$evenementController) {
            header("Content-Type: application/json");
            $evenementController->handleUpdateEvent($id, $event);
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