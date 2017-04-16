<?php

/**
 * Created by PhpStorm.
 * User: Wiets
 * Date: 15/04/2017
 * Time: 13:55
 * Start, openen van de base_url op de server, zou een Hello world moeten tonen.
 */

class Main extends CI_Controller
{
    public function index()
    {
        $this->start();
    }

    public function start()
    {
        $info["title"] = "Start";
        $this->load->view("header");
        $this->load->view("start");
        $this->load->view("footer");
    }
}