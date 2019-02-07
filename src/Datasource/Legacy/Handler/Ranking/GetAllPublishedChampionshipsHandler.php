<?php

namespace App\Datasource\Legacy\Handler\Ranking;

use App\Domain\Message\Ranking\GetAllPublishedChampionships;
use App\Domain\Model\Ranking\ChampionshipInfo;
use App\Entity\Championship;
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
        $query = $this->em->createQuery('SELECT c FROM App\Entity\Championship c ORDER BY c.nr DESC');

        $rows = $query->getResult();
        $championships = array_map(function(Championship $c) {
            return new ChampionshipInfo($c->getId(), $c->getName(), $c->getSlug(), $c->getCompleted());
        }, $rows);

        return $championships;
    }
}