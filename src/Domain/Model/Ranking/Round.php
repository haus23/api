<?php

namespace App\Domain\Model\Ranking;

/**
 * Class Round
 * @package App\Domain\Model\Ranking
 */
final class Round implements \JsonSerializable
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $nr;

    /**
     * @var int
     */
    protected $matchCount;

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
     * @return int
     */
    public function getNr(): int
    {
        return $this->nr;
    }

    /**
     * @param int $nr
     */
    public function setNr(int $nr): void
    {
        $this->nr = $nr;
    }

    /**
     * @return int
     */
    public function getMatchCount(): int
    {
        return $this->matchCount;
    }

    /**
     * @param int $matchCount
     */
    public function setMatchCount(int $matchCount): void
    {
        $this->matchCount = $matchCount;
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
            'id' => $this->id,
            'nr' => $this->nr,
            'matchCount' => $this->matchCount
        ];
    }
}
