<?php
namespace src\controller\ProductController;
use src\entity\Product;
use src\service\ProductService;
use Exception;
//use Doctrine\ORM\EntityManagerInterface;

class ProductController
{
    private ProductService $productservice;
    public function __construct()
    {
        $this->productservice= new ProductService();
    }
    public function createProduct()
    {
        if (!isset($_REQUEST['id']) )
        {
           throw new Exception("Неверные параметры запроса", 400);
        } else {
            $this->productservice->createProduct(($_REQUEST['id']));
        }
    }
    public function deleteProduct()
    {
        if (!isset($_REQUEST['id']))
        {
            throw new Exception("Неверные параметры запроса", 400);
        }
        $this->productservice->deleteProduct($_REQUEST['id']);
        

    }


}
