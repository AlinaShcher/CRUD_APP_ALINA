<?php
namespace src\controller\ClientController;
use src\entity\Client;
use src\service\ClientService;
use Doctrine\ORM\EntityManagerInterface;
class ClientController
{
    private ClientService $clientservice;

    public function __construct(ClientService $clientservice)
    {
        $this->ClientService = $clientservice;
    }

    function deleteClient(){
        if (isset($_REQUEST['id'])){
            $this->ClientService->delete($_REQUEST['id']);
        } else {
            echo 'Ошибка';
        }
    }
}

