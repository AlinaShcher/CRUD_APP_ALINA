<?php
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'product')]
class Product
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private ?int $id = null;
    #[ORM\Column(type: 'integer', name: '')]
    private int $idClient;
    #[ORM\Column(type: 'integer', name: '')]
    private int $idSpecialist;
    #[ORM\Column(type: 'string', name: '')]
    private string $model;
    #[ORM\Column(type: 'string', name: '')]
    private string $status;
    #[ORM\Column(type: 'string', name: '')]
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