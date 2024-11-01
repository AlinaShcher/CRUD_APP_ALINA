<?php
namespace machine\src\controller\ProductController;

use src\entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use machine\src\service\ProductService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class ProductController extends AbstractController
{
    private ProductService $productservice;
    public function __construct()
    {
        $this->productservice= new ProductService();
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
