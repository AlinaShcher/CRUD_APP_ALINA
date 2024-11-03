<?php
namespace src\controller\SpecialistController; ;
use src\entity\Specialist;
use src\service\SpecialistService;
class SpecialistController
{
    private SpecialistService $specialistservice;

    public function __construct(SpecialistService $specialistservice)
    {
        $this->SpecialistService = $specialistservice;
    }
    
    public function deleteSpecialist()
    {
        if (isset($_REQUEST['id']))
        {
            $this->specialistservice->deleteSpecialist($_REQUEST['id']);
        } else {
            echo 'Ошибка';
        }
    }
}
