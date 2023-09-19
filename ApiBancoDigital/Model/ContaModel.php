<?php

namespace ApiBancoDigital\Model;
use ApiBancoDigital\DAO\ContaDAO;

class ContaModel extends Model
{
    public $id, $id_corrente, $tipo, $saldo, $limite, $data_abertura;
    
    public function save()
    {
      // Instância do objeto e conexão no banco de dados via construtor
      $dao = new ContaDAO(); 

      // Verificando se a propriedade id foi preenchida no model
      // Para saber mais sobre a palavra-chave this, leia: https://pt.stackoverflow.com/questions/575/quando-usar-self-vs-this-em-php
      // Para saber mais sobre a função empty, leia: https://www.php.net/manual/pt_BR/function.empty.php
      if(empty($this->id))
      {
          // Chamando o método insert que recebe o próprio objeto model
          // já preenchido
          $dao->insert($this);

      } else {

          //$dao->update($this); // Como existe um id, passando o model para ser atualizado.
      }        
    }

    public function getAllRows(int $id_cidadao)
    {
        $dao = new ContaDAO();
        $this->rows = $dao->select($id_cidadao);
    }
    public function delete()
    {
        (new ContaModel())->delete($this->id);
    }
}