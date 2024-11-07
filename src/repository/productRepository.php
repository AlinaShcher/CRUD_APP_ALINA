<?php
namespace src\repository\ProductRepository;
use src\entity\Product;
require_once "bootstrap.php";
class productRepository{

    public function bestSpecialist()
    {
        $products=new Product();
        $specialistCounts = [];
        foreach ($products as $product)
        {
            $idSpecialist = $product->idSpecialist;
            if (!isset($specialistCounts[$idSpecialist]))
            {
                $specialistCounts[$idSpecialist] = 0;
            }
            $specialistCounts[$idSpecialist]++;
        }
$mostId = array_search(max($specialistCounts), $specialistCounts);
echo "Специалист с ID $mostId упоминался чаще всего.\n";
    }
}
