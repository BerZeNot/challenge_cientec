<?php
require("../model/cidadao.php");
require("../service/cidadaoService.php");

if(!empty($_POST)){
    // Valida o nome
    $name = $_POST['name'];
    if(isset($_POST['name']) && isNameValid($name)){
        // Cria a classe
        $cidadao = new Cidadao($name);
        // manda para salvar

        cidadaoService::save($cidadao);
        
        // retorna para o front-end
        header("location: /?msg=success");
    } else {
        header("location: /?msg=error");
    }


} else {
    echo("Houston, we have a problem!");
}


function isNameValid($name){
    if(empty($name))
        return false;

    return true;
}

?>