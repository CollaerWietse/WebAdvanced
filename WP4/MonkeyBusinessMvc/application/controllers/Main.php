<?php

/**
 * Created by PhpStorm.
 * User: Wiets
 * Date: 14/05/2017
 * Time: 14:21
 */
class Main extends CI_Controller
{
    /*
     * Eerst controle of er https is gebruikt, indien niet doorverwijzen naar https
     * Daarna naar de loginpagina.
     */
    public function index()
    {
        if(! isset($_SERVER["HTTPS"])){
            header("Location: https://webadvanced.vjho.be");
        }
        $this->login();
    }

    /*
     * Loginpagina met controle op xss.
     * Als de gegevens juist zijn, dan redirect naar de homepagina van het systeem.
     * Anders foutmelding weergeven.
     */
    public function login()
    {
        $this->load->library('form_validation');

        $this->load->helper('security_helper');

        $this->load->model('login_model');
        $username = $this->input->post('username');

        $password = $this->input->post('password');

        $this->form_validation->set_rules('username', 'Gebruikersnaam', 'trim|required|xss_clean', array('required' => '%s moet ingevuld worden.'));

        $this->form_validation->set_rules('password', 'Wachtwoord', 'trim|required|xss_clean', array('required' => '%s moet ingevuld worden.'));

        if ($this->form_validation->run() == FALSE) {

            $error['validation'] = validation_errors();
            $this->load->view('login', $error);
        } else {

            if ($this->login_model->doLogin($username, $password)) {
                redirect(base_url() . "Main/home");
            }
            else{
                $error['validation'] = "<p>Gebruikersnaam of wachtwoord niet correct</p>";
                $this->load->view('login', $error);
            }

        }
    }

    /*
     * bij het uitloggen wordt de huidige sessie verwijderd.
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    /*
     * controller-functie voor de homepagina. alle evenementen en klanten worden geladen.
     */
    public function home()
    {
        if(!isset($_SESSION['id'])){
            redirect(base_url());
        }
        else {
            $this->load->model('customer_model');
            $this->load->model('event_model');
            $data["customers"] = $this->customer_model->getAllCustomers();
            $data["events"] = $this->event_model->getAllEvents();
            $this->load->view('header');
            $this->load->view('home', $data);
        }
    }

    /*
     * controller-functie om een klant toe te voegen aan het systeem.
     */
    public function addCustomer()
    {
        if(!isset($_SESSION['id'])){
            redirect(base_url());
        }
        else {
            $this->load->library('form_validation');

            $this->load->helper('security_helper');

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $address = $this->input->post('address');
            $city = $this->input->post('city');

            $this->form_validation->set_rules('name', 'Naam', 'trim|required|xss_clean|max_length[255]', array('required' => '%s moet ingevuld worden.', 'max_length' => '%s mag maximum 255 karakters bevatten.'));
            $this->form_validation->set_rules('email', 'Emailadres', 'trim|required|xss_clean|valid_email', array('required' => '%s moet ingevuld worden.', 'valid-email' => "%s moet een geldig emailadres zijn."));
            $this->form_validation->set_rules('phone', 'Telefoonnummer', 'trim|required|xss_clean|max_length[20]', array('required' => '%s moet ingevuld worden.', 'max_length' => '%s mag maximum 20 karakters bevatten.'));
            $this->form_validation->set_rules('address', 'Adres', 'trim|required|xss_clean|max_length[128]', array('required' => '%s moet ingevuld worden.', 'max_length' => '%s mag maximum 128 karakters bevatten.'));
            $this->form_validation->set_rules('city', 'Gemeente', 'trim|required|xss_clean|max_length[128]', array('required' => '%s moet ingevuld worden.', 'max_length' => '%s mag maximum 128 karakters bevatten.'));

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('header');
                $this->load->view('addCustomer');
            } else {
                $this->load->model('customer_model');
                $this->customer_model->addCustomerToDb($name, $email, $phone, $address, $city);
                redirect(base_url() . "Main/home");
            }
        }
    }

    /*
     * controller-functie om een klant te verwijderen via base_url/Main/removeCustomer/1 waarbij 1 de id van de klant is.
     */
    public function removeCustomer($id)
    {
        if(!isset($_SESSION['id'])){
            redirect(base_url());
        }
        else {
            $this->load->model('customer_model');

            $this->customer_model->removeById($id);
        }
    }

    /*
     * Controller-functie om een evenement toe te voegen.
     */
    public function addEvent()
    {
        if(!isset($_SESSION['id'])){
            redirect(base_url());
        }
        else {
            $this->load->library('form_validation');

            $this->load->helper('security_helper');

            $this->load->model('customer_model');
            $data["customers"] = $this->customer_model->getAllCustomers();

            $title = $this->input->post('title');
            $customer_id = $this->input->post('selectedCustomer');
            $date = $this->input->post('date');

            $this->form_validation->set_rules('title', 'Titel', 'trim|required|xss_clean|max_length[255]', array('required' => '%s moet ingevuld worden.', 'max_length' => '%s mag maximum 255 karakters bevatten.'));
            $this->form_validation->set_rules('selectedCustomer', 'Klant', 'trim|required|xss_clean|numeric', array('required' => '%s moet ingevuld worden.'));
            $this->form_validation->set_rules('date', 'Datum', 'trim|required|xss_clean|max_length[16]', array('required' => '%s moet ingevuld worden.', 'max_length' => "%s mag maximum 16 karakters bevatten."));

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('header');
                $this->load->view('addEvent', $data);
            } else {
                $this->load->model('event_model');
                $this->event_model->addEvent($title, $customer_id, $date);
                redirect(base_url() . "Main/home");
            }
        }
    }
}