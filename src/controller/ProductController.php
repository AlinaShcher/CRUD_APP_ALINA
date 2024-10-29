<?php
namespace machine\src\controller\ProductController;
require_once "bootstrap.php";
use src\entity\Product;
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


class ProductControllerController extends AbstractController
{
    public function __construct()
    {

    }

    public function create(EntityManagerInterface $entityManager)
    {
        $product = new Product();

        $entityManager->persist($product);
        $entityManager->flush();

        return new Response('Saved new product with id ' . $product->getId());

    }


    public function show(EntityManagerInterface $entityManager, int $id): Response
    {

        $product = $entityManager->getRepository(Product::class)->find($id);
        return new Response($product->$model());
    }
}
