<?php
namespace src\entity\Product;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use src\entity\Client\Client;
use src\entity\Specialist\Specialist;

#[ORM\Entity]
#[ORM\Table(name: 'product')]
class Product
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy:"SEQUENCE")]
    #[ORM\SequenceGenerator]
    private ?int $id = null;
    #[ManyToMany(targetEntity: Client::class, inversedBy: 'id')]
    #[JoinTable(name: 'idClient')]

    #[ORM\Column(Types::INTEGER)]
    #[ORM\Column(name: 'idClient' )]//

    private int $idClient;
    #[ManyToMany(targetEntity: Specialist::class, inversedBy: 'id')]
    #[JoinTable(name: 'idSpecialist')]
    #[ORM\Column(Types::INTEGER)]//name: ''
    #[ORM\Column(name: 'idSpecialist' )]//
    private int $idSpecialist;
    #[ORM\Column(Types:: STRING)]//name: ''
    #[ORM\Column(name: 'model' )]//
    private string $model;
    #[ORM\Column(Types:: STRING)]//name: ''
    #[ORM\Column(name: 'status' )]//
    private string $status;
    #[ORM\Column(Types::STRING)]//name: ''
    #[ORM\Column(name: 'cost' )]//
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
