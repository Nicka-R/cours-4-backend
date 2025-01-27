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
     * @return TinyPuppy[] Returns an array of TinyPuppy objects
     */
    public function findByName(string $name): array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.name = :name')
            ->setParameter('name', $name)
            ->orderBy('t.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


    /**
     * @return TinyPuppy[] Returns an array of TinyPuppy objects
     */
    public function findByAge(int $age): array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.age = :age')
            ->setParameter('age', $age)
            ->orderBy('t.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return TinyPuppy[] Returns an array of TinyPuppy objects
     */
    public function findByNameAndAge(string $name, int $age): array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.name = :name')
            ->andWhere('t.age = :age')
            ->setParameter('name', $name)
            ->setParameter('age', $age)
            ->orderBy('t.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    //    /**
    //     * @return Personne[] Returns an array of Personne objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Personne
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
