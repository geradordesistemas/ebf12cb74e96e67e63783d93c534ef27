<?php

namespace App\Application\Internit\TipoCursoBundle\Repository;

use App\Application\Internit\TipoCursoBundle\Entity\TipoCurso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TipoCurso>
 *
 * @method TipoCurso|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoCurso|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoCurso[]    findAll()
 * @method TipoCurso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoCursoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoCurso::class);
    }


}