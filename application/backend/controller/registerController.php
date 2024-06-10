<?php
// require("../model/cidadao.php");
require("../service/cidadaoService.php");

if(!empty($_POST)){
    $name = $_POST['name'];
    if(isset($_POST['name']) && isNameValid($name)){
        $cidadao = new Cidadao(null, $name, null);  
        $newNisRegistered = cidadaoService::save($cidadao);
        header("location: /?nis=$newNisRegistered");
    } else {
        header("location: /?msg=invalid-name");
    }
    
} else {
    echo("Houston, we have a problem!");
}


function isNameValid($name){

    if(empty($name))
        return false;

    $expression = '/^[a-zA-ZÀ-ÖØ-öø-ÿ\s\'-]+$/u';
    if(!preg_match($expression, $name))
        return false;

    if(strlen($name) > 50)
        return false;
    
    return true;
}

?>