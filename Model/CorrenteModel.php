<?php

namespace ApiBancoDigital\Model;
use ApiBancoDigital\DAO\CorrenteDAO;

class CorrenteModel extends Model
{
    public $id, $nome, $cpf, $senha, $data_nasc;
    
    public function save()
    {
        if($this->id == null)
            (new CorrenteModel())->insert($this);
        else
            (new CorrenteModel())->update($this);
    }

    public function getAllRows()
    {
        $this->rows = (new CorrenteModel())->select();
    }
    public function delete()
    {
        (new CorrenteModel())->delete($this->id);
    }
}