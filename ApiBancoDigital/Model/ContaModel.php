<?php

namespace ApiBancoDigital\Model;
use ApiBancoDigital\DAO\ContaDAO;

class ContaModel extends Model
{
    public $id, $tipo, $saldo, $limite;
    
    public function save()
    {
        if($this->id == null)
            (new ContaModel())->insert($this);
        else
            (new ContaModel())->update($this);
    }

    public function getAllRows()
    {
        $this->rows = (new ContaModel())->select();
    }
    public function delete()
    {
        (new ContaModel())->delete($this->id);
    }
}