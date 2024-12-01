<?php
namespace Src\Service\DocumentService;

use Doctrine\ORM\EntityManager;
use Src\Entity\Product;
use Src\Entity\Client;
use Src\Entity\Specialist;

require_once 'vendor/autoload.php';

class DocumentService
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getHtml(): void
    {
        $loader = new \Twig\Loader\FilesystemLoader('templates');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('index.html');
        $client=$this->entityManager->getRepository(Client::class)->findBy([],['fullName' => 'ASC']);
        $specialist=$this->entityManager->getRepository(Specialist::class)->findBy([],['fullName' => 'ASC']);
        $products=$this->entityManager->getRepository(Product::class)->findAll();
        return $template->render(['products' => $products]);
    }
}
