<?php
require_once("data/GenreDAO.php");
$dao = new GenreDAO();
$genre = $dao->getById(3);
print("<pre>");
print_r($genre);