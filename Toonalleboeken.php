<?php
require_once("business/Boekservice_class.php");
$boekSvc = new BoekService();
$boekenLijst = $boekSvc->getBoekenOverzicht();
include("presentation/Boekenlijst.php");
?>