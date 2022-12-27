<?php

namespace App\Application\Internit\CorpoAcademicoBundle\Entity;

use App\Application\Internit\CorpoAcademicoBundle\Repository\CorpoAcademicoRepository;
use App\Application\Internit\TituloBundle\Entity\Titulo;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'corpo_academico')]
#[ORM\Entity(repositoryClass: CorpoAcademicoRepository::class)]
#[UniqueEntity('id')]
class CorpoAcademico
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'nome', type: 'string', unique: false, nullable: false)]
    private string $nome;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'sobrenome', type: 'string', unique: false, nullable: false)]
    private string $sobrenome;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'email', type: 'string', unique: false, nullable: false)]
    private string $email;

    #[ORM\JoinTable(name: 'titulo_corpo_academico')]
    #[ORM\JoinColumn(name: 'academico_id', referencedColumnName: 'id')] // , onDelete: 'SET NULL'
    #[ORM\InverseJoinColumn(name: 'titulo_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Titulo::class, inversedBy: 'academicos')]
    private Collection $titulo;


    public function __construct()
    {
        $this->titulo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }

    public function setSobrenome(string $sobrenome): void
    {
        $this->sobrenome = $sobrenome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getTitulo(): Collection
    {
        return $this->titulo;
    }

    public function setTitulo(Collection $titulo): void
    {
        $this->titulo = $titulo;
    }



}