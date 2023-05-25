<?php

namespace ApiBancoDigital\DAO;

use ApiBancoDigital\Model\CorrenteModel;
use PDO;

class CorrenteDAO extends DAO
{
    public function __construct()
    {

        parent::__construct();       
    }

    public function save(CorrenteModel $m) : CorrenteModel
    {
        return ($m->id == null) ? $this->insert($m) : $this->update($m);
    }



    private function insert(CorrenteModel $model)
    {
        $sql = "INSERT INTO Corrente(nome, email, cpf, data_nasc, senha) 
                VALUES (?, ?, ?, ?, sha1(?) )";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->cpf);
        $stmt->bindValue(4, $model->data_nasc);
        $stmt->bindValue(5, $model->senha);

        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;
    }


    private function update(CorrenteModel $m) 
    {

    }

    public function selectByCpfAndSenha($cpf, $senha) : CorrenteModel
    {
        $sql = "SELECT * FROM Corrente WHERE cpf = ? AND senha = sha1(?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $cpf);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        return $stmt->fetchObject("ApiBancoDigital\Model\CorrenteModel");
    }
}