<?php

/**
 * Created by PhpStorm.
 * User: Wiets
 * Date: 15/04/2017
 * Time: 14:18
 */
class Movie_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAllMovies()
    {
        $query = $this->db->get("Movies");
        return $query->result();
    }

    public function addMovieToDb($title, $releaseYear, $score = null)
    {
        $data = array(
            'Title' => $title,
            'ReleaseYear' => $releaseYear,
            'Score' => $score
        );

        $this->db->insert('Movies', $data);
    }

    public function removeMovie($id)
    {
        $this->db->where('Id', $id);
        $this->db->delete('Movies');

    }

}