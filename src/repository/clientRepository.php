<?php
namespace src\repository\clientRepository;
use Doctrine\ORM\EntityRepository;
use src\entity\Client;

use Doctrine\ORM\Mapping as ORM;
class clientRepository extends EntityRepository
{
    public function save(Client $client)
    {
        $em = $this->getEntityManager();
        $em->persist($client);
        $em->flush();
    }
    public function delete(Client $client)
    {
        $em = $this->getEntityManager();
        $em->remove($client);
        $em->flush();
    }
    public function findById (int $id): ?Client
    {
        return $this->findOneBy(['id' => $id]);
        #возвращает один объект, если найдено несколько, возвращает первый найденный
    }
    public function findall (): array
    {
        return $this-> findBy([],['fullName' => 'DESC']);
        # возвращает массив объектов, может вернуть несколько, если удовлетворяют словию, можно отсортировать вторым параметром
    }
    public function getAll(): Collection
    {
        return $this->_em->createQuery('SELECT * FROM src\entity\Client ')
            ->getResult();
    }
    public function update (Client $client){
        $em = $this->getEntityManager();
        $em->persist($client);
        $em->flush();
    }

}
