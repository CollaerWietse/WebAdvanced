<?php

/**
 * Created by PhpStorm.
 * User: Wiets
 * Date: 15/05/2017
 * Time: 17:30
 */
class Event_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAllEvents()
    {
        $query = $this->db->get('events');
        return $query->result();
    }

    public function addEvent($title, $customer_id, $date)
    {
        date_default_timezone_set('Europe/Brussels');
        $dataToInsert = array(
            'title' => $title,
            'customer_id' => $customer_id,
            'date' => DateTime::createFromFormat("d/m/Y G:i", $date)->getTimestamp(),
        );

        $this->db->insert('events', $dataToInsert);
    }
}