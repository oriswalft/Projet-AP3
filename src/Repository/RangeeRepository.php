<?php

namespace App\Repository;

use App\Entity\Rangee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Rangee>
 *
 * @method Rangee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rangee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rangee[]    findAll()
 * @method Rangee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RangeeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rangee::class);
    }

//    /**
//     * @return Rangee[] Returns an array of Rangee objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Rangee
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
