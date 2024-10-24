<?php
namespace machine\src\clientController;
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
        try {
            $client = new Client();

            $entityManager->persist($client);
            $entityManager->flush();

            return new Response('Saved new product with id ' . $client->getId());
        } catch (PDOException $exception) {
            echo "Ошибка: " . $exception->getMessage();
        }

    }


    public function show(EntityManagerInterface $entityManager, int $id): Response
    {

        $client = $entityManager->getRepository(Client::class)->find($id);
        return new Response($client->getFullname());
    }
