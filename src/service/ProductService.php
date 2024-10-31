<?php
namespace app\service\ProductService;
use src\repository\ProductRepository;
use src\entity\Product;
use Doctrine\ORM\EntityManagerInterface;
class ProductService
{

    public function create(EntityManagerInterface $entityManager)
    {
        $product = new Product();

        $entityManager->persist($product);
        $entityManager->flush();

        return new Response('Saved new product with id ' . $product->getId());

    }
}
