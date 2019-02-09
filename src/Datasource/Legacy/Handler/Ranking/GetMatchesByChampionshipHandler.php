<?php

namespace App\Datasource\Legacy\Handler\Ranking;

use App\Domain\Message\Ranking\GetMatchesByChampionship;
use App\Domain\Model\Ranking\Match;
use App\Entity\Match as MatchEntity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

/**
 * Class GetMatchesByChampionshipHandler
 * @package App\Datasource\Legacy\Handler\Ranking
 */
class GetMatchesByChampionshipHandler implements MessageHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * GetMatchesByChampionshipHandler constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke(GetMatchesByChampionship $msg)
    {
        $query = $this->em->createQuery('SELECT m FROM App\Entity\Match m
            JOIN m.championship c WHERE c.id = ?1
            ORDER BY m.nr');

        $query->setParameter(1, $msg->championshipId);
        $rows = $query->getResult();

        $matches = array_map( function (MatchEntity $m) {
            return new Match($m->getId(), $m->getRound()->getId(), $m->getNr(), $m->getLeague(),
                $m->getMatchDay()->format('c'), $m->getFixture(), $m->getTopMatch(), $m->getCanceled(),
                $m->getResult(), $m->getPoints()
            );
        }, $rows);

        return $matches;
    }
}
