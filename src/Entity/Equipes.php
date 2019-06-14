<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipesRepository")
 */
class Equipes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomEquipe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomEtNomCoach;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreDeJoueur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomDuStade;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Match", mappedBy="equipeADomicile")
     */
    private $matches;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Jeux", mappedBy="equipeDomicile")
     */
    private $jeuxes;

    public function __construct()
    {
        $this->matches = new ArrayCollection();
        $this->jeuxes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEquipe(): ?string
    {
        return $this->nomEquipe;
    }

    public function setNomEquipe(string $nomEquipe): self
    {
        $this->nomEquipe = $nomEquipe;

        return $this;
    }

    public function getPrenomEtNomCoach(): ?string
    {
        return $this->prenomEtNomCoach;
    }

    public function setPrenomEtNomCoach(string $prenomEtNomCoach): self
    {
        $this->prenomEtNomCoach = $prenomEtNomCoach;

        return $this;
    }

    public function getNombreDeJoueur(): ?int
    {
        return $this->nombreDeJoueur;
    }

    public function setNombreDeJoueur(int $nombreDeJoueur): self
    {
        $this->nombreDeJoueur = $nombreDeJoueur;

        return $this;
    }

    public function getNomDuStade(): ?string
    {
        return $this->nomDuStade;
    }

    public function setNomDuStade(string $nomDuStade): self
    {
        $this->nomDuStade = $nomDuStade;

        return $this;
    }

    /**
     * @return Collection|Match[]
     */
    public function getMatches(): Collection
    {
        return $this->matches;
    }

    public function addMatch(Match $match): self
    {
        if (!$this->matches->contains($match)) {
            $this->matches[] = $match;
            $match->setEquipeADomicile($this);
        }

        return $this;
    }

    public function removeMatch(Match $match): self
    {
        if ($this->matches->contains($match)) {
            $this->matches->removeElement($match);
            // set the owning side to null (unless already changed)
            if ($match->getEquipeADomicile() === $this) {
                $match->setEquipeADomicile(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Jeux[]
     */
    public function getJeuxes(): Collection
    {
        return $this->jeuxes;
    }

    public function addJeux(Jeux $jeux): self
    {
        if (!$this->jeuxes->contains($jeux)) {
            $this->jeuxes[] = $jeux;
            $jeux->addEquipeDomicile($this);
        }

        return $this;
    }

    public function removeJeux(Jeux $jeux): self
    {
        if ($this->jeuxes->contains($jeux)) {
            $this->jeuxes->removeElement($jeux);
            $jeux->removeEquipeDomicile($this);
        }

        return $this;
    }
}
