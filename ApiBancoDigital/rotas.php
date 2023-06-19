<?php

    use ApiBancoDigital\Controller\ChavePixController;
    use ApiBancoDigital\Controller\CorrenteController;

    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    switch ($url)
    {
        case '/correntista/salvar':
            CorrenteController::salvar();
        break;

        case '/conta/extrato':
        break;

        case '/conta/pix/enviar':
        break;

        case '/conta/pix/receber':
        break;

        case '/correntista/entrar':
            CorrenteController::login();
        break;

        default:
            http_response_code(403);
        break;
    }

?>