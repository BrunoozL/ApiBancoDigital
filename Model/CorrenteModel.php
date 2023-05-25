<?php

namespace ApiBancoDigital\Model;
use ApiBancoDigital\DAO\CorrenteDAO;

class CorrenteModel extends Model
{
    public $id, $email, $nome, $cpf, $senha, $data_nasc;
    
    public function save() : ?CorrenteModel
    {
        return (new CorrenteModel())->save($this);     
    }

    public function getByCpfAndSenha($cpf, $senha) : CorrenteModel
    {      
        return (new CorrenteModel())->selectByCpfAndSenha($cpf, $senha);
    }
}