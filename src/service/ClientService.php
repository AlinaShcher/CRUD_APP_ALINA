<?php
namespace src\service\ClientService;
use src\repository\clientRepository;
use src\entity\Client;
use Doctrine\ORM\ORMException;
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
            $client = $this->entityManager->find(Client::class, $id);
            $this->entityManager->remove($client);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
}

