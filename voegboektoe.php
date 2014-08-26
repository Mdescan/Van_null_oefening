<?php
require_once("business/Genreservice_class.php");
require_once("business/Boekservice_class.php");
if (isset($_GET["action"]) && $_GET["action"] == "process") {
    $boekSvc = new BoekService();
    $boekSvc->voegNieuwBoekToe($_POST["txtTitel"], $_POST["selGenre"]);
    header("location: toonalleboeken.php");
    exit(0);
} else {
    $genreSvc = new GenreService();
    $genreLijst = $genreSvc->getGenresOverzicht();
    include("presentation/nieuwboekform.php");
}