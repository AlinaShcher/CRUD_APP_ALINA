<?php
namespace src\service\SpecialistService;
use src\repository\SpecialistRepository;
use src\entity\Specialist;
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
            echo "Ошибка: " . $e->getMessage();
        }
    }
}
