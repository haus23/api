<?php

namespace App\Domain\Model\Ranking;

/**
 * Class Championship
 * @package App\Domain\Ranking\Model
 */
final class Championship
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $slug;

    /**
     * @var bool
     */
    public $completed;

    /**
     * Championship constructor.
     * @param int $id
     * @param string $name
     * @param string $slug
     * @param bool $completed
     */
    public function __construct(int $id, string $name, string $slug, bool $completed)
    {
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
        $this->completed = $completed;
    }
}
