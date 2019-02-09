<?php

namespace App\Domain\Message\Ranking;

/**
 * Class GetRoundsByChampionship
 * @package App\Domain\Message\Ranking
 */
class GetRoundsByChampionship
{
    /**
     * @var int
     */
    public $championshipId;

    /**
     * GetPlayersByChampionship constructor.
     * @param int $championshipId
     */
    public function __construct(int $championshipId)
    {
        $this->championshipId = $championshipId;
    }
}
