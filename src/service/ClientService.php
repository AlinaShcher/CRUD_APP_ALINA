<?php
namespace Src\Service\ClientService;
use Src\Repository\ClientRepository;
use Src\Entity\Client;
use Doctrine\ORM\Exception\ORMException;

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
            throw new ("Ошибка: " . $e->getMessage());
        }
    }
}

