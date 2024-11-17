<?php
namespace src\controller\ClientController;
use src\entity\Client;
use src\service\ClientService;
use Exception;

class ClientController
{
    private ClientService $clientService;
    public function __construct(ClientService $clientService)
    {
        $this->ClientService = $clientService;
    }
    public function deleteClient(){
        if (!isset($_REQUEST['id'])) {
            throw new Exception("Неверные параметры запроса", 400);
        }
        $this->ClientService->delete($_REQUEST['id']);
    }
}

