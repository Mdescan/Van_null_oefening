<?php
require_once("data/GenreDAO.php");
$dao = new GenreDAO();
$lijst = $dao->getAll();
print("<pre>");
print_r($lijst);
print("</pre>");

