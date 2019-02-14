<?php

namespace App\Datasource\Legacy\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatchRepository")
 * @ORM\Table(name="spiel")
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
     * @ORM\ManyToOne(targetEntity="App\Datasource\Legacy\Entity\Championship")
     * @ORM\JoinColumn(nullable=false, name="turnier_id")
     */
    private $championship;

    /**
     * @ORM\ManyToOne(targetEntity="App\Datasource\Legacy\Entity\Round")
     * @ORM\JoinColumn(nullable=false, name="runde_id")
     */
    private $round;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nr;

    /**
     * @ORM\Column(type="string", length=16, nullable=true, name="liga")
     */
    private $league;

    /**
     * @ORM\Column(type="datetime", nullable=true, name="datum")
     */
    private $matchDay;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, name="paarung")
     */
    private $fixture;

    /**
     * @ORM\Column(type="boolean", nullable=true, name="topspiel")
     */
    private $topMatch;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $canceled;

    /**
     * @ORM\Column(type="string", length=5, nullable=true, name="ergebnis")
     */
    private $result;

    /**
     * @ORM\Column(type="integer", nullable=true, name="punkte")
     */
    private $points;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRound(): ?Round
    {
        return $this->round;
    }

    public function setRound(?Round $round): self
    {
        $this->round = $round;

        return $this;
    }

    public function getNr(): ?int
    {
        return $this->nr;
    }

    public function setNr(?int $nr): self
    {
        $this->nr = $nr;

        return $this;
    }

    public function getLeague(): ?string
    {
        return $this->league;
    }

    public function setLeague(?string $league): self
    {
        $this->league = $league;

        return $this;
    }

    public function getMatchDay(): ?\DateTimeInterface
    {
        return $this->matchDay;
    }

    public function setMatchDay(?\DateTimeInterface $matchDay): self
    {
        $this->matchDay = $matchDay;

        return $this;
    }

    public function getFixture(): ?string
    {
        return $this->fixture;
    }

    public function setFixture(?string $fixture): self
    {
        $this->fixture = $fixture;

        return $this;
    }

    public function getTopMatch(): ?bool
    {
        return $this->topMatch;
    }

    public function setTopMatch(?bool $topMatch): self
    {
        $this->topMatch = $topMatch;

        return $this;
    }

    public function getCanceled(): ?bool
    {
        return $this->canceled;
    }

    public function setCanceled(?bool $canceled): self
    {
        $this->canceled = $canceled;

        return $this;
    }

    public function getResult(): ?string
    {
        return $this->result;
    }

    public function setResult(?string $result): self
    {
        $this->result = $result;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(?int $points): self
    {
        $this->points = $points;

        return $this;
    }
}
