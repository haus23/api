<?php

namespace App\Datasource\Legacy\Handler\Ranking;

use App\Domain\Message\Ranking\GetAllPublishedChampionships;
use App\Domain\Model\Ranking\Championship;
use App\Datasource\Legacy\Entity\Championship as ChampionshipEntity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class GetAllPublishedChampionshipsHandler implements MessageHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * GetAllPublishedChampionshipsHandler constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke(GetAllPublishedChampionships $query)
    {
        $query = $this->em->createQuery('SELECT c FROM Legacy:Championship c ORDER BY c.nr DESC');

        $rows = $query->getResult();
        $championships = array_map(function(ChampionshipEntity $c) {
            return new Championship($c->getId(), $c->getName(), $c->getSlug(), $c->getCompleted());
        }, $rows);

        return $championships;
    }
}