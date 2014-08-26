<?php
require_once("data/boekDAO.php");
$dao = new BoekDAO();
$lijst = $dao->getAll();
print("<pre>");
print_r($lijst);
print("</pre>");
?>

