<?php

namespace App\Domain\Message\Ranking;

/**
 * Class GetTipsByChampionship
 * @package App\Domain\Message\Ranking
 */
class GetTipsByChampionship
{
    /**
     * @var int
     */
    public $championshipId;

    /**
     * GetTipsByChampionship constructor.
     * @param int $championshipId
     */
    public function __construct(int $championshipId)
    {
        $this->championshipId = $championshipId;
    }
}
