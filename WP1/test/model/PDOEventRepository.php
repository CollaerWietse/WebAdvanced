<?php
use \model\Evenement;
use \model\PDOEvenementRepository;
require 'MonkeyBusiness/vendor/autoload.php';

class PDORepositoryTest extends PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        $this->mockPDO = $this->getMockBuilder('PDO')
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockPDOStatement =
            $this->getMockBuilder('PDOStatement')
                ->disableOriginalConstructor()
                ->getMock();
    }

    public function testFindEventById_idExists_EventObject()
{
    $evenement = new Evenement(1, 'welcome home', '2017-05-17', '2017-05-17', 1, 'niets', 5000.0, 'niets');
    $this->mockPDOStatement->expects($this->atLeastOnce())
        ->method('bindParam');
    $this->mockPDOStatement->expects($this->atLeastOnce())
        ->method('execute');
    $this->mockPDOStatement->expects($this->atLeastOnce())
        ->method('fetchAll')
        ->will($this->returnValue(
            [
                [ 'id' => $evenement->getId(),
                    'naam' => $evenement->getNaam(),
                    'begindatum' => $evenement->getBeginDatum(),
                    'einddatum' => $evenement->getEindDatum(),
                    'klantnummer' => $evenement->getKlantnummer(),
                    'bezetting' => $evenement->getBezetting(),
                    'kost' => $evenement->getKost(),
                    'materialen' => $evenement->getMaterialen()
                ]
            ]));
    $this->mockPDO->expects($this->atLeastOnce())
        ->method('prepare')
        ->will($this->returnValue($this->mockPDOStatement));
    $pdoRepository = new PDOEvenementRepository($this->mockPDO);
    $actualEvenement =
        $pdoRepository->findEventById($evenement->getId());

    //var_dump($evenement);
    //var_dump($actualEvenement);

    $this->assertEquals($evenement, $actualEvenement);
    }

    public function testFindEventById_idDoesNotExist_Null()
    {
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetchAll')
            ->will($this->returnValue([]));
        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new PDOEvenementRepository($this->mockPDO);
        $actualEvenement = $pdoRepository->findEventById(24);
        $this->assertEquals($actualEvenement, '');
    }
    public function testFindEventById_exeptionThrownFromPDO_Null()
    {
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam')->will(
                $this->throwException(new Exception()));
        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new PDOEvenementRepository($this->mockPDO);
        $actualEvenement = $pdoRepository->findEventById(1);
        $this->assertEquals($actualEvenement, '');
    }

    public function testFindEvents_Exists_EventsObject()
    {
        $evenement1 = new Evenement(1, 'welcome home', '2017-05-17', '2017-05-17', 1, 'niets', 5000.0, 'niets');
        $evenement2 = new Evenement(2, 'welcome home', '2017-05-17', '2017-05-17', 1, 'niets', 5000.0, 'niets');
        $allEvents = Array($evenement1, $evenement2);
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetchAll')
            ->will($this->returnValue(
                [
                    [ 'id' => $evenement1->getId(),
                        'naam' => $evenement1->getNaam(),
                        'begindatum' => $evenement1->getBeginDatum(),
                        'einddatum' => $evenement1->getEindDatum(),
                        'klantnummer' => $evenement1->getKlantnummer(),
                        'bezetting' => $evenement1->getBezetting(),
                        'kost' => $evenement1->getKost(),
                        'materialen' => $evenement1->getMaterialen()
                    ],
                    [ 'id' => $evenement2->getId(),
                        'naam' => $evenement2->getNaam(),
                        'begindatum' => $evenement2->getBeginDatum(),
                        'einddatum' => $evenement2->getEindDatum(),
                        'klantnummer' => $evenement2->getKlantnummer(),
                        'bezetting' => $evenement2->getBezetting(),
                        'kost' => $evenement2->getKost(),
                        'materialen' => $evenement2->getMaterialen()
                    ]
                ]));
        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new PDOEvenementRepository($this->mockPDO);
        $actualEvenementen =
            $pdoRepository->findEvents();

        //var_dump($evenement);
        //var_dump($actualEvenement);

        $this->assertEquals($allEvents, $actualEvenementen);
    }

    public function testFindEvents_noEvents_Null()
    {
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetchAll')
            ->will($this->returnValue([]));
        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new PDOEvenementRepository($this->mockPDO);
        $actualEvenement = $pdoRepository->findEvents();
        $this->assertEquals($actualEvenement, '');
    }

    public function testFindEvents_exeptionThrownFromPDO_Null()
    {
        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new PDOEvenementRepository($this->mockPDO);
        $actualEvenement = $pdoRepository->findEvents();
        $this->assertEquals($actualEvenement, '');
    }

    public function testFindEventByCustomer_customerExists_EventObject()
    {
        $evenement = new Evenement(1, 'welcome home', '2017-05-17', '2017-05-17', 1, 'niets', 5000.0, 'niets');
        $allEvents = Array($evenement);
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetchAll')
            ->will($this->returnValue(
                [
                    [ 'id' => $evenement->getId(),
                        'naam' => $evenement->getNaam(),
                        'begindatum' => $evenement->getBeginDatum(),
                        'einddatum' => $evenement->getEindDatum(),
                        'klantnummer' => $evenement->getKlantnummer(),
                        'bezetting' => $evenement->getBezetting(),
                        'kost' => $evenement->getKost(),
                        'materialen' => $evenement->getMaterialen()
                    ]
                ]));
        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new PDOEvenementRepository($this->mockPDO);
        $actualEvenement =
            $pdoRepository->findEventByCustomer($evenement->getKlantnummer());

        //var_dump($evenement);
        //var_dump($actualEvenement);

        $this->assertEquals($allEvents, $actualEvenement);
    }

    public function testFindEventByCustomer_customerDoesNotExist_Null()
    {
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetchAll')
            ->will($this->returnValue([]));
        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new PDOEvenementRepository($this->mockPDO);
        $actualEvenement = $pdoRepository->findEventByCustomer(20);
        $this->assertEquals($actualEvenement, '');
    }

    public function testFindEventByCustomer_exeptionThrownFromPDO_Null()
    {
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam')->will(
                $this->throwException(new Exception()));
        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new PDOEvenementRepository($this->mockPDO);
        $actualEvenement = $pdoRepository->findEventByCustomer(1);
        $this->assertEquals($actualEvenement, '');
    }

    public function testFindEventByDates_datesExists_EventObject()
    {
        $evenement = new Evenement(1, 'welcome home', '2017-05-17', '2017-05-17', 1, 'niets', 5000.0, 'niets');
        $allEvents = Array($evenement);
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetchAll')
            ->will($this->returnValue(
                [
                    [ 'id' => $evenement->getId(),
                        'naam' => $evenement->getNaam(),
                        'begindatum' => $evenement->getBeginDatum(),
                        'einddatum' => $evenement->getEindDatum(),
                        'klantnummer' => $evenement->getKlantnummer(),
                        'bezetting' => $evenement->getBezetting(),
                        'kost' => $evenement->getKost(),
                        'materialen' => $evenement->getMaterialen()
                    ]
                ]));
        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new PDOEvenementRepository($this->mockPDO);
        $actualEvenement =
            $pdoRepository->findEventByDate($evenement->getBeginDatum(), $evenement->getEindDatum());

        //var_dump($evenement);
        //var_dump($actualEvenement);

        $this->assertEquals($allEvents, $actualEvenement);
    }

    public function testFindEventByDates_datesDoesNotExist_Null()
    {
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetchAll')
            ->will($this->returnValue([]));
        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new PDOEvenementRepository($this->mockPDO);
        $actualEvenement = $pdoRepository->findEventByDate('2017-05-17', '2017-05-17');
        $this->assertEquals($actualEvenement, '');
    }
    public function testFindEventByDates_exeptionThrownFromPDO_Null()
    {
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam')->will(
                $this->throwException(new Exception()));
        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new PDOEvenementRepository($this->mockPDO);
        $actualEvenement = $pdoRepository->findEventByDate('2017-05-17', '2017-05-17');
        $this->assertEquals($actualEvenement, '');
    }

    public function testFindEventByCustomerAndDates_customerAndDatesExists_EventObject()
    {
        $evenement = new Evenement(1, 'welcome home', '2017-05-17', '2017-05-17', 1, 'niets', 5000.0, 'niets');
        $allEvents = Array($evenement);
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetchAll')
            ->will($this->returnValue(
                [
                    [ 'id' => $evenement->getId(),
                        'naam' => $evenement->getNaam(),
                        'begindatum' => $evenement->getBeginDatum(),
                        'einddatum' => $evenement->getEindDatum(),
                        'klantnummer' => $evenement->getKlantnummer(),
                        'bezetting' => $evenement->getBezetting(),
                        'kost' => $evenement->getKost(),
                        'materialen' => $evenement->getMaterialen()
                    ]
                ]));
        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new PDOEvenementRepository($this->mockPDO);
        $actualEvenement =
            $pdoRepository->findEventByCustomerAndDate($evenement->getKlantnummer() ,$evenement->getBeginDatum(), $evenement->getEindDatum());

        //var_dump($evenement);
        //var_dump($actualEvenement);

        $this->assertEquals($allEvents, $actualEvenement);
    }

    public function testFindEventByCustomerAndDates_customerAndDatesDoesNotExist_Null()
    {
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetchAll')
            ->will($this->returnValue([]));
        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new PDOEvenementRepository($this->mockPDO);
        $actualEvenement = $pdoRepository->findEventByCustomerAndDate(1 ,'2017-05-17', '2017-05-17');
        $this->assertEquals($actualEvenement, '');
    }
    public function  testFindEventByCustomerAndDates_exeptionThrownFromPDO_Null()
    {
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam')->will(
                $this->throwException(new Exception()));
        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new PDOEvenementRepository($this->mockPDO);
        $actualEvenement = $pdoRepository->findEventByCustomerAndDate(1 ,'2017-05-17', '2017-05-17');
        $this->assertEquals($actualEvenement, '');
    }

    public function tearDown()
    {
        $this->mockPDO = null;
        $this->mockPDOStatement = null;
    }
}