<?php

namespace App\Datasource\Legacy\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TipRepository")
 * @ORM\Table(name="tipp")
 */
class Tip
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
     * @ORM\ManyToOne(targetEntity="App\Datasource\Legacy\Entity\Match")
     * @ORM\JoinColumn(nullable=false, name="spiel_id")
     */
    private $fixture;

    /**
     * @ORM\ManyToOne(targetEntity="App\Datasource\Legacy\Entity\ChampionshipPlayer")
     * @ORM\JoinColumn(nullable=false, name="spieler_id")
     */
    private $player;

    /**
     * @ORM\Column(type="string", length=5, nullable=true, name="tipp")
     */
    private $result;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $joker;

    /**
     * @ORM\Column(type="integer", nullable=true, name="punkte")
     */
    private $points;

    /**
     * @ORM\Column(type="boolean", nullable=true, name="sonder")
     */
    private $extraRule;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChampionship(): Championship
    {
        return $this->championship;
    }

    public function setChampionship(Championship $championship): self
    {
        $this->championship = $championship;

        return $this;
    }

    public function getFixture(): Match
    {
        return $this->fixture;
    }

    public function setFixture(Match $fixture): self
    {
        $this->fixture = $fixture;

        return $this;
    }

    public function getPlayer(): ChampionshipPlayer
    {
        return $this->player;
    }

    public function setPlayer(ChampionshipPlayer $player): self
    {
        $this->player = $player;

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

    public function getJoker(): ?bool
    {
        return $this->joker;
    }

    public function setJoker(?bool $joker): self
    {
        $this->joker = $joker;

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

    public function getExtraRule(): ?bool
    {
        return $this->extraRule;
    }

    public function setExtraRule(?bool $extraRule): self
    {
        $this->extraRule = $extraRule;

        return $this;
    }
}
