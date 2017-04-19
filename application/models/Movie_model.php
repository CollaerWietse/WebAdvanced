<?php

/**
 * Created by PhpStorm.
 * User: Wiets
 * Date: 15/04/2017
 * Time: 14:18
 */
class Movie_model extends CI_Model
{
    /*
     * Inladen van database.
     * __constructor wordt altijd aangeroepen bij het werken met movie_model.
     */
    public function __construct()
    {
        $this->load->database();
    }

    /*
     * Geeft alle films terug uit de databank.
     */
    public function getAllMovies()
    {
        $query = $this->db->get("Movies");
        return $query->result();
    }

    /*
     * Voegt een film toe aan de databank.
     */
    public function addMovieToDb($title, $releaseYear, $score = null)
    {
        $data = array(
            'Title' => $title,
            'ReleaseYear' => $releaseYear,
            'Score' => $score
        );

        $this->db->insert('Movies', $data);
    }

    /*
     * Verwijderen van een film uit de databank aan de hand van het id van de film.
     */
    public function removeMovie($id)
    {
        $this->db->where('Id', $id);
        $this->db->delete('Movies');

    }

}