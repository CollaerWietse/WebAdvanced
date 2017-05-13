<?php

namespace controller;

use model\EvenementRepository;
use view\EvenementJsonView;
use \model\Evenement;

class EvenementController
{
    private $evenementRepository;
    private $view;

    public function __construct(EvenementRepository $evenementRepository, EvenementJsonView $view)
    {
        $this->evenementRepository = $evenementRepository;
        $this->view = $view;
    }

    public function handleFindEvents()
    {
        $evenement = $this->evenementRepository->findEvents();
        echo json_encode($evenement, JSON_PRETTY_PRINT);
    }

    public function handleFindEvenementById($id)
    {
        $evenement = $this->evenementRepository->findEventById($id);
        echo json_encode($evenement, JSON_PRETTY_PRINT);
    }

    public function handleFindEventByCustomer($customer)
    {
        $evenement = $this->evenementRepository->findEventByCustomer($customer);
        echo json_encode($evenement, JSON_PRETTY_PRINT);
    }

    public function handleFindEvenementByDate($startDate, $endDate)
    {
        $evenement = $this->evenementRepository->findEventByDate($startDate, $endDate);
        echo json_encode($evenement, JSON_PRETTY_PRINT);
    }

    public function handleFindEventByCustomerAndDate($customerId, $startDate, $endDate)
    {
        $evenement = $this->evenementRepository->findEventByCustomerAndDate($customerId, $startDate, $endDate);
        echo json_encode($evenement, JSON_PRETTY_PRINT);
    }

    public function handleAddEvent($event) {
        $data = json_encode($event, JSON_PRETTY_PRINT);
        $evenement = $this->evenementRepository->addEvent($data);
        //echo json_encode($evenement, JSON_PRETTY_PRINT);
    }

    public function handleUpdateEvent($id, $event) {
        $data = json_encode($event, JSON_PRETTY_PRINT);
        $evenement = $this->evenementRepository->updateEvent($id, $event);
        //echo json_encode($evenement, JSON_PRETTY_PRINT);
    }

    public function handleDeleteEvent($id) {
        $evenement = $this->evenementRepository->deleteEvent($id);
        echo json_encode($evenement, JSON_PRETTY_PRINT);
    }
}
