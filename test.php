<?php
require_once("data/BoekDAO.php");
$dao = new BoekDAO();
$boek = $dao->getById(1);
print("<pre>");
print_r($boek);
print("</pre>");
?>