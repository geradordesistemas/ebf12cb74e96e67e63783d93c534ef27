<?php

namespace App\Application\Internit\TituloBundle\Repository;

use App\Application\Internit\TituloBundle\Entity\Titulo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Titulo>
 *
 * @method Titulo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Titulo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Titulo[]    findAll()
 * @method Titulo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TituloRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Titulo::class);
    }


}