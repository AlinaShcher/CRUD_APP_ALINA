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
            if ($id != 0)
            {
                $product = $this->entityManager->getRepository(Product::class)->find($id);
            } else {
                $product = new Product();
            }

            $idc = $this->entityManager->gerRepository(Client::class)->find($idClient);
            $ids = $this->entityManager->gerRepository(Specialist::class)->find($idSpecialist);
            $product-> setIdclient($idc);
            $product-> setIdspecialist($ids);
            $this->entityManager->persist($product);
            $this->entityManager->flush();
        } catch(Exception $e) {

        }
    }
    public function deleteProduct( int $id)
    {
        try {
            $product = $this->entityManager->getRepository(Product::class)->find($id);
            $this->entityManager->remove($product);
            $this->entityManager->flush();
        } catch(Exception $e) {

        }
    }

    public function showProduct(int $id)
    {
        try {
            $product = $this->entityManager->getRepository(Product::class)->find($id);
            return $product;
        } catch (Exception $e) {

        }
    }
}
