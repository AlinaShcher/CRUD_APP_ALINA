<?php
namespace src\service\ProductService;
use src\repository\ProductRepository;
use src\entity\Product;
use src\entity\Client;
use src\entity\Specialist;
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
            if ($id != null)
            {
                $product = $this->entityManager->find(Product::class, $id);
            } else {
                $product = new Product();
            }

            $idc = $this->entityManager->find(Product::class,$idClient);
            $ids = $this->entityManager->find(Product::class,$idSpecialist);
            $product-> setIdclient($idc)
                    -> setIdspecialist($ids);
            $this->entityManager->persist($product);
            $this->entityManager->flush();
        } catch(Exception $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
    public function deleteProduct( int $id)
    {
        try {
            $product = $this->entityManager->find(Product::class, $id);
            $this->entityManager->remove($product);
            $this->entityManager->flush();
        } catch(Exception $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }

    public function showProduct(int $id)
    {
        try {
            $product = $this->entityManager->find(Product::class, $id);
            return $product;
        } catch (Exception $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
}
