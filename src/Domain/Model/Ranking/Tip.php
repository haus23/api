<?php

namespace App\Domain\Model\Ranking;

/**
 * Class Tip
 * @package App\Domain\Model\Ranking
 */
final class Tip
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
     * @var string|null
     */
    public $result;

    /**
     * @var boolean|null
     */
    public $joker;

    /**
     * @var int|null
     */
    public $tipPoints;

    /**
     * @var int|null
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
     * @param string|null $result
     * @param bool|null $joker
     * @param int|null $tipPoints
     * @param int|null $extraPoints
     * @param int|null $points
     */
    public function __construct(int $id, int $matchId, int $playerId, ?string $result, ?bool $joker, ?int $tipPoints, ?int $extraPoints, ?int $points)
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
