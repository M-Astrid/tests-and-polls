<?php

namespace App\Repository;

use App\Entity\UserAnswerSet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserAnswerSet|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserAnswerSet|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserAnswerSet[]    findAll()
 * @method UserAnswerSet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompletedTestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserAnswerSet::class);
    }

    // /**
    //  * @return CompletedTest[] Returns an array of CompletedTest objects
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
    public function findOneBySomeField($value): ?CompletedTest
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
