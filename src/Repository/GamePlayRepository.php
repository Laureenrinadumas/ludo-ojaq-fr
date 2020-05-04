<?php

namespace App\Repository;

use App\Entity\GamePlay;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method GamePlay|null find($id, $lockMode = null, $lockVersion = null)
 * @method GamePlay|null findOneBy(array $criteria, array $orderBy = null)
 * @method GamePlay[]    findAll()
 * @method GamePlay[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GamePlayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GamePlay::class);
    }

    // /**
    //  * @return GamePlay[] Returns an array of GamePlay objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GamePlay
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
