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

    /*
     * Verzorgt de login. zoekt het wachtwoord op basis van de gebruikersnaam en controleert of het wachtwoord klopt.
     * $username: de gebruikersnaam van de klant.
     * $password: het wachtwoord van de klant.
     *
     * Bij een correct wachtwoord, wordt er een nieuwe sessie aangemaakt.
     */
    public function doLogin($username, $password)
    {
        $this->db->select('password');
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        $databasePassword = $query->row();
        if($databasePassword === null){
            return false;
        }
        if ($databasePassword->password === md5($password)) {
            $this->setSession($username);
            return true;
        } else {
            return false;
        }
    }
    /*
     * een nieuwe sessie wordt aangemaakt op basis van de gebruikersnaam.
     * $username: de gebruikersnaam.
     */
    private function setSession($username)
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