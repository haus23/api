<?php

namespace App\Datasource\Legacy\Handler\Ranking;

use App\Domain\Message\Ranking\GetRoundsByChampionship;
use App\Domain\Model\Ranking\Round;
use App\Datasource\Legacy\Entity\Round as RoundEntity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

/**
 * Class GetRoundsByChampionshipHandler
 * @package App\Datasource\Legacy\Handler\Ranking
 */
class GetRoundsByChampionshipHandler implements MessageHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * GetRoundsByChampionshipHandler constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke(GetRoundsByChampionship $msg)
    {
        $query = $this->em->createQuery('SELECT r FROM Legacy:Round r
            JOIN r.championship c WHERE c.id = ?1
            ORDER BY r.nr');

        $query->setParameter(1, $msg->championshipId);
        $rows = $query->getResult();

        $rounds = array_map( function (RoundEntity $r) {
            return new Round($r->getId(), $r->getNr(), $r->getMatchCount());
        }, $rows);

        return $rounds;
    }
}
