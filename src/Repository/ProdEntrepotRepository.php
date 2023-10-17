<?php

namespace App\Repository;

use App\Entity\ProdEntrepot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProdEntrepot>
 *
 * @method ProdEntrepot|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProdEntrepot|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProdEntrepot[]    findAll()
 * @method ProdEntrepot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProdEntrepotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProdEntrepot::class);
    }

//    /**
//     * @return ProdEntrepot[] Returns an array of ProdEntrepot objects
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

//    public function findOneBySomeField($value): ?ProdEntrepot
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
