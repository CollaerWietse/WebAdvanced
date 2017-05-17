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

    public function getAllCustomers()
    {
        $query = $this->db->get('customers');
        return $query->result();
    }

    public function removeById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('customers');
        redirect(base_url() . "Main/home");
    }

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