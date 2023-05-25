<?php

    namespace ApiBancoDigital\Controller;

    use ApiBancoDigital\Model\CorrenteModel;
    use Exception;

    include 'Controller.php';

    class CorrenteController extends Controller
    {
        public static function login()
    {
        try
        {
            // Transformando os dados da entrada enviada do app em
            // JSON para um objeto em PHP.
            $data = json_decode(file_get_contents('php://input'));

            $model = new CorrenteModel();

            parent::GetResponseAsJSON($model->getByCpfAndSenha($data->cpf, $data->senha)); 

        } catch(Exception $e) {
            
            parent::LogError($e);
            parent::GetExceptionAsJSON($e);
        }  
    }

    /**
     * Preenche um Model para que seja enviado ao banco de dados para salvar.
     */
    public static function salvar()
    {
        try
        {
            $data = json_decode(file_get_contents('php://input'));

            $model = new CorrenteModel();

            // Copiando os valores de $data para $model
            foreach (get_object_vars($data) as $key => $value) 
            {
                $prop_letra_minuscula = strtolower($key);

                $model->$prop_letra_minuscula = $value;
            }

            parent::setResponseAsJSON($model->save()); 

        } catch(Exception $e) {
            
            parent::LogError($e);
            parent::GetExceptionAsJSON($e);
        }   
    }
    }
?>