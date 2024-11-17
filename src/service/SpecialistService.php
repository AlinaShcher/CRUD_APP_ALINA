<?php
namespace Src\Service\SpecialistService;
use Src\Repository\SpecialistRepository;
use Src\Entity\Specialist;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;

class SpecialistService
{
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = getEntityManager();
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
