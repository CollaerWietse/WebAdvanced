<?php

/**
 * Created by PhpStorm.
 * User: Wiets
 * Date: 15/04/2017
 * Time: 13:55
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{
    /*
     * Index functie wordt standaard aangeroepen bij het openen van de website. Deze functie verwijst door naar start
     */
    public function index()
    {
        $this->start();
    }

    /*
     * $info["title"]: zet de titel van de pagina.
     * $data["movies"]: Haalt de data op uit movie_model.
     * views worden weergegeven met de nodige data en info.
     */
    public function start()
    {
        $this->load->model("movie_model");
        $info["title"] = "Start";
        $data["movies"] = $this->movie_model->getAllMovies();
        $this->load->view("header", $info);
        $this->load->view("start", $data);
        $this->load->view("footer");
    }

    /*
     * Opent een pagina om een film toe te voegen.
     * Wanneer de pagina geladen wordt, zal de validatie al eens uitgevoerd worden.
     * Wanneer er op submit geklikt wordt, dan zal de validatie nog eens uitgevoerd worden.
     * Indien de validatie lukt, zal er terug naar de startpagina gegaan worden en zal de film in de startpagina te zien zijn.
     * Anders worden de errors weergegeven.
     */
    public function addMovie()
    {
        $this->load->model("movie_model");
        $this->load->library("form_validation");
        $this->load->helper("security_helper");

        $info['title'] = "Add movie";

        $title = $this->input->post('title');
        $releaseYear = $this->input->post('releaseYear');
        $score = $this->input->post('score');

        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean|max_length[255]', array('required' => '%s is required.', 'max_length' => '%s can only have 255 characters'));
        $this->form_validation->set_rules('releaseYear', 'Release year', 'trim|required|xss_clean|numeric|less_than_equal_to[' . date("Y")  . ']', array('required' => '%s moet ingevuld worden.', 'numeric' => '%s needs to be a number', 'less_than_equal_to' => "%s can not be greater than the current year."));
        $this->form_validation->set_rules('score', 'Score', 'trim|xss_clean|numeric|less_than[11]', array('numeric' => '%s needs to be a number', 'less_than' => "%s can not be greater than 10."));

        if($this->form_validation->run() === FALSE){
            $data["errors"] = validation_errors();
            $this->load->view("header", $info);
            $this->load->view("addMovie", $data);
            $this->load->view("footer");
        }

        else{
            $this->movie_model->addMovieToDb($title, $releaseYear, $score);
            redirect(base_url());
        }
    }

    /*
     * Deze functie roept movie_model aan om een film te verwijderen.
     * Daarna wordt de startpagina terug doorverwezen en zal de film niet meer in de lijst te zien zijn.
     */
    public function deleteMovie($id)
    {
        $this->load->model('movie_model');
        $this->movie_model->removeMovie($id);
        redirect(base_url());
    }
}