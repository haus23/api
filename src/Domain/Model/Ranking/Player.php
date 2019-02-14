<?php

namespace App\Domain\Model\Ranking;

/**
 * Class Player
 * @package App\Domain\Model\Ranking
 */
class Player implements \JsonSerializable
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $slug;

    /**
     * @var ?int
     */
    protected $rank;

    /**
     * @var ?int
     */
    protected $points;

    /**
     * @var ?float
     */
    protected $extra_points;

    /**
     * @var ?float
     */
    protected $total_points;

    /**
     * Player constructor.
     * @param int $id
     * @param string $name
     * @param $slug
     * @param $rank
     * @param $points
     * @param $extra_points
     * @param $total_points
     */
    public function __construct(int $id, string $name, $slug, $rank, $points, $extra_points, $total_points)
    {
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
        $this->rank = $rank;
        $this->points = $points;
        $this->extra_points = $extra_points;
        $this->total_points = $total_points;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @param mixed $rank
     */
    public function setRank($rank): void
    {
        $this->rank = $rank;
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param mixed $points
     */
    public function setPoints($points): void
    {
        $this->points = $points;
    }

    /**
     * @return mixed
     */
    public function getExtraPoints()
    {
        return $this->extra_points;
    }

    /**
     * @param mixed $extra_points
     */
    public function setExtraPoints($extra_points): void
    {
        $this->extra_points = $extra_points;
    }

    /**
     * @return mixed
     */
    public function getTotalPoints()
    {
        return $this->total_points;
    }

    /**
     * @param mixed $total_points
     */
    public function setTotalPoints($total_points): void
    {
        $this->total_points = $total_points;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "slug" => $this->slug,
            "rank" => $this->rank,
            "points" => $this->points,
            "extraPoints" => $this->extra_points,
            "totalPoints" => $this->total_points
        ];
    }
}
