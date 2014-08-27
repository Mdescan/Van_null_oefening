<?php
require_once("business/Genreservice_class.php");
require_once("business/Boekservice_class.php");
require_once ("exceptions/TitelbestaatException.php");
if (isset($_GET["action"]) && $_GET["action"] == "process") {
    $boekSvc = new BoekService();
    try {
        $boekSvc->voegNieuwBoekToe($_POST["txtTitel"], $_POST["selGenre"]);
        header("location: toonalleboeken.php");
        exit(0);
    } catch (TitelBestaatException $tbe) {
        header("location: Voegboektoe.php?error=titleexists");
    }
} else {
    $genreSvc = new GenreService();
    $genreLijst = $genreSvc->getGenresOverzicht();
    if(isset($_GET["error"])){
        $error=$_GET["error"];
    }
    include("presentation/nieuwboekform.php");
}