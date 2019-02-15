<?php

namespace App\Domain\Model\Ranking;

/**
 * Class Player
 * @package App\Domain\Model\Ranking
 */
final class Player
{

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $slug;

    /**
     * @var int|null
     */
    public $rank;

    /**
     * @var int|null
     */
    public $points;

    /**
     * @var float|null
     */
    public $extraPoints;

    /**
     * @var float|null
     */
    public $totalPoints;

    /**
     * Player constructor.
     * @param int $id
     * @param string $name
     * @param string $slug
     * @param int|null $rank
     * @param int|null $points
     * @param float|null $extraPoints
     * @param float|null $totalPoints
     */
    public function __construct(int $id, string $name, string $slug, ?int $rank, ?int $points, ?float $extraPoints, ?float $totalPoints)
    {
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
        $this->rank = $rank;
        $this->points = $points;
        $this->extraPoints = $extraPoints;
        $this->totalPoints = $totalPoints;
    }
}
