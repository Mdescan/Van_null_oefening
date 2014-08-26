<?php
require_once("business/Boekservice_class.php");
$boekSvc = new BoekService();
$boekSvc->verwijderBoek($_GET["id"]);
header("location: toonalleboeken.php");
exit(0);