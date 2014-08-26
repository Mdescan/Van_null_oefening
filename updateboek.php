<?php
require_once("business/Genreservice_class.php");
require_once("business/Boekservice_class.php");
if (isset($_GET["action"]) && $_GET["action"] == "process") {
    $boekSvc = new BoekService();
    $boekSvc->updateBoek($_GET["id"], $_POST["txtTitel"], $_POST["selGenre"]);
    header("location: toonalleboeken.php");
    exit(0);
} else {
    $genreSvc = new GenreService();
    $genreLijst = $genreSvc->getGenresOverzicht();
    $boekSvc = new BoekService();
    $boek = $boekSvc->haalBoekOp($_GET["id"]);
    include("presentation/updateboekform.php");
}

