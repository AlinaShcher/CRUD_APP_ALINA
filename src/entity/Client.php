<?php
namespace src\entity\Client;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use src\entity\Product\Product;
use Doctrine\DBAL\Types\Types;
#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[ORM\Table(name: 'client')]
class Client
{
    #[ManyToMany(targetEntity: Product::class, mappedBy: 'idClient')]
    #[ORM\Id] # первичный ключ сущности
    #[ORM\Column(name:'id', type: TYPES::INTEGER )]//
    #[ORM\GeneratedValue(strategy:"SEQUENCE")] # автоматически генерирует значения для первичного ключа
    #[ORM\SequenceGenerator]

    private ?int $id=null;

    #[ORM\Column(name:'fullName', type: TYPES::STRING )]

    private string $fullName;

    #[ORM\Column(name: 'sex', type: TYPES::STRING)]//
    private string $sex;

    #[ORM\Column( name: 'phoneName', type: TYPES::STRING)]//
    private string $phoneNumber;
# но я не понимаю как здесь тогла сделать construct? через продукты? Или оставить всё как было?
    private Collection $products;
    public function __construct(){ #нужен чтобы инициализировать свойства сущности
        $this->products = new ArrayCollection();
    }

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
    public function getSex(): string
    {
        return $this->sex;
    }
    public function setSex(string $sex)
    {
        $this->sex = $sex;
    }
    public function getPhonenumber():string
    {
        return $this->phoneNumber;
    }
    public function setPhonenumber($phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

}
