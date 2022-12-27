<?php

namespace App\Application\Internit\DocumentoAcademicoBundle\Entity;

use App\Application\Internit\DocumentoAcademicoBundle\Repository\DocumentoAcademicoRepository;
use App\Application\Internit\CursoBundle\Entity\Curso;
use App\Application\Internit\AlunoBundle\Entity\Aluno;
use App\Application\Internit\PalavraChaveBundle\Entity\PalavraChave;
use App\Application\Internit\TipoTrabalhoBundle\Entity\TipoTrabalho;
use App\Application\Internit\CorpoAcademicoBundle\Entity\CorpoAcademico;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'documento_academico')]
#[ORM\Entity(repositoryClass: DocumentoAcademicoRepository::class)]
#[UniqueEntity('id')]
class DocumentoAcademico
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'titulo', type: 'string', unique: false, nullable: false)]
    private string $titulo;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'subtitulo', type: 'string', unique: false, nullable: false)]
    private string $subtitulo;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'resumo', type: 'text', unique: false, nullable: false)]
    private string $resumo;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[Assert\Date]
    #[ORM\Column(name: 'dataDocumento', type: 'date', unique: false, nullable: false)]
    private DateTime $dataDocumento;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[Assert\Date]
    #[ORM\Column(name: 'dataPublicacao', type: 'date', unique: false, nullable: false)]
    private DateTime $dataPublicacao;

    #[ORM\Column(name: 'status', type: 'boolean', unique: false, nullable: true)]
    private ?bool $status = null;

    #[ORM\ManyToOne(targetEntity: Curso::class, inversedBy: 'documentoAcademico')]
    #[ORM\JoinColumn(name: 'curso_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private Curso|null $curso = null;

    #[ORM\JoinTable(name: 'aluno_documento_academico')]
    #[ORM\JoinColumn(name: 'documento_academico_id', referencedColumnName: 'id')] // , onDelete: 'SET NULL'
    #[ORM\InverseJoinColumn(name: 'aluno_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Aluno::class, inversedBy: 'documentoAcademicos')]
    private Collection $aluno;

    #[ORM\JoinTable(name: 'palavra_chave_documento_academico')]
    #[ORM\JoinColumn(name: 'documento_academico_id', referencedColumnName: 'id')] // , onDelete: 'SET NULL'
    #[ORM\InverseJoinColumn(name: 'palavra_chave_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: PalavraChave::class)]
    private Collection $palavraChave;

    #[ORM\ManyToOne(targetEntity: TipoTrabalho::class)]
    #[ORM\JoinColumn(name: 'tipo_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private TipoTrabalho|null $tipo = null;

    #[ORM\ManyToOne(targetEntity: CorpoAcademico::class)]
    #[ORM\JoinColumn(name: 'orientador_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private CorpoAcademico|null $orientador = null;

    #[ORM\JoinTable(name: 'banca_examinadora_documento_academico')]
    #[ORM\JoinColumn(name: 'documento_academico_id', referencedColumnName: 'id')] // , onDelete: 'SET NULL'
    #[ORM\InverseJoinColumn(name: 'corpo_academico_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: CorpoAcademico::class)]
    private Collection $bancaExaminadora;


    public function __construct()
    {
        $this->aluno = new ArrayCollection();
        $this->palavraChave = new ArrayCollection();
        $this->bancaExaminadora = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function getSubtitulo(): string
    {
        return $this->subtitulo;
    }

    public function setSubtitulo(string $subtitulo): void
    {
        $this->subtitulo = $subtitulo;
    }

    public function getResumo(): string
    {
        return $this->resumo;
    }

    public function setResumo(string $resumo): void
    {
        $this->resumo = $resumo;
    }

    public function getDatadocumento(): DateTime
    {
        return $this->dataDocumento;
    }

    public function setDatadocumento(DateTime $dataDocumento): void
    {
        $this->dataDocumento = $dataDocumento;
    }

    public function getDatapublicacao(): DateTime
    {
        return $this->dataPublicacao;
    }

    public function setDatapublicacao(DateTime $dataPublicacao): void
    {
        $this->dataPublicacao = $dataPublicacao;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): void
    {
        $this->status = $status;
    }

    public function getCurso(): ?Curso
    {
        return $this->curso;
    }

    public function setCurso(?Curso $curso): void
    {
        $this->curso = $curso;
    }


    public function getAluno(): Collection
    {
        return $this->aluno;
    }

    public function setAluno(Collection $aluno): void
    {
        $this->aluno = $aluno;
    }


    public function getPalavraChave(): Collection
    {
        return $this->palavraChave;
    }

    public function setPalavraChave(Collection $palavraChave): void
    {
        $this->palavraChave = $palavraChave;
    }


    public function getTipo(): ?TipoTrabalho
    {
        return $this->tipo;
    }

    public function setTipo(?TipoTrabalho $tipo): void
    {
        $this->tipo = $tipo;
    }


    public function getOrientador(): ?CorpoAcademico
    {
        return $this->orientador;
    }

    public function setOrientador(?CorpoAcademico $orientador): void
    {
        $this->orientador = $orientador;
    }


    public function getBancaExaminadora(): Collection
    {
        return $this->bancaExaminadora;
    }

    public function setBancaExaminadora(Collection $bancaExaminadora): void
    {
        $this->bancaExaminadora = $bancaExaminadora;
    }



}