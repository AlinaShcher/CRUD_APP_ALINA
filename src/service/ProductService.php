<?php
namespace Src\Service\ProductService;
use Src\Repository\ProductRepository;
use Src\Entity\Product;
use Src\Entity\Client;
use Src\Entity\Specialist;
use Doctrine\ORM\Exception\ORMException;
use Exception;

class ProductService
{
    public function __construct()
    {
        $this->entityManager = getEntityManager();
    }
    public function createProduct(int $id, int $idClient, int $idSpecialist)
    {
        try {
            if ($id != null) {
                $product = $this->entityManager->find(Product::class, $id);
            } else {
                $product = new Product();
            }
            $client = $this->entityManager->find(Product::class,$idClient);
            $specialist = $this->entityManager->find(Product::class,$idSpecialist);
            $product-> setClient($client)
                    -> setSpecialist($specialist);
            $this->entityManager->persist($product);
            $this->entityManager->flush();
        } catch(ORMException $e) {
            throw new ("Ошибка: " . $e->getMessage());
        }
    }
    public function deleteProduct( int $id)
    {
        try {
            $product = $this->entityManager->find(Product::class, $id);
            $this->entityManager->remove($product);
            $this->entityManager->flush();
        } catch(ORMException $e) {
            throw new ("Ошибка: " . $e->getMessage());
        }
    }
    public function showProduct(int $id)
    {
        try {
          return $this->entityManager->find(Product::class, $id);
        } catch (ORMException $e) {
            throw new ("Ошибка: " . $e->getMessage());
        }
    }
}
