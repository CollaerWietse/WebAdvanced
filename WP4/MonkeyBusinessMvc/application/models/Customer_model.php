<?php

/**
 * Created by PhpStorm.
 * User: Wiets
 * Date: 15/05/2017
 * Time: 16:18
 */
class Customer_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    /*
     * Geeft alle klanten uit de databank terug.
     */
    public function getAllCustomers()
    {
        $query = $this->db->get('customers');
        return $query->result();
    }

    /*
     * verwijdert een klant uit de databank
     * $id: de id van de te verwijderen klant.
     */
    public function removeById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('customers');
        redirect(base_url() . "Main/home");
    }

    /*
     * Voegt een klant toe aan de databank.
     * $name: De naam van de klant.
     * $email: emailadres van de klant.
     * $phone: telefoonnummer van de klant.
     * $address: het adres van de klant.
     * $city: de gemeente waar de klant woont.
     */
    public function addCustomerToDb($name, $email, $phone, $address, $city)
    {
        $dataToInsert = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'city' => $city
        );

        $this->db->insert('customers', $dataToInsert);
    }
}