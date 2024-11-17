<?php
namespace Src\Service\SpecialistService;
use Src\Repository\SpecialistRepository;
use Src\Entity\Specialist;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\EntityManager;

class SpecialistService
{
    private EntityManager $entityManager;
    
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    public function deleteSpecialist (int $id)
    {
        try {
            $specialist = $this->entityManager->find(Specialist::class, $id);
            $this->entityManager->remove($specialist);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            throw new ("Ошибка: " . $e->getMessage());
        }
    }
}
