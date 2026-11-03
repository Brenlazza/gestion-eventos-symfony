<?php

namespace App\Repository;

use App\Entity\Disertante;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Disertante>
 */
class DisertanteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Disertante::class);
    }

    public function findDisertantesAlfabeticamente(): array
{
    return $this->createQueryBuilder('d')
        ->orderBy('d.nombre', 'ASC')
        ->getQuery()
        ->getResult();
}
   
}
