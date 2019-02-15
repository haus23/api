<?php

namespace App\Domain\Model\Ranking;

/**
 * Class Round
 * @package App\Domain\Model\Ranking
 */
final class Round
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $nr;

    /**
     * @var int
     */
    public $matchCount;

    /**
     * Round constructor.
     * @param int $id
     * @param int $nr
     * @param int $matchCount
     */
    public function __construct(int $id, int $nr, int $matchCount)
    {
        $this->id = $id;
        $this->nr = $nr;
        $this->matchCount = $matchCount;
    }
}
