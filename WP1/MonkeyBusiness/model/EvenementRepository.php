<?php

namespace model;

interface EvenementRepository
{
     public function findEvents();
     public function findEventById($id);
     public function findEventByCustomer($customerId);
     public function findEventByDate($startDate, $endDate);
     public function findEventByCustomerAndDate($customerId, $startDate, $endDate);

     public function addEvent($event);
     public function updateEvent($event);
     public function deleteEvent($id);
}
