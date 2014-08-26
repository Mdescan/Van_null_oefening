<?php
require_once("data/BoekDAO.php");
class BoekService {
    public function getBoekenOverzicht() {
        $boekDAO = new BoekDAO();
        $lijst = $boekDAO->getAll();
        return $lijst;
    }
    
    public function voegNieuwBoekToe($titel, $genreId) {
        $boekDAO = new BoekDAO();
        $boekDAO->create($titel, $genreId);
    }
    
    public function verwijderBoek($id) {
        $boekDAO = new BoekDAO();
        $boekDAO->delete($id);
    }
}

