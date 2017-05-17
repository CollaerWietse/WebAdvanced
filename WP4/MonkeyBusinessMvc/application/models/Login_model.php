<?php

/**
 * Created by PhpStorm.
 * User: Wiets
 * Date: 14/05/2017
 * Time: 14:29
 */
class Login_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function doLogin($username, $password)
    {
        $this->db->select('password');
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        $databasePassword = $query->row();
        if ($databasePassword->password === md5($password)) {
            $this->setSession($username);
            return true;
        } else {
            return false;
        }
    }

    public function setSession($username)
    {
        $this->db->where(strtolower('username'), strtolower($username));
        $query = $this->db->get('users');
        $row = $query->row();
        $sessionArray = array(
            'id' => $row->id,
            'firstName' => $row->firstName,
            'lastName' => $row->lastName,
        );
        $this->session->set_userdata($sessionArray);
    }
}