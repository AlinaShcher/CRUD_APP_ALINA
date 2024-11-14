<?php
namespace src\controller\ProductController;
use src\entity\Product;
use src\service\ProductService;
use Exception;
//use Doctrine\ORM\EntityManagerInterface;

class ProductController
{
    private ProductService $productService;
    public function __construct()
    {
        $this->productService = new ProductService();
    }
    public function createProduct()
    {
        if (!isset($_REQUEST['id']) )
        {
           throw new Exception("Неверные параметры запроса", 400);
        } else {
            $this->productService->createProduct(($_REQUEST['id']));
        }
    }
    public function deleteProduct()
    {
        if (!isset($_REQUEST['id'])){
            throw new Exception("Неверные параметры запроса", 400);
        }
        $this->productService->deleteProduct($_REQUEST['id']);
    }


}
