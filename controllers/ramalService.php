<?php

//CRUD

class RamalService {
    private $conexao;
    private $ramal;

    public function __construct(Conexao $conexao, Ramal $ramal){
        $this->conexao = $conexao->conectar();
        $this->ramal = $ramal;
    }

    public function inserir() {  //CREATE
        $query = "INSERT INTO ramais(ramal, nome, `status`, ip) VALUES(:ramal, :nome, :sts, :ip)";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':ramal', $this->ramal->__get('ramal'));
        $stmt->bindValue(':nome', $this->ramal->__get('nome'));
        $stmt->bindValue(':sts', $this->ramal->__get('status'));
        $stmt->bindValue(':ip', $this->ramal->__get('ip'));
        $stmt->execute();
    }

    public function atualizar() {  //UPDATE
        $query = "UPDATE ramais SET ramal = :ramal, nome = :nome, `status` = :sts, ip = :ip WHERE ramal = :ramal";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':ramal', $this->ramal->__get('ramal'));
        $stmt->bindValue(':nome', $this->ramal->__get('nome'));
        $stmt->bindValue(':sts', $this->ramal->__get('status'));
        $stmt->bindValue(':ip', $this->ramal->__get('ip'));
        $stmt->execute();
    }

}

?>