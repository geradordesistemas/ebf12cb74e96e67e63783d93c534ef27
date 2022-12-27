<?php

namespace App\Application\Internit\TipoTituloBundle\Repository;

use App\Application\Internit\TipoTituloBundle\Entity\TipoTitulo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TipoTitulo>
 *
 * @method TipoTitulo|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoTitulo|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoTitulo[]    findAll()
 * @method TipoTitulo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoTituloRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoTitulo::class);
    }


}