<?php

namespace ApiBancoDigital\Model;
use ApiBancoDigital\DAO\TransacaoDAO;

class TransacaoModel extends Model
{
    public $id, $data_hora, $valor;
    
    public function save()
    {
        if($this->id == null)
            (new TransacaoModel())->insert($this);
        else
            (new TransacaoModel())->update($this);
    }

    public function getAllRows()
    {
        $this->rows = (new TransacaoModel())->select();
    }
    public function delete()
    {
        (new TransacaoModel())->delete($this->id);
    }
}