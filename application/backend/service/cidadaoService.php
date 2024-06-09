<?php
require("../db/connection/connectionSQLite.php");
require("../model/cidadao.php");

function generateNIS($db){
    $nis = $db->querySingle("select nis from NextNIS");
    $nextNis = $nis + 1;
    $db->query("UPDATE NextNIS set nis = ". $nextNis . " where rowid = 1");
    return $nis;
}

class cidadaoService {

    public static function save(Cidadao $cidadao){
        $db = connectDB();
        $nis = generateNIS($db);

        $stmt = $db->prepare("INSERT INTO Cidadao(nome, nis) VALUES(:nome, :nis)");
        $stmt->bindValue(":nome", $cidadao->getNome());
        $stmt->bindValue(":nis", $nis);

        $stmt->execute();
        return $nis;
    }

    public static function findCidadaoByNis($nis) {
        $db = connectDB();
        $stmt = $db->prepare("SELECT * FROM Cidadao WHERE nis = :nis");
        $stmt->bindValue(":nis", $nis);
        $result = $stmt->execute();
        
        if($data = $result->fetchArray()){
            return new Cidadao($data['id'], $data['nome'], $data['nis']);
        } else {
            return false;
        }

    }
}

?>