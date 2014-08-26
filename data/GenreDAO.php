<?php
require_once("data/DBConfig.php");
require_once("entities/Genre_class.php");
class GenreDAO {
    public function getAll() {
        $lijst = array();
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select id, omschrijving from mvc_genres";
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $genre = Genre::create($rij["id"],
            $rij["omschrijving"]);
            array_push($lijst, $genre);
        }
        $dbh = null;
        return $lijst;
    }
    
    public function getById($id) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,
        DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select omschrijving from mvc_genres where id = " . $id;
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch();
        $genre = Genre::create($id, $rij["omschrijving"]);
        $dbh = null;
        return $genre;
    }
}

