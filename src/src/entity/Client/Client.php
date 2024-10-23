<?php
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[ORM\Table(name: 'client')]
class Client
{
    #[ORM\Id] # первичный ключ сущности
    #[ORM\Column(type: 'integer', name:'id')]
    #[ORM\GeneratedValue] # автоматически генерирует значения для первичного ключа
    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'idClient')]
    private ?int $id=null;

    #[ORM\Column(type: 'string', name:'fullName')]
    private string $fullName;

    #[ORM\Column(type: 'string', name: 'sex')]
    private string $sex;

    #[ORM\Column(type: 'string', name: 'phoneName')]
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