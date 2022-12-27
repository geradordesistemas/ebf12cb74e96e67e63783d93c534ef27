<?php

namespace App\Application\Internit\CorpoAcademicoBundle\Repository;

use App\Application\Internit\CorpoAcademicoBundle\Entity\CorpoAcademico;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CorpoAcademico>
 *
 * @method CorpoAcademico|null find($id, $lockMode = null, $lockVersion = null)
 * @method CorpoAcademico|null findOneBy(array $criteria, array $orderBy = null)
 * @method CorpoAcademico[]    findAll()
 * @method CorpoAcademico[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CorpoAcademicoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CorpoAcademico::class);
    }


}