<?php

namespace App\Entity;

use App\Repository\OffresRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffresRepository::class)
 */
class Offres
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Title;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CodePostal;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateDeCreation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Ville;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDeMiseAJour;

    /**
     * @ORM\Column(type="datetime")
     */
    private $finDeLaMission;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Contrat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeDeContrat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->CodePostal;
    }

    public function setCodePostal(string $CodePostal): self
    {
        $this->CodePostal = $CodePostal;

        return $this;
    }

    public function getDateDeCreation(): ?\DateTimeInterface
    {
        return $this->DateDeCreation;
    }

    public function setDateDeCreation(\DateTimeInterface $DateDeCreation): self
    {
        $this->DateDeCreation = $DateDeCreation;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getDateDeMiseAJour(): ?\DateTimeInterface
    {
        return $this->dateDeMiseAJour;
    }

    public function setDateDeMiseAJour(\DateTimeInterface $dateDeMiseAJour): self
    {
        $this->dateDeMiseAJour = $dateDeMiseAJour;

        return $this;
    }

    public function getFinDeLaMission(): ?\DateTimeInterface
    {
        return $this->finDeLaMission;
    }

    public function setFinDeLaMission(\DateTimeInterface $finDeLaMission): self
    {
        $this->finDeLaMission = $finDeLaMission;

        return $this;
    }

    public function getContrat(): ?string
    {
        return $this->Contrat;
    }

    public function setContrat(string $Contrat): self
    {
        $this->Contrat = $Contrat;

        return $this;
    }

    public function getTypeDeContrat(): ?string
    {
        return $this->typeDeContrat;
    }

    public function setTypeDeContrat(string $typeDeContrat): self
    {
        $this->typeDeContrat = $typeDeContrat;

        return $this;
    }
}
