<?php

namespace App\Repository;

use App\Entity\Remerciements;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Remerciements>
 *
 * @method Remerciements|null find($id, $lockMode = null, $lockVersion = null)
 * @method Remerciements|null findOneBy(array $criteria, array $orderBy = null)
 * @method Remerciements[]    findAll()
 * @method Remerciements[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RemerciementsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Remerciements::class);
    }

    //    /**
    //     * @return Remerciements[] Returns an array of Remerciements objects
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

    //    public function findOneBySomeField($value): ?Remerciements
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
