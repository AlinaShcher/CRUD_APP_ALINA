<?php
namespace src\repository\ProductRepository;
use src\entity\Product;
use Doctrine\ORM\EntityManagerInterface;
class productRepository
{
    private$entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function getBestSpecialist()
    {
        $qb = $this->entityManager->createQueryBuilder();
        $qb ->select('p.Specialist', 'COUNT(*) as count')
            ->from('Product','p')
            -> groupBy('p.Specialist')
            -> orderBy ('count','DESC')
            ->setMaxResults(1);
        $qb->getQuery()->getResult();
    }
}
