<?php
require "../service/cidadaoService.php";

if(isset($_GET['nis']) && isValid($_GET['nis'])){
    $cidadao = cidadaoService::findCidadaoByNis($_GET['nis']);
    
    header("content-type: application/json");
    
    if($cidadao){
        echo $cidadao->toJson();
    } else {       
        // passo para evitar xss por parâmetro na URL
        $nis = htmlspecialchars($_GET['nis']);
        echo <<<RES
            {
                "error": "NIS not found",
                "nis": $nis
            }
            RES;
    }
    

} else {
    header('HTTP/1.1 400 Bad Request', true, 400);
    header("content-type: application/json");

    $bad_parameter = $_GET['nis'];
    echo <<<RES
            {
                "error": "invalid value for 'nis' parameter",
                "value": "$bad_parameter"
            }
    RES;
}

function isValid($nis){
    // regex para validar comprimento e caracteres do nis
    $pattern = "/[0-9]{11}/";
    return preg_match($pattern, $nis) 
        ? true 
        : false;
}
?>