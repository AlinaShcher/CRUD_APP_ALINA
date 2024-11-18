<?php
namespace Src\Repository\ProductRepository;

use Doctrine\ORM\EntityRepository;
use Src\Entity\Product;

class ProductRepository extends EntityRepository {

    public function getBestSpecialist()
    {
        $qb = $this->createQueryBuilder('p');
        return $qb ->select('p.idSpecialist', 'COUNT(*) as count')
                    ->from('Product','p')
                    -> groupBy('p.idSpecialist')
                    -> orderBy ('count','DESC')
                    ->setMaxResults(1)
                    ->getQuery()
                    ->getResult();
    }
}
