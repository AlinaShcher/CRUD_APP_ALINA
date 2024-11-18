<?php
namespace Src\Controller\SpecialistController;

use Src\Service\SpecialistService;

class SpecialistController
{
    private SpecialistService $specialistService;

    public function __construct(SpecialistService $specialistService)
    {
        $this->specialistService = $specialistService;
    }

    public function deleteSpecialist()
    {
        if (!isset($_REQUEST['id'])) {
            throw new Exception("Неверные параметры запроса", 400);
        }
        $this->specialistService->deleteSpecialist($_REQUEST['id']);
    }
}
