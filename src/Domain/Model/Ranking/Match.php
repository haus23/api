<?php

namespace App\Domain\Model\Ranking;

/**
 * Class Match
 * @package App\Domain\Model\Ranking
 */
class Match
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $roundId;

    /**
     * @var int
     */
    public $nr;

    /**
     * @var string
     */
    public $league;

    /**
     * @var string
     */
    public $matchDay;

    /**
     * @var string
     */
    public $fixture;

    /**
     * @var boolean
     */
    public $topMatch;

    /**
     * @var boolean
     */
    public $canceled;

    /**
     * @var string
     */
    public $result;

    /**
     * @var int
     */
    public $points;

    /**
     * Match constructor.
     * @param int $id
     * @param int $roundId
     * @param int $nr
     * @param string $league
     * @param string $matchDay
     * @param string $fixture
     * @param bool $topMatch
     * @param bool $canceled
     * @param string $result
     * @param int $points
     */
    public function __construct(int $id, int $roundId, int $nr, string $league, string $matchDay, string $fixture, bool $topMatch, bool $canceled, string $result, int $points)
    {
        $this->id = $id;
        $this->roundId = $roundId;
        $this->nr = $nr;
        $this->league = $league;
        $this->matchDay = $matchDay;
        $this->fixture = $fixture;
        $this->topMatch = $topMatch;
        $this->canceled = $canceled;
        $this->result = $result;
        $this->points = $points;
    }
}