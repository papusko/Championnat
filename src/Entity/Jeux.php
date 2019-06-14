<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JeuxRepository")
 */
class Jeux
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateMatch;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Equipes", inversedBy="jeuxes")
     */
    private $equipeDomicile;

    /**
     * @ORM\Column(type="datetime")
     */
    private $equipeExterieur;

    public function __construct()
    {
        $this->equipeDomicile = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateMatch(): ?\DateTimeInterface
    {
        return $this->dateMatch;
    }

    public function setDateMatch(\DateTimeInterface $dateMatch): self
    {
        $this->dateMatch = $dateMatch;

        return $this;
    }

    /**
     * @return Collection|Equipes[]
     */
    public function getEquipeDomicile(): Collection
    {
        return $this->equipeDomicile;
    }

    public function addEquipeDomicile(Equipes $equipeDomicile): self
    {
        if (!$this->equipeDomicile->contains($equipeDomicile)) {
            $this->equipeDomicile[] = $equipeDomicile;
        }

        return $this;
    }

    public function removeEquipeDomicile(Equipes $equipeDomicile): self
    {
        if ($this->equipeDomicile->contains($equipeDomicile)) {
            $this->equipeDomicile->removeElement($equipeDomicile);
        }

        return $this;
    }

    public function getEquipeExterieur(): ?\DateTimeInterface
    {
        return $this->equipeExterieur;
    }

    public function setEquipeExterieur(\DateTimeInterface $equipeExterieur): self
    {
        $this->equipeExterieur = $equipeExterieur;

        return $this;
    }
}
