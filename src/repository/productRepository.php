<?php
require_once "bootstrap.php";
class productRepository{
    public function creatProduct(){
        $newProductName = $argv[1];

        $product = new Product();
        $product->setName($newProductName);

        $entityManager->persist($product);
        $entityManager->flush();

        echo "Создай продукт с ID " . $product->getId() . "\n";

    }
    public function readProduct(){
        $productRepository = $entityManager->getRepository('Product');
        $products = $productRepository->findAll();

        foreach ($products as $product) {
            echo sprintf("-%s\n", $product->getName());
        }
    }
    public function updateProduct()
    {
        $id = $argv[1];
        $newName = $argv[2];

        $product = $entityManager->find('Product', $id);

        if ($product === null) {
            echo "Product $id does not exist.\n";
            exit(1);
        }

        $product->setName($newName);

        $entityManager->flush();
    }
    public function deleteProduct(){
        $this->_em->remove($product);
        $this->_em->flush();

    }
    public function showProduct(){
        $id = $argv[1];
        $product = $entityManager->find('Product', $id);

        if ($product === null) {
            echo "Продукт не найден.\n";
            exit(1);
        }

        echo sprintf("-%s\n", $product->getName());

    }

}