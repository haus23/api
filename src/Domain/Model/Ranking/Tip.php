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
     * @var int
     */
    public $points;
}
