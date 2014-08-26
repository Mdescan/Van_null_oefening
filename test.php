<?php
require_once("business/Boekservice_class.php");
$boekSvc = new BoekService();
$lijst = $boekSvc->getBoekenOverzicht();
print("<pre>");
print_r($lijst);
print("</pre>");

