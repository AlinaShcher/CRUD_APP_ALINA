<?php
namespace Src\Entity\Product;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Src\Entity\Client;
use Src\Entity\Specialist;
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
    #[JoinColumn(name: 'client', referencedColumnName: 'id')]
    private Client $client;
    
    #[ManyToOne(targetEntity: Specialist::class, fetch: 'EAGER')]
    #[JoinColumn(name: 'specialist', referencedColumnName: 'id')]
    private Specialist $specialist;

    #[ORM\Column(name: 'model', type: Types:: STRING)]
    private string $model;

    #[ORM\Column(name: 'status', type: Types:: STRING)]
    private string $status;

    #[ORM\Column(name: 'cost', type: Types::STRING)]
    private string $cost;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getClient(): ?int
    {
        return $this->client;
    }
    
    public function getSpecialist(): ?int
    {
        return $this->specialist;
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
    
    public function setClient(int $client): void
    {
        $this->client = $client;
    }
    
    public function setSpecialist(int $specialist): void
    {
        $this->specialist = $specialist;
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
