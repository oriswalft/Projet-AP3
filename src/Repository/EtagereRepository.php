<?php

namespace App\Repository;

use App\Entity\Etagere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Etagere>
 *
 * @method Etagere|null find($id, $lockMode = null, $lockVersion = null)
 * @method Etagere|null findOneBy(array $criteria, array $orderBy = null)
 * @method Etagere[]    findAll()
 * @method Etagere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtagereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Etagere::class);
    }

//    /**
//     * @return Etagere[] Returns an array of Etagere objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Etagere
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
