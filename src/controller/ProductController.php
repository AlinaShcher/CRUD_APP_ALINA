<?php
namespace src\controller\ProductController;
use src\entity\Product;
use src\service\ProductService;
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
        if (isset($_REQUEST['id']) )
        {
            $this->productservice->createProduct(($_REQUEST['id']));
        } else {
            echo 'Неферные параметры запроса: 400';
        }
    }

    public function deleteProduct()
    {
        if (isset($_REQUEST['id'])){
            $this->productservice->deleteProduct($_REQUEST['id']);
        } else {
            echo 'Неверные параметры запроса: 400';
        }

    }


}
