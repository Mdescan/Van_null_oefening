<?php
require_once("data/BoekDAO.php");
class BoekService {
    public function getBoekenOverzicht() {
        $boekDAO = new BoekDAO();
        $lijst = $boekDAO->getAll();
        return $lijst;
    }
}

