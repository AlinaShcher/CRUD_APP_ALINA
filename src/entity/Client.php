<?php
namespace Src\Entity\Client;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity]
#[ORM\Table(name: 'client')]
class Client
{
    #[ORM\Id]
    #[ORM\Column(name:'id', type: TYPES::INTEGER )]//
    #[ORM\GeneratedValue(strategy:"SEQUENCE")]
    #[ORM\SequenceGenerator]
    private int $id;

    #[ORM\Column(name:'fullName', type: TYPES::STRING )]
    private string $fullName;

    #[ORM\Column(name: 'sex', type: TYPES::STRING)]//
    private string $sex;
    #[ORM\Column( name: 'phoneName', type: TYPES::STRING)]//
    private string $phoneNumber;

    private Collection $products;
    public function __construct(){
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
