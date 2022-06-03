<?php

namespace App\Repository;

use App\Entity\Cakes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cakes>
 *
 * @method Cakes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cakes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cakes[]    findAll()
 * @method Cakes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CakesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cakes::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Cakes $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Cakes $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * Recherche
     *
     * 
     * @return void
     */
    public function findBySearching($keyword){
        $query = $this->createQueryBuilder('c')
            ->where('c.name LIKE :key')
            ->orWhere('c.recipe LIKE :key')
            ->setParameter('key' , '%'.$keyword.'%')
            ->getQuery()
            ->getResult();
 
        return $query;
    }

    // /**
    //  * @return Cakes[] Returns an array of Cakes objects
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
    public function findOneBySomeField($value): ?Cakes
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