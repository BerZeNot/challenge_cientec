<?php 

function connectDB(){
    $db = new SQLite3($_SERVER['DOCUMENT_ROOT'] . "/backend/db/database.db");
    return $db;
}

?>