<?php

namespace model;

class Evenement implements \JsonSerializable
{

    private $id;
    private $naam;
    private $beginDatum;
    private $eindDatum;
    private $klantnummer;
    private $bezetting;
    private $kost;
    private $materialen;

    /**
     * Evenement constructor.
     * @param $id
     * @param $naam
     * @param $beginDatum
     * @param $eindDatum
     * @param $klantnummer
     * @param $bezetting
     * @param $kost
     * @param $materialen
     */

    public function __construct($naam, $beginDatum, $eindDatum, $klantnummer, $bezetting, $kost, $materialen)
    {
        //$this->id = $id;
        $this->setNaam($naam);
        $this->setBeginDatum($beginDatum);
        $this->setEindDatum($eindDatum);
        $this->setKlantnummer($klantnummer);
        $this->setBezetting($bezetting);
        $this->setKost($kost);
        $this->setMaterialen($materialen);
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
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
    public function getBeginDatum()
    {
        return $this->beginDatum;
    }

    /**
     * @param mixed $beginDatum
     */
    public function setBeginDatum($beginDatum)
    {
        $this->beginDatum = $beginDatum;
    }

    /**
     * @return mixed
     */
    public function getEindDatum()
    {
        return $this->eindDatum;
    }

    /**
     * @param mixed $eindDatum
     */
    public function setEindDatum($eindDatum)
    {
        $this->eindDatum = $eindDatum;
    }

    /**
     * @return mixed
     */
    public function getKlantnummer()
    {
        return $this->klantnummer;
    }

    /**
     * @param mixed $klantnummer
     */
    public function setKlantnummer($klantnummer)
    {
        $this->klantnummer = $klantnummer;
    }

    /**
     * @return mixed
     */
    public function getBezetting()
    {
        return $this->bezetting;
    }

    /**
     * @param mixed $bezetting
     */
    public function setBezetting($bezetting)
    {
        $this->bezetting = $bezetting;
    }

    /**
     * @return mixed
     */
    public function getKost()
    {
        return $this->kost;
    }

    /**
     * @param mixed $kost
     */
    public function setKost($kost)
    {
        $this->kost = $kost;
    }

    /**
     * @return mixed
     */
    public function getMaterialen()
    {
        return $this->materialen;
    }

    /**
     * @param mixed $materialen
     */
    public function setMaterialen($materialen)
    {
        $this->materialen = $materialen;
    }
}