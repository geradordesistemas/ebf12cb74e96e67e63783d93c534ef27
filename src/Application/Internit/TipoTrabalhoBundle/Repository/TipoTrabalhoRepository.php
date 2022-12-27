<?php

namespace App\Application\Internit\TipoTrabalhoBundle\Repository;

use App\Application\Internit\TipoTrabalhoBundle\Entity\TipoTrabalho;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TipoTrabalho>
 *
 * @method TipoTrabalho|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoTrabalho|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoTrabalho[]    findAll()
 * @method TipoTrabalho[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoTrabalhoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoTrabalho::class);
    }


}