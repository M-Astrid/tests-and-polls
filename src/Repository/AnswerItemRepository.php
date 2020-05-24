<?php

namespace App\Repository;

use App\Entity\AnswerItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnswerItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnswerItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnswerItem[]    findAll()
 * @method AnswerItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnswerItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnswerItem::class);
    }

    // /**
    //  * @return AnswerItem[] Returns an array of AnswerItem objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AnswerItem
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
