<?php

namespace App\Application\Internit\AlunoBundle\Entity;

use App\Application\Internit\AlunoBundle\Repository\AlunoRepository;
use App\Application\Internit\DocumentoAcademicoBundle\Entity\DocumentoAcademico;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'aluno')]
#[ORM\Entity(repositoryClass: AlunoRepository::class)]
#[UniqueEntity('id')]
#[UniqueEntity('email')]
class Aluno
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
    #[ORM\Column(name: 'email', type: 'string', unique: true, nullable: false)]
    private string $email;

    #[ORM\ManyToMany(targetEntity: DocumentoAcademico::class, mappedBy: 'aluno')]
    private Collection $documentoAcademicos;


    public function __construct()
    {
        $this->documentoAcademicos = new ArrayCollection();
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

    public function getDocumentoAcademicos(): Collection
    {
        return $this->documentoAcademicos;
    }

    public function setDocumentoAcademicos(Collection $documentoAcademicos): void
    {
        $this->documentoAcademicos = $documentoAcademicos;
    }



}