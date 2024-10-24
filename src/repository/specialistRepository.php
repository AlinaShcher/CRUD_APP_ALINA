<?php
use Doctrine\ORM\EntityRepository;

class specialistRepository extends EntityRepository{

    public function save(Specialist $specialist){
        $em = $this->getEntityManager();
        $em->persist($specialist);
        $em->flush();
    }
    public function delete(Specialist $specialist){
        $em = $this->getEntityManager();
        $em->remove($specialist);
        $em->flush();
    }
    public function update(Specialist $specialist){
        $em = $this->getEntityManager();
        $em->persist($specialist);
        $em->flush();
    }
    #ещё нашла вот такой вариант реализации find по id
    public function findById(int $id): ?Specialist{
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('s')
            ->from('specialist', 's')
            ->where('s.id = :id')
            ->setParameter('id', $id);
        return $qb->getQuery()->getOneOrNullResult();

    }
    public function findAll(): array
    {
        return $this->findBy([], ['name' => 'ASC']);
    }
}
