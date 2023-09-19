<?php

namespace ApiBancoDigital\Model;
use ApiBancoDigital\DAO\CorrenteDAO;
use ApiBancoDigital\DAO\ContaDAO;

class CorrenteModel extends Model
{
    public $id, $email, $nome, $cpf, $senha, $data_nasc, $data_cadastro;
    public $rows_contas;
    
    public function save() : ?CorrenteModel
    {
        $dao_correntista = new CorrenteDAO();
        
        $model_preenchido = $dao_correntista->save($this);

        // Se o insert do correntista deu certo
        // vamos inserir sua conta corrente e poupança
        if($model_preenchido->id != null)
        {
            $dao_conta = new ContaDAO();

            // Abrindo a conta corrente
            $conta_corrente = new ContaModel();
            $conta_corrente->id_corrente = $model_preenchido->id;
            $conta_corrente->saldo = 0;
            $conta_corrente->limite = 100;
            $conta_corrente->tipo = 'C';
            $conta_corrente = $dao_conta->insert($conta_corrente);

            $model_preenchido->rows_contas[] = $conta_corrente;

            // Abrindo a conta poupança
            $conta_poupanca = new ContaModel();
            $conta_poupanca->id_corrente = $model_preenchido->id;
            $conta_poupanca->saldo = 0;
            $conta_poupanca->limite = 0;
            $conta_poupanca->tipo = 'P';
            $conta_poupanca = $dao_conta->insert($conta_poupanca);

            $model_preenchido->rows_contas[] = $conta_poupanca;
        }

        // var_dump($model_preenchido);

        return $model_preenchido;    
    }

    public function getByCpfAndSenha($cpf, $senha) : CorrenteModel
    {      
        return (new CorrenteDAO())->selectByCpfAndSenha($cpf, $senha);
    }
}