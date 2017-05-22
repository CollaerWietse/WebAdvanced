<?php
header('Content-disposition: attachment; filename=MonkeyBusinessDB.json');
header('Content-type: application/json');

$user = 'root';
$password = 'user';
$database = 'MonkeyBusiness';
$hostname = '127.0.0.1';
$pdo = null;

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $response['Evenementen'] = ConvertTableToArray($pdo,"Evenementen");
    $response['Klanten'] = ConvertTableToArray($pdo,"Klanten");

    echo json_encode($response);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

/*
 * Plaatst de inhoud van een databasetabel in een array
 * Return: de array met elementen
*/
function ConvertTableToArray($pdo, $tableName) {
    $statement = $pdo->prepare("SELECT * FROM $tableName");
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $statement->execute();

    $array = array();

    while($row = $statement->fetch())
    {
        $array[] = $row;
    }

    return $array;
}