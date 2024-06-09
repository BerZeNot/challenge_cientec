<?php

class Cidadao {
    private $id;
    private $nome;
    private $nis;
 
    public function __construct($nome) {
        $this->nome = $nome; 
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
}

?>