<?php

namespace App\Datasource\Legacy\Handler\Ranking;

use App\Domain\Message\Ranking\GetPlayersByChampionship;
use App\Domain\Model\Ranking\Player;
use App\Entity\ChampionshipPlayer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class GetPlayersByChampionshipHandler implements MessageHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * GetPlayersByChampionshipHandler constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke(GetPlayersByChampionship $msg)
    {
        $query = $this->em->createQuery('SELECT cp, p FROM App\Entity\ChampionshipPlayer cp
            JOIN cp.player p 
            JOIN cp.championship c WHERE c.id = ?1
            ORDER BY cp.rank');

        $query->setParameter(1, $msg->championshipId);
        $rows = $query->getResult();

        $playerInfos = array_map( function (ChampionshipPlayer $cp) {

            return new Player($cp->getId(), $cp->getPlayer()->getName(), $cp->getPlayer()->getSlug(), $cp->getRank(),
                $cp->getPoints(), $cp->getExtraPoints(), $cp->getTotalPoints());

        }, $rows);

        return $playerInfos;
    }

}