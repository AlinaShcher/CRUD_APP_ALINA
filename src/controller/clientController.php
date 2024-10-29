<?php
namespace machine\src\controller\clientController;
require_once "bootstrap.php";
use src\entity\Client;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use SrcEntityClient;
use SrcFormClientType;
use SrcRepositoryClientRepository;
use SymfonyBundleFrameworkBundleControllerAbstractController;
use SymfonyComponentHttpFoundationRequest;
use SymfonyComponentHttpFoundationResponse;
use SymfonyComponentRoutingAnnotationRoute;


class clientController extends AbstractController
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
