<?php
namespace src\controller\ClientController;
use src\entity\Client;
use src\service\ClientService;
use Exception;

class ClientController
{
    private ClientService $clientservice;
    public function __construct(ClientService $clientservice)
    {
        $this->ClientService = $clientservice;
    }
    function deleteClient(){
        if (!isset($_REQUEST['id'])){
            throw new Exception("Неверные параметры запроса", 400);
        } else {
            $this->ClientService->delete($_REQUEST['id']);
        }
    }
}

