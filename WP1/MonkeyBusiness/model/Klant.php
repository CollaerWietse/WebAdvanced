<?php

namespace model;

class Klant
{
    private $id;
    private $naam;
    private $voornaam;
    private $postcode;
    private $gemeente;
    private $straat;
    private $huisnummer;
    private $telefoonnummer;
    private $mail;

    /**
     * Person constructor.
     * @param $id
     * @param $naam
     * @param $voornaam
     * @param $postcode
     * @param $gemeente
     * @param $straat
     * @param $huisnummer
     * @param $telefoonnummer
     * @param $mail
     */
    public function __construct($id, $naam, $voornaam, $postcode, $gemeente, $straat, $huisnummer, $telefoonnummer, $mail)
    {
        $this->id = $id;
        $this->naam = $naam;
        $this->voornaam = $voornaam;
        $this->postcode = $postcode;
        $this->gemeente = $gemeente;
        $this->straat = $straat;
        $this->huisnummer = $huisnummer;
        $this->telefoonnummer = $telefoonnummer;
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * @param mixed $naam
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;
    }

    /**
     * @return mixed
     */
    public function getVoornaam()
    {
        return $this->voornaam;
    }

    /**
     * @param mixed $voornaam
     */
    public function setVoornaam($voornaam)
    {
        $this->voornaam = $voornaam;
    }

    /**
     * @return mixed
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param mixed $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * @return mixed
     */
    public function getGemeente()
    {
        return $this->gemeente;
    }

    /**
     * @param mixed $gemeente
     */
    public function setGemeente($gemeente)
    {
        $this->gemeente = $gemeente;
    }

    /**
     * @return mixed
     */
    public function getStraat()
    {
        return $this->straat;
    }

    /**
     * @param mixed $straat
     */
    public function setStraat($straat)
    {
        $this->straat = $straat;
    }

    /**
     * @return mixed
     */
    public function getHuisnummer()
    {
        return $this->huisnummer;
    }

    /**
     * @param mixed $huisnummer
     */
    public function setHuisnummer($huisnummer)
    {
        $this->huisnummer = $huisnummer;
    }

    /**
     * @return mixed
     */
    public function getTelefoonnummer()
    {
        return $this->telefoonnummer;
    }

    /**
     * @param mixed $telefoonnummer
     */
    public function setTelefoonnummer($telefoonnummer)
    {
        $this->telefoonnummer = $telefoonnummer;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }




}
