<?php

namespace App\Controller\Legacy\Ranking;

use App\Domain\Message\QueryBus;
use App\Domain\Message\Ranking\GetAllPublishedChampionships;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ChampionshipsController extends AbstractController
{
    /**
     * @Route("/ranking/championships", name="ranking_championships")
     *
     * @param QueryBus $queryBus
     * @return JsonResponse
     */
    public function __invoke(QueryBus $queryBus)
    {
        $championships = $queryBus->query(new GetAllPublishedChampionships());
        return $this->json($championships);
    }
}
