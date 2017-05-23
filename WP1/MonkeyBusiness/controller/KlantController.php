<?php

namespace controller;

use model\KlantRepository;
use view\View;

class KlantController
{
    private $klantRepository;
    private $view;

    public function __construct(KlantRepository $klantRepository, View $view)
    {
        $this->klantRepository = $klantRepository;
        $this->view = $view;
    }

    public function handleFindPersonById($id = null)
    {
        $klant = $this->klantRepository->findCustomerById($id);
        $this->view->show(['klant' => $klant]);
    }

    public function handleAddCustomer($customer) {
        $customer = $this->klantRepository->addCustomer($customer);
        echo json_encode($customer, JSON_PRETTY_PRINT);
    }
}
