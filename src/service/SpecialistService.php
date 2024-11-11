<?php
namespace src\service\SpecialistService;
use src\repository\SpecialistRepository;
use src\entity\Specialist;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
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
        } catch (Exception $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
}
