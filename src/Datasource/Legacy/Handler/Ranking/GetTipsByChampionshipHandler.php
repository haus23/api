<?php

namespace App\Datasource\Legacy\Handler\Ranking;

use App\Domain\Message\Ranking\GetTipsByChampionship;
use App\Domain\Model\Ranking\Tip;
use App\Entity\Tip as TipEntity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

/**
 * Class GetTipsByChampionshipHandler
 * @package App\Datasource\Legacy\Handler\Ranking
 */
class GetTipsByChampionshipHandler implements MessageHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * GetTipsByChampionshipHandler constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke(GetTipsByChampionship $msg)
    {
        $query = $this->em->createQuery('SELECT t FROM App\Entity\Tip t
            JOIN t.championship c WHERE c.id = ?1');

        $query->setParameter(1, $msg->championshipId);
        $rows = $query->getResult();

        $tips = array_map( function (TipEntity $t) {

            // HACK: the number of extra points is based on the championship's ruleset
            // Previously this was only a bool indicating the extra points. I will change
            // that to the extraPoints column. Curremtly the number of extra points is three.
            $tipPoints = $t->getPoints() - $t->getExtraRule() * 3;
            $extraPoints = $t->getExtraRule() * 3;

            return new Tip($t->getId(), $t->getFixture()->getId(), $t->getPlayer()->getId(),
                $t->getResult(), $t->getJoker(), $tipPoints, $extraPoints, $t->getPoints());
        }, $rows);

        return $tips;
    }
}
