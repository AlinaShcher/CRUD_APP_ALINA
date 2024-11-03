<?php
namespace src\entity\Product;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use src\entity\Client\Client;
use src\entity\Specialist\Specialist;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Entity]
#[ORM\Table(name: 'product')]
class Product
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: TYPES::INTEGER)]
    #[ORM\GeneratedValue(strategy:"SEQUENCE")]
    #[ORM\SequenceGenerator]
    private int $id;
    #[ManyToOne(targetEntity: Client::class, fetch: 'EAGER')]
    #[JoinColumn(name: 'idClient', referencedColumnName: 'id')]
    private int $idClient;
    #[ManyToOne(targetEntity: Specialist::class, fetch: 'EAGER')]
    #[JoinColumn(name: 'idSpecialist', referencedColumnName: 'id')]
    private int $idSpecialist;

    #[ORM\Column(name: 'model', type: Types:: STRING)]//name: ''
    private string $model;

    #[ORM\Column(name: 'status', type: Types:: STRING)]//name: ''
    private string $status;

    #[ORM\Column(name: 'cost', type: Types::STRING)]//name: ''
    private string $cost;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getIdclient(): ?int
    {
        return $this->idClient;
    }
    public function getIdspecialist(): ?int
    {
        return $this->idSpecialist;
    }
    public function getModel(): string {
        return $this->model;
    }
    public function getStatus(): string
    {
        return $this->status;
    }
    public function getCost(): string
    {
        return $this->cost;
    }
    public function setId(int $id): product
    {
        $this->id = $id;
        return $this;
    }
    public function setIdclient(int $idClient): void
    {
        $this->idClient = $idClient;
    }
    public function setIdspecialist(int $idSpecialist): void
    {
        $this->idSpecialist = $idSpecialist;
    }
    public function setModel(string $model): void
    {
        $this->model = $model;
    }
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
    public function setCost(string $cost): void {
        $this->cost = $cost;
    }
}
