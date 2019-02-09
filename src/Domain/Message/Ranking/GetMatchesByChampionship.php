<?php

namespace App\Domain\Message\Ranking;

/**
 * Class GetMatchesByChampionship
 * @package App\Domain\Message\Ranking
 */
class GetMatchesByChampionship
{
    /**
     * @var int
     */
    public $championshipId;

    /**
     * GetMatchesByChampionship constructor.
     * @param int $championshipId
     */
    public function __construct(int $championshipId)
    {
        $this->championshipId = $championshipId;
    }
}
