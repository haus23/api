<?php

namespace App\Datasource\Legacy\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChampionshipPlayerRepository")
 * @ORM\Table(name="spieler")
 */
class ChampionshipPlayer
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
     * @ORM\ManyToOne(targetEntity="App\Datasource\Legacy\Entity\Player")
     * @ORM\JoinColumn(nullable=false, name="user_id")
     */
    private $player;

    /**
     * @ORM\Column(type="integer", nullable=true, name="platz")
     */
    private $rank;

    /**
     * @ORM\Column(type="integer", nullable=true, name="punkte")
     */
    private $points;

    /**
     * @ORM\Column(type="float", nullable=true, name="zusatz")
     */
    private $extra_points;

    /**
     * @ORM\Column(type="float", nullable=true, name="gesamt")
     */
    private $total_points;

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

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): self
    {
        $this->player = $player;

        return $this;
    }

    public function getRank(): ?int
    {
        return $this->rank;
    }

    public function setRank(?int $rank): self
    {
        $this->rank = $rank;

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

    public function getExtraPoints(): ?float
    {
        return $this->extra_points;
    }

    public function setExtraPoints(?float $extra_points): self
    {
        $this->extra_points = $extra_points;

        return $this;
    }

    public function getTotalPoints(): ?float
    {
        return $this->total_points;
    }

    public function setTotalPoints(?float $total_points): self
    {
        $this->total_points = $total_points;

        return $this;
    }
}
