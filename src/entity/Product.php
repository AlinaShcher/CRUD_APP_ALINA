<?php
namespace Src\Entity\Product;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Src\Entity\Client\Client;
use Src\Entity\Specialist\Specialist;
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
    #[JoinColumn(name: 'Client', referencedColumnName: 'id')]
    private Client $Client;
    #[ManyToOne(targetEntity: Specialist::class, fetch: 'EAGER')]
    #[JoinColumn(name: 'Specialist', referencedColumnName: 'id')]
    private Specialist $Specialist;

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
    public function getClient(): ?int
    {
        return $this->Client;
    }
    public function getSpecialist(): ?int
    {
        return $this->Specialist;
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
    public function setClient(int $Client): void
    {
        $this->idClient = $Client;
    }
    public function setSpecialist(int $Specialist): void
    {
        $this->idSpecialist = $Specialist;
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
