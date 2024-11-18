<?php
namespace Src\Service\ProductService;

use Src\Entity\Product;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\EntityManager;

class ProductService
{
   private EntityManager $entityManager;
    
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    public function createProduct(int $id, int $client, int $specialist): Product
    {
        try {
            if ($id != null) {
                $product = $this->entityManager->find(Product::class, $id);
            } else {
                $product = new Product();
            }
            $client = $this->entityManager->find(Product::class,$client);
            $specialist = $this->entityManager->find(Product::class,$specialist);
            $product-> setClient($client)
                -> setSpecialist($specialist);
            $this->entityManager->persist($product);
            $this->entityManager->flush();
        } catch(ORMException $e) {
            throw new ("Ошибка: " . $e->getMessage());
        }
    }
    
    public function deleteProduct(int $id): void
    {
        try {
            $product = $this->entityManager->find(Product::class, $id);
            $this->entityManager->remove($product);
            $this->entityManager->flush();
        } catch(ORMException $e) {
            throw new ("Ошибка: " . $e->getMessage());
        }
    }
    
    public function showProduct(int $id): Product
    {
        try {
            return $this->entityManager->find(Product::class, $id);
        } catch (ORMException $e) {
            throw new ("Ошибка: " . $e->getMessage());
        }
    }
}
