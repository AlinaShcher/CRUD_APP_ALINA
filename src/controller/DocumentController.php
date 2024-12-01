<?php
namespace Src\Controller\DocumentController;

use Doctrine\ORM\Exception\ORMException;
use Src\Service\DocumentService;

class DocumentController
{
    private DocumentService $documentService;

    public function __construct()
    {
        $this->documentService = new DocumentService();
    }
    
    public function htmlGet()
    {
        try {
            $this->documentService->htmlGet();
        } catch(ORMException $e) {
            throw new ("Ошибка: " . $e->getMessage());
        }
    }
}
