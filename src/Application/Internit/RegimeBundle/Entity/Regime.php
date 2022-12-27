<?php

namespace App\Application\Internit\RegimeBundle\Entity;

use App\Application\Internit\RegimeBundle\Repository\RegimeRepository;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'regime')]
#[ORM\Entity(repositoryClass: RegimeRepository::class)]
#[UniqueEntity('id')]
class Regime
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'regime', type: 'string', unique: false, nullable: false)]
    private string $regime;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'descricao', type: 'text', unique: false, nullable: false)]
    private string $descricao;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getRegime(): string
    {
        return $this->regime;
    }

    public function setRegime(string $regime): void
    {
        $this->regime = $regime;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }


}