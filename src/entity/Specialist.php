<?php
namespace src\entity\Specialist;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\Types;
#[ORM\Entity]
#[ORM\Table(name: 'specialist')]
class Specialist
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: Types::INTEGER)]
    #[ORM\GeneratedValue(strategy:"SEQUENCE")]
    #[ORM\SequenceGenerator]
    private int $id;

    #[ORM\Column(name: 'fullName', type: TYPES::STRING )]//
    private string $fullName;


    #[ORM\Column(name: 'department', type: TYPES::STRING )]
    private string $department;

    #[ORM\Column(name: 'wages', type: TYPES::STRING )]
    private string $wages;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullname(): string
    {
        return $this->fullName;
    }

    public function setFullname(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    public function getDepartment(): string
    {
        return $this->department;
    }

    public function setDepartment($otdel)
    {
        $this->department = $department;
    }
    public function getWages(): string
    {
        return $this->wages;
    }
    public function setWages($wages): void
    {
        $this->wages = $wages;
    }


    private Collection $reportedClient;
    private Collection $assignedClient;

    public function __construct()
    {
        $this->reportedBugs = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();
    }

    public function addReportedClient(Client $client): void
    {
        $this->reportedClient[] = $client;
    }

    public function assignedToClient(Bug $Client): void
    {
        $this->assignedClient[] = $Client;
    }
}
