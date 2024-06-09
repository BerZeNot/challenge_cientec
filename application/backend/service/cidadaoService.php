<?php
require("../db/connection/connectionSQLite.php");

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
}

?>