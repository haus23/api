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
     * @var string|null
     */
    public $league;

    /**
     * @var string|null
     */
    public $matchDay;

    /**
     * @var string|null
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
     * @var string|null
     */
    public $result;

    /**
     * @var int|null
     */
    public $points;

    /**
     * Match constructor.
     * @param int $id
     * @param int $roundId
     * @param int $nr
     * @param string|null $league
     * @param string|null $matchDay
     * @param string|null $fixture
     * @param bool $topMatch
     * @param bool $canceled
     * @param string|null $result
     * @param int|null $points
     */
    public function __construct(int $id, int $roundId, int $nr, ?string $league, ?string $matchDay, ?string $fixture, bool $topMatch, bool $canceled, ?string $result, ?int $points)
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