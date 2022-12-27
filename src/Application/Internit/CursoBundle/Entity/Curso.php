<?php

namespace App\Application\Internit\CursoBundle\Entity;

use App\Application\Internit\CursoBundle\Repository\CursoRepository;
use App\Application\Internit\TipoCursoBundle\Entity\TipoCurso;
use App\Application\Internit\RegimeBundle\Entity\Regime;
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
#[ORM\Table(name: 'curso')]
#[ORM\Entity(repositoryClass: CursoRepository::class)]
#[UniqueEntity('id')]
class Curso
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'nome', type: 'string', unique: false, nullable: false)]
    private string $nome;

    #[ORM\Column(name: 'descricao', type: 'text', unique: false, nullable: true)]
    private ?string $descricao = null;

    #[ORM\ManyToOne(targetEntity: TipoCurso::class)]
    #[ORM\JoinColumn(name: 'tipoCurso_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private TipoCurso|null $tipoCurso = null;

    #[ORM\ManyToOne(targetEntity: Regime::class)]
    #[ORM\JoinColumn(name: 'regime_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private Regime|null $regime = null;

    #[ORM\OneToMany(mappedBy: 'curso', targetEntity: DocumentoAcademico::class)]
    private Collection $documentoAcademico;


    public function __construct()
    {
        $this->documentoAcademico = new ArrayCollection();
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

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getTipoCurso(): ?TipoCurso
    {
        return $this->tipoCurso;
    }

    public function setTipoCurso(?TipoCurso $tipoCurso): void
    {
        $this->tipoCurso = $tipoCurso;
    }


    public function getRegime(): ?Regime
    {
        return $this->regime;
    }

    public function setRegime(?Regime $regime): void
    {
        $this->regime = $regime;
    }


    public function getDocumentoAcademico(): Collection
    {
        return $this->documentoAcademico;
    }

    public function setDocumentoAcademico(Collection $documentoAcademico): void
    {
        $this->documentoAcademico = $documentoAcademico;
    }



}