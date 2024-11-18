<?php
namespace Src\Service\ClientService;

use Src\Repository\ClientRepository;
use Src\Entity\Client;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\EntityManager;

class ClientService
{
    private EntityManager $entityManager;
    
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    public function deleteClient (int $id): void
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
