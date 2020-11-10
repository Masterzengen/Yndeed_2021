<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContratRepository::class)
 */
class Contrat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Offres::class, inversedBy="contrat", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $offres;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;



    public function __construct()
    {
        $this->contrat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Offres[]
     */

    public function getOffres(): ?Offres
    {
        return $this->offres;
    }

    public function setOffres(Offres $offres): self
    {
        $this->offres = $offres;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }
}
