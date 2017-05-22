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

    //add an customer by giving the new customer as parameter
    public function addCustomer($customer)
    {
        //Als een url een spatie ziet, vervangt hij deze met %20. Hier vervangen we de %20 terug met een spatie.
        $customer->setNaam(str_replace('%20', ' ', $customer->getNaam()));
        $customer->setVoornaam(str_replace('%20', ' ', $customer->getVoornaam()));
        $customer->setPostcode(str_replace('%20', ' ', $customer->getPostcode()));
        $customer->setGemeente(str_replace('%20', ' ', $customer->getGemeente()));
        $customer->setStraat(str_replace('%20', ' ', $customer->getStraat()));
        $customer->setHuisnummer(str_replace('%20', ' ', $customer->getHuisnummer()));
        $customer->setTelefoonnummer(str_replace('%20', ' ', $customer->getTelefoonnummer()));
        $customer->setMail(str_replace('%20', ' ', $customer->getMail()));

        try {
            $statement = $this->connection->prepare('INSERT INTO Klanten (naam, voornaam, postcode, gemeente, straat, huisnummer, telefoonnummer, mail) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $statement->bindParam(1, $customer->getNaam(), \PDO::PARAM_STR);
            $statement->bindParam(2, $customer->getVoornaam(), \PDO::PARAM_STR);
            $statement->bindParam(3, $customer->getPostcode(), \PDO::PARAM_STR);
            $statement->bindParam(4, $customer->getGemeente(), \PDO::PARAM_STR);
            $statement->bindParam(5, $customer->getStraat(), \PDO::PARAM_STR);
            $statement->bindParam(6, $customer->getHuisnummer(), \PDO::PARAM_STR);
            $statement->bindParam(7, $customer->getTelefoonnummer(), \PDO::PARAM_STR);
            $statement->bindParam(8, $customer->getMail(), \PDO::PARAM_STR);
            $statement->execute();

            return 'done!';
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
