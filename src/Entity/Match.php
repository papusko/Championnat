<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatchRepository")
 */
class Match
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipes", inversedBy="matches")
     */
    private $equipeADomicile;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipes", inversedBy="matches")
     */
    private $equipeExterieur;

    /**
     * @ORM\Column(type="integer")
     */
    private $scoreEquipeDomicile;

    /**
     * @ORM\Column(type="integer")
     */
    private $scoreEquipeExterieur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEquipeADomicile(): ?Equipes
    {
        return $this->equipeADomicile;
    }

    public function setEquipeADomicile(?Equipes $equipeADomicile): self
    {
        $this->equipeADomicile = $equipeADomicile;

        return $this;
    }

    public function getEquipeExterieur(): ?Equipes
    {
        return $this->equipeExterieur;
    }

    public function setEquipeExterieur(?Equipes $equipeExterieur): self
    {
        $this->equipeExterieur = $equipeExterieur;

        return $this;
    }

    public function getScoreEquipeDomicile(): ?int
    {
        return $this->scoreEquipeDomicile;
    }

    public function setScoreEquipeDomicile(int $scoreEquipeDomicile): self
    {
        $this->scoreEquipeDomicile = $scoreEquipeDomicile;

        return $this;
    }

    public function getScoreEquipeExterieur(): ?int
    {
        return $this->scoreEquipeExterieur;
    }

    public function setScoreEquipeExterieur(int $scoreEquipeExterieur): self
    {
        $this->scoreEquipeExterieur = $scoreEquipeExterieur;

        return $this;
    }


}
