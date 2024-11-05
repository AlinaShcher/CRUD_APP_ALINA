<?php
namespace src\service\ClientService;
use src\repository\clientRepository;
use src\entity\Client;
use Exception;
class ClientService
{
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = getEntityManager();
    }

    public function deleteClient (int $id)
    {
        try {
            $client = $this->entityManager->find($id);
            $this->entityManager->remove($client);

        } catch (Exception $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
}

