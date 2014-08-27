<?php
require_once("business/Genreservice_class.php");
require_once("business/Boekservice_class.php");
require_once ("exceptions/TitelbestaatException.php");
if (isset($_GET["action"]) && $_GET["action"] == "process") {
    try{
        $boekSvc = new BoekService();
        $boekSvc->updateBoek($_GET["id"], $_POST["txtTitel"], $_POST["selGenre"]);
        header("location: toonalleboeken.php");
        exit(0);
    }  catch (TitelBestaatException $tbe){
        header("location: updateboek.php?id=".$_GET["id"]."&error=titleexists");
        exit(0);
    }
} else {
    $genreSvc = new GenreService();
    $genreLijst = $genreSvc->getGenresOverzicht();
    $boekSvc = new BoekService();
    $boek = $boekSvc->haalBoekOp($_GET["id"]);
    if(isset($_GET["error"])){
        $error = $_GET["error"];       
    }
    include("presentation/updateboekform.php");
}

