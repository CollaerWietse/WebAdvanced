<?php

namespace model;

class PDOKlantRepository implements KlantRepository
{
    private $connection = null;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findCustomerById($id )
    {
        try {
            $statement = $this->connection->prepare('SELECT * FROM Klanten WHERE id='.$id);
            $statement->bindParam(1, $id, \PDO::PARAM_INT);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                return new Klant($results[0]['id'], $results[0]['naam'], $results[0]['voornaam'], $results[0]['postcode'],
                    $results[0]['gemeente'], $results[0]['straat'], $results[0]['huisnummer'], $results[0]['telefoonnummer'], $results[0]['mail']);
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return null;
        }
    }
}
