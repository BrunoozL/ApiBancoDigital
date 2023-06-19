<?php

namespace ApiBancoDigital\Model;
use ApiBancoDigital\DAO\CorrenteDAO;

class CorrenteModel extends Model
{
    public $id, $email, $nome, $cpf, $senha, $data_nasc, $data_cadastro;
    
    public function save() : ?CorrenteModel
    {
        return (new CorrenteDAO())->save($this);     
    }

    public function getByCpfAndSenha($cpf, $senha) : CorrenteModel
    {      
        return (new CorrenteDAO())->selectByCpfAndSenha($cpf, $senha);
    }
}