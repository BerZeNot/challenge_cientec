<?php

class Cidadao {
    private $id;
    private $nome;
    private $nis;
 
    public function __construct($id=null, $nome, $nis=null) {
        $this->id = $id; 
        $this->nome = $nome; 
        $this->nis = $nis; 
    }

    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getNIS(){
        return $this->nis;
    }

    public function toJson(){
        return json_encode(
            array(
                "id" => $this->id,
                "name" => $this->nome,
                "nis" => $this->nis,
            )
        );
    }
}

?>