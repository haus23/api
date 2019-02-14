<?php

namespace App\Controller\Legacy\Ranking;

use App\Domain\Message\QueryBus;
use App\Domain\Message\Ranking\GetMatchesByChampionship;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MatchesController extends AbstractController
{
    /**
     * @Route("/ranking/matches/{championshipId}", name="ranking_matches")
     *
     * @param QueryBus $queryBus
     * @return JsonResponse
     */
    public function __invoke(QueryBus $queryBus, int $championshipId)
    {
        $matches = $queryBus->query(new GetMatchesByChampionship($championshipId));
        return $this->json($matches);
    }
}
