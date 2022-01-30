<?php



class Konekcija {
    private $connection;
    function __construct() {
        //povezujemo se bez baze jer hocemo da napravimo novu ako ne postoji 
        $this->connection = new mysqli('localhost','root','');
        if($this->connection->error) {
            die("Greska pri povezivanju: $this->connection->error");
        }

        //kreiramo bazu ako ne postoji
        $this->connection->query("CREATE DATABASE IF NOT EXISTS `baza_session`");

        //selektujemo bazu da bi smo radili sa njom
        $this->connection->select_db('baza_session');

        //kreiramo tabelu user ako ne postoji
        $this->connection->query("CREATE TABLE IF NOT EXISTS `user` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(50) NOT NULL , `password` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`), UNIQUE `uname` (`username`(50))) ENGINE = innoDB;");
        //INSERT IGNORE ignorise duplikate za UNIQUE kolonu (username), tako da nece biti ponavljanja admina u tabeli
        $this->connection->query("INSERT IGNORE INTO `user`(`username`,`password`) VALUES ('admin@admin','adminpass')");

        $this->connection->query("CREATE TABLE IF NOT EXISTS `cestitke` ( `id` INT NOT NULL AUTO_INCREMENT , `ime` VARCHAR(50) NOT NULL , `cena` int(4) NOT NULL , `rokizrade` int(2), `slika` VARCHAR(50) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;");

        $this->connection->query("INSERT IGNORE INTO `cestitke`(`id`,`ime`,`cena`,`rokizrade`,`slika`) VALUES (1,'Sejker',300,3,'../slike/r-srca.png'),(2,'Iskakalica',500,2,'../slike/p-srca.png'),(3,'Sejker',300,4,'../slike/b-srca.png')");
    }

    private function prepareSelectUser() {
        return $this->connection->prepare("SELECT * FROM `user` WHERE `password`=? AND `username`=?");
    }


    function proveriKorisnika($user, $pass): bool {
        $prepared = $this->prepareSelectUser();
        $prepared->bind_param("ss",$pass,$user);
        $prepared->execute();
        return $prepared->get_result()->num_rows == 1;
    }

    function nizSlika() {
        $query_res = $this->connection->query("SELECT * FROM `cestitke`");
        $result = [];
        foreach ($query_res as $row) {
            array_push($result,[$row['id'],$row['ime'],$row['cena'],$row['rokizrade'],$row['slika']]);
        }
        return $result;
    }


    function getProizvodById($id)
{
    global $connection;
    $rez = $connection->query("SELECT naziv FROM proizvodi WHERE id = $id;");
    $rezultat = $rez->fetch_assoc();
    return $rezultat['naziv'];
}
   
}

$connection = new Konekcija();
