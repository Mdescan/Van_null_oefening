<?php
require_once("data/DBConfig.php");
require_once("entities/Genre_class.php");
require_once("entities/Boek_class.php");

class BoekDAO {
    public function getAll() {
        $lijst = array();
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select mvc_boeken.id as boekid, titel,genreid, omschrijving from mvc_boeken,
        mvc_genres where genreid =mvc_genres.id";
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $genre = Genre::create($rij["genreid"],
            $rij["omschrijving"]);
            $boek = Boek::create($rij["boekid"],
            $rij["titel"], $genre);
            array_push($lijst, $boek);
        }
        $dbh = null;
        return $lijst;
    }
    public function getById($id) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME,DBConfig::$DB_PASSWORD);
        $sql = "select mvc_boeken.id as boekid, titel, genreid,omschrijving from mvc_boeken, mvc_genres where
        genreid = mvc_genres.id and mvc_boeken.id = " . $id;
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch();
        $genre = Genre::create($rij["genreid"],
        $rij["omschrijving"]);
        $boek = Boek::create($rij["boekid"], $rij["titel"], $genre);
        $dbh = null;
        return $boek;
    }
    
    public function create($titel, $genreId) {
        $sql = "insert into mvc_boeken (titel, genreid) values ('" . $titel . "', " . $genreId . ")";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME,DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $boekId = $dbh->lastInsertId();
        $dbh = null;
        $genreDAO = new GenreDAO();
        $genre = $genreDAO->getById($genreId);
        $boek = Boek::create($boekId, $titel, $genre);
        return $boek;
    }
}
