<?php

namespace App\Repository;

use App\Entity\MyArray;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MyArray|null find($id, $lockMode = null, $lockVersion = null)
 * @method MyArray|null findOneBy(array $criteria, array $orderBy = null)
 * @method MyArray[]    findAll()
 * @method MyArray[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MyArrayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MyArray::class);
    }

    // /**
    //  * @return MyArray[] Returns an array of MyArray objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MyArray
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
