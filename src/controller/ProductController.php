<?php
namespace Src\Controller\ProductController;

use Src\Service\ProductService;
use Exception;

class ProductController
{
    private ProductService $productService;
    
    public function __construct($entityManager)
    {
        $this->productService = new ProductService($entityManager);
    }
    
    public function createProduct()
    {
        if (!isset($_REQUEST['id']) ) {
           throw new Exception("Неверные параметры запроса", 400);
        }
        $this->productService->createProduct(($_REQUEST['id']));
    }
    
    public function deleteProduct()
    {
        if (!isset($_REQUEST['id'])) {
            throw new Exception("Неверные параметры запроса", 400);
        }
        $this->productService->deleteProduct($_REQUEST['id']);
    }
}
