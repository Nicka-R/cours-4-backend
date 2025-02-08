<?php

namespace App\Repository;

use App\Entity\Batiment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Batiment>
 */
class BatimentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Batiment::class);
    }

    /**
    * @return Batiment Returns a Batiment object
    */
    public function findOneByName($value): ?Batiment
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.nom = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * @return Batiment Returns a Batiment object
    */
    public function findOneByAdresse($value): ?Batiment
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.adresse = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
