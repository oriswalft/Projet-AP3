<?php

namespace App\Repository;

use App\Entity\ProdCom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProdCom>
 *
 * @method ProdCom|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProdCom|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProdCom[]    findAll()
 * @method ProdCom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProdComRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProdCom::class);
    }

//    /**
//     * @return ProdCom[] Returns an array of ProdCom objects
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

//    public function findOneBySomeField($value): ?ProdCom
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
