<?php
use src\repository\clientRepository;
use src\entity\Client;
use Doctrine\ORM\EntityManagerInterface;
class ClientService
{
    private clientRepository $clientRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(clientRepository $clientRepository, EntityManagerInterface $entityManager)
    {
        $this->clientRepository = $clientRepository;
        $this->entityManager = $entityManager;
    }

    public function createClient(string $name, string $email): Client
    {
        $client = new Client();
        $client->setFullname($fullName);
        $client->setSex($sex);
        $client->setPhonenumber($phoneNumber);
        $this->entityManager->persist($client);
        $this->entityManager->flush();

        return $client;
    }

    public function getClientById(int $id): ?Client
    {
        return $this->clientRepository->find($id);
    }

    public function updateClient(Client $client, string $fullName, string $sex, int $phoneNumber): Client
    {
        $client->setName($fullName);
        $client->setSex($sex);
        $client->setPhonenumber($phoneNumber);

        $this->entityManager->flush();

        return $client;
    }

    public function deleteClient(Client $client): void
    {
        $this->entityManager->remove($client);
        $this->entityManager->flush();
    }
}

