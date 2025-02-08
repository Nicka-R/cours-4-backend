<?php

namespace App\Repository;

use App\Entity\Personne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Personne>
 */
class PersonneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Personne::class);
    }

    /**
     * @return Personne[] Returns an array of Personne objects
     */
    public function findByName(string $name): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.name = :name')
            ->setParameter('name', $name)
            ->orderBy('p.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


    /**
     * @return Personne[] Returns an array of Personne objects
     */
    public function findByAge(int $age): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.age = :age')
            ->setParameter('age', $age)
            ->orderBy('p.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Personne[] Returns an array of Personne objects
     */
    public function findByNameAndAge(string $name, int $age): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.name = :name')
            ->andWhere('p.age = :age')
            ->setParameter('name', $name)
            ->setParameter('age', $age)
            ->orderBy('p.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
}
