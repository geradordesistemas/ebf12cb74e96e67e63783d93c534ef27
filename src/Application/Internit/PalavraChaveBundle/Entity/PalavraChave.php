<?php

namespace App\Application\Internit\PalavraChaveBundle\Entity;

use App\Application\Internit\PalavraChaveBundle\Repository\PalavraChaveRepository;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'palavra_chave')]
#[ORM\Entity(repositoryClass: PalavraChaveRepository::class)]
#[UniqueEntity('id')]
#[UniqueEntity('palavraChave')]
class PalavraChave
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'palavraChave', type: 'string', unique: true, nullable: false)]
    private string $palavraChave;

    #[ORM\Column(name: 'descricao', type: 'text', unique: false, nullable: true)]
    private ?string $descricao = null;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getPalavrachave(): string
    {
        return $this->palavraChave;
    }

    public function setPalavrachave(string $palavraChave): void
    {
        $this->palavraChave = $palavraChave;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }


}