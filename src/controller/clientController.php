<?php
namespace machine\src\controller\ClientController;
use src\entity\Client;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class ClientController extends AbstractController
{
    public function __construct()
    {

    }

    public function create(EntityManagerInterface $entityManager)
    {
            $client = new Client();

            $entityManager->persist($client);
            $entityManager->flush();

            return new Response('Saved new client with id ' . $client->getId());

    }


    public function show(EntityManagerInterface $entityManager, int $id): Response
    {

        $client = $entityManager->getRepository(Client::class)->find($id);
        return new Response($client->getFullname());
    }
}
