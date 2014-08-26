<?php
require_once("data/GenreDAO.php");
class GenreService {
    public function getGenresOverzicht() {
        $genreDAO = new GenreDAO();
        $lijst = $genreDAO->getAll();
        return $lijst;
    }
}