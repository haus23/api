<?php

namespace App\Domain\Model\Ranking;

/**
 * Class Tip
 * @package App\Domain\Model\Ranking
 */
class Tip
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $matchId;

    /**
     * @var int
     */
    public $playerId;

    /**
     * @var string
     */
    public $result;

    /**
     * @var boolean
     */
    public $joker;

    /**
     * @var int
     */
    public $tipPoints;

    /**
     * @var int
     */
    public $extraPoints;

    /**
     * @var int|null
     */
    public $points;

    /**
     * Tip constructor.
     * @param int $id
     * @param int $matchId
     * @param int $playerId
     * @param string $result
     * @param bool $joker
     * @param int $tipPoints
     * @param int $extraPoints
     * @param int|null $points
     */
    public function __construct(int $id, int $matchId, int $playerId, string $result, bool $joker, int $tipPoints, int $extraPoints, ?int $points)
    {
        $this->id = $id;
        $this->matchId = $matchId;
        $this->playerId = $playerId;
        $this->result = $result;
        $this->joker = $joker;
        $this->tipPoints = $tipPoints;
        $this->extraPoints = $extraPoints;
        $this->points = $points;
    }
}
