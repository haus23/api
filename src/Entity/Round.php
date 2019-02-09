<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoundRepository")
 * @ORM\Table(name="runde")
 */
class Round
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Championship")
     * @ORM\JoinColumn(nullable=false, name="turnier_id")
     */
    private $championship;

    /**
     * @ORM\Column(type="integer")
     */
    private $nr;

    /**
     * @ORM\Column(type="integer", nullable=true, name="anzahl_spiele")
     */
    private $matchCount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNr(): ?int
    {
        return $this->nr;
    }

    public function getChampionship(): ?Championship
    {
        return $this->championship;
    }

    public function setChampionship(?Championship $championship): self
    {
        $this->championship = $championship;

        return $this;
    }

    public function setNr(int $nr): self
    {
        $this->nr = $nr;

        return $this;
    }

    public function getMatchCount(): ?int
    {
        return $this->matchCount;
    }

    public function setMatchCount(?int $matchCount): self
    {
        $this->matchCount = $matchCount;

        return $this;
    }
}