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
    /*
     * geeft alle evenementen uit de databank terug.
     */
    public function getAllEvents()
    {
        $query = $this->db->get('events');
        return $query->result();
    }

    /*
     * voegt een evenement aan de databank toe
     * $title: titel van het evenement.
     * $customer_id: de id van de klant.
     * $date: de datum waarop het evenement plaats heeft.
     */
    public function addEvent($title, $customer_id, $date)
    {
        $dataToInsert = array(
            'title' => $title,
            'customer_id' => $customer_id,
            'date' => $date,
        );

        $this->db->insert('events', $dataToInsert);
    }
}