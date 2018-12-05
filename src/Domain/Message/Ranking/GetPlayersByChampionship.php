<?php

namespace App\Domain\Message\Ranking;

class GetPlayersByChampionship
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
